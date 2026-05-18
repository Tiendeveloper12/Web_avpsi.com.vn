<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PriceScoutingService
{
    protected $apifyKey;
    protected $firecrawlKey;

    public function __construct()
    {
        $this->apifyKey = config('services.apify.key');
        $this->firecrawlKey = config('services.firecrawl.key');
    }

    /**
     * Scout prices from multiple sources and return an aggregated "reasonable" price.
     */
    public function scoutProduct($productTitle)
    {
        $prices = [];
        
        // 1. Fetch from Apify (Shopee/Tiki/Lazada) - Placeholder logic
        $marketplacePrices = $this->fetchFromApify($productTitle);
        $prices = array_merge($prices, $marketplacePrices);

        // 2. Fetch from Firecrawl (Retailers like Phong Vu, FPT) - Placeholder logic
        $retailerPrices = $this->fetchFromFirecrawl($productTitle);
        $prices = array_merge($prices, $retailerPrices);

        if (empty($prices)) {
            return null;
        }

        return $this->calculateReasonablePrice($prices);
    }

    /**
     * Call Apify (Google Shopping Scraper) to get marketplace prices.
     */
    protected function fetchFromApify($query)
    {
        if (!$this->apifyKey) return [];

        try {
            // Using the Apify Google Shopping Scraper actor
            $response = Http::withToken($this->apifyKey)
                ->post("https://api.apify.com/v2/acts/apify~google-shopping-scraper/run-sync-get-dataset-items", [
                    'queries' => $query . ' site:shopee.vn OR site:tiki.vn OR site:lazada.vn',
                    'maxItems' => 10,
                    'locationCode' => 'VN', // Vietnam
                    'languageCode' => 'vi', // Vietnamese
                ]);

            if ($response->successful()) {
                $items = $response->json();
                return collect($items)->map(function($item) {
                    return isset($item['price']) ? $this->cleanVnPrice($item['price']) : null;
                })->filter()->toArray();
            }
        } catch (\Exception $e) {
            Log::error("Apify Scouting Error: " . $e->getMessage());
        }

        return [];
    }

    /**
     * Call Firecrawl to scrape specific Vietnamese tech retailers.
     */
    protected function fetchFromFirecrawl($query)
    {
        if (!$this->firecrawlKey) return [];

        $prices = [];
        // Common Vietnamese tech retailers
        $retailers = [
            'https://phongvu.vn/search?q=',
            'https://fptshop.com.vn/tim-kiem/',
            'https://gearvn.com/search?q='
        ];

        try {
            foreach ($retailers as $baseUrl) {
                $searchUrl = $baseUrl . urlencode($query);
                
                // Firecrawl scrape endpoint with AI extraction
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $this->firecrawlKey,
                    'Content-Type' => 'application/json'
                ])->post("https://api.firecrawl.dev/v1/scrape", [
                    'url' => $searchUrl,
                    'formats' => ['json'],
                    'jsonOptions' => [
                        'schema' => [
                            'type' => 'object',
                            'properties' => [
                                'price' => ['type' => 'string', 'description' => 'The price of the product'],
                                'product_name' => ['type' => 'string']
                            ],
                            'required' => ['price']
                        ]
                    ]
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    if (isset($data['data']['json']['price'])) {
                        $prices[] = $this->cleanVnPrice($data['data']['json']['price']);
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error("Firecrawl Scouting Error: " . $e->getMessage());
        }

        return $prices;
    }

    /**
     * Calculate the "Reasonable Price" by removing outliers and taking the median.
     */
    protected function calculateReasonablePrice(array $prices)
    {
        if (count($prices) === 0) return 0;
        
        sort($prices);
        
        // Remove bottom and top 10% to get rid of outliers
        $count = count($prices);
        if ($count >= 5) {
            $offset = round($count * 0.1);
            $prices = array_slice($prices, $offset, $count - (2 * $offset));
        }

        // Return Median
        $count = count($prices);
        if ($count === 0) return 0;
        
        $middleIndex = floor(($count - 1) / 2);
        if ($count % 2) {
            return $prices[$middleIndex];
        } else {
            return ($prices[$middleIndex] + $prices[$middleIndex + 1]) / 2;
        }
    }

    /**
     * Utility to clean price strings from VN sites.
     */
    public function cleanVnPrice($priceString)
    {
        // Remove non-numeric characters except for the decimal point if needed
        // VN prices usually use . as thousand separator and ₫ as suffix
        $cleaned = preg_replace('/[^0-9]/', '', $priceString);
        return (float) $cleaned;
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:scout-market-prices')]
#[Description('Scout Vietnamese websites for product prices using Apify and Firecrawl')]
class ScoutMarketPrices extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Queuing Market Price Scouting...');

        // Get 20 products that haven't been updated in at least 3 days
        // or have never been updated, prioritizing the oldest updates first.
        $products = \Illuminate\Support\Facades\DB::table('product')
            ->where(function($query) {
                $query->whereNull('market_updated_at')
                      ->orWhere('market_updated_at', '<', now()->subDays(3));
            })
            ->orderBy('market_updated_at', 'asc')
            ->limit(20)
            ->get();

        if ($products->isEmpty()) {
            $this->info('All products are up to date.');
            return;
        }

        foreach ($products as $product) {
            $this->info("Queuing job for: {$product->title}");
            \App\Jobs\ScoutProductPrice::dispatch($product->id);
        }

        $this->info('20 scouting jobs have been dispatched to the queue!');
        $this->info('Ensure your queue worker is running: php artisan queue:work');
    }
}

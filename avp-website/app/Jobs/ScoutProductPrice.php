<?php

namespace App\Jobs;

use App\Services\PriceScoutingService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ScoutProductPrice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $productId;

    /**
     * Create a new job instance.
     */
    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    /**
     * Execute the job.
     */
    public function handle(PriceScoutingService $scoutingService)
    {
        $product = DB::table('product')->where('id', $this->productId)->first();

        if (!$product) return;

        Log::info("Job started: Scouting for {$product->title}");

        $marketPrice = $scoutingService->scoutProduct($product->title);

        if ($marketPrice) {
            DB::table('product')
                ->where('id', $product->id)
                ->update([
                    'competitor_price' => $marketPrice,
                    'market_updated_at' => now(),
                ]);
            Log::info("Job success: Updated price for {$product->title} to " . number_format($marketPrice, 0, ',', '.') . "₫");
        } else {
            Log::warning("Job warning: No data found for {$product->title}");
        }
    }
}

<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$titles = [
    "HP LaserJet Pro M404dn",
    "Canon imageCLASS LBP2900",
    "Brother HL-L2366DW",
    "Epson EcoTank L3250",
    "Canon PIXMA G3010",
    "HP Smart Tank 580",
    "Brother DCP-T720DW",
    "Canon imageCLASS MF3010",
    "HP LaserJet Pro MFP M428fdw",
    "Brother HL-L3270CDW",
    "Xerox Phaser 6510DN",
    "Pantum P2500W",
    "Epson EcoTank M3170",
    "HP Color LaserJet Pro M255dw",
    "Epson L3210"
];

$count = 0;
$notFound = [];

DB::beginTransaction();
try {
    foreach ($titles as $title) {
        $product = DB::table('product')->where('title', trim($title))->first();
        if (!$product) {
            $product = DB::table('product')->where('title', 'like', trim($title) . '%')->first();
        }
        
        if ($product) {
            DB::table('product')
                ->where('id', $product->id)
                ->update([
                    'description' => $product->content,
                    'updated_at' => now()
                ]);
            $count++;
            echo "Updated description for ID {$product->id}: {$product->title}\n";
        } else {
            $notFound[] = $title;
        }
    }
    DB::commit();
    echo "\nSUCCESS: Updated descriptions for $count products.\n";
    if (!empty($notFound)) {
        echo "Not found (" . count($notFound) . "): " . implode(', ', $notFound) . "\n";
    }
} catch (\Exception $e) {
    DB::rollBack();
    echo "ERROR: " . $e->getMessage() . "\n";
}

<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$titles = [
    "HP 67 Black Ink Cartridge",
    "HP 67 Tri-Color Ink Cartridge",
    "HP 680 Black Ink Cartridge",
    "HP 680 Color Ink Cartridge",
    "HP 954 Black Ink Cartridge",
    "HP GT53 Black Ink Bottle",
    "HP GT52 Color Ink Bottle",
    "Epson 003 Black Ink Bottle",
    "Epson 003 Cyan Ink Bottle",
    "Epson 003 Magenta Ink Bottle",
    "Epson 003 Yellow Ink Bottle",
    "Epson 664 Black Ink Bottle",
    "Epson 664 Cyan Ink Bottle",
    "Epson T673 Photo Black Ink Bottle",
    "OKI C332 Black Toner Cartridge",
    "OKI C332 Cyan Toner Cartridge",
    "OKI C332 Magenta Toner Cartridge",
    "OKI C332 Yellow Toner Cartridge",
    "OKI B412 Black Toner Cartridge",
    "OKI MC363 Black Toner Cartridge",
    "OKI MC363 Cyan Toner Cartridge",
    "Canon GI-790 Black Ink Bottle",
    "Canon GI-790 Cyan Ink Bottle",
    "Canon GI-790 Magenta Ink Bottle",
    "Canon GI-790 Yellow Ink Bottle",
    "Canon PG-745 Black Ink Cartridge",
    "Canon CL-746 Color Ink Cartridge",
    "Canon Cartridge 325 Toner",
    "Brother BT-D60 Black Ink Bottle",
    "Brother BT5000 Cyan Ink Bottle",
    "Brother BT5000 Magenta Ink Bottle",
    "Brother BT5000 Yellow Ink Bottle",
    "Brother TN-2385 Black Toner Cartridge",
    "Brother TN-261 Cyan Toner Cartridge",
    "Brother TN-261 Magenta Toner Cartridge",
    "Ricoh SP C250 Black Toner Cartridge",
    "Ricoh SP C250 Cyan Toner Cartridge",
    "Ricoh SP C250 Magenta Toner Cartridge",
    "Ricoh SP C250 Yellow Toner Cartridge",
    "Ricoh MP C3503 Black Toner Cartridge",
    "Ricoh MP C3503 Cyan Toner Cartridge",
    "Ricoh MP C3503 Magenta Toner Cartridge"
];

$newSpec = "Mực chính hãng, hiệu suất cao, tương thích tốt";
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
                    'specs' => $newSpec,
                    'updated_at' => now()
                ]);
            $count++;
            echo "Updated specs for ID {$product->id}: {$product->title}\n";
        } else {
            $notFound[] = $title;
        }
    }
    DB::commit();
    echo "\nSUCCESS: Updated specs for $count products.\n";
    if (!empty($notFound)) {
        echo "Not found (" . count($notFound) . "): " . implode(', ', $notFound) . "\n";
    }
} catch (\Exception $e) {
    DB::rollBack();
    echo "ERROR: " . $e->getMessage() . "\n";
}

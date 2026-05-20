<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$titles = [
    "AVP CF400 (BK)",
    "AVP Q5951A/52A/53A (C/M/Y)",
    "AVP Q5950A (BK)",
    "AVP CE251A/52A/53A (C/M/Y)",
    "AVP CE250A (BK)",
    "AVP CE3 90A",
    "AVP 43X",
    "AVP 29X",
    "AVP 16A (309)",
    "AVP 55A",
    "AVP 87A",
    "AVP 26A",
    "AVP 49A",
    "AVP 80A",
    "AVP 85A",
    "AVP 12A",
    "AVP 05A",
    "AVP 17A",
    "AVP 51A",
    "AVP 151A",
    "AVP 76A",
    "AVP 283A",
    "AVP CF214A",
    "AVP CF351A/52A/53A (C/M/Y)",
    "AVP CF350A (BK)",
    "AVP CF211A/12A/13A (C/M/Y)",
    "AVP CF210A (BK)",
    "AVP CC531A/32A/33A (C/M/Y)",
    "AVP CC530 (BK)",
    "AVP CE321A/22A/23A (C/M/Y)",
    "AVP CE320A (BK)",
    "AVP CE411A/12A/13A (C/M/Y)",
    "AVP CE410A (BK)",
    "AVP CE311A/12A/13A (C/M/Y)",
    "AVP CE310A (BK)",
    "AVP CB541/42A/43A (C/M/Y)",
    "AVP CB540A (BK)",
    "AVP CE271A/72A/73A (C/M/Y)",
    "AVP CE270A (BK)",
    "AVP CF401A/2A/3A (C/M/Y)",
    "AVP DR 2025",
    "AVP DR 240B/ 240Y/ 240C/ 240M",
    "AVP TN 240B/ 240(Y/C/M)",
    "AVP DR-2255",
    "AVP TN-2280",
    "AVP DR-2125",
    "AVP TN-2130",
    "AVP TN-2025"
];

$count = 0;
$notFound = [];

DB::beginTransaction();
try {
    foreach ($titles as $title) {
        $product = DB::table('product')->where('title', trim($title))->first();
        if (!$product) {
            // Try like search
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
            echo "Updated ID {$product->id}: {$product->title}\n";
        } else {
            $notFound[] = $title;
            echo "WARNING: Product not found for title: $title\n";
        }
    }
    DB::commit();
    echo "\nSUCCESS: Updated $count products.\n";
    if (!empty($notFound)) {
        echo "Not found (" . count($notFound) . "): " . implode(', ', $notFound) . "\n";
    }
} catch (\Exception $e) {
    DB::rollBack();
    echo "ERROR: " . $e->getMessage() . "\n";
}

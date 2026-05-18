<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$titles = DB::table('product')->pluck('title');
foreach ($titles as $title) {
    echo $title . "\n";
}
echo "\nTotal products: " . count($titles) . "\n";

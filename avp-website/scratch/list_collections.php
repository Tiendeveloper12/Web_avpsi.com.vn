<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$collections = DB::table('collection')->select('id', 'parent_id', 'title')->get();
foreach ($collections as $col) {
    echo "ID: {$col->id}, Parent: {$col->parent_id}, Title: {$col->title}\n";
}

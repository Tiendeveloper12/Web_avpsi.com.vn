<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$allTags = DB::table('product')->pluck('tags');
$tagsCount = [];
foreach ($allTags as $tags) {
    $split = explode(',', $tags);
    foreach ($split as $tag) {
        $tag = trim($tag);
        if ($tag !== '') {
            if (!isset($tagsCount[$tag])) {
                $tagsCount[$tag] = 0;
            }
            $tagsCount[$tag]++;
        }
    }
}

print_r($tagsCount);

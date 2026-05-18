<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$photocopy_specs = [
    "RICOH AFICIO MP 3352" => "Photocopy trắng đen / In mạng / Scan màu / 33 trang/phút",
    "RICOH AFICIO MP 4002" => "Photocopy trắng đen / In & Scan mạng / 40 trang/phút",
    "RICOH AFICIO MP 5002" => "Photocopy văn phòng / In mạng / 50 trang/phút / Duplex",
    "RICOH MP 301 SPF" => "Đa chức năng / Copy-In-Scan-Fax / 30 trang/phút",
    "RICOH MP 3054" => "Photocopy trắng đen / Màn hình cảm ứng / 30 trang/phút",
    "RICOH MP 3055" => "In-Scan-Copy / Tự động đảo mặt / 30 trang/phút",
    "RICOH MP 3554" => "Photocopy văn phòng / In mạng / Scan màu / 35 trang/phút",
    "RICOH MPC 6003" => "Photocopy màu / In màu / Scan mạng / 60 trang/phút"
];

foreach ($photocopy_specs as $title => $spec) {
    $updated = DB::table('product')->where('title', $title)->update(['specs' => $spec]);
    if ($updated) {
        echo "Updated: $title\n";
    } else {
        echo "Not found: $title\n";
    }
}

echo "Database update complete.\n";

<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$printer_specs = [
    "HP LaserJet Pro M404dn" => "Máy in laser trắng đen / In mạng / In đảo mặt tự động",
    "Canon imageCLASS LBP2900" => "Máy in laser trắng đen / USB / Văn phòng phổ thông",
    "Brother HL-L2366DW" => "In laser trắng đen / Wi-Fi / In hai mặt tự động",
    "Epson EcoTank L3250" => "In phun màu / Bình mực liên tục / Wi-Fi đa năng",
    "Canon PIXMA G3010" => "In-Scan-Copy / Hệ thống mực liên tục / Wi-Fi",
    "HP Smart Tank 580" => "In phun màu / Bình mực lớn / Wi-Fi & Mobile Printing",
    "Brother DCP-T720DW" => "In phun đa năng / Wi-Fi / In đảo mặt tự động",
    "Canon imageCLASS MF3010" => "In-Scan-Copy laser / Thiết kế nhỏ gọn / Văn phòng",
    "HP LaserJet Pro MFP M428fdw" => "In laser đa chức năng / Fax / Wi-Fi / Duplex",
    "Brother HL-L3270CDW" => "In laser màu / Wi-Fi / In hai mặt tự động",
    "Xerox Phaser 6510DN" => "In laser màu / In mạng / Duplex tự động",
    "Pantum P2500W" => "Máy in laser trắng đen / Wi-Fi / Giá tốt",
    "Epson EcoTank M3170" => "In phun trắng đen / Bình mực lớn / ADF & Duplex",
    "HP Color LaserJet Pro M255dw" => "In laser màu / Wi-Fi / In hai mặt tự động",
    "Epson L3210" => "In-Scan-Copy / Bình mực liên tục / Tiết kiệm chi phí"
];

foreach ($printer_specs as $title => $spec) {
    $updated = DB::table('product')->where('title', $title)->update(['specs' => $spec]);
    if ($updated) {
        echo "Updated: $title\n";
    } else {
        echo "Not found: $title\n";
    }
}

echo "Database update complete.\n";

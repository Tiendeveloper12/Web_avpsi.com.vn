<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$network_specs = [
    "ASUS RT-AX52" => "Router Wi-Fi 6 / AX1800 / Dual-Band / Gia đình & Gaming",
    "TP-Link Archer C54" => "Router AC1200 / 4 anten / Wi-Fi Dual-Band",
    "NETGEAR Nighthawk RAX50" => "Wi-Fi 6 / AX5400 / Hiệu năng cao / Gaming",
    "Mercusys MW302R" => "Router Wi-Fi N300 / 2 anten / Giá phổ thông",
    "UGREEN Cat6 Ethernet Cable" => "Cáp mạng Cat6 / Gigabit / Chống nhiễu tốt",
    "Vention Cat6 Ethernet Cable" => "Cáp LAN Cat6 / Tốc độ cao / Bền bỉ",
    "AMP CAT6 UTP Cable" => "Cáp mạng CAT6 UTP / Hệ thống mạng doanh nghiệp",
    "Dintek CAT6 Patch Cord" => "Dây nhảy mạng Cat6 / RJ45 / Truyền tải ổn định",
    "Belkin Cat6 Ethernet Cable" => "Cáp mạng Cat6 / Gigabit Ethernet / Chất lượng cao",
    "TP-Link TL-SG108" => "Switch 8 cổng Gigabit / Plug & Play / Vỏ kim loại",
    "TP-Link TL-SG1005D" => "Switch 5 cổng Gigabit / Tiết kiệm điện / Văn phòng",
    "Netgear ProSafe GS105" => "Switch Gigabit 5 cổng / Vỏ kim loại / Độ ổn định cao",
    "Cisco CBS110-8T-D" => "Switch 8 cổng Gigabit / Doanh nghiệp / Plug & Play",
    "D-Link DGS-108" => "Switch Gigabit 8 cổng / Thiết kế kim loại / Desktop Switch"
];

foreach ($network_specs as $title => $spec) {
    $updated = DB::table('product')->where('title', $title)->update(['specs' => $spec]);
    if ($updated) {
        echo "Updated: $title\n";
    } else {
        echo "Not found: $title\n";
    }
}

echo "Database update complete.\n";

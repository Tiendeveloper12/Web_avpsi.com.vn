<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$accessory_specs = [
    // Monitors
    "LG UltraGear G6 27” 300Hz" => "27 inch QHD / 300Hz / IPS / 1ms / G-SYNC Compatible",
    "LG UltraGear 27G610A-B" => "27 inch QHD / 180Hz / IPS / HDR10 / FreeSync Premium",
    "ASUS ProArt PA248QV" => "24.1 inch WUXGA / IPS / 75Hz / 100% sRGB / Đồ họa chuyên nghiệp",
    "MSI Optix G241" => "23.8 inch FHD / 144Hz / IPS / 1ms / FreeSync",
    "MSI Optix MAG241" => "23.6 inch FHD / 144Hz / VA / 1ms / Màn hình cong",
    "Acer Predator XB273U" => "27 inch QHD / 240Hz / IPS / 0.5ms / G-SYNC",
    "Samsung LF22T350FHEXXV" => "22 inch FHD / 75Hz / IPS / FreeSync / Viền mỏng",
    "Philips 276B1" => "27 inch QHD / IPS / USB-C / 75Hz / Chân đế công thái học",
    "ViewSonic VG3820C" => "38 inch UWQHD+ / Cong / USB-C / Loa tích hợp / 75Hz",
    "LG UltraGear 24GN60R-B" => "24 inch FHD / 144Hz / IPS / 1ms / HDR10",

    // RAM
    "Corsair Vengeance LPX DDR4" => "DDR4 / 3200MHz / Tản nhiệt nhôm / Desktop Gaming",
    "Kingston FURY Beast DDR5" => "DDR5 / 5600MHz / Hiệu năng cao / Intel XMP",
    "G.SKILL Trident Z5 Neo RGB DDR5" => "DDR5 / RGB / AMD EXPO / Gaming cao cấp",
    "Crucial DDR5 UDIMM" => "DDR5 / 4800MHz / Desktop phổ thông / Tiết kiệm điện",
    "Corsair Vengeance RGB DDR5" => "DDR5 / RGB / Hiệu năng gaming / Intel XMP",
    "G.SKILL Ripjaws V DDR4" => "DDR4 / 3600MHz / Gaming / Độ trễ thấp",
    "Crucial Laptop DDR5 SO-DIMM" => "DDR5 SO-DIMM / Laptop / 5600MHz / Nâng cấp di động",
    "Corsair Dominator Platinum RGB DDR5" => "DDR5 / RGB cao cấp / Tản nhiệt DHX / Overclock",
    "TeamGroup T-Force Delta RGB DDR5" => "DDR5 / RGB / Gaming / Tốc độ cao",
    "Samsung DDR5 Desktop RAM" => "DDR5 / Desktop / 4800MHz / Ổn định cao",

    // SSD/HDD
    "Samsung 990 PRO 1TB NVMe SSD" => "PCIe Gen4 NVMe / 1TB / Tốc độ cao / Gaming & Workstation",
    "WD Black SN850X SSD" => "PCIe Gen4 / NVMe / Gaming hiệu năng cao",
    "Crucial P3 Plus NVMe SSD" => "PCIe Gen4 / NVMe / Giá tốt / Tốc độ nhanh",
    "Kingston NV2 NVMe SSD" => "PCIe Gen4 / NVMe / Phổ thông / Tiết kiệm chi phí",
    "Samsung 870 EVO SATA SSD" => "SATA III / SSD 2.5 inch / Độ bền cao / Nâng cấp PC",
    "Seagate BarraCuda HDD" => "3.5 inch / HDD lưu trữ / Desktop phổ thông",
    "WD Blue HDD" => "HDD desktop / Hoạt động ổn định / Dung lượng lớn",
    "Toshiba P300 HDD" => "7200RPM / Desktop hiệu năng cao / Lưu trữ dữ liệu",
    "Seagate IronWolf NAS HDD" => "HDD NAS / Hoạt động 24/7 / RAID hỗ trợ",
    "WD Purple Surveillance HDD" => "HDD camera giám sát / Hoạt động liên tục / Surveillance Storage"
];

foreach ($accessory_specs as $title => $specs) {
    $updated = DB::table('product')->where('title', $title)->update(['specs' => $specs]);
    if ($updated) {
        echo "Updated: $title\n";
    } else {
        echo "Not found: $title\n";
    }
}

echo "Database update complete.\n";

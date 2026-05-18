<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$specs = [
    // Motherboards
    "ASUS ROG Maximus Z790 Hero" => "Z790 / DDR5 / PCIe 5.0 / Wi-Fi 6E / Gaming cao cấp",
    "GIGABYTE Z790 AORUS Elite AX" => "Z790 / DDR5 / Wi-Fi 6E / Gaming & Creator",
    "MSI MAG X870 TOMAHAWK WIFI" => "X870 / DDR5 / Wi-Fi 7 / AMD Ryzen mới",
    "ASUS TUF Gaming B650-PLUS WIFI" => "B650 / DDR5 / Wi-Fi 6 / Gaming bền bỉ",
    "MSI B650 Gaming Plus WIFI" => "B650 / DDR5 / Wi-Fi / Gaming phổ thông",
    "ASRock B650M-HDV/M.2" => "B650M / DDR5 / M.2 NVMe / Micro-ATX",
    "GIGABYTE X870E AORUS MASTER" => "X870E / DDR5 / PCIe 5.0 / Wi-Fi 7",
    "ASUS PRIME H610M-K D4" => "H610M / DDR4 / Intel Gen 12-14 / Văn phòng",
    "MSI PRO B760M-A WIFI" => "B760M / DDR5 / Wi-Fi / Làm việc & Gaming",
    "ASUS ROG Strix B550-F Gaming WIFI II" => "B550 / DDR4 / Wi-Fi 6E / AMD Ryzen Gaming",

    // CPU
    "Intel Core i9-14900K" => "24 nhân / 32 luồng / Turbo cao / Gaming & Workstation",
    "Intel Core i7-14700K" => "20 nhân / Hiệu năng mạnh / Gaming đa nhiệm",
    "Intel Core i5-14600K" => "14 nhân / Gaming tầm trung cao cấp",
    "AMD Ryzen 9 9950X" => "16 nhân / Zen 5 / Hiệu năng cao cấp",
    "AMD Ryzen 7 9800X3D" => "8 nhân / 3D V-Cache / Gaming hàng đầu",
    "AMD Ryzen 5 9600X" => "6 nhân / Zen 5 / Gaming phổ thông",
    "Intel Core i3-14100F" => "4 nhân / Giá tốt / Không có iGPU",
    "AMD Ryzen 7 7800X3D" => "8 nhân / 3D V-Cache / Gaming cực mạnh",
    "Intel Core Ultra 7 265K" => "AI PC / Hiệu năng mới / Intel Ultra",
    "AMD Ryzen 5 5600" => "6 nhân / AM4 / Gaming giá tốt",

    // Headsets
    "Logitech G Pro X Gaming Headset" => "Gaming / Micro Blue VO!CE / DTS Headphone:X",
    "HyperX Cloud II" => "7.1 Surround / Êm tai / Gaming phổ biến",
    "Razer BlackShark V2" => "THX Spatial Audio / Micro rõ / Esports",
    "SteelSeries Arctis Nova 7 Wireless" => "Wireless / Đa nền tảng / Pin lâu",
    "Sony WH-1000XM5" => "Chống ồn cao cấp / Bluetooth / Âm thanh premium",
    "Bose QuietComfort Ultra Headphones" => "ANC cao cấp / Âm thanh không gian",
    "JBL Quantum 100" => "Gaming giá tốt / Micro tháo rời",
    "Corsair HS80 RGB Wireless" => "Wireless / Dolby Atmos / RGB",
    "Sennheiser HD 450BT" => "Bluetooth / Chống ồn / Pin dài",
    "ASUS ROG Delta S" => "USB-C / ESS DAC / RGB Gaming",

    // Routers
    "TP-Link Archer AX55" => "Wi-Fi 6 / AX3000 / Gia đình & Gaming",
    "ASUS RT-AX58U" => "Wi-Fi 6 / AiMesh / Bảo mật cao",
    "TP-Link Deco X20" => "Mesh Wi-Fi 6 / Phủ sóng toàn nhà",
    "ASUS TUF Gaming AX4200" => "Wi-Fi 6 / Gaming Router / Tăng tốc game",
    "Xiaomi Router AX3000T" => "Wi-Fi 6 / Giá tốt / Tốc độ cao",
    "Netgear Nighthawk AX12 RAX120" => "Wi-Fi 6 / AX6000 / Cao cấp",
    "TP-Link Archer C6" => "AC1200 / Dual-Band / Phổ thông",
    "ASUS RT-AX86U Pro" => "Wi-Fi 6 / Gaming / Độ trễ thấp",
    "Huawei AX3 Quad-Core" => "Wi-Fi 6+ / Quad-Core / Tín hiệu mạnh",
    "Linksys MR7350" => "Wi-Fi 6 / Mesh hỗ trợ / Gia đình",

    // PSU
    "Corsair RM750x" => "750W / 80+ Gold / Full Modular",
    "Cooler Master MWE Gold 750 V2" => "750W / 80+ Gold / Hiệu suất cao",
    "ASUS ROG Strix 850G" => "850W / 80+ Gold / Gaming cao cấp",
    "MSI MAG A650BN" => "650W / 80+ Bronze / Giá tốt",
    "Seasonic Focus GX-750" => "750W / 80+ Gold / Độ ổn định cao",
    "Corsair CV650" => "650W / 80+ Bronze / Phổ thông",
    "Gigabyte UD750GM" => "750W / Full Modular / 80+ Gold",
    "Thermaltake Toughpower GF A3 850W" => "850W / ATX 3.0 / PCIe 5.0",
    "DeepCool PK650D" => "650W / 80+ Bronze / Giá rẻ",
    "EVGA SuperNOVA 850 G6" => "850W / 80+ Gold / Full Modular",

    // Keyboards
    "Logitech G Pro X TKL Lightspeed" => "TKL Wireless / Gaming Esports / RGB",
    "Razer Huntsman V2" => "Optical Switch / RGB / Gaming cao cấp",
    "Corsair K100 RGB" => "RGB / Optical Switch / Flagship Gaming",
    "Logitech MX Keys S" => "Không dây / Văn phòng / Gõ êm",
    "Keychron K2 Wireless Mechanical Keyboard" => "Cơ không dây / Mac & Windows",
    "SteelSeries Apex Pro TKL" => "Hall Effect Switch / TKL / Esports",
    "ASUS ROG Azoth" => "Custom Gaming Keyboard / OLED / Wireless",
    "Dell KB216 Multimedia Keyboard" => "Văn phòng / Có phím multimedia",
    "HyperX Alloy Origins Core" => "TKL / Switch cơ / Gaming",
    "Logitech G213 Prodigy" => "Gaming membrane / RGB / Chống tràn",

    // Mice
    "Logitech G Pro X Superlight 2" => "Wireless / Siêu nhẹ / Esports",
    "Razer Viper V3 Pro" => "Wireless / Hiệu năng cao / FPS Gaming",
    "Logitech G502 X Lightspeed" => "Wireless / Nhiều nút / Gaming đa dụng",
    "Logitech MX Master 3S" => "Văn phòng / Silent Click / Productivity",
    "Razer DeathAdder V3 Pro" => "Công thái học / Wireless / Esports",
    "Logitech M720 Triathlon" => "Bluetooth / Đa thiết bị / Văn phòng",
    "SteelSeries Rival 3 Wireless" => "Wireless / Gaming giá tốt",
    "ASUS TUF Gaming M4 Wireless" => "Gaming wireless / Nhẹ / Pin lâu",
    "Corsair Ironclaw RGB Wireless" => "Gaming / Form lớn / RGB",
    "Microsoft Bluetooth Ergonomic Mouse" => "Bluetooth / Công thái học / Văn phòng",

    // GPU
    "NVIDIA GeForce RTX 4060" => "8GB GDDR6 / DLSS 3 / Gaming 1080p",
    "NVIDIA GeForce RTX 4070 SUPER" => "12GB GDDR6X / Ray Tracing / Gaming 1440p",
    "NVIDIA GeForce RTX 4080 SUPER" => "16GB GDDR6X / Hiệu năng cao cấp / 4K Gaming",
    "NVIDIA GeForce RTX 3060" => "12GB GDDR6 / Gaming phổ biến / Ray Tracing",
    "NVIDIA GeForce RTX 4090" => "24GB GDDR6X / Flagship / AI & 4K Gaming"
];

foreach ($specs as $title => $spec) {
    $updated = DB::table('product')->where('title', $title)->update(['specs' => $spec]);
    if ($updated) {
        echo "Updated: $title\n";
    } else {
        echo "Not found: $title\n";
    }
}

echo "Database update complete.\n";

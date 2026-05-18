<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$desktop_specs = [
    "Apple iMac 24-inch M3" => "Apple M3 / Integrated GPU / 16GB Unified Memory / 512GB SSD / 24-inch 4.5K Retina",
    "Dell OptiPlex 7010 Tower" => "i7-13700 / Intel UHD 770 / 16GB DDR5 / 512GB SSD / 300W PSU",
    "HP ProDesk 400 G9" => "i5-13500 / Intel UHD 770 / 16GB DDR4 / 512GB SSD / Wi-Fi 6",
    "Lenovo ThinkCentre M70t Gen 4" => "i7-13700 / Intel UHD 770 / 16GB DDR5 / 1TB SSD / Tower Design",
    "ASUS ROG G22CH" => "i9-14900KF / RTX 4070 Super / 32GB DDR5 / 2TB SSD / 750W Gold PSU",
    "MSI MAG Infinite S3" => "i7-14700F / RTX 4070 / 32GB DDR5 / 1TB SSD / 750W PSU",
    "Acer Predator Orion 3000" => "i7-14700F / RTX 4070 Super / 32GB DDR5 / 1TB SSD / Liquid Cooling",
    "Lenovo Legion Tower 5" => "Ryzen 7 9700X / RTX 4070 Ti Super / 32GB DDR5 / 2TB SSD / 850W PSU",
    "HP OMEN 40L" => "i9-14900K / RTX 4080 Super / 32GB DDR5 / 2TB SSD / 1000W Gold PSU",
    "Dell Alienware Aurora R16" => "i9-14900KF / RTX 4090 / 64GB DDR5 / 4TB SSD / Liquid Cooling",
    "ASUS ExpertCenter D7 Tower" => "i7-13700 / Intel UHD 770 / 16GB DDR5 / 1TB SSD / TPM Security",
    "Apple Mac Mini M3" => "Apple M3 / Integrated GPU / 16GB Unified Memory / 512GB SSD / Compact Desktop",
    "Apple Mac Studio M3 Max" => "Apple M3 Max / Integrated GPU / 36GB Unified Memory / 1TB SSD / Studio Desktop",
    "Corsair Vengeance i7400" => "i9-14900K / RTX 4090 / 64GB DDR5 / 4TB NVMe SSD / 1000W Gold PSU",
    "CyberPowerPC Gamer Xtreme" => "i7-14700F / RTX 4070 Super / 32GB DDR5 / 2TB SSD / RGB Gaming Case",
    "Gigabyte AORUS Model X" => "i9-14900K / RTX 4080 Super / 32GB DDR5 / 2TB SSD / 360mm Liquid Cooling",
    "Intel NUC 13 Pro" => "i7-1360P / Intel Iris Xe / 16GB DDR4 / 512GB SSD / Mini PC",
    "Fujitsu ESPRIMO D7012" => "i5-13500 / Intel UHD 770 / 16GB DDR4 / 512GB SSD / Business Tower",
    "Huawei MateStation S" => "Ryzen 7 5800H / Radeon Graphics / 16GB DDR4 / 512GB SSD / Compact Desktop",
    "Samsung All-in-One Pro" => "Intel Core Ultra 7 / Intel Arc Graphics / 16GB LPDDR5X / 1TB SSD / 27-inch 4K Display"
];

foreach ($desktop_specs as $title => $specs) {
    $updated = DB::table('product')->where('title', $title)->update(['specs' => $specs]);
    if ($updated) {
        echo "Updated: $title\n";
    } else {
        echo "Not found: $title\n";
    }
}

echo "Database update complete.\n";

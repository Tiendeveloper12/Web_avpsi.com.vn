<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$data = [
    "Apple MacBook Air 13 M3" => "Máy tính xách tay cao cấp siêu di động được thiết kế cho năng suất văn phòng, công việc sáng tạo và sử dụng hàng ngày. Có chip Apple M3, màn hình Liquid Retina 13,6 inch, thiết kế im lặng không quạt, bộ nhớ hợp nhất lên đến 24GB, bộ nhớ SSD, sạc MagSafe, thời lượng pin dài, khung nhôm nhẹ và hiệu suất macOS được tối ưu hóa.",
    "Apple MacBook Pro 14 M4 Pro" => "Máy tính xách tay cấp chuyên nghiệp được thiết kế cho người sáng tạo, nhà phát triển và khối lượng công việc năng suất nâng cao. Có chip Apple M4 Pro, màn hình Liquid Retina XDR 14 inch, GPU hiệu suất cao, kết nối Thunderbolt, cấu trúc bằng nhôm cao cấp, khả năng làm mát tiên tiến, thời lượng pin dài và loa chất lượng phòng thu.",
    "ASUS ROG Strix G16" => "Máy tính xách tay chơi game hiệu suất cao được thiết kế cho khối lượng công việc chơi game và sáng tạo cạnh tranh. Có bộ vi xử lý Intel Core i7 / i9, đồ họa NVIDIA GeForce RTX 4060/4070, màn hình 16 inch QHD 240Hz, hỗ trợ RAM DDR5, bộ nhớ SSD PCIe Gen 4, bàn phím RGB, hệ thống làm mát tiên tiến và kết nối Wi-Fi 6E.",
    "ASUS TUF Gaming A15" => "Máy tính xách tay chơi game phổ biến cung cấp hiệu suất chơi game mạnh mẽ và độ bền. Có bộ vi xử lý AMD Ryzen, đồ họa NVIDIA RTX 4050/4060, màn hình tốc độ làm mới cao 15,6 inch, độ bền cấp quân sự, làm mát bằng quạt kép, bộ nhớ DDR5 và thời lượng pin dài để chơi game và năng suất.",
    "Lenovo Legion Pro 5" => "Máy tính xách tay chơi game cao cấp được thiết kế để chơi game hiệu suất cao và đa nhiệm. Có bộ vi xử lý AMD Ryzen hoặc Intel Core, đồ họa NVIDIA RTX 4060/4070, màn hình 16 inch 240Hz, tản nhiệt Legion ColdFront, bàn phím RGB, bộ nhớ SSD tốc độ cao và tối ưu hóa chơi game được tăng cường AI.",
    "Lenovo IdeaPad Slim 5" => "Máy tính xách tay văn phòng và năng suất được mua rộng rãi với bộ vi xử lý AMD Ryzen hoặc Intel Core, khung nhôm nhẹ, màn hình IPS 14 inch hoặc 16 inch, bộ nhớ SSD nhanh, thời lượng pin dài, hỗ trợ Wi-Fi 6 và thiết kế di động mỏng hiện đại cho sinh viên và chuyên gia.",
    "Dell XPS 13" => "Ultrabook cao cấp được thiết kế cho các chuyên gia kinh doanh và người sáng tạo. Có bộ vi xử lý Intel Core Ultra, màn hình InfinityEdge, khung nhôm nhẹ, tùy chọn màn hình độ phân giải cao, kết nối Thunderbolt, thời lượng pin dài, bàn phím cao cấp và thiết kế nhỏ gọn siêu di động.",
    "Dell Inspiron 15" => "Máy tính xách tay văn phòng chính thống được sử dụng rộng rãi cho công việc, giáo dục và năng suất hàng ngày. Có bộ vi xử lý Intel Core, màn hình Full HD 15,6 inch, bộ nhớ SSD, bàn phím tiện dụng, đồ họa tích hợp, tùy chọn kết nối hiện đại và hiệu suất đáng tin cậy cho các tác vụ máy tính hàng ngày.",
    "HP Victus 15" => "Máy tính xách tay chơi game giá cả phải chăng có bộ vi xử lý Intel Core hoặc AMD Ryzen, đồ họa NVIDIA RTX, màn hình tốc độ làm mới cao 15,6 inch, hệ thống tản nhiệt tiên tiến, bàn phím chơi game, bộ nhớ SSD và hiệu suất linh hoạt để chơi game và đa nhiệm.",
    "HP Pavilion 14" => "Máy tính xách tay văn phòng và sinh viên nhẹ có bộ vi xử lý Intel Core, màn hình IPS Full HD, thiết kế nhỏ gọn, bộ nhớ SSD, hỗ trợ Wi-Fi 6, thời lượng pin dài và hiệu suất tính toán hàng ngày đáng tin cậy.",
    "Acer Nitro V 15" => "Máy tính xách tay chơi game phổ biến có bộ vi xử lý Intel Core, đồ họa NVIDIA RTX, màn hình tốc độ làm mới cao Full HD, hệ thống làm mát quạt kép, hỗ trợ bộ nhớ DDR5, bàn phím RGB và hiệu suất tập trung vào chơi game giá cả phải chăng.",
    "Acer Aspire 5" => "Máy tính xách tay phổ thông bán chạy nhất được thiết kế cho công việc văn phòng, giáo dục và sử dụng tại nhà. Có bộ vi xử lý Intel Core hoặc AMD Ryzen, màn hình Full HD, bộ nhớ SSD, thiết kế mỏng, thời lượng pin đáng tin cậy và các tùy chọn kết nối linh hoạt.",
    "MSI Katana 15" => "Máy tính xách tay chơi game được thiết kế để mang lại hiệu suất chơi game mượt mà và quy trình làm việc của người sáng tạo. Có bộ vi xử lý Intel Core, đồ họa NVIDIA RTX 4060, màn hình tốc độ làm mới cao 15,6 inch, hệ thống tản nhiệt Cooler Boost, bàn phím RGB và hỗ trợ SSD PCIe.",
    "MSI Modern 14" => "Máy tính xách tay năng suất mỏng và nhẹ được thiết kế cho mục đích kinh doanh và giáo dục. Có bộ vi xử lý Intel Core, khung nhôm nhỏ gọn, màn hình IPS Full HD, bộ nhớ SSD, kết nối hiện đại và hiệu suất pin dài.",
    "Razer Blade 16" => "Máy tính xách tay dành cho người sáng tạo và chơi game cao cấp có bộ vi xử lý Intel Core i9, đồ họa NVIDIA RTX 4080/4090, màn hình tốc độ làm mới cao QHD+, thân máy bằng nhôm CNC, làm mát buồng hơi tiên tiến, bàn phím RGB và hiệu suất di động cao cấp.",
    "Microsoft Surface Laptop 6" => "Ultrabook chuyên nghiệp được thiết kế cho năng suất văn phòng và môi trường kinh doanh. Có bộ vi xử lý Intel Core Ultra, màn hình cảm ứng PixelSense, thiết kế nhẹ, bàn phím cao cấp, các tính năng Windows tăng cường AI và thời lượng pin dài.",
    "LG Gram 16" => "Máy tính xách tay năng suất siêu nhẹ có bộ vi xử lý Intel Core, màn hình độ phân giải cao 16 inch, khung hợp kim magiê siêu di động, thời lượng pin dài, kết nối Thunderbolt và hiệu suất chuyên nghiệp tập trung vào văn phòng.",
    "Huawei MateBook D 16" => "Máy tính xách tay năng suất hiện đại có bộ vi xử lý Intel Core, màn hình FullView 16 inch, thiết kế nhôm mỏng, bộ nhớ SSD, hỗ trợ cộng tác đa màn hình, nút nguồn vân tay và hiệu suất đa nhiệm văn phòng mạnh mẽ.",
    "Gigabyte G5 KF" => "Máy tính xách tay chơi game được thiết kế cho các game thủ và người sáng tạo chính thống. Có bộ vi xử lý Intel Core, đồ họa NVIDIA RTX, màn hình chơi game 144Hz, hệ thống tản nhiệt tiên tiến, RAM và bộ nhớ có thể mở rộng cũng như hiệu suất chơi game mạnh mẽ với mức giá cạnh tranh.",
    "Samsung Galaxy Book4 Pro" => "Máy tính xách tay năng suất cao cấp có bộ vi xử lý Intel Core Ultra, màn hình cảm ứng AMOLED, thiết kế nhôm nhẹ, bộ nhớ SSD nhanh, hỗ trợ Wi-Fi 6E, tích hợp hệ sinh thái Samsung và hiệu quả pin mạnh mẽ cho người dùng doanh nghiệp."
];

$count = 0;
$notFound = [];

DB::beginTransaction();
try {
    foreach ($data as $title => $desc) {
        $product = DB::table('product')->where('title', trim($title))->first();
        if (!$product) {
            $product = DB::table('product')->where('title', 'like', trim($title) . '%')->first();
        }
        
        if ($product) {
            $htmlDesc = "<p>" . $desc . "</p>";
            // Update product table
            DB::table('product')
                ->where('id', $product->id)
                ->update([
                    'description' => $desc,
                    'content' => $htmlDesc,
                    'updated_at' => now()
                ]);
                
            // Update product_translations table
            DB::table('product_translations')
                ->where('product_id', $product->id)
                ->where('lang', 'vi')
                ->update([
                    'description' => $desc,
                    'content' => $htmlDesc,
                    'updated_at' => now()
                ]);
                
            $count++;
            echo "Updated description & content for ID {$product->id}: {$product->title}\n";
        } else {
            $notFound[] = $title;
        }
    }
    DB::commit();
    echo "\nSUCCESS: Updated descriptions for $count products.\n";
    if (!empty($notFound)) {
        echo "Not found (" . count($notFound) . "): " . implode(', ', $notFound) . "\n";
    }
} catch (\Exception $e) {
    DB::rollBack();
    echo "ERROR: " . $e->getMessage() . "\n";
}

<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$data = [
    "Apple iMac 24-inch M3" => "Máy tính để bàn tất cả trong một cao cấp được thiết kế cho năng suất văn phòng, công việc sáng tạo và môi trường chuyên nghiệp. Có chip Apple M3, màn hình Retina 24K 4,5 inch, thiết kế nhôm siêu mỏng, kiến trúc bộ nhớ hợp nhất, bộ nhớ SSD, tích hợp hệ sinh thái macOS, hỗ trợ Magic Keyboard và Mouse và loa chất lượng phòng thu.",
    "Dell OptiPlex 7010 Tower" => "Máy tính để bàn văn phòng được sử dụng rộng rãi được thiết kế cho năng suất kinh doanh và môi trường doanh nghiệp. Có bộ vi xử lý Intel Core, RAM và bộ nhớ có thể mở rộng, các tính năng bảo mật tích hợp, thiết kế tháp nhỏ gọn, hỗ trợ nhiều màn hình và hiệu suất đa nhiệm văn phòng đáng tin cậy.",
    "HP ProDesk 400 G9" => "Máy tính để bàn văn phòng chuyên nghiệp được thiết kế cho mục đích kinh doanh và giáo dục. Có bộ xử lý Intel Core, hỗ trợ bộ nhớ DDR4/DDR5, bộ nhớ SSD, công cụ bảo mật doanh nghiệp, khung tháp nhỏ gọn và hiệu suất năng suất đáng tin cậy cho quy trình làm việc văn phòng.",
    "Lenovo ThinkCentre M70t Gen 4" => "Máy tính để bàn tập trung vào doanh nghiệp có bộ xử lý Intel Core, bộ nhớ có thể mở rộng, bộ nhớ SSD PCIe, độ tin cậy cấp doanh nghiệp, nhiều cổng USB, hỗ trợ bảo mật TPM và hiệu suất văn phòng hiệu quả.",
    "ASUS ROG G22CH" => "Máy tính để bàn chơi game hiệu suất cao nhỏ gọn với bộ vi xử lý Intel Core i7/i9, đồ họa NVIDIA GeForce RTX 4060/4070, ánh sáng RGB, hệ thống tản nhiệt tiên tiến, bộ nhớ DDR5, bộ nhớ SSD PCIe Gen 4 và thiết kế tập trung vào chơi game cao cấp.",
    "MSI MAG Infinite S3" => "Máy tính để bàn chơi game được thiết kế cho thể thao điện tử và hiệu suất chơi game chính thống. Có bộ vi xử lý Intel Core, đồ họa NVIDIA RTX, hệ thống tản nhiệt RGB, khung máy chơi game nhỏ gọn, bộ nhớ SSD tốc độ cao và quản lý nhiệt mạnh mẽ cho khối lượng công việc chơi game.",
    "Acer Predator Orion 3000" => "Máy tính để bàn chơi game phổ biến được thiết kế để chơi game và sáng tạo nội dung có tốc độ làm mới cao. Có bộ xử lý Intel Core, đồ họa NVIDIA RTX, ánh sáng RGB, làm mát luồng không khí tiên tiến, bộ nhớ SSD PCIe và tính thẩm mỹ khung máy tập trung vào game thủ.",
    "Lenovo Legion Tower 5" => "Máy tính để bàn chơi game hiệu suất cao có bộ xử lý AMD Ryzen hoặc Intel Core, đồ họa NVIDIA RTX, tản nhiệt tiên tiến, ánh sáng RGB, các thành phần có thể mở rộng và hiệu suất chơi game và đa nhiệm mạnh mẽ.",
    "HP OMEN 40L" => "Máy tính để bàn chơi game cao cấp được thiết kế cho các game thủ và streamer đam mê. Có bộ vi xử lý Intel Core hoặc AMD Ryzen, đồ họa NVIDIA RTX, tùy chọn làm mát bằng chất lỏng, khung kính cường lực, tích hợp hệ sinh thái RGB và kiến trúc làm mát luồng không khí cao.",
    "Dell Alienware Aurora R16" => "Máy tính để bàn chơi game hàng đầu có bộ vi xử lý Intel Core i9, đồ họa NVIDIA GeForce RTX 4080/4090, tản nhiệt Cryo-tech tiên tiến, thiết kế khung máy tương lai cao cấp, bộ nhớ DDR5 và hiệu suất chơi game ưu tú dành cho người sáng tạo và chơi game AAA.",
    "ASUS ExpertCenter D7 Tower" => "Máy tính để bàn văn phòng chuyên nghiệp được thiết kế cho khối lượng công việc của công ty và năng suất. Có bộ xử lý Intel Core, hỗ trợ bảo mật doanh nghiệp, thiết kế tháp nhỏ gọn, bộ nhớ SSD, làm mát hiệu quả và hiệu suất đa nhiệm ổn định.",
    "Apple Mac Mini M3" => "Máy tính để bàn nhỏ gọn được thiết kế cho năng suất văn phòng, lập trình và quy trình làm việc sáng tạo. Có chip Apple M3, thiết kế bằng nhôm nhỏ gọn, kiến trúc bộ nhớ hợp nhất, bộ nhớ SSD, kết nối Thunderbolt, hoạt động im lặng và tối ưu hóa macOS.",
    "Apple Mac Studio M3 Max" => "Máy trạm chuyên nghiệp dành cho máy tính để bàn được thiết kế cho người sáng tạo, nhà phát triển và khối lượng công việc AI. Có chip Apple M3 Max, hiệu suất GPU tiên tiến, dung lượng bộ nhớ hợp nhất cao, bộ nhớ SSD cực nhanh, nhiều cổng Thunderbolt và thiết kế máy trạm nhỏ gọn.",
    "Corsair Vengeance i7400" => "Máy tính để bàn chơi game cao cấp có bộ vi xử lý Intel Core i9, đồ họa NVIDIA RTX 4080, hệ thống làm mát bằng chất lỏng, bộ nhớ DDR5, khung luồng gió cao cấp, ánh sáng RGB và hiệu suất chơi game và phát trực tuyến ở cấp độ người đam mê.",
    "CyberPowerPC Gamer Xtreme" => "PC chơi game dựng sẵn phổ biến được thiết kế để chơi game và phát trực tuyến phổ biến. Có bộ vi xử lý Intel Core, đồ họa NVIDIA RTX, vỏ kính cường lực, quạt RGB, bộ nhớ SSD và hiệu suất chơi game tập trung vào giá trị mạnh mẽ.",
    "Gigabyte AORUS Model X" => "Máy tính để bàn chơi game cao cấp được thiết kế để chơi game cao cấp và hiệu suất của người sáng tạo. Có bộ vi xử lý Intel Core i9, đồ họa NVIDIA RTX, đèn RGB Fusion, hệ thống tản nhiệt tiên tiến, SSD PCIe Gen 4 và tính thẩm mỹ chơi game cao cấp.",
    "Intel NUC 13 Pro" => "Máy tính để bàn mini nhỏ gọn được thiết kế cho năng suất văn phòng và sử dụng chuyên nghiệp. Có bộ xử lý Intel Core, hệ số hình thức siêu nhỏ, hỗ trợ lưu trữ SSD, nhiều đầu ra màn hình, hoạt động tiết kiệm năng lượng và tích hợp không gian làm việc linh hoạt.",
    "Fujitsu ESPRIMO D7012" => "Máy tính để bàn dành cho doanh nghiệp đáng tin cậy được thiết kế cho năng suất doanh nghiệp và văn phòng. Có bộ xử lý Intel Core, khung máy nhỏ gọn, các tính năng bảo mật doanh nghiệp, hoạt động tiết kiệm năng lượng, hỗ trợ lưu trữ SSD và độ tin cậy lâu dài ổn định.",
    "Huawei MateStation S" => "Máy tính để bàn văn phòng hiện đại có bộ vi xử lý AMD Ryzen, khung máy tối giản nhỏ gọn, bộ nhớ SSD, đồ họa tích hợp, kết nối không dây và hiệu suất năng suất đáng tin cậy cho môi trường kinh doanh và giáo dục.",
    "Samsung All-in-One Pro" => "Máy tính để bàn tất cả trong một cao cấp được thiết kế để sử dụng văn phòng và đa phương tiện. Có bộ vi xử lý Intel Core, màn hình Full HD lớn, thiết kế tối giản mỏng, webcam và loa tích hợp, bộ nhớ SSD và hiệu suất tập trung vào năng suất."
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

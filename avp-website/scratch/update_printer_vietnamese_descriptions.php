<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$data = [
    "HP LaserJet Pro M404dn" => "Máy in laser đơn sắc tốc độ cao được thiết kế cho năng suất văn phòng và môi trường kinh doanh. Có tốc độ in lên đến 40 trang/phút, in hai mặt tự động, kết nối Ethernet, độ phân giải 1200 x 1200 dpi, dung lượng đầu vào 350 tờ, hoạt động tiết kiệm năng lượng và các tính năng bảo mật cấp doanh nghiệp cho quy trình làm việc văn phòng chuyên nghiệp.",
    "Canon imageCLASS LBP2900" => "Máy in laser đơn sắc nhỏ gọn được sử dụng rộng rãi được biết đến với độ tin cậy và giá cả phải chăng. Có công nghệ in Canon CAPT, kết nối USB, độ phân giải in 2400 x 600 dpi, thời gian khởi động nhanh, thiết kế máy tính để bàn nhỏ gọn và in hiệu quả cho văn phòng và doanh nghiệp gia đình.",
    "Brother HL-L2366DW" => "Máy in laser đơn sắc phổ biến có kết nối không dây, in hai mặt tự động, tốc độ in 30 trang/phút, hỗ trợ in di động, thiết kế nhỏ gọn thân thiện với văn phòng và hiệu suất in tài liệu khối lượng lớn đáng tin cậy.",
    "Epson EcoTank L3250" => "Máy in bình mực tất cả trong một bán chạy nhất có chức năng in, quét và sao chép. Bao gồm kết nối Wi-Fi, hệ thống bình mực chi phí cực thấp, năng suất trang cao, hỗ trợ in không viền, thiết kế nhỏ gọn và hiệu suất in tại nhà và văn phòng hiệu quả.",
    "Canon PIXMA G3010" => "Máy in bình mực có thể nạp lại phổ biến được thiết kế cho gia đình và văn phòng. Có kết nối không dây, chức năng in/quét/sao chép, lọ mực năng suất cao, in ảnh không viền, thiết kế nhỏ gọn và chi phí vận hành thấp.",
    "HP Smart Tank 580" => "Máy in bình mực hiện đại được thiết kế để in số lượng lớn với chi phí thấp. Có khả năng kết nối không dây, hỗ trợ in di động, hệ thống bình mực tích hợp, chức năng in / quét / sao chép, năng suất trang cao và thiết kế nạp lại dễ dàng cho mục đích sử dụng văn phòng và giáo dục.",
    "Brother DCP-T720DW" => "Máy in đa chức năng bình mực hiệu quả cao có tính năng in hai mặt, kết nối không dây, khay nạp tài liệu tự động, chức năng in/quét/sao chép, hệ thống mực có thể nạp lại và hiệu suất in tài liệu kinh doanh đáng tin cậy.",
    "Canon imageCLASS MF3010" => "Máy in laser đa chức năng nhỏ gọn cung cấp chức năng in, quét và sao chép. Tính năng in laser đơn sắc, kết nối USB, thiết kế nhỏ gọn thân thiện với văn phòng, thời gian in đầu tiên nhanh chóng và xử lý tài liệu văn phòng hàng ngày đáng tin cậy.",
    "HP LaserJet Pro MFP M428fdw" => "Máy in laser đa chức năng cấp doanh nghiệp được thiết kế cho năng suất kinh doanh. Có chức năng in/quét/sao chép/fax, mạng không dây, in hai mặt tự động, hiển thị màn hình cảm ứng, các tính năng bảo mật nâng cao và xử lý tài liệu văn phòng tốc độ cao.",
    "Brother HL-L3270CDW" => "Máy in laser màu đáng tin cậy có kết nối không dây, in hai mặt, điều khiển màn hình cảm ứng, đầu ra màu độ phân giải cao, hỗ trợ in di động và thiết kế nhỏ gọn theo định hướng kinh doanh cho năng suất văn phòng.",
    "Xerox Phaser 6510DN" => "Máy in laser màu chuyên nghiệp được thiết kế để in tài liệu văn phòng. Tính năng in hai mặt tự động, kết nối Ethernet, tái tạo màu sắc sống động, độ phân giải in cao, tốc độ in nhanh và độ tin cậy cao cho môi trường kinh doanh.",
    "Pantum P2500W" => "Máy in laser đơn sắc giá cả phải chăng được thiết kế cho các doanh nghiệp nhỏ và văn phòng tại nhà. Tính năng in không dây, thiết kế nhỏ gọn, tốc độ in nhanh, kết nối USB và khả năng in tài liệu chi phí thấp đáng tin cậy.",
    "Epson EcoTank M3170" => "Máy in đa chức năng bình mực đơn sắc được thiết kế để in văn phòng chi phí cực thấp. Tính năng in hai mặt, kết nối Wi-Fi, khay nạp tài liệu tự động, hệ thống bình mực năng suất cao và quản lý tài liệu kinh doanh hiệu quả.",
    "HP Color LaserJet Pro M255dw" => "Máy in laser màu nhỏ gọn có tính năng in hai mặt, mạng không dây, đầu ra màu sống động, hỗ trợ in di động, tính năng bảo mật doanh nghiệp và hiệu suất văn phòng mạnh mẽ.",
    "Epson L3210" => "Máy in bình mực đa chức năng được mua rộng rãi có chức năng in / quét / sao chép, in chi phí cực thấp, thiết kế nhỏ gọn, năng suất trang cao và hiệu suất in văn phòng và giáo dục hàng ngày đáng tin cậy."
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

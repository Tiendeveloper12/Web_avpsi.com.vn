<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$data = [
    155 => "Máy photocopy Ricoh MP 3352 là dòng máy văn phòng đa chức năng phù hợp cho doanh nghiệp vừa và nhỏ. Thiết bị hỗ trợ copy, in mạng và scan màu với tốc độ lên đến 33 trang/phút. Máy vận hành ổn định, tiết kiệm chi phí và hỗ trợ đảo mặt tự động tiện lợi. Thiết kế bền bỉ giúp đáp ứng tốt nhu cầu sử dụng liên tục trong môi trường văn phòng.",
    156 => "Ricoh MP 4002 là dòng máy photocopy trắng đen hiệu suất cao dành cho môi trường làm việc chuyên nghiệp. Máy hỗ trợ in mạng và scan tài liệu nhanh chóng với tốc độ 40 trang/phút. Hệ thống xử lý ổn định giúp tối ưu hiệu quả công việc hàng ngày. Thiết bị phù hợp cho văn phòng có nhu cầu in ấn và sao chép số lượng lớn.",
    157 => "Ricoh MP 5002 mang đến khả năng photocopy và in ấn mạnh mẽ với tốc độ lên đến 50 trang/phút. Máy hỗ trợ in mạng, đảo mặt tự động và xử lý tài liệu nhanh chóng cho doanh nghiệp. Thiết kế hiện đại cùng độ bền cao giúp thiết bị hoạt động ổn định trong thời gian dài. Đây là lựa chọn phù hợp cho văn phòng có khối lượng công việc lớn.",
    158 => "Ricoh MP 301 SPF là máy photocopy đa chức năng tích hợp copy, in, scan và fax trong một thiết bị nhỏ gọn. Máy có tốc độ in 30 trang/phút, phù hợp cho văn phòng vừa và nhỏ. Hỗ trợ kết nối mạng giúp chia sẻ in ấn thuận tiện giữa nhiều người dùng. Thiết kế tiết kiệm không gian nhưng vẫn đảm bảo hiệu suất làm việc ổn định.",
    159 => "Ricoh MP 3054 là dòng máy photocopy trắng đen hiện đại với giao diện màn hình cảm ứng dễ sử dụng. Máy hỗ trợ in mạng, scan tài liệu và xử lý công việc văn phòng hiệu quả với tốc độ 30 trang/phút. Thiết bị được thiết kế tối ưu cho môi trường doanh nghiệp chuyên nghiệp. Khả năng vận hành ổn định giúp tiết kiệm thời gian và chi phí sử dụng.",
    160 => "Ricoh MP 3055 là máy photocopy đa chức năng hỗ trợ copy, in và scan với khả năng đảo mặt tự động tiện lợi. Thiết bị có tốc độ in 30 trang/phút, đáp ứng tốt nhu cầu làm việc hằng ngày của văn phòng. Màn hình điều khiển trực quan giúp thao tác dễ dàng và nhanh chóng. Máy hoạt động ổn định, tiết kiệm điện năng và chi phí vận hành.",
    161 => "Ricoh MP 3554 được thiết kế cho môi trường văn phòng cần xử lý tài liệu nhanh và liên tục. Máy hỗ trợ photocopy, in mạng và scan màu với tốc độ 35 trang/phút. Hệ thống vận hành bền bỉ giúp nâng cao hiệu suất công việc và giảm thời gian chờ đợi. Thiết bị phù hợp cho doanh nghiệp có nhu cầu in ấn và sao chép thường xuyên.",
    162 => "Ricoh MPC 6003 là dòng máy photocopy màu cao cấp dành cho doanh nghiệp và trung tâm in ấn chuyên nghiệp. Máy hỗ trợ in màu, scan mạng và photocopy tốc độ cao lên đến 60 trang/phút. Chất lượng bản in sắc nét cùng khả năng xử lý tài liệu mạnh mẽ giúp tối ưu hiệu quả công việc. Thiết bị phù hợp cho môi trường yêu cầu in màu số lượng lớn và liên tục."
];

DB::beginTransaction();

try {
    foreach ($data as $id => $desc) {
        // Update product table
        DB::table('product')
            ->where('id', $id)
            ->update([
                'description' => $desc,
                'updated_at' => now()
            ]);
            
        // Update product_translations table
        DB::table('product_translations')
            ->where('product_id', $id)
            ->where('lang', 'vi')
            ->update([
                'content' => "<p>" . $desc . "</p>",
                'updated_at' => now()
            ]);
            
        echo "Updated photocopy ID $id successfully.\n";
    }
    DB::commit();
    echo "SUCCESS: All 8 photocopy descriptions updated!\n";
} catch (\Exception $e) {
    DB::rollBack();
    echo "ERROR: " . $e->getMessage() . "\n";
}

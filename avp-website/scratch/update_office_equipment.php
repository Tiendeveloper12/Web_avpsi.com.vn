<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$office_specs = [
    // Time attendance machines
    "Ronald Jack RJ550A" => "Vân tay & thẻ từ / Màn hình màu / Kết nối TCP/IP",
    "ZKTeco MB20" => "Nhận diện khuôn mặt / Vân tay / Wi-Fi hỗ trợ",
    "Hikvision DS-K1T804MF" => "Vân tay & thẻ Mifare / TCP/IP / Kiểm soát ra vào",
    "Suprema BioStation 3" => "Nhận diện khuôn mặt AI / Bảo mật cao / Doanh nghiệp",
    "Dahua DHI-ASI1212F" => "Vân tay / Thẻ từ / Màn hình LCD",

    // Paper shredders
    "Fellowes Powershred 79Ci" => "Hủy vụn / Chống kẹt giấy / Văn phòng",
    "Bonsaii C149-C" => "Hủy chéo / 18 tờ / Thùng chứa lớn",
    "Aurora AS890C" => "Hủy vụn / Bảo mật cao / Nhỏ gọn",
    "Rexel Momentum X410" => "Hủy chéo / 10 tờ / Chống quá nhiệt",
    "HSM Shredstar X10" => "Hủy tài liệu / Độ ồn thấp / Văn phòng nhỏ",

    // Bill printers
    "Epson TM-T82III" => "In nhiệt / 80mm / LAN & USB",
    "Xprinter XP-Q200II" => "In hóa đơn nhiệt / 80mm / Giá tốt",
    "Rongta RP326" => "In nhiệt tốc độ cao / USB / POS bán hàng",
    "Star Micronics TSP143III" => "In nhiệt / LAN-Wi-Fi / POS chuyên nghiệp",
    "Bixolon SRP-350III" => "In hóa đơn 80mm / USB / Tốc độ cao",

    // Scanners
    "Epson Perfection V39 II" => "Scanner phẳng / USB / Quét ảnh tài liệu",
    "Canon CanoScan LiDE 400" => "Scanner mỏng nhẹ / 4800dpi / USB-C",
    "Fujitsu fi-8170" => "Scanner tốc độ cao / ADF / Doanh nghiệp",
    "Brother ADS-2200" => "Scanner tài liệu / Duplex / USB 3.0",
    "HP ScanJet Pro 2600 f1" => "Scanner văn phòng / ADF / Quét hai mặt",

    // Projectors
    "Epson EB-X06" => "XGA / 3600 Lumens / Văn phòng & lớp học",
    "BenQ MX560" => "XGA / 4000 Lumens / Máy chiếu doanh nghiệp",
    "ViewSonic PA503X" => "XGA / 3800 Lumens / Giải trí & học tập",
    "Optoma EH412" => "Full HD / 4500 Lumens / Hội họp chuyên nghiệp",
    "Xiaomi Smart Projector 2" => "Full HD / Android TV / Chiếu thông minh"
];

foreach ($office_specs as $title => $spec) {
    $updated = DB::table('product')->where('title', $title)->update(['specs' => $spec]);
    if ($updated) {
        echo "Updated: $title\n";
    } else {
        echo "Not found: $title\n";
    }
}

echo "Database update complete.\n";

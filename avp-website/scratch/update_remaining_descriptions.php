<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$data = [
    "HP 67 Black Ink Cartridge" => "Hộp mực HP chính hãng được thiết kế để in ấn hàng ngày đáng tin cậy. Có mực đen dựa trên bột màu, chất lượng văn bản sắc nét, khả năng tương thích với máy in HP DeskJet và ENVY, khả năng năng suất tiêu chuẩn, đầu ra chống nhòe và thiết kế lắp đặt dễ dàng.",
    "HP 67 Tri-Color Ink Cartridge" => "Hộp mực ba màu chính hãng của HP được thiết kế để in màu rực rỡ. Có mực lục lam, đỏ tươi và vàng, đầu ra chất lượng ảnh, khả năng tương thích với dòng máy in HP DeskJet và ENVY và hiệu suất năng suất trang đáng tin cậy.",
    "HP 680 Black Ink Cartridge" => "Hộp mực HP được sử dụng rộng rãi được thiết kế để in tại nhà và văn phòng. Có mực đen chống phai màu, chất lượng in ổn định, khả năng tương thích với máy in HP Ink Advantage và hiệu suất được tối ưu hóa để in tài liệu.",
    "HP 680 Color Ink Cartridge" => "Hộp mực màu HP chính hãng được thiết kế để in hình ảnh và tài liệu sống động. Có hệ thống mực ba màu tích hợp, dòng mực đáng tin cậy, khả năng tương thích với máy in HP Ink Advantage và khả năng in ảnh chất lượng cao.",
    "HP 954 Black Ink Cartridge" => "Hộp mực HP OfficeJet cấp chuyên nghiệp được thiết kế để in ấn cho doanh nghiệp. Có mực bột màu đen năng suất cao, tài liệu chống nước, khả năng tương thích với máy in HP OfficeJet Pro và đầu ra chất lượng doanh nghiệp.",
    "HP GT53 Black Ink Bottle" => "Lọ mực HP Smart Tank có thể nạp lại được thiết kế để in với chi phí cực thấp. Có năng suất trang cao, hệ thống nạp lại không tràn, công thức mực đen đậm và khả năng tương thích với máy in HP Smart Tank.",
    "HP GT52 Color Ink Bottle" => "Lọ mực màu HP dung lượng cao được thiết kế cho máy in Smart Tank. Có các tùy chọn mực lục lam, đỏ tươi và vàng, khả năng in năng suất cao, tái tạo màu sắc sống động và công nghệ nạp lại dễ dàng.",
    "Epson 003 Black Ink Bottle" => "Lọ mực Epson EcoTank phổ biến được thiết kế để in số lượng lớn. Có mực đen sắc tố, năng suất trang cực cao, vòi nạp không tràn và khả năng tương thích với máy in Epson EcoTank.",
    "Epson 003 Cyan Ink Bottle" => "Lọ mực lục lam Epson chính hãng được thiết kế cho máy in EcoTank. Có đầu ra màu sắc sống động, năng suất trang cao, hiệu suất chống phai màu và thiết kế nạp lại chính xác để in chi phí thấp.",
    "Epson 003 Magenta Ink Bottle" => "Lọ mực Epson màu đỏ tươi dung lượng cao có hiệu suất màu sắc sống động, khả năng tương thích EcoTank, công nghệ nạp lại chống tràn và chất lượng in lâu dài cho ảnh và tài liệu.",
    "Epson 003 Yellow Ink Bottle" => "Lọ mực màu vàng Epson EcoTank được thiết kế để in hình ảnh và đồ họa sống động. Có sản lượng năng suất cao, công thức mực chống phai màu và hoạt động nạp lại đáng tin cậy.",
    "Epson 664 Black Ink Bottle" => "Lọ mực nạp lại Epson được mua rộng rãi được thiết kế cho máy in EcoTank. Tính năng in chi phí cực thấp, năng suất trang cao, mực đen sắc tố và hiệu suất tối ưu hóa để in tài liệu.",
    "Epson 664 Cyan Ink Bottle" => "Chai nạp lục lam Epson chính hãng có năng suất trang cao, đầu ra màu sắc sống động, khả năng tương thích EcoTank và hiệu suất in đáng tin cậy cho mục đích kinh doanh và gia đình.",
    "Epson T673 Photo Black Ink Bottle" => "Mực đen ảnh Epson cao cấp được thiết kế cho máy in ảnh và đầu ra hình ảnh chuyên nghiệp. Có tông màu đen sâu, chất lượng in độ phân giải cao và khả năng tương thích với máy in ảnh Epson L-series.",
    "OKI C332 Black Toner Cartridge" => "Hộp mực chính hãng OKI được thiết kế để in đơn sắc đáng tin cậy. Có công nghệ in laser, đầu ra văn bản sắc nét, khả năng tương thích với máy in dòng OKI C332 và hiệu suất mực ổn định.",
    "OKI C332 Cyan Toner Cartridge" => "Hộp mực màu lục lam chính hãng OKI được thiết kế để in laser màu sắc sống động. Có đầu ra màu độ phân giải cao, dòng mực đáng tin cậy và khả năng tương thích với máy in laser màu OKI.",
    "OKI C332 Magenta Toner Cartridge" => "Hộp mực màu đỏ tươi OKI chất lượng cao được thiết kế để in màu chuyên nghiệp. Có chất lượng in nhất quán, đầu ra chính xác bằng laser và hiệu suất năng suất trang ổn định.",
    "OKI C332 Yellow Toner Cartridge" => "Hộp mực màu vàng chính hãng của OKI có khả năng tái tạo màu sắc rực rỡ, phân phối mực mượt mà và khả năng tương thích với máy in dòng OKI C332.",
    "OKI B412 Black Toner Cartridge" => "Hộp mực đơn sắc đáng tin cậy được thiết kế cho máy in doanh nghiệp OKI. Có đầu ra tài liệu sắc nét, năng suất trang cao, tính nhất quán in bền và khả năng in văn phòng hiệu quả.",
    "OKI MC363 Black Toner Cartridge" => "Hộp mực OKI chuyên nghiệp được thiết kế cho máy in laser đa chức năng. Có chất lượng in đen phong phú, hiệu suất mực ổn định và đầu ra in doanh nghiệp đáng tin cậy.",
    "OKI MC363 Cyan Toner Cartridge" => "Mực lục lam OKI chính hãng được thiết kế cho máy in văn phòng đa chức năng. Có chất lượng màu sắc sống động, sử dụng mực hiệu quả và hiệu suất in laser độ phân giải cao.",
    "Canon GI-790 Black Ink Bottle" => "Lọ mực nạp chính hãng của Canon được thiết kế cho máy in PIXMA G-series. Có năng suất trang cao, mực đen sắc tố, hệ thống nạp lại chống tràn và hiệu suất in tài liệu chi phí thấp.",
    "Canon GI-790 Cyan Ink Bottle" => "Chai nạp lục lam chính hãng của Canon có đầu ra màu sắc sống động, dòng mực mượt mà, khả năng tương thích với máy in PIXMA G-series và chất lượng in ảnh đáng tin cậy.",
    "Canon GI-790 Magenta Ink Bottle" => "Lọ mực màu đỏ tươi dung lượng cao của Canon được thiết kế để in hình ảnh sống động và đồ họa văn phòng. Có hiệu suất nạp lại ổn định và độ chính xác màu tuyệt vời.",
    "Canon GI-790 Yellow Ink Bottle" => "Chai nạp lại màu vàng của Canon được thiết kế để có đồ họa sống động và in ảnh. Có hiệu suất màu chống phai màu và khả năng in năng suất cao.",
    "Canon PG-745 Black Ink Cartridge" => "Hộp mực đen phổ biến của Canon được thiết kế cho máy in PIXMA. Có mực đen sắc tố, in tài liệu sắc nét, phân phối mực đáng tin cậy và lắp đặt hộp mực dễ dàng.",
    "Canon CL-746 Color Ink Cartridge" => "Hộp mực màu chính hãng của Canon được thiết kế để in ảnh và tài liệu sống động. Có hệ thống mực ba màu, chất lượng hình ảnh sống động và khả năng tương thích với máy in PIXMA.",
    "Canon Cartridge 325 Toner" => "Hộp mực laser Canon được sử dụng rộng rãi được thiết kế để in văn phòng đơn sắc. Có đầu ra văn bản sắc nét, năng suất trang đáng tin cậy và khả năng tương thích với máy in Canon imageCLASS.",
    "Brother BT-D60 Black Ink Bottle" => "Lọ mực nạp lại Brother chính hãng được thiết kế cho máy in InkBenefit Tank. Có năng suất trang cực cao, mực đen sắc tố và hiệu suất in văn phòng chi phí thấp đáng tin cậy.",
    "Brother BT5000 Cyan Ink Bottle" => "Chai nạp lục lam Brother chính hãng được thiết kế để in màu sắc sống động và hiệu suất dòng mực mượt mà. Tương thích với máy in bình mực Brother.",
    "Brother BT5000 Magenta Ink Bottle" => "Lọ mực Brother màu đỏ tươi dung lượng cao được thiết kế để in đồ họa và hình ảnh sống động. Có thiết kế nạp lại đáng tin cậy và chất lượng in nhất quán.",
    "Brother BT5000 Yellow Ink Bottle" => "Chai nạp lại màu vàng Brother được thiết kế để in tài liệu và hình ảnh đầy màu sắc. Có năng suất trang cao và hiệu suất tối ưu cho máy in Brother.",
    "Brother TN-2385 Black Toner Cartridge" => "Hộp mực đơn sắc Brother phổ biến được thiết kế cho máy in văn phòng laser. Có văn bản màu đen sắc nét, năng suất trang đáng tin cậy và hiệu suất in văn phòng nhất quán.",
    "Brother TN-261 Cyan Toner Cartridge" => "Hộp mực lục lam Brother chính hãng được thiết kế để in laser màu chuyên nghiệp. Có chất lượng màu sắc sống động và khả năng tương thích với máy in laser Brother.",
    "Brother TN-261 Magenta Toner Cartridge" => "Mực Brother màu đỏ tươi chuyên nghiệp có đầu ra màu sắc rực rỡ, dòng mực mượt mà và hiệu suất in laser chất lượng cao.",
    "Ricoh SP C250 Black Toner Cartridge" => "Hộp mực đơn sắc Ricoh chính hãng được thiết kế để in laser văn phòng. Có đầu ra tài liệu sắc nét, hiệu suất mực đáng tin cậy và khả năng tương thích với máy in dòng Ricoh SP.",
    "Ricoh SP C250 Cyan Toner Cartridge" => "Hộp mực lục lam Ricoh chính hãng được thiết kế để in màu văn phòng sống động. Có tính nhất quán mực ổn định và chất lượng hình ảnh chuyên nghiệp.",
    "Ricoh SP C250 Magenta Toner Cartridge" => "Hộp mực màu đỏ tươi của Ricoh có hiệu suất in laser đáng tin cậy, đầu ra đồ họa sống động và phân phối mực mượt mà.",
    "Ricoh SP C250 Yellow Toner Cartridge" => "Hộp mực màu vàng Ricoh chất lượng cao được thiết kế để in văn phòng chuyên nghiệp và đồ họa tài liệu sống động.",
    "Ricoh MP C3503 Black Toner Cartridge" => "Hộp mực Ricoh chuyên nghiệp được thiết kế cho máy in văn phòng đa chức năng. Có năng suất trang cao, chất lượng văn bản sắc nét và hiệu suất in cấp doanh nghiệp.",
    "Ricoh MP C3503 Cyan Toner Cartridge" => "Mực lục lam chính hãng của Ricoh được thiết kế cho đồ họa doanh nghiệp sống động và đầu ra in laser độ phân giải cao.",
    "Ricoh MP C3503 Magenta Toner Cartridge" => "Hộp mực màu đỏ tươi chính hãng của Ricoh có chất lượng in ổn định và hiệu suất tài liệu màu chuyên nghiệp."
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

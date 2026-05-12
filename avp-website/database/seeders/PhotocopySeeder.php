<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PhotocopySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, clear existing entries to avoid duplicates if re-running
        DB::table('product')->where('tags', 'like', '%photocopy%')->delete();

        $now = Carbon::now();

        $machines = [
            [
                'title' => 'Ricoh Aficio MP 3352',
                'image' => 'may-photocopy-ricoh-mp-3352.jpg',
                'description' => 'Máy photocopy Laser kỹ thuật số trắng đen đa chức năng (Copy - In - Scan màu). Tốc độ 33 trang/phút.',
                'content' => '<div class="product-details">
                    <h4>THÔNG TIN TỔNG QUAN</h4>
                    <ul>
                        <li>Công nghệ in Laser kỹ thuật số trắng đen</li>
                        <li>Chức năng: Copy – In mạng – Scan màu</li>
                        <li>Bộ nạp và đảo mặt bản gốc tự động (ARDF)</li>
                        <li>Tốc độ in/copy: 33 trang/phút</li>
                        <li>Khổ giấy hỗ trợ: A3, A4, A5, A6, B4, B5, B6</li>
                        <li>Bộ nhớ: RAM 1GB + HDD 250GB</li>
                        <li>Khởi động: 20 giây</li>
                        <li>Trọng lượng: 75 kg</li>
                    </ul>
                    <h4>CHỨC NĂNG COPY</h4>
                    <ul>
                        <li>Độ phân giải sao chụp: 600 x 600 dpi</li>
                        <li>Tỷ lệ thu phóng: 25% đến 400% (từng bước 1%)</li>
                        <li>Khả năng copy liên tục lên đến 999 bản</li>
                    </ul>
                    <h4>CHỨC NĂNG IN</h4>
                    <ul>
                        <li>Ngôn ngữ in hỗ trợ: PCL5e / PCL6</li>
                        <li>Kết nối tiêu chuẩn: Ethernet 10/100/1000 Base-T, USB 2.0</li>
                        <li>Hệ điều hành: Windows XP/Vista/7, Server 2003/2008, Mac OS X 10.2 trở lên</li>
                    </ul>
                    <h4>CHỨC NĂNG SCAN MÀU</h4>
                    <ul>
                        <li>Tốc độ scan: lên đến 45 bản/phút</li>
                        <li>Độ phân giải: 600 x 600 dpi</li>
                        <li>Định dạng file: TIFF, Multi-page TIFF, JPEG, PDF, Multi-page PDF</li>
                        <li>Scan qua: E-mail (SMTP), Folder (SMB, FTP)</li>
                    </ul>
                    <h4>KHẢ NĂNG XỬ LÝ GIẤY & ĐIỆN NĂNG</h4>
                    <ul>
                        <li>Dung lượng khay giấy tiêu chuẩn: 1.000 tờ</li>
                        <li>Định lượng giấy hỗ trợ: 52 – 157 g/m²</li>
                        <li>Công suất tiêu thụ tối đa: 1.600W</li>
                    </ul>
                </div>',
            ],
            [
                'title' => 'Ricoh Aficio MP 4002',
                'image' => 'may-photocopy-ricoh-aficio-mp-4002.jpg',
                'description' => 'Máy photocopy Laser kỹ thuật số trắng đen 40 trang/phút. Màn hình cảm ứng 9 inch, hệ thống tái sử dụng mực thải.',
                'content' => '<div class="product-details">
                    <h4>THÔNG TIN TỔNG QUAN</h4>
                    <ul>
                        <li>Công nghệ in Laser kỹ thuật số trắng đen</li>
                        <li>Chức năng: Copy – In mạng – Scan màu</li>
                        <li>Tốc độ in/copy: 40 trang/phút</li>
                        <li>Màn hình: Cảm ứng thông minh 9 inch</li>
                        <li>Bộ nhớ: RAM 1GB + HDD 128GB</li>
                        <li>Khay giấy: 2 khay x 550 tờ + Khay tay 100 tờ</li>
                        <li>Khởi động: 15 giây</li>
                        <li>Hệ thống tái sử dụng mực thải: Có</li>
                    </ul>
                    <h4>CHỨC NĂNG COPY</h4>
                    <ul>
                        <li>Công nghệ: Laser đôi và sao chụp tĩnh điện</li>
                        <li>Độ phân giải sao chụp: 600 x 600 dpi</li>
                        <li>Thu phóng: 25% - 400%</li>
                        <li>Copy liên tục: 999 bản</li>
                    </ul>
                    <h4>CHỨC NĂNG IN</h4>
                    <ul>
                        <li>Ngôn ngữ: PCL5e, PCL6, PDF Direct, PS3</li>
                        <li>Kết nối: Ethernet 10/100/1000 Base-T, USB 2.0</li>
                        <li>Hệ điều hành: Windows Vista/7, Server 2003/2008/2008 R2, Mac OS X v10.2 trở lên</li>
                    </ul>
                    <h4>CHỨC NĂNG SCAN MÀU</h4>
                    <ul>
                        <li>Tốc độ: Màu 31 bản/phút, Trắng đen 61 bản/phút</li>
                        <li>Định dạng file scan: TIFF, JPEG, PDF, High Compression PDF, PDF-A</li>
                        <li>Scan qua: E-mail (SMTP, POP3), Folder, FTP, HDD</li>
                    </ul>
                    <h4>KHẢ NĂNG XỬ LÝ GIẤY</h4>
                    <ul>
                        <li>Khổ giấy hỗ trợ: A3, A4, A5, B4, B5</li>
                        <li>Định lượng giấy: Khay thường 60 – 216 g/m², Khay tay 52 – 220 g/m²</li>
                    </ul>
                </div>',
            ],
            [
                'title' => 'Ricoh Aficio MP 5002',
                'image' => 'may-photocopy-ricoh-mp-5002.jpg',
                'description' => 'Máy photocopy Laser kỹ thuật số trắng đen 50 trang/phút. Hiệu suất cực cao, màn hình cảm ứng 9 inch.',
                'content' => '<div class="product-details">
                    <h4>THÔNG TIN TỔNG QUAN</h4>
                    <ul>
                        <li>Công nghệ in Laser kỹ thuật số trắng đen</li>
                        <li>Chức năng: Copy – In mạng – Scan màu</li>
                        <li>Tốc độ in/copy: 50 trang/phút</li>
                        <li>Màn hình: Cảm ứng thông minh 9 inch</li>
                        <li>Bộ nhớ: RAM 1GB + HDD 128GB</li>
                        <li>Khởi động: 15 giây</li>
                        <li>Khay giấy: 2 khay x 550 tờ + Khay tay 100 tờ</li>
                    </ul>
                    <h4>CHỨC NĂNG COPY</h4>
                    <ul>
                        <li>Công nghệ xử lý: Laser đôi và sao chụp tĩnh điện</li>
                        <li>Độ phân giải: 600 x 600 dpi</li>
                        <li>Tỷ lệ thu phóng: 25% - 400%</li>
                    </ul>
                    <h4>CHỨC NĂNG IN</h4>
                    <ul>
                        <li>Ngôn ngữ: PCL5e, PCL6, PDF Direct, PS3</li>
                        <li>Kết nối: Ethernet 10/100/1000 Base-T, USB 2.0</li>
                        <li>Hệ điều hành: Windows Vista/7, Server 2003/2008/2008 R2, Mac OS X v10.2 trở lên</li>
                    </ul>
                    <h4>CHỨC NĂNG SCAN MÀU</h4>
                    <ul>
                        <li>Tốc độ: Màu 31 bản/phút, Trắng đen 61 bản/phút</li>
                        <li>Scan qua: E-mail (SMTP, POP3), Folder, FTP, HDD</li>
                    </ul>
                    <h4>KHẢ NĂNG XỬ LÝ GIẤY & TIỆN ÍCH</h4>
                    <ul>
                        <li>Khổ giấy: A3, A4, A5, B4, B5</li>
                        <li>Định lượng giấy: 60 – 216 g/m² (Khay thường), 52 – 220 g/m² (Khay tay)</li>
                        <li>Tính năng: Tiết kiệm điện năng, tái sử dụng mực thải</li>
                    </ul>
                </div>',
            ],
            [
                'title' => 'Ricoh MP 301 SPF',
                'image' => 'ricoh_MP_301SPF.jpg',
                'description' => 'Máy photocopy Laser kỹ thuật số trắng đen để bàn. Thiết kế nhỏ gọn, đa năng (Copy - In - Scan - Fax).',
                'content' => '<div class="product-details">
                    <h4>THÔNG TIN TỔNG QUAN</h4>
                    <ul>
                        <li>Công nghệ in Laser kỹ thuật số trắng đen</li>
                        <li>Chức năng: Copy – In mạng – Scan màu – Fax</li>
                        <li>Tốc độ in/copy: 30 trang/phút</li>
                        <li>Khổ giấy hỗ trợ tối đa: A4</li>
                        <li>Bộ nhớ tiêu chuẩn: 256 MB</li>
                        <li>Khay giấy: 250 tờ + Khay tay 100 tờ</li>
                        <li>Khởi động: 23 giây</li>
                        <li>Trọng lượng: 26 kg</li>
                    </ul>
                    <h4>CHỨC NĂNG COPY & IN</h4>
                    <ul>
                        <li>Độ phân giải sao chụp: 600 dpi</li>
                        <li>Tỷ lệ thu phóng: 25% đến 200%</li>
                        <li>Copy liên tục: 99 bản</li>
                        <li>Hỗ trợ sao chụp đảo mặt tự động</li>
                        <li>Công nghệ in Laser trắng đen mạng văn phòng</li>
                    </ul>
                    <h4>CHỨC NĂNG SCAN & FAX</h4>
                    <ul>
                        <li>Hỗ trợ scan màu tốc độ cao trực tiếp</li>
                        <li>Tích hợp sẵn chức năng Fax nhanh chóng, ổn định</li>
                    </ul>
                    <h4>KHẢ NĂNG XỬ LÝ GIẤY & TIỆN ÍCH</h4>
                    <ul>
                        <li>Định lượng giấy: 60 – 90 g/m² (Khay thường), 60 – 157 g/m² (Khay tay)</li>
                        <li>Thiết kế nhỏ gọn, tiết kiệm điện năng, tái sử dụng mực thải</li>
                    </ul>
                </div>',
            ],
            [
                'title' => 'Ricoh MP 3054',
                'image' => 'ricoh_mp_3054.jpg',
                'description' => 'Máy photocopy Laser trắng đen kỹ thuật số mạnh mẽ, tốc độ scan lên đến 80 bản/phút, bộ nhớ 2GB RAM.',
                'content' => '<div class="product-details">
                    <h4>THÔNG TIN TỔNG QUAN</h4>
                    <ul>
                        <li>Tốc độ in/copy: 30 trang/phút</li>
                        <li>Khởi động: 14 giây</li>
                        <li>Bộ nhớ: RAM 2GB + HDD 320GB</li>
                        <li>Khay giấy: 2 khay x 550 tờ + Khay tay 100 tờ</li>
                        <li>Kết nối: USB 2.0, SD Slot, Ethernet 10/100/1000 Base-T</li>
                    </ul>
                    <h4>CHỨC NĂNG COPY</h4>
                    <ul>
                        <li>Công nghệ: Laser đôi và sao chụp tĩnh điện</li>
                        <li>Độ phân giải sao chụp: 600 x 600 dpi</li>
                        <li>Thu phóng: 25% - 200%</li>
                        <li>Copy liên tục: 999 bản</li>
                    </ul>
                    <h4>CHỨC NĂNG IN</h4>
                    <ul>
                        <li>Ngôn ngữ: PCL5e, PCL6</li>
                        <li>Độ phân giải: 1200 x 1200 dpi</li>
                        <li>Hệ điều hành: Windows XP/Vista/7/8, Server 2003/2008/2012, Mac OS X 10.5+</li>
                    </ul>
                    <h4>CHỨC NĂNG SCAN MÀU</h4>
                    <ul>
                        <li>Tốc độ scan: lên đến 80 bản/phút</li>
                        <li>Định dạng file: TIFF, JPEG, PDF (nhiều trang)</li>
                        <li>Scan qua: E-mail, Folder (SMB), FTP, USB/SD</li>
                    </ul>
                    <h4>KHẢ NĂNG XỬ LÝ GIẤY</h4>
                    <ul>
                        <li>Định lượng giấy hỗ trợ: 60 – 300 g/m² (Khay thường), 52 – 300 g/m² (Khay tay)</li>
                        <li>Hệ thống tái sử dụng mực thải, tiết kiệm điện năng</li>
                    </ul>
                </div>',
            ],
            [
                'title' => 'Ricoh MP 3055',
                'image' => 'photocopy-ricoh-mp-3055.jpg',
                'description' => 'Máy photocopy thế hệ mới với màn hình cảm ứng 10.1 inch Smart Operation Panel. Tốc độ scan lên đến 180 bản/phút.',
                'content' => '<div class="product-details">
                    <h4>ƯU ĐIỂM NỔI BẬT</h4>
                    <ul>
                        <li>Màn hình cảm ứng Smart Operation Panel 10.1 inch hiện đại</li>
                        <li>Giao diện thao tác trực quan như máy tính bảng</li>
                        <li>Tốc độ scan SPDF lên đến 180 bản/phút (2 mặt)</li>
                        <li>Kết nối linh hoạt: WiFi, Bluetooth, Mobile Print</li>
                    </ul>
                    <h4>THÔNG TIN TỔNG QUAN</h4>
                    <ul>
                        <li>Tốc độ in/copy: 30 trang/phút</li>
                        <li>Bộ nhớ: RAM 2GB + HDD 320GB</li>
                        <li>Khởi động: 20 giây</li>
                        <li>Định lượng giấy: 52 – 300 g/m²</li>
                    </ul>
                    <h4>CHỨC NĂNG COPY & IN</h4>
                    <ul>
                        <li>Độ phân giải: Copy 600x600 dpi, In 1200x1200 dpi</li>
                        <li>Ngôn ngữ in: PCL5e, PCL6, PDF Direct, PS3</li>
                        <li>Hệ điều hành: Windows Vista/7/8/10, Server 2003/2012, Mac OS X 10.7+, UNIX, SAP</li>
                    </ul>
                    <h4>CHỨC NĂNG SCAN & FAX</h4>
                    <ul>
                        <li>Tốc độ scan SPDF: 110 ipm (1 mặt), 180 ipm (2 mặt)</li>
                        <li>Định dạng scan: TIFF, JPEG, PDF, High Compression PDF, PDF-A</li>
                        <li>Fax (tùy chọn): G3, 33.6 Kbps, 2 giây/trang</li>
                    </ul>
                    <h4>TIỆN ÍCH VẬN HÀNH</h4>
                    <ul>
                        <li>Hệ thống tiết kiệm điện năng hiệu quả</li>
                        <li>Hoạt động bền bỉ với khối lượng in lớn</li>
                        <li>Giảm chi phí vận hành nhờ hệ thống tái sử dụng mực thải</li>
                    </ul>
                </div>',
            ],
            [
                'title' => 'Ricoh MP 3554',
                'image' => 'ricoh_mp_3554.jpg',
                'description' => 'Máy photocopy Laser trắng đen hiệu suất ổn định 35 trang/phút. Độ phân giải in sắc nét 1200 x 1200 dpi.',
                'content' => '<div class="product-details">
                    <h4>ĐIỂM NỔI BẬT</h4>
                    <ul>
                        <li>Tốc độ in/copy lên đến 35 trang/phút</li>
                        <li>Chất lượng bản in sắc nét 1200 x 1200 dpi</li>
                        <li>Scan màu tốc độ cao lên đến 80 bản/phút</li>
                        <li>In được trên giấy dày lên đến 300 g/m²</li>
                    </ul>
                    <h4>THÔNG TIN TỔNG QUAN</h4>
                    <ul>
                        <li>Bộ nhớ: RAM 2GB + HDD 320GB</li>
                        <li>Khởi động: 14 giây</li>
                        <li>Kết nối: USB 2.0, SD Slot, Ethernet 10/100/1000 Base-T</li>
                    </ul>
                    <h4>CHỨC NĂNG COPY & IN</h4>
                    <ul>
                        <li>Độ phân giải sao chụp: 600 x 600 dpi</li>
                        <li>Thu phóng: 25% - 200%</li>
                        <li>Ngôn ngữ in: PCL5e, PCL6</li>
                        <li>Hệ điều hành: Windows XP/Vista/7/8, Server 2003/2008/2012, Mac OS X 10.5+</li>
                    </ul>
                    <h4>CHỨC NĂNG SCAN & FAX</h4>
                    <ul>
                        <li>Hỗ trợ scan qua: Email, SMB, FTP, USB/SD</li>
                        <li>Định dạng: TIFF, JPEG, PDF (nhiều trang)</li>
                        <li>Fax (tùy chọn): G3, 33.6 kbps, 2 giây/trang, 4MB</li>
                    </ul>
                    <h4>KHẢ NĂNG XỬ LÝ GIẤY & TIỆN ÍCH</h4>
                    <ul>
                        <li>Khổ giấy: A3, A4, A5, A6, B4, B5, B6</li>
                        <li>Tiết kiệm điện năng và tái sử dụng mực thải</li>
                    </ul>
                </div>',
            ],
            [
                'title' => 'Ricoh MPC 6003',
                'image' => 'ricoh_mp_c6003.jpg',
                'description' => 'Máy photocopy Laser MÀU kỹ thuật số tốc độ cao 60 trang/phút. Giải pháp in ấn chuyên nghiệp cho marketing.',
                'content' => '<div class="product-details">
                    <h4>ĐIỂM NỔI BẬT</h4>
                    <ul>
                        <li>In màu tốc độ cao lên đến 60 trang/phút</li>
                        <li>Độ phân giải in sắc nét 1200 x 1200 dpi</li>
                        <li>Scan màu mạng hiệu quả lên đến 54 bản/phút</li>
                        <li>Phù hợp in brochure, catalogue, tài liệu marketing</li>
                    </ul>
                    <h4>THÔNG TIN TỔNG QUAN</h4>
                    <ul>
                        <li>Công nghệ in Laser màu kỹ thuật số</li>
                        <li>Chức năng: Copy màu – In màu – Scan màu mạng</li>
                        <li>Bộ nhớ: RAM 2GB + HDD 250GB</li>
                        <li>Trọng lượng: 86 kg</li>
                    </ul>
                    <h4>CHỨC NĂNG COPY & IN</h4>
                    <ul>
                        <li>Thu phóng: 25% - 400%</li>
                        <li>Ngôn ngữ: PCL5e, PCL6, PostScript 3 (tùy chọn)</li>
                        <li>Hệ điều hành: Windows XP/Vista/7, Server 2003/2008, Mac OS X 10.5+</li>
                    </ul>
                    <h4>CHỨC NĂNG SCAN & FAX</h4>
                    <ul>
                        <li>Scan qua: E-mail (SMTP, POP, IMAP4), SMB, FTP, NCP</li>
                        <li>Fax (tùy chọn): G3, modem 33.6 kbps, truyền 2 giây/trang</li>
                    </ul>
                    <h4>XỬ LÝ GIẤY & ĐIỆN NĂNG</h4>
                    <ul>
                        <li>Khay giấy vào: 1.100 tờ, Khay giấy ra: 1.000 tờ</li>
                        <li>Định lượng giấy: lên đến 300 g/m²</li>
                        <li>Công suất tiêu thụ tối đa: 1850W</li>
                    </ul>
                </div>',
            ]
        ];

        foreach ($machines as $m) {
            $productId = DB::table('product')->insertGetId([
                'title' => $m['title'],
                'image' => $m['image'],
                'description' => $m['description'],
                'content' => $m['content'],
                'sell' => 0,
                'view' => 0,
                'rating' => 5,
                'status' => 'active',
                'priority' => 1000,
                'tags' => 'photocopy, ricoh, thue may photocopy',
                'template' => 'default',
                'stock_manage' => 0,
                'stop_selling' => 0,
                'stock_quant' => 0,
                'option_1' => '',
                'option_2' => '',
                'option_3' => '',
                'option_4' => '',
                'option_5' => '',
                'option_6' => '',
                'created_at' => $now,
                'updated_at' => $now,
                'raw_title' => strtolower($m['title']),
                'raw_full' => strtolower($m['title'] . ' ' . $m['description']),
            ]);

            DB::table('variant')->insert([
                'title' => 'Default',
                'product_id' => $productId,
                'price' => 0,
                'stock_quant' => 1,
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}

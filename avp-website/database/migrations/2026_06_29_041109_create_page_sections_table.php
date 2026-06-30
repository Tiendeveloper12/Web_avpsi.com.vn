<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page', 50);
            $table->string('section_key', 100);
            $table->string('title', 500)->nullable();
            $table->json('content');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['page', 'section_key']);
        });

        // Seed page sections
        $sections = [
            // Home Page Promo 1: PC Repair
            [
                'page' => 'home',
                'section_key' => 'promo_pc_repair',
                'title' => 'SỬA CHỮA LAPTOP – PC',
                'content' => json_encode([
                    'title_highlight' => 'BẢO TRÌ NHANH CHÓNG – TẬN NƠI',
                    'badge' => 'BẢO TRÌ & SỬA CHỮA CHUYÊN NGHIỆP',
                    'description' => 'Khắc phục nhanh mọi sự có phần cứng, phần mềm của laptop và máy tính để bàn. Vệ sinh máy, tra keo tản nhiệt định kỳ chuyên nghiệp. Linh kiện chính hãng, bảo hành chu đáo.',
                    'highlights' => [
                        'Kỹ thuật viên nhiều kinh nghiệm',
                        'Linh kiện thay thế chính hãng',
                        'Khắc phục tận nơi nhanh chóng',
                        'Bảo hành dài hạn sau sửa chữa'
                    ],
                    'image_path' => 'images/banners/pc_repair_banner.png',
                    'zalo_link' => 'https://zalo.me/0912979394',
                    'service_route' => 'services.sua-chua-may-tinh'
                ], JSON_UNESCAPED_UNICODE),
                'sort_order' => 1
            ],
            // Home Page Promo 2: Photocopy Rental
            [
                'page' => 'home',
                'section_key' => 'promo_photocopy',
                'title' => 'CHO THUÊ MÁY PHOTOCOPY',
                'content' => json_encode([
                    'title_highlight' => 'SIÊU TIẾT KIỆM – SIÊU TIỆN LỢI',
                    'badge' => 'DỊCH VỤ NỔI BẬT',
                    'description' => 'Trang bị máy in, máy photocopy tốc độ cao, đời mới nhất cho văn phòng của bạn mà không cần chi phí đầu tư ban đầu. Hỗ trợ kỹ thuật 24/7, miễn phí hoàn toàn tiền mực và bảo dưỡng.',
                    'highlights' => [
                        'Không cần mua máy',
                        'Không tốn tiền mực',
                        'Không lo máy hư hỏng',
                        'Hỗ trợ kỹ thuật tận nơi'
                    ],
                    'image_path' => 'images/banners/copier_rent_banner.png',
                    'zalo_link' => 'https://zalo.me/0912979394',
                    'service_route' => 'services.cho-thue-photocopy'
                ], JSON_UNESCAPED_UNICODE),
                'sort_order' => 2
            ],
            // About Page Hero Section
            [
                'page' => 'about',
                'section_key' => 'hero',
                'title' => 'Kiến Tạo Giải Pháp',
                'content' => json_encode([
                    'title_highlight' => 'Văn Phòng Hiện Đại',
                    'badge' => 'Về chúng tôi - Âu Việt Phát',
                    'description' => 'Công ty TNHH TM DV Tin học Viễn thông Âu Việt Phát tự hào là đối tác công nghệ và thiết bị văn phòng tin cậy của hàng nghìn doanh nghiệp. Chúng tôi cam kết mang lại sự an tâm tuyệt đối qua các sản phẩm chất lượng và dịch vụ tận tâm.'
                ], JSON_UNESCAPED_UNICODE),
                'sort_order' => 1
            ],
            // About Page Brand Story
            [
                'page' => 'about',
                'section_key' => 'brand_story',
                'title' => 'Hành Trình Kiến Tạo & Đồng Hành Cùng Doanh Nghiệp',
                'content' => json_encode([
                    'badge' => 'CÂU CHUYỆN THƯƠNG HIỆU',
                    'paragraphs' => [
                        'Được thành lập từ những chuyên gia kỹ thuật tâm huyết trong ngành công nghệ thông tin và thiết bị máy văn phòng, Âu Việt Phát đã trải qua một hành trình phát triển không ngừng để trở thành thương hiệu uy tín hàng đầu khu vực.',
                        'Với triết lý hoạt động lấy khách hàng làm trọng tâm, chúng tôi không chỉ dừng lại ở việc cung cấp các dòng sản phẩm máy tính, linh kiện, máy in hay máy photocopy cao cấp. Điều làm nên sự khác biệt của Âu Việt Phát chính là hệ sinh thái dịch vụ kỹ thuật tối ưu — từ cho thuê, bảo trì, đến khắc phục sự cố nhanh chóng vượt trội, giúp doanh nghiệp vận hành liên tục không gián đoạn.'
                    ],
                    'features' => [
                        [
                            'title' => 'Tốc độ & Hiệu suất',
                            'description' => 'Chúng tôi cam kết có mặt hỗ trợ kỹ thuật tận nơi chỉ trong vòng 30 phút - 2 giờ kể từ khi tiếp nhận thông tin yêu cầu.'
                        ],
                        [
                            'title' => 'Chất lượng đảm bảo',
                            'description' => 'Tất cả linh kiện, máy in, máy photocopy cho thuê hay bán lẻ đều là hàng chính hãng, được qua quy trình kiểm thử nghiêm ngặt.'
                        ],
                        [
                            'title' => 'Giải pháp tối ưu chi phí',
                            'description' => 'Đa dạng gói dịch vụ và mức giá hợp lý nhất, giúp doanh nghiệp tiết kiệm đến 40% chi phí vận hành văn phòng.'
                        ]
                    ]
                ], JSON_UNESCAPED_UNICODE),
                'sort_order' => 2
            ],
            // About Page Vision / Mission / Values
            [
                'page' => 'about',
                'section_key' => 'vision_mission_values',
                'title' => 'Tầm Nhìn - Sứ Mệnh - Giá Trị',
                'content' => json_encode([
                    'vision' => [
                        'title' => 'Tầm Nhìn',
                        'description' => 'Trở thành doanh nghiệp hàng đầu Việt Nam cung cấp giải pháp toàn diện về thiết bị văn phòng, dịch vụ viễn thông và giải pháp bảo trì hệ thống. Đưa công nghệ hiện đại đồng hành cùng sự bứt phá của mọi doanh nghiệp.'
                    ],
                    'mission' => [
                        'title' => 'Sứ Mệnh',
                        'description' => 'Mang đến các giải pháp thiết bị công nghệ tiên tiến nhất với dịch vụ lắp đặt, sửa chữa và bảo dưỡng chất lượng tuyệt hảo. Tối ưu hoá hiệu quả công việc, giảm bớt chi phí vận hành cho các đối tác của chúng tôi.'
                    ],
                    'values' => [
                        'title' => 'Giá Trị Cốt Lõi',
                        'description' => "TẬN TÂM: Luôn đặt lợi ích khách hàng lên trước.\nUY TÍN: Giữ trọn lời hứa về chất lượng sản phẩm & dịch vụ.\nĐỔI MỚI: Không ngừng học hỏi, nâng cao chuyên môn và giải pháp tối tân nhất."
                    ]
                ], JSON_UNESCAPED_UNICODE),
                'sort_order' => 3
            ],
            // About Page Timeline
            [
                'page' => 'about',
                'section_key' => 'timeline',
                'title' => 'Lịch sử hình thành',
                'content' => json_encode([
                    'badge' => 'CHẶNG ĐƯỜNG PHÁT TRIỂN',
                    'milestones' => [
                        [
                            'year' => '2016',
                            'title' => 'Thành Lập Âu Việt Phát',
                            'description' => 'Khởi đầu từ một cửa hàng sửa chữa máy in, nạp mực và cung cấp máy tính văn phòng nhỏ với đội ngũ chỉ 5 kỹ thuật viên lành nghề.'
                        ],
                        [
                            'year' => '2019',
                            'title' => 'Mở Rộng Dịch Vụ Cho Thuê Máy Photocopy',
                            'description' => 'Chính thức thành lập Công ty TNHH TM DV Tin học Viễn thông Âu Việt Phát. Đầu tư hơn 200 đầu máy photocopy Ricoh & Toshiba cao cấp cung cấp dịch vụ cho thuê trọn gói chuyên nghiệp.'
                        ],
                        [
                            'year' => '2022',
                            'title' => 'Chuyển Mình Sang Giải Pháp Số & Camera An Ninh',
                            'description' => 'Tích hợp các giải pháp lắp đặt camera giám sát, thiết kế và thi công hệ thống mạng server cho doanh nghiệp vừa và lớn, hoàn thiện hệ sinh thái thiết bị văn phòng.'
                        ],
                        [
                            'year' => 'Nay',
                            'title' => 'Đối Tác Tin Cậy Của Hàng Nghìn Doanh Nghiệp',
                            'description' => 'Trở thành biểu tượng của chất lượng kỹ thuật hoàn hảo, cam kết đồng hành bền vững cùng sự thịnh vượng của các đối tác doanh nghiệp trên toàn quốc.'
                        ]
                    ]
                ], JSON_UNESCAPED_UNICODE),
                'sort_order' => 4
            ]
        ];

        foreach ($sections as $section) {
            $section['created_at'] = now();
            $section['updated_at'] = now();
            DB::table('page_sections')->insert($section);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};

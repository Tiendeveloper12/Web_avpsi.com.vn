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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->string('badge', 100)->nullable();
            $table->string('button_text', 100)->nullable();
            $table->string('link', 500)->nullable();
            $table->string('image_path', 500);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Seed initial banners
        $banners = [
            [
                'title' => 'Giải Pháp Photocopy Chuyên Nghiệp',
                'subtitle' => 'Dịch vụ cho thuê và bán máy photocopy Ricoh chính hãng, hiệu suất cao cho doanh nghiệp.',
                'badge' => 'SẢN PHẨM MỚI',
                'button_text' => 'Chi tiết',
                'link' => '/category/may-photocopy',
                'image_path' => 'images/banners/banner_photocopy.png',
                'sort_order' => 1,
            ],
            [
                'title' => 'Mực In Chính Hãng - Chất Lượng Cao',
                'subtitle' => 'Cung cấp đầy đủ các loại mực in cho máy HP, Canon, Brother, Ricoh.',
                'badge' => 'PHỤ KIỆN',
                'button_text' => 'Mua ngay',
                'link' => '/category/muc-in',
                'image_path' => 'images/banners/banner_ink.png',
                'sort_order' => 2,
            ],
            [
                'title' => 'Máy In Văn Phòng Chuyên Nghiệp',
                'subtitle' => 'Phân phối các dòng máy in Canon, HP, Brother giá tốt nhất.',
                'badge' => 'MÁY IN',
                'button_text' => 'Mua ngay',
                'link' => '/category/may-in',
                'image_path' => 'images/banners/banner_printer.png',
                'sort_order' => 3,
            ],
            [
                'title' => 'Thiết Bị Văn Phòng Hiện Đại',
                'subtitle' => 'Laptop, PC, Màn hình và giải pháp công nghệ toàn diện cho doanh nghiệp.',
                'badge' => 'THIẾT BỊ',
                'button_text' => 'Mua Ngay',
                'link' => '/category/may-tinh-de-ban',
                'image_path' => 'images/banners/banner_devices.png',
                'sort_order' => 4,
            ],
            [
                'title' => 'Linh Kiện & Phụ Kiện Máy Tính',
                'subtitle' => 'Chuột, bàn phím, tai nghe và linh kiện nâng cấp chính hãng.',
                'badge' => 'PHỤ KIỆN',
                'button_text' => 'Mua ngay',
                'link' => '/category/linh-kien-may-tinh',
                'image_path' => 'images/banners/banner_accessories.png',
                'sort_order' => 5,
            ]
        ];

        foreach ($banners as $banner) {
            $banner['created_at'] = now();
            $banner['updated_at'] = now();
            DB::table('banners')->insert($banner);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};

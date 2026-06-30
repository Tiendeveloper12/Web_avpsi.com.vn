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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group', 50);
            $table->string('label');
            $table->string('type', 20)->default('text');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed initial values from hardcoded views
        $settings = [
            // Contact
            [
                'key' => 'phone_primary',
                'value' => '0912 97 9394',
                'group' => 'contact',
                'label' => 'Số điện thoại chính',
                'type' => 'text',
                'sort_order' => 1,
            ],
            [
                'key' => 'phone_secondary',
                'value' => '0903 111 052',
                'group' => 'contact',
                'label' => 'Số điện thoại phụ',
                'type' => 'text',
                'sort_order' => 2,
            ],
            [
                'key' => 'email_primary',
                'value' => 'info@avpsi.com.vn',
                'group' => 'contact',
                'label' => 'Email chính',
                'type' => 'text',
                'sort_order' => 3,
            ],
            [
                'key' => 'email_secondary',
                'value' => 'info@avptoner.com.vn',
                'group' => 'contact',
                'label' => 'Email phụ',
                'type' => 'text',
                'sort_order' => 4,
            ],
            [
                'key' => 'address_1',
                'value' => 'B11A/5 Ấp 2, Tân Vĩnh Lộc, HCMC, VN',
                'group' => 'contact',
                'label' => 'Địa chỉ chính',
                'type' => 'text',
                'sort_order' => 5,
            ],
            [
                'key' => 'address_2',
                'value' => '3/15 Phan Văn Sửu, Tân Bình, HCMC, VN',
                'group' => 'contact',
                'label' => 'Địa chỉ chi nhánh',
                'type' => 'text',
                'sort_order' => 6,
            ],
            [
                'key' => 'working_hours',
                'value' => '7:45 - 11:45, 13:00 - 17:00',
                'group' => 'contact',
                'label' => 'Giờ làm việc',
                'type' => 'text',
                'sort_order' => 7,
            ],
            [
                'key' => 'zalo_link',
                'value' => 'https://zalo.me/0912979394',
                'group' => 'contact',
                'label' => 'Link Zalo',
                'type' => 'text',
                'sort_order' => 8,
            ],
            // Social
            [
                'key' => 'facebook_url',
                'value' => '#',
                'group' => 'social',
                'label' => 'Link Facebook',
                'type' => 'text',
                'sort_order' => 1,
            ],
            // Stats
            [
                'key' => 'stat_years',
                'value' => '10+',
                'group' => 'stats',
                'label' => 'Số năm kinh nghiệm',
                'type' => 'text',
                'sort_order' => 1,
            ],
            [
                'key' => 'stat_customers',
                'value' => '2,000+',
                'group' => 'stats',
                'label' => 'Doanh nghiệp tin dùng',
                'type' => 'text',
                'sort_order' => 2,
            ],
            [
                'key' => 'stat_support',
                'value' => '24/7',
                'group' => 'stats',
                'label' => 'Hỗ trợ kỹ thuật',
                'type' => 'text',
                'sort_order' => 3,
            ],
            [
                'key' => 'stat_satisfaction',
                'value' => '100%',
                'group' => 'stats',
                'label' => 'Khách hàng hài lòng',
                'type' => 'text',
                'sort_order' => 4,
            ],
        ];

        foreach ($settings as $setting) {
            $setting['created_at'] = now();
            $setting['updated_at'] = now();
            DB::table('site_settings')->insert($setting);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};

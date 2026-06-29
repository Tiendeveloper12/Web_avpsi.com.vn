<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class CategoryService
{
    private static $filePath = 'categories.json';

    /**
     * Get all categories, loaded from JSON storage or static fallback.
     */
    public static function getAll(): array
    {
        if (Storage::exists(self::$filePath)) {
            $data = json_decode(Storage::get(self::$filePath), true);
            if (is_array($data)) {
                return $data;
            }
        }

        // Fallback default structure
        $defaults = self::getDefaults();
        self::save($defaults);
        return $defaults;
    }

    /**
     * Save category data back to JSON storage.
     */
    public static function save(array $categories): bool
    {
        return Storage::put(self::$filePath, json_encode(array_values($categories), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    /**
     * Get mapping of category slug to database tag string.
     */
    public static function getTagMapping(): array
    {
        $categories = self::getAll();
        $mapping = [];
        foreach ($categories as $cat) {
            $mapping[$cat['slug']] = $cat['tag'] ?? $cat['slug'];
        }
        return $mapping;
    }

    /**
     * Get mapping of category slug to display title.
     */
    public static function getCategoryTitles(): array
    {
        $categories = self::getAll();
        $titles = [];
        foreach ($categories as $cat) {
            $titles[$cat['slug']] = $cat['title'];
        }
        return $titles;
    }

    /**
     * Find category by slug.
     */
    public static function findBySlug(string $slug): ?array
    {
        $categories = self::getAll();
        foreach ($categories as $cat) {
            if ($cat['slug'] === $slug) {
                return $cat;
            }
        }
        return null;
    }

    /**
     * Default hardcoded categories list.
     */
    private static function getDefaults(): array
    {
        return [
            [
                'title' => 'Máy Photocopy',
                'slug' => 'may-photocopy',
                'icon' => '🖨️',
                'tag' => 'photocopy',
                'subcategories' => [
                    ['name' => 'Ricoh', 'slug' => 'sub-ricoh']
                ]
            ],
            [
                'title' => 'Mực In',
                'slug' => 'muc-in',
                'icon' => '💧',
                'tag' => 'muc',
                'subcategories' => [
                    ['name' => 'AVP', 'slug' => 'sub-avp'],
                    ['name' => 'HP', 'slug' => 'sub-hp'],
                    ['name' => 'Canon', 'slug' => 'sub-canon'],
                    ['name' => 'Epson', 'slug' => 'sub-epson'],
                    ['name' => 'Brother', 'slug' => 'sub-brother'],
                    ['name' => 'Oki', 'slug' => 'sub-oki'],
                    ['name' => 'Ricoh', 'slug' => 'sub-ricoh'],
                    ['name' => 'Xerox', 'slug' => 'sub-xerox']
                ]
            ],
            [
                'title' => 'Máy In',
                'slug' => 'may-in',
                'icon' => '📠',
                'tag' => 'printer',
                'subcategories' => [
                    ['name' => 'Máy in HP', 'slug' => 'sub-hp'],
                    ['name' => 'Máy in Canon', 'slug' => 'sub-canon'],
                    ['name' => 'Máy in Epson', 'slug' => 'sub-epson'],
                    ['name' => 'Máy in Brother', 'slug' => 'sub-brother'],
                    ['name' => 'Máy in Xerox', 'slug' => 'sub-xerox'],
                    ['name' => 'Máy in Pantum', 'slug' => 'sub-pantum']
                ]
            ],
            [
                'title' => 'Laptop / Macbook',
                'slug' => 'laptop-macbook',
                'icon' => '💻',
                'tag' => 'laptop',
                'subcategories' => [
                    ['name' => 'Apple MacBook', 'slug' => 'sub-macbook'],
                    ['name' => 'Laptop ASUS', 'slug' => 'sub-asus'],
                    ['name' => 'Laptop Dell', 'slug' => 'sub-dell'],
                    ['name' => 'Laptop HP', 'slug' => 'sub-hp'],
                    ['name' => 'Laptop Lenovo', 'slug' => 'sub-lenovo'],
                    ['name' => 'Laptop MSI', 'slug' => 'sub-msi'],
                    ['name' => 'Laptop Acer', 'slug' => 'sub-acer'],
                    ['name' => 'Laptop Razer', 'slug' => 'sub-razer'],
                    ['name' => 'Laptop Microsoft', 'slug' => 'sub-microsoft'],
                    ['name' => 'Laptop Samsung', 'slug' => 'sub-samsung'],
                    ['name' => 'Laptop LG', 'slug' => 'sub-lg'],
                    ['name' => 'Laptop Huawei', 'slug' => 'sub-huawei'],
                    ['name' => 'Laptop Gigabyte', 'slug' => 'sub-gigabyte']
                ]
            ],
            [
                'title' => 'Máy tính để bàn',
                'slug' => 'may-tinh-de-ban',
                'icon' => '🖥️',
                'tag' => 'pc',
                'subcategories' => [
                    ['name' => 'Apple', 'slug' => 'sub-apple'],
                    ['name' => 'Dell', 'slug' => 'sub-dell'],
                    ['name' => 'HP', 'slug' => 'sub-hp'],
                    ['name' => 'Lenovo', 'slug' => 'sub-lenovo'],
                    ['name' => 'ASUS', 'slug' => 'sub-asus'],
                    ['name' => 'MSI', 'slug' => 'sub-msi'],
                    ['name' => 'Acer', 'slug' => 'sub-acer'],
                    ['name' => 'Gigabyte', 'slug' => 'sub-gigabyte'],
                    ['name' => 'Huawei', 'slug' => 'sub-huawei'],
                    ['name' => 'Samsung', 'slug' => 'sub-samsung'],
                    ['name' => 'Khác', 'slug' => 'sub-khac']
                ]
            ],
            [
                'title' => 'Linh kiện máy tính',
                'slug' => 'linh-kien-may-tinh',
                'icon' => '⚙️',
                'tag' => 'linh-kien',
                'subcategories' => [
                    ['name' => 'Màn hình', 'slug' => 'sub-monitor'],
                    ['name' => 'RAM', 'slug' => 'sub-ram'],
                    ['name' => 'SSD/HDD', 'slug' => 'sub-ssd'],
                    ['name' => 'Bảng mạch chính', 'slug' => 'sub-mainboard'],
                    ['name' => 'CPU', 'slug' => 'sub-cpu'],
                    ['name' => 'Card đồ họa', 'slug' => 'sub-gpu'],
                    ['name' => 'Tai nghe', 'slug' => 'sub-headphone'],
                    ['name' => 'Bộ phát wifi', 'slug' => 'sub-wifi'],
                    ['name' => 'Nguồn', 'slug' => 'sub-psu'],
                    ['name' => 'Bàn phím', 'slug' => 'sub-keyboard'],
                    ['name' => 'Chuột', 'slug' => 'sub-mouse']
                ]
            ],
            [
                'title' => 'Thiết bị văn phòng',
                'slug' => 'thiet-bi-van-phong',
                'icon' => '🏢',
                'tag' => 'van-phong',
                'subcategories' => [
                    ['name' => 'Máy chấm công', 'slug' => 'sub-cham-cong'],
                    ['name' => 'Máy hủy giấy', 'slug' => 'sub-huy-giay'],
                    ['name' => 'Máy in bill', 'slug' => 'sub-in-bill'],
                    ['name' => 'Máy quét / Scanner', 'slug' => 'sub-scan'],
                    ['name' => 'Máy chiếu', 'slug' => 'sub-chieu'],
                    ['name' => 'Thiết bị khác', 'slug' => 'sub-khac']
                ]
            ],
            [
                'title' => 'Thiết bị mạng',
                'slug' => 'thiet-bi-mang',
                'icon' => '🌐',
                'tag' => 'internet',
                'subcategories' => [
                    ['name' => 'Bộ định tuyến Wifi', 'slug' => 'sub-router'],
                    ['name' => 'Bộ chuyển mạch (Switch)', 'slug' => 'sub-switch'],
                    ['name' => 'Dây cáp internet', 'slug' => 'sub-cable']
                ]
            ],
            [
                'title' => 'Camera an ninh',
                'slug' => 'camera-an-ninh',
                'icon' => '📹',
                'tag' => 'camera',
                'subcategories' => [
                    ['name' => 'Hikvision', 'slug' => 'sub-hikvision'],
                    ['name' => 'IMOU', 'slug' => 'sub-imou'],
                    ['name' => 'EVI', 'slug' => 'sub-evi'],
                    ['name' => 'Khác', 'slug' => 'sub-khac']
                ]
            ],
            [
                'title' => 'Dịch vụ',
                'slug' => 'dich-vu',
                'icon' => '🛠️',
                'tag' => 'service',
                'subcategories' => [
                    ['name' => 'Cho thuê máy photocopy', 'slug' => 'cho-thue-may-photocopy', 'url' => '/dich-vu/cho-thue-photocopy'],
                    ['name' => 'Nạp mực in & photocopy', 'slug' => 'nap-muc-in-photocopy', 'url' => '/dich-vu/nap-muc-in'],
                    ['name' => 'Thiết kế, thi công hệ thống server', 'slug' => 'he-thong-server'],
                    ['name' => 'Thiết kế, thi công camera văn phòng - nhà xưởng', 'slug' => 'camera-van-phong'],
                    ['name' => 'Dịch vụ sửa chữa máy photocopy - máy in', 'slug' => 'sua-chua-may-in', 'url' => '/dich-vu/sua-chua-may-in'],
                    ['name' => 'Dịch vụ bảo trì, sửa chữa laptop - máy tính để bàn', 'slug' => 'bao-tri-may-tinh', 'url' => '/dich-vu/sua-chua-may-tinh'],
                    ['name' => 'Cho thuê laptop, máy tính, máy in, máy văn phòng', 'slug' => 'cho-thue-thiet-bi']
                ]
            ]
        ];
    }
}

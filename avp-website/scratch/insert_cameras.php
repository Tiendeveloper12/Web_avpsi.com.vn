<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

$cameras = [
    ['name' => 'Hikvision DS-2CE16D0T-IRP', 'image' => 'Hikvision DS-2CE16D0T-IRP.jpg', 'brand' => 'Hikvision'],
    ['name' => 'Hikvision DS-2CD1023G0E-I', 'image' => 'Hikvision DS-2CD1023G0E-I.jpg', 'brand' => 'Hikvision'],
    ['name' => 'Hikvision DS-2CE76D0T-ITPFS', 'image' => 'Hikvision DS-2CE76D0T-ITPFS.jpg', 'brand' => 'Hikvision'],
    ['name' => 'Hikvision DS-2CD2043G2-I', 'image' => 'Hikvision DS-2CD2043G2-I.jpg', 'brand' => 'Hikvision'],
    ['name' => 'Hikvision DS-2DE2A404IW-DE3', 'image' => 'Hikvision DS-2DE2A404IW-DE3.jpg', 'brand' => 'Hikvision'],
    ['name' => 'Hikvision DS-2CD2143G2-IU', 'image' => 'Hikvision DS-2CD2143G2-IU.jpg', 'brand' => 'Hikvision'],
    ['name' => 'Hikvision DS-2CV2Q21FD-IW', 'image' => 'Hikvision DS-2CV2Q21FD-IW.jpg', 'brand' => 'Hikvision'],
    ['name' => 'Hikvision DS-2CE12DF3T-FS', 'image' => 'Hikvision DS-2CE12DF3T-FS.jpg', 'brand' => 'Hikvision'],
    ['name' => 'Hikvision DS-2CD2387G2-LU', 'image' => 'Hikvision DS-2CD2387G2-LU.jpg', 'brand' => 'Hikvision'],
    ['name' => 'Hikvision DS-2CD1123G0E-I', 'image' => 'Hikvision DS-2CD1123G0E-I.jpg', 'brand' => 'Hikvision'],
    
    ['name' => 'IMOU Ranger 2 IPC-A22EP', 'image' => 'IMOU Ranger 2 IPC-A22EP.jpg', 'brand' => 'IMOU'],
    ['name' => 'IMOU Cue 2 IPC-C22EP-A', 'image' => 'IMOU Cue 2 IPC-C22EP-A.jpg', 'brand' => 'IMOU'],
    ['name' => 'IMOU Bullet 2C IPC-F22P', 'image' => 'IMOU Bullet 2C IPC-F22P.jpg', 'brand' => 'IMOU'],
    ['name' => 'IMOU Cruiser IPC-S22FP', 'image' => 'IMOU Cruiser IPC-S22FP.jpg', 'brand' => 'IMOU'],
    ['name' => 'IMOU Ranger RC IPC-GK2CP-3C0WR', 'image' => 'IMOU Ranger RC IPC-GK2CP-3C0WR.jpg', 'brand' => 'IMOU'],
    ['name' => 'IMOU Cell 2 IPC-B46LP', 'image' => 'IMOU Cell 2 IPC-B46LP.jpg', 'brand' => 'IMOU'],
    ['name' => 'IMOU Versa IPC-C22FP-C', 'image' => 'IMOU Versa IPC-C22FP-C.jpg', 'brand' => 'IMOU'],
    ['name' => 'IMOU Turret IPC-T22AP', 'image' => 'IMOU Turret IPC-T22AP.jpg', 'brand' => 'IMOU'],
    ['name' => 'IMOU Knight IPC-F88FIP-V2', 'image' => 'IMOU Knight IPC-F88FIP-V2.jpg', 'brand' => 'IMOU'],
    ['name' => 'IMOU Rex VT IPC-S2XP-5M0WED', 'image' => 'IMOU Rex VT IPC-S2XP-5M0WED.jpg', 'brand' => 'IMOU'],
    
    ['name' => 'EVI EV-2000 Dome Camera', 'image' => 'EVI EV-2000 Dome Camera.jpg', 'brand' => 'EVI'],
    ['name' => 'EVI EV-2200 Bullet Camera', 'image' => 'EVI EV-2200 Bullet Camera.jpg', 'brand' => 'EVI'],
    ['name' => 'EVI EV-3000 IP Camera', 'image' => 'EVI EV-3000 IP Camera.jpg', 'brand' => 'EVI'],
    ['name' => 'EVI EV-3200 PTZ Camera', 'image' => 'EVI EV-3200 PTZ Camera.jpg', 'brand' => 'EVI'],
    ['name' => 'EVI EV-4000 Smart Camera', 'image' => 'EVI EV-4000 Smart Camera.jpg', 'brand' => 'EVI'],
    ['name' => 'EVI EV-4200 WiFi Camera', 'image' => 'EVI EV-4200 WiFi Camera.jpg', 'brand' => 'EVI'],
    ['name' => 'EVI EV-5000 Outdoor Camera', 'image' => 'EVI EV-5000 Outdoor Camera.jpg', 'brand' => 'EVI'],
    ['name' => 'EVI EV-5200 Indoor Camera', 'image' => 'EVI EV-5200 Indoor Camera.jpg', 'brand' => 'EVI'],
    ['name' => 'EVI EV-6000 AI Camera', 'image' => 'EVI EV-6000 AI Camera.jpg', 'brand' => 'EVI'],
    ['name' => 'EVI EV-6200 Network Camera', 'image' => 'EVI EV-6200 Network Camera.jpg', 'brand' => 'EVI']
];

DB::beginTransaction();

try {
    $nextProductId = DB::table('product')->max('id') + 1;
    $nextVariantId = DB::table('variant')->max('id') + 1;
    $nextTransId = DB::table('product_translations')->max('id') + 1;
    $nextSlugId = DB::table('slug')->max('id') + 1;
    $nextCollectionProductId = DB::table('collection_product')->max('id') + 1;
    
    $collectionId = 21; // Khác (Máy văn phòng category)
    $createdAt = '2026-05-18 09:30:00';
    
    foreach ($cameras as $index => $cam) {
        $pid = $nextProductId + $index;
        $vid = $nextVariantId + $index;
        $tid = $nextTransId + $index;
        $sidVi = $nextSlugId + ($index * 2);
        $sidEn = $sidVi + 1;
        $cpid = $nextCollectionProductId + $index;
        
        $title = $cam['name'];
        $image = $cam['image'];
        $brand = $cam['brand'];
        $brandTag = 'sub-' . strtolower($brand);
        $tags = "camera,Camera IP,{$brandTag}";
        
        // Simple description to display under the price
        $desc = "{$title} là dòng camera giám sát an ninh chất lượng cao, cung cấp hình ảnh sắc nét và độ ổn định tối ưu.";
        $rawTitle = strtolower($title);
        $rawFull = "{$rawTitle} " . strtolower($desc);
        
        // Insert into Product
        DB::table('product')->insert([
            'id' => $pid,
            'title' => $title,
            'image' => $image,
            'description' => $desc,
            'content' => '',
            'sell' => 0,
            'competitor_price' => null,
            'competitor_url' => null,
            'market_updated_at' => null,
            'view' => 0,
            'rating' => 0,
            'status' => 'active',
            'priority' => 1000,
            'tags' => $tags,
            'specs' => 'Camera giám sát chất lượng cao / Hỗ trợ hồng ngoại',
            'template' => '',
            'stock_manage' => 0,
            'stop_selling' => 'publish',
            'stock_quant' => 1,
            'option_1' => '',
            'option_2' => '',
            'option_3' => '',
            'option_4' => '',
            'option_5' => '',
            'option_6' => '',
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
            'raw_title' => $rawTitle,
            'raw_full' => $rawFull
        ]);
        
        // Insert into Variant
        DB::table('variant')->insert([
            'id' => $vid,
            'title' => 'Default',
            'product_id' => $pid,
            'option_1' => '',
            'option_2' => '',
            'option_3' => '',
            'option_4' => '',
            'option_5' => '',
            'option_6' => '',
            'barcode' => '',
            'sku_code' => '',
            'weight' => 0,
            'price' => 0,
            'sale_id' => null,
            'price_compare' => 0,
            'stock_quant' => 1,
            'status' => 'active',
            'note' => '',
            'created_at' => $createdAt,
            'updated_at' => $createdAt
        ]);
        
        // Insert into Product Translations
        DB::table('product_translations')->insert([
            'id' => $tid,
            'product_id' => $pid,
            'lang' => 'vi',
            'title' => $title,
            'description' => '',
            'content' => "<p>{$desc}</p>",
            'created_at' => $createdAt,
            'updated_at' => $createdAt
        ]);
        
        // Insert slugs
        $slug = Str::slug($title);
        DB::table('slug')->insert([
            'id' => $sidVi,
            'post_id' => $pid,
            'post_type' => 'product',
            'lang' => 'vi',
            'handle' => $slug,
            'created_at' => $createdAt,
            'updated_at' => $createdAt
        ]);
        
        DB::table('slug')->insert([
            'id' => $sidEn,
            'post_id' => $pid,
            'post_type' => 'product',
            'lang' => 'en',
            'handle' => $slug,
            'created_at' => $createdAt,
            'updated_at' => $createdAt
        ]);
        
        // Insert into collection_product
        DB::table('collection_product')->insert([
            'id' => $cpid,
            'collection_id' => $collectionId,
            'product_id' => $pid,
            'priority' => 0,
            'created_at' => $createdAt,
            'updated_at' => $createdAt
        ]);
        
        echo "Inserted camera: {$title} (ID: {$pid})\n";
    }
    
    DB::commit();
    echo "SUCCESS: All 30 camera products inserted successfully!\n";
} catch (\Exception $e) {
    DB::rollBack();
    echo "ERROR: " . $e->getMessage() . "\n";
}

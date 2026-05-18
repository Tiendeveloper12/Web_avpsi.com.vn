import re

products_raw = """TP-Lmuc Archer AX55	
Bộ định tuyến WiFi 6 phổ biến được thiết kế cho mạng gia đình và van-phong tốc độ cao. Có tốc độ AX3000 băng tần kép, cổng Gigabit WAN/LAN, công nghệ OFDMA và MU-MIMO, bảo mật WPA3, hỗ trợ OneMesh, kiểm soát của phụ huynh và phạm vi phủ sóng mạnh mẽ cho môi trường chơi game và phát trực tuyến.
TP-Lmuc Archer AX55.jpg

ASUS RT-AX52	
Bộ định tuyến WiFi 6 được mua rộng rãi với tốc độ băng tần kép AX1800, bảo mật ASUS AiProtection, kiểm soát của phụ huynh, cổng Gigabit Ethernet, hỗ trợ OFDMA, khả năng tương thích lưới và hiệu suất không dây ổn định cho gia đình và xe van.	
ASUS RT-AX52.jpg

TP-Lmuc Archer C54	
Bộ định tuyến WiFi băng tần kép AC1200 giá cả phải chăng được thiết kế để sử dụng internet hàng ngày. Có bốn ăng-ten bên ngoài, kiểm soát của phụ huynh, hỗ trợ mạng khách, khả năng tương thích IPTV và vùng phủ sóng không dây đáng tin cậy cho những ngôi nhà nhỏ và xe van-phong.	
TP-Lmuc Archer C54.jpg

NETGEAR Nighthawk RAX50	
Bộ định tuyến WiFi 6 hiệu suất cao được thiết kế để chơi game và phát trực tuyến. Có tốc độ AX5400, kết nối băng tần kép, bảo vệ bảo mật nâng cao, cổng Gigabit Ethernet, hỗ trợ USB 3.0 và hiệu suất không dây đa thiết bị mạnh mẽ.	
NETGEAR Nighthawk RAX50.jpg

Mercusys MW302R	
Bộ định tuyến không dây thân thiện với ngân sách được thiết kế cho mạng gia đình và van-phong cơ bản. Có tốc độ không dây 300Mbps, ăng-ten kép bên ngoài, thiết kế nhỏ gọn, thiết lập dễ dàng và chia sẻ internet đáng tin cậy cho không gian nhỏ.	
Mercusys MW302R.jpg

UGREEN Cat6 Ethernet Cable	
Cáp internet Cat6 tốc độ cao được thiết kế để kết nối mạng Gigabit ổn định. Có đầu nối RJ45, tốc độ truyền lên đến 1000Mbps, che chắn chống nhiễu, áo khoác PVC bền và khả năng tương thích với bộ định tuyến, PC, thiết bị chuyển mạch và bảng điều khiển trò chơi.	
UGREEN Cat6 Ethernet Cable.jpg

Vention Cat6 Ethernet Cable	
Cáp mạng Cat6 phổ biến được thiết kế để kết nối internet có dây đáng tin cậy. Có lõi đồng nguyên chất, đầu nối RJ45, hỗ trợ tốc độ Gigabit, che chắn chống ồn, kết cấu bện bền và khả năng tương thích với bộ định tuyến và hệ thống máy tính để bàn.	
Vention Cat6 Ethernet Cable.jpg

AMP CAT6 UTP Cable	
Cáp mạng CAT6 cấp chuyên nghiệp được thiết kế cho mạng van-phong và doanh nghiệp. Có dây dẫn bằng đồng nguyên chất, truyền dữ liệu Gigabit ổn định, cách điện bền, truyền nhiễu thấp và hỗ trợ cài đặt mạng có cấu trúc.	
AMP CAT6 UTP Cable.jpg

Dintek CAT6 Patch Cord	
Cáp mạng được sử dụng rộng rãi có hỗ trợ Gigabit Ethernet tốc độ cao, đầu nối RJ45 đúc, kết cấu bền linh hoạt, truyền tín hiệu ổn định và khả năng tương thích với thiết bị chuyển mạch, bộ định tuyến, PC và hệ thống mạng doanh nghiệp.	
Dintek CAT6 Patch Cord.jpg

Belkin Cat6 Ethernet Cable	
Cáp internet Cat6 cao cấp được thiết kế để kết nối mạng tốc độ cao đáng tin cậy. Có hỗ trợ Gigabit Ethernet, đầu nối RJ45, lớp phủ PVC bền, che chắn chống nhiễu và kết nối có dây ổn định cho các thiết lập van-phong và chơi game.	
Belkin Cat6 Ethernet Cable.jpg

TP-Lmuc TL-SG108	
Một trong những thiết bị chuyển mạch Gigabit không được quản lý phổ biến nhất trên thế giới có 8 cổng Gigabit Ethernet, thiết lập plug-and-play, vỏ kim loại, công nghệ tiết kiệm năng lượng, hoạt động im lặng không quạt và hiệu suất mạng gia đình đáng tin cậy.	
TP-Lmuc TL-SG108.jpg

TP-Lmuc TL-SG1005D	
Bộ chuyển mạch máy tính để bàn Gigabit 5 cổng nhỏ gọn được thiết kế để mở rộng gia đình và van-phong. Tính năng cài đặt plug-and-play, hoạt động im lặng không quạt, công nghệ tiết kiệm năng lượng, thiết kế máy tính để bàn nhỏ gọn và hiệu suất mạng có dây ổn định.	
TP-Lmuc TL-SG1005D.jpg

Netgear ProSafe GS105	
Bộ chuyển mạch Gigabit không được quản lý đáng tin cậy được thiết kế cho mạng van-phong và doanh nghiệp. Có 5 cổng Gigabit Ethernet, khung kim loại, hoạt động không quạt, kết nối plug-and-play, hiệu suất tiết kiệm năng lượng và thiết kế thương mại bền bỉ.	
Netgear ProSafe GS105.jpg

Cisco CBS110-8T-D	
Bộ chuyển mạch mạng không được quản lý cấp doanh nghiệp được thiết kế cho các xe tải nhỏ và mạng doanh nghiệp. Có 8 cổng Gigabit Ethernet, hoạt động tiết kiệm năng lượng, thiết kế nhỏ gọn, cài đặt plug-and-play và hiệu suất mạng thương mại đáng tin cậy.	
Cisco CBS110-8T-D.jpg

D-Lmuc DGS-108	
Bộ chuyển mạch Gigabit 8 cổng được mua rộng rãi được thiết kế cho van-phong và mạng có dây gia đình. Có vỏ kim loại, thiết lập plug-and-play, tối ưu hóa lưu lượng QoS, hoạt động im lặng không quạt và hiệu suất Gigabit Ethernet tiết kiệm năng lượng.	
D-Lmuc DGS-108.jpg"""

def slugify(text):
    text = text.lower()
    text = re.sub(r'[^a-z0-9]+', '-', text)
    return text.strip('-')

products = []
lines = [l.strip() for l in products_raw.split('\n') if l.strip()]
for i in range(0, len(lines), 3):
    title = lines[i]
    desc = lines[i+1]
    img = lines[i+2]
    products.append((title, desc, img))

start_product_id = 374
start_variant_id = 367
start_translation_id = 374
start_slug_id = 853
start_collection_product_id = 503
collection_id = 14 # Linh kiện vi tính
tag = 'internet'
created_at = '2024-05-14 04:40:00'

sql_output = []
sql_output.append("SET FOREIGN_KEY_CHECKS = 0;")

# Product
product_values = []
for i, (title, desc, img) in enumerate(products):
    pid = start_product_id + i
    raw_title = title.lower()
    raw_full = f"{raw_title} {desc.lower()}"
    val = f"({pid}, '{title}', '{img}', '', '', 0, 0, 0.00, 'active', 1000, '{tag}', '', 0, 'publish', 1, '', '', '', '', '', '', '{created_at}', '{created_at}', '{raw_title}', '{raw_full}')"
    product_values.append(val)
sql_output.append("INSERT INTO `product` (`id`, `title`, `image`, `description`, `content`, `sell`, `view`, `rating`, `status`, `priority`, `tags`, `template`, `stock_manage`, `stop_selling`, `stock_quant`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `created_at`, `updated_at`, `raw_title`, `raw_full`) VALUES\n" + ",\n".join(product_values) + ";")

# Variant
variant_values = []
for i, (title, desc, img) in enumerate(products):
    vid = start_variant_id + i
    pid = start_product_id + i
    val = f"({vid}, 'Default', {pid}, '', '', '', '', '', '', '', '', 0, 0, NULL, 0, 1, 'active', '', '{created_at}', '{created_at}')"
    variant_values.append(val)
sql_output.append("INSERT INTO `variant` (`id`, `title`, `product_id`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `barcode`, `sku_code`, `weight`, `price`, `sale_id`, `price_compare`, `stock_quant`, `status`, `note`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(variant_values) + ";")

# Translation
trans_values = []
for i, (title, desc, img) in enumerate(products):
    tid = start_translation_id + i
    pid = start_product_id + i
    val = f"({tid}, {pid}, 'vi', '{title}', '', '<p>{desc}</p>', '{created_at}', '{created_at}')"
    trans_values.append(val)
sql_output.append("INSERT INTO `product_translations` (`id`, `product_id`, `lang`, `title`, `description`, `content`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(trans_values) + ";")

# Slug
slug_values = []
for i, (title, desc, img) in enumerate(products):
    pid = start_product_id + i
    slug = slugify(title)
    sid_vi = start_slug_id + (i * 2)
    sid_en = sid_vi + 1
    slug_values.append(f"({sid_vi}, {pid}, 'product', 'vi', '{slug}', '{created_at}', '{created_at}')")
    slug_values.append(f"({sid_en}, {pid}, 'product', 'en', '{slug}', '{created_at}', '{created_at}')")
sql_output.append("INSERT INTO `slug` (`id`, `post_id`, `post_type`, `lang`, `handle`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(slug_values) + ";")

# Collection Product
cp_values = []
for i, (title, desc, img) in enumerate(products):
    cpid = start_collection_product_id + i
    pid = start_product_id + i
    val = f"({cpid}, {collection_id}, {pid}, 0, '{created_at}', '{created_at}')"
    cp_values.append(val)
sql_output.append("INSERT INTO `collection_product` (`id`, `collection_id`, `product_id`, `priority`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(cp_values) + ";")

sql_output.append("SET FOREIGN_KEY_CHECKS = 1;")

with open('scratch/batch7.sql', 'w', encoding='utf-8') as f:
    f.write("\n\n".join(sql_output))

print("Generated scratch/batch7.sql")

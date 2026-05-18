import re

items = [
    "LG UltraGear G6 27” 300Hz", "LG UltraGear 27G610A-B", "ASUS ProArt PA248QV", "MSI Optix G241", "MSI Optix MAG241",
    "Acer Predator XB273U", "Samsung LF22T350FHEXXV", "Philips 276B1", "ViewSonic VG3820C", "LG UltraGear 24GN60R-B",
    "Corsair Vengeance LPX DDR4", "Kingston FURY Beast DDR5", "G.SKILL Trident Z5 Neo RGB DDR5", "Crucial DDR5 UDIMM",
    "Corsair Vengeance RGB DDR5", "G.SKILL Ripjaws V DDR4", "Crucial Laptop DDR5 SO-DIMM", "Corsair Dominator Platinum RGB DDR5",
    "TeamGroup T-Force Delta RGB DDR5", "Samsung DDR5 Desktop RAM", "Samsung 990 PRO 1TB NVMe SSD", "WD Black SN850X SSD",
    "Crucial P3 Plus NVMe SSD", "Kingston NV2 NVMe SSD", "Samsung 870 EVO SATA SSD", "Seagate BarraCuda HDD", "WD Blue HDD",
    "Toshiba P300 HDD", "Seagate IronWolf NAS HDD", "WD Purple Surveillance HDD", "ASUS ROG Maximus Z790 Hero",
    "GIGABYTE Z790 AORUS Elite AX", "MSI MAG X870 TOMAHAWK WIFI", "ASUS TUF Gaming B650-PLUS WIFI", "MSI B650 Gaming Plus WIFI",
    "ASRock B650M-HDV/M.2", "GIGABYTE X870E AORUS MASTER", "ASUS PRIME H610M-K D4", "MSI PRO B760M-A WIFI",
    "ASUS ROG Strix B550-F Gaming WIFI II", "Intel Core i9-14900K", "Intel Core i7-14700K", "Intel Core i5-14600K",
    "AMD Ryzen 9 9950X", "AMD Ryzen 7 9800X3D", "AMD Ryzen 5 9600X", "Intel Core i3-14100F", "AMD Ryzen 7 7800X3D",
    "Intel Core Ultra 7 265K", "AMD Ryzen 5 5600", "Logitech G Pro X Gaming Headset", "HyperX Cloud II", "Razer BlackShark V2",
    "SteelSeries Arctis Nova 7 Wireless", "Sony WH-1000XM5", "Bose QuietComfort Ultra Headphones", "JBL Quantum 100",
    "Corsair HS80 RGB Wireless", "Sennheiser HD 450BT", "ASUS ROG Delta S", "TP-Lmuc Archer AX55", "ASUS RT-AX58U",
    "TP-Lmuc Deco X20", "ASUS TUF Gaming AX4200", "Xiaomi Router AX3000T", "Netgear Nighthawk AX12 RAX120", "TP-Lmuc Archer C6",
    "ASUS RT-AX86U Pro", "Huawei AX3 Quad-Core", "Lmucsys MR7350", "Corsair RM750x", "Cooler Master MWE Gold 750 V2",
    "ASUS ROG Strix 850G", "MSI MAG A650BN", "Seasonic Focus GX-750", "Corsair CV650", "Gigabyte UD750GM",
    "Thermaltake Toughpower GF A3 850W", "DeepCool PK650D", "EVGA SuperNOVA 850 G6", "Logitech G Pro X TKL Lightspeed",
    "Razer Huntsman V2", "Corsair K100 RGB", "Logitech MX Keys S", "Keychron K2 Wireless Mechanical Keyboard",
    "SteelSeries Apex Pro TKL", "ASUS ROG Azoth", "Dell KB216 Multimedia Keyboard"
]

image_map = {
    "LG UltraGear G6 27” 300Hz": "LG UltraGear G6.jpg",
    "Samsung 990 PRO 1TB NVMe SSD": "Samsung 990 PRO SSD.jpg",
    "Crucial P3 Plus NVMe SSD": "Crucial P3 Plus SSD.jpg",
    "Kingston NV2 NVMe SSD": "Kingston NV2 SSD.jpg",
    "Samsung 870 EVO SATA SSD": "Samsung 870 EVO SSD.jpg",
    "Seagate IronWolf NAS HDD": "Seagate IronWolf HDD.jpg",
    "WD Purple Surveillance HDD": "WD Purple HDD.jpg",
    "ASRock B650M-HDV/M.2": "ASRock B650M-HDV M2.jpg"
}

def slugify(text):
    text = text.lower()
    text = text.replace('”', '').replace('’', '')
    text = re.sub(r'[^a-z0-9]+', '-', text)
    return text.strip('-')

def generate_desc(title):
    brand = title.split()[0]
    return f"{title} là linh kiện máy tính {brand} cao cấp, mang lại hiệu suất làm việc và chơi game tuyệt vời. Sản phẩm được tin dùng bởi các chuyên gia và game thủ trên toàn thế giới."

start_product_id = 486
start_variant_id = 479
start_translation_id = 486
start_slug_id = 1077
start_collection_product_id = 615
collection_id = 14 # Linh kiện vi tính
tag = 'linh-kien'
created_at = '2024-05-14 05:47:00'

sql_output = []
sql_output.append("SET FOREIGN_KEY_CHECKS = 0;")

# Product
product_values = []
for i, title in enumerate(items):
    pid = start_product_id + i
    img = image_map.get(title)
    if not img:
        img = title.replace('TP-Lmuc', 'TP-Link').replace('Lmucsys', 'Linksys') + ".jpg"
    
    desc = generate_desc(title)
    raw_title = title.lower()
    raw_full = f"{raw_title} {desc.lower()}"
    val = f"({pid}, '{title}', '{img}', '', '', 0, 0, 0.00, 'active', 1000, '{tag}', '', 0, 'publish', 1, '', '', '', '', '', '', '{created_at}', '{created_at}', '{raw_title}', '{raw_full}')"
    product_values.append(val)
sql_output.append("INSERT INTO `product` (`id`, `title`, `image`, `description`, `content`, `sell`, `view`, `rating`, `status`, `priority`, `tags`, `template`, `stock_manage`, `stop_selling`, `stock_quant`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `created_at`, `updated_at`, `raw_title`, `raw_full`) VALUES\n" + ",\n".join(product_values) + ";")

# Variant
variant_values = []
for i, title in enumerate(items):
    vid = start_variant_id + i
    pid = start_product_id + i
    val = f"({vid}, 'Default', {pid}, '', '', '', '', '', '', '', '', 0, 0, NULL, 0, 1, 'active', '', '{created_at}', '{created_at}')"
    variant_values.append(val)
sql_output.append("INSERT INTO `variant` (`id`, `title`, `product_id`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `barcode`, `sku_code`, `weight`, `price`, `sale_id`, `price_compare`, `stock_quant`, `status`, `note`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(variant_values) + ";")

# Translation
trans_values = []
for i, title in enumerate(items):
    tid = start_translation_id + i
    pid = start_product_id + i
    desc = generate_desc(title)
    val = f"({tid}, {pid}, 'vi', '{title}', '', '<p>{desc}</p>', '{created_at}', '{created_at}')"
    trans_values.append(val)
sql_output.append("INSERT INTO `product_translations` (`id`, `product_id`, `lang`, `title`, `description`, `content`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(trans_values) + ";")

# Slug
slug_values = []
for i, title in enumerate(items):
    pid = start_product_id + i
    slug = slugify(title)
    sid_vi = start_slug_id + (i * 2)
    sid_en = sid_vi + 1
    slug_values.append(f"({sid_vi}, {pid}, 'product', 'vi', '{slug}', '{created_at}', '{created_at}')")
    slug_values.append(f"({sid_en}, {pid}, 'product', 'en', '{slug}', '{created_at}', '{created_at}')")
sql_output.append("INSERT INTO `slug` (`id`, `post_id`, `post_type`, `lang`, `handle`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(slug_values) + ";")

# Collection Product
cp_values = []
for i, title in enumerate(items):
    cpid = start_collection_product_id + i
    pid = start_product_id + i
    val = f"({cpid}, {collection_id}, {pid}, 0, '{created_at}', '{created_at}')"
    cp_values.append(val)
sql_output.append("INSERT INTO `collection_product` (`id`, `collection_id`, `product_id`, `priority`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(cp_values) + ";")

sql_output.append("SET FOREIGN_KEY_CHECKS = 1;")

with open('scratch/batch12_accessories.sql', 'w', encoding='utf-8') as f:
    f.write("\n\n".join(sql_output))

print("Generated scratch/batch12_accessories.sql")

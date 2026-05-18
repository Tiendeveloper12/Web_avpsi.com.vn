import re

pcs = [
    "Apple iMac 24-inch M3", "Dell OptiPlex 7010 Tower", "HP ProDesk 400 G9", "Lenovo ThmucCentre M70t Gen 4",
    "ASUS ROG G22CH", "MSI MAG Infinite S3", "Acer Predator Orion 3000", "Lenovo Legion Tower 5", "HP OMEN 40L",
    "Dell Alienware Aurora R16", "ASUS ExpertCenter D7 Tower", "Apple Mac Mini M3", "Apple Mac Studio M3 Max",
    "Corsair Vengeance i7400", "CyberPowerPC Gamer Xtreme", "Gigabyte AORUS Model X", "Intel NUC 13 Pro",
    "Fujitsu ESPRIMO D7012", "Huawei MateStation S", "Samsung All-in-One Pro"
]

def slugify(text):
    text = text.lower()
    text = re.sub(r'[^a-z0-9]+', '-', text)
    return text.strip('-')

def generate_desc(title):
    brand = title.split()[0]
    return f"{title} là hệ thống máy tính để bàn {brand} mạnh mẽ, được tối ưu hóa cho công việc và giải trí chuyên nghiệp. Trang bị linh kiện tiên tiến, khả năng nâng cấp linh hoạt và độ bền cao."

start_product_id = 466
start_variant_id = 459
start_translation_id = 466
start_slug_id = 1037
start_collection_product_id = 595
collection_id = 13 # Desktop
tag = 'pc'
created_at = '2024-05-14 05:29:00'

sql_output = []
sql_output.append("SET FOREIGN_KEY_CHECKS = 0;")

# Product
product_values = []
for i, title in enumerate(pcs):
    pid = start_product_id + i
    img = f"{title}.jpg"
    desc = generate_desc(title)
    raw_title = title.lower()
    raw_full = f"{raw_title} {desc.lower()}"
    val = f"({pid}, '{title}', '{img}', '', '', 0, 0, 0.00, 'active', 1000, '{tag}', '', 0, 'publish', 1, '', '', '', '', '', '', '{created_at}', '{created_at}', '{raw_title}', '{raw_full}')"
    product_values.append(val)
sql_output.append("INSERT INTO `product` (`id`, `title`, `image`, `description`, `content`, `sell`, `view`, `rating`, `status`, `priority`, `tags`, `template`, `stock_manage`, `stop_selling`, `stock_quant`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `created_at`, `updated_at`, `raw_title`, `raw_full`) VALUES\n" + ",\n".join(product_values) + ";")

# Variant
variant_values = []
for i, title in enumerate(pcs):
    vid = start_variant_id + i
    pid = start_product_id + i
    val = f"({vid}, 'Default', {pid}, '', '', '', '', '', '', '', '', 0, 0, NULL, 0, 1, 'active', '', '{created_at}', '{created_at}')"
    variant_values.append(val)
sql_output.append("INSERT INTO `variant` (`id`, `title`, `product_id`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `barcode`, `sku_code`, `weight`, `price`, `sale_id`, `price_compare`, `stock_quant`, `status`, `note`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(variant_values) + ";")

# Translation
trans_values = []
for i, title in enumerate(pcs):
    tid = start_translation_id + i
    pid = start_product_id + i
    desc = generate_desc(title)
    val = f"({tid}, {pid}, 'vi', '{title}', '', '<p>{desc}</p>', '{created_at}', '{created_at}')"
    trans_values.append(val)
sql_output.append("INSERT INTO `product_translations` (`id`, `product_id`, `lang`, `title`, `description`, `content`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(trans_values) + ";")

# Slug
slug_values = []
for i, title in enumerate(pcs):
    pid = start_product_id + i
    slug = slugify(title)
    sid_vi = start_slug_id + (i * 2)
    sid_en = sid_vi + 1
    slug_values.append(f"({sid_vi}, {pid}, 'product', 'vi', '{slug}', '{created_at}', '{created_at}')")
    slug_values.append(f"({sid_en}, {pid}, 'product', 'en', '{slug}', '{created_at}', '{created_at}')")
sql_output.append("INSERT INTO `slug` (`id`, `post_id`, `post_type`, `lang`, `handle`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(slug_values) + ";")

# Collection Product
cp_values = []
for i, title in enumerate(pcs):
    cpid = start_collection_product_id + i
    pid = start_product_id + i
    val = f"({cpid}, {collection_id}, {pid}, 0, '{created_at}', '{created_at}')"
    cp_values.append(val)
sql_output.append("INSERT INTO `collection_product` (`id`, `collection_id`, `product_id`, `priority`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(cp_values) + ";")

sql_output.append("SET FOREIGN_KEY_CHECKS = 1;")

with open('scratch/batch11_pcs.sql', 'w', encoding='utf-8') as f:
    f.write("\n\n".join(sql_output))

print("Generated scratch/batch11_pcs.sql")

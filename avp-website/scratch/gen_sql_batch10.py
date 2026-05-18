import re

laptops = [
    "Apple MacBook Air 13 M3", "Apple MacBook Pro 14 M4 Pro", "ASUS ROG Strix G16", "ASUS TUF Gaming A15",
    "Lenovo Legion Pro 5", "Lenovo IdeaPad Slim 5", "Dell XPS 13", "Dell Inspiron 15", "HP Victus 15",
    "HP Pavilion 14", "Acer Nitro V 15", "Acer Aspire 5", "MSI Katana 15", "MSI Modern 14", "Razer Blade 16",
    "Microsoft Surface Laptop 6", "LG Gram 16", "Huawei MateBook D 16", "Gigabyte G5 KF", "Samsung Galaxy Book4 Pro"
]

def slugify(text):
    text = text.lower()
    text = re.sub(r'[^a-z0-9]+', '-', text)
    return text.strip('-')

def generate_desc(title):
    brand = title.split()[0]
    return f"{title} là dòng laptop {brand} hiệu năng cao, thiết kế mỏng nhẹ, sang trọng, trang bị cấu hình mạnh mẽ đáp ứng tốt mọi nhu cầu từ học tập, làm việc đến giải trí chuyên nghiệp."

start_product_id = 446
start_variant_id = 439
start_translation_id = 446
start_slug_id = 997
start_collection_product_id = 575
collection_id = 12 # Laptop
tag = 'laptop'
created_at = '2024-05-14 05:23:00'

sql_output = []
sql_output.append("SET FOREIGN_KEY_CHECKS = 0;")

# Product
product_values = []
for i, title in enumerate(laptops):
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
for i, title in enumerate(laptops):
    vid = start_variant_id + i
    pid = start_product_id + i
    val = f"({vid}, 'Default', {pid}, '', '', '', '', '', '', '', '', 0, 0, NULL, 0, 1, 'active', '', '{created_at}', '{created_at}')"
    variant_values.append(val)
sql_output.append("INSERT INTO `variant` (`id`, `title`, `product_id`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `barcode`, `sku_code`, `weight`, `price`, `sale_id`, `price_compare`, `stock_quant`, `status`, `note`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(variant_values) + ";")

# Translation
trans_values = []
for i, title in enumerate(laptops):
    tid = start_translation_id + i
    pid = start_product_id + i
    desc = generate_desc(title)
    val = f"({tid}, {pid}, 'vi', '{title}', '', '<p>{desc}</p>', '{created_at}', '{created_at}')"
    trans_values.append(val)
sql_output.append("INSERT INTO `product_translations` (`id`, `product_id`, `lang`, `title`, `description`, `content`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(trans_values) + ";")

# Slug
slug_values = []
for i, title in enumerate(laptops):
    pid = start_product_id + i
    slug = slugify(title)
    sid_vi = start_slug_id + (i * 2)
    sid_en = sid_vi + 1
    slug_values.append(f"({sid_vi}, {pid}, 'product', 'vi', '{slug}', '{created_at}', '{created_at}')")
    slug_values.append(f"({sid_en}, {pid}, 'product', 'en', '{slug}', '{created_at}', '{created_at}')")
sql_output.append("INSERT INTO `slug` (`id`, `post_id`, `post_type`, `lang`, `handle`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(slug_values) + ";")

# Collection Product
cp_values = []
for i, title in enumerate(laptops):
    cpid = start_collection_product_id + i
    pid = start_product_id + i
    val = f"({cpid}, {collection_id}, {pid}, 0, '{created_at}', '{created_at}')"
    cp_values.append(val)
sql_output.append("INSERT INTO `collection_product` (`id`, `collection_id`, `product_id`, `priority`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(cp_values) + ";")

sql_output.append("SET FOREIGN_KEY_CHECKS = 1;")

with open('scratch/batch10_laptops.sql', 'w', encoding='utf-8') as f:
    f.write("\n\n".join(sql_output))

print("Generated scratch/batch10_laptops.sql")

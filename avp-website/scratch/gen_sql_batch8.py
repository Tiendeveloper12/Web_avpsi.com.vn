import re
import os

cartridges = [
    'HP 67 Black Ink Cartridge', 'HP 67 Tri-Color Ink Cartridge', 'HP 680 Black Ink Cartridge', 'HP 680 Color Ink Cartridge',
    'HP 954 Black Ink Cartridge', 'HP GT53 Black Ink Bottle', 'HP GT52 Color Ink Bottle', 'Epson 003 Black Ink Bottle',
    'Epson 003 Cyan Ink Bottle', 'Epson 003 Magenta Ink Bottle', 'Epson 003 Yellow Ink Bottle', 'Epson 664 Black Ink Bottle',
    'Epson 664 Cyan Ink Bottle', 'Epson T673 Photo Black Ink Bottle', 'OKI C332 Black Toner Cartridge',
    'OKI C332 Cyan Toner Cartridge', 'OKI C332 Magenta Toner Cartridge', 'OKI C332 Yellow Toner Cartridge',
    'OKI B412 Black Toner Cartridge', 'OKI MC363 Black Toner Cartridge', 'OKI MC363 Cyan Toner Cartridge',
    'Canon GI-790 Black Ink Bottle', 'Canon GI-790 Cyan Ink Bottle', 'Canon GI-790 Magenta Ink Bottle',
    'Canon GI-790 Yellow Ink Bottle', 'Canon PG-745 Black Ink Cartridge', 'Canon CL-746 Color Ink Cartridge',
    'Canon Cartridge 325 Toner', 'Brother BT-D60 Black Ink Bottle', 'Brother BT5000 Cyan Ink Bottle',
    'Brother BT5000 Magenta Ink Bottle', 'Brother BT5000 Yellow Ink Bottle', 'Brother TN-2385 Black Toner Cartridge',
    'Brother TN-261 Cyan Toner Cartridge', 'Brother TN-261 Magenta Toner Cartridge', 'Ricoh SP C250 Black Toner Cartridge',
    'Ricoh SP C250 Cyan Toner Cartridge', 'Ricoh SP C250 Magenta Toner Cartridge', 'Ricoh SP C250 Yellow Toner Cartridge',
    'Ricoh MP C3503 Black Toner Cartridge', 'Ricoh MP C3503 Cyan Toner Cartridge', 'Ricoh MP C3503 Magenta Toner Cartridge'
]

def slugify(text):
    text = text.lower()
    text = re.sub(r'[^a-z0-9]+', '-', text)
    return text.strip('-')

# Read localhost.sql to extract descriptions
with open('database/localhost.sql', 'r', encoding='utf-8') as f:
    sql_content = f.read()

def get_data_from_sql(title):
    # Find the line in product table dumping
    # Example: (147, 'HP 67 Black Ink Cartridge', 'HP 67 Black Ink Cartridge.jpg', '', '', 0, 0, 0.00, 'active', 1000, 'muc', '', 0, 'publish', 1, '', '', '', '', '', '', '2024-05-14 04:20:00', '2024-05-14 04:20:00', 'hp 67 black ink cartridge', '...')
    pattern = rf"\(\d+, '{re.escape(title)}', '[^']+', '', '', 0, 0, 0\.00, 'active', 1000, 'muc', '', 0, 'publish', 1, '', '', '', '', '', '', '[^']+', '[^']+', '[^']+', '([^']+)'\)"
    match = re.search(pattern, sql_content)
    if match:
        return match.group(1)
    return None

def generate_desc(title):
    brand = title.split()[0]
    model = title.split()[1]
    color = "đa màu" if "Color" in title or "Yellow" in title or "Magenta" in title or "Cyan" in title else "đen"
    return f"{title} chính hãng được thiết kế để mang lại bản in chất lượng cao và tin cậy. Sản phẩm tương thích với các dòng máy in {brand}, đảm bảo hiệu suất in ấn tối ưu và độ bền màu cao."

data = []
for c in cartridges:
    desc = get_data_from_sql(c)
    if not desc:
        desc = generate_desc(c)
    data.append((c, desc))

start_product_id = 389
start_variant_id = 382
start_translation_id = 389
start_slug_id = 883
start_collection_product_id = 518
collection_id = 2 # Mực in
tag = 'muc'
created_at = '2024-05-14 05:00:00'

sql_output = []
sql_output.append("SET FOREIGN_KEY_CHECKS = 0;")

# Product
product_values = []
for i, (title, desc) in enumerate(data):
    pid = start_product_id + i
    img = f"{title}.jpg"
    raw_title = title.lower()
    raw_full = f"{raw_title} {desc.lower()}"
    val = f"({pid}, '{title}', '{img}', '', '', 0, 0, 0.00, 'active', 1000, '{tag}', '', 0, 'publish', 1, '', '', '', '', '', '', '{created_at}', '{created_at}', '{raw_title}', '{raw_full}')"
    product_values.append(val)
sql_output.append("INSERT INTO `product` (`id`, `title`, `image`, `description`, `content`, `sell`, `view`, `rating`, `status`, `priority`, `tags`, `template`, `stock_manage`, `stop_selling`, `stock_quant`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `created_at`, `updated_at`, `raw_title`, `raw_full`) VALUES\n" + ",\n".join(product_values) + ";")

# Variant
variant_values = []
for i, (title, desc) in enumerate(data):
    vid = start_variant_id + i
    pid = start_product_id + i
    val = f"({vid}, 'Default', {pid}, '', '', '', '', '', '', '', '', 0, 0, NULL, 0, 1, 'active', '', '{created_at}', '{created_at}')"
    variant_values.append(val)
sql_output.append("INSERT INTO `variant` (`id`, `title`, `product_id`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `barcode`, `sku_code`, `weight`, `price`, `sale_id`, `price_compare`, `stock_quant`, `status`, `note`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(variant_values) + ";")

# Translation
trans_values = []
for i, (title, desc) in enumerate(data):
    tid = start_translation_id + i
    pid = start_product_id + i
    val = f"({tid}, {pid}, 'vi', '{title}', '', '<p>{desc}</p>', '{created_at}', '{created_at}')"
    trans_values.append(val)
sql_output.append("INSERT INTO `product_translations` (`id`, `product_id`, `lang`, `title`, `description`, `content`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(trans_values) + ";")

# Slug
slug_values = []
for i, (title, desc) in enumerate(data):
    pid = start_product_id + i
    slug = slugify(title)
    sid_vi = start_slug_id + (i * 2)
    sid_en = sid_vi + 1
    slug_values.append(f"({sid_vi}, {pid}, 'product', 'vi', '{slug}', '{created_at}', '{created_at}')")
    slug_values.append(f"({sid_en}, {pid}, 'product', 'en', '{slug}', '{created_at}', '{created_at}')")
sql_output.append("INSERT INTO `slug` (`id`, `post_id`, `post_type`, `lang`, `handle`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(slug_values) + ";")

# Collection Product
cp_values = []
for i, (title, desc) in enumerate(data):
    cpid = start_collection_product_id + i
    pid = start_product_id + i
    val = f"({cpid}, {collection_id}, {pid}, 0, '{created_at}', '{created_at}')"
    cp_values.append(val)
sql_output.append("INSERT INTO `collection_product` (`id`, `collection_id`, `product_id`, `priority`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(cp_values) + ";")

sql_output.append("SET FOREIGN_KEY_CHECKS = 1;")

with open('scratch/batch8_cartridges.sql', 'w', encoding='utf-8') as f:
    f.write("\n\n".join(sql_output))

print("Generated scratch/batch8_cartridges.sql")

import os

def generate_sql():
    batch_file = 'scratch/batch5.sql'
    output_file = 'scratch/import_batch5_final.sql'
    
    if not os.path.exists(batch_file):
        print(f"Error: {batch_file} not found.")
        return

    with open(batch_file, 'r', encoding='utf-8') as f:
        lines = f.readlines()

    sections = {}
    current_section = None
    
    for line in lines:
        line = line.strip()
        if line.startswith('--- '):
            current_section = line.replace('--- ', '').replace(' ---', '').strip()
            sections[current_section] = []
        elif line.startswith('('):
            if current_section:
                # Remove trailing comma if exists
                if line.endswith(','):
                    line = line[:-1]
                sections[current_section].append(line)

    with open(output_file, 'w', encoding='utf-8') as f:
        f.write("SET FOREIGN_KEY_CHECKS = 0;\n\n")
        
        if 'product' in sections:
            f.write("INSERT INTO `product` (`id`, `title`, `image`, `description`, `content`, `sell`, `view`, `rating`, `status`, `priority`, `tags`, `template`, `stock_manage`, `stop_selling`, `stock_quant`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `created_at`, `updated_at`, `raw_title`, `raw_full`) VALUES\n")
            f.write(",\n".join(sections['product']) + ";\n\n")

        if 'variant' in sections:
            f.write("INSERT INTO `variant` (`id`, `title`, `product_id`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `barcode`, `sku_code`, `weight`, `price`, `sale_id`, `price_compare`, `stock_quant`, `status`, `note`, `created_at`, `updated_at`) VALUES\n")
            f.write(",\n".join(sections['variant']) + ";\n\n")

        if 'translations' in sections:
            f.write("INSERT INTO `product_translations` (`id`, `product_id`, `lang`, `title`, `description`, `content`, `created_at`, `updated_at`) VALUES\n")
            f.write(",\n".join(sections['translations']) + ";\n\n")

        if 'slug' in sections:
            f.write("INSERT INTO `slug` (`id`, `post_id`, `post_type`, `lang`, `handle`, `created_at`, `updated_at`) VALUES\n")
            f.write(",\n".join(sections['slug']) + ";\n\n")

        if 'collection_product' in sections:
            f.write("INSERT INTO `collection_product` (`id`, `collection_id`, `product_id`, `priority`, `created_at`, `updated_at`) VALUES\n")
            f.write(",\n".join(sections['collection_product']) + ";\n\n")

        f.write("SET FOREIGN_KEY_CHECKS = 1;\n")

    print(f"Generated {output_file}")

if __name__ == "__main__":
    generate_sql()

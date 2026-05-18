import re

brands = {
    'sub-hp': 'HP',
    'sub-canon': 'Canon',
    'sub-brother': 'Brother',
    'sub-epson': 'Epson',
    'sub-xerox': 'Xerox',
    'sub-pantum': 'Pantum'
}

with open('database/localhost.sql', 'r', encoding='utf-8') as f:
    lines = f.readlines()

new_lines = []
current_table = None

for line in lines:
    if 'INSERT INTO `product` (' in line:
        current_table = 'product'
    elif 'INSERT INTO `' in line:
        current_table = None
    
    if current_table == 'product' and line.strip().startswith('('):
        # We only want to update products that are printers (have 'printer' tag)
        if "'printer" in line or ",printer" in line:
            for tag, brand in brands.items():
                # Check if the title (field 2) contains the brand
                # Pattern: ^\s*\((\d+),\s*'([^']*)'
                match_title = re.search(r"^\s*\(\d+,\s*'([^']*)'", line)
                if match_title:
                    title = match_title.group(1)
                    if brand.lower() in title.lower():
                        # Find the tags field (field 11)
                        # Pattern: rf"^(\s*\(\d+,\s*'{re.escape(title)}',\s*(?:'[^']*'|[^,]+),\s*(?:'[^']*'|[^,]+),\s*(?:'[^']*'|[^,]+),\s*\d+,\s*\d+,\s*[\d\.]+,\s*'[^']*',\s*\d+,\s*')([^']*)(')"
                        # Using a safer approach: find the tags field which is after the 10th comma
                        parts = line.split("', '") # This is risky due to escaped quotes, but let's try regex for field 11
                        
                        pattern = rf"^(\s*\(\d+,\s*'{re.escape(title)}',\s*(?:'[^']*'|[^,]+),\s*(?:'[^']*'|[^,]+),\s*(?:'[^']*'|[^,]+),\s*\d+,\s*\d+,\s*[\d\.]+,\s*'[^']*',\s*\d+,\s*')([^']*)(')"
                        match_tags = re.search(pattern, line)
                        if match_tags:
                            prefix = match_tags.group(1)
                            existing_tags = match_tags.group(2)
                            suffix = match_tags.group(3)
                            
                            if tag not in existing_tags:
                                new_tags = existing_tags
                                if new_tags and not new_tags.endswith(','):
                                    new_tags += ','
                                new_tags += tag
                                line = line.replace(f"'{existing_tags}'", f"'{new_tags}'", 1)
                        break # Only one brand per product usually
    
    new_lines.append(line)

with open('database/localhost.sql', 'w', encoding='utf-8') as f:
    f.write(''.join(new_lines))

print("Synchronized printer tags in localhost.sql.")

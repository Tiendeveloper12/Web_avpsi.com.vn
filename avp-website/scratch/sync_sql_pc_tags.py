import re

brands = {
    'sub-apple': ['Apple'],
    'sub-dell': ['Dell'],
    'sub-hp': ['HP'],
    'sub-lenovo': ['Lenovo'],
    'sub-asus': ['ASUS'],
    'sub-msi': ['MSI'],
    'sub-acer': ['Acer'],
    'sub-gigabyte': ['Gigabyte'],
    'sub-huawei': ['Huawei'],
    'sub-samsung': ['Samsung'],
    'sub-khac': ['Corsair', 'CyberPowerPC', 'Intel', 'Fujitsu']
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
        if "'pc" in line or ",pc" in line:
            for tag, keywords in brands.items():
                match_title = re.search(r"^\s*\(\d+,\s*'([^']*)'", line)
                if match_title:
                    title = match_title.group(1)
                    if any(kw.lower() in title.lower() for kw in keywords):
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
                        break
    
    new_lines.append(line)

with open('database/localhost.sql', 'w', encoding='utf-8') as f:
    f.write(''.join(new_lines))

print("Synchronized PC tags in localhost.sql.")

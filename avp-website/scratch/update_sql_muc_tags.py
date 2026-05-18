import re

brands = {
    'sub-avp': 'AVP',
    'sub-hp': 'HP',
    'sub-epson': 'Epson',
    'sub-oki': 'OKI',
    'sub-canon': 'Canon',
    'sub-brother': 'Brother',
    'sub-ricoh': 'Ricoh'
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
    
    if current_table == 'product':
        updated = False
        for tag, brand in brands.items():
            # Regex to find: (ID, 'Brand ...', 'Image', ..., 'active', Priority, 'tags'
            # Note: The position of tags is the 11th field.
            # Simplified approach: If line contains 'brand' in title and 'muc' in tags, append tag.
            # We match the whole row: (ID, 'Title', 'Img', ..., 'tags', ...
            # Field 1: ID
            # Field 2: Title
            # Field 3: Image
            # Field 4: Description
            # Field 5: Content
            # Field 6: Sell
            # Field 7: View
            # Field 8: Rating
            # Field 9: Status
            # Field 10: Priority
            # Field 11: Tags
            
            # Using regex to find the title and tags field
            # Pattern: (ID, 'TITLE', 'IMG', 'DESC', 'CONT', SELL, VIEW, RATING, 'STATUS', PRIORITY, 'TAGS'
            pattern = rf"^(\s*\(\d+,\s*'{brand}[^']*',\s*'[^']*',\s*'[^']*',\s*'[^']*',\s*\d+,\s*\d+,\s*[\d\.]+,\s*'[^']*',\s*\d+,\s*')([^']*)(muc)([^']*')"
            
            match = re.search(pattern, line)
            if match:
                tags_field = match.group(2) + match.group(3) + match.group(4)
                if tag not in tags_field:
                    new_tags = tags_field + "," + tag
                    line = line.replace(f"'{tags_field}'", f"'{new_tags}'", 1)
                    updated = True
                    break
    
    new_lines.append(line)

with open('database/localhost.sql', 'w', encoding='utf-8') as f:
    f.write(''.join(new_lines))

print("Updated localhost.sql with brand tags.")

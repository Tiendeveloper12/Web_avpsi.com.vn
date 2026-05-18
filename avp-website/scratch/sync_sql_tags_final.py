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
    
    if current_table == 'product' and line.strip().startswith('('):
        # We process each line which could contain multiple rows or one row
        # Actually, in this file, each row is a new line starting with (
        
        for tag, brand in brands.items():
            # Match: (ID, 'TITLE', 'IMG', 'DESC', 'CONT', SELL, VIEW, RATING, 'STATUS', PRIORITY, 'TAGS'
            # We want to catch the first 10 fields and then the 11th (tags).
            # The pattern should be:
            # ^\s*\((\d+),\s*'({brand}[^']*)',\s*'([^']*)',\s*'([^']*)',\s*'([^']*)',\s*(\d+),\s*(\d+),\s*([\d\.]+),\s*'([^']*)',\s*(\d+),\s*'([^']*)'
            
            # Since some fields (desc, cont) can contain newlines or escaped quotes, this is tricky.
            # However, in localhost.sql, usually it's one line per product.
            
            # Let's try a simpler approach: 
            # 1. Split by , and handle quotes correctly? Too complex.
            # 2. Use a regex that looks for the brand and then the 11th field.
            
            # Actually, I can just look for the brand and then the end of the line where tags usually are.
            # Tags are right after the priority integer.
            
            # Pattern: (ID, 'Brand...', ..., PRIORITY, 'TAGS'
            # Priority is field 10. Tags is field 11.
            
            # Let's use a regex that matches the brand in the 2nd field and then captures the 11th field.
            # Field 1: (\d+)
            # Field 2: '({brand}[^']*)'
            # Fields 3-9: (?:'[^']*'|\d+|[\d\.]+) (repeated 7 times)
            # Field 10: (\d+)
            # Field 11: '([^']*)'
            
            pattern = rf"^(\s*\(\d+,\s*'{brand}[^']*',\s*(?:'[^']*'|[^,]+),\s*(?:'[^']*'|[^,]+),\s*(?:'[^']*'|[^,]+),\s*\d+,\s*\d+,\s*[\d\.]+,\s*'[^']*',\s*\d+,\s*')([^']*)(')"
            
            match = re.search(pattern, line)
            if match:
                prefix = match.group(1)
                existing_tags = match.group(2)
                suffix = match.group(3)
                
                # Ensure it has 'muc' and the brand tag
                new_tags = existing_tags
                if 'muc' not in new_tags:
                    if new_tags and not new_tags.endswith(','):
                        new_tags += ','
                    new_tags += 'muc'
                
                if tag not in new_tags:
                    if new_tags and not new_tags.endswith(','):
                        new_tags += ','
                    new_tags += tag
                
                if new_tags != existing_tags:
                    # Escape backslashes in replacement if any
                    line = line.replace(f"'{existing_tags}'", f"'{new_tags}'", 1)
                break
    
    new_lines.append(line)

with open('database/localhost.sql', 'w', encoding='utf-8') as f:
    f.write(''.join(new_lines))

print("Synchronized localhost.sql with brand tags.")

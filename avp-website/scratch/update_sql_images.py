import re
import os

ids = [6, 7, 8, 50, 55]
new_img = 'avp-hop-muc_1586923527.jpg'

with open('database/localhost.sql', 'r', encoding='utf-8') as f:
    lines = f.readlines()

new_lines = []
current_table = None

for line in lines:
    line_strip = line.strip()
    if 'INSERT INTO `product` (' in line:
        current_table = 'product'
    elif 'INSERT INTO `' in line:
        current_table = None
        
    if current_table == 'product':
        # Regex to match a product row: (ID, 'Title', 'Image', ...
        # Handling potential escaped single quotes in titles (though rare here)
        # We look for (ID, '...','...',
        match = re.search(r'^\s*\((\d+),\s*\'(.*?)\',\s*\'(.*?)\',', line)
        if match:
            pid = int(match.group(1))
            if pid in ids:
                old_img = match.group(3)
                # Replace only the image part
                line = line.replace(f"'{old_img}'", f"'{new_img}'", 1)
    
    new_lines.append(line)

with open('database/localhost.sql', 'w', encoding='utf-8') as f:
    f.write(''.join(new_lines))

print("Updated localhost.sql successfully")

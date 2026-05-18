import re

# Category mapping
categories = {
    'sub-monitor': ['UltraGear', 'ProArt', 'Optix', 'Predator', '276B1', 'VG3820C', 'LF22T350FHEXXV'],
    'sub-ram': ['Vengeance', 'Dominator', 'Trident', 'Ripjaws', 'DDR4', 'DDR5', 'SO-DIMM', 'UDIMM'],
    'sub-ssd': ['990 PRO', '870 EVO', 'SN850X', 'P3 Plus', 'NV2', 'BarraCuda', 'IronWolf', 'P300', 'WD Blue', 'WD Purple'],
    'sub-mainboard': ['Z790', 'B650', 'H610', 'B550', 'B760', 'X870'],
    'sub-cpu': ['i9-14900K', 'i7-14700K', 'i5-14600K', 'i3-14100F', 'Ryzen', 'Ultra 7 265K'],
    'sub-headphone': ['G Pro X Gaming', 'Cloud II', 'BlackShark', 'Arctis', 'WH-1000XM5', 'QuietComfort', 'Quantum', 'HS80', 'HD 450BT', 'ROG Delta S'],
    'sub-wifi': ['Archer', 'Deco', 'RT-AX', 'TUF Gaming AX', 'Router AX3000T', 'Nighthawk', 'MR7350'],
    'sub-psu': ['RM750x', 'MWE Gold', 'Strix 850G', 'A650BN', 'Focus GX', 'CV650', 'UD750GM', 'Toughpower', 'PK650D', 'SuperNOVA'],
    'sub-keyboard': ['Alloy Origins', 'G213', 'Huntsman', 'K100 RGB', 'MX Keys', 'Keychron', 'Apex Pro', 'ROG Azoth', 'KB216'],
    'sub-mouse': ['Superlight', 'Viper V3', 'G502 X', 'MX Master 3S', 'DeathAdder', 'M720', 'Rival 3', 'M4 Wireless', 'Ironclaw', 'Bluetooth Ergonomic Mouse'],
    'sub-gpu': ['GeForce RTX']
}

brands = {
    'sub-lg': ['LG'],
    'sub-asus': ['ASUS'],
    'sub-msi': ['MSI'],
    'sub-acer': ['Acer'],
    'sub-samsung': ['Samsung'],
    'sub-corsair': ['Corsair'],
    'sub-gskill': ['G.SKILL'],
    'sub-crucial': ['Crucial'],
    'sub-kingston': ['Kingston'],
    'sub-seagate': ['Seagate'],
    'sub-wd': ['WD', 'Western Digital'],
    'sub-gigabyte': ['GIGABYTE'],
    'sub-intel': ['Intel'],
    'sub-amd': ['AMD'],
    'sub-logitech': ['Logitech'],
    'sub-razer': ['Razer'],
    'sub-tp-link': ['TP-Link'],
    'sub-dell': ['Dell'],
    'sub-gaming': ['Gaming'],
    'sub-van-phong': ['Văn phòng', 'Multimedia']
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
        if "'linh-kien" in line or ",linh-kien" in line:
            # Get title
            match_title = re.search(r"^\s*\(\d+,\s*'([^']*)'", line)
            if match_title:
                title = match_title.group(1)
                
                # Find tags field
                pattern = rf"^(\s*\(\d+,\s*'{re.escape(title)}',\s*(?:'[^']*'|[^,]+),\s*(?:'[^']*'|[^,]+),\s*(?:'[^']*'|[^,]+),\s*\d+,\s*\d+,\s*[\d\.]+,\s*'[^']*',\s*\d+,\s*')([^']*)(')"
                match_tags = re.search(pattern, line)
                if match_tags:
                    prefix = match_tags.group(1)
                    existing_tags = match_tags.group(2)
                    suffix = match_tags.group(3)
                    
                    new_tags = existing_tags
                    
                    # Apply category tags
                    for tag, keywords in categories.items():
                        if any(kw.lower() in title.lower() for kw in keywords):
                            if tag not in new_tags:
                                if new_tags and not new_tags.endswith(','): new_tags += ','
                                new_tags += tag
                    
                    # Apply brand tags
                    for tag, keywords in brands.items():
                        if any(kw.lower() in title.lower() for kw in keywords):
                            if tag not in new_tags:
                                if new_tags and not new_tags.endswith(','): new_tags += ','
                                new_tags += tag
                    
                    if new_tags != existing_tags:
                        line = line.replace(f"'{existing_tags}'", f"'{new_tags}'", 1)
    
    new_lines.append(line)

with open('database/localhost.sql', 'w', encoding='utf-8') as f:
    f.write(''.join(new_lines))

print("Synchronized Accessories tags in localhost.sql.")

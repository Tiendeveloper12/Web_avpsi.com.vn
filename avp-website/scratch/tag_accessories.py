import subprocess

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

# Brand mapping (to be applied within categories or generally)
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
    'sub-dell': ['Dell']
}

def run_query(query):
    subprocess.run(['mysql', '-u', 'root', '-pPatterson3994', 'avpsicby_db', '-e', query], check=True)

# 1. Apply category tags
for tag, keywords in categories.items():
    for kw in keywords:
        print(f"Applying category tag: {tag} for keyword: {kw}")
        query = f"UPDATE product SET tags = CONCAT(tags, ',{tag}') WHERE tags LIKE '%linh-kien%' AND title LIKE '%{kw}%' AND tags NOT LIKE '%{tag}%';"
        run_query(query)

# 2. Apply brand tags
for tag, keywords in brands.items():
    for kw in keywords:
        print(f"Applying brand tag: {tag} for keyword: {kw}")
        query = f"UPDATE product SET tags = CONCAT(tags, ',{tag}') WHERE tags LIKE '%linh-kien%' AND title LIKE '%{kw}%' AND tags NOT LIKE '%{tag}%';"
        run_query(query)

print("Accessories tag updates complete.")

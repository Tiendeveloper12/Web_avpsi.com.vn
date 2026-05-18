import os

items = [
    'LG UltraGear G6 27” 300Hz', 'LG UltraGear 27G610A-B', 'ASUS ProArt PA248QV', 'MSI Optix G241', 'MSI Optix MAG241',
    'Acer Predator XB273U', 'Samsung LF22T350FHEXXV', 'Philips 276B1', 'ViewSonic VG3820C', 'LG UltraGear 24GN60R-B',
    'Corsair Vengeance LPX DDR4', 'Kingston FURY Beast DDR5', 'G.SKILL Trident Z5 Neo RGB DDR5', 'Crucial DDR5 UDIMM',
    'Corsair Vengeance RGB DDR5', 'G.SKILL Ripjaws V DDR4', 'Crucial Laptop DDR5 SO-DIMM', 'Corsair Dominator Platinum RGB DDR5',
    'TeamGroup T-Force Delta RGB DDR5', 'Samsung DDR5 Desktop RAM', 'Samsung 990 PRO 1TB NVMe SSD', 'WD Black SN850X SSD',
    'Crucial P3 Plus NVMe SSD', 'Kingston NV2 NVMe SSD', 'Samsung 870 EVO SATA SSD', 'Seagate BarraCuda HDD', 'WD Blue HDD',
    'Toshiba P300 HDD', 'Seagate IronWolf NAS HDD', 'WD Purple Surveillance HDD', 'ASUS ROG Maximus Z790 Hero',
    'GIGABYTE Z790 AORUS Elite AX', 'MSI MAG X870 TOMAHAWK WIFI', 'ASUS TUF Gaming B650-PLUS WIFI', 'MSI B650 Gaming Plus WIFI',
    'ASRock B650M-HDV/M.2', 'GIGABYTE X870E AORUS MASTER', 'ASUS PRIME H610M-K D4', 'MSI PRO B760M-A WIFI',
    'ASUS ROG Strix B550-F Gaming WIFI II', 'Intel Core i9-14900K', 'Intel Core i7-14700K', 'Intel Core i5-14600K',
    'AMD Ryzen 9 9950X', 'AMD Ryzen 7 9800X3D', 'AMD Ryzen 5 9600X', 'Intel Core i3-14100F', 'AMD Ryzen 7 7800X3D',
    'Intel Core Ultra 7 265K', 'AMD Ryzen 5 5600', 'Logitech G Pro X Gaming Headset', 'HyperX Cloud II', 'Razer BlackShark V2',
    'SteelSeries Arctis Nova 7 Wireless', 'Sony WH-1000XM5', 'Bose QuietComfort Ultra Headphones', 'JBL Quantum 100',
    'Corsair HS80 RGB Wireless', 'Sennheiser HD 450BT', 'ASUS ROG Delta S', 'TP-Lmuc Archer AX55', 'ASUS RT-AX58U',
    'TP-Lmuc Deco X20', 'ASUS TUF Gaming AX4200', 'Xiaomi Router AX3000T', 'Netgear Nighthawk AX12 RAX120', 'TP-Lmuc Archer C6',
    'ASUS RT-AX86U Pro', 'Huawei AX3 Quad-Core', 'Lmucsys MR7350', 'Corsair RM750x', 'Cooler Master MWE Gold 750 V2',
    'ASUS ROG Strix 850G', 'MSI MAG A650BN', 'Seasonic Focus GX-750', 'Corsair CV650', 'Gigabyte UD750GM',
    'Thermaltake Toughpower GF A3 850W', 'DeepCool PK650D', 'EVGA SuperNOVA 850 G6', 'Logitech G Pro X TKL Lightspeed',
    'Razer Huntsman V2', 'Corsair K100 RGB', 'Logitech MX Keys S', 'Keychron K2 Wireless Mechanical Keyboard',
    'SteelSeries Apex Pro TKL', 'ASUS ROG Azoth', 'Dell KB216 Multimedia Keyboard'
]

found = []
missing = []
for item in items:
    # Handle TP-Lmuc -> TP-Link and Lmucsys -> Linksys
    clean_name = item.replace('TP-Lmuc', 'TP-Link').replace('Lmucsys', 'Linksys')
    # Some filenames might still use the original name
    paths = [
        f'public/images/products/{clean_name}.jpg',
        f'public/images/products/{item}.jpg'
    ]
    path_found = None
    for p in paths:
        if os.path.exists(p):
            path_found = p
            break
            
    if path_found:
        found.append((item, os.path.basename(path_found)))
    else:
        missing.append(item)

print(f"Found: {len(found)}")
print(f"Missing: {len(missing)}")
for f in found:
    print(f"{f[0]}|{f[1]}")
if missing:
    print("---MISSING---")
    for m in missing:
        print(m)

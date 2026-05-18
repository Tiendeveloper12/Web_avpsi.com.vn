import re
import os

specs_data = {
    "Apple MacBook Air 13 M3": "Apple M3 / Integrated GPU / 16GB Unified Memory / 512GB SSD / 13.6-inch Liquid Retina",
    "Apple MacBook Pro 14 M4 Pro": "Apple M4 Pro / Integrated GPU / 24GB Unified Memory / 1TB SSD / 14.2-inch Liquid Retina XDR",
    "ASUS ROG Strix G16": "i9-14900HX / RTX 4070 / 32GB DDR5 / 1TB SSD / 240Hz QHD",
    "ASUS TUF Gaming A15": "Ryzen 7 8845HS / RTX 4060 / 16GB DDR5 / 1TB SSD / 144Hz FHD",
    "Lenovo Legion Pro 5": "Ryzen 9 7945HX / RTX 4070 / 32GB DDR5 / 1TB SSD / 240Hz QHD",
    "Lenovo IdeaPad Slim 5": "Ryzen 7 8845HS / Radeon Graphics / 16GB DDR5 / 512GB SSD / 16-inch WUXGA",
    "Dell XPS 13": "Intel Core Ultra 7 155H / Intel Arc Graphics / 16GB LPDDR5X / 1TB SSD / 13.4-inch 3K OLED",
    "Dell Inspiron 15": "i7-1355U / Intel Iris Xe / 16GB DDR4 / 512GB SSD / 15.6-inch FHD",
    "HP Victus 15": "Ryzen 7 8845HS / RTX 4060 / 16GB DDR5 / 1TB SSD / 144Hz FHD",
    "HP Pavilion 14": "i5-1335U / Intel Iris Xe / 16GB DDR4 / 512GB SSD / 14-inch FHD",
    "Acer Nitro V 15": "i7-13620H / RTX 4050 / 16GB DDR5 / 512GB SSD / 144Hz FHD",
    "Acer Aspire 5": "Ryzen 7 7730U / Radeon Graphics / 16GB DDR4 / 512GB SSD / 15.6-inch FHD",
    "MSI Katana 15": "i7-13620H / RTX 4070 / 16GB DDR5 / 1TB SSD / 144Hz FHD",
    "MSI Modern 14": "i5-1335U / Intel Iris Xe / 16GB DDR4 / 512GB SSD / 14-inch FHD",
    "Razer Blade 16": "i9-14900HX / RTX 4090 / 32GB DDR5 / 2TB SSD / 240Hz QHD+",
    "Microsoft Surface Laptop 6": "Intel Core Ultra 7 / Intel Arc Graphics / 16GB LPDDR5X / 512GB SSD / 15-inch PixelSense",
    "LG Gram 16": "Intel Core Ultra 7 / Intel Arc Graphics / 16GB LPDDR5X / 1TB SSD / 16-inch WQXGA",
    "Huawei MateBook D 16": "i9-13900H / Intel Iris Xe / 16GB DDR4 / 1TB SSD / 16-inch FHD+",
    "Gigabyte G5 KF": "i7-12650H / RTX 4060 / 16GB DDR4 / 512GB SSD / 144Hz FHD",
    "Samsung Galaxy Book4 Pro": "Intel Core Ultra 7 / Intel Arc Graphics / 16GB LPDDR5X / 1TB SSD / 16-inch AMOLED 120Hz",
    
    # Desktops
    "Apple iMac 24-inch M3": "Apple M3 / Integrated GPU / 16GB Unified Memory / 512GB SSD / 24-inch 4.5K Retina",
    "Dell OptiPlex 7010 Tower": "i7-13700 / Intel UHD 770 / 16GB DDR5 / 512GB SSD / 300W PSU",
    "HP ProDesk 400 G9": "i5-13500 / Intel UHD 770 / 16GB DDR4 / 512GB SSD / Wi-Fi 6",
    "Lenovo ThinkCentre M70t Gen 4": "i7-13700 / Intel UHD 770 / 16GB DDR5 / 1TB SSD / Tower Design",
    "ASUS ROG G22CH": "i9-14900KF / RTX 4070 Super / 32GB DDR5 / 2TB SSD / 750W Gold PSU",
    "MSI MAG Infinite S3": "i7-14700F / RTX 4070 / 32GB DDR5 / 1TB SSD / 750W PSU",
    "Acer Predator Orion 3000": "i7-14700F / RTX 4070 Super / 32GB DDR5 / 1TB SSD / Liquid Cooling",
    "Lenovo Legion Tower 5": "Ryzen 7 9700X / RTX 4070 Ti Super / 32GB DDR5 / 2TB SSD / 850W PSU",
    "HP OMEN 40L": "i9-14900K / RTX 4080 Super / 32GB DDR5 / 2TB SSD / 1000W Gold PSU",
    "Dell Alienware Aurora R16": "i9-14900KF / RTX 4090 / 64GB DDR5 / 4TB SSD / Liquid Cooling",
    "ASUS ExpertCenter D7 Tower": "i7-13700 / Intel UHD 770 / 16GB DDR5 / 1TB SSD / TPM Security",
    "Apple Mac Mini M3": "Apple M3 / Integrated GPU / 16GB Unified Memory / 512GB SSD / Compact Desktop",
    "Apple Mac Studio M3 Max": "Apple M3 Max / Integrated GPU / 36GB Unified Memory / 1TB SSD / Studio Desktop",
    "Corsair Vengeance i7400": "i9-14900K / RTX 4090 / 64GB DDR5 / 4TB NVMe SSD / 1000W Gold PSU",
    "CyberPowerPC Gamer Xtreme": "i7-14700F / RTX 4070 Super / 32GB DDR5 / 2TB SSD / RGB Gaming Case",
    "Gigabyte AORUS Model X": "i9-14900K / RTX 4080 Super / 32GB DDR5 / 2TB SSD / 360mm Liquid Cooling",
    "Intel NUC 13 Pro": "i7-1360P / Intel Iris Xe / 16GB DDR4 / 512GB SSD / Mini PC",
    "Fujitsu ESPRIMO D7012": "i5-13500 / Intel UHD 770 / 16GB DDR4 / 512GB SSD / Business Tower",
    "Huawei MateStation S": "Ryzen 7 5800H / Radeon Graphics / 16GB DDR4 / 512GB SSD / Compact Desktop",
    "Samsung All-in-One Pro": "Intel Core Ultra 7 / Intel Arc Graphics / 16GB LPDDR5X / 1TB SSD / 27-inch 4K Display",

    # Monitors
    "LG UltraGear G6 27” 300Hz": "27 inch QHD / 300Hz / IPS / 1ms / G-SYNC Compatible",
    "LG UltraGear 27G610A-B": "27 inch QHD / 180Hz / IPS / HDR10 / FreeSync Premium",
    "ASUS ProArt PA248QV": "24.1 inch WUXGA / IPS / 75Hz / 100% sRGB / Đồ họa chuyên nghiệp",
    "MSI Optix G241": "23.8 inch FHD / 144Hz / IPS / 1ms / FreeSync",
    "MSI Optix MAG241": "23.6 inch FHD / 144Hz / VA / 1ms / Màn hình cong",
    "Acer Predator XB273U": "27 inch QHD / 240Hz / IPS / 0.5ms / G-SYNC",
    "Samsung LF22T350FHEXXV": "22 inch FHD / 75Hz / IPS / FreeSync / Viền mỏng",
    "Philips 276B1": "27 inch QHD / IPS / USB-C / 75Hz / Chân đế công thái học",
    "ViewSonic VG3820C": "38 inch UWQHD+ / Cong / USB-C / Loa tích hợp / 75Hz",
    "LG UltraGear 24GN60R-B": "24 inch FHD / 144Hz / IPS / 1ms / HDR10",

    # RAM
    "Corsair Vengeance LPX DDR4": "DDR4 / 3200MHz / Tản nhiệt nhôm / Desktop Gaming",
    "Kingston FURY Beast DDR5": "DDR5 / 5600MHz / Hiệu năng cao / Intel XMP",
    "G.SKILL Trident Z5 Neo RGB DDR5": "DDR5 / RGB / AMD EXPO / Gaming cao cấp",
    "Crucial DDR5 UDIMM": "DDR5 / 4800MHz / Desktop phổ thông / Tiết kiệm điện",
    "Corsair Vengeance RGB DDR5": "DDR5 / RGB / Hiệu năng gaming / Intel XMP",
    "G.SKILL Ripjaws V DDR4": "DDR4 / 3600MHz / Gaming / Độ trễ thấp",
    "Crucial Laptop DDR5 SO-DIMM": "DDR5 SO-DIMM / Laptop / 5600MHz / Nâng cấp di động",
    "Corsair Dominator Platinum RGB DDR5": "DDR5 / RGB cao cấp / Tản nhiệt DHX / Overclock",
    "TeamGroup T-Force Delta RGB DDR5": "DDR5 / RGB / Gaming / Tốc độ cao",
    "Samsung DDR5 Desktop RAM": "DDR5 / Desktop / 4800MHz / Ổn định cao",

    # SSD/HDD
    "Samsung 990 PRO 1TB NVMe SSD": "PCIe Gen4 NVMe / 1TB / Tốc độ cao / Gaming & Workstation",
    "WD Black SN850X SSD": "PCIe Gen4 / NVMe / Gaming hiệu năng cao",
    "Crucial P3 Plus NVMe SSD": "PCIe Gen4 / NVMe / Giá tốt / Tốc độ nhanh",
    "Kingston NV2 NVMe SSD": "PCIe Gen4 / NVMe / Phổ thông / Tiết kiệm chi phí",
    "Samsung 870 EVO SATA SSD": "SATA III / SSD 2.5 inch / Độ bền cao / Nâng cấp PC",
    "Seagate BarraCuda HDD": "3.5 inch / HDD lưu trữ / Desktop phổ thông",
    "WD Blue HDD": "HDD desktop / Hoạt động ổn định / Dung lượng lớn",
    "Toshiba P300 HDD": "7200RPM / Desktop hiệu năng cao / Lưu trữ dữ liệu",
    "Seagate IronWolf NAS HDD": "HDD NAS / Hoạt động 24/7 / RAID hỗ trợ",
    "WD Purple Surveillance HDD": "HDD camera giám sát / Hoạt động liên tục / Surveillance Storage",

    # Motherboards
    "ASUS ROG Maximus Z790 Hero": "Z790 / DDR5 / PCIe 5.0 / Wi-Fi 6E / Gaming cao cấp",
    "GIGABYTE Z790 AORUS Elite AX": "Z790 / DDR5 / Wi-Fi 6E / Gaming & Creator",
    "MSI MAG X870 TOMAHAWK WIFI": "X870 / DDR5 / Wi-Fi 7 / AMD Ryzen mới",
    "ASUS TUF Gaming B650-PLUS WIFI": "B650 / DDR5 / Wi-Fi 6 / Gaming bền bỉ",
    "MSI B650 Gaming Plus WIFI": "B650 / DDR5 / Wi-Fi / Gaming phổ thông",
    "ASRock B650M-HDV/M.2": "B650M / DDR5 / M.2 NVMe / Micro-ATX",
    "GIGABYTE X870E AORUS MASTER": "X870E / DDR5 / PCIe 5.0 / Wi-Fi 7",
    "ASUS PRIME H610M-K D4": "H610M / DDR4 / Intel Gen 12-14 / Văn phòng",
    "MSI PRO B760M-A WIFI": "B760M / DDR5 / Wi-Fi / Làm việc & Gaming",
    "ASUS ROG Strix B550-F Gaming WIFI II": "B550 / DDR4 / Wi-Fi 6E / AMD Ryzen Gaming",

    # CPU
    "Intel Core i9-14900K": "24 nhân / 32 luồng / Turbo cao / Gaming & Workstation",
    "Intel Core i7-14700K": "20 nhân / Hiệu năng mạnh / Gaming đa nhiệm",
    "Intel Core i5-14600K": "14 nhân / Gaming tầm trung cao cấp",
    "AMD Ryzen 9 9950X": "16 nhân / Zen 5 / Hiệu năng cao cấp",
    "AMD Ryzen 7 9800X3D": "8 nhân / 3D V-Cache / Gaming hàng đầu",
    "AMD Ryzen 5 9600X": "6 nhân / Zen 5 / Gaming phổ thông",
    "Intel Core i3-14100F": "4 nhân / Giá tốt / Không có iGPU",
    "AMD Ryzen 7 7800X3D": "8 nhân / 3D V-Cache / Gaming cực mạnh",
    "Intel Core Ultra 7 265K": "AI PC / Hiệu năng mới / Intel Ultra",
    "AMD Ryzen 5 5600": "6 nhân / AM4 / Gaming giá tốt",

    # Headsets
    "Logitech G Pro X Gaming Headset": "Gaming / Micro Blue VO!CE / DTS Headphone:X",
    "HyperX Cloud II": "7.1 Surround / Êm tai / Gaming phổ biến",
    "Razer BlackShark V2": "THX Spatial Audio / Micro rõ / Esports",
    "SteelSeries Arctis Nova 7 Wireless": "Wireless / Đa nền tảng / Pin lâu",
    "Sony WH-1000XM5": "Chống ồn cao cấp / Bluetooth / Âm thanh premium",
    "Bose QuietComfort Ultra Headphones": "ANC cao cấp / Âm thanh không gian",
    "JBL Quantum 100": "Gaming giá tốt / Micro tháo rời",
    "Corsair HS80 RGB Wireless": "Wireless / Dolby Atmos / RGB",
    "Sennheiser HD 450BT": "Bluetooth / Chống ồn / Pin dài",
    "ASUS ROG Delta S": "USB-C / ESS DAC / RGB Gaming",

    # Routers
    "TP-Link Archer AX55": "Wi-Fi 6 / AX3000 / Gia đình & Gaming",
    "ASUS RT-AX58U": "Wi-Fi 6 / AiMesh / Bảo mật cao",
    "TP-Link Deco X20": "Mesh Wi-Fi 6 / Phủ sóng toàn nhà",
    "ASUS TUF Gaming AX4200": "Wi-Fi 6 / Gaming Router / Tăng tốc game",
    "Xiaomi Router AX3000T": "Wi-Fi 6 / Giá tốt / Tốc độ cao",
    "Netgear Nighthawk AX12 RAX120": "Wi-Fi 6 / AX6000 / Cao cấp",
    "TP-Link Archer C6": "AC1200 / Dual-Band / Phổ thông",
    "ASUS RT-AX86U Pro": "Wi-Fi 6 / Gaming / Độ trễ thấp",
    "Huawei AX3 Quad-Core": "Wi-Fi 6+ / Quad-Core / Tín hiệu mạnh",
    "Linksys MR7350": "Wi-Fi 6 / Mesh hỗ trợ / Gia đình",

    # PSU
    "Corsair RM750x": "750W / 80+ Gold / Full Modular",
    "Cooler Master MWE Gold 750 V2": "750W / 80+ Gold / Hiệu suất cao",
    "ASUS ROG Strix 850G": "850W / 80+ Gold / Gaming cao cấp",
    "MSI MAG A650BN": "650W / 80+ Bronze / Giá tốt",
    "Seasonic Focus GX-750": "750W / 80+ Gold / Độ ổn định cao",
    "Corsair CV650": "650W / 80+ Bronze / Phổ thông",
    "Gigabyte UD750GM": "750W / Full Modular / 80+ Gold",
    "Thermaltake Toughpower GF A3 850W": "850W / ATX 3.0 / PCIe 5.0",
    "DeepCool PK650D": "650W / 80+ Bronze / Giá rẻ",
    "EVGA SuperNOVA 850 G6": "850W / 80+ Gold / Full Modular",

    # Keyboards
    "Logitech G Pro X TKL Lightspeed": "TKL Wireless / Gaming Esports / RGB",
    "Razer Huntsman V2": "Optical Switch / RGB / Gaming cao cấp",
    "Corsair K100 RGB": "RGB / Optical Switch / Flagship Gaming",
    "Logitech MX Keys S": "Không dây / Văn phòng / Gõ êm",
    "Keychron K2 Wireless Mechanical Keyboard": "Cơ không dây / Mac & Windows",
    "SteelSeries Apex Pro TKL": "Hall Effect Switch / TKL / Esports",
    "ASUS ROG Azoth": "Custom Gaming Keyboard / OLED / Wireless",
    "Dell KB216 Multimedia Keyboard": "Văn phòng / Có phím multimedia",
    "HyperX Alloy Origins Core": "TKL / Switch cơ / Gaming",
    "Logitech G213 Prodigy": "Gaming membrane / RGB / Chống tràn",

    # Mice
    "Logitech G Pro X Superlight 2": "Wireless / Siêu nhẹ / Esports",
    "Razer Viper V3 Pro": "Wireless / Hiệu năng cao / FPS Gaming",
    "Logitech G502 X Lightspeed": "Wireless / Nhiều nút / Gaming đa dụng",
    "Logitech MX Master 3S": "Văn phòng / Silent Click / Productivity",
    "Razer DeathAdder V3 Pro": "Công thái học / Wireless / Esports",
    "Logitech M720 Triathlon": "Bluetooth / Đa thiết bị / Văn phòng",
    "SteelSeries Rival 3 Wireless": "Wireless / Gaming giá tốt",
    "ASUS TUF Gaming M4 Wireless": "Gaming wireless / Nhẹ / Pin lâu",
    "Corsair Ironclaw RGB Wireless": "Gaming / Form lớn / RGB",
    "Microsoft Bluetooth Ergonomic Mouse": "Bluetooth / Công thái học / Văn phòng",

    # GPU
    "NVIDIA GeForce RTX 4060": "8GB GDDR6 / DLSS 3 / Gaming 1080p",
    "NVIDIA GeForce RTX 4070 SUPER": "12GB GDDR6X / Ray Tracing / Gaming 1440p",
    "NVIDIA GeForce RTX 4080 SUPER": "16GB GDDR6X / Hiệu năng cao cấp / 4K Gaming",
    "NVIDIA GeForce RTX 3060": "12GB GDDR6 / Gaming phổ biến / Ray Tracing",
    "NVIDIA GeForce RTX 4090": "24GB GDDR6X / Flagship / AI & 4K Gaming",

    # Office Equipment
    "Ronald Jack RJ550A": "Vân tay & thẻ từ / Màn hình màu / Kết nối TCP/IP",
    "ZKTeco MB20": "Nhận diện khuôn mặt / Vân tay / Wi-Fi hỗ trợ",
    "Hikvision DS-K1T804MF": "Vân tay & thẻ Mifare / TCP/IP / Kiểm soát ra vào",
    "Suprema BioStation 3": "Nhận diện khuôn mặt AI / Bảo mật cao / Doanh nghiệp",
    "Dahua DHI-ASI1212F": "Vân tay / Thẻ từ / Màn hình LCD",
    "Fellowes Powershred 79Ci": "Hủy vụn / Chống kẹt giấy / Văn phòng",
    "Bonsaii C149-C": "Hủy chéo / 18 tờ / Thùng chứa lớn",
    "Aurora AS890C": "Hủy vụn / Bảo mật cao / Nhỏ gọn",
    "Rexel Momentum X410": "Hủy chéo / 10 tờ / Chống quá nhiệt",
    "HSM Shredstar X10": "Hủy tài liệu / Độ ồn thấp / Văn phòng nhỏ",
    "Epson TM-T82III": "In nhiệt / 80mm / LAN & USB",
    "Xprinter XP-Q200II": "In hóa đơn nhiệt / 80mm / Giá tốt",
    "Rongta RP326": "In nhiệt tốc độ cao / USB / POS bán hàng",
    "Star Micronics TSP143III": "In nhiệt / LAN-Wi-Fi / POS chuyên nghiệp",
    "Bixolon SRP-350III": "In hóa đơn 80mm / USB / Tốc độ cao",
    "Epson Perfection V39 II": "Scanner phẳng / USB / Quét ảnh tài liệu",
    "Canon CanoScan LiDE 400": "Scanner mỏng nhẹ / 4800dpi / USB-C",
    "Fujitsu fi-8170": "Scanner tốc độ cao / ADF / Doanh nghiệp",
    "Brother ADS-2200": "Scanner tài liệu / Duplex / USB 3.0",
    "HP ScanJet Pro 2600 f1": "Scanner văn phòng / ADF / Quét hai mặt",
    "Epson EB-X06": "XGA / 3600 Lumens / Văn phòng & lớp học",
    "BenQ MX560": "XGA / 4000 Lumens / Máy chiếu doanh nghiệp",
    "ViewSonic PA503X": "XGA / 3800 Lumens / Giải trí & học tập",
    "Optoma EH412": "Full HD / 4500 Lumens / Hội họp chuyên nghiệp",
    "Xiaomi Smart Projector 2": "Full HD / Android TV / Chiếu thông minh",

    # Photocopy
    "RICOH AFICIO MP 3352": "Photocopy trắng đen / In mạng / Scan màu / 33 trang/phút",
    "RICOH AFICIO MP 4002": "Photocopy trắng đen / In & Scan mạng / 40 trang/phút",
    "RICOH AFICIO MP 5002": "Photocopy văn phòng / In mạng / 50 trang/phút / Duplex",
    "RICOH MP 301 SPF": "Đa chức năng / Copy-In-Scan-Fax / 30 trang/phút",
    "RICOH MP 3054": "Photocopy trắng đen / Màn hình cảm ứng / 30 trang/phút",
    "RICOH MP 3055": "In-Scan-Copy / Tự động đảo mặt / 30 trang/phút",
    "RICOH MP 3554": "Photocopy văn phòng / In mạng / Scan màu / 35 trang/phút",
    "RICOH MPC 6003": "Photocopy màu / In màu / Scan mạng / 60 trang/phút",

    # Printers
    "HP LaserJet Pro M404dn": "Máy in laser trắng đen / In mạng / In đảo mặt tự động",
    "Canon imageCLASS LBP2900": "Máy in laser trắng đen / USB / Văn phòng phổ thông",
    "Brother HL-L2366DW": "In laser trắng đen / Wi-Fi / In hai mặt tự động",
    "Epson EcoTank L3250": "In phun màu / Bình mực liên tục / Wi-Fi đa năng",
    "Canon PIXMA G3010": "In-Scan-Copy / Hệ thống mực liên tục / Wi-Fi",
    "HP Smart Tank 580": "In phun màu / Bình mực lớn / Wi-Fi & Mobile Printing",
    "Brother DCP-T720DW": "In phun đa năng / Wi-Fi / In đảo mặt tự động",
    "Canon imageCLASS MF3010": "In-Scan-Copy laser / Thiết kế nhỏ gọn / Văn phòng",
    "HP LaserJet Pro MFP M428fdw": "In laser đa chức năng / Fax / Wi-Fi / Duplex",
    "Brother HL-L3270CDW": "In laser màu / Wi-Fi / In hai mặt tự động",
    "Xerox Phaser 6510DN": "In laser màu / In mạng / Duplex tự động",
    "Pantum P2500W": "Máy in laser trắng đen / Wi-Fi / Giá tốt",
    "Epson EcoTank M3170": "In phun trắng đen / Bình mực lớn / ADF & Duplex",
    "HP Color LaserJet Pro M255dw": "In laser màu / Wi-Fi / In hai mặt tự động",
    "Epson L3210": "In-Scan-Copy / Bình mực liên tục / Tiết kiệm chi phí",

    # Network Equipment
    "ASUS RT-AX52": "Router Wi-Fi 6 / AX1800 / Dual-Band / Gia đình & Gaming",
    "TP-Link Archer C54": "Router AC1200 / 4 anten / Wi-Fi Dual-Band",
    "NETGEAR Nighthawk RAX50": "Wi-Fi 6 / AX5400 / Hiệu năng cao / Gaming",
    "Mercusys MW302R": "Router Wi-Fi N300 / 2 anten / Giá phổ thông",
    "UGREEN Cat6 Ethernet Cable": "Cáp mạng Cat6 / Gigabit / Chống nhiễu tốt",
    "Vention Cat6 Ethernet Cable": "Cáp LAN Cat6 / Tốc độ cao / Bền bỉ",
    "AMP CAT6 UTP Cable": "Cáp mạng CAT6 UTP / Hệ thống mạng doanh nghiệp",
    "Dintek CAT6 Patch Cord": "Dây nhảy mạng Cat6 / RJ45 / Truyền tải ổn định",
    "Belkin Cat6 Ethernet Cable": "Cáp mạng Cat6 / Gigabit Ethernet / Chất lượng cao",
    "TP-Link TL-SG108": "Switch 8 cổng Gigabit / Plug & Play / Vỏ kim loại",
    "TP-Link TL-SG1005D": "Switch 5 cổng Gigabit / Tiết kiệm điện / Văn phòng",
    "Netgear ProSafe GS105": "Switch Gigabit 5 cổng / Vỏ kim loại / Độ ổn định cao",
    "Cisco CBS110-8T-D": "Switch 8 cổng Gigabit / Doanh nghiệp / Plug & Play",
    "D-Link DGS-108": "Switch Gigabit 8 cổng / Thiết kế kim loại / Desktop Switch"
}

input_file = 'database/localhost.sql'
output_file = 'database/localhost_updated.sql'

with open(input_file, 'r', encoding='utf-8') as f_in, open(output_file, 'w', encoding='utf-8') as f_out:
    in_product_table = False
    in_product_insert = False
    
    for line in f_in:
        # Update CREATE TABLE
        if 'CREATE TABLE `product` (' in line:
            in_product_table = True
        
        if in_product_table and '`tags` text' in line:
            f_out.write(line)
            f_out.write("  `specs` text COLLATE utf8_unicode_ci DEFAULT NULL,\n")
            continue
            
        if in_product_table and line.strip() == ') ENGINE=InnoDB': # End of table def
            in_product_table = False
            
        # Update INSERT INTO
        if 'INSERT INTO `product` (' in line:
            in_product_insert = True
            line = line.replace('`tags`,', '`tags`, `specs`,')
        
        if in_product_insert:
            # Check if this is a value line
            if line.strip().startswith('('):
                # Try to find a matching title
                matched_specs = "NULL"
                for title, specs in specs_data.items():
                    if f"'{title}'" in line:
                        safe_specs = specs.replace("'", "''")
                        matched_specs = f"'{safe_specs}'"
                        break
                
                # We need to insert the specs value after the tags value.
                # The tags value is the 11th column.
                # However, parsing SQL values with commas inside strings is tricky.
                # Let's use a simpler approach: regex to find the tags field.
                # In this dump, tags are usually after priority.
                # Priority is an int, tags is a string.
                
                # Format: (id, 'title', 'image', 'description', 'content', sell, view, rating, 'status', priority, 'tags', 'template', ...)
                # It's better to split by ', ' but that fails if strings have ', '.
                # Let's use a regex that matches the first 11 fields.
                # This is risky. Let's try to find the 11th comma that isn't inside a quote.
                
                parts = []
                current_part = ""
                in_quote = False
                quote_char = None
                
                for char in line:
                    if char in ("'", "`") and (not current_part or current_part[-1] != "\\"):
                        if not in_quote:
                            in_quote = True
                            quote_char = char
                        elif char == quote_char:
                            in_quote = False
                    
                    if char == ',' and not in_quote:
                        parts.append(current_part)
                        current_part = ""
                    else:
                        current_part += char
                parts.append(current_part)
                
                if len(parts) > 11:
                    # Insert specs after tags (index 10)
                    parts.insert(11, f" {matched_specs}")
                    line = ",".join(parts)
            
            if line.strip().endswith(';'):
                in_product_insert = False
        
        f_out.write(line)

print("SQL file updated successfully.")
# Optional: Replace the original file
# os.replace(output_file, input_file)

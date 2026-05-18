import os
import re

def clean_text(text):
    text = text.replace("'", "''")
    return text

def get_slug(name):
    name = name.lower()
    name = re.sub(r'[^a-z0-9 ]', '', name)
    name = name.replace(' ', '-')
    return name

data = [
    ("WD Black SN850X SSD", "SSD PCIe Gen4 NVMe hiệu suất cao được thiết kế để chơi game cạnh tranh và khả năng phản hồi hệ thống cực nhanh. Có tốc độ đọc lên đến 7300MB/s, tản nhiệt tùy chọn, chế độ tối ưu hóa chơi game, hỗ trợ phần mềm WD Dashboard và quản lý nhiệt cao cấp cho khối lượng công việc tốc độ cao bền vững.", "WD Black SN850X SSD.jpg"),
    ("Crucial P3 Plus NVMe SSD", "SSD PCIe Gen4 NVMe giá cả phải chăng mang đến hiệu suất mạnh mẽ hàng ngày để chơi game, năng suất văn phòng và nâng cấp máy trạm. Có tốc độ đọc lên đến 5000MB/s, hệ số dạng M.2 2280, công nghệ Micron Advanced 3D NAND, tiêu thụ điện năng thấp và tỷ lệ giá trên hiệu suất tuyệt vời.", "Crucial P3 Plus SSD.jpg"),
    ("Kingston NV2 NVMe SSD", "SSD PCIe 4.0 NVMe cấp thấp được sử dụng rộng rãi với thiết kế M.2 nhỏ gọn, hoạt động nhiệt hiệu quả, hiệu suất đáng tin cậy và tốc độ khởi động nhanh. Thích hợp cho PC chơi game, máy tính xách tay và hệ thống văn phòng yêu cầu nâng cấp SSD giá cả phải chăng và cải thiện hiệu suất đa nhiệm.", "Kingston NV2 SSD.jpg"),
    ("Samsung 870 EVO SATA SSD", "Một trong những ổ SSD SATA đáng tin cậy nhất thế giới dành cho máy tính để bàn và máy tính xách tay. Có giao diện SATA III, tốc độ đọc lên đến 560MB/giây, công nghệ bộ nhớ Samsung V-NAND, độ bền nâng cao, khả năng tương thích hệ thống rộng rãi và hiệu suất tính toán hàng ngày đáng tin cậy.", "Samsung 870 EVO SSD.jpg"),
    ("Seagate BarraCuda HDD", "Ổ cứng máy tính để bàn phổ biến trên toàn cầu được thiết kế cho bộ nhớ lớn, thư viện trò chơi, tệp đa phương tiện và hệ thống văn phòng. Có giao diện SATA 6Gb/s, tốc độ quay 7200RPM, dung lượng lưu trữ lớn và độ tin cậy lưu trữ lâu dài đáng tin cậy cho máy tính để bàn.", "Seagate BarraCuda HDD.jpg"),
    ("WD Blue HDD", "Ổ cứng chính đáng tin cậy được thiết kế cho máy tính để bàn hàng ngày, hệ thống văn phòng và môi trường lưu trữ gia đình. Có giao diện SATA III, hoạt động ổn định, tiêu thụ điện năng thấp, khả năng tương thích rộng rãi với máy tính để bàn và hiệu suất lưu trữ lâu dài đáng tin cậy.", "WD Blue HDD.jpg"),
    ("Toshiba P300 HDD", "Ổ cứng máy tính để bàn dung lượng cao được thiết kế cho hệ thống chơi game, chỉnh sửa đa phương tiện và lưu trữ tệp chuyên nghiệp. Có tốc độ quay 7200RPM, bộ nhớ đệm tích hợp lớn, giao diện SATA và hiệu suất lưu trữ dung lượng cao ổn định cho người dùng khó tính.", "Toshiba P300 HDD.jpg"),
    ("Seagate IronWolf NAS HDD", "Ổ cứng được tối ưu hóa cho NAS được xây dựng để hoạt động 24/7 trong các máy chủ gia đình và hệ thống NAS doanh nghiệp. Tính năng tối ưu hóa chương trình cơ sở AgileArray, chống rung, khả năng tương thích RAID, xếp hạng khối lượng công việc cao và hiệu suất đa ổ đĩa đáng tin cậy cho các hệ thống lưu trữ chuyên nghiệp.", "Seagate IronWolf HDD.jpg"),
    ("WD Purple Surveillance HDD", "Ổ cứng giám sát chuyên dụng được thiết kế cho camera quan sát và hệ thống ghi âm an ninh. Có công nghệ AllFrame, quay video liên tục được tối ưu hóa, độ bền nâng cao để hoạt động 24/7 và khả năng tương thích với hệ thống giám sát DVR và NVR.", "WD Purple HDD.jpg"),
    ("ASUS ROG Maximus Z790 Hero", "Bo mạch chủ chơi game cao cấp cao cấp được thiết kế cho các hệ thống đam mê Intel. Có chipset Intel Z790, ổ cắm LGA1700, hỗ trợ bộ nhớ DDR5 lên đến 192GB, mở rộng PCIe 5.0, Wi-Fi 6E, nhiều khe cắm M.2 NVMe, tản nhiệt VRM cao cấp, đèn RGB, kết nối Thunderbolt và khả năng ép xung nâng cao. Được công nhận rộng rãi trong giới game thủ, streamer và nhà lắp ráp PC chuyên nghiệp trên toàn thế giới.", "ASUS ROG Maximus Z790 Hero.jpg"),
    ("GIGABYTE Z790 AORUS Elite AX", "Bo mạch chủ chơi game Intel phổ biến có chipset Z790, ổ cắm LGA1700, hỗ trợ DDR5, PCIe 5.0, Wi-Fi 6E, Ethernet 2.5Gb, nhiều khe cắm SSD M.2, thiết kế tản nhiệt VRM tiên tiến và tối ưu hóa BIOS tập trung vào chơi game. Rất khuyến khích cho các bản dựng máy trạm và chơi game hiệu suất cao.", "GIGABYTE Z790 AORUS Elite AX.jpg"),
    ("MSI MAG X870 TOMAHAWK WIFI", "Bo mạch chủ chơi game AMD AM5 hiện đại được thiết kế cho bộ vi xử lý Ryzen. Có chipset AMD X870, hỗ trợ DDR5, PCIe 5.0, Wi-Fi 7, Bluetooth 5.4, khe cắm PCIe được gia cố, tản nhiệt tiên tiến và kết nối USB tốc độ cao. Tuyệt vời cho hệ thống người sáng tạo và chơi game thế hệ tiếp theo.", "MSI MAG X870 TOMAHAWK WIFI.jpg"),
    ("ASUS TUF Gaming B650-PLUS WIFI", "Bo mạch chủ AMD AM5 bền bỉ được thiết kế để chơi game phổ thông và độ tin cậy lâu dài. Có chipset B650, hỗ trợ bộ nhớ DDR5, hỗ trợ PCIe 5.0 M.2, các thành phần cấp quân sự, Wi-Fi 6, giải pháp làm mát toàn diện và khe cắm PCIe được gia cố. Phổ biến đối với các game thủ tìm kiếm độ tin cậy và giá trị.", "ASUS TUF Gaming B650-PLUS WIFI.jpg"),
    ("MSI B650 Gaming Plus WIFI", "Bo mạch chủ AMD tầm trung có socket AM5, hỗ trợ bộ nhớ DDR5, tương thích PCIe 4.0/5.0, hỗ trợ Wi-Fi, thiết kế tản nhiệt mở rộng, kết nối USB tốc độ cao và hiệu suất tản nhiệt hướng đến chơi game. Được sử dụng rộng rãi trong các bản dựng PC chơi game Ryzen trên toàn thế giới.", "MSI B650 Gaming Plus WIFI.jpg"),
    ("ASRock B650M-HDV/M.2", "Bo mạch chủ AMD AM5 micro-ATX giá cả phải chăng và đáng tin cậy được thiết kế cho máy tính văn phòng và chơi game giá rẻ. Có hỗ trợ DDR5, bộ nhớ PCIe 4.0 M.2, hệ thống cung cấp năng lượng bền bỉ, đầu ra HDMI/DisplayPort và thiết kế micro-ATX nhỏ gọn phù hợp với các bản dựng nhỏ hơn.", "ASRock B650M-HDV M2.jpg"),
    ("GIGABYTE X870E AORUS MASTER", "Bo mạch chủ AMD đẳng cấp dành cho người đam mê có chipset X870E, socket AM5, hỗ trợ GPU PCIe 5.0 và SSD, kiến trúc VRM cao cấp, Wi-Fi 7, mạng tốc độ cao, hệ thống tản nhiệt tiên tiến và nhiều khe cắm lưu trữ NVMe. Được thiết kế để chơi game cực đỉnh và hiệu suất máy trạm chuyên nghiệp.", "GIGABYTE X870E AORUS MASTER.jpg"),
    ("ASUS PRIME H610M-K D4", "Bo mạch chủ Intel cấp thấp được thiết kế cho PC văn phòng và hệ thống máy tính để bàn giá cả phải chăng. Có chipset Intel H610, ổ cắm LGA1700, hỗ trợ bộ nhớ DDR4, khả năng tương thích PCIe 4.0, hỗ trợ M.2 NVMe và hiệu suất tính toán ổn định hàng ngày. Thường được sử dụng trong PC doanh nghiệp và văn phòng tại nhà.", "ASUS PRIME H610M-K D4.jpg"),
    ("MSI PRO B760M-A WIFI", "Bo mạch chủ Intel tập trung vào doanh nghiệp và năng suất hỗ trợ bộ xử lý Intel thế hệ thứ 12/13/14. Có hỗ trợ bộ nhớ DDR5, PCIe 4.0, kết nối Wi-Fi, thiết kế tản nhiệt cấp độ chuyên nghiệp, hỗ trợ SSD M.2 và cung cấp năng lượng ổn định cho khối lượng công việc văn phòng và người sáng tạo.", "MSI PRO B760M-A WIFI.jpg"),
    ("ASUS ROG Strix B550-F Gaming WIFI II", "Một trong những bo mạch chủ chơi game AMD AM4 phổ biến nhất thế giới. Có chipset AMD B550, hỗ trợ PCIe 4.0, khả năng tương thích bộ nhớ DDR4, Wi-Fi 6, âm thanh SupremeFX cao cấp, khe cắm PCIe được gia cố, ánh sáng RGB và tản nhiệt VRM mạnh mẽ cho các hệ thống chơi game và phát trực tuyến.", "ASUS ROG Strix B550-F Gaming WIFI II.jpg"),
    ("Intel Core i9-14900K", "Bộ xử lý máy tính để bàn hàng đầu của Intel được thiết kế cho những người đam mê chơi game, phát trực tuyến và khối lượng công việc của người sáng tạo chuyên nghiệp. Có 24 lõi (8 Hiệu suất + 16 lõi hiệu quả), 32 luồng, xung nhịp tăng lên đến 6.0GHz, khả năng tương thích với ổ cắm Intel LGA1700, hỗ trợ bộ nhớ DDR5/DDR4, hỗ trợ PCIe 5.0, Intel UHD Graphics 770 tích hợp, khả năng ép xung được mở khóa và kiến trúc lai tiên tiến cho hiệu suất chơi game và đa nhiệm cực cao.", "Intel Core i9-14900K.jpg"),
    ("Intel Core i7-14700K", "Bộ xử lý năng suất và chơi game hiệu suất cao với 20 lõi (8P + 12E), 28 luồng, tốc độ tăng lên đến 5,6GHz, kiến trúc lai Intel, khả năng tương thích DDR5/DDR4, hỗ trợ PCIe 5.0, đồ họa tích hợp và hệ số nhân mở khóa để ép xung. Được sử dụng rộng rãi trong PC chơi game và hệ thống máy trạm trên toàn cầu.", "Intel Core i7-14700K.jpg"),
]

start_product_id = 265
start_variant_id = 258
start_slug_id = 635
start_translation_id = 265
start_collection_product_id = 394
collection_id = 14
timestamp = "2024-05-14 04:20:00"

product_sql = []
variant_sql = []
translation_sql = []
slug_sql = []
col_prod_sql = []

for i, (name, desc, img) in enumerate(data):
    p_id = start_product_id + i
    v_id = start_variant_id + i
    t_id = start_translation_id + i
    s_id_vi = start_slug_id + (i * 2)
    s_id_en = start_slug_id + (i * 2) + 1
    cp_id = start_collection_product_id + i
    
    slug_vi = get_slug(name)
    slug_en = slug_vi
    
    name = clean_text(name)
    desc = clean_text(desc)
    
    # Product
    raw_title = slug_en.replace('-', ' ')
    raw_full = f"{raw_title} {desc.lower()}"
    product_sql.append(f"({p_id}, '{name}', '{img}', '', '', 0, 0, 0.00, 'active', 1000, 'linh-kien', '', 0, 'publish', 1, '', '', '', '', '', '', '{timestamp}', '{timestamp}', '{raw_title}', '{raw_full}')")
    
    # Variant
    variant_sql.append(f"({v_id}, 'Default', {p_id}, '', '', '', '', '', '', '', '', 0, 0, NULL, 0, 1, 'active', '', '{timestamp}', '{timestamp}')")
    
    # Translation
    desc_html = f"<p>{desc}</p>"
    translation_sql.append(f"({t_id}, {p_id}, 'vi', '{name}', '', '{desc_html}', '{timestamp}', '{timestamp}')")
    
    # Slug
    slug_sql.append(f"({s_id_vi}, {p_id}, 'product', 'vi', '{slug_vi}', '{timestamp}', '{timestamp}')")
    slug_sql.append(f"({s_id_en}, {p_id}, 'product', 'en', '{slug_en}', '{timestamp}', '{timestamp}')")
    
    # Collection Product
    col_prod_sql.append(f"({cp_id}, {collection_id}, {p_id}, 0, '{timestamp}', '{timestamp}')")

output_file = os.path.join("scratch", "output_batch2.sql")
with open(output_file, "w", encoding="utf-8") as f:
    f.write("--- product ---\n")
    f.write(",\n".join(product_sql) + ";\n\n")
    f.write("--- variant ---\n")
    f.write(",\n".join(variant_sql) + ";\n\n")
    f.write("--- product_translations ---\n")
    f.write(",\n".join(translation_sql) + ";\n\n")
    f.write("--- slug ---\n")
    f.write(",\n".join(slug_sql) + ";\n\n")
    f.write("--- collection_product ---\n")
    f.write(",\n".join(col_prod_sql) + ";\n")

print(f"SQL written to {output_file}")

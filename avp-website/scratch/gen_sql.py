import re

def slugify(text):
    text = text.lower()
    text = re.sub(r'[^a-z0-9]+', '-', text)
    return text.strip('-')

data = [
    ("HyperX Alloy Origins Core", "Bàn phím chơi game không phím nhỏ gọn có công tắc cơ học HyperX, thân máy hoàn toàn bằng nhôm cấp máy bay, tùy chỉnh ánh sáng RGB, cáp USB-C có thể tháo rời, hỗ trợ chống bóng mờ và độ bền mạnh mẽ cho môi trường chơi game cạnh tranh.", "HyperX Alloy Origins Core.jpg"),
    ("Logitech G213 Prodigy", "Bàn phím chơi game giá cả phải chăng có vùng RGB LIGHTSYNC, cấu trúc chống tràn, phần tựa tay tích hợp, điều khiển phương tiện chuyên dụng, các phím chơi game màng được điều chỉnh để phản hồi và bố cục kích thước đầy đủ thoải mái để chơi game và sử dụng hàng ngày.", "Logitech G213 Prodigy.jpg"),
    ("Logitech G Pro X Superlight 2", "Chuột chơi game thể thao điện tử chuyên nghiệp được thiết kế để mang lại hiệu suất cạnh tranh siêu nhẹ. Có cảm biến quang học HERO 2, lên đến 32.000 DPI, kết nối không dây LIGHTSPEED, hỗ trợ thăm dò 4K/8K, thiết kế siêu nhẹ 60g, sạc USB-C, chân PTFE và công nghệ không dây có độ trễ thấp tiên tiến được các vận động viên thể thao điện tử chuyên nghiệp trên toàn thế giới tin tưởng.", "Logitech G Pro X Superlight 2.jpg"),
    ("Razer Viper V3 Pro", "Chuột chơi game thể thao điện tử không dây cao cấp có cảm biến quang học Focus Pro 35K, thiết kế công thái học siêu nhẹ, công nghệ không dây HyperSpeed, công tắc chuột quang Gen-3, tốc độ bỏ phiếu lên đến 8000Hz, thời lượng pin dài và độ chính xác chơi game FPS cấp độ chuyên nghiệp.", "Razer Viper V3 Pro.jpg"),
    ("Logitech G502 X Lightspeed", "Một trong những con chuột chơi game được công nhận nhất thế giới có công tắc quang-cơ lai LIGHTFORCE, cảm biến HERO 25K, cài đặt DPI có thể tùy chỉnh, thiết kế tiện dụng, kết nối LIGHTSPEED không dây, các nút có thể lập trình, hỗ trợ RGB và tính linh hoạt chơi game đa thể loại.", "Logitech G502 X Lightspeed.jpg"),
    ("Logitech MX Master 3S", "Chuột văn phòng và năng suất cao cấp được thiết kế cho quy trình làm việc chuyên nghiệp và đa nhiệm. Có thiết kế điêu khắc tiện dụng, cuộn điện từ MagSpeed, nhấp chuột im lặng, cảm biến Darkfield 8000 DPI, sạc nhanh USB-C, kết nối đa thiết bị Bluetooth và khả năng tương thích với hệ thống Windows và macOS.", "Logitech MX Master 3S.jpg"),
    ("Razer DeathAdder V3 Pro", "Chuột chơi game công thái học nhẹ có cảm biến quang học Focus Pro 30K, công tắc quang học Gen-3, công nghệ HyperSpeed không dây, thiết kế siêu nhẹ, hình dạng thuận tay phải tiện dụng và độ chính xác theo dõi cấp thể thao điện tử để chơi game FPS và MOBA.", "Razer DeathAdder V3 Pro.jpg"),
    ("Logitech M720 Triathlon", "Chuột văn phòng không dây phổ biến được thiết kế cho năng suất và quy trình làm việc đa thiết bị. Có kết nối không dây Bluetooth và USB, các nút có thể lập trình, tiện nghi về mặt công thái học, chuyển đổi đa thiết bị, thời lượng pin dài, cuộn chính xác và hiệu suất văn phòng đáng tin cậy.", "Logitech M720 Triathlon.jpg"),
    ("SteelSeries Rival 3 Wireless", "Chuột chơi game giá cả phải chăng có cảm biến quang học TrueMove Air, kết nối không dây kép, hiệu suất chơi game có độ trễ thấp, kết cấu nhẹ, ánh sáng RGB, thời lượng pin dài và công tắc bền phù hợp để chơi game và sử dụng máy tính để bàn hàng ngày.", "SteelSeries Rival 3 Wireless.jpg"),
    ("ASUS TUF Gaming M4 Wireless", "Chuột chơi game không dây bền bỉ được thiết kế cho hiệu suất chơi game cạnh tranh. Có cảm biến quang học 12.000 DPI, thiết kế thuận cả hai tay nhẹ, các nút có thể lập trình, kết nối không dây và Bluetooth, hỗ trợ ASUS Aura Sync RGB và độ bền lấy cảm hứng từ quân đội.", "ASUS TUF Gaming M4 Wireless.jpg"),
    ("Corsair Ironclaw RGB Wireless", "Chuột chơi game tiện dụng được thiết kế cho người chơi FPS và MOBA. Có cảm biến quang học 18.000 DPI, công nghệ Slipstream không dây, vùng chiếu sáng RGB, các nút có thể lập trình, công tắc Omron bền, bề mặt tay cầm có kết cấu và thiết kế tiện dụng bằng tay lớn thoải mái.", "Corsair Ironclaw RGB Wireless.jpg"),
    ("Microsoft Bluetooth Ergonomic Mouse", "Chuột không dây công thái học tập trung vào văn phòng được thiết kế cho các phiên làm việc lâu dài và môi trường làm việc chuyên nghiệp. Có kết nối Bluetooth, phần tựa ngón tay cái tiện dụng, cảm biến theo dõi mượt mà, thiết kế nhẹ tập trung vào sự thoải mái, khả năng tương thích đa nền tảng và hiệu quả pin lâu dài.", "Microsoft Bluetooth Ergonomic Mouse.jpg"),
    ("NVIDIA GeForce RTX 4060", "Card đồ họa chơi game chính thống được mua rộng rãi được thiết kế để chơi game mượt mà 1080p và 1440p cấp thấp. Có kiến trúc NVIDIA Ada Lovelace, bộ nhớ 8GB GDDR6, tạo khung hình DLSS 3 AI, hỗ trợ dò tia, giao diện PCIe 4.0, đầu ra HDMI 2.1 và DisplayPort 1.4a, tiêu thụ điện năng 115W thấp và hiệu quả tuyệt vời cho PC chơi game và sáng tạo nội dung.", "NVIDIA GeForce RTX 4060.jpg"),
    ("NVIDIA GeForce RTX 4070 SUPER", "GPU chơi game hiệu năng cao được tối ưu hóa cho khối lượng công việc chơi game và người sáng tạo siêu 1440p. Có bộ nhớ GDDR12X 6GB, kiến trúc Ada Lovelace, hỗ trợ DLSS 3, lõi dò tia tiên tiến, giao diện PCIe 4.0, hỗ trợ mã hóa AV1, số lượng lõi CUDA cao và hiệu suất tản nhiệt hiệu quả cho PC chơi game đam mê.", "NVIDIA GeForce RTX 4070 SUPER.jpg"),
    ("NVIDIA GeForce RTX 4080 SUPER", "Card đồ họa đẳng cấp dành cho người đam mê được thiết kế để chơi game 1440p và 4K tốc độ làm mới cao. Có bộ nhớ GDDR16X 6GB, kiến trúc Ada Lovelace tiên tiến, thế hệ DLSS 3 khung hình, hiệu suất dò tia cao cấp, kết xuất tăng cường AI, kết nối PCIe 4.0 và các giải pháp tản nhiệt mạnh mẽ từ các thương hiệu hàng đầu như ASUS, MSI và Gigabyte.", "NVIDIA GeForce RTX 4080 SUPER.jpg"),
    ("NVIDIA GeForce RTX 3060", "Card đồ họa tầm trung cực kỳ phổ biến được sử dụng rộng rãi cho các hệ thống chơi game, phát trực tuyến và năng suất. Có kiến trúc Ampere, bộ nhớ GDDR12 6GB, hỗ trợ dò tia, nâng cấp DLSS AI, hỗ trợ PCIe 4.0, kết nối HDMI 2.1 và hiệu suất chơi game 1080p đáng tin cậy với giá trị đồng tiền bát gạo.", "NVIDIA GeForce RTX 3060.jpg"),
    ("NVIDIA GeForce RTX 4090", "Card đồ họa NVIDIA hàng đầu được thiết kế để chơi game 4K cực cao, khối lượng công việc AI, kết xuất chuyên nghiệp và hệ thống máy trạm cao cấp. Có bộ nhớ GDDR24X 6GB, kiến trúc Ada Lovelace, lõi dò tia tiên tiến, công nghệ DLSS 3, số lượng lõi CUDA khổng lồ, giao diện PCIe 4.0 và hiệu suất tăng tốc AI và chơi game hàng đầu trong ngành.", "NVIDIA GeForce RTX 4090.jpg")
]

start_p_id = 332
start_v_id = 325
start_s_id = 769
start_cp_id = 461

p_sql = []
v_sql = []
t_sql = []
s_sql = []
cp_sql = []

for i, (name, desc, img) in enumerate(data):
    p_id = start_p_id + i
    v_id = start_v_id + i
    cp_id = start_cp_id + i
    
    slug_val = slugify(name)
    raw_search = (name + " " + desc).lower()
    
    # product
    p_sql.append(f"({p_id}, '{name}', '{img}', '', '', 0, 0, 0.00, 'active', 1000, 'linh-kien', '', 0, 'publish', 1, '', '', '', '', '', '', '2024-05-14 04:20:00', '2024-05-14 04:20:00', '{slug_val.replace('-', ' ')}', '{raw_search}')")
    
    # variant
    v_sql.append(f"({v_id}, 'Default', {p_id}, '', '', '', '', '', '', '', '', 0, 0, NULL, 0, 1, 'active', '', '2024-05-14 04:20:00', '2024-05-14 04:20:00')")
    
    # translations
    t_sql.append(f"({p_id}, {p_id}, 'vi', '{name}', '', '<p>{desc}</p>', '2024-05-14 04:20:00', '2024-05-14 04:20:00')")
    
    # slug
    s_sql.append(f"({start_s_id + i*2}, {p_id}, 'product', 'vi', '{slug_val}', '2024-05-14 04:20:00', '2024-05-14 04:20:00')")
    s_sql.append(f"({start_s_id + i*2 + 1}, {p_id}, 'product', 'en', '{slug_val}', '2024-05-14 04:20:00', '2024-05-14 04:20:00')")
    
    # collection_product
    cp_sql.append(f"({cp_id}, 14, {p_id}, 0, '2024-05-14 04:20:00', '2024-05-14 04:20:00')")

with open('c:/Projects/avp-website/scratch/batch5.sql', 'w', encoding='utf-8') as f:
    f.write("--- product ---\n")
    f.write(",\n".join(p_sql) + ";\n")
    f.write("\n--- variant ---\n")
    f.write(",\n".join(v_sql) + ";\n")
    f.write("\n--- translations ---\n")
    f.write(",\n".join(t_sql) + ";\n")
    f.write("\n--- slug ---\n")
    f.write(",\n".join(s_sql) + ";\n")
    f.write("\n--- collection_product ---\n")
    f.write(",\n".join(cp_sql) + ";\n")

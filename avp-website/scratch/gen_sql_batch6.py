import re

products_raw = """Ronald Jack RJ550A	
Máy chấm công sinh trắc học phổ biến có tính năng nhận dạng vân tay, hỗ trợ thẻ RFID, kết nối TCP / IP, xuất dữ liệu USB, theo dõi chấm công của nhân viên, màn hình LCD tích hợp và hỗ trợ hệ thống quản lý lực lượng lao động văn phòng. Thích hợp cho các doanh nghiệp vừa và nhỏ.	
Ronald Jack RJ550A.jpg

ZKTeco MB20	
Máy chấm công sinh trắc học được sử dụng rộng rãi hỗ trợ vân tay, nhận dạng khuôn mặt và xác minh mật khẩu. Có màn hình TFT, giao tiếp USB, mạng TCP / IP, công nghệ nhận dạng tốc độ cao, chức năng báo cáo chấm công và hỗ trợ quản lý truy cập văn phòng.	
ZKTeco MB20.jpg

Hikvision DS-K1T804MF	
Thiết bị đầu cuối chấm công vân tay chuyên nghiệp được thiết kế cho văn phòng và doanh nghiệp. Tính năng xác thực vân tay, hỗ trợ RFID, quản lý dữ liệu chấm công, giao tiếp TCP / IP, sao lưu USB, thiết kế nhỏ gọn bền bỉ và xác minh nhân viên nhanh chóng.	
Hikvision DS-K1T804MF.jpg

Suprema BioStation 3	
Thiết bị chấm công sinh trắc học cấp doanh nghiệp có tính năng quét dấu vân tay tiên tiến, xác thực khuôn mặt, hỗ trợ thẻ RFID, kết nối đám mây, xử lý tốc độ cao, màn hình cảm ứng và quản lý bảo mật nâng cao cho môi trường văn phòng lớn.	
Suprema BioStation 3.jpg

Dahua DHI-ASI1212F	
Máy chấm công và kiểm soát truy cập hiện đại hỗ trợ nhận dạng vân tay, xác thực RFID, theo dõi chấm công, giao tiếp mạng, hỗ trợ USB và các chức năng quản lý nhân viên tích hợp cho văn phòng và thương mại.	
Dahua DHI-ASI1212F.jpg

Fellowes Powershred 79Ci	
Máy hủy giấy văn phòng hiệu suất cao được thiết kế để tiêu hủy tài liệu an toàn. Có tính năng băm nhỏ, công nghệ chống kẹt, dung lượng 16 tờ, động cơ hoạt động liên tục, công nghệ an toàn SafeSense và hỗ trợ băm nhỏ giấy, đĩa CD, kim bấm và thẻ tín dụng.	
Fellowes Powershred 79Ci.jpg

Bonsaii C149-C	
Máy hủy giấy văn phòng phổ biến có tính năng cắt ngang, dung lượng 18 tờ, hệ thống chống kẹt, giỏ rác lớn, thời gian chạy liên tục và hiệu suất băm nhỏ an toàn phù hợp cho việc xử lý tài liệu văn phòng.	
Bonsaii C149-C.jpg

Aurora AS890C	
Máy hủy tài liệu văn phòng nhỏ gọn cung cấp khả năng hủy tài liệu bảo mật cắt ngang, dung lượng 8 tờ, hoạt động tự động khởi động / dừng, bảo vệ quá nhiệt và hoạt động yên tĩnh cho văn phòng tại nhà và doanh nghiệp nhỏ.	
Aurora AS890C.jpg

Rexel Momentum X410	
Máy hủy tài liệu văn phòng đáng tin cậy được thiết kế để tiêu hủy giấy an toàn. Tính năng cắt ngang, dung lượng 10 tờ, công nghệ chống kẹt, thiết kế văn phòng nhỏ gọn, thời gian chạy liên tục và động cơ hoạt động êm ái.	
Rexel Momentum X410.jpg

HSM Shredstar X10	
Máy hủy tài liệu tập trung vào văn phòng có tính năng cắt ngang, tự động khởi động / dừng, công nghệ chống kẹt giấy, hoạt động ít tiếng ồn, thùng chứa chất thải trong suốt và hỗ trợ kẹp giấy và kim bấm.	
HSM Shredstar X10.jpg

Epson TM-T82III	
Máy in hóa đơn nhiệt được sử dụng rộng rãi được thiết kế cho các cửa hàng bán lẻ, nhà hàng và hệ thống POS. Tính năng in nhiệt tốc độ cao, kết nối USB, thiết kế nhỏ gọn, tiết kiệm năng lượng, cơ chế cắt đáng tin cậy và khả năng tương thích với các hệ thống phần mềm POS chính.	
Epson TM-T82III.jpg

Xprinter XP-Q200II	
Máy in hóa đơn nhiệt giá cả phải chăng hỗ trợ in tốc độ cao, kết nối USB/LAN, khả năng tương thích ESC/POS, máy cắt tự động, thiết kế nhỏ gọn và hiệu suất ổn định cho các doanh nghiệp bán lẻ và nhà hàng.	
Xprinter XP-Q200II.jpg

Rongta RP326	
Máy in hóa đơn POS phổ biến có công nghệ in nhiệt, tốc độ in cao, hỗ trợ USB và Ethernet, thiết kế thương mại nhỏ gọn, máy cắt tự động và khả năng tương thích với hệ thống quản lý bán lẻ và khách sạn.	
Rongta RP326.jpg

Star Micronics TSP143III	
Máy in hóa đơn đáng tin cậy được sử dụng rộng rãi trong các nhà hàng và cửa hàng bán lẻ trên toàn thế giới. Tính năng in nhiệt, kết nối Bluetooth/USB, hỗ trợ in trên đám mây, máy cắt giấy tự động, thiết kế nhỏ gọn và thiết lập dễ dàng cho môi trường POS.	
Star Micronics TSP143III.jpg

Bixolon SRP-350III	
Máy in hóa đơn nhiệt chuyên nghiệp được thiết kế cho các hoạt động POS khối lượng lớn. Có tốc độ in nhanh, hệ thống máy cắt bền, kết nối USB / Ethernet, hoạt động tiết kiệm năng lượng và khả năng tương thích mạnh mẽ với các hệ thống POS thương mại.	
Bixolon SRP-350III.jpg

Epson Perfection V39 II	
Máy quét phẳng nhỏ gọn được thiết kế cho các tác vụ quét văn phòng và tài liệu. Tính năng quét độ phân giải cao, hoạt động hỗ trợ USB, hỗ trợ quét ảnh và tài liệu, thiết kế nhẹ và khả năng tương thích OCR cho quy trình làm việc năng suất.	
Epson Perfection V39 II.jpg

Canon CanoScan LiDE 400	
Máy quét văn phòng phổ biến có kết nối USB-C tốc độ cao, quét tài liệu và ảnh độ phân giải cao, thiết kế tiết kiệm dọc nhỏ gọn, hỗ trợ OCR và tính di động nhẹ cho năng suất văn phòng.	
Canon CanoScan LiDE 400.jpg

Fujitsu fi-8170	
Máy quét tài liệu chuyên nghiệp được thiết kế cho quy trình làm việc văn phòng doanh nghiệp. Tính năng quét hai mặt, nạp tài liệu tốc độ cao, hỗ trợ OCR, khả năng tương thích mạng, xử lý giấy tiên tiến và khả năng số hóa tài liệu hàng loạt hiệu quả.	
Fujitsu fi-8170.jpg

Brother ADS-2200	
Máy quét tài liệu để bàn tốc độ cao có tính năng quét hai mặt, khay nạp tài liệu tự động, kết nối USB, hỗ trợ OCR, thiết kế nhỏ gọn và hiệu suất số hóa tài liệu văn phòng đáng tin cậy.	
Brother ADS-2200.jpg

HP ScanJet Pro 2600 f1	
Máy quét năng suất văn phòng có tính năng quét phẳng và ADF, hỗ trợ hai mặt, chức năng OCR, kết nối USB, thiết kế máy tính để bàn nhỏ gọn và quét hiệu quả để quản lý tài liệu kinh doanh.	
HP ScanJet Pro 2600 f1.jpg

Epson EB-X06	
Máy chiếu văn phòng phổ biến được thiết kế cho lớp học, cuộc họp và thuyết trình. Có độ phân giải XGA, độ sáng 3600 lumen, kết nối HDMI, công nghệ 3LCD, thiết kế di động và tuổi thọ đèn dài cho môi trường trình chiếu chuyên nghiệp.	
Epson EB-X06.jpg

BenQ MX560	
Máy chiếu doanh nghiệp có độ phân giải XGA, đầu ra độ sáng cao, hỗ trợ HDMI, chế độ sinh thái thông minh, tuổi thọ đèn dài và hiệu suất trình chiếu đáng tin cậy cho lớp học và phòng họp văn phòng.	
BenQ MX560.jpg

ViewSonic PA503X	
Máy chiếu văn phòng giá cả phải chăng có độ sáng 3800 lumen, độ phân giải XGA, kết nối HDMI, công nghệ SuperColor, độ trễ đầu vào thấp và hoạt động tiết kiệm năng lượng phù hợp cho các bài thuyết trình và hội nghị.	
ViewSonic PA503X.jpg

Optoma EH412	
Máy chiếu văn phòng Full HD được thiết kế để thuyết trình chuyên nghiệp và sử dụng đa phương tiện. Có độ phân giải 1080p, độ sáng cao, kết nối HDMI, tuổi thọ đèn dài, loa tích hợp và thiết kế di động nhỏ gọn.	
Optoma EH412.jpg

Xiaomi Smart Projector 2	
Máy chiếu thông minh nhỏ gọn hỗ trợ độ phân giải Full HD, tích hợp Android TV, kết nối không dây, loa tích hợp, công nghệ lấy nét tự động, giải trí di động và chức năng thuyết trình văn phòng.	
Xiaomi Smart Projector 2.jpg"""

def slugify(text):
    text = text.lower()
    text = re.sub(r'[^a-z0-9]+', '-', text)
    return text.strip('-')

products = []
lines = [l.strip() for l in products_raw.split('\n') if l.strip()]
for i in range(0, len(lines), 3):
    title = lines[i]
    desc = lines[i+1]
    img = lines[i+2]
    products.append((title, desc, img))

start_product_id = 349
start_variant_id = 342
start_translation_id = 349
start_slug_id = 803
start_collection_product_id = 478
collection_id = 5
tag = 'van-phong'
created_at = '2024-05-14 04:30:00'

sql_output = []
sql_output.append("SET FOREIGN_KEY_CHECKS = 0;")

# Product
product_values = []
for i, (title, desc, img) in enumerate(products):
    pid = start_product_id + i
    raw_title = title.lower()
    raw_full = f"{raw_title} {desc.lower()}"
    val = f"({pid}, '{title}', '{img}', '', '', 0, 0, 0.00, 'active', 1000, '{tag}', '', 0, 'publish', 1, '', '', '', '', '', '', '{created_at}', '{created_at}', '{raw_title}', '{raw_full}')"
    product_values.append(val)
sql_output.append("INSERT INTO `product` (`id`, `title`, `image`, `description`, `content`, `sell`, `view`, `rating`, `status`, `priority`, `tags`, `template`, `stock_manage`, `stop_selling`, `stock_quant`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `created_at`, `updated_at`, `raw_title`, `raw_full`) VALUES\n" + ",\n".join(product_values) + ";")

# Variant
variant_values = []
for i, (title, desc, img) in enumerate(products):
    vid = start_variant_id + i
    pid = start_product_id + i
    val = f"({vid}, 'Default', {pid}, '', '', '', '', '', '', '', '', 0, 0, NULL, 0, 1, 'active', '', '{created_at}', '{created_at}')"
    variant_values.append(val)
sql_output.append("INSERT INTO `variant` (`id`, `title`, `product_id`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `barcode`, `sku_code`, `weight`, `price`, `sale_id`, `price_compare`, `stock_quant`, `status`, `note`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(variant_values) + ";")

# Translation
trans_values = []
for i, (title, desc, img) in enumerate(products):
    tid = start_translation_id + i
    pid = start_product_id + i
    val = f"({tid}, {pid}, 'vi', '{title}', '', '<p>{desc}</p>', '{created_at}', '{created_at}')"
    trans_values.append(val)
sql_output.append("INSERT INTO `product_translations` (`id`, `product_id`, `lang`, `title`, `description`, `content`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(trans_values) + ";")

# Slug
slug_values = []
for i, (title, desc, img) in enumerate(products):
    pid = start_product_id + i
    slug = slugify(title)
    sid_vi = start_slug_id + (i * 2)
    sid_en = sid_vi + 1
    slug_values.append(f"({sid_vi}, {pid}, 'product', 'vi', '{slug}', '{created_at}', '{created_at}')")
    slug_values.append(f"({sid_en}, {pid}, 'product', 'en', '{slug}', '{created_at}', '{created_at}')")
sql_output.append("INSERT INTO `slug` (`id`, `post_id`, `post_type`, `lang`, `handle`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(slug_values) + ";")

# Collection Product
cp_values = []
for i, (title, desc, img) in enumerate(products):
    cpid = start_collection_product_id + i
    pid = start_product_id + i
    val = f"({cpid}, {collection_id}, {pid}, 0, '{created_at}', '{created_at}')"
    cp_values.append(val)
sql_output.append("INSERT INTO `collection_product` (`id`, `collection_id`, `product_id`, `priority`, `created_at`, `updated_at`) VALUES\n" + ",\n".join(cp_values) + ";")

sql_output.append("SET FOREIGN_KEY_CHECKS = 1;")

with open('scratch/batch6.sql', 'w', encoding='utf-8') as f:
    f.write("\n\n".join(sql_output))

print("Generated scratch/batch6.sql")

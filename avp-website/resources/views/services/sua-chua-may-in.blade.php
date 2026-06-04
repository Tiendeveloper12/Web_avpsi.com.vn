@extends('layouts.app')

@section('title', 'Dịch Vụ Sửa Chữa Máy Photocopy & Máy In Chuyên Nghiệp - Âu Việt Phát')
@section('meta_description', 'Dịch vụ sửa chữa máy photocopy, máy in tận nơi chuyên nghiệp của Âu Việt Phát. Kỹ thuật viên giàu kinh nghiệm, linh kiện chính hãng, khắc phục mọi sự cố Ricoh, Toshiba, Canon, HP, Brother.')

@section('content')
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="container-custom">
            
            <!-- Breadcrumbs -->
            <nav class="flex mb-8 text-sm" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/" class="text-gray-500 hover:text-primary transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Trang chủ
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-500 md:ml-2">Dịch vụ</span>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-primary font-medium md:ml-2">Sửa chữa máy photocopy & máy in</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Hero Section -->
            <div class="bg-gradient-to-br from-primary to-[#881337] rounded-3xl overflow-hidden shadow-2xl mb-16 relative">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                <div class="relative z-10 px-8 py-16 md:p-20 max-w-4xl">
                    <span class="inline-block bg-white/20 text-highlight text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-6 border border-white/10">
                        Dịch vụ tận nơi uy tín hàng đầu
                    </span>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight uppercase tracking-tight">
                        Sửa Chữa <span class="text-highlight">Máy Photocopy</span> <br class="hidden md:inline">& <span class="text-highlight">Máy In</span>
                    </h1>
                    <p class="text-white/90 text-lg md:text-xl leading-relaxed mb-8 max-w-2xl font-medium">
                        Giải pháp sửa chữa, bảo trì máy photocopy & máy in tận nơi chuyên nghiệp. Khắc phục triệt để mọi lỗi phần cứng, lỗi bản in bị lem, mờ, kẹt giấy, lỗi hệ thống... của các dòng máy HP, Canon, Brother, Ricoh, Toshiba. Kỹ thuật viên có mặt ngay sau 30-45 phút.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="bg-highlight hover:bg-yellow-300 text-dark font-extrabold px-8 py-4 rounded-xl transition-all duration-300 transform hover:-translate-y-1 shadow-lg shadow-highlight/20 flex items-center gap-3">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.003 21c-5.522 0-9.997-4.477-9.997-10S6.48 1 12.003 1s9.997 4.477 9.997 10-4.475 10-9.997 10zm3.001-11.5h-5.002v-1.2l2.601-3.1h-2.601V4h5.002v1.2l-2.601 3.1h2.601v1.2z"/></svg>
                            <span>LIÊN HỆ QUA ZALO</span>
                        </a>
                        <a href="tel:0912979394" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 font-bold px-8 py-4 rounded-xl transition-all duration-300 flex items-center gap-3">
                            <svg class="w-6 h-6 text-highlight" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>HOTLINE: 0912 97 9394</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Highlights / Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-red-50 text-primary rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-primary font-bold tracking-wider uppercase block mb-1">Dịch vụ tận nơi</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Có Mặt Sau 30p - 45p</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Đội ngũ kỹ thuật viên túc trực tại các khu vực, nhanh chóng di chuyển để xử lý sự cố tức thì.</p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-green-50 text-secondary rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04c0 4.833 1.807 9.308 4.618 12.723a11.955 11.955 0 0013.92 0c2.811-3.415 4.618-7.89 4.618-12.723z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-secondary font-bold tracking-wider uppercase block mb-1">Linh kiện thay thế</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Chính Hãng 100%</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Sử dụng linh kiện chính hãng, độ bền cao, bảo hành dài hạn từ 3 - 12 tháng tùy hạng mục sửa chữa.</p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-yellow-50 text-highlight rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-yellow-600 font-bold tracking-wider uppercase block mb-1">Chi phí minh bạch</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Báo Giá Trước Khi Sửa</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Kỹ thuật viên kiểm tra lỗi tận nơi miễn phí, báo giá chi tiết, khách đồng ý mới bắt đầu sửa chữa.</p>
                    </div>
                </div>
            </div>

            <!-- Two Columns Services: Photocopy vs Printer -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
                
                <!-- Photocopy Repair Column -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-primary/10 text-primary rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                            </div>
                            <h2 class="text-2xl font-black text-gray-900 uppercase">Sửa Chữa Máy Photocopy</h2>
                        </div>
                        <div class="w-16 h-1 bg-primary rounded-full mb-6"></div>
                        <p class="text-gray-500 text-sm mb-8 leading-relaxed">
                            Máy photocopy là trung tâm xử lý tài liệu của văn phòng. Khi máy gặp sự cố, toàn bộ quy trình làm việc có thể bị gián đoạn. Chúng tôi chuyên khắc phục tất cả các lỗi trên các dòng máy photocopy Ricoh, Toshiba, Canon, Fuji Xerox, Konica Minolta... từ các dòng máy văn phòng nhỏ đến máy công nghiệp công suất lớn.
                        </p>

                        <h4 class="font-extrabold text-gray-900 text-sm mb-4 uppercase tracking-wider">CÁC LỖI THƯỜNG GẶP KHẮC PHỤC NGAY:</h4>
                        <ul class="space-y-3.5 mb-8">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Kẹt giấy liên tục:</strong> Do rulo cuốn, lô sấy bị mòn hoặc cảm biến lỗi.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Bản copy bị sọc, đen, nhòe:</strong> Do xước drum (trống máy), lỗi gạt mực hoặc gương quét bị bẩn.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Lỗi mã code hệ thống:</strong> Máy báo lỗi SC (Ricoh), lỗi F (Toshiba) cần reset hoặc thay thế cụm sấy, cụm quang.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Lỗi kết nối & Scan:</strong> Không nhận lệnh in từ máy tính, không gửi được file scan qua Email/Folder.</span>
                            </li>
                        </ul>
                    </div>
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-primary hover:bg-dark text-white font-bold py-3.5 px-6 rounded-xl transition-all duration-300 text-center uppercase tracking-wider text-xs block">
                        YÊU CẦU SỬA MÁY PHOTOCOPY
                    </a>
                </div>

                <!-- Printer Repair Column -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-secondary/10 text-secondary rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            </div>
                            <h2 class="text-2xl font-black text-gray-900 uppercase">Sửa Chữa Máy In Tận Nơi</h2>
                        </div>
                        <div class="w-16 h-1 bg-secondary rounded-full mb-6"></div>
                        <p class="text-gray-500 text-sm mb-8 leading-relaxed">
                            Máy in cá nhân hay máy in đa năng tại văn phòng đóng vai trò thiết yếu cho các tài liệu hàng ngày. Chúng tôi cung cấp dịch vụ sửa chữa nhanh chóng cho các dòng máy in laser trắng đen, laser màu, máy in phun màu, máy in hóa đơn... của tất cả các hãng thông dụng trên thị trường như Canon, HP, Brother, Epson, Samsung, Panasonic.
                        </p>

                        <h4 class="font-extrabold text-gray-900 text-sm mb-4 uppercase tracking-wider">CÁC LỖI THƯỜNG GẶP KHẮC PHỤC NGAY:</h4>
                        <ul class="space-y-3.5 mb-8">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Máy in kẹt giấy, không cuốn giấy:</strong> Quả đào kéo giấy bị mòn hoặc rách bao lụa cụm sấy.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Bản in mờ, sọc trắng, lem đen:</strong> Do hết mực, hư drum gạt, hao mòn trục từ hoặc bao lụa bị rách.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Máy báo lỗi đèn đỏ, không in được:</strong> Lỗi chip mực, lỗi kẹt giấy giả, hư mainboard nguồn hoặc card formatter.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Mất kết nối:</strong> Máy in không nhận driver, không nhận wifi, lỗi cổng USB kết nối hoặc card mạng.</span>
                            </li>
                        </ul>
                    </div>
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-secondary hover:bg-dark text-white font-bold py-3.5 px-6 rounded-xl transition-all duration-300 text-center uppercase tracking-wider text-xs block">
                        YÊU CẦU SỬA MÁY IN TẬN NƠI
                    </a>
                </div>
            </div>

            <!-- Detailed 6-Step Process Section -->
            <div class="bg-white rounded-3xl p-8 md:p-16 border border-gray-100 shadow-sm mb-16">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-primary font-bold text-sm tracking-widest uppercase mb-3 block">QUY TRÌNH DỊCH VỤ</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase">Quy trình sửa chữa máy in & photocopy</h2>
                    <div class="w-16 h-1 bg-highlight mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    <!-- Step 1 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            01
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Tiếp Nhận</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Nhận cuộc gọi hoặc tin nhắn mô tả tình trạng lỗi từ khách hàng qua Zalo/Hotline.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            02
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Đến Kiểm Tra</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Kỹ thuật viên di chuyển nhanh chóng, có mặt tận nơi sau 30-45 phút để kiểm tra trực tiếp.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            03
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Báo Giá</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Xác định lỗi chi tiết, đề xuất phương án tối ưu và báo giá cụ thể, không chi phí ẩn.</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            04
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Sửa Chữa</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Tiến hành sửa máy, thay linh kiện dưới sự giám sát trực tiếp từ quý khách hàng.</p>
                    </div>

                    <!-- Step 5 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            05
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Test Bàn Giao</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Vận hành máy chạy thử, test kỹ chất lượng bản in/copy trước khi ký bàn giao máy.</p>
                    </div>

                    <!-- Step 6 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            06
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Bảo Hành</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Dán tem bảo hành dịch vụ, viết hóa đơn thanh toán và đồng hành hỗ trợ về sau.</p>
                    </div>
                </div>
            </div>

            <!-- Guarantee & CTA Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-stretch mb-16">
                <!-- Left: Guarantee card -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <span class="text-primary font-bold text-sm tracking-widest uppercase block mb-3">TẠI SAO CHỌN CHÚNG TÔI?</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 uppercase mb-6">Cam kết chất lượng Âu Việt Phát</h3>
                        <div class="w-16 h-1 bg-highlight rounded-full mb-6"></div>
                        
                        <div class="space-y-5">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Đội ngũ kỹ thuật chuyên môn cao</h5>
                                    <p class="text-xs text-gray-500 mt-1">Được đào tạo chuyên sâu về các hệ cơ và board mạch điện tử của máy in và máy photocopy.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Bảo hành dài hạn và hỗ trợ nhanh chóng</h5>
                                    <p class="text-xs text-gray-500 mt-1">Linh kiện thay thế được dán tem bảo hành và được hỗ trợ sửa lại miễn phí nếu lỗi cũ tái diễn.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Giá cả dịch vụ cạnh tranh nhất thị trường</h5>
                                    <p class="text-xs text-gray-500 mt-1">Tối ưu chi phí sửa chữa tối đa cho doanh nghiệp, đảm bảo giá trị nhận được xứng đáng nhất.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Dịch vụ cho mượn máy tạm thời</h5>
                                    <p class="text-xs text-gray-500 mt-1">Với các lỗi nặng cần mang máy về xưởng sửa chữa, chúng tôi hỗ trợ cho mượn máy tương đương để không làm gián đoạn công việc của bạn.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: CTA Slogan Block -->
                <div class="bg-gradient-to-br from-primary to-[#881337] rounded-3xl p-8 md:p-12 border border-gray-100 flex flex-col justify-center items-center text-center relative overflow-hidden text-white">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-white/5 rounded-full blur-2xl"></div>
                    
                    <div class="w-20 h-20 bg-highlight text-dark rounded-full flex items-center justify-center shadow-lg shadow-highlight/20 mb-8 z-10 animate-bounce">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>

                    <h3 class="text-3xl font-black uppercase tracking-tight mb-4 z-10 text-highlight">MÁY PHOTOCOPY, MÁY IN ĐANG BỊ HỎNG?</h3>
                    <p class="text-white/90 text-sm leading-relaxed max-w-sm mb-8 z-10 font-medium">
                        Liên hệ ngay với Âu Việt Phát qua Zalo để được kỹ thuật viên giàu kinh nghiệm tư vấn phương án sửa chữa nhanh chóng và tiết kiệm nhất!
                    </p>
                    
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-white text-primary hover:bg-highlight hover:text-dark font-extrabold py-4 px-8 rounded-2xl transition-all duration-300 shadow-xl uppercase tracking-wider text-sm z-10 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.003 21c-5.522 0-9.997-4.477-9.997-10S6.48 1 12.003 1s9.997 4.477 9.997 10-4.475 10-9.997 10zm3.001-11.5h-5.002v-1.2l2.601-3.1h-2.601V4h5.002v1.2l-2.601 3.1h2.601v1.2z"/></svg>
                        Liên hệ Zalo tư vấn ngay
                    </a>
                </div>
            </div>

            <!-- Slogan Card -->
            <div class="bg-primary/5 rounded-3xl p-8 border border-primary/10 text-center max-w-4xl mx-auto shadow-sm relative overflow-hidden">
                <div class="absolute -top-10 -left-10 w-32 h-32 bg-primary/10 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-highlight/10 rounded-full blur-2xl"></div>
                <div class="relative z-10 py-6">
                    <p class="text-primary font-black text-2xl md:text-3xl italic tracking-tight mb-2">
                        "HÀI LÒNG KHÁCH HÀNG LÀ SỨ MỆNH CỦA AVP"
                    </p>
                    <p class="text-gray-500 text-sm uppercase tracking-[0.2em] font-bold">Âu Việt Phát Technology</p>
                </div>
            </div>

        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Dịch Vụ Bảo Trì, Sửa Chữa Laptop & Máy Tính Để Bàn - Âu Việt Phát')
@section('meta_description', 'Dịch vụ bảo trì, sửa chữa laptop và máy tính để bàn chuyên nghiệp của Âu Việt Phát. Kỹ thuật viên giàu kinh nghiệm, linh kiện chính hãng, khắc phục tận nơi nhanh chóng.')

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
                            <span class="ml-1 text-secondary font-medium md:ml-2">Sửa chữa laptop & máy tính</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Hero Section -->
            <div class="bg-secondary rounded-3xl overflow-hidden shadow-2xl mb-16 relative">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                <div class="relative z-10 px-8 py-16 md:p-20 max-w-4xl">
                    <span class="inline-block bg-white/20 text-highlight text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-6 border border-white/10">
                        Bảo trì & Sửa chữa chuyên nghiệp
                    </span>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight uppercase tracking-tight">
                        Sửa Chữa <span class="text-highlight">Laptop</span> <br class="hidden md:inline">& <span class="text-highlight">Máy Tính Để Bàn</span>
                    </h1>
                    <p class="text-white/90 text-lg md:text-xl leading-relaxed mb-8 max-w-2xl font-medium">
                        Khắc phục nhanh mọi sự cố phần cứng, phần mềm. Vệ sinh máy, tra keo tản nhiệt định kỳ chuyên nghiệp. Linh kiện chính hãng, bảo hành chu đáo. Đội ngũ kỹ thuật viên tận tâm có mặt nhanh chóng tại văn phòng hoặc nhà riêng của bạn.
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
                    <div class="w-14 h-14 bg-green-50 text-secondary rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-secondary font-bold tracking-wider uppercase block mb-1">Phản hồi nhanh</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Có Mặt Trong 45p – 60p</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Kỹ thuật viên luôn sẵn sàng di chuyển đến tận nơi để xử lý sự cố kịp thời cho quý khách.</p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-red-50 text-primary rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04c0 4.833 1.807 9.308 4.618 12.723a11.955 11.955 0 0013.92 0c2.811-3.415 4.618-7.89 4.618-12.723z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-primary font-bold tracking-wider uppercase block mb-1">Linh kiện chính hãng</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">100% Phụ Kiện Gốc</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Cam kết sử dụng linh kiện thay thế chính hãng, có nguồn gốc xuất xứ rõ ràng và bảo hành dài hạn.</p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-yellow-50 text-highlight rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-yellow-600 font-bold tracking-wider uppercase block mb-1">Giá cả minh bạch</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Báo Giá Trước Khi Sửa</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Kiểm tra, chẩn đoán miễn phí và báo giá chi tiết trước khi tiến hành sửa chữa. Không phát sinh chi phí.</p>
                    </div>
                </div>
            </div>

            <!-- Core Services Grid -->
            <div class="bg-white rounded-3xl p-8 md:p-16 border border-gray-100 shadow-sm mb-16">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-secondary font-bold text-sm tracking-widest uppercase mb-3 block">DỊCH VỤ CỦA CHÚNG TÔI</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase">Các dịch vụ sửa chữa & bảo trì</h2>
                    <div class="w-16 h-1 bg-highlight mx-auto mt-4 rounded-full"></div>
                    <p class="text-gray-500 mt-6 text-base">
                        Chúng tôi cung cấp trọn gói các dịch vụ bảo trì, sửa chữa, nâng cấp cho laptop và máy tính để bàn, đảm bảo thiết bị của bạn luôn hoạt động ổn định và hiệu quả nhất.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Service 1: Hardware Repair -->
                    <div class="relative group p-8 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-md transition-all duration-300 flex items-start gap-6">
                        <div class="w-12 h-12 bg-secondary/10 text-secondary font-bold rounded-xl flex items-center justify-center text-lg group-hover:bg-secondary group-hover:text-white transition-colors flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-extrabold text-xl text-gray-900 mb-3 uppercase">SỬA CHỮA PHẦN CỨNG</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Sửa chữa mainboard, thay thế chip VGA, sửa lỗi nguồn, thay thế bản lề laptop, sửa chữa màn hình, bàn phím, touchpad. Xử lý mọi lỗi phần cứng từ đơn giản đến phức tạp.
                            </p>
                        </div>
                    </div>

                    <!-- Service 2: Upgrade -->
                    <div class="relative group p-8 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-md transition-all duration-300 flex items-start gap-6">
                        <div class="w-12 h-12 bg-secondary/10 text-secondary font-bold rounded-xl flex items-center justify-center text-lg group-hover:bg-secondary group-hover:text-white transition-colors flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-extrabold text-xl text-gray-900 mb-3 uppercase">NÂNG CẤP PHẦN CỨNG</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Nâng cấp <strong class="text-gray-900 font-bold">RAM, ổ cứng SSD/HDD</strong>, card wifi, pin laptop giúp máy tính của bạn chạy nhanh hơn, mượt mà hơn. Tư vấn cấu hình phù hợp nhu cầu và ngân sách.
                            </p>
                        </div>
                    </div>

                    <!-- Service 3: Software -->
                    <div class="relative group p-8 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-md transition-all duration-300 flex items-start gap-6">
                        <div class="w-12 h-12 bg-secondary/10 text-secondary font-bold rounded-xl flex items-center justify-center text-lg group-hover:bg-secondary group-hover:text-white transition-colors flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-extrabold text-xl text-gray-900 mb-3 uppercase">CÀI ĐẶT PHẦN MỀM</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Cài đặt lại hệ điều hành Windows, macOS, Linux. Cài đặt driver, phần mềm chuyên dụng, diệt virus, cấu hình mạng nội bộ, setup máy in và thiết bị ngoại vi.
                            </p>
                        </div>
                    </div>

                    <!-- Service 4: Maintenance -->
                    <div class="relative group p-8 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-md transition-all duration-300 flex items-start gap-6">
                        <div class="w-12 h-12 bg-secondary/10 text-secondary font-bold rounded-xl flex items-center justify-center text-lg group-hover:bg-secondary group-hover:text-white transition-colors flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-extrabold text-xl text-gray-900 mb-3 uppercase">BẢO TRÌ ĐỊNH KỲ</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Vệ sinh máy tính, tra keo tản nhiệt chuyên dụng, kiểm tra tình trạng ổ cứng, RAM, quạt tản nhiệt. Giúp <strong class="text-gray-900 font-bold">kéo dài tuổi thọ thiết bị</strong> và đảm bảo hiệu suất hoạt động tối ưu.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Process Section -->
            <div class="bg-white rounded-3xl p-8 md:p-16 border border-gray-100 shadow-sm mb-16">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-secondary font-bold text-sm tracking-widest uppercase mb-3 block">QUY TRÌNH LÀM VIỆC</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase">Quy trình sửa chữa chuẩn chuyên nghiệp</h2>
                    <div class="w-16 h-1 bg-highlight mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                    <!-- Step 1 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-secondary/10 text-secondary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-secondary group-hover:text-white transition-colors">
                            01
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Tiếp Nhận</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Tiếp nhận thông tin sự cố qua Zalo, Hotline hoặc trực tiếp tại cửa hàng.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-secondary/10 text-secondary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-secondary group-hover:text-white transition-colors">
                            02
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Kiểm Tra & Chẩn Đoán</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Kỹ thuật viên kiểm tra toàn diện, xác định chính xác nguyên nhân lỗi của thiết bị.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-secondary/10 text-secondary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-secondary group-hover:text-white transition-colors">
                            03
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Báo Giá Chi Tiết</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Báo giá chi tiết, minh bạch từng hạng mục. Chỉ tiến hành khi khách hàng đồng ý.</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-secondary/10 text-secondary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-secondary group-hover:text-white transition-colors">
                            04
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Sửa Chữa & Kiểm Nghiệm</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Tiến hành sửa chữa và test kỹ lưỡng, đảm bảo máy hoạt động ổn định trước khi bàn giao.</p>
                    </div>

                    <!-- Step 5 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-secondary/10 text-secondary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-secondary group-hover:text-white transition-colors">
                            05
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Bàn Giao & Bảo Hành</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Bàn giao máy kèm phiếu bảo hành dài hạn. Hỗ trợ tư vấn sử dụng và bảo trì sau sửa chữa.</p>
                    </div>
                </div>
            </div>

            <!-- Guarantee & CTA Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-stretch mb-16">
                <!-- Left: Guarantee card -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <span class="text-secondary font-bold text-sm tracking-widest uppercase block mb-3">CAM KẾT DỊCH VỤ</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 uppercase mb-6">Chất lượng là uy tín</h3>
                        <div class="w-16 h-1 bg-highlight rounded-full mb-6"></div>
                        
                        <div class="space-y-5">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Linh kiện thay thế 100% chính hãng</h5>
                                    <p class="text-xs text-gray-500 mt-1">Có tem, có phiếu bảo hành, nguồn gốc rõ ràng.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Kỹ thuật viên giàu kinh nghiệm</h5>
                                    <p class="text-xs text-gray-500 mt-1">Được đào tạo bài bản, xử lý mọi dòng máy phổ biến trên thị trường.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Báo giá minh bạch, không phát sinh</h5>
                                    <p class="text-xs text-gray-500 mt-1">Mọi chi phí được thông báo trước, tuyệt đối không phát sinh thêm chi phí ẩn.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Bảo hành dài hạn sau sửa chữa</h5>
                                    <p class="text-xs text-gray-500 mt-1">Cam kết bảo hành và hỗ trợ sau dịch vụ để quý khách hoàn toàn yên tâm.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: CTA Slogan Block -->
                <div class="bg-gradient-to-br from-secondary to-[#0d5326] rounded-3xl p-8 md:p-12 border border-gray-100 flex flex-col justify-center items-center text-center relative overflow-hidden text-white">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-white/5 rounded-full blur-2xl"></div>
                    
                    <div class="w-20 h-20 bg-highlight text-dark rounded-full flex items-center justify-center shadow-lg shadow-highlight/20 mb-8 z-10 animate-bounce">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>

                    <h3 class="text-3xl font-black uppercase tracking-tight mb-4 z-10 text-highlight">MÁY TÍNH CỦA BẠN CẦN SỬA?</h3>
                    <p class="text-white/90 text-sm leading-relaxed max-w-sm mb-8 z-10 font-medium">
                        Liên hệ Âu Việt Phát ngay hôm nay để được kỹ thuật viên tư vấn và khắc phục sự cố nhanh chóng, chuyên nghiệp!
                    </p>
                    
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-white text-secondary hover:bg-highlight hover:text-dark font-extrabold py-4 px-8 rounded-2xl transition-all duration-300 shadow-xl uppercase tracking-wider text-sm z-10 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.003 21c-5.522 0-9.997-4.477-9.997-10S6.48 1 12.003 1s9.997 4.477 9.997 10-4.475 10-9.997 10zm3.001-11.5h-5.002v-1.2l2.601-3.1h-2.601V4h5.002v1.2l-2.601 3.1h2.601v1.2z"/></svg>
                        Liên hệ Zalo ngay
                    </a>
                </div>
            </div>

            <!-- Slogan Card -->
            <div class="bg-secondary/5 rounded-3xl p-8 border border-secondary/10 text-center max-w-4xl mx-auto shadow-sm relative overflow-hidden">
                <div class="absolute -top-10 -left-10 w-32 h-32 bg-secondary/10 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-highlight/10 rounded-full blur-2xl"></div>
                <div class="relative z-10 py-6">
                    <p class="text-secondary font-black text-2xl md:text-3xl italic tracking-tight mb-2">
                        "HÀI LÒNG KHÁCH HÀNG LÀ SỨ MỆNH CỦA AVP"
                    </p>
                    <p class="text-gray-500 text-sm uppercase tracking-[0.2em] font-bold">Âu Việt Phát Technology</p>
                </div>
            </div>

        </div>
    </div>
@endsection

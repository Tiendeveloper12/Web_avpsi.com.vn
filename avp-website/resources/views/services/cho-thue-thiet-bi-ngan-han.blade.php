@extends('layouts.app')

@section('title', 'Dịch Vụ Cho Thuê Thiết Bị Văn Phòng Ngắn Hạn Uy Tín - Âu Việt Phát')
@section('meta_description', 'Dịch vụ cho thuê Laptop, PC đồng bộ cấu hình cao, máy in đa năng và thiết bị mạng phục vụ hội nghị, đào tạo, dự án ngắn hạn, thi cử trọn gói giá rẻ từ Âu Việt Phát.')

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
                            <a href="{{ route('services.index') }}" class="ml-1 text-gray-500 hover:text-primary transition-colors md:ml-2">Dịch vụ</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-primary font-medium md:ml-2">Cho thuê thiết bị văn phòng ngắn hạn</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Hero Section -->
            <div class="bg-gradient-to-br from-primary to-slate-900 rounded-3xl overflow-hidden shadow-2xl mb-16 relative">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                <div class="relative z-10 px-8 py-16 md:p-20 max-w-4xl">
                    <span class="inline-block bg-white/20 text-highlight text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-6 border border-white/10">
                        Giải pháp thiết bị sự kiện trọn gói
                    </span>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight uppercase tracking-tight">
                        Cho Thuê Thiết Bị <br class="hidden md:inline"><span class="text-highlight">Văn Phòng Ngắn Hạn</span>
                    </h1>
                    <p class="text-white/90 text-lg md:text-xl leading-relaxed mb-8 max-w-2xl font-medium">
                        Dịch vụ cho thuê Laptop, PC đồng bộ số lượng lớn, máy in đa năng và hệ thống mạng wifi sự kiện tải cao phục vụ đào tạo nhân sự, hội nghị, triển lãm, dự án ngắn hạn hoặc các kỳ thi tuyển dụng chuyên nghiệp. Hỗ trợ vận chuyển, lắp đặt và cử kỹ thuật viên túc trực On-site 24/7.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="bg-highlight hover:bg-yellow-300 text-dark font-extrabold px-8 py-4 rounded-xl transition-all duration-300 transform hover:-translate-y-1 shadow-lg shadow-highlight/20 flex items-center gap-3">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.003 21c-5.522 0-9.997-4.477-9.997-10S6.48 1 12.003 1s9.997 4.477 9.997 10-4.475 10-9.997 10zm3.001-11.5{h-5.002v-1.2l2.601-3.1h-2.601V4h5.002v1.2l-2.601 3.1h2.601v1.2z"/></svg>
                            <span>LIÊN HỆ BÁO GIÁ TRONG 1 GIỜ</span>
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
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04c0 4.833 1.807 9.308 4.618 12.723a11.955 11.955 0 0013.92 0c2.811-3.415 4.618-7.89 4.618-12.723z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-blue-600 font-bold tracking-wider uppercase block mb-1">Số lượng đồng bộ</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Đồng Bộ & Cấu Hình Cao</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Cung cấp hàng trăm đầu máy laptop/PC cùng mẫu mã, cấu hình mạnh (Core i5/i7, SSD siêu tốc) tạo sự chuyên nghiệp tối đa cho sự kiện.</p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-green-50 text-secondary rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-secondary font-bold tracking-wider uppercase block mb-1">Dịch vụ trọn gói</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Bàn Giao Lắp Đặt Siêu Tốc</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Chịu trách nhiệm toàn bộ khâu vận chuyển, lắp đặt dây mạng, cài đặt phần mềm theo yêu cầu và thu dọn thiết bị sau sự kiện.</p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-yellow-50 text-highlight rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-yellow-600 font-bold tracking-wider uppercase block mb-1">Kỹ thuật On-site</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Túc Trực Kỹ Thuật 24/7</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Cử kỹ thuật viên lành nghề túc trực trực tiếp tại địa điểm diễn ra sự kiện để xử lý ngay lập tức các tình huống phát sinh.</p>
                    </div>
                </div>
            </div>

            <!-- Two Columns Services: Laptop/PC vs Printer/Network -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
                
                <!-- Laptop & PC Column -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-primary/10 text-primary rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <h2 class="text-2xl font-black text-gray-900 uppercase">Cho Thuê Laptop & PC Đồng Bộ</h2>
                        </div>
                        <div class="w-16 h-1 bg-primary rounded-full mb-6"></div>
                        <p class="text-gray-500 text-sm mb-8 leading-relaxed">
                            Chúng tôi cung cấp dịch vụ cho thuê laptop, máy tính để bàn (PC) đồng bộ số lượng lớn từ các hãng cao cấp Dell, HP, Lenovo. Thiết bị được đảm bảo mới từ 95% trở lên, vận hành mượt mà, đầy đủ phụ kiện (chuột, cáp sạc, bàn phím, lót chuột) đi kèm trọn gói.
                        </p>

                        <h4 class="font-extrabold text-gray-900 text-sm mb-4 uppercase tracking-wider">CẤU HÌNH THIẾT BỊ SẴN SÀNG CUNG CẤP:</h4>
                        <ul class="space-y-3.5 mb-8">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Cấu hình văn phòng & Đào tạo:</strong> Intel Core i5 thế hệ mới, RAM 8GB/16GB, SSD siêu tốc 256GB, màn hình Full HD sắc nét.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Cài đặt phần mềm theo yêu cầu:</strong> Cài sẵn hệ điều hành Windows bản quyền, bộ Office, trình duyệt và các phần mềm thi cử, training chuyên biệt của khách hàng trước khi giao.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Hỗ trợ máy dự phòng:</strong> Luôn chuẩn bị sẵn từ 5% - 10% số lượng máy dự phòng tại sự kiện để thay thế ngay lập tức nếu có thiết bị phát sinh lỗi kỹ thuật.</span>
                            </li>
                        </ul>
                    </div>
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-primary hover:bg-dark text-white font-bold py-3.5 px-6 rounded-xl transition-all duration-300 text-center uppercase tracking-wider text-xs block">
                        YÊU CẦU THUÊ LAPTOP & PC
                    </a>
                </div>

                <!-- Printer & Network Column -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-secondary/10 text-secondary rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            </div>
                            <h2 class="text-2xl font-black text-gray-900 uppercase">Thuê Máy In & Wifi Sự Kiện</h2>
                        </div>
                        <div class="w-16 h-1 bg-secondary rounded-full mb-6"></div>
                        <p class="text-gray-500 text-sm mb-8 leading-relaxed">
                            Một sự kiện chuyên nghiệp luôn cần hệ thống in ấn tài liệu nhanh chóng và kết nối internet không gián đoạn. Chúng tôi cung cấp dịch vụ cho thuê máy in laser đa năng công suất cao, đi kèm đầy đủ mực in dự phòng và triển khai router wifi chịu tải lớn phục vụ hàng trăm kết nối đồng thời.
                        </p>

                        <h4 class="font-extrabold text-gray-900 text-sm mb-4 uppercase tracking-wider">HẠNG MỤC THIẾT BỊ PHỤ TRỢ:</h4>
                        <ul class="space-y-3.5 mb-8">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Cho thuê máy in đa năng:</strong> Máy in Canon/HP tốc độ cao, hỗ trợ in mạng LAN, photocopy, scan tài liệu liên tục, miễn phí mực in đi kèm không giới hạn bản in.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Triển khai wifi sự kiện chịu tải cao:</strong> Cho thuê thiết bị Router cân bằng tải DrayTek và bộ phát Wifi 6 chuyên dụng đảm bảo kết nối internet mượt mà cho toàn bộ đại biểu tham gia sự kiện.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Thi công dây cáp mạng LAN:</strong> Chạy dây mạng LAN CAT6 kết nối trực tiếp đến từng máy tính cho các sự kiện đào tạo, thi cử đòi hỏi tính bảo mật và độ ổn định đường truyền 100%.</span>
                            </li>
                        </ul>
                    </div>
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-secondary hover:bg-dark text-white font-bold py-3.5 px-6 rounded-xl transition-all duration-300 text-center uppercase tracking-wider text-xs block">
                        YÊU CẦU THUÊ MÁY IN & WIFI
                    </a>
                </div>
            </div>

            <!-- Detailed 6-Step Installation Process -->
            <div class="bg-white rounded-3xl p-8 md:p-16 border border-gray-100 shadow-sm mb-16">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-primary font-bold text-sm tracking-widest uppercase mb-3 block">QUY TRÌNH DỊCH VỤ</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase">Quy trình cho thuê thiết bị trọn gói</h2>
                    <div class="w-16 h-1 bg-highlight mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    <!-- Step 1 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            01
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Tiếp Nhận</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Xác định số lượng máy, cấu hình yêu cầu, địa điểm, thời gian diễn ra sự kiện ngắn hạn của khách hàng.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            02
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Báo Giá</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Gửi báo giá thuê chi tiết kèm các tùy chọn gói kỹ thuật On-site hỗ trợ trong vòng 1 giờ làm việc.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            03
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Chuẩn Bị</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Cài đặt hệ điều hành, các phần mềm yêu cầu, vệ sinh máy và test kỹ thuật phần cứng trước khi đóng thùng.</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            04
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Lắp Đặt</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Vận chuyển thiết bị đến tận nơi, lắp ráp PC/Laptop, chạy dây mạng tín hiệu LAN và test vận hành toàn hệ thống.</p>
                    </div>

                    <!-- Step 5 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            05
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">On-site Hỗ Trợ</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Kỹ thuật viên túc trực trực tiếp tại địa điểm sự kiện để hỗ trợ người dùng và xử lý sự cố tức thì (nếu yêu cầu).</p>
                    </div>

                    <!-- Step 6 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            06
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Tháo Dỡ</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Tiến hành tắt máy, tháo dỡ dây cáp tín hiệu, kiểm đếm số lượng bàn giao ban đầu và tháo dỡ thiết bị mang về.</p>
                    </div>
                </div>
            </div>

            <!-- Guarantee & CTA Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-stretch mb-16">
                <!-- Left: Commitments card -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <span class="text-primary font-bold text-sm tracking-widest uppercase block mb-3">TẠI SAO CHỌN CHÚNG TÔI?</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 uppercase mb-6">Cam kết dịch vụ cho thuê từ Âu Việt Phát</h3>
                        <div class="w-16 h-1 bg-highlight rounded-full mb-6"></div>
                        
                        <div class="space-y-5">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Thiết bị đời mới, chất lượng cao</h5>
                                    <p class="text-xs text-gray-500 mt-1">100% laptop và PC sử dụng ổ cứng SSD, RAM tối thiểu 8GB, chạy mượt mà mọi tác vụ thi cử, đào tạo.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Miễn phí lắp đặt & các phụ kiện đi kèm</h5>
                                    <p class="text-xs text-gray-500 mt-1">Cung cấp miễn phí toàn bộ chuột dây, ổ cắm điện chịu tải, dây mạng LAN kết nối máy tính trọn gói.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Thủ tục thuê đơn giản, nhanh chóng</h5>
                                    <p class="text-xs text-gray-500 mt-1">Hợp đồng thuê rõ ràng, thủ tục bàn giao nhanh, không cần nhiều giấy tờ phức tạp đối với doanh nghiệp.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Hỗ trợ kỹ sư IT túc trực sự kiện</h5>
                                    <p class="text-xs text-gray-500 mt-1">Đảm bảo an toàn kỹ thuật tuyệt đối, xử lý ngay lập tức các sự cố mất mạng hoặc lỗi phần cứng trong lúc sự kiện diễn ra.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: CTA Slogan Block -->
                <div class="bg-gradient-to-br from-primary to-slate-900 rounded-3xl p-8 md:p-12 border border-gray-100 flex flex-col justify-center items-center text-center relative overflow-hidden text-white">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-white/5 rounded-full blur-2xl"></div>
                    
                    <div class="w-20 h-20 bg-highlight text-dark rounded-full flex items-center justify-center shadow-lg shadow-highlight/20 mb-8 z-10 animate-bounce">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    </div>

                    <h3 class="text-3xl font-black uppercase tracking-tight mb-4 z-10 text-highlight">SỰ KIỆN SẮP DIỄN RA?</h3>
                    <p class="text-white/90 text-sm leading-relaxed max-w-sm mb-8 z-10 font-medium">
                        Liên hệ trực tiếp với Âu Việt Phát qua Zalo để nhận báo giá thuê Laptop, PC, máy in ngắn hạn trọn gói cạnh tranh nhất thị trường!
                    </p>
                    
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-white text-primary hover:bg-highlight hover:text-dark font-extrabold py-4 px-8 rounded-2xl transition-all duration-300 shadow-xl uppercase tracking-wider text-sm z-10 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.003 21c-5.522 0-9.997-4.477-9.997-10S6.48 1 12.003 1s9.997 4.477 9.997 10-4.475 10-9.997 10zm3.001-11.5h-5.002v-1.2l2.601-3.1h-2.601V4h5.002v1.2l-2.601 3.1h2.601v1.2z"/></svg>
                        Nhận báo giá sự kiện qua Zalo ngay
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

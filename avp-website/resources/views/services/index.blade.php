@extends('layouts.app')

@section('title', 'Tất Cả Dịch Vụ Thiết Bị & Tin Học Văn Phòng - Âu Việt Phát')
@section('meta_description', 'Tổng hợp các dịch vụ sửa chữa, bảo trì, cho thuê máy photocopy, máy in, máy tính, thiết kế hệ thống server và camera văn phòng chuyên nghiệp từ Âu Việt Phát.')

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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-primary font-medium md:ml-2">Dịch vụ</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Hero Section -->
            <div class="bg-gradient-to-br from-dark to-slate-900 rounded-3xl overflow-hidden shadow-2xl mb-16 relative">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                <div class="relative z-10 px-8 py-16 md:p-20 max-w-4xl">
                    <span class="inline-block bg-white/10 text-highlight text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-6 border border-white/10">
                        Giải pháp thiết bị toàn diện cho doanh nghiệp
                    </span>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight uppercase tracking-tight">
                        Dịch Vụ Đa Dạng <br class="hidden md:inline"><span class="text-highlight">Chuyên Nghiệp</span>
                    </h1>
                    <p class="text-gray-300 text-lg md:text-xl leading-relaxed mb-8 max-w-2xl font-medium">
                        Âu Việt Phát tự hào cung cấp hệ sinh thái dịch vụ kỹ thuật và công nghệ toàn diện cho văn phòng: từ cho thuê, sửa chữa máy photocopy - máy in, bảo trì máy tính đến giải pháp an ninh camera và hạ tầng mạng server doanh nghiệp.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="bg-highlight hover:bg-yellow-300 text-dark font-extrabold px-8 py-4 rounded-xl transition-all duration-300 transform hover:-translate-y-1 shadow-lg shadow-highlight/20 flex items-center gap-3">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.003 21c-5.522 0-9.997-4.477-9.997-10S6.48 1 12.003 1s9.997 4.477 9.997 10-4.475 10-9.997 10zm3.001-11.5h-5.002v-1.2l2.601-3.1h-2.601V4h5.002v1.2l-2.601 3.1h2.601v1.2z"/></svg>
                            <span>LIÊN HỆ KHẢO SÁT & TƯ VẤN</span>
                        </a>
                        <a href="tel:0912979394" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 font-bold px-8 py-4 rounded-xl transition-all duration-300 flex items-center gap-3">
                            <svg class="w-6 h-6 text-highlight" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>HOTLINE: 0912 97 9394</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Services Grid -->
            <div class="mb-20">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-primary font-bold text-sm tracking-widest uppercase mb-3 block">DANH MỤC DỊCH VỤ</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase">Hệ sinh thái dịch vụ Âu Việt Phát</h2>
                    <div class="w-16 h-1 bg-highlight mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <!-- 1. Cho thuê máy photocopy -->
                    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-primary/20 transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <div class="w-14 h-14 bg-red-50 text-primary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 uppercase mb-3 group-hover:text-primary transition-colors">Cho thuê máy photocopy</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-6">
                                Cho thuê các dòng máy photocopy Ricoh, Toshiba đời mới công suất cao. Không cần chi phí đầu tư ban đầu, miễn phí mực in và bảo dưỡng kỹ thuật tận nơi.
                            </p>
                        </div>
                        <a href="/dich-vu/cho-thue-photocopy" class="inline-flex items-center gap-2 text-primary font-bold text-sm group-hover:translate-x-1.5 transition-transform">
                            Xem chi tiết dịch vụ
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>

                    <!-- 2. Nạp mực in & photocopy -->
                    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-secondary/20 transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <div class="w-14 h-14 bg-green-50 text-secondary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 9.172V5L8 4z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 uppercase mb-3 group-hover:text-secondary transition-colors">Nạp mực máy in & photocopy</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-6">
                                Bơm đổ mực máy in HP, Canon, Brother tận nơi siêu tốc. Mực in nhập khẩu hạt siêu mịn, cam kết chất lượng bản in đậm nét và tuổi thọ hộp mực lâu bền.
                            </p>
                        </div>
                        <a href="/dich-vu/nap-muc-in" class="inline-flex items-center gap-2 text-secondary font-bold text-sm group-hover:translate-x-1.5 transition-transform">
                            Xem chi tiết dịch vụ
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>

                    <!-- 3. Sửa chữa máy photocopy & máy in -->
                    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-primary/20 transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <div class="w-14 h-14 bg-red-50 text-primary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 uppercase mb-3 group-hover:text-primary transition-colors">Sửa chữa máy photocopy & máy in</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-6">
                                Chẩn đoán và sửa nhanh lỗi kẹt giấy, mờ chữ, sống mực, lỗi board nguồn, board kết nối. Thay thế linh kiện sấy, drum chính hãng Ricoh, Canon, HP...
                            </p>
                        </div>
                        <a href="/dich-vu/sua-chua-may-in" class="inline-flex items-center gap-2 text-primary font-bold text-sm group-hover:translate-x-1.5 transition-transform">
                            Xem chi tiết dịch vụ
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>

                    <!-- 4. Bảo trì, sửa chữa laptop & máy tính -->
                    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-secondary/20 transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <div class="w-14 h-14 bg-green-50 text-secondary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 uppercase mb-3 group-hover:text-secondary transition-colors">Sửa laptop & máy tính để bàn</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-6">
                                Sửa lỗi phần cứng mainboard, nâng cấp RAM/SSD giúp máy chạy mượt mà. Cài đặt phần mềm Windows, macOS, ứng dụng đồ họa chuyên nghiệp tận nơi.
                            </p>
                        </div>
                        <a href="/dich-vu/sua-chua-may-tinh" class="inline-flex items-center gap-2 text-secondary font-bold text-sm group-hover:translate-x-1.5 transition-transform">
                            Xem chi tiết dịch vụ
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>

                    <!-- 5. Thiết kế, thi công hệ thống server -->
                    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-blue-500/20 transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 uppercase mb-3 group-hover:text-blue-600 transition-colors">Hệ thống server doanh nghiệp</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-6">
                                Tư vấn, thiết kế và thi công hệ thống máy chủ mạng nội bộ. Thiết lập mạng phân quyền, lưu trữ dữ liệu trung tâm NAS đảm bảo bảo mật và vận hành ổn định.
                            </p>
                        </div>
                        <a href="{{ route('services.he-thong-server') }}" class="inline-flex items-center gap-2 text-blue-600 font-bold text-sm group-hover:translate-x-1.5 transition-transform">
                            Xem chi tiết dịch vụ
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>

                    <!-- 6. Thiết kế, thi công camera văn phòng -->
                    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-blue-500/20 transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 uppercase mb-3 group-hover:text-blue-600 transition-colors">Camera quan sát văn phòng - nhà xưởng</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-6">
                                Khảo sát, thi công trọn gói hệ thống camera an ninh hồng ngoại độ nét cao Hikvision, Dahua. Cài đặt xem từ xa qua app di động, bảo mật và lưu trữ lâu dài.
                            </p>
                        </div>
                        <a href="{{ route('services.camera-quan-sat') }}" class="inline-flex items-center gap-2 text-blue-600 font-bold text-sm group-hover:translate-x-1.5 transition-transform">
                            Xem chi tiết dịch vụ
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>

                    <!-- 7. Cho thuê laptop, máy tính, máy in -->
                    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-blue-500/20 transition-all duration-300 flex flex-col justify-between lg:col-span-1 group">
                        <div>
                            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 uppercase mb-3 group-hover:text-blue-600 transition-colors">Cho thuê thiết bị văn phòng ngắn hạn</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-6">
                                Dịch vụ cho thuê máy tính, laptop đồng bộ cấu hình cao phục vụ sự kiện, đào tạo, dự án thi tuyển sinh. Cho thuê máy in đa năng linh động hỗ trợ kỹ thuật 24/7.
                            </p>
                        </div>
                        <a href="{{ route('services.cho-thue-thiet-bi-ngan-han') }}" class="inline-flex items-center gap-2 text-blue-600 font-bold text-sm group-hover:translate-x-1.5 transition-transform">
                            Xem chi tiết dịch vụ
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>

                </div>
            </div>

            <!-- Global Guarantees / Advantages Grid -->
            <div class="bg-white rounded-3xl p-8 md:p-16 border border-gray-100 shadow-sm mb-16">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-primary font-bold text-sm tracking-widest uppercase mb-3 block">UY TÍN THƯƠNG HIỆU</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase">Ưu thế dịch vụ của Âu Việt Phát</h2>
                    <div class="w-16 h-1 bg-highlight mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Advantage 1 -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h4 class="font-extrabold text-gray-900 text-base uppercase mb-2">Hỗ Trợ Siêu Tốc</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Có mặt kiểm tra sự cố tận nơi trong 30-45 phút tại nội thành TP.HCM.</p>
                    </div>

                    <!-- Advantage 2 -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-secondary/10 text-secondary rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04c0 4.833 1.807 9.308 4.618 12.723a11.955 11.955 0 0013.92 0c2.811-3.415 4.618-7.89 4.618-12.723z"></path></svg>
                        </div>
                        <h4 class="font-extrabold text-gray-900 text-base uppercase mb-2">Chất Lượng Chuẩn Hãng</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Sử dụng 100% linh kiện chính hãng, tem phiếu bảo hành rõ ràng từ 3-12 tháng.</p>
                    </div>

                    <!-- Advantage 3 -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-50 text-highlight rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <h4 class="font-extrabold text-gray-900 text-base uppercase mb-2">Giá Cả Minh Bạch</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Kiểm tra miễn phí, chẩn đoán báo giá trước khi tiến hành xử lý, không phát sinh.</p>
                    </div>

                    <!-- Advantage 4 -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h4 class="font-extrabold text-gray-900 text-base uppercase mb-2">Mượn Thiết Bị Thay Thế</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Cho mượn máy photocopy/máy in tương đương khi nhận máy về xưởng sửa chữa.</p>
                    </div>
                </div>
            </div>

            <!-- Guarantee & CTA Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-stretch mb-16">
                <!-- Left: Commitments card -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <span class="text-primary font-bold text-sm tracking-widest uppercase block mb-3">TƯ VẤN THIẾT LẬP VĂN PHÒNG</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 uppercase mb-6">Giải pháp tối ưu ngân sách</h3>
                        <div class="w-16 h-1 bg-highlight rounded-full mb-6"></div>
                        
                        <div class="space-y-5">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Hợp đồng dài hạn ưu đãi cao</h5>
                                    <p class="text-xs text-gray-500 mt-1">Cung cấp báo giá đặc biệt cho doanh nghiệp ký hợp đồng thuê máy, bảo trì định kỳ trên 1 năm.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Đồng bộ thiết bị mạng & Camera</h5>
                                    <p class="text-xs text-gray-500 mt-1">Thiết kế đồng bộ camera giám sát và server giúp giảm tải xung đột phần mềm hệ thống mạng nội bộ.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Hỗ trợ kỹ thuật khẩn cấp 24/7</h5>
                                    <p class="text-xs text-gray-500 mt-1">Hỗ trợ từ xa qua UltraView/TeamViewer hoặc hotline kỹ thuật bất kỳ lúc nào khách hàng cần gấp.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: CTA Slogan Block -->
                <div class="bg-gradient-to-br from-[#111827] to-[#1e293b] rounded-3xl p-8 md:p-12 border border-gray-100 flex flex-col justify-center items-center text-center relative overflow-hidden text-white">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-white/5 rounded-full blur-2xl"></div>
                    
                    <div class="w-20 h-20 bg-highlight text-dark rounded-full flex items-center justify-center shadow-lg shadow-highlight/20 mb-8 z-10 animate-bounce">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 9.172V5L8 4z"></path></svg>
                    </div>

                    <h3 class="text-3xl font-black uppercase tracking-tight mb-4 z-10 text-highlight">YÊU CẦU DỊCH VỤ NGAY?</h3>
                    <p class="text-white/90 text-sm leading-relaxed max-w-sm mb-8 z-10 font-medium">
                        Liên hệ Âu Việt Phát ngay hôm nay để được tư vấn các phương án kỹ thuật và nhận báo giá dịch vụ nhanh chóng nhất!
                    </p>
                    
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-white text-[#111827] hover:bg-highlight hover:text-dark font-extrabold py-4 px-8 rounded-2xl transition-all duration-300 shadow-xl uppercase tracking-wider text-sm z-10 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.003 21c-5.522 0-9.997-4.477-9.997-10S6.48 1 12.003 1s9.997 4.477 9.997 10-4.475 10-9.997 10zm3.001-11.5h-5.002v-1.2l2.601-3.1h-2.601V4h5.002v1.2l-2.601 3.1h2.601v1.2z"/></svg>
                        Trò chuyện qua Zalo
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

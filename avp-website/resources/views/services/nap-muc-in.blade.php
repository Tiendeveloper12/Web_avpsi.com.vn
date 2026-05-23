@extends('layouts.app')

@section('title', 'Dịch Vụ Nạp Mực Máy In Chất Lượng Cao - Âu Việt Phát')
@section('meta_description', 'Dịch vụ nạp mực máy in tận nơi chuyên nghiệp của Âu Việt Phát. Quy trình nạp mực tiêu chuẩn cao, có mặt nhanh chóng sau 45-60 phút, cam kết bản in sắc nét.')

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
                            <span class="ml-1 text-primary font-medium md:ml-2">Nạp mực máy in & photocopy</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Hero Section -->
            <div class="bg-secondary rounded-3xl overflow-hidden shadow-2xl mb-16 relative">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                <div class="relative z-10 px-8 py-16 md:p-20 max-w-4xl">
                    <span class="inline-block bg-primary/20 text-highlight text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-6 border border-highlight/20">
                        Dịch vụ tận nơi chuyên nghiệp
                    </span>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight uppercase tracking-tight">
                        Dịch Vụ Nạp Mực <br class="hidden md:inline"><span class="text-highlight">Máy In & Photocopy</span>
                    </h1>
                    <p class="text-gray-300 text-lg md:text-xl leading-relaxed mb-8 max-w-2xl font-medium">
                        Giải pháp bơm đổ mực máy in chất lượng cao tận nơi. Nhanh chóng, sạch sẽ, cam kết độ đậm nét và bảo vệ tối đa tuổi thọ hộp mực của bạn.
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

            <!-- Highlights / Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
                <!-- Response Time -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-red-50 text-secondary rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-red-500 font-bold tracking-wider uppercase block mb-1">Có mặt siêu tốc</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Phản Hồi Trong 45p - 60p</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Đội ngũ kỹ thuật viên luôn túc trực, di chuyển nhanh chóng đến tận nơi để xử lý sự cố kịp thời.</p>
                    </div>
                </div>

                <!-- Ink Quality -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-green-50 text-primary rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-primary font-bold tracking-wider uppercase block mb-1">Mực in chất lượng</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Bản In Đậm Nét, Sạch</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Sử dụng loại mực chất lượng cao, hạt siêu mịn, cho bản in sắc nét và giảm thiểu hư hỏng linh kiện.</p>
                    </div>
                </div>

                <!-- Mission -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-yellow-50 text-highlight rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.757a1 1 0 00.707-1.707l-5.414-5.414a1 1 0 00-1.414 0L7.222 8.293a1 1 0 00.707 1.707H13v6a3 3 0 01-3 3H7a1 1 0 000 2h3a5 5 0 005-5v-6z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-yellow-600 font-bold tracking-wider uppercase block mb-1">Sứ mệnh dịch vụ</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Trải Nghiệm Khách Hàng</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Chúng tôi luôn đặt sự hài lòng của khách hàng lên hàng đầu với thái độ phục vụ tận tâm và trung thực.</p>
                    </div>
                </div>
            </div>

            <!-- Process Section -->
            <div class="bg-white rounded-3xl p-8 md:p-16 border border-gray-100 shadow-sm mb-16">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-primary font-bold text-sm tracking-widest uppercase mb-3 block">TIÊU CHUẨN KỸ THUẬT</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase">Quy Trình Đổ Mực Chất Lượng Cao</h2>
                    <div class="w-16 h-1 bg-highlight mx-auto mt-4 rounded-full"></div>
                    <p class="text-gray-500 mt-6 text-base">
                        Để đảm bảo bản in đạt chất lượng tốt nhất và tuổi thọ hộp mực được kéo dài lâu hơn, kỹ thuật viên Âu Việt Phát luôn tuân thủ nghiêm ngặt quy trình kỹ thuật sau:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Step 1 -->
                    <div class="relative group p-6 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-md transition-all duration-300 flex flex-col h-full">
                        <div class="w-12 h-12 bg-primary/10 text-primary font-bold rounded-xl flex items-center justify-center mb-6 text-lg group-hover:bg-primary group-hover:text-white transition-colors">
                            01
                        </div>
                        <h4 class="font-extrabold text-lg text-gray-900 mb-3 uppercase">Vệ sinh hộp mực</h4>
                        <p class="text-gray-500 text-sm leading-relaxed">Vệ sinh lại toàn bộ hộp mực in kỹ lưỡng bên trong lẫn bên ngoài trước khi thực hiện thao tác đổ mực.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative group p-6 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-md transition-all duration-300 flex flex-col h-full">
                        <div class="w-12 h-12 bg-primary/10 text-primary font-bold rounded-xl flex items-center justify-center mb-6 text-lg group-hover:bg-primary group-hover:text-white transition-colors">
                            02
                        </div>
                        <h4 class="font-extrabold text-lg text-gray-900 mb-3 uppercase">Loại bỏ mực thừa</h4>
                        <p class="text-gray-500 text-sm leading-relaxed">Hút sạch lượng mực dư thừa, cặn mực và bụi bẩn cũ ra khỏi hộp mực trước khi nạp mực mới vào để tránh lem bẩn.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative group p-6 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-md transition-all duration-300 flex flex-col h-full">
                        <div class="w-12 h-12 bg-primary/10 text-primary font-bold rounded-xl flex items-center justify-center mb-6 text-lg group-hover:bg-primary group-hover:text-white transition-colors">
                            03
                        </div>
                        <h4 class="font-extrabold text-lg text-gray-900 mb-3 uppercase">Xử lý linh kiện</h4>
                        <p class="text-gray-500 text-sm leading-relaxed">Kiểm tra và xử lý lại toàn bộ linh kiện của hộp mực như trống (drum), gạt mực, trục từ để phát hiện mài mòn.</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative group p-6 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-md transition-all duration-300 flex flex-col h-full">
                        <div class="w-12 h-12 bg-primary/10 text-primary font-bold rounded-xl flex items-center justify-center mb-6 text-lg group-hover:bg-primary group-hover:text-white transition-colors">
                            04
                        </div>
                        <h4 class="font-extrabold text-lg text-gray-900 mb-3 uppercase">Bôi trơn chi tiết</h4>
                        <p class="text-gray-500 text-sm leading-relaxed">Sử dụng dầu mỡ bôi trơn chuyên dụng cho mực in để các bánh răng và chi tiết chuyển động không bị ma sát hay mài mòn mạnh.</p>
                    </div>

                    <!-- Step 5 -->
                    <div class="relative group p-6 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-md transition-all duration-300 flex flex-col h-full">
                        <div class="w-12 h-12 bg-primary/10 text-primary font-bold rounded-xl flex items-center justify-center mb-6 text-lg group-hover:bg-primary group-hover:text-white transition-colors">
                            05
                        </div>
                        <h4 class="font-extrabold text-lg text-gray-900 mb-3 uppercase">Kiểm tra chất lượng</h4>
                        <p class="text-gray-500 text-sm leading-relaxed">Tiến hành test thử chất lượng bản in của hộp mực, đánh giá độ sắc nét và màu sắc trước khi bàn giao lại cho khách hàng.</p>
                    </div>

                    <!-- Step 6 -->
                    <div class="relative group p-6 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-md transition-all duration-300 flex flex-col h-full">
                        <div class="w-12 h-12 bg-primary/10 text-primary font-bold rounded-xl flex items-center justify-center mb-6 text-lg group-hover:bg-primary group-hover:text-white transition-colors">
                            06
                        </div>
                        <h4 class="font-extrabold text-lg text-gray-900 mb-3 uppercase">Theo dõi số lần nạp</h4>
                        <p class="text-gray-500 text-sm leading-relaxed">Ghi chép và theo dõi số lần nạp mực trên mỗi hộp mực giúp khách hàng quản lý và đưa ra quyết định thay thế linh kiện tối ưu.</p>
                    </div>
                </div>
            </div>

            <!-- Results & Guarantees -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
                <!-- Left Content -->
                <div class="space-y-6">
                    <span class="text-secondary font-bold text-sm tracking-widest uppercase block">CAM KẾT CỦA CHÚNG TÔI</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase leading-tight">Kết quả hoàn hảo sau khi thực hiện dịch vụ</h2>
                    <div class="w-16 h-1 bg-highlight rounded-full"></div>
                    <p class="text-gray-500 text-base leading-relaxed">
                        Nhờ tuân thủ đúng quy trình nghiệp vụ và sử dụng nguyên liệu cao cấp, chúng tôi tự tin mang lại trải nghiệm bản in vượt trội nhất cho quý khách:
                    </p>
                    
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 bg-white p-4 rounded-xl shadow-xs border border-gray-100">
                            <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center mt-1 flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            <div>
                                <h4 class="font-bold text-gray-900">Bản in đậm màu, siêu sắc nét</h4>
                                <p class="text-sm text-gray-500">Mực bám giấy tốt, chữ in rõ ràng, mịn màng và không bị nhoè mực.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3 bg-white p-4 rounded-xl shadow-xs border border-gray-100">
                            <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center mt-1 flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            <div>
                                <h4 class="font-bold text-gray-900">Tuyệt đối không bị chảy hay rò rỉ mực</h4>
                                <p class="text-sm text-gray-500">Hộp mực được làm kín hoàn hảo, ngăn ngừa tối đa rủi ro đổ hay chảy mực ra máy in.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3 bg-white p-4 rounded-xl shadow-xs border border-gray-100">
                            <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center mt-1 flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            <div>
                                <h4 class="font-bold text-gray-900">In rõ nét đến giọt mực cuối cùng</h4>
                                <p class="text-sm text-gray-500">Hiệu suất hộp mực đạt mức tối đa và kết cấu cho phép bạn tiếp tục nạp mực thêm nhiều lần nữa.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Right Visual block -->
                <div class="bg-gradient-to-br from-primary/5 to-secondary/5 rounded-3xl p-8 md:p-12 border border-gray-100 flex flex-col justify-center items-center text-center relative overflow-hidden h-full">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-primary/10 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-secondary/10 rounded-full blur-2xl"></div>
                    
                    <div class="w-20 h-20 bg-highlight text-dark rounded-full flex items-center justify-center shadow-lg shadow-highlight/20 mb-8 z-10 animate-pulse">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    </div>

                    <h3 class="text-2xl font-extrabold text-gray-900 uppercase tracking-tight mb-4 z-10">Cam kết chất lượng dịch vụ</h3>
                    <p class="text-gray-600 text-sm leading-relaxed max-w-sm mb-8 z-10">
                        Kỹ thuật viên của Âu Việt Phát sẽ nhanh chóng di chuyển và có mặt tại địa điểm của quý khách chỉ từ <span class="text-secondary font-bold font-semibold">45 đến 60 phút</span> để xử lý mọi yêu cầu nạp mực hoặc sự cố in ấn.
                    </p>
                    
                    <a href="tel:0912979394" class="w-full bg-secondary hover:bg-secondary/95 text-white font-extrabold py-4 px-8 rounded-2xl transition-all duration-300 shadow-lg shadow-secondary/20 uppercase tracking-wider text-sm z-10 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        Yêu cầu dịch vụ ngay
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

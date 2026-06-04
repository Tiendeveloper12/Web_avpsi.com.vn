@extends('layouts.app')

@section('title', 'Dịch Vụ Lắp Đặt Camera Quan Sát Văn Phòng & Nhà Xưởng - Âu Việt Phát')
@section('meta_description', 'Dịch vụ tư vấn, khảo sát và lắp đặt trọn gói hệ thống camera quan sát văn phòng, nhà xưởng chuyên nghiệp từ Âu Việt Phát. Cam kết camera chính hãng Hikvision, Dahua, KBVision, độ nét cao, bảo mật tối đa.')

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
                            <span class="ml-1 text-primary font-medium md:ml-2">Camera quan sát văn phòng - nhà xưởng</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Hero Section -->
            <div class="bg-gradient-to-br from-primary to-slate-900 rounded-3xl overflow-hidden shadow-2xl mb-16 relative">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                <div class="relative z-10 px-8 py-16 md:p-20 max-w-4xl">
                    <span class="inline-block bg-white/20 text-highlight text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-6 border border-white/10">
                        Giải pháp an ninh toàn diện
                    </span>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight uppercase tracking-tight">
                        Camera Quan Sát <br class="hidden md:inline"><span class="text-highlight">Văn Phòng & Nhà Xưởng</span>
                    </h1>
                    <p class="text-white/90 text-lg md:text-xl leading-relaxed mb-8 max-w-2xl font-medium">
                        Tư vấn, khảo sát trực tiếp và thi công lắp đặt trọn gói hệ thống camera giám sát thông minh, độ nét cao (2MP - 4MP - 8MP) cho văn phòng công ty và nhà xưởng công nghiệp. Giám sát từ xa qua điện thoại/máy tính 24/7, bảo mật dữ liệu tuyệt đối, lưu trữ tối ưu.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="bg-highlight hover:bg-yellow-300 text-dark font-extrabold px-8 py-4 rounded-xl transition-all duration-300 transform hover:-translate-y-1 shadow-lg shadow-highlight/20 flex items-center gap-3">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.003 21c-5.522 0-9.997-4.477-9.997-10S6.48 1 12.003 1s9.997 4.477 9.997 10-4.475 10-9.997 10zm3.001-11.5h-5.002v-1.2l2.601-3.1h-2.601V4h5.002v1.2l-2.601 3.1h2.601v1.2z"/></svg>
                            <span>LIÊN HỆ KHẢO SÁT & BÁO GIÁ</span>
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
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-blue-600 font-bold tracking-wider uppercase block mb-1">Thiết bị chính hãng</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Độ Bền & Độ Nét Cao</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Cung cấp thiết bị camera từ các thương hiệu hàng đầu thế giới: Hikvision, Dahua, KBVision, Imou, Ezviz với chế độ bảo hành 2 năm.</p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-green-50 text-secondary rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04c0 4.833 1.807 9.308 4.618 12.723a11.955 11.955 0 0013.92 0c2.811-3.415 4.618-7.89 4.618-12.723z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-secondary font-bold tracking-wider uppercase block mb-1">Bảo mật hệ thống</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Bảo Mật Tuyệt Đối</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Bàn giao toàn bộ tài khoản quản lý gốc cho khách hàng, hỗ trợ đặt mật khẩu bảo mật cao chống mã hóa và xâm nhập bên ngoài.</p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-yellow-50 text-highlight rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-yellow-600 font-bold tracking-wider uppercase block mb-1">Khảo sát trực tiếp</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Khảo Sát Miễn Phí</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Khảo sát mặt bằng, tư vấn vị trí đặt camera góc rộng tốt nhất và lên bản vẽ thiết kế thi công hoàn toàn miễn phí.</p>
                    </div>
                </div>
            </div>

            <!-- Two Columns Services: Office vs Factory -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
                
                <!-- Office Column -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-primary/10 text-primary rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <h2 class="text-2xl font-black text-gray-900 uppercase">Camera Cho Văn Phòng</h2>
                        </div>
                        <div class="w-16 h-1 bg-primary rounded-full mb-6"></div>
                        <p class="text-gray-500 text-sm mb-8 leading-relaxed">
                            Môi trường văn phòng đòi hỏi tính thẩm mỹ cao khi đi dây và đặt thiết bị. Hệ thống camera văn phòng giúp giám sát hiệu suất làm việc của nhân viên, bảo vệ tài sản công ty, phòng họp, quầy lễ tân và kiểm soát an ninh ra vào văn phòng hiệu quả.
                        </p>

                        <h4 class="font-extrabold text-gray-900 text-sm mb-4 uppercase tracking-wider">GIẢI PHÁP CAMERA VĂN PHÒNG TỐI ƯU:</h4>
                        <ul class="space-y-3.5 mb-8">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Camera Bán Cầu (Dome):</strong> Thiết kế nhỏ gọn, ốp trần thẩm mỹ cao, góc quan sát rộng, khó phát hiện hướng ống kính.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Tích hợp Micro ghi âm:</strong> Hỗ trợ giám sát âm thanh tại quầy thu ngân, phòng họp hoặc tiếp khách hàng tiện lợi.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Camera Wifi thông minh:</strong> Phù hợp cho văn phòng nhỏ, không cần đi dây phức tạp, lưu trữ bằng thẻ nhớ SD, cài đặt và di chuyển vị trí linh hoạt.</span>
                            </li>
                        </ul>
                    </div>
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-primary hover:bg-dark text-white font-bold py-3.5 px-6 rounded-xl transition-all duration-300 text-center uppercase tracking-wider text-xs block">
                        TƯ VẤN CAMERA VĂN PHÒNG
                    </a>
                </div>

                <!-- Factory Column -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-secondary/10 text-secondary rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <h2 class="text-2xl font-black text-gray-900 uppercase">Camera Cho Nhà Xưởng</h2>
                        </div>
                        <div class="w-16 h-1 bg-secondary rounded-full mb-6"></div>
                        <p class="text-gray-500 text-sm mb-8 leading-relaxed">
                            Nhà xưởng, kho bãi có không gian rộng lớn, nhiều bụi bẩn, độ ẩm cao và điều kiện ánh sáng thay đổi. Hệ thống camera nhà xưởng đòi hỏi chuẩn công nghiệp siêu bền, khả năng quét tầm xa, chống nhiễu từ máy móc và lưu trữ lâu dài (từ 30 - 90 ngày).
                        </p>

                        <h4 class="font-extrabold text-gray-900 text-sm mb-4 uppercase tracking-wider">GIẢI PHÁP CAMERA NHÀ XƯỞNG CHUYÊN NGHIỆP:</h4>
                        <ul class="space-y-3.5 mb-8">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Camera Thân Trụ (Bullet):</strong> Tiêu chuẩn kháng nước kháng bụi IP67, vỏ kim loại siêu bền chống chịu va đập và thời tiết khắc nghiệt ngoài trời.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Hồng Ngoại Tầm Xa (EXIR):</strong> Led hồng ngoại thông minh tầm xa từ 30m đến 80m, tự động cân bằng sáng ban đêm để hiển thị hình ảnh đen trắng cực nét.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Đầu ghi NVR & Bộ Lưu Trữ Chuyên Dụng:</strong> Thiết lập ổ cứng Seagate Skyhawk/WD Purple chuyên dùng cho giám sát, đảm bảo an toàn ghi đè dữ liệu liên tục 24/7.</span>
                            </li>
                        </ul>
                    </div>
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-secondary hover:bg-dark text-white font-bold py-3.5 px-6 rounded-xl transition-all duration-300 text-center uppercase tracking-wider text-xs block">
                        TƯ VẤN CAMERA NHÀ XƯỞNG
                    </a>
                </div>
            </div>

            <!-- Detailed 6-Step Installation Process -->
            <div class="bg-white rounded-3xl p-8 md:p-16 border border-gray-100 shadow-sm mb-16">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-primary font-bold text-sm tracking-widest uppercase mb-3 block">QUY TRÌNH THI CÔNG</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase">Quy trình lắp đặt trọn gói của Âu Việt Phát</h2>
                    <div class="w-16 h-1 bg-highlight mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    <!-- Step 1 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            01
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Khảo Sát</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Kỹ thuật viên khảo sát thực tế địa hình văn phòng, kho xưởng để xác định vị trí góc lắp đặt tối ưu.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            02
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Tư Vấn & Báo Giá</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Tư vấn số lượng camera, chủng loại dây truyền dẫn và báo giá trọn gói thiết bị, nhân công đi kèm.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            03
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Đi Dây Gọn Gàng</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Tiến hành chạy dây tín hiệu, dây nguồn vào trong ống nẹp nhựa bọc bảo vệ thẩm mỹ cao, an toàn cháy nổ.</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            04
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Lắp & Cân Chỉnh</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Lắp cố định camera lên trần/tường, tiến hành tinh chỉnh góc quay ống kính theo yêu cầu giám sát.</p>
                    </div>

                    <!-- Step 5 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            05
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Cấu Hình Xem Từ Xa</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Kết nối đầu ghi với Internet, cài ứng dụng trên điện thoại di động và phân quyền mật khẩu bảo mật.</p>
                    </div>

                    <!-- Step 6 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            06
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Bàn Giao</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Hướng dẫn chi tiết cách xem lại sự kiện, xuất video bằng usb và viết phiếu bàn giao nghiệm thu.</p>
                    </div>
                </div>
            </div>

            <!-- Guarantee & CTA Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-stretch mb-16">
                <!-- Left: Commitments card -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <span class="text-primary font-bold text-sm tracking-widest uppercase block mb-3">TẠI SAO CHỌN CHÚNG TÔI?</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 uppercase mb-6">Cam kết chất lượng camera từ Âu Việt Phát</h3>
                        <div class="w-16 h-1 bg-highlight rounded-full mb-6"></div>
                        
                        <div class="space-y-5">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Chất lượng hình ảnh trung thực</h5>
                                    <p class="text-xs text-gray-500 mt-1">Đảm bảo quan sát rõ mặt người, biển số xe trong phạm vi góc quét rộng của camera.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Bảo hành chính hãng 24 tháng</h5>
                                    <p class="text-xs text-gray-500 mt-1">Hỗ trợ đổi mới thiết bị lỗi trong vòng 30 ngày đầu, bảo hành phần cứng hãng 2 năm.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Bảo mật tài khoản dữ liệu riêng tư</h5>
                                    <p class="text-xs text-gray-500 mt-1">Không chia sẻ, lưu giữ tài khoản cloud xem từ xa của khách hàng để đảm bảo quyền lợi bảo mật cao nhất.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Bảo dưỡng hỗ trợ kỹ thuật tận nơi nhanh chóng</h5>
                                    <p class="text-xs text-gray-500 mt-1">Xử lý các sự cố về mất hình camera, không xem được qua điện thoại trong vòng 2-4 tiếng nội thành.</p>
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
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>

                    <h3 class="text-3xl font-black uppercase tracking-tight mb-4 z-10 text-highlight">BẠN CẦN LẮP ĐẶT CAMERA HÔM NAY?</h3>
                    <p class="text-white/90 text-sm leading-relaxed max-w-sm mb-8 z-10 font-medium">
                        Hãy chat trực tiếp Zalo với chúng tôi để lên lịch khảo sát văn phòng hoặc nhà xưởng của bạn ngay trong ngày hôm nay!
                    </p>
                    
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-white text-primary hover:bg-highlight hover:text-dark font-extrabold py-4 px-8 rounded-2xl transition-all duration-300 shadow-xl uppercase tracking-wider text-sm z-10 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.003 21c-5.522 0-9.997-4.477-9.997-10S6.48 1 12.003 1s9.997 4.477 9.997 10-4.475 10-9.997 10zm3.001-11.5h-5.002v-1.2l2.601-3.1h-2.601V4h5.002v1.2l-2.601 3.1h2.601v1.2z"/></svg>
                        Khảo sát & Báo giá Zalo ngay
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

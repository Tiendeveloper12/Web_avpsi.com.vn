@extends('layouts.app')

@section('title', 'Tư Vấn, Thiết Kế & Lắp Đặt Hệ Thống Server Doanh Nghiệp - Âu Việt Phát')
@section('meta_description', 'Giải pháp thiết kế và lắp đặt hệ thống máy chủ (Server), tủ Rack, mạng nội bộ LAN/WAN, thiết lập NAS lưu trữ và phân quyền bảo mật dữ liệu doanh nghiệp từ Âu Việt Phát.')

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
                            <span class="ml-1 text-primary font-medium md:ml-2">Hệ thống server doanh nghiệp</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Hero Section -->
            <div class="bg-gradient-to-br from-primary to-slate-900 rounded-3xl overflow-hidden shadow-2xl mb-16 relative">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                <div class="relative z-10 px-8 py-16 md:p-20 max-w-4xl">
                    <span class="inline-block bg-white/20 text-highlight text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-6 border border-white/10">
                        Giải pháp hạ tầng IT chuyên nghiệp
                    </span>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight uppercase tracking-tight">
                        Hệ Thống Server <br class="hidden md:inline"><span class="text-highlight">Doanh Nghiệp Toàn Diện</span>
                    </h1>
                    <p class="text-white/90 text-lg md:text-xl leading-relaxed mb-8 max-w-2xl font-medium">
                        Tư vấn, khảo sát hạ tầng hiện hữu và thiết kế lắp đặt trọn gói hệ thống máy chủ mạng nội bộ LAN/WAN, thiết lập NAS lưu trữ dữ liệu trung tâm, phân quyền bảo mật Active Directory và các giải pháp ảo hóa tối ưu hiệu suất vận hành doanh nghiệp.
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

            <!-- Highlights / Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-blue-600 font-bold tracking-wider uppercase block mb-1">Thiết bị chính hãng</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Máy Chủ Doanh Nghiệp</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Cung cấp phần cứng Server, Router, Firewall từ Dell PowerEdge, HP Enterprise, Cisco, Synology, DrayTek chính hãng với bảo hành toàn diện.</p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-green-50 text-secondary rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-secondary font-bold tracking-wider uppercase block mb-1">Bảo mật dữ liệu</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Bảo Mật & Phân Quyền</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Phân quyền chi tiết thư mục tài liệu phòng ban, tích hợp cơ chế sao lưu tự động RAID và backup đám mây chống virus mã hóa dữ liệu.</p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-start gap-5 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-yellow-50 text-highlight rounded-2xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0022 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs text-yellow-600 font-bold tracking-wider uppercase block mb-1">Khảo sát hạ tầng</span>
                        <h3 class="font-extrabold text-xl text-gray-900 mb-2">Khảo Sát IT Trực Tiếp</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Đội ngũ kỹ sư mạng (CCNA, MCSA) trực tiếp đo đạc, khảo sát hiện trạng hạ tầng cáp và thiết bị mạng doanh nghiệp hoàn toàn miễn phí.</p>
                    </div>
                </div>
            </div>

            <!-- Two Columns Services: Cabling/Network vs Server/Storage -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
                
                <!-- Infrastructure & Network Column -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-primary/10 text-primary rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
                            </div>
                            <h2 class="text-2xl font-black text-gray-900 uppercase">Hạ Tầng Mạng & Tủ Rack</h2>
                        </div>
                        <div class="w-16 h-1 bg-primary rounded-full mb-6"></div>
                        <p class="text-gray-500 text-sm mb-8 leading-relaxed">
                            Một hệ thống mạng hoạt động ổn định phụ thuộc lớn vào việc thi công hạ tầng cáp và cách đấu nối tủ Rack trung tâm. Chúng tôi thiết kế hệ thống tủ Rack gọn gàng, đi dây cáp mạng Cat6 tiêu chuẩn cao AMP/Commscope và triển khai các thiết bị định tuyến cân bằng tải chuyên dụng.
                        </p>

                        <h4 class="font-extrabold text-gray-900 text-sm mb-4 uppercase tracking-wider">HẠNG MỤC THI CÔNG HẠ TẦNG MẠNG LAN:</h4>
                        <ul class="space-y-3.5 mb-8">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Thi công tủ Rack chuyên nghiệp:</strong> Lắp đặt, sắp xếp Patch Panel, Switch, Router và đi dây gọn gàng, dán nhãn (label) rõ ràng từng port mạng để dễ bảo trì.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Router Cân Bằng Tải & Switch Layer 2/3:</strong> Cấu hình gộp băng thông nhiều đường truyền Internet, định tuyến VLAN chia tách mạng kế toán, khách hàng độc lập.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Phủ sóng Wifi Roaming văn phòng:</strong> Triển khai Access Point thông minh chuẩn AC/AX (Wifi 6) tự động chuyển vùng sóng mượt mà không rớt kết nối.</span>
                            </li>
                        </ul>
                    </div>
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-primary hover:bg-dark text-white font-bold py-3.5 px-6 rounded-xl transition-all duration-300 text-center uppercase tracking-wider text-xs block">
                        TƯ VẤN HẠ TẦNG MẠNG LAN
                    </a>
                </div>

                <!-- Server & NAS Storage Column -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-secondary/10 text-secondary rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>
                            </div>
                            <h2 class="text-2xl font-black text-gray-900 uppercase">Server Vật Lý & Lưu Trữ NAS</h2>
                        </div>
                        <div class="w-16 h-1 bg-secondary rounded-full mb-6"></div>
                        <p class="text-gray-500 text-sm mb-8 leading-relaxed">
                            Máy chủ đóng vai trò quản lý tài nguyên, chạy phần mềm ERP/CRM doanh nghiệp và kiểm soát tập quyền. Thiết bị lưu trữ mạng NAS Synology/QNAP kết hợp đảm bảo toàn bộ dữ liệu nội bộ được đồng bộ hóa và sao lưu an toàn khỏi rủi ro hư hỏng ổ cứng hoặc virus đòi nợ ransomware.
                        </p>

                        <h4 class="font-extrabold text-gray-900 text-sm mb-4 uppercase tracking-wider">HẠNG MỤC MÁY CHỦ & LƯU TRỮ DỮ LIỆU:</h4>
                        <ul class="space-y-3.5 mb-8">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Máy chủ Windows/Linux Server:</strong> Cài đặt cấu hình máy chủ Dell PowerEdge, ảo hóa VMware ESXi / Hyper-V chạy máy chủ Domain Controller Active Directory.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Lưu trữ tập trung NAS Synology:</strong> Thiết lập vùng lưu trữ riêng tư, phân quyền user truy cập chia sẻ folder làm việc, cấu hình VPN Client làm việc từ xa an toàn.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-secondary shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-gray-600 text-sm"><strong class="text-gray-900">Hệ thống Backup tự động 3-2-1:</strong> Cấu hình Snapshot chống virus ransomware, đồng bộ dữ liệu tự động lên đám mây (Cloud Backup) định kỳ.</span>
                            </li>
                        </ul>
                    </div>
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-secondary hover:bg-dark text-white font-bold py-3.5 px-6 rounded-xl transition-all duration-300 text-center uppercase tracking-wider text-xs block">
                        TƯ VẤN SERVER & MÁY CHỦ
                    </a>
                </div>
            </div>

            <!-- Detailed 6-Step Implementation Process -->
            <div class="bg-white rounded-3xl p-8 md:p-16 border border-gray-100 shadow-sm mb-16">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-primary font-bold text-sm tracking-widest uppercase mb-3 block">QUY TRÌNH TRIỂN KHAI</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase">Quy trình thiết kế hệ thống IT doanh nghiệp</h2>
                    <div class="w-16 h-1 bg-highlight mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    <!-- Step 1 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            01
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Khảo Sát</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Đo đạc, vẽ sơ đồ sơ bộ hiện trạng hạ tầng phòng máy, tủ Rack và số lượng người dùng (Users).</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            02
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Thiết Kế</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Thiết kế sơ đồ kết nối mạng logic & vật lý chi tiết, định cấu hình máy chủ, phần mềm phù hợp.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            03
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Ráp Phần Cứng</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Lắp đặt thiết bị vào tủ Rack, chạy dây patch cord, gắn ổ cứng thiết lập cấu hình chạy RAID an toàn.</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            04
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Cài Hệ Thống</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Cài đặt Hypervisor ảo hóa, hệ điều hành Server, cấu hình Domain Controller, thiết lập user/group.</p>
                    </div>

                    <!-- Step 5 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            05
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Test Tải & Backup</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Thử nghiệm các tình huống ổ cứng bị hỏng giả lập, test tốc độ mạng LAN và cấu hình dịch vụ backup tự động.</p>
                    </div>

                    <!-- Step 6 -->
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 text-primary font-black text-2xl rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            06
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm uppercase mb-2">Bàn Giao</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Nghiệm thu hệ thống, bàn giao toàn bộ tài khoản quản trị Admin root, cung cấp tài liệu vận hành sơ đồ mạng.</p>
                    </div>
                </div>
            </div>

            <!-- Guarantee & CTA Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-stretch mb-16">
                <!-- Left: Commitments card -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <span class="text-primary font-bold text-sm tracking-widest uppercase block mb-3">TẠI SAO CHỌN CHÚNG TÔI?</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 uppercase mb-6">Cam kết dịch vụ hạ tầng mạng Âu Việt Phát</h3>
                        <div class="w-16 h-1 bg-highlight rounded-full mb-6"></div>
                        
                        <div class="space-y-5">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Đội ngũ kỹ sư IT trình độ cao</h5>
                                    <p class="text-xs text-gray-500 mt-1">Sở hữu các chứng chỉ chuyên nghiệp của hãng lớn (Cisco CCNA/CCNP, Microsoft MCSA/MCSE, VMware VCP).</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Linh kiện mạng chính hãng & có sẵn</h5>
                                    <p class="text-xs text-gray-500 mt-1">Đảm bảo chỉ sử dụng dây cáp mạng chuẩn đồng 100%, thiết bị mạng & máy chủ Dell, HP chính hãng, có sẵn hàng thay thế.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Bảo mật dữ liệu tuyệt đối & cam kết bảo mật (NDA)</h5>
                                    <p class="text-xs text-gray-500 mt-1">Cam kết tính riêng tư tuyệt đối về dữ liệu kinh doanh của quý doanh nghiệp bằng hợp đồng bảo mật pháp lý.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-900 text-sm">Dịch vụ hỗ trợ sự cố khẩn cấp (Helpdesk)</h5>
                                    <p class="text-xs text-gray-500 mt-1">Túc trực giải quyết sự cố mạng LAN/Server nội bộ bị ngắt kết nối qua Ultraview hoặc đến tận nơi trong vòng 1-2 tiếng.</p>
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
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>
                    </div>

                    <h3 class="text-3xl font-black uppercase tracking-tight mb-4 z-10 text-highlight">HỆ THỐNG MẠNG ĐANG CHẬP CHỜN?</h3>
                    <p class="text-white/90 text-sm leading-relaxed max-w-sm mb-8 z-10 font-medium">
                        Liên hệ trực tiếp với chuyên gia mạng của Âu Việt Phát qua Zalo để nhận được tư vấn, phân tích và lên phương án khắc phục hạ tầng mạng LAN/Server nhanh chóng nhất!
                    </p>
                    
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-white text-primary hover:bg-highlight hover:text-dark font-extrabold py-4 px-8 rounded-2xl transition-all duration-300 shadow-xl uppercase tracking-wider text-sm z-10 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.003 21c-5.522 0-9.997-4.477-9.997-10S6.48 1 12.003 1s9.997 4.477 9.997 10-4.475 10-9.997 10zm3.001-11.5h-5.002v-1.2l2.601-3.1h-2.601V4h5.002v1.2l-2.601 3.1h2.601v1.2z"/></svg>
                        Tư vấn & Lên lịch khảo sát ngay
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

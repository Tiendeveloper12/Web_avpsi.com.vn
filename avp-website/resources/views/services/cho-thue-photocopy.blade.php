@extends('layouts.app')

@section('title', 'Dịch Vụ Cho Thuê Máy Photocopy - Âu Việt Phát')
@section('meta_description', 'Dịch vụ cho thuê máy photocopy siêu tiện lợi của Âu Việt Phát. Không cần mua máy, không tốn tiền mực, khắc phục sự cố chỉ từ 30-60 phút.')

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
                            <span class="ml-1 text-primary font-medium md:ml-2">Cho thuê máy photocopy</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Hero Section -->
            <div class="bg-primary rounded-3xl overflow-hidden shadow-2xl mb-16 relative">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                <div class="relative z-10 px-8 py-16 md:p-20 max-w-4xl">
                    <span class="inline-block bg-white/20 text-highlight text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-6 border border-white/10">
                        Siêu Tiết Kiệm - Siêu Tiện Lợi
                    </span>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight uppercase tracking-tight">
                        Dịch Vụ Cho Thuê <br class="hidden md:inline"><span class="text-highlight">Máy Photocopy</span>
                    </h1>
                    <p class="text-white/90 text-lg md:text-xl leading-relaxed mb-8 max-w-2xl font-medium">
                        Cho thuê, cho mượn máy photocopy hẳn không xa lạ với quý khách. Nhưng về phương thức, giá cả vẫn còn nhiều điều chưa hợp lý. Do đó, chúng tôi đã tính toán và đưa ra phương thức cho mượn máy photocopy siêu tiện lợi và siêu tiết kiệm.
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

            <!-- Core Values / 4 Reasons of Convenience -->
            <div class="bg-white rounded-3xl p-8 md:p-16 border border-gray-100 shadow-sm mb-16">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-secondary font-bold text-sm tracking-widest uppercase mb-3 block">ƯU ĐIỂM NỔI BẬT</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase">Dịch vụ siêu tiện lợi vì những lý do sau</h2>
                    <div class="w-16 h-1 bg-highlight mx-auto mt-4 rounded-full"></div>
                    <p class="text-gray-500 mt-6 text-base">
                        Chúng tôi tối ưu hoá mọi công đoạn, mang đến cho doanh nghiệp của bạn trải nghiệm sử dụng máy in và máy photocopy hoàn toàn thảnh thơi và hiệu quả:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Reason 1 -->
                    <div class="relative group p-8 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-md transition-all duration-300 flex items-start gap-6">
                        <div class="w-12 h-12 bg-primary/10 text-primary font-bold rounded-xl flex items-center justify-center text-lg group-hover:bg-primary group-hover:text-white transition-colors flex-shrink-0">
                            01
                        </div>
                        <div>
                            <h4 class="font-extrabold text-xl text-gray-900 mb-3 uppercase">KHÔNG CẦN MUA MÁY</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Quý công ty không cần đầu tư nguồn vốn ban đầu lớn để mua máy mà vẫn trang bị được cho nhân viên những chiếc <strong class="text-gray-900 font-bold">MÁY IN TỐC ĐỘ CAO – ĐỜI MỚI nhất</strong> trên thị trường.
                            </p>
                        </div>
                    </div>

                    <!-- Reason 2 -->
                    <div class="relative group p-8 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-md transition-all duration-300 flex items-start gap-6">
                        <div class="w-12 h-12 bg-primary/10 text-primary font-bold rounded-xl flex items-center justify-center text-lg group-hover:bg-primary group-hover:text-white transition-colors flex-shrink-0">
                            02
                        </div>
                        <div>
                            <h4 class="font-extrabold text-xl text-gray-900 mb-3 uppercase">KHÔNG TỐN TIỀN MỰC</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Bạn hoàn toàn không cần phải bận tâm và gọi bơm từng hộp mực với giá đắt đỏ từ vài chục tới cả trăm ngàn một hộp nữa. Toàn bộ chi phí mực in đã nằm trọn gói trong dịch vụ.
                            </p>
                        </div>
                    </div>

                    <!-- Reason 3 -->
                    <div class="relative group p-8 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-md transition-all duration-300 flex items-start gap-6">
                        <div class="w-12 h-12 bg-primary/10 text-primary font-bold rounded-xl flex items-center justify-center text-lg group-hover:bg-primary group-hover:text-white transition-colors flex-shrink-0">
                            03
                        </div>
                        <div>
                            <h4 class="font-extrabold text-xl text-gray-900 mb-3 uppercase">KHÔNG PHẢI ĐỢI CHỜ</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Nhất cử lưỡng tiện, không phải chờ kỹ thuật đến bơm mực khi hết. Chúng tôi luôn chuẩn bị sẵn <strong class="text-gray-900 font-bold">hộp mực dự phòng</strong> tại văn phòng quý khách. Máy in tốc độ cao đạt trên <strong class="text-gray-900 font-bold">30 trang/phút</strong> cùng công nghệ in 2 mặt tự động giúp tiết kiệm tối đa thời gian.
                            </p>
                        </div>
                    </div>

                    <!-- Reason 4 -->
                    <div class="relative group p-8 rounded-2xl bg-gray-50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-md transition-all duration-300 flex items-start gap-6">
                        <div class="w-12 h-12 bg-primary/10 text-primary font-bold rounded-xl flex items-center justify-center text-lg group-hover:bg-primary group-hover:text-white transition-colors flex-shrink-0">
                            04
                        </div>
                        <div>
                            <h4 class="font-extrabold text-xl text-gray-900 mb-3 uppercase">KHÔNG LO MÁY HƯ HỎNG</h4>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                Máy và mực đều thuộc sở hữu của chúng tôi, quý khách không cần lo trả phí sửa chữa hay thay thế linh kiện. Khi máy có trục trặc, kỹ thuật viên sẽ lập tức có mặt xử lý hoặc <strong class="text-gray-900 font-bold">đổi máy khác ngay sau 30-60 phút</strong> từ lúc nhận thông báo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Super Saving Calculation & Slogan -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-stretch mb-16">
                <!-- Left: Saving Calculation card -->
                <div class="bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <span class="text-secondary font-bold text-sm tracking-widest uppercase block mb-3">TỐI ƯU CHI PHÍ</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 uppercase mb-6">Giải pháp SIÊU TIẾT KIỆM cho doanh nghiệp</h3>
                        <div class="w-16 h-1 bg-highlight rounded-full mb-6"></div>
                        <p class="text-gray-500 text-base leading-relaxed mb-6">
                            Chỉ cần một bài toán so sánh nhỏ giữa việc tự mua máy (chi phí đầu tư máy, chi phí thay mực, thay trống drum, bảo dưỡng định kỳ) và dịch vụ thuê trọn gói của chúng tôi, quý khách chắc chắn sẽ bất ngờ vì sự <strong class="text-gray-900 font-bold">SIÊU TIẾT KIỆM</strong> mà dịch vụ cho thuê mang lại.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100">
                        <h5 class="font-bold text-gray-900 mb-2 uppercase text-sm">Hỗ trợ tư vấn chi phí miễn phí</h5>
                        <p class="text-xs text-gray-400 mb-4">Chúng tôi giúp bạn phân tích chi phí và đề xuất phương án thuê tối ưu nhất.</p>
                        <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 bg-secondary hover:bg-secondary/95 text-white font-bold px-6 py-3 rounded-xl transition-all duration-300 text-sm shadow-md">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.003 21c-5.522 0-9.997-4.477-9.997-10S6.48 1 12.003 1s9.997 4.477 9.997 10-4.475 10-9.997 10zm3.001-11.5h-5.002v-1.2l2.601-3.1h-2.601V4h5.002v1.2l-2.601 3.1h2.601v1.2z"/></svg>
                            Tính toán chi phí thuê ngay
                        </a>
                    </div>
                </div>

                <!-- Right: Call to action Slogan Block -->
                <div class="bg-gradient-to-br from-primary to-primary-dark rounded-3xl p-8 md:p-12 border border-gray-100 flex flex-col justify-center items-center text-center relative overflow-hidden text-white">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-white/5 rounded-full blur-2xl"></div>
                    
                    <div class="w-20 h-20 bg-highlight text-dark rounded-full flex items-center justify-center shadow-lg shadow-highlight/20 mb-8 z-10 animate-bounce">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    </div>

                    <h3 class="text-3xl font-black uppercase tracking-tight mb-4 z-10 text-highlight">HÃY ĐỂ CHÚNG TÔI PHỤC VỤ BẠN</h3>
                    <p class="text-white/90 text-sm leading-relaxed max-w-sm mb-8 z-10 font-medium">
                        Nhanh tay liên hệ với Âu Việt Phát ngay hôm nay để nhận báo giá thuê máy in, máy photocopy ưu đãi và nhiều phần quà hấp dẫn!
                    </p>
                    
                    <a href="tel:0912979394" class="w-full bg-white text-primary hover:bg-gray-100 font-extrabold py-4 px-8 rounded-2xl transition-all duration-300 shadow-xl uppercase tracking-wider text-sm z-10 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        Gọi điện đặt lịch ngay
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

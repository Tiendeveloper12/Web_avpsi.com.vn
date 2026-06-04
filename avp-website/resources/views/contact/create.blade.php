@extends('layouts.app')

@section('title', 'Liên Hệ Âu Việt Phát - Đội Ngũ Hỗ Trợ Kỹ Thuật & Thiết Bị Văn Phòng')
@section('meta_description', 'Liên hệ với Âu Việt Phát qua hotline, Zalo, email hoặc gửi thông tin yêu cầu tư vấn lắp đặt camera, cho thuê máy photocopy, sửa chữa máy in, máy tính.')

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
                            <span class="ml-1 text-primary font-medium md:ml-2">Liên hệ</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Hero Section -->
            <div class="bg-gradient-to-br from-dark to-slate-900 rounded-3xl overflow-hidden shadow-2xl mb-16 relative">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                <div class="relative z-10 px-8 py-16 md:p-20 max-w-4xl">
                    <span class="inline-block bg-white/10 text-highlight text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-6 border border-white/10">
                        Liên hệ hỗ trợ
                    </span>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight uppercase tracking-tight">
                        Kết Nối Với Chúng Tôi <br class="hidden md:inline"><span class="text-highlight">Âu Việt Phát</span>
                    </h1>
                    <p class="text-gray-300 text-lg md:text-xl leading-relaxed mb-8 max-w-2xl font-medium">
                        Bạn cần tư vấn giải pháp thiết bị văn phòng, dịch vụ cho thuê máy photocopy, sửa chữa thiết bị, thi công hệ thống camera giám sát hay hạ tầng mạng? Đội ngũ kỹ thuật viên chuyên nghiệp của chúng tôi luôn sẵn sàng hỗ trợ bạn nhanh chóng nhất.
                    </p>
                </div>
            </div>

            <!-- Page Wrap: Grid Contact info and Contact Form -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start mb-16">
                
                <!-- Contact Aside Info -->
                <aside class="lg:col-span-5 bg-white rounded-3xl p-8 border border-gray-100 shadow-sm space-y-8">
                    <div>
                        <h2 class="text-2xl font-black text-gray-900 uppercase">Thông tin liên hệ</h2>
                        <div class="w-12 h-1 bg-highlight mt-3 rounded-full"></div>
                    </div>
                    
                    <p class="text-gray-500 leading-relaxed text-sm">
                        Đội ngũ Âu Việt Phát cam kết phản hồi các yêu cầu dịch vụ của bạn trong vòng 30 phút. Quý khách có thể qua trực tiếp văn phòng hoặc liên hệ nhanh qua các kênh dưới đây.
                    </p>

                    <div class="space-y-6">
                        <!-- Addresses -->
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-primary/10 text-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm uppercase">Văn phòng chính</h4>
                                <p class="text-gray-500 text-sm mt-1">3/15 Phan Văn Sửu, P. 13, Q. Tân Bình, TP. Hồ Chí Minh</p>
                            </div>
                        </div>

                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-primary/10 text-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm uppercase">Chi nhánh Hóc Môn / Bình Chánh</h4>
                                <p class="text-gray-500 text-sm mt-1">B11A/5 Ấp 2, Tân Vĩnh Lộc, TP. Hồ Chí Minh</p>
                            </div>
                        </div>

                        <!-- Hotline -->
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-primary/10 text-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm uppercase">Hotline hỗ trợ 24/7</h4>
                                <p class="text-gray-500 text-sm mt-1">0912 97 9394 / 0903 111 052</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-primary/10 text-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm uppercase">Hòm thư điện tử</h4>
                                <p class="text-gray-500 text-sm mt-1">info@avpsi.com.vn / info@avptoner.com.vn</p>
                            </div>
                        </div>

                        <!-- Hours -->
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-primary/10 text-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm uppercase">Giờ làm việc</h4>
                                <p class="text-gray-500 text-sm mt-1">Thứ Hai - Thứ Bảy: 7:45 - 11:45 & 13:00 - 17:00</p>
                            </div>
                        </div>
                    </div>

                    <!-- Map/Visual decoration -->
                    <div class="pt-4">
                        <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full bg-[#facc15] hover:bg-yellow-300 text-dark font-extrabold py-4 px-6 rounded-xl transition-all duration-300 flex items-center justify-center gap-3 shadow-md">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.003 21c-5.522 0-9.997-4.477-9.997-10S6.48 1 12.003 1s9.997 4.477 9.997 10-4.475 10-9.997 10zm3.001-11.5h-5.002v-1.2l2.601-3.1h-2.601V4h5.002v1.2l-2.601 3.1h2.601v1.2z"/></svg>
                            <span>LIÊN HỆ NHANH QUA ZALO</span>
                        </a>
                    </div>
                </aside>

                <!-- Contact Form Section -->
                <div class="lg:col-span-7 bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm">
                    <div>
                        <h3 class="text-2xl font-black text-gray-900 uppercase">Gửi tin nhắn yêu cầu tư vấn</h3>
                        <div class="w-12 h-1 bg-primary mt-3 mb-8 rounded-full"></div>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-8 flex items-center gap-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-8">
                            <div class="flex items-center gap-3 mb-2">
                                <svg class="w-6 h-6 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                <span class="font-bold text-sm">Vui lòng kiểm tra lại các thông tin:</span>
                            </div>
                            <ul class="list-disc pl-8 text-sm space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="/contact" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-bold text-gray-700">Họ và tên <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Ví dụ: Nguyễn Văn A" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm">
                            </div>

                            <div class="space-y-2">
                                <label for="phone" class="block text-sm font-bold text-gray-700">Số điện thoại <span class="text-red-500">*</span></label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Ví dụ: 0912345678" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-bold text-gray-700">Địa chỉ Email <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Ví dụ: hotro@doanhnghiep.com" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm">
                        </div>

                        <div class="space-y-2">
                            <label for="content" class="block text-sm font-bold text-gray-700">Nội dung yêu cầu / Câu hỏi <span class="text-red-500">*</span></label>
                            <textarea id="content" name="content" placeholder="Vui lòng cung cấp chi tiết yêu cầu của bạn để chúng tôi phục vụ tốt nhất..." required rows="6"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm resize-none">{{ old('content') }}</textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full md:w-auto bg-gradient-to-r from-primary to-green-700 hover:from-green-600 hover:to-green-800 text-white font-extrabold px-10 py-4 rounded-xl transition-all duration-300 shadow-lg shadow-primary/20 transform hover:-translate-y-0.5 uppercase tracking-wide">
                                Gửi yêu cầu ngay
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Âu Việt Phát - Laptop, PC, Máy in và Linh kiện máy tính chính hãng')

@section('content')
    <div class="bg-surface py-6">
        <div class="container-custom">
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Left Sidebar: Always on top left -->
                <aside class="lg:w-72 flex-shrink-0">
                    <x-category-sidebar />
                    
                </aside>

                <!-- Right Main Content -->
                <main class="flex-grow flex flex-col gap-8">
                    <!-- Top Banner Carousel -->
                    <x-banner-carousel />
                </main>
            </div>
        </div>
    </div>

    <div class="bg-white border-y border-gray-100 py-10 mb-6">
        <div class="container-custom">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="flex items-center gap-4 group">
                    <div class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04c0 4.833 1.807 9.308 4.618 12.723a11.955 11.955 0 0013.92 0c2.811-3.415 4.618-7.89 4.618-12.723z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-dark text-sm">100% CHÍNH HÃNG</h4>
                        <p class="text-xs text-gray-500">Hoàn tiền nếu phát hiện hàng giả</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 group">
                    <div class="w-12 h-12 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-dark text-sm">BẢO HÀNH TẬN NƠI</h4>
                        <p class="text-xs text-gray-500">Đội ngũ kỹ thuật hỗ trợ 24/7</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 group">
                    <div class="w-12 h-12 rounded-2xl bg-highlight/10 flex items-center justify-center text-highlight group-hover:bg-highlight group-hover:text-dark transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-dark text-sm">GIÁ TỐT THỊ TRƯỜNG</h4>
                        <p class="text-xs text-gray-500">Tiết kiệm chi phí tối đa</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 group">
                    <div class="w-12 h-12 rounded-2xl bg-dark/5 flex items-center justify-center text-dark group-hover:bg-dark group-hover:text-white transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-dark text-sm">GIAO HÀNG SIÊU TỐC</h4>
                        <p class="text-xs text-gray-500">Nội thành trong vòng 2 giờ</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 group">
                    <div class="w-12 h-12 rounded-2xl bg-gray-100 flex items-center justify-center text-gray-600 group-hover:bg-gray-800 group-hover:text-white transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-dark text-sm">HỖ TRỢ TRẢ GÓP</h4>
                        <p class="text-xs text-gray-500">Thủ tục nhanh, lãi suất thấp</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-partners-carousel />



    <!-- Featured Products -->
    <section class="py-16">
        <div class="container-custom">
            <div class="flex items-center justify-between mb-10">
                <div class="flex items-center gap-4">
                    <div class="w-2 h-10 bg-primary rounded-full"></div>
                    <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Sản phẩm nổi bật</h2>
                </div>
                <a href="#" class="group flex items-center gap-2 text-primary font-bold text-sm">
                    Xem tất cả
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- Promotion Section -->
    <section class="py-10">
        <div class="container-custom">
            <div class="bg-secondary rounded-3xl overflow-hidden relative shadow-2xl group">
                <div class="absolute inset-0 opacity-10 pointer-events-none">
                    <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full -translate-y-1/2 translate-x-1/2"></div>
                    <div class="absolute bottom-0 left-0 w-64 h-64 bg-white rounded-full translate-y-1/2 -translate-x-1/2"></div>
                </div>
                <div class="relative z-10 px-12 py-20 flex flex-col md:flex-row items-center justify-between gap-12">
                    <div class="text-white max-w-xl text-center md:text-left">
                        <h2 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">Giải pháp in ấn <br>toàn diện cho doanh nghiệp</h2>
                        <p class="text-lg text-white/80 mb-10 leading-relaxed">Chúng tôi cung cấp hệ thống máy in, mực in AVP chính hãng giúp tối ưu 40% chi phí vận hành doanh nghiệp bạn.</p>
                        <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                            <a href="#" class="bg-white text-primary px-10 py-4 rounded-2xl font-bold hover:bg-highlight hover:text-dark transition-all duration-300 shadow-xl scale-100 active:scale-95">Liên hệ ngay</a>
                            <a href="#" class="border-2 border-white/30 text-white px-10 py-4 rounded-2xl font-bold hover:bg-white/10 transition-all duration-300">Tìm hiểu thêm</a>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-2/5 transform group-hover:rotate-2 transition-transform duration-500">
                        <img src="https://images.unsplash.com/photo-1612815154858-60aa4c59eaa6?auto=format&fit=crop&q=80&w=800" alt="Printer Solution" class="rounded-2xl shadow-2xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-16 bg-white">
        <div class="container-custom">
            <div class="flex items-center justify-between mb-10">
                <div class="flex items-center gap-4">
                    <div class="w-2 h-10 bg-secondary rounded-full"></div>
                    <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Tin tức & Sự kiện</h2>
                </div>
                <a href="#" class="group flex items-center gap-2 text-highlight font-bold text-sm">
                    Xem tất cả bản tin
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($articles as $article)
                    <x-blog-card :article="$article" />
                @endforeach
            </div>
        </div>
    </section>
@endsection
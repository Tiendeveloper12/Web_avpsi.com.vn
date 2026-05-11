@extends('layouts.app')

@section('title', 'Âu Việt Phát - Laptop, PC, Máy in và Linh kiện máy tính chính hãng')

@section('content')
    <!-- Hero Section -->
    <x-hero />

    <!-- Feature Highlights -->
    <section class="py-10 bg-white border-y border-gray-50">
        <div class="container-custom">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="flex items-center gap-4 group">
                    <div class="w-14 h-14 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800">Giao hàng siêu tốc</h4>
                        <p class="text-xs text-gray-500">Nội thành trong 2 giờ</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 group">
                    <div class="w-14 h-14 rounded-2xl bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04c0 4.833 1.807 9.308 4.618 12.723a11.955 11.955 0 0013.92 0c2.811-3.415 4.618-7.89 4.618-12.723z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800">Sản phẩm chính hãng</h4>
                        <p class="text-xs text-gray-500">Cam kết chất lượng 100%</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 group">
                    <div class="w-14 h-14 rounded-2xl bg-highlight/10 flex items-center justify-center text-highlight group-hover:bg-highlight group-hover:text-dark transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800">Hỗ trợ kỹ thuật 24/7</h4>
                        <p class="text-xs text-gray-500">Đội ngũ tay nghề cao</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 group">
                    <div class="w-14 h-14 rounded-2xl bg-dark/5 flex items-center justify-center text-dark group-hover:bg-dark group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800">Giá cả cạnh tranh</h4>
                        <p class="text-xs text-gray-500">Tiết kiệm chi phí tối đa</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-16 bg-surface">
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

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
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
                            <a href="#" class="bg-white text-primary px-10 py-4 rounded-2xl font-bold hover:bg-accent hover:text-white transition-all duration-300 shadow-xl scale-100 active:scale-95">Liên hệ ngay</a>
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
                <a href="#" class="group flex items-center gap-2 text-accent font-bold text-sm">
                    Xem tất cả bài viết
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

    <!-- Partners -->
    <section class="py-16 bg-surface border-t border-gray-100">
        <div class="container-custom">
            <p class="text-center text-gray-400 font-bold uppercase tracking-widest text-xs mb-10">Đối tác tin cậy của chúng tôi</p>
            <div class="flex flex-wrap justify-center items-center gap-12 opacity-40 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-500">
                <span class="text-3xl font-bold">DELL</span>
                <span class="text-3xl font-bold">HP</span>
                <span class="text-3xl font-bold">ASUS</span>
                <span class="text-3xl font-bold">LENOVO</span>
                <span class="text-3xl font-bold">CANON</span>
                <span class="text-3xl font-bold">BROTHER</span>
                <span class="text-3xl font-bold">INTEL</span>
            </div>
        </div>
    </section>
@endsection
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
                        <p class="text-xs text-gray-500">Đội ngũ kỹ thuật chuyên nghiệp và tận tâm</p>
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

            <!-- Product Carousel Component -->
            <div x-data="{ 
                canScrollLeft: false, 
                canScrollRight: true,
                autoplayInterval: null,
                updateScrollState() {
                    const el = this.$refs.carousel;
                    if (!el) return;
                    this.canScrollLeft = el.scrollLeft > 5;
                    this.canScrollRight = el.scrollLeft < (el.scrollWidth - el.clientWidth - 5);
                },
                scroll(direction) {
                    const el = this.$refs.carousel;
                    if (!el) return;
                    const firstCard = el.querySelector(':scope > div');
                    const scrollAmount = firstCard ? (firstCard.getBoundingClientRect().width + 24) : (el.clientWidth * 0.25);
                    el.scrollBy({
                        left: direction === 'left' ? -scrollAmount : scrollAmount,
                        behavior: 'smooth'
                    });
                },
                startAutoplay() {
                    this.stopAutoplay();
                    this.autoplayInterval = setInterval(() => {
                        const el = this.$refs.carousel;
                        if (!el) return;
                        const maxScroll = el.scrollWidth - el.clientWidth;
                        if (el.scrollLeft >= maxScroll - 10) {
                            el.scrollTo({ left: 0, behavior: 'smooth' });
                        } else {
                            this.scroll('right');
                        }
                    }, 3000);
                },
                stopAutoplay() {
                    if (this.autoplayInterval) {
                        clearInterval(this.autoplayInterval);
                        this.autoplayInterval = null;
                    }
                }
            }" x-init="setTimeout(() => { updateScrollState(); startAutoplay(); }, 500)"
               @mouseenter="stopAutoplay()" 
               @mouseleave="startAutoplay()"
               class="relative group">
                
                <!-- Left navigation button -->
                <button x-show="canScrollLeft"
                        @click="scroll('left')"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        class="absolute -left-5 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white shadow-xl hover:bg-primary hover:text-white transition-all flex items-center justify-center text-gray-700 z-10 border border-gray-100 md:opacity-0 md:group-hover:opacity-100 scale-100 duration-300 focus:outline-none"
                        style="display: none;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>

                <!-- Carousel scroll container -->
                <div x-ref="carousel"
                     @scroll="updateScrollState()"
                     class="flex gap-6 overflow-x-auto scrollbar-hide snap-x snap-mandatory py-4 px-1"
                     style="scrollbar-width: none; -ms-overflow-style: none;">
                     
                    @foreach($products as $product)
                                                <div class="snap-start flex-shrink-0 flex flex-col" style="flex: 0 0 calc(25% - 24px);">

                            <x-product-card :product="$product" />
                        </div>
                    @endforeach
                </div>

                <!-- Right navigation button -->
                <button x-show="canScrollRight"
                        @click="scroll('right')"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        class="absolute -right-5 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white shadow-xl hover:bg-primary hover:text-white transition-all flex items-center justify-center text-gray-700 z-10 border border-gray-100 md:opacity-0 md:group-hover:opacity-100 scale-100 duration-300 focus:outline-none"
                        style="display: none;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Office Machines Carousel -->
    <section class="py-16 bg-white border-y border-gray-100">
        <div class="container-custom">
            <div class="flex items-center justify-between mb-10">
                <div class="flex items-center gap-4">
                    <div class="w-2 h-10 bg-secondary rounded-full"></div>
                    <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Thiết bị văn phòng</h2>
                </div>
                <a href="{{ route('category.show', 'thiet-bi-van-phong') }}" class="group flex items-center gap-2 text-secondary font-bold text-sm">
                    Xem tất cả
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div x-data="{ 
                canScrollLeft: false, 
                canScrollRight: true,
                autoplayInterval: null,
                updateScrollState() {
                    const el = this.$refs.carousel;
                    if (!el) return;
                    this.canScrollLeft = el.scrollLeft > 5;
                    this.canScrollRight = el.scrollLeft < (el.scrollWidth - el.clientWidth - 5);
                },
                scroll(direction) {
                    const el = this.$refs.carousel;
                    if (!el) return;
                    const firstCard = el.querySelector(':scope > div');
                    const scrollAmount = firstCard ? (firstCard.getBoundingClientRect().width + 24) : (el.clientWidth * 0.25);
                    el.scrollBy({
                        left: direction === 'left' ? -scrollAmount : scrollAmount,
                        behavior: 'smooth'
                    });
                },
                startAutoplay() {
                    this.stopAutoplay();
                    this.autoplayInterval = setInterval(() => {
                        const el = this.$refs.carousel;
                        if (!el) return;
                        const maxScroll = el.scrollWidth - el.clientWidth;
                        if (el.scrollLeft >= maxScroll - 10) {
                            el.scrollTo({ left: 0, behavior: 'smooth' });
                        } else {
                            this.scroll('right');
                        }
                    }, 3000);
                },
                stopAutoplay() {
                    if (this.autoplayInterval) {
                        clearInterval(this.autoplayInterval);
                        this.autoplayInterval = null;
                    }
                }
            }" x-init="setTimeout(() => { updateScrollState(); startAutoplay(); }, 500)"
               @mouseenter="stopAutoplay()" 
               @mouseleave="startAutoplay()"
               class="relative group">
                
                <!-- Left navigation button -->
                <button x-show="canScrollLeft"
                        @click="scroll('left')"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        class="absolute -left-5 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white shadow-xl hover:bg-secondary hover:text-white transition-all flex items-center justify-center text-gray-700 z-10 border border-gray-100 md:opacity-0 md:group-hover:opacity-100 scale-100 duration-300 focus:outline-none"
                        style="display: none;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>

                <!-- Carousel scroll container -->
                <div x-ref="carousel"
                     @scroll="updateScrollState()"
                     class="flex gap-6 overflow-x-auto scrollbar-hide snap-x snap-mandatory py-4 px-1"
                     style="scrollbar-width: none; -ms-overflow-style: none;">
                     
                    @foreach($officeProducts as $product)
                        <div class="snap-start flex-shrink-0 flex flex-col" style="flex: 0 0 calc(25% - 24px);">
                            <x-product-card :product="$product" />
                        </div>
                    @endforeach
                </div>

                <!-- Right navigation button -->
                <button x-show="canScrollRight"
                        @click="scroll('right')"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        class="absolute -right-5 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white shadow-xl hover:bg-secondary hover:text-white transition-all flex items-center justify-center text-gray-700 z-10 border border-gray-100 md:opacity-0 md:group-hover:opacity-100 scale-100 duration-300 focus:outline-none"
                        style="display: none;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Internet Products Carousel -->
    <section class="py-16 bg-surface">
        <div class="container-custom">
            <div class="flex items-center justify-between mb-10">
                <div class="flex items-center gap-4">
                    <div class="w-2 h-10 bg-primary rounded-full"></div>
                    <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Thiết bị mạng</h2>
                </div>
                <a href="{{ route('category.show', 'thiet-bi-mang') }}" class="group flex items-center gap-2 text-primary font-bold text-sm">
                    Xem tất cả
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div x-data="{ 
                canScrollLeft: false, 
                canScrollRight: true,
                autoplayInterval: null,
                updateScrollState() {
                    const el = this.$refs.carousel;
                    if (!el) return;
                    this.canScrollLeft = el.scrollLeft > 5;
                    this.canScrollRight = el.scrollLeft < (el.scrollWidth - el.clientWidth - 5);
                },
                scroll(direction) {
                    const el = this.$refs.carousel;
                    if (!el) return;
                    const firstCard = el.querySelector(':scope > div');
                    const scrollAmount = firstCard ? (firstCard.getBoundingClientRect().width + 24) : (el.clientWidth * 0.25);
                    el.scrollBy({
                        left: direction === 'left' ? -scrollAmount : scrollAmount,
                        behavior: 'smooth'
                    });
                },
                startAutoplay() {
                    this.stopAutoplay();
                    this.autoplayInterval = setInterval(() => {
                        const el = this.$refs.carousel;
                        if (!el) return;
                        const maxScroll = el.scrollWidth - el.clientWidth;
                        if (el.scrollLeft >= maxScroll - 10) {
                            el.scrollTo({ left: 0, behavior: 'smooth' });
                        } else {
                            this.scroll('right');
                        }
                    }, 3000);
                },
                stopAutoplay() {
                    if (this.autoplayInterval) {
                        clearInterval(this.autoplayInterval);
                        this.autoplayInterval = null;
                    }
                }
            }" x-init="setTimeout(() => { updateScrollState(); startAutoplay(); }, 500)"
               @mouseenter="stopAutoplay()" 
               @mouseleave="startAutoplay()"
               class="relative group">
                
                <!-- Left navigation button -->
                <button x-show="canScrollLeft"
                        @click="scroll('left')"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        class="absolute -left-5 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white shadow-xl hover:bg-primary hover:text-white transition-all flex items-center justify-center text-gray-700 z-10 border border-gray-100 md:opacity-0 md:group-hover:opacity-100 scale-100 duration-300 focus:outline-none"
                        style="display: none;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>

                <!-- Carousel scroll container -->
                <div x-ref="carousel"
                     @scroll="updateScrollState()"
                     class="flex gap-6 overflow-x-auto scrollbar-hide snap-x snap-mandatory py-4 px-1"
                     style="scrollbar-width: none; -ms-overflow-style: none;">
                     
                    @foreach($internetProducts as $product)
                        <div class="snap-start flex-shrink-0 flex flex-col" style="flex: 0 0 calc(25% - 24px);">
                            <x-product-card :product="$product" />
                        </div>
                    @endforeach
                </div>

                <!-- Right navigation button -->
                <button x-show="canScrollRight"
                        @click="scroll('right')"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        class="absolute -right-5 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white shadow-xl hover:bg-primary hover:text-white transition-all flex items-center justify-center text-gray-700 z-10 border border-gray-100 md:opacity-0 md:group-hover:opacity-100 scale-100 duration-300 focus:outline-none"
                        style="display: none;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Hide scrollbars style -->
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endsection
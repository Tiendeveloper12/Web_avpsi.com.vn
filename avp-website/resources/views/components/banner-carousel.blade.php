<div x-data="{ 
    activeSlide: 1, 
    slides: [
        { 
            id: 1, 
            image: '{{ asset('images/banners/banner_photocopy.png') }}',
            title: 'Giải Pháp Photocopy Chuyên Nghiệp',
            subtitle: 'Dịch vụ cho thuê và bán máy photocopy Ricoh chính hãng, hiệu suất cao cho doanh nghiệp.',
            badge: 'SẢN PHẨM MỚI',
            buttonText: 'Chi tiết',
            link: '/category/may-photocopy'
        },
        { 
            id: 2, 
            image: '{{ asset('images/banners/banner_ink.png') }}',
            title: 'Mực In Chính Hãng - Chất Lượng Cao',
            subtitle: 'Cung cấp đầy đủ các loại mực in cho máy HP, Canon, Brother, Ricoh.',
            badge: 'PHỤ KIỆN',
            buttonText: 'Mua ngay',
            link: '/category/muc-in'
        },
        { 
            id: 3, 
            image: '{{ asset('images/banners/banner_printer.png') }}',
            title: 'Máy In Văn Phòng Chuyên Nghiệp',
            subtitle: 'Phân phối các dòng máy in Canon, HP, Brother giá tốt nhất.',
            badge: 'MÁY IN',
            buttonText: 'Mua ngay',
            link: '/category/may-in'
        },
        { 
            id: 4, 
            image: '{{ asset('images/banners/banner_devices.png') }}',
            title: 'Thiết Bị Văn Phòng Hiện Đại',
            subtitle: 'Laptop, PC, Màn hình và giải pháp công nghệ toàn diện cho doanh nghiệp.',
            badge: 'THIẾT BỊ',
            buttonText: 'Mua Ngay',
            link: '/category/may-tinh-de-ban'
        },
        { 
            id: 5, 
            image: '{{ asset('images/banners/banner_accessories.png') }}',
            title: 'Linh Kiện & Phụ Kiện Máy Tính',
            subtitle: 'Chuột, bàn phím, tai nghe và linh kiện nâng cấp chính hãng.',
            badge: 'PHỤ KIỆN',
            buttonText: 'Mua ngay',
            link: '/category/linh-kien-may-tinh'
        }
    ],
    autoPlay() {
        setInterval(() => {
            this.activeSlide = this.activeSlide === this.slides.length ? 1 : this.activeSlide + 1;
        }, 6000);
    }
}" x-init="autoPlay()" class="relative overflow-hidden rounded-xl bg-gray-100 shadow-[0_30px_100px_-15px_rgba(0,0,0,0.25)] h-[480px] lg:h-[600px] border border-gray-100">
    
    <!-- Slides -->
    <template x-for="slide in slides" :key="slide.id">
        <div x-show="activeSlide === slide.id" 
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 transform scale-105"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-1000"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="absolute inset-0 w-full h-full">
            
            <!-- Slide Content (Interactive Group) -->
            <div class="relative w-full h-full flex items-center justify-center overflow-hidden group cursor-pointer">
                <!-- Background Image or Gradient -->
                <template x-if="slide.image">
                    <img :src="slide.image" class="absolute inset-0 w-full h-full object-cover transition-all duration-700 group-hover:scale-105 group-hover:brightness-50">
                </template>
                <template x-if="!slide.image">
                    <div class="absolute inset-0 bg-gradient-to-br from-gray-800 to-dark transition-all duration-700 group-hover:brightness-50"></div>
                </template>

                <!-- Hover Actions -->
                <div class="relative z-10 opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">
                    <a :href="slide.link" class="bg-white text-dark px-12 py-4 rounded-full font-black text-xl shadow-2xl hover:bg-primary hover:text-white transition-all transform hover:scale-110 flex items-center gap-3 uppercase tracking-tighter">
                        <span x-text="slide.buttonText"></span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </template>

    <!-- Navigation Dots -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex gap-3 z-20">
        <template x-for="slide in slides" :key="slide.id">
            <button @click="activeSlide = slide.id" 
                    :class="activeSlide === slide.id ? 'bg-primary w-14' : 'bg-white/40 w-3 hover:bg-white/60'"
                    class="h-3 rounded-full transition-all duration-500 shadow-sm"></button>
        </template>
    </div>

    <!-- Navigation Arrows -->
    <button @click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1" 
            class="absolute left-8 top-1/2 -translate-y-1/2 w-14 h-14 bg-black/5 hover:bg-primary rounded-full flex items-center justify-center text-white/30 hover:text-white transition-all group z-20 border border-white/5 hover:border-white/20">
        <svg class="w-8 h-8 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
    </button>
    <button @click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1" 
            class="absolute right-8 top-1/2 -translate-y-1/2 w-14 h-14 bg-black/5 hover:bg-primary rounded-full flex items-center justify-center text-white/30 hover:text-white transition-all group z-20 border border-white/5 hover:border-white/20">
        <svg class="w-8 h-8 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    </button>

</div>

@php
    $banners = \App\Models\Banner::active()->get();
    $slides = [];
    foreach ($banners as $banner) {
        $slides[] = [
            'id' => $banner->id,
            'image' => asset($banner->image_path),
            'title' => $banner->title,
            'subtitle' => $banner->subtitle ?: '',
            'badge' => $banner->badge ?: '',
            'buttonText' => $banner->button_text ?: 'Mua ngay',
            'link' => $banner->link ?: '#'
        ];
    }
@endphp

<div x-data="{ 
    activeSlide: {{ count($slides) > 0 ? $slides[0]['id'] : 1 }}, 
    slides: {{ json_encode($slides, JSON_UNESCAPED_UNICODE) }},
    autoPlay() {
        if (this.slides.length <= 1) return;
        setInterval(() => {
            const currentIndex = this.slides.findIndex(s => s.id === this.activeSlide);
            const nextIndex = currentIndex === this.slides.length - 1 ? 0 : currentIndex + 1;
            this.activeSlide = this.slides[nextIndex].id;
        }, 6000);
    }
}" x-init="autoPlay()" class="relative overflow-hidden rounded-xl bg-dark shadow-[0_30px_100px_-15px_rgba(0,0,0,0.25)] h-[180px] sm:h-[260px] md:h-[360px] lg:h-[480px] xl:h-[600px] border border-gray-100">
    
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
    <button @click="const currIdx = slides.findIndex(s => s.id === activeSlide); const nextIdx = currIdx === 0 ? slides.length - 1 : currIdx - 1; activeSlide = slides[nextIdx].id" 
            class="absolute left-8 top-1/2 -translate-y-1/2 w-14 h-14 bg-black/5 hover:bg-primary rounded-full flex items-center justify-center text-white/30 hover:text-white transition-all group z-20 border border-white/5 hover:border-white/20">
        <svg class="w-8 h-8 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
    </button>
    <button @click="const currIdx = slides.findIndex(s => s.id === activeSlide); const nextIdx = currIdx === slides.length - 1 ? 0 : currIdx + 1; activeSlide = slides[nextIdx].id" 
            class="absolute right-8 top-1/2 -translate-y-1/2 w-14 h-14 bg-black/5 hover:bg-primary rounded-full flex items-center justify-center text-white/30 hover:text-white transition-all group z-20 border border-white/5 hover:border-white/20">
        <svg class="w-8 h-8 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    </button>

</div>

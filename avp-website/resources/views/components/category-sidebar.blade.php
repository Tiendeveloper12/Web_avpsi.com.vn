<div x-data="{ 
    hoveredCat: null,
    closeTimeout: null,
    openCat(index) {
        clearTimeout(this.closeTimeout);
        this.hoveredCat = index;
    },
    closeCat() {
        this.closeTimeout = setTimeout(() => {
            this.hoveredCat = null;
        }, 100);
    }
}" class="relative z-50">
    <!-- Body Overlay (Dims the page) -->
    <div x-show="hoveredCat !== null" 
         x-transition:enter="transition opacity-100 duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition opacity-0 duration-200"
         class="fixed inset-0 bg-black/40 backdrop-blur-[2px] pointer-events-none z-[-1]"></div>

    <div class="bg-white rounded-xl shadow-premium border border-gray-100 relative">
        <div class="bg-secondary px-5 py-3 text-white font-bold flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            Tất cả danh mục
        </div>
        <ul class="py-2 relative">
            @php
                $categories = \App\Services\CategoryService::getAll();
            @endphp
            @foreach($categories as $index => $cat)
                <li @mouseenter="openCat({{ $index }})" @mouseleave="closeCat()" class="group">
                    <a href="{{ $cat['slug'] === 'dich-vu' ? '/dich-vu' : '/category/' . $cat['slug'] }}" class="flex items-center justify-between px-5 py-3 text-sm text-gray-700 hover:bg-primary/5 hover:text-primary transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <span class="text-lg">{{ $cat['icon'] }}</span>
                            <span class="font-medium">{{ $cat['title'] }}</span>
                        </div>
                        <svg class="w-4 h-4 text-gray-300 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </li>
            @endforeach

            <!-- Global Sub-menu Block (Aligned to top of sidebar) -->
            <template x-for="(cat, index) in {{ json_encode($categories) }}" :key="index">
                <div x-show="hoveredCat === index" 
                     @mouseenter="openCat(index)"
                     @mouseleave="closeCat()"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-x-4"
                     x-transition:enter-end="opacity-100 translate-x-0"
                     class="absolute left-full top-[-48px] ml-4 w-[1000px] min-h-[600px] bg-white shadow-2xl rounded-2xl border border-gray-100 z-50 flex overflow-hidden before:content-[''] before:absolute before:right-full before:top-0 before:bottom-0 before:w-4 before:bg-transparent">
                    
                    <!-- Content Area -->
                    <div class="flex-grow p-12 relative overflow-hidden flex flex-col">
                        
                        <div class="relative z-10">
                            <div class="flex items-center gap-4 mb-8">
                                <span class="text-5xl" x-text="cat.icon"></span>
                                <h3 class="text-4xl font-black text-dark uppercase tracking-tighter" x-text="cat.title"></h3>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-x-12 gap-y-4">
                                <template x-for="sub in cat.subcategories" :key="typeof sub === 'object' ? sub.name : sub">
                                    <a :href="sub.url ? sub.url : '/category/' + cat.slug + '?sub=' + (typeof sub === 'object' ? sub.slug : sub)" class="group/link flex items-center gap-3 text-gray-600 hover:text-primary transition-colors duration-200">
                                        <div class="w-1.5 h-1.5 rounded-full bg-gray-200 group-hover/link:bg-primary group-hover/link:scale-150 transition-all duration-300"></div>
                                        <span class="text-lg font-bold tracking-tight" x-text="typeof sub === 'object' ? sub.name : sub"></span>
                                        <svg class="w-4 h-4 opacity-0 -translate-x-2 group-hover/link:opacity-100 group-hover/link:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                </template>
                            </div>
                        </div>

                        <div class="mt-auto relative z-10 pt-12">
                            <a :href="cat.slug === 'dich-vu' ? '/dich-vu' : '/category/' + cat.slug" class="inline-flex items-center gap-3 bg-dark text-white px-8 py-4 rounded-xl font-bold hover:bg-primary transition-all duration-300 shadow-xl">
                                <span x-text="cat.slug === 'dich-vu' ? 'Xem tất cả dịch vụ' : 'Xem tất cả sản phẩm'"></span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Visual Side (Optional but adds premium feel) -->
                    <div class="w-1/3 bg-gray-50 border-l border-gray-100 flex items-center justify-center p-12 relative overflow-hidden">
                        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                        <div class="relative z-10 text-center">
                            <p class="text-gray-400 font-bold text-xs uppercase tracking-[0.2em] mb-4">Âu Việt Phát</p>
                            <p class="text-dark font-medium text-sm leading-relaxed">Chuyên cung cấp giải pháp thiết bị và linh kiện chính hãng hàng đầu.</p>
                        </div>
                    </div>
                </div>
            </template>
        </ul>
    </div>
</div>

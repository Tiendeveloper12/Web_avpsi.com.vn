@props(['product'])

<div class="card-premium group">
    <div class="relative overflow-hidden aspect-square bg-white p-4">
        <!-- Badges -->
        <div class="absolute top-2 left-2 z-10 flex flex-col gap-1">
            <span class="bg-highlight text-dark text-[10px] font-bold px-2 py-0.5 rounded shadow-sm">MỚI</span>
        </div>
        
        <!-- Image -->
        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/400x400?text=Sản+Phẩm' }}" 
            alt="{{ $product->title }}" 
            class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-110">
        
        <!-- Quick Actions -->
        <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3">
            <button class="bg-white text-primary p-2 rounded-full shadow-md hover:bg-primary hover:text-white transition-all transform translate-y-4 group-hover:translate-y-0 duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            </button>
            <button class="bg-white text-primary p-2 rounded-full shadow-md hover:bg-primary hover:text-white transition-all transform translate-y-4 group-hover:translate-y-0 duration-300 delay-75">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </button>
        </div>
    </div>
    
    <div class="p-4 bg-white">
        <div class="mb-1">
            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Laptop Gaming</span>
        </div>
        <h3 class="text-sm font-bold text-gray-800 line-clamp-2 mb-3 group-hover:text-primary transition-colors min-h-[40px]">
            {{ $product->title }}
        </h3>
        
        <div class="flex items-center gap-2 mb-4">
            <div class="flex text-highlight">
                @for($i = 0; $i < 5; $i++)
                    <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                @endfor
            </div>
            <span class="text-[10px] text-gray-400 font-medium">(24 đánh giá)</span>
        </div>
        
        <div class="flex items-end justify-between">
            <div>
                <p class="text-lg font-extrabold text-primary">{{ number_format($product->sell, 0, ',', '.') }}đ</p>
            </div>
            <button class="bg-secondary/10 text-secondary p-2 rounded-lg hover:bg-secondary hover:text-white transition-all shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            </button>
        </div>
    </div>
</div>

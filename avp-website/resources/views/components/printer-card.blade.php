@props(['printer'])

<div class="bg-white rounded-2xl shadow-premium border border-gray-100 overflow-hidden group hover:border-primary/30 transition-all duration-300">
    <!-- Image -->
    <div class="relative aspect-square p-6 bg-gray-50/50">
        @php
            $imagePath = $printer->image;
            // Only append _480 for the original 5 printer IDs (73-77)
            if (in_array($printer->id, [73, 74, 75, 76, 77])) {
                $imagePath = str_replace('.jpg', '_480.jpg', $imagePath);
            }
        @endphp
        <img src="{{ asset('images/products/' . $imagePath) }}" 
            alt="{{ $printer->title }}" 
            class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-110">
        
        <div class="absolute top-4 left-4">
            <span class="bg-secondary text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">Có sẵn tại kho</span>
        </div>
    </div>

    <!-- Content -->
    <div class="p-6">
        <h3 class="text-lg font-bold text-dark line-clamp-2 mb-2 group-hover:text-primary transition-colors min-h-[56px]">
            {{ $printer->title }}
        </h3>
        
        <div class="flex items-center gap-2 mb-4">
            <div class="flex text-highlight">
                @for($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                @endfor
            </div>
            <span class="text-xs text-gray-400 font-medium">Bán chạy nhất</span>
        </div>

        @php
            $isPhotocopier = str_contains($printer->tags ?? '', 'photocopy');
        @endphp

        <div class="space-y-3">
            @if($isPhotocopier)
                <!-- Simplified Contact Button for Photocopiers -->
                <div class="pt-2">
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full py-3 bg-secondary text-white rounded-lg text-sm font-bold shadow-md hover:bg-dark transition-all transform active:scale-95 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        Liên hệ
                    </a>
                </div>
            @else
                <!-- Buy Option -->
                <div class="p-3 rounded-xl bg-primary/5 border border-primary/10 group/buy transition-colors hover:bg-primary/10">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-xs font-bold text-primary uppercase">Giá Mua</span>
                        <span class="text-lg font-black text-primary">{{ number_format($printer->variant_price, 0, ',', '.') }}đ</span>
                    </div>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $printer->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="redirect_to_cart" value="1">
                        <button type="submit" class="w-full py-2 bg-primary text-white rounded-lg text-sm font-bold shadow-md hover:bg-dark transition-all transform active:scale-95 cursor-pointer">
                            Mua ngay
                        </button>
                    </form>
                </div>

                <!-- Hire Option -->
                <div class="p-3 rounded-xl bg-secondary/5 border border-secondary/10 group/hire transition-colors hover:bg-secondary/10">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-xs font-bold text-secondary uppercase">Thuê Máy</span>
                        <span class="text-lg font-black text-secondary">Liên hệ</span>
                    </div>
                    <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="w-full py-2 bg-secondary text-white rounded-lg text-sm font-bold shadow-md hover:bg-dark transition-all transform active:scale-95 flex items-center justify-center">
                        Đăng ký thuê
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

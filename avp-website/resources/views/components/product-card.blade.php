@props(['product'])

@php
    $isPhotocopy = str_contains($product->tags ?? '', 'photocopy');
    $isInk = str_contains($product->tags ?? '', 'muc');
    $isPrinter = str_contains($product->tags ?? '', 'printer');
    
    $catLabel = 'Sản phẩm';
    $catSlug = 'tat-ca';
    
    if ($isPhotocopy) { $catLabel = 'Máy Photocopy'; $catSlug = 'may-photocopy'; }
    elseif ($isInk) { $catLabel = 'Mực In'; $catSlug = 'muc-in'; }
    elseif ($isPrinter) { $catLabel = 'Máy In'; $catSlug = 'may-in'; }
    elseif (str_contains($product->tags ?? '', 'laptop')) { $catLabel = 'Laptop / Macbook'; $catSlug = 'laptop-macbook'; }

    // Image handling for special printers
    $imagePath = $product->image;
    if (in_array($product->id, [73, 74, 75, 76, 77]) && str_contains($imagePath, '.jpg') && !str_contains($imagePath, '_480')) {
        $imagePath = str_replace('.jpg', '_480.jpg', $imagePath);
    }
@endphp

<div class="card-premium group">
    <div class="relative overflow-hidden aspect-square bg-white p-4">
        <!-- Badges -->
        <div class="absolute top-2 left-2 z-10 flex flex-col gap-1">
            <span class="bg-highlight text-dark text-[10px] font-bold px-2 py-0.5 rounded shadow-sm">MỚI</span>
        </div>
        
        <!-- Image -->
        <a href="/products/{{ $product->id }}" class="block w-full h-full">
            <img src="{{ $product->image ? asset('images/products/' . $imagePath) : 'https://placehold.co/400x400?text=Sản+Phẩm' }}" 
                 alt="{{ $product->title }}" 
                 class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-110">
        </a>
    </div>
    
    <div class="p-4 bg-white">

        <div class="mb-1">
            <a href="/category/{{ $catSlug }}" class="text-[10px] font-bold text-gray-400 uppercase tracking-widest hover:text-primary transition-colors">
                {{ $catLabel }}
            </a>
        </div>
        <h3 class="text-base font-bold text-gray-800 line-clamp-2 group-hover:text-primary transition-colors">
            <a href="/products/{{ $product->id }}">{{ $product->title }}</a>
        </h3>
        @if(isset($product->specs) && $product->specs)
            <div class="mb-3">
                <p class="text-xs text-gray-500 font-medium leading-tight">
                    {{ $product->specs }}
                </p>
            </div>
        @endif
        
        <div class="flex items-center gap-2 mb-4">
            <div class="flex text-highlight">
                @for($i = 0; $i < 5; $i++)
                    <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                @endfor
            </div>
            <span class="text-[10px] text-gray-400 font-medium">Bán chạy nhất</span>
        </div>
        
        <div class="flex items-end justify-between">
            <div>
                @if($isPhotocopy)
                    <p class="text-lg font-extrabold text-secondary uppercase text-sm">Liên hệ</p>
                @else
                    <p class="text-lg font-extrabold text-primary">0.000.000 đ</p>
                @endif
            </div>
            <button class="bg-secondary/10 text-secondary p-2 rounded-lg hover:bg-secondary hover:text-white transition-all shadow-sm">
                @if($isPhotocopy)
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                @else
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                @endif
            </button>
        </div>
    </div>
</div>

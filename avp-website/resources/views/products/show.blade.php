@extends('layouts.app')

@section('title', $product->title . ' - Âu Việt Phát')

@section('content')
    <div class="bg-surface py-8">
        <div class="container-custom">
            <!-- Breadcrumb -->
            <nav class="flex mb-8 text-sm" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/" class="text-gray-500 hover:text-primary transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Trang chủ
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="/products" class="ml-1 text-gray-500 hover:text-primary transition-colors md:ml-2">Sản phẩm</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-primary font-medium md:ml-2 line-clamp-1">{{ $product->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 p-6 md:p-12">
                    <!-- Left: Product Image -->
                    <div class="flex flex-col h-full">
                        <div class="aspect-square bg-gray-50 rounded-2xl p-8 flex items-center justify-center border border-gray-100 overflow-hidden group h-full">
                            @php
                                $detailImagePath = $product->image;
                                if (in_array($product->id, [73, 74, 75, 76, 77]) && str_contains($detailImagePath, '.jpg') && !str_contains($detailImagePath, '_480')) {
                                    $detailImagePath = str_replace('.jpg', '_480.jpg', $detailImagePath);
                                }
                            @endphp
                            <img src="{{ $product->image ? asset('images/products/' . $detailImagePath) : 'https://placehold.co/800x800?text=Sản+Phẩm' }}" 
                                 alt="{{ $product->title }}" 
                                 class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-110">
                        </div>
                    </div>

                    <!-- Right: Product Info -->
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <span class="inline-block bg-primary/10 text-primary text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                                Mới
                            </span>
                        </div>
                        
                        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 leading-tight">
                            {{ $product->title }}
                        </h1>

                        @if(isset($product->specs) && $product->specs)
                            <div class="mb-8">
                                <p class="text-lg text-gray-800 font-bold leading-relaxed">
                                    {{ $product->specs }}
                                </p>
                            </div>
                        @endif

                        <div class="flex items-center gap-4 mb-8">
                            <div class="flex text-highlight">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                @endfor
                            </div>
                            <span class="text-sm text-gray-500 font-medium">| 100+ Đã bán</span>
                        </div>

                        <div class="mb-10">
                            <div class="flex items-baseline gap-4">
                                <p class="text-4xl font-extrabold text-primary">0.000.000đ</p>
                            </div>
                            <p class="text-xs text-gray-400 mt-2 italic">* Giá đã bao gồm thuế VAT</p>

                            @if(isset($product->description) && $product->description)
                                <div class="mt-8">
                                    <p class="text-gray-600 leading-relaxed text-lg">
                                        {{ $product->description }}
                                    </p>
                                </div>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 mt-auto">
                            <button class="flex-grow bg-primary hover:bg-primary-dark text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 shadow-lg shadow-primary/20 flex items-center justify-center gap-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                THÊM VÀO GIỎ HÀNG
                            </button>
                            <button class="bg-secondary hover:bg-secondary/90 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 shadow-lg shadow-secondary/20 flex items-center justify-center gap-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                LIÊN HỆ TƯ VẤN
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Details Tabs -->
                <div class="border-t border-gray-100">
                    <div class="flex border-b border-gray-100">
                        <button class="px-8 py-5 text-sm font-bold text-primary border-b-2 border-primary">Mô tả sản phẩm</button>
                        <button class="px-8 py-5 text-sm font-bold text-gray-500 hover:text-dark transition-colors">Thông số kỹ thuật</button>
                        <button class="px-8 py-5 text-sm font-bold text-gray-500 hover:text-dark transition-colors">Đánh giá (0)</button>
                    </div>
                    <div class="p-6 md:p-12">
                        <div class="prose prose-primary max-w-none">
                            @if(isset($product->description) && $product->description)
                                <div class="mb-10">
                                    <h3 class="text-xl font-bold text-gray-900 mb-4">Tổng quan sản phẩm</h3>
                                    <p class="text-gray-600 leading-relaxed text-lg">
                                        {{ $product->description }}
                                    </p>
                                </div>
                            @endif

                            @if(isset($product->content) && $product->content)
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-4">Chi tiết tính năng</h3>
                                    <div class="text-gray-600 space-y-4">
                                        {!! $product->content !!}
                                    </div>
                                </div>
                            @else
                                <div class="bg-gray-50 rounded-2xl p-10 text-center border-2 border-dashed border-gray-200">
                                    <p class="text-gray-400 font-medium">Đang cập nhật nội dung chi tiết cho sản phẩm này...</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products Placeholder -->
            <div class="mt-16">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-2 h-8 bg-highlight rounded-full"></div>
                    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Sản phẩm tương tự</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                    <div class="bg-white/50 rounded-2xl h-80 border-2 border-dashed border-gray-200 flex items-center justify-center">
                        <p class="text-gray-400 text-sm italic">Hệ thống đang đề xuất sản phẩm...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
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

                        <div class="flex items-center gap-4 mb-6">
                            <div class="flex text-highlight">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= round($avgRating))
                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    @else
                                        <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    @endif
                                @endfor
                            </div>
                            <span class="text-sm text-gray-500 font-medium">({{ $reviewsCount }} đánh giá) | 100+ Đã bán</span>
                        </div>

                        @if(isset($product->description) && $product->description)
                            <div class="mb-8 bg-gray-50 p-6 rounded-2xl border border-gray-100 shadow-sm prose prose-sm max-w-none text-gray-700 leading-relaxed">
                                {!! $product->description !!}
                            </div>
                        @endif

                        <div class="mb-10 border-t border-gray-100 pt-8 sm:pt-10">
                            <div class="flex items-baseline gap-4">
                                @if(str_contains($product->tags ?? '', 'photocopy') || !isset($product->sell) || $product->sell <= 0)
                                    <p class="text-3xl sm:text-4xl font-extrabold text-secondary uppercase">Liên hệ tư vấn</p>
                                @else
                                    <p class="text-4xl font-extrabold text-primary">{{ number_format($product->sell, 0, ',', '.') }}đ</p>
                                @endif
                            </div>
                            @if(!str_contains($product->tags ?? '', 'photocopy') && isset($product->sell) && $product->sell > 0)
                                <p class="text-xs text-gray-400 mt-2 italic">* Giá đã bao gồm thuế VAT</p>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 mt-auto">
                            @if(!str_contains($product->tags ?? '', 'photocopy') && isset($product->sell) && $product->sell > 0)
                                <button onclick="addToCart({{ $product->id }}, this)" class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 shadow-lg shadow-primary/20 flex items-center justify-center gap-2 cursor-pointer">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    <span>THÊM VÀO GIỎ HÀNG</span>
                                </button>
                            @endif
                            <a href="https://zalo.me/0912979394" target="_blank" rel="noopener noreferrer" class="flex-grow bg-secondary hover:bg-secondary/90 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 shadow-lg shadow-secondary/20 flex items-center justify-center gap-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                LIÊN HỆ TƯ VẤN
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Product Details Tabs -->
                <div x-data="{ activeTab: 'description', activeImage: null }" class="border-t border-gray-100">
                    <div class="flex border-b border-gray-100 overflow-x-auto">
                        <button 
                            @click="activeTab = 'description'"
                            :class="activeTab === 'description' ? 'text-primary border-primary border-b-2' : 'text-gray-500 hover:text-dark border-transparent'"
                            class="px-8 py-5 text-sm font-bold transition-all border-b-2 cursor-pointer whitespace-nowrap">
                            Mô tả sản phẩm
                        </button>
                        <button 
                            @click="activeTab = 'specs'"
                            :class="activeTab === 'specs' ? 'text-primary border-primary border-b-2' : 'text-gray-500 hover:text-dark border-transparent'"
                            class="px-8 py-5 text-sm font-bold transition-all border-b-2 cursor-pointer whitespace-nowrap">
                            Thông số kỹ thuật
                        </button>
                        <button 
                            @click="activeTab = 'reviews'"
                            :class="activeTab === 'reviews' ? 'text-primary border-primary border-b-2' : 'text-gray-500 hover:text-dark border-transparent'"
                            class="px-8 py-5 text-sm font-bold transition-all border-b-2 cursor-pointer whitespace-nowrap">
                            Đánh giá ({{ $reviewsCount }})
                        </button>
                    </div>
                    
                    <div class="p-6 md:p-12">
                        <!-- Description Tab -->
                        <div x-show="activeTab === 'description'" class="prose prose-primary max-w-none">
                            @if(isset($product->description) && $product->description)
                                <div class="mb-10 text-gray-600 leading-relaxed text-lg prose max-w-none">
                                    <h3 class="text-xl font-bold text-gray-900 mb-4">Tổng quan sản phẩm</h3>
                                    {!! $product->description !!}
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

                        <!-- Specs Tab -->
                        <div x-show="activeTab === 'specs'" class="text-gray-600 space-y-4" style="display: none;">
                            @if(isset($product->specs) && $product->specs)
                                <div class="bg-white rounded-2xl border border-gray-150 p-6 md:p-8 max-w-3xl">
                                    <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        Thông số kỹ thuật chi tiết
                                    </h3>
                                    <div class="prose max-w-none text-gray-700 leading-relaxed whitespace-pre-line">
                                        {{ $product->specs }}
                                    </div>
                                </div>
                            @else
                                <div class="bg-gray-50 rounded-2xl p-10 text-center border-2 border-dashed border-gray-200">
                                    <p class="text-gray-400 font-medium">Thông số kỹ thuật đang được cập nhật...</p>
                                </div>
                            @endif
                        </div>

                        <!-- Reviews Tab -->
                        <div x-show="activeTab === 'reviews'" class="space-y-12" style="display: none;">
                            <!-- Success Alert -->
                            @if(session('success'))
                                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center gap-3">
                                    <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <p class="font-medium text-sm">{{ session('success') }}</p>
                                </div>
                            @endif

                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                                <!-- Stats Card -->
                                <div class="lg:col-span-4 bg-gray-50 border border-gray-100 rounded-3xl p-6 md:p-8 flex flex-col items-center text-center shadow-sm">
                                    <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Đánh giá trung bình</p>
                                    <p class="text-6xl font-black text-gray-900 mb-3">{{ $avgRating }}</p>
                                    
                                    <div class="flex text-highlight mb-3">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= round($avgRating))
                                                <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                            @else
                                                <svg class="w-6 h-6 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                            @endif
                                        @endfor
                                    </div>
                                    <p class="text-sm text-gray-500 font-medium mb-8">{{ $reviewsCount }} nhận xét từ khách hàng</p>

                                    <!-- Star Distribution Bars -->
                                    <div class="w-full space-y-3">
                                        @for($star = 5; $star >= 1; $star--)
                                            @php
                                                $count = $starDistribution[$star];
                                                $pct = $reviewsCount > 0 ? round(($count / $reviewsCount) * 100) : 0;
                                            @endphp
                                            <div class="flex items-center gap-3 text-sm">
                                                <span class="w-3 font-semibold text-gray-700">{{ $star }}</span>
                                                <span class="text-highlight">★</span>
                                                <div class="flex-grow h-3 bg-gray-200 rounded-full overflow-hidden">
                                                    <div class="h-full bg-highlight rounded-full transition-all duration-500" style="width: {{ $pct }}%"></div>
                                                </div>
                                                <span class="w-10 text-right text-gray-500 font-medium">{{ $pct }}%</span>
                                            </div>
                                        @endfor
                                    </div>
                                </div>

                                <!-- Review Submit Form / List -->
                                <div class="lg:col-span-8 space-y-8">
                                    <!-- Write Review Box -->
                                    <div class="bg-white border border-gray-150 rounded-3xl p-6 md:p-8 shadow-sm">
                                        <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                            Viết đánh giá của bạn
                                        </h3>
                                        
                                        @auth
                                            <form action="{{ route('reviews.store', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                                                @csrf
                                                
                                                <!-- Rating Picker -->
                                                <div x-data="{ rating: 5, hoverRating: 0 }" class="space-y-2">
                                                    <label class="block text-sm font-semibold text-gray-700">Chọn mức đánh giá của bạn <span class="text-red-500">*</span></label>
                                                    <input type="hidden" name="rating" :value="rating">
                                                    <div class="flex items-center gap-1">
                                                        <template x-for="i in 5" :key="i">
                                                            <button type="button" 
                                                                    @click="rating = i" 
                                                                    @mouseenter="hoverRating = i" 
                                                                    @mouseleave="hoverRating = 0"
                                                                    class="text-3xl focus:outline-none transition-colors duration-200 cursor-pointer"
                                                                    :class="(hoverRating || rating) >= i ? 'text-highlight' : 'text-gray-300'">
                                                                ★
                                                            </button>
                                                        </template>
                                                        <span class="ml-4 text-sm font-bold text-gray-600" x-text="
                                                            rating === 5 ? 'Tuyệt vời!' :
                                                            rating === 4 ? 'Rất tốt' :
                                                            rating === 3 ? 'Bình thường' :
                                                            rating === 2 ? 'Tạm ổn' : 'Không thích'
                                                        "></span>
                                                    </div>
                                                </div>

                                                <!-- Review Title -->
                                                <div class="space-y-2">
                                                    <label for="review-title" class="block text-sm font-semibold text-gray-700">Tiêu đề (Tùy chọn)</label>
                                                    <input type="text" name="title" id="review-title" placeholder="Tóm tắt ngắn gọn ý kiến của bạn" 
                                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition text-sm">
                                                </div>

                                                <!-- Review Body -->
                                                <div class="space-y-2">
                                                    <label for="review-body" class="block text-sm font-semibold text-gray-700">Nội dung đánh giá <span class="text-red-500">*</span></label>
                                                    <textarea name="body" id="review-body" rows="4" required placeholder="Chia sẻ cảm nhận, trải nghiệm sử dụng thực tế của sản phẩm này..." 
                                                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition text-sm"></textarea>
                                                </div>

                                                <!-- Photo Upload -->
                                                <div x-data="{ imagePreview: null }" class="space-y-2">
                                                    <label class="block text-sm font-semibold text-gray-700">Đính kèm hình ảnh thực tế (Tùy chọn)</label>
                                                    <div class="flex flex-wrap items-center gap-4">
                                                        <input type="file" name="image" accept="image/*" class="hidden" id="review-image"
                                                               @change="const file = $event.target.files[0]; if (file) { const reader = new FileReader(); reader.onload = (e) => { imagePreview = e.target.result; }; reader.readAsDataURL(file); }">
                                                        <label for="review-image" class="px-4 py-2.5 border border-gray-300 rounded-xl shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 cursor-pointer transition">
                                                            Chọn ảnh
                                                        </label>
                                                        <span class="text-xs text-gray-400">Hỗ trợ JPG, PNG, WEBP. Dung lượng tối đa 2MB.</span>
                                                    </div>
                                                    
                                                    <!-- Image Preview Area -->
                                                    <template x-if="imagePreview">
                                                        <div class="relative w-28 h-28 border border-gray-200 rounded-xl overflow-hidden mt-3 shadow-inner group">
                                                            <img :src="imagePreview" class="w-full h-full object-cover">
                                                            <button type="button" @click="imagePreview = null; document.getElementById('review-image').value = ''" 
                                                                    class="absolute top-1.5 right-1.5 bg-red-600 text-white rounded-full p-1 shadow hover:bg-red-700 transition cursor-pointer">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                            </button>
                                                        </div>
                                                    </template>
                                                </div>

                                                <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-3.5 px-8 rounded-xl transition shadow-lg shadow-primary/10 cursor-pointer">
                                                    GỬI ĐÁNH GIÁ CHỜ DUYỆT
                                                </button>
                                            </form>
                                        @else
                                            <div class="p-6 bg-gray-50 rounded-2xl text-center border border-gray-150">
                                                <p class="text-gray-600 text-sm mb-4 font-medium">Bạn cần đăng nhập tài khoản khách hàng để gửi đánh giá cho sản phẩm này.</p>
                                                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white font-bold py-2.5 px-6 rounded-xl transition text-sm">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                                                    Đăng nhập ngay
                                                </a>
                                            </div>
                                        @endauth
                                    </div>

                                    <!-- Reviews List -->
                                    <div class="space-y-6">
                                        <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                                            <span>Danh sách đánh giá</span>
                                            <span class="px-2 py-0.5 bg-gray-100 text-gray-600 rounded-full text-xs font-semibold">{{ $reviewsCount }}</span>
                                        </h3>

                                        @if($reviews->count() > 0)
                                            <div class="divide-y divide-gray-100">
                                                @foreach($reviews as $review)
                                                    <div class="py-6 first:pt-0 last:pb-0 space-y-3">
                                                        <div class="flex items-center justify-between gap-4">
                                                            <div class="flex items-center gap-3">
                                                                <!-- Avatar Initial -->
                                                                <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold text-sm select-none uppercase">
                                                                    {{ substr($review->user_name ?? 'K', 0, 1) }}
                                                                </div>
                                                                <div>
                                                                    <p class="font-bold text-sm text-gray-900">{{ $review->user_name ?? 'Khách' }}</p>
                                                                    <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y H:i') }}</p>
                                                                </div>
                                                            </div>
                                                            <!-- Review Stars -->
                                                            <div class="flex text-highlight scale-90">
                                                                @for($i = 1; $i <= 5; $i++)
                                                                    @if($i <= $review->rating)
                                                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                                                    @else
                                                                        <svg class="w-4 h-4 fill-current text-gray-200" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                        </div>

                                                        <div class="pl-13 space-y-2">
                                                            @if($review->title)
                                                                <h4 class="font-bold text-sm text-gray-800">{{ $review->title }}</h4>
                                                            @endif
                                                            <p class="text-sm text-gray-600 leading-relaxed">{{ $review->body }}</p>
                                                            
                                                            @if($review->image)
                                                                <div class="pt-2">
                                                                    <img src="{{ asset('images/reviews/' . $review->image) }}" 
                                                                         @click="activeImage = '{{ asset('images/reviews/' . $review->image) }}'"
                                                                         class="w-24 h-24 object-cover rounded-xl border border-gray-150 shadow-sm cursor-pointer hover:opacity-90 hover:scale-[1.02] transition duration-200">
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="py-10 text-center border-2 border-dashed border-gray-100 rounded-2xl">
                                                <p class="text-gray-400 text-sm font-medium">Chưa có đánh giá nào cho sản phẩm này. Hãy là người đầu tiên chia sẻ cảm nhận của bạn!</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lightbox Modal -->
                    <div x-show="activeImage" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80"
                         @click="activeImage = null"
                         style="display: none;">
                        <div class="relative max-w-4xl max-h-[90vh] overflow-hidden" @click.stop>
                            <img :src="activeImage" class="max-w-full max-h-[85vh] object-contain rounded-lg shadow-2xl">
                            <button type="button" @click="activeImage = null" class="absolute top-4 right-4 bg-white/10 hover:bg-white/20 text-white rounded-full p-2 backdrop-blur transition cursor-pointer">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            <div class="mt-16">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-2 h-8 bg-highlight rounded-full"></div>
                    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Sản phẩm khác</h2>
                </div>
                @if($relatedProducts->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                        @foreach($relatedProducts as $related)
                            <x-product-card :product="$related" />
                        @endforeach
                    </div>
                @else
                    <div class="bg-white/50 rounded-2xl h-40 border-2 border-dashed border-gray-200 flex items-center justify-center">
                        <p class="text-gray-400 text-sm italic">Chưa có sản phẩm tương tự.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
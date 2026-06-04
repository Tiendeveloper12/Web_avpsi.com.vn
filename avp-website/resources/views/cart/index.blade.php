@extends('layouts.app')

@section('title', 'Giỏ hàng của bạn - Âu Việt Phát')

@section('content')
    <div class="bg-surface py-12 min-h-[60vh]">
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
                            <span class="ml-1 text-primary font-medium md:ml-2">Giỏ hàng</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="flex items-center gap-4 mb-8">
                <div class="w-2 h-8 bg-primary rounded-full"></div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Giỏ hàng của bạn</h1>
            </div>

            @if(empty($cartItems))
                <!-- Empty Cart State -->
                <div class="bg-white rounded-3xl shadow-premium border border-gray-100 p-16 text-center max-w-2xl mx-auto">
                    <div class="w-24 h-24 rounded-full bg-primary/10 flex items-center justify-center text-primary mx-auto mb-6">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Giỏ hàng trống!</h2>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto">Bạn chưa thêm bất kỳ sản phẩm nào vào giỏ hàng. Hãy tham khảo các sản phẩm chất lượng cao của Âu Việt Phát nhé.</p>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 bg-primary hover:bg-primary/95 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 shadow-lg shadow-primary/20">
                        Tiếp tục mua sắm
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                    <!-- Left: Cart Items List -->
                    <div class="lg:col-span-2 flex flex-col gap-6">
                        <div class="bg-white rounded-3xl shadow-premium border border-gray-100 overflow-hidden">
                            <div class="p-6 md:p-8 divide-y divide-gray-100">
                                @foreach($cartItems as $item)
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6 py-6 first:pt-0 last:pb-0">
                                        <!-- Product Image -->
                                        <div class="w-24 h-24 bg-gray-50 rounded-2xl border border-gray-100 flex-shrink-0 flex items-center justify-center p-2 group overflow-hidden">
                                            @php
                                                $imagePath = $item->product->image;
                                                if (in_array($item->product->id, [73, 74, 75, 76, 77]) && str_contains($imagePath, '.jpg') && !str_contains($imagePath, '_480')) {
                                                    $imagePath = str_replace('.jpg', '_480.jpg', $imagePath);
                                                }
                                            @endphp
                                            <img src="{{ $item->product->image ? asset('images/products/' . $imagePath) : 'https://placehold.co/200x200?text=Sản+Phẩm' }}" 
                                                 alt="{{ $item->product->title }}" 
                                                 class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                                        </div>

                                        <!-- Product Details -->
                                        <div class="flex-grow min-w-0">
                                            <a href="{{ route('products.show', $item->product->id) }}" class="font-bold text-gray-900 hover:text-primary transition-colors text-base line-clamp-2 leading-snug">
                                                {{ $item->product->title }}
                                            </a>
                                            <p class="text-xs text-gray-400 mt-1">ID: {{ $item->product->id }}</p>
                                            <div class="flex items-center gap-4 mt-2">
                                                <span class="text-sm font-semibold text-primary">
                                                    {{ number_format($item->product->sell, 0, ',', '.') }}đ
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Quantity and Subtotal -->
                                        <div class="flex sm:flex-col items-center sm:items-end gap-6 sm:gap-2 w-full sm:w-auto">
                                            <!-- Quantity Controls -->
                                            <div class="flex items-center border border-gray-200 rounded-xl overflow-hidden bg-gray-50">
                                                <form action="{{ route('cart.update') }}" method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                                    <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                                    <button type="submit" class="px-3 py-1.5 text-gray-500 hover:bg-gray-100 transition-colors font-bold text-base">-</button>
                                                </form>
                                                <span class="px-4 py-1 font-bold text-gray-800 text-sm select-none">{{ $item->quantity }}</span>
                                                <form action="{{ route('cart.update') }}" method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                                    <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                                    <button type="submit" class="px-3 py-1.5 text-gray-500 hover:bg-gray-100 transition-colors font-bold text-base">+</button>
                                                </form>
                                            </div>

                                            <div class="flex items-center justify-between sm:justify-start w-full sm:w-auto ml-auto sm:ml-0">
                                                <div class="text-right sm:mr-4">
                                                    <p class="text-xs text-gray-400">Tạm tính</p>
                                                    <p class="font-bold text-gray-900 text-base">
                                                        {{ number_format($item->subtotal, 0, ',', '.') }}đ
                                                    </p>
                                                </div>

                                                <!-- Delete Button -->
                                                <form action="{{ route('cart.remove') }}" method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                                    <button type="submit" class="p-2 rounded-xl text-gray-400 hover:text-red-500 hover:bg-red-50 transition-all duration-200" title="Xóa khỏi giỏ hàng">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Continue Shopping Link -->
                        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-primary hover:text-primary-dark font-bold transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Tiếp tục mua sản phẩm khác
                        </a>
                    </div>

                    <!-- Right: Order Summary & Info Form -->
                    <div class="flex flex-col gap-6 lg:sticky lg:top-24">
                        <!-- Summary Card -->
                        <div class="bg-white rounded-3xl shadow-premium border border-gray-100 p-6 md:p-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-6">Tóm tắt đơn hàng</h3>
                            
                            <div class="space-y-4 pb-6 border-b border-gray-100">
                                <div class="flex justify-between text-sm text-gray-500">
                                    <span>Tổng số lượng</span>
                                    <span class="font-bold text-gray-900">{{ array_sum(array_column($cartItems, 'quantity')) }}</span>
                                </div>
                                <div class="flex justify-between text-sm text-gray-500">
                                    <span>Tạm tính</span>
                                    <span class="font-bold text-gray-900">{{ number_format($total, 0, ',', '.') }}đ</span>
                                </div>
                                <div class="flex justify-between text-sm text-gray-500">
                                    <span>Phí vận chuyển</span>
                                    <span class="text-secondary font-semibold">Miễn phí</span>
                                </div>
                            </div>

                            <div class="pt-6 pb-2">
                                <div class="flex justify-between items-baseline mb-6">
                                    <span class="text-base font-bold text-gray-900">Tổng tiền</span>
                                    <span class="text-2xl font-extrabold text-primary">{{ number_format($total, 0, ',', '.') }}đ</span>
                                </div>
                                <a href="{{ route('cart.checkout') }}" 
                                   class="w-full bg-primary hover:bg-primary-dark text-white font-extrabold py-4 px-8 rounded-2xl transition-all duration-300 shadow-lg shadow-primary/20 flex items-center justify-center gap-2 text-base mt-4 uppercase">
                                    Tiến hành thanh toán
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

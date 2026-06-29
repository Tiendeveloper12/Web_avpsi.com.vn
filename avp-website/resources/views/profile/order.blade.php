@extends('layouts.app')

@section('title', 'Đơn hàng #' . $order->id . ' - Âu Việt Phát')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container-custom">
        
        {{-- Breadcrumbs --}}
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
                        <a href="{{ route('profile.index') }}#orders" class="ml-1 text-gray-500 hover:text-primary transition-colors md:ml-2">Tài khoản của tôi</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-primary font-medium md:ml-2">Đơn hàng #{{ $order->id }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        {{-- Page Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-black text-gray-900">Đơn hàng #{{ $order->id }}</h1>
                <p class="text-sm text-gray-500 mt-1">Ngày đặt: {{ \Carbon\Carbon::parse($order->created_at)->format('H:i — d/m/Y') }}</p>
            </div>
            <a href="{{ route('profile.index') }}#orders" class="inline-flex items-center gap-2 text-sm font-bold text-gray-500 hover:text-primary transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Quay lại lịch sử đơn hàng
            </a>
        </div>

        {{-- Status Badge + Timeline --}}
        @php
            $statusConfig = [
                'pending'    => ['label' => 'Chờ xử lý',      'color' => 'amber',   'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',     'step' => 1],
                'processing' => ['label' => 'Đang xử lý',     'color' => 'blue',    'icon' => 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15', 'step' => 2],
                'shipping'   => ['label' => 'Đang vận chuyển', 'color' => 'indigo',  'icon' => 'M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0', 'step' => 3],
                'completed'  => ['label' => 'Đã hoàn thành',  'color' => 'emerald', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',   'step' => 4],
                'canceled'   => ['label' => 'Đã hủy',         'color' => 'rose',    'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z', 'step' => 0],
            ];
            $current = $statusConfig[$order->status] ?? ['label' => $order->status, 'color' => 'gray', 'icon' => '', 'step' => 0];
            $isCanceled = $order->status === 'canceled';
        @endphp

        {{-- Status Timeline Card --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-8">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex items-center justify-between">
                <h2 class="text-sm font-black text-gray-900 uppercase tracking-wider">Trạng thái đơn hàng</h2>
                <span class="px-3 py-1 text-xs font-bold rounded-full bg-{{ $current['color'] }}-50 text-{{ $current['color'] }}-600 border border-{{ $current['color'] }}-100">
                    {{ $current['label'] }}
                </span>
            </div>

            @if(!$isCanceled)
                <div class="px-6 py-8">
                    <div class="flex items-center justify-between relative">
                        {{-- Progress bar background --}}
                        <div class="absolute top-5 left-0 right-0 h-0.5 bg-gray-200 mx-16"></div>
                        {{-- Progress bar fill --}}
                        @php
                            $progressWidth = match($current['step']) {
                                1 => '0%',
                                2 => '33%',
                                3 => '66%',
                                4 => '100%',
                                default => '0%',
                            };
                        @endphp
                        <div class="absolute top-5 left-0 h-0.5 bg-primary mx-16 transition-all duration-500" style="width: {{ $progressWidth }}"></div>

                        @foreach(['pending' => 'Chờ xử lý', 'processing' => 'Đang xử lý', 'shipping' => 'Đang giao', 'completed' => 'Hoàn thành'] as $stepKey => $stepLabel)
                            @php
                                $stepNum = $statusConfig[$stepKey]['step'];
                                $isActive = $current['step'] >= $stepNum;
                                $isCurrent = $current['step'] === $stepNum;
                            @endphp
                            <div class="flex flex-col items-center relative z-10">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300
                                    {{ $isActive ? 'bg-primary text-white shadow-md shadow-primary/30' : 'bg-gray-100 text-gray-400' }}
                                    {{ $isCurrent ? 'ring-4 ring-primary/20' : '' }}">
                                    @if($isActive && !$isCurrent)
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    @else
                                        {{ $stepNum }}
                                    @endif
                                </div>
                                <span class="text-[11px] font-bold mt-2 {{ $isActive ? 'text-gray-900' : 'text-gray-400' }} text-center whitespace-nowrap">
                                    {{ $stepLabel }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="px-6 py-8 text-center">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-rose-100 text-rose-500 mb-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </div>
                    <p class="text-sm font-bold text-rose-600">Đơn hàng này đã bị hủy</p>
                </div>
            @endif
        </div>

        {{-- Main Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            {{-- Order Items (Left — 2 cols) --}}
            <div class="lg:col-span-8">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                        <h2 class="text-sm font-black text-gray-900 uppercase tracking-wider">Sản phẩm đã mua</h2>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @foreach($items as $item)
                            <div class="flex items-center gap-4 p-5 hover:bg-gray-50/40 transition-colors">
                                {{-- Product image --}}
                                <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0 border border-gray-100">
                                    @if($item->image)
                                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-300">
                                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                {{-- Product info --}}
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-sm font-bold text-gray-900 truncate">{{ $item->title }}</h3>
                                    <p class="text-xs text-gray-400 mt-1">Số lượng: <span class="font-semibold text-gray-600">{{ $item->quantity }}</span></p>
                                </div>
                                {{-- Price --}}
                                <div class="text-right flex-shrink-0">
                                    <p class="text-xs text-gray-400">Đơn giá</p>
                                    <p class="text-sm font-bold text-gray-900">{{ number_format($item->price, 0, ',', '.') }}đ</p>
                                </div>
                                {{-- Subtotal --}}
                                <div class="text-right flex-shrink-0 hidden sm:block">
                                    <p class="text-xs text-gray-400">Thành tiền</p>
                                    <p class="text-sm font-black text-primary">{{ number_format($item->price * $item->quantity, 0, ',', '.') }}đ</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Totals Footer --}}
                    <div class="bg-gray-50/80 border-t border-gray-100 p-6 space-y-3">
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Tạm tính ({{ $items->count() }} sản phẩm)</span>
                            <span class="font-semibold text-gray-700">{{ number_format($order->total_amount, 0, ',', '.') }}đ</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Phí giao hàng</span>
                            <span class="font-semibold text-emerald-600">Miễn phí</span>
                        </div>
                        <hr class="border-gray-200">
                        <div class="flex justify-between items-end">
                            <span class="text-sm font-bold text-gray-700">Tổng thanh toán</span>
                            <span class="text-xl font-black text-primary">{{ number_format($order->total_amount, 0, ',', '.') }}đ</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Customer Info Sidebar (Right — 1 col) --}}
            <div class="lg:col-span-4 space-y-6">

                {{-- Customer Details --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                        <h2 class="text-sm font-black text-gray-900 uppercase tracking-wider">Thông tin nhận hàng</h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Người nhận</p>
                                <p class="text-sm font-bold text-gray-900 mt-0.5">{{ $order->customer_name }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Số điện thoại</p>
                                <p class="text-sm font-bold text-gray-900 mt-0.5">{{ $order->customer_phone }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Email</p>
                                <p class="text-sm font-bold text-gray-900 mt-0.5 break-all">{{ $order->customer_email }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Địa chỉ giao hàng</p>
                                <p class="text-sm font-bold text-gray-900 mt-0.5 leading-relaxed">{{ $order->customer_address }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Customer Note --}}
                @if($order->customer_note)
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                            <h2 class="text-sm font-black text-gray-900 uppercase tracking-wider">Ghi chú</h2>
                        </div>
                        <div class="p-6">
                            <div class="bg-amber-50 border border-amber-100 rounded-xl p-4">
                                <p class="text-sm text-amber-800 leading-relaxed italic">{{ $order->customer_note }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Quick Actions --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                        <h2 class="text-sm font-black text-gray-900 uppercase tracking-wider">Hỗ trợ</h2>
                    </div>
                    <div class="p-6 space-y-3">
                        <a href="{{ route('contact.create') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition-colors group">
                            <div class="w-9 h-9 rounded-lg bg-blue-50 text-blue-500 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Liên hệ hỗ trợ</p>
                                <p class="text-xs text-gray-400">Gửi yêu cầu về đơn hàng</p>
                            </div>
                        </a>
                        <a href="tel:0969009091" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition-colors group">
                            <div class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-100 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Hotline: 0969 009 091</p>
                                <p class="text-xs text-gray-400">Gọi trực tiếp ngay</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection

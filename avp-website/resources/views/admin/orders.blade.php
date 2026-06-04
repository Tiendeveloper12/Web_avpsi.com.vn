@extends('layouts.app')

@section('title', 'Quản Lý Đơn Hàng - Âu Việt Phát')

@section('content')
<div class="bg-gray-50 min-h-screen py-12" x-data="{ activeTab: 'all' }">
    <div class="container-custom">
        
        <!-- Breadcrumbs -->
        <nav class="flex mb-8 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-500 hover:text-primary transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Trang chủ
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-primary font-medium md:ml-2">Quản lý đơn hàng</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Flash Success Notification -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-xl text-emerald-800 flex items-center gap-3 shadow-sm">
                <svg class="w-6 h-6 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div class="text-sm font-semibold">{{ session('success') }}</div>
            </div>
        @endif

        <!-- Page Header & Quick Statistics -->
        <div class="mb-8">
            <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight mb-6">Bảng điều khiển đơn hàng</h1>
            
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Tất cả</p>
                        <h3 class="text-2xl font-black text-gray-900 mt-1">{{ $orders->count() }}</h3>
                    </div>
                    <div class="p-3 bg-gray-50 text-gray-600 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                </div>

                <div class="bg-amber-50/50 p-5 rounded-2xl shadow-sm border border-amber-100/80 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-amber-600/90">Chờ xử lý</p>
                        <h3 class="text-2xl font-black text-amber-700 mt-1">{{ $orders->where('status', 'pending')->count() }}</h3>
                    </div>
                    <div class="p-3 bg-amber-100/50 text-amber-600 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>

                <div class="bg-blue-50/50 p-5 rounded-2xl shadow-sm border border-blue-100/80 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-blue-600/90">Đã xác nhận</p>
                        <h3 class="text-2xl font-black text-blue-700 mt-1">{{ $orders->where('status', 'confirmed')->count() }}</h3>
                    </div>
                    <div class="p-3 bg-blue-100/50 text-blue-600 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>

                <div class="bg-indigo-50/50 p-5 rounded-2xl shadow-sm border border-indigo-100/80 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-indigo-600/90">Đang giao</p>
                        <h3 class="text-2xl font-black text-indigo-700 mt-1">{{ $orders->where('status', 'shipping')->count() }}</h3>
                    </div>
                    <div class="p-3 bg-indigo-100/50 text-indigo-600 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    </div>
                </div>

                <div class="bg-emerald-50/50 p-5 rounded-2xl shadow-sm border border-emerald-100/80 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-emerald-600/90">Hoàn thành</p>
                        <h3 class="text-2xl font-black text-emerald-700 mt-1">{{ $orders->where('status', 'completed')->count() }}</h3>
                    </div>
                    <div class="p-3 bg-emerald-100/50 text-emerald-600 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Tab Buttons -->
        <div class="flex items-center gap-2 border-b border-gray-200 mb-8 overflow-x-auto pb-px">
            <button @click="activeTab = 'all'" 
                    :class="activeTab === 'all' ? 'border-primary text-primary font-bold' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                    class="py-3 px-6 border-b-2 font-medium text-sm transition-all focus:outline-none whitespace-nowrap">
                Tất cả đơn hàng ({{ $orders->count() }})
            </button>
            <button @click="activeTab = 'pending'" 
                    :class="activeTab === 'pending' ? 'border-primary text-primary font-bold' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                    class="py-3 px-6 border-b-2 font-medium text-sm transition-all focus:outline-none whitespace-nowrap">
                Chờ xử lý ({{ $orders->where('status', 'pending')->count() }})
            </button>
            <button @click="activeTab = 'confirmed'" 
                    :class="activeTab === 'confirmed' ? 'border-primary text-primary font-bold' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                    class="py-3 px-6 border-b-2 font-medium text-sm transition-all focus:outline-none whitespace-nowrap">
                Đã xác nhận ({{ $orders->where('status', 'confirmed')->count() }})
            </button>
            <button @click="activeTab = 'shipping'" 
                    :class="activeTab === 'shipping' ? 'border-primary text-primary font-bold' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                    class="py-3 px-6 border-b-2 font-medium text-sm transition-all focus:outline-none whitespace-nowrap">
                Đang giao hàng ({{ $orders->where('status', 'shipping')->count() }})
            </button>
            <button @click="activeTab = 'completed'" 
                    :class="activeTab === 'completed' ? 'border-primary text-primary font-bold' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                    class="py-3 px-6 border-b-2 font-medium text-sm transition-all focus:outline-none whitespace-nowrap">
                Đã hoàn thành ({{ $orders->where('status', 'completed')->count() }})
            </button>
            <button @click="activeTab = 'cancelled'" 
                    :class="activeTab === 'cancelled' ? 'border-primary text-primary font-bold' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                    class="py-3 px-6 border-b-2 font-medium text-sm transition-all focus:outline-none whitespace-nowrap">
                Đã hủy ({{ $orders->where('status', 'cancelled')->count() }})
            </button>
        </div>

        <!-- Orders Lists -->
        <div class="space-y-4">
            @forelse($orders as $order)
                <div x-show="activeTab === 'all' || activeTab === '{{ $order->status }}'"
                     x-data="{ open: false }"
                     class="bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                    
                    <!-- Row Summary -->
                    <div class="p-6 cursor-pointer flex flex-wrap md:flex-nowrap items-center justify-between gap-4 select-none"
                         @click="open = !open">
                        
                        <div class="flex items-center gap-4">
                            <!-- Dropdown trigger status icon -->
                            <div class="p-2.5 rounded-xl transition-colors" 
                                 :class="open ? 'bg-primary/10 text-primary' : 'bg-gray-50 text-gray-400'">
                                <svg class="w-5 h-5 transition-transform duration-300" 
                                     :class="open ? 'rotate-180' : ''"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>

                            <div>
                                <div class="flex items-center gap-3">
                                    <span class="text-sm font-bold text-gray-900">#{{ $order->id }}</span>
                                    <span class="text-xs text-gray-400 font-semibold">{{ \Carbon\Carbon::parse($order->created_at)->format('H:i d/m/Y') }}</span>
                                </div>
                                <h4 class="text-base font-black text-gray-900 mt-0.5">{{ $order->customer_name }}</h4>
                            </div>
                        </div>

                        <!-- Contact information preview -->
                        <div class="hidden lg:block">
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Số điện thoại / Email</p>
                            <p class="text-sm font-bold text-gray-900 mt-0.5">{{ $order->customer_phone }}</p>
                            <p class="text-xs font-medium text-gray-500">{{ $order->customer_email }}</p>
                        </div>

                        <!-- Amount preview -->
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Tổng tiền</p>
                            <p class="text-base font-black text-red-600 mt-0.5">{{ number_format($order->total_amount, 0, ',', '.') }}đ</p>
                        </div>

                        <!-- Order state status label -->
                        <div class="flex items-center gap-4" @click.stop>
                            <div>
                                @switch($order->status)
                                    @case('pending')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full bg-amber-50 text-amber-700 border border-amber-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-600 animate-pulse"></span>
                                            Chờ xử lý
                                        </span>
                                        @break
                                    @case('confirmed')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full bg-blue-50 text-blue-700 border border-blue-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                                            Đã xác nhận
                                        </span>
                                        @break
                                    @case('shipping')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full bg-indigo-50 text-indigo-700 border border-indigo-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-600"></span>
                                            Đang giao hàng
                                        </span>
                                        @break
                                    @case('completed')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                                            Hoàn thành
                                        </span>
                                        @break
                                    @case('cancelled')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full bg-rose-50 text-rose-700 border border-rose-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-600"></span>
                                            Đã hủy
                                        </span>
                                        @break
                                @endswitch
                            </div>

                            <!-- Fast Status Modifier selector dropdown -->
                            <form action="{{ route('admin.orders.update_status', $order->id) }}" method="POST" class="inline-flex items-center">
                                @csrf
                                <select name="status" 
                                        onchange="this.form.submit()" 
                                        class="text-xs bg-gray-50 border border-gray-200 text-gray-700 py-1.5 pl-3 pr-8 rounded-xl font-bold focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary cursor-pointer hover:bg-gray-100 transition-colors">
                                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                                    <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                                    <option value="shipping" {{ $order->status === 'shipping' ? 'selected' : '' }}>Đang giao hàng</option>
                                    <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Hủy đơn hàng</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    <!-- Expandable Details content block -->
                    <div x-show="open" 
                         x-collapse
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         class="border-t border-gray-100 bg-gray-50/50 p-6 space-y-6">
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            
                            <!-- Delivery Information card panel -->
                            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 space-y-3 col-span-1">
                                <h5 class="text-sm font-black text-gray-900 border-b border-gray-100 pb-2 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    Thông tin giao nhận
                                </h5>
                                
                                <div class="space-y-2 text-xs">
                                    <p><strong class="text-gray-500 font-semibold">Tên người nhận:</strong> <span class="text-gray-900 font-bold ml-1">{{ $order->customer_name }}</span></p>
                                    <p><strong class="text-gray-500 font-semibold">Số điện thoại:</strong> <span class="text-gray-900 font-bold ml-1">{{ $order->customer_phone }}</span></p>
                                    <p><strong class="text-gray-500 font-semibold">Email:</strong> <span class="text-gray-900 font-medium ml-1">{{ $order->customer_email }}</span></p>
                                    <p><strong class="text-gray-500 font-semibold">Địa chỉ giao hàng:</strong> <span class="text-gray-900 font-semibold ml-1 block mt-0.5 leading-relaxed">{{ $order->customer_address }}</span></p>
                                </div>
                            </div>

                            <!-- Customer Notes card panel -->
                            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 space-y-3 col-span-1">
                                <h5 class="text-sm font-black text-gray-900 border-b border-gray-100 pb-2 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                    Ghi chú từ khách hàng
                                </h5>
                                <div class="text-xs text-gray-700 leading-relaxed font-medium bg-gray-50 p-3 rounded-xl min-h-[80px]">
                                    {!! nl2br(e($order->customer_note ?? 'Không có ghi chú.')) !!}
                                </div>
                            </div>

                            <!-- Admin Actions state modifiers panel -->
                            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 space-y-4 col-span-1 flex flex-col justify-between">
                                <div>
                                    <h5 class="text-sm font-black text-gray-900 border-b border-gray-100 pb-2 flex items-center gap-2 mb-3">
                                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        Trạng thái & Thao tác
                                    </h5>
                                    
                                    <p class="text-xs text-gray-500 font-semibold mb-2">Chọn trạng thái để lưu thay đổi:</p>
                                    <form action="{{ route('admin.orders.update_status', $order->id) }}" method="POST" class="space-y-3">
                                        @csrf
                                        <div class="grid grid-cols-2 gap-2">
                                            <button type="submit" name="status" value="pending" class="px-3 py-2 rounded-xl text-xs font-bold text-center border transition-all {{ $order->status === 'pending' ? 'bg-amber-600 border-amber-600 text-white shadow-sm' : 'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' }}">Chờ xử lý</button>
                                            <button type="submit" name="status" value="confirmed" class="px-3 py-2 rounded-xl text-xs font-bold text-center border transition-all {{ $order->status === 'confirmed' ? 'bg-blue-600 border-blue-600 text-white shadow-sm' : 'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' }}">Xác nhận</button>
                                            <button type="submit" name="status" value="shipping" class="px-3 py-2 rounded-xl text-xs font-bold text-center border transition-all {{ $order->status === 'shipping' ? 'bg-indigo-600 border-indigo-600 text-white shadow-sm' : 'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' }}">Đang giao</button>
                                            <button type="submit" name="status" value="completed" class="px-3 py-2 rounded-xl text-xs font-bold text-center border transition-all {{ $order->status === 'completed' ? 'bg-emerald-600 border-emerald-600 text-white shadow-sm' : 'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' }}">Hoàn thành</button>
                                        </div>
                                    </form>
                                </div>
                                <form action="{{ route('admin.orders.update_status', $order->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="cancelled">
                                    <button type="submit" class="w-full mt-2 py-2 border border-rose-200 hover:bg-rose-50 text-rose-600 text-xs font-extrabold rounded-xl transition-colors uppercase tracking-wider">
                                        Hủy đơn hàng này
                                    </button>
                                </form>
                            </div>

                        </div>

                        <!-- Order Products listing table -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex items-center justify-between">
                                <h5 class="text-sm font-black text-gray-900 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                    Chi tiết các mặt hàng
                                </h5>
                                <span class="text-xs bg-gray-200 text-gray-700 font-bold px-2.5 py-1 rounded-full">
                                    {{ isset($orderItems[$order->id]) ? $orderItems[$order->id]->count() : 0 }} sản phẩm
                                </span>
                            </div>

                            <div class="divide-y divide-gray-100">
                                @if(isset($orderItems[$order->id]))
                                    @foreach($orderItems[$order->id] as $item)
                                        <div class="p-4 flex items-center justify-between gap-4">
                                            <div class="flex items-center gap-4">
                                                <div class="w-12 h-12 bg-white border border-gray-100 rounded-xl overflow-hidden p-1 flex-shrink-0 flex items-center justify-center">
                                                    <img src="{{ $item->image ? asset('images/products/' . $item->image) : asset('images/placeholder.png') }}" 
                                                         alt="{{ $item->title }}" class="w-full h-full object-contain">
                                                </div>
                                                <div>
                                                    <h6 class="text-sm font-bold text-gray-900 line-clamp-1">{{ $item->title }}</h6>
                                                    <p class="text-xs text-gray-400 mt-0.5">Mã sản phẩm: #{{ $item->product_id }}</p>
                                                </div>
                                            </div>

                                            <div class="flex items-center gap-8 text-right">
                                                <div>
                                                    <p class="text-xs text-gray-400 font-semibold">Đơn giá</p>
                                                    <p class="text-sm font-bold text-gray-900 mt-0.5">{{ number_format($item->price, 0, ',', '.') }}đ</p>
                                                </div>
                                                <div>
                                                    <p class="text-xs text-gray-400 font-semibold">Số lượng</p>
                                                    <p class="text-sm font-black text-gray-900 mt-0.5">x{{ $item->quantity }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-xs text-gray-400 font-semibold">Thành tiền</p>
                                                    <p class="text-sm font-black text-red-600 mt-0.5">{{ number_format($item->price * $item->quantity, 0, ',', '.') }}đ</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="p-6 text-center text-xs text-gray-400 font-medium">Không tìm thấy chi tiết sản phẩm.</div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-12 text-center">
                    <div class="w-16 h-16 bg-gray-50 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <h3 class="text-lg font-black text-gray-900 uppercase">Chưa có đơn hàng nào</h3>
                    <p class="text-sm text-gray-400 mt-2">Hiện tại hệ thống chưa ghi nhận đơn đặt hàng nào từ người dùng.</p>
                </div>
            @endforelse
        </div>

    </div>
</div>
@endsection

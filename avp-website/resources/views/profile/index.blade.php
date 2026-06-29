@extends('layouts.app')

@section('title', 'Tài Khoản Của Tôi - Âu Việt Phát')

@section('content')
<div class="bg-gray-50 min-h-screen py-12" x-data="{ activeTab: window.location.hash === '#orders' ? 'orders' : 'info' }">
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
                        <span class="ml-1 text-primary font-medium md:ml-2">Tài khoản của tôi</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Flash Notification -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-xl text-emerald-800 flex items-center gap-3 shadow-sm">
                <svg class="w-6 h-6 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div class="text-sm font-semibold">{{ session('success') }}</div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-rose-50 border-l-4 border-rose-500 rounded-xl text-rose-800 shadow-sm">
                <div class="flex items-center gap-3 mb-2">
                    <svg class="w-6 h-6 text-rose-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-sm font-bold">Lỗi xử lý thông tin:</span>
                </div>
                <ul class="list-disc list-inside text-xs font-medium space-y-1 ml-9">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Layout Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Sidebar Navigation -->
            <div class="lg:col-span-3 space-y-4">
                <!-- User Card Summary -->
                <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm text-center">
                    <div class="w-20 h-20 bg-primary/10 text-primary font-black rounded-full flex items-center justify-center text-3xl mx-auto mb-4 border border-primary/20">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <h2 class="text-lg font-black text-gray-900 leading-tight">{{ $user->name }}</h2>
                    <p class="text-xs text-gray-400 mt-1 truncate">{{ $user->email }}</p>
                </div>

                <!-- Tabs Menu -->
                <div class="bg-white rounded-2xl border border-gray-100 p-3 shadow-sm flex flex-col gap-1">
                    <button @click="activeTab = 'info'; window.location.hash = ''" 
                            :class="activeTab === 'info' ? 'bg-primary text-white font-bold' : 'text-gray-600 hover:bg-gray-50 hover:text-primary'" 
                            class="w-full text-left px-4 py-3 rounded-xl text-sm flex items-center gap-3 transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Hồ sơ cá nhân
                    </button>
                    <button @click="activeTab = 'orders'; window.location.hash = '#orders'" 
                            :class="activeTab === 'orders' ? 'bg-primary text-white font-bold' : 'text-gray-600 hover:bg-gray-50 hover:text-primary'" 
                            class="w-full text-left px-4 py-3 rounded-xl text-sm flex items-center gap-3 transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        Đơn hàng của tôi
                    </button>
                </div>
            </div>

            <!-- Content Panel -->
            <div class="lg:col-span-9">
                
                <!-- Tab: Profile Info -->
                <div x-show="activeTab === 'info'" class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden" x-transition>
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                        <h2 class="text-sm font-black text-gray-900 uppercase tracking-wider">Thông tin tài khoản</h2>
                    </div>
                    <form action="{{ route('profile.update') }}" method="POST" class="p-6 space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Họ và tên <span class="text-rose-500">*</span></label>
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Địa chỉ Email <span class="text-rose-500">*</span></label>
                                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" placeholder="Ví dụ: 0987654321"
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Địa chỉ mặc định</label>
                                <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}" placeholder="Ví dụ: 3/15 Phan Văn Sửu, P.13, Tân Bình"
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                            </div>
                        </div>

                        <hr class="border-gray-150">

                        <!-- Password Change section -->
                        <div>
                            <h3 class="text-sm font-bold text-gray-800 mb-4">Thay đổi mật khẩu (Bỏ qua nếu không muốn đổi)</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="password" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Mật khẩu mới</label>
                                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu mới"
                                           class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                                </div>
                                <div>
                                    <label for="password_confirmation" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Xác nhận mật khẩu mới</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Xác nhận mật khẩu mới"
                                           class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-2">
                            <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-xl font-bold transition-colors shadow-md text-sm">
                                Cập nhật hồ sơ
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Tab: Order History -->
                <div x-show="activeTab === 'orders'" class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden" x-transition>
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex items-center justify-between">
                        <h2 class="text-sm font-black text-gray-900 uppercase tracking-wider">Lịch sử đơn hàng</h2>
                        <span class="text-xs bg-gray-200 text-gray-600 font-bold px-2 py-0.5 rounded-full">{{ $orders->total() }} Đơn hàng</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50/50 border-b border-gray-100 text-xs font-bold uppercase tracking-wider text-gray-400">
                                    <th class="py-4 px-6">Mã đơn</th>
                                    <th class="py-4 px-6">Ngày mua</th>
                                    <th class="py-4 px-6">Người nhận</th>
                                    <th class="py-4 px-6">Tổng tiền</th>
                                    <th class="py-4 px-6">Trạng thái</th>
                                    <th class="py-4 px-6 text-right">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-sm font-medium text-gray-700">
                                @forelse($orders as $order)
                                    <tr class="hover:bg-gray-50/30 transition-colors">
                                        <td class="py-4 px-6 text-gray-900 font-bold">#{{ $order->id }}</td>
                                        <td class="py-4 px-6 text-xs text-gray-400">
                                            {{ \Carbon\Carbon::parse($order->created_at)->format('H:i d/m/Y') }}
                                        </td>
                                        <td class="py-4 px-6 text-xs font-semibold text-gray-600">
                                            {{ $order->customer_name }}
                                        </td>
                                        <td class="py-4 px-6 font-bold text-gray-900">
                                            {{ number_format($order->total_amount, 0, ',', '.') }}đ
                                        </td>
                                        <td class="py-4 px-6">
                                            @php
                                                $statusColors = [
                                                    'pending' => 'bg-amber-50 text-amber-600 border border-amber-100',
                                                    'processing' => 'bg-blue-50 text-blue-600 border border-blue-100',
                                                    'shipping' => 'bg-indigo-50 text-indigo-600 border border-indigo-100',
                                                    'completed' => 'bg-emerald-50 text-emerald-600 border border-emerald-100',
                                                    'canceled' => 'bg-rose-50 text-rose-600 border border-rose-100',
                                                ];
                                                $statusLabels = [
                                                    'pending' => 'Chờ xử lý',
                                                    'processing' => 'Đang xử lý',
                                                    'shipping' => 'Đang giao',
                                                    'completed' => 'Đã hoàn thành',
                                                    'canceled' => 'Đã hủy',
                                                ];
                                                $class = $statusColors[$order->status] ?? 'bg-gray-50 text-gray-600 border border-gray-100';
                                                $label = $statusLabels[$order->status] ?? $order->status;
                                            @endphp
                                            <span class="px-2.5 py-1 text-xs font-bold rounded-full {{ $class }}">
                                                {{ $label }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-6 text-right">
                                            <a href="{{ route('profile.order', $order->id) }}" class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-12 px-6 text-center text-gray-400 italic">
                                            Bạn chưa đặt đơn hàng nào.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($orders->hasPages())
                        <div class="py-4 px-6 border-t border-gray-100 bg-gray-50/30">
                            {{ $orders->links() }}
                        </div>
                    @endif
                </div>

            </div>

        </div>

    </div>
</div>
@endsection

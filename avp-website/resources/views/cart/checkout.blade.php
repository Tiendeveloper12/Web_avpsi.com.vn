@extends('layouts.app')

@section('title', 'Thanh toán đơn hàng - Âu Việt Phát')

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
                            <a href="{{ route('cart.index') }}" class="ml-1 text-gray-500 hover:text-primary transition-colors md:ml-2">Giỏ hàng</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-primary font-medium md:ml-2">Thanh toán</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="flex items-center gap-4 mb-8">
                <div class="w-2 h-8 bg-primary rounded-full"></div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Thanh toán đơn hàng</h1>
            </div>

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-3xl mb-8 max-w-4xl">
                    <div class="flex items-center gap-3 mb-2">
                        <svg class="w-6 h-6 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <span class="font-bold text-sm">Vui lòng kiểm tra lại thông tin:</span>
                    </div>
                    <ul class="list-disc pl-8 text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('cart.place_order') }}" method="POST" x-data="addressSelector()" class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                @csrf
                
                <!-- Left: Customer Checkout Form -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-3xl shadow-premium border border-gray-100 p-6 md:p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Thông tin giao hàng
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-gray-700">Họ và tên <span class="text-primary">*</span></label>
                                <input type="text" name="customer_name" x-model="customerName" required placeholder="Nhập họ và tên người nhận" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm">
                            </div>

                            <!-- Phone -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-gray-700">Số điện thoại <span class="text-primary">*</span></label>
                                <input type="tel" name="customer_phone" x-model="customerPhone" required placeholder="Nhập số điện thoại nhận hàng" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm">
                            </div>
                        </div>

                        <!-- Email (New Field Added) -->
                        <div class="space-y-2 mt-6">
                            <label class="block text-sm font-bold text-gray-700">Địa chỉ Email <span class="text-primary">*</span></label>
                            <input type="email" name="customer_email" required value="{{ Auth::check() ? Auth::user()->email : old('customer_email') }}" placeholder="Nhập email của bạn (Ví dụ: customer@example.com)" 
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm">
                        </div>

                        <!-- Address Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <!-- Province -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-gray-700">Tỉnh / Thành phố <span class="text-primary">*</span></label>
                                <select x-model="selectedProvince" @change="onProvinceChange()" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm bg-white">
                                    <option value="">Chọn Tỉnh / Thành phố</option>
                                    <template x-for="prov in provinces" :key="prov.Id">
                                        <option :value="prov.Name" x-text="prov.Name"></option>
                                    </template>
                                </select>
                            </div>

                            <!-- District -->
                            <div class="space-y-2" x-show="selectedProvince !== 'Thành phố Hồ Chí Minh'">
                                <label class="block text-sm font-bold text-gray-700">Quận / Huyện <span class="text-primary">*</span></label>
                                <select x-model="selectedDistrict" @change="onDistrictChange()" :disabled="!selectedProvince || selectedProvince === 'Thành phố Hồ Chí Minh'" :required="selectedProvince !== 'Thành phố Hồ Chí Minh'" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm bg-white disabled:opacity-50 disabled:bg-gray-50">
                                    <option value="">Chọn Quận / Huyện</option>
                                    <template x-for="dist in districtsList" :key="dist.Id">
                                        <option :value="dist.Name" x-text="dist.Name"></option>
                                    </template>
                                </select>
                            </div>

                            <!-- Ward -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-gray-700">Phường / Xã <span class="text-primary">*</span></label>
                                <select x-model="selectedWard" :disabled="selectedProvince === 'Thành phố Hồ Chí Minh' ? !selectedProvince : !selectedDistrict" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm bg-white disabled:opacity-50 disabled:bg-gray-50">
                                    <option value="">Chọn Phường / Xã</option>
                                    <template x-for="ward in currentWardsList" :key="ward.Id">
                                        <option :value="ward.Name" x-text="ward.Name"></option>
                                    </template>
                                </select>
                            </div>

                            <!-- Street -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-gray-700">Số nhà, tên đường <span class="text-primary">*</span></label>
                                <input type="text" x-model="streetAddress" placeholder="Ví dụ: 3/15 Phan Văn Sửu" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm">
                            </div>
                        </div>

                        <!-- Full Address String Hidden Field for Backend compatibility -->
                        <input type="hidden" name="customer_address" :value="fullAddress" required>

                        <!-- Interactive Address Preview -->
                        <div x-show="fullAddress" x-transition class="bg-gray-50 p-4 rounded-2xl border border-gray-100 text-xs text-gray-600 space-y-1 mt-6">
                            <span class="font-bold text-gray-900 block">Xem trước địa chỉ giao hàng:</span>
                            <span class="text-primary font-medium" x-text="fullAddress"></span>
                        </div>

                        <!-- Note -->
                        <div class="space-y-2 mt-6">
                            <label class="block text-sm font-bold text-gray-700">Ghi chú giao hàng (Tùy chọn)</label>
                            <textarea name="customer_note" rows="3" placeholder="Ví dụ: Chỉ giao giờ hành chính, gọi điện trước khi giao..." 
                                      class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm resize-none"></textarea>
                        </div>
                    </div>

                    <!-- Products Review in Checkout -->
                    <div class="bg-white rounded-3xl shadow-premium border border-gray-100 p-6 md:p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            Kiểm tra sản phẩm đã chọn
                        </h3>
                        <div class="divide-y divide-gray-100">
                            @foreach($cartItems as $item)
                                <div class="flex items-center gap-4 py-4 first:pt-0 last:pb-0">
                                    <div class="w-16 h-16 bg-gray-50 rounded-xl border border-gray-100 flex-shrink-0 flex items-center justify-center p-1">
                                        <img src="{{ $item->product->image ? asset('images/products/' . $item->product->image) : 'https://placehold.co/100x100?text=Sản+Phẩm' }}" 
                                             alt="{{ $item->product->title }}" 
                                             class="w-full h-full object-contain">
                                    </div>
                                    <div class="flex-grow min-w-0">
                                        <h4 class="font-bold text-gray-900 text-sm line-clamp-1 leading-snug">{{ $item->product->title }}</h4>
                                        <p class="text-xs text-gray-400 mt-0.5">Số lượng: <span class="font-semibold text-gray-900">{{ $item->quantity }}</span></p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-gray-900 text-sm">{{ number_format($item->subtotal, 0, ',', '.') }}đ</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right: Checkout Summary & Place Order Button -->
                <div class="space-y-6">
                    <div class="bg-white rounded-3xl shadow-premium border border-gray-100 p-6 md:p-8 sticky top-24">
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

                        <div class="pt-6">
                            <div class="flex justify-between items-baseline mb-6">
                                <span class="text-base font-bold text-gray-900">Tổng tiền thanh toán</span>
                                <span class="text-2xl font-extrabold text-primary">{{ number_format($total, 0, ',', '.') }}đ</span>
                            </div>
                            
                            <button type="submit" 
                                    class="w-full bg-primary hover:bg-primary-dark text-white font-extrabold py-4 px-8 rounded-2xl transition-all duration-300 shadow-lg shadow-primary/20 flex items-center justify-center gap-2 text-base uppercase">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Đặt hàng ngay
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('addressSelector', () => ({
                provinces: [],
                customerName: '{{ Auth::check() ? Auth::user()->name : "" }}',
                customerPhone: '{{ Auth::check() ? Auth::user()->phone : "" }}',
                selectedProvince: '',
                selectedDistrict: '',
                selectedWard: '',
                streetAddress: '{{ Auth::check() ? Auth::user()->address : "" }}',
                hcmcWards: [
                    { Id: "hcm-1", Name: "Phường Sài Gòn" },
                    { Id: "hcm-2", Name: "Phường Tân Định" },
                    { Id: "hcm-3", Name: "Phường Bến Thành" },
                    { Id: "hcm-4", Name: "Phường Cầu Ông Lãnh" },
                    { Id: "hcm-5", Name: "Phường Bàn Cờ" },
                    { Id: "hcm-6", Name: "Phường Xuân Hòa" },
                    { Id: "hcm-7", Name: "Phường Nhiêu Lộc" },
                    { Id: "hcm-8", Name: "Phường Xóm Chiếu" },
                    { Id: "hcm-9", Name: "Phường Khánh Hội" },
                    { Id: "hcm-10", Name: "Phường Vĩnh Hội" },
                    { Id: "hcm-11", Name: "Phường Chợ Quán" },
                    { Id: "hcm-12", Name: "Phường An Đông" },
                    { Id: "hcm-13", Name: "Phường Chợ Lớn" },
                    { Id: "hcm-14", Name: "Phường Bình Tây" },
                    { Id: "hcm-15", Name: "Phường Bình Tiên" },
                    { Id: "hcm-16", Name: "Phường Bình Phú" },
                    { Id: "hcm-17", Name: "Phường Phú Lâm" },
                    { Id: "hcm-18", Name: "Phường Tân Thuận" },
                    { Id: "hcm-19", Name: "Phường Phú Thuận" },
                    { Id: "hcm-20", Name: "Phường Tân Mỹ" },
                    { Id: "hcm-21", Name: "Phường Tân Hưng" },
                    { Id: "hcm-22", Name: "Phường Chánh Hưng" },
                    { Id: "hcm-23", Name: "Phường Phú Định" },
                    { Id: "hcm-24", Name: "Phường Bình Đông" },
                    { Id: "hcm-25", Name: "Phường Diên Hồng" },
                    { Id: "hcm-26", Name: "Phường Vườn Lài" },
                    { Id: "hcm-27", Name: "Phường Hòa Hưng" },
                    { Id: "hcm-28", Name: "Phường Minh Phụng" },
                    { Id: "hcm-29", Name: "Phường Bình Thới" },
                    { Id: "hcm-30", Name: "Phường Hòa Bình" },
                    { Id: "hcm-31", Name: "Phường Phú Thọ" },
                    { Id: "hcm-32", Name: "Phường Đông Hưng Thuận" },
                    { Id: "hcm-33", Name: "Phường Trung Mỹ Tây" },
                    { Id: "hcm-34", Name: "Phường Tân Thới Hiệp" },
                    { Id: "hcm-35", Name: "Phường Thới An" },
                    { Id: "hcm-36", Name: "Phường An Phú Đông" },
                    { Id: "hcm-37", Name: "Phường An Lạc" },
                    { Id: "hcm-38", Name: "Phường Bình Tân" },
                    { Id: "hcm-39", Name: "Phường Tân Tạo" },
                    { Id: "hcm-40", Name: "Phường Bình Trị Đông" },
                    { Id: "hcm-41", Name: "Phường Bình Hưng Hòa" },
                    { Id: "hcm-42", Name: "Phường Gia Định" },
                    { Id: "hcm-43", Name: "Phường Bình Thạnh" },
                    { Id: "hcm-44", Name: "Phường Bình Lợi Trung" },
                    { Id: "hcm-45", Name: "Phường Thạnh Mỹ Tây" },
                    { Id: "hcm-46", Name: "Phường Bình Quới" },
                    { Id: "hcm-47", Name: "Phường Hạnh Thông" },
                    { Id: "hcm-48", Name: "Phường An Nhơn" },
                    { Id: "hcm-49", Name: "Phường Gò Vấp" },
                    { Id: "hcm-50", Name: "Phường An Hội Đông" },
                    { Id: "hcm-51", Name: "Phường Thông Tây Hội" },
                    { Id: "hcm-52", Name: "Phường An Hội Tây" },
                    { Id: "hcm-53", Name: "Phường Đức Nhuận" },
                    { Id: "hcm-54", Name: "Phường Cầu Kiệu" },
                    { Id: "hcm-55", Name: "Phường Phú Nhuận" },
                    { Id: "hcm-56", Name: "Phường Tân Sơn Hòa" },
                    { Id: "hcm-57", Name: "Phường Tân Sơn Nhất" },
                    { Id: "hcm-58", Name: "Phường Tân Hòa" },
                    { Id: "hcm-59", Name: "Phường Bảy Hiền" },
                    { Id: "hcm-60", Name: "Phường Tân Bình" },
                    { Id: "hcm-61", Name: "Phường Tân Sơn" },
                    { Id: "hcm-62", Name: "Phường Tây Thạnh" },
                    { Id: "hcm-63", Name: "Phường Tân Sơn Nhì" },
                    { Id: "hcm-64", Name: "Phường Phú Thọ Hòa" },
                    { Id: "hcm-65", Name: "Phường Tân Phú" },
                    { Id: "hcm-66", Name: "Phường Phú Thạnh" },
                    { Id: "hcm-67", Name: "Phường Hiệp Bình" },
                    { Id: "hcm-68", Name: "Phường Thủ Đức" },
                    { Id: "hcm-69", Name: "Phường Tam Bình" },
                    { Id: "hcm-70", Name: "Phường Linh Xuân" },
                    { Id: "hcm-71", Name: "Phường Tăng Nhơn Phú" },
                    { Id: "hcm-72", Name: "Phường Long Bình" },
                    { Id: "hcm-73", Name: "Phường Long Phước" },
                    { Id: "hcm-74", Name: "Phường Long Trường" },
                    { Id: "hcm-75", Name: "Phường Cát Lái" },
                    { Id: "hcm-76", Name: "Phường Bình Trưng" },
                    { Id: "hcm-77", Name: "Phường Phước Long" },
                    { Id: "hcm-78", Name: "Phường An Khánh" },
                    { Id: "hcm-79", Name: "Phường Đông Hòa" },
                    { Id: "hcm-80", Name: "Phường Dĩ An" },
                    { Id: "hcm-81", Name: "Phường Tân Đông Hiệp" },
                    { Id: "hcm-82", Name: "Phường An Phú" },
                    { Id: "hcm-83", Name: "Phường Bình Hòa" },
                    { Id: "hcm-84", Name: "Phường Lái Thiêu" },
                    { Id: "hcm-85", Name: "Phường Thuận An" },
                    { Id: "hcm-86", Name: "Phường Thuận Giao" },
                    { Id: "hcm-87", Name: "Phường Thủ Dầu Một" },
                    { Id: "hcm-88", Name: "Phường Phú Lợi" },
                    { Id: "hcm-89", Name: "Phường Chánh Hiệp" },
                    { Id: "hcm-90", Name: "Phường Bình Dương" },
                    { Id: "hcm-91", Name: "Phường Hòa Lợi" },
                    { Id: "hcm-92", Name: "Phường Phú An" },
                    { Id: "hcm-93", Name: "Phường Tây Nam" },
                    { Id: "hcm-94", Name: "Phường Long Nguyên" },
                    { Id: "hcm-95", Name: "Phường Bến Cát" },
                    { Id: "hcm-96", Name: "Phường Chánh Phú Hòa" },
                    { Id: "hcm-97", Name: "Phường Vĩnh Tân" },
                    { Id: "hcm-98", Name: "Phường Bình Cơ" },
                    { Id: "hcm-99", Name: "Phường Tân Uyên" },
                    { Id: "hcm-100", Name: "Phường Tân Hiệp" },
                    { Id: "hcm-101", Name: "Phường Tân Khánh" },
                    { Id: "hcm-102", Name: "Phường Vũng Tàu" },
                    { Id: "hcm-103", Name: "Phường Tam Thắng" },
                    { Id: "hcm-104", Name: "Phường Rạch Dừa" },
                    { Id: "hcm-105", Name: "Phường Phước Thắng" },
                    { Id: "hcm-106", Name: "Phường Long Hương" },
                    { Id: "hcm-107", Name: "Phường Bà Rịa" },
                    { Id: "hcm-108", Name: "Phường Tam Long" },
                    { Id: "hcm-109", Name: "Phường Tân Hải" },
                    { Id: "hcm-110", Name: "Phường Tân Phước" },
                    { Id: "hcm-111", Name: "Phường Phú Mỹ" },
                    { Id: "hcm-112", Name: "Phường Tân Thành" },
                    { Id: "hcm-113", Name: "Xã Vĩnh Lộc" },
                    { Id: "hcm-114", Name: "Xã Tân Vĩnh Lộc" },
                    { Id: "hcm-115", Name: "Xã Bình Lợi" },
                    { Id: "hcm-116", Name: "Xã Tân Nhựt" },
                    { Id: "hcm-117", Name: "Xã Bình Chánh" },
                    { Id: "hcm-118", Name: "Xã Hưng Long" },
                    { Id: "hcm-119", Name: "Xã Bình Hưng" },
                    { Id: "hcm-120", Name: "Xã Bình Khánh" },
                    { Id: "hcm-121", Name: "Xã An Thới Đông" },
                    { Id: "hcm-122", Name: "Xã Cần Giờ" },
                    { Id: "hcm-123", Name: "Xã Củ Chi" },
                    { Id: "hcm-124", Name: "Xã Tân An Hội" },
                    { Id: "hcm-125", Name: "Xã Thái Mỹ" },
                    { Id: "hcm-126", Name: "Xã An Nhơn Tây" },
                    { Id: "hcm-127", Name: "Xã Nhuận Đức" },
                    { Id: "hcm-128", Name: "Xã Phú Hòa Đông" },
                    { Id: "hcm-129", Name: "Xã Bình Mỹ" },
                    { Id: "hcm-130", Name: "Xã Đông Thạnh" },
                    { Id: "hcm-131", Name: "Xã Hóc Môn" },
                    { Id: "hcm-132", Name: "Xã Xuân Thới Sơn" },
                    { Id: "hcm-133", Name: "Xã Bà Điểm" },
                    { Id: "hcm-134", Name: "Xã Nhà Bè" },
                    { Id: "hcm-135", Name: "Xã Hiệp Phước" },
                    { Id: "hcm-136", Name: "Xã Thường Tân" },
                    { Id: "hcm-137", Name: "Xã Bắc Tân Uyên" },
                    { Id: "hcm-138", Name: "Xã Phú Giáo" },
                    { Id: "hcm-139", Name: "Xã Phước Hòa" },
                    { Id: "hcm-140", Name: "Xã Phước Thành" },
                    { Id: "hcm-141", Name: "Xã An Long" },
                    { Id: "hcm-142", Name: "Xã Trừ Văn Thố" },
                    { Id: "hcm-143", Name: "Xã Bàu Bàng" },
                    { Id: "hcm-144", Name: "Xã Long Hòa" },
                    { Id: "hcm-145", Name: "Xã Thanh An" },
                    { Id: "hcm-146", Name: "Xã Dầu Tiếng" },
                    { Id: "hcm-147", Name: "Xã Minh Thạnh" },
                    { Id: "hcm-148", Name: "Xã Châu Pha" },
                    { Id: "hcm-149", Name: "Xã Long Hải" },
                    { Id: "hcm-150", Name: "Xã Long Điền" },
                    { Id: "hcm-151", Name: "Xã Phước Hải" },
                    { Id: "hcm-152", Name: "Xã Đất Đỏ" },
                    { Id: "hcm-153", Name: "Xã Nghĩa Thành" },
                    { Id: "hcm-154", Name: "Xã Ngãi Giao" },
                    { Id: "hcm-155", Name: "Xã Kim Long" },
                    { Id: "hcm-156", Name: "Xã Châu Đức" },
                    { Id: "hcm-157", Name: "Xã Bình Giã" },
                    { Id: "hcm-158", Name: "Xã Xuân Sơn" },
                    { Id: "hcm-159", Name: "Xã Hồ Tràm" },
                    { Id: "hcm-160", Name: "Xã Xuyên Mộc" },
                    { Id: "hcm-161", Name: "Xã Hòa Hội" },
                    { Id: "hcm-162", Name: "Xã Bàu Lâm" },
                    { Id: "hcm-163", Name: "Đặc khu Côn Đảo" },
                    { Id: "hcm-164", Name: "Xã Bình Châu" },
                    { Id: "hcm-165", Name: "Xã Hòa Hiệp" },
                    { Id: "hcm-166", Name: "Xã Long Sơn" },
                    { Id: "hcm-167", Name: "Xã Thạnh An" },
                    { Id: "hcm-168", Name: "Phường Thới Hòa" }
                ],
                selectedProvince: '',
                selectedDistrict: '',
                selectedWard: '',
                streetAddress: '',

                init() {
                    fetch('/data/vietnam-addresses.json')
                        .then(res => {
                            if (!res.ok) throw new Error('Failed to load address data');
                            return res.json();
                        })
                        .then(data => {
                            this.provinces = data;
                        })
                        .catch(err => {
                            console.error('Error fetching Vietnam address list:', err);
                        });
                },

                get districtsList() {
                    if (!this.selectedProvince) return [];
                    const prov = this.provinces.find(p => p.Name === this.selectedProvince);
                    return prov ? prov.Districts : [];
                },

                get wardsList() {
                    if (!this.selectedDistrict) return [];
                    const dist = this.districtsList.find(d => d.Name === this.selectedDistrict);
                    return dist ? dist.Wards : [];
                },

                get currentWardsList() {
                    if (this.selectedProvince === 'Thành phố Hồ Chí Minh') {
                        return this.hcmcWards;
                    }
                    return this.wardsList;
                },

                onProvinceChange() {
                    this.selectedDistrict = '';
                    this.selectedWard = '';
                },

                onDistrictChange() {
                    this.selectedWard = '';
                },

                get fullAddress() {
                    let parts = [];
                    if (this.streetAddress) parts.push(this.streetAddress.trim());
                    if (this.selectedWard) parts.push(this.selectedWard);
                    if (this.selectedProvince !== 'Thành phố Hồ Chí Minh' && this.selectedDistrict) {
                        parts.push(this.selectedDistrict);
                    }
                    if (this.selectedProvince) parts.push(this.selectedProvince);
                    return parts.join(', ');
                }
            }));
        });
    </script>
@endpush

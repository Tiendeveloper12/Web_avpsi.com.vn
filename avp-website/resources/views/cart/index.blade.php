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
                            </div>
                        </div>

                        <!-- Customer Info Form -->
                        <div x-data="addressSelector()" class="bg-white rounded-3xl shadow-premium border border-gray-100 p-6 md:p-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-6">Thông tin đặt hàng</h3>
                            
                            <form @submit.prevent="submitOrder()" class="space-y-4">
                                @csrf
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Họ và tên <span class="text-primary">*</span></label>
                                    <input type="text" name="customer_name" x-model="customerName" required placeholder="Nhập họ và tên" 
                                           class="input-premium">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Số điện thoại <span class="text-primary">*</span></label>
                                    <input type="tel" name="customer_phone" x-model="customerPhone" required placeholder="Nhập số điện thoại" 
                                           class="input-premium">
                                </div>

                                <div class="grid grid-cols-1 gap-4">
                                    <!-- Province -->
                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Tỉnh / Thành phố <span class="text-primary">*</span></label>
                                        <select x-model="selectedProvince" @change="onProvinceChange()" required class="input-premium bg-white">
                                            <option value="">Chọn Tỉnh / Thành phố</option>
                                            <template x-for="prov in provinces" :key="prov.Id">
                                                <option :value="prov.Name" x-text="prov.Name"></option>
                                            </template>
                                        </select>
                                    </div>

                                    <!-- District -->
                                    <div x-show="selectedProvince !== 'Thành phố Hồ Chí Minh'">
                                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Quận / Huyện <span class="text-primary">*</span></label>
                                        <select x-model="selectedDistrict" @change="onDistrictChange()" :disabled="!selectedProvince || selectedProvince === 'Thành phố Hồ Chí Minh'" :required="selectedProvince !== 'Thành phố Hồ Chí Minh'" class="input-premium bg-white disabled:opacity-50 disabled:bg-gray-50">
                                            <option value="">Chọn Quận / Huyện</option>
                                            <template x-for="dist in districtsList" :key="dist.Id">
                                                <option :value="dist.Name" x-text="dist.Name"></option>
                                            </template>
                                        </select>
                                    </div>

                                    <!-- Ward -->
                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Phường / Xã <span class="text-primary">*</span></label>
                                        <select x-model="selectedWard" :disabled="selectedProvince === 'Thành phố Hồ Chí Minh' ? !selectedProvince : !selectedDistrict" required class="input-premium bg-white disabled:opacity-50 disabled:bg-gray-50">
                                            <option value="">Chọn Phường / Xã</option>
                                            <template x-for="ward in currentWardsList" :key="ward.Id">
                                                <option :value="ward.Name" x-text="ward.Name"></option>
                                            </template>
                                        </select>
                                    </div>

                                    <!-- Street -->
                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Số nhà, tên đường <span class="text-primary">*</span></label>
                                        <input type="text" x-model="streetAddress" placeholder="Ví dụ: 3/15 Phan Văn Sửu" required class="input-premium">
                                    </div>
                                </div>

                                <!-- Full Address String Hidden Field for Backend compatibility -->
                                <input type="hidden" name="customer_address" :value="fullAddress" required>

                                <!-- Interactive Address Preview -->
                                <div x-show="fullAddress" x-transition class="bg-gray-50 p-4 rounded-2xl border border-gray-100 text-xs text-gray-600 space-y-1">
                                    <span class="font-bold text-gray-900 block">Xem trước địa chỉ giao hàng:</span>
                                    <span class="text-primary font-medium" x-text="fullAddress"></span>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Ghi chú (Tùy chọn)</label>
                                    <textarea name="customer_note" rows="2" placeholder="Ví dụ: Giao giờ hành chính..." 
                                              class="input-premium py-3 resize-none"></textarea>
                                </div>

                                <button type="submit" 
                                        class="w-full bg-primary hover:bg-primary-dark text-white font-extrabold py-4 px-8 rounded-2xl transition-all duration-300 shadow-lg shadow-primary/20 flex items-center justify-center gap-2 text-base mt-6">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    XÁC NHẬN ĐẶT HÀNG
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('addressSelector', () => ({
                    provinces: [],
                    customerName: '',
                    customerPhone: '',
                    selectedProvince: '',
                    selectedDistrict: '',
                    selectedWard: '',
                    streetAddress: '',
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
                    },

                    submitOrder() {
                        alert(`Cảm ơn quý khách ${this.customerName}!\n\nĐơn hàng giao tới địa chỉ:\n${this.fullAddress}\n\nĐã được tiếp nhận thành công. Kỹ thuật viên Âu Việt Phát sẽ liên hệ qua số điện thoại ${this.customerPhone} để xác nhận giao hàng.`);
                    }
                }));
            });
        </script>
    @endpush
@endsection

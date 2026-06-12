@extends('layouts.app')

@section('title', 'Chỉnh Sửa Sản Phẩm - Âu Việt Phát')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container-custom max-w-4xl">
        
        <!-- Breadcrumbs -->
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
                        <a href="{{ route('admin.products.index') }}" class="ml-1 text-gray-500 hover:text-primary transition-colors font-medium md:ml-2">Quản lý sản phẩm</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-primary font-medium md:ml-2">Chỉnh sửa sản phẩm</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Validation Errors -->
        @if($errors->any())
            <div class="mb-6 p-4 bg-rose-50 border-l-4 border-rose-500 rounded-xl text-rose-800 shadow-sm">
                <div class="flex items-center gap-3 mb-2">
                    <svg class="w-6 h-6 text-rose-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-sm font-bold">Vui lòng kiểm tra lại thông tin:</span>
                </div>
                <ul class="list-disc list-inside text-xs font-medium space-y-1 ml-9">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <!-- Product Thumbnail Preview -->
                <div class="w-16 h-16 bg-white border border-gray-100 rounded-2xl overflow-hidden p-2 flex items-center justify-center flex-shrink-0 shadow-sm">
                    <img src="{{ $product->image ? asset('images/products/' . $product->image) : asset('images/placeholder.png') }}" 
                         alt="{{ $product->title }}" class="w-full h-full object-contain">
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-black text-gray-900 uppercase tracking-tight">Chỉnh sửa sản phẩm</h1>
                    <p class="text-sm text-gray-500 mt-0.5">
                        ID: <span class="font-bold text-gray-700">#{{ $product->id }}</span> 
                        &bull; 
                        <span class="font-medium">{{ $product->title }}</span>
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <!-- Status Badge -->
                @if($product->status === 'active')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                        Đang hiển thị
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-full bg-gray-100 text-gray-600 border border-gray-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                        Đang ẩn
                    </span>
                @endif
                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 border border-gray-200 text-gray-600 hover:text-gray-800 hover:bg-gray-50 px-5 py-3 rounded-xl font-bold text-sm transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Quay lại
                </a>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Basic Information Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                    <h2 class="text-sm font-black text-gray-900 flex items-center gap-2 uppercase tracking-wider">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Thông tin cơ bản
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tên sản phẩm <span class="text-rose-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title', $product->title) }}" required
                               class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                    </div>

                    <!-- Price & Stock Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="price" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Giá bán (VNĐ) <span class="text-rose-500">*</span></label>
                            <input type="number" name="price" id="price" value="{{ old('price', $product->sell) }}" required min="0" step="1000"
                                   class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-bold">
                        </div>
                        <div>
                            <label for="stock_quant" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Số lượng tồn kho <span class="text-rose-500">*</span></label>
                            <input type="number" name="stock_quant" id="stock_quant" value="{{ old('stock_quant', $product->variant_stock ?? $product->stock_quant) }}" required min="0"
                                   class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-bold">
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Mô tả sản phẩm</label>
                        <textarea name="description" id="description" rows="5"
                                  class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium resize-y min-h-[120px]">{{ old('description', $product->description) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Image Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                    <h2 class="text-sm font-black text-gray-900 flex items-center gap-2 uppercase tracking-wider">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Hình ảnh sản phẩm
                    </h2>
                </div>
                <div class="p-6">
                    <div x-data="{ preview: '{{ $product->image ? asset('images/products/' . $product->image) : '' }}', hasExisting: {{ $product->image ? 'true' : 'false' }} }">
                        <!-- Current Image Display -->
                        <div class="flex items-start gap-6">
                            <div class="flex-shrink-0" x-show="hasExisting && !preview.startsWith('data:')">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Ảnh hiện tại</p>
                                <div class="w-28 h-28 bg-white border border-gray-100 rounded-2xl overflow-hidden p-2 flex items-center justify-center">
                                    <img src="{{ $product->image ? asset('images/products/' . $product->image) : asset('images/placeholder.png') }}" 
                                         alt="{{ $product->title }}" class="w-full h-full object-contain">
                                </div>
                            </div>

                            <div class="flex-grow">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tải ảnh mới <span class="text-gray-300 font-semibold">(để trống nếu không thay đổi)</span></p>
                                <label class="block cursor-pointer">
                                    <div class="border-2 border-dashed border-gray-200 rounded-2xl p-6 text-center hover:border-primary hover:bg-primary/5 transition-all duration-200 group">
                                        <!-- Preview of new upload -->
                                        <template x-if="preview && preview.startsWith('data:')">
                                            <div class="mb-3">
                                                <img :src="preview" alt="New Preview" class="w-24 h-24 mx-auto object-contain rounded-xl border border-gray-100 bg-white p-2">
                                            </div>
                                        </template>
                                        <!-- Placeholder -->
                                        <template x-if="!preview || !preview.startsWith('data:')">
                                            <div class="mb-3">
                                                <svg class="w-10 h-10 mx-auto text-gray-300 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                            </div>
                                        </template>
                                        <p class="text-xs font-bold text-gray-600 group-hover:text-primary transition-colors">Nhấn để chọn ảnh thay thế</p>
                                        <p class="text-xs text-gray-400 mt-0.5">JPEG, PNG, JPG, GIF, SVG, WEBP • Tối đa 2MB</p>
                                    </div>
                                    <input type="file" name="image" accept="image/*" class="hidden"
                                           @change="const file = $event.target.files[0]; if(file) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL(file); }">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                    <h2 class="text-sm font-black text-gray-900 flex items-center gap-2 uppercase tracking-wider">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        Phân loại sản phẩm
                    </h2>
                </div>
                <div class="p-6 space-y-6" x-data="categorySelector()">
                    <!-- Main Category -->
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Danh mục chính <span class="text-rose-500">*</span></label>
                        @php
                            // Determine main category from tags
                            $mainCatMap = ['photocopy','muc','printer','laptop','pc','linh-kien','van-phong','internet','camera','service'];
                            $currentMainCategory = '';
                            $currentSubcategories = [];
                            foreach($tags as $t) {
                                if (in_array($t, $mainCatMap)) {
                                    $currentMainCategory = $t;
                                } elseif (str_starts_with($t, 'sub-')) {
                                    $currentSubcategories[] = $t;
                                }
                            }
                        @endphp
                        <select name="main_category" id="main_category" required x-model="mainCategory" @change="updateSubcategories()"
                                class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-bold text-gray-700 cursor-pointer">
                            <option value="">-- Chọn danh mục --</option>
                            <option value="photocopy">🖨️ Máy Photocopy</option>
                            <option value="muc">💧 Mực In</option>
                            <option value="printer">📠 Máy In</option>
                            <option value="laptop">💻 Laptop / Macbook</option>
                            <option value="pc">🖥️ Máy tính để bàn</option>
                            <option value="linh-kien">⚙️ Linh kiện máy tính</option>
                            <option value="van-phong">🏢 Thiết bị văn phòng</option>
                            <option value="internet">🌐 Thiết bị mạng</option>
                            <option value="camera">📹 Camera an ninh</option>
                            <option value="service">🛠️ Dịch vụ</option>
                        </select>
                    </div>

                    <!-- Subcategories -->
                    <div x-show="subcategories.length > 0" x-transition>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Thương hiệu / Phân loại phụ</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                            <template x-for="sub in subcategories" :key="sub.slug">
                                <label class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl border border-gray-200 hover:border-primary/50 hover:bg-primary/5 cursor-pointer transition-all duration-200 select-none group">
                                    <input type="checkbox" name="subcategories[]" :value="sub.slug"
                                           class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary cursor-pointer"
                                           :checked="existingSubcategories.includes(sub.slug)">
                                    <span class="text-xs font-bold text-gray-700 group-hover:text-primary transition-colors" x-text="sub.name"></span>
                                </label>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-between gap-4 pt-2">
                <a href="{{ route('admin.products.index') }}" class="px-6 py-3 border border-gray-200 text-gray-500 hover:text-gray-700 hover:bg-gray-50 rounded-xl text-sm font-bold transition-colors">
                    Hủy bỏ
                </a>
                <div class="flex items-center gap-3">
                    <!-- Quick Visibility Toggle -->
                    <form action="{{ route('admin.products.toggle_visibility', $product->id) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-2 px-5 py-3 border rounded-xl text-sm font-bold transition-all duration-200
                            {{ $product->status === 'active' 
                                ? 'border-gray-200 text-gray-600 hover:text-gray-800 hover:bg-gray-50' 
                                : 'border-emerald-200 text-emerald-700 bg-emerald-50 hover:bg-emerald-100' }}">
                            @if($product->status === 'active')
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path></svg>
                                Ẩn sản phẩm
                            @else
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Hiển thị lại
                            @endif
                        </button>
                    </form>

                    <!-- Save Changes -->
                    <button type="submit" class="inline-flex items-center gap-2 bg-primary text-white px-8 py-3 rounded-xl font-bold hover:bg-primary-dark transition-all duration-200 shadow-md hover:shadow-lg text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Lưu thay đổi
                    </button>
                </div>
            </div>
        </form>

        <!-- Danger Zone -->
        <div class="mt-12 bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden">
            <div class="px-6 py-4 bg-rose-50 border-b border-rose-100">
                <h2 class="text-sm font-black text-rose-800 flex items-center gap-2 uppercase tracking-wider">
                    <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path></svg>
                    Vùng nguy hiểm
                </h2>
            </div>
            <div class="p-6 flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-bold text-gray-900">Xóa vĩnh viễn sản phẩm này</h3>
                    <p class="text-xs text-gray-500 mt-0.5">Hành động này không thể hoàn tác. Toàn bộ dữ liệu bao gồm ảnh và biến thể sẽ bị xóa vĩnh viễn.</p>
                </div>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" 
                      onsubmit="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn sản phẩm \'{{ addslashes($product->title) }}\'? Thao tác này không thể hoàn tác.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center gap-2 px-5 py-3 bg-white border border-rose-200 text-rose-600 hover:bg-rose-600 hover:text-white hover:border-rose-600 rounded-xl text-sm font-bold transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Xóa sản phẩm
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

<script>
function categorySelector() {
    const subcategoryMap = {
        'photocopy': [
            { name: 'Ricoh', slug: 'sub-ricoh' }
        ],
        'muc': [
            { name: 'AVP', slug: 'sub-avp' },
            { name: 'HP', slug: 'sub-hp' },
            { name: 'Canon', slug: 'sub-canon' },
            { name: 'Epson', slug: 'sub-epson' },
            { name: 'Brother', slug: 'sub-brother' },
            { name: 'Oki', slug: 'sub-oki' },
            { name: 'Ricoh', slug: 'sub-ricoh' },
            { name: 'Xerox', slug: 'sub-xerox' }
        ],
        'printer': [
            { name: 'HP', slug: 'sub-hp' },
            { name: 'Canon', slug: 'sub-canon' },
            { name: 'Epson', slug: 'sub-epson' },
            { name: 'Brother', slug: 'sub-brother' },
            { name: 'Xerox', slug: 'sub-xerox' },
            { name: 'Pantum', slug: 'sub-pantum' }
        ],
        'laptop': [
            { name: 'Apple MacBook', slug: 'sub-macbook' },
            { name: 'ASUS', slug: 'sub-asus' },
            { name: 'Dell', slug: 'sub-dell' },
            { name: 'HP', slug: 'sub-hp' },
            { name: 'Lenovo', slug: 'sub-lenovo' },
            { name: 'MSI', slug: 'sub-msi' },
            { name: 'Acer', slug: 'sub-acer' },
            { name: 'Razer', slug: 'sub-razer' },
            { name: 'Microsoft', slug: 'sub-microsoft' },
            { name: 'Samsung', slug: 'sub-samsung' },
            { name: 'LG', slug: 'sub-lg' },
            { name: 'Huawei', slug: 'sub-huawei' },
            { name: 'Gigabyte', slug: 'sub-gigabyte' }
        ],
        'pc': [
            { name: 'Apple', slug: 'sub-apple' },
            { name: 'Dell', slug: 'sub-dell' },
            { name: 'HP', slug: 'sub-hp' },
            { name: 'Lenovo', slug: 'sub-lenovo' },
            { name: 'ASUS', slug: 'sub-asus' },
            { name: 'MSI', slug: 'sub-msi' },
            { name: 'Acer', slug: 'sub-acer' },
            { name: 'Gigabyte', slug: 'sub-gigabyte' },
            { name: 'Huawei', slug: 'sub-huawei' },
            { name: 'Samsung', slug: 'sub-samsung' },
            { name: 'Khác', slug: 'sub-khac' }
        ],
        'linh-kien': [
            { name: 'Màn hình', slug: 'sub-monitor' },
            { name: 'RAM', slug: 'sub-ram' },
            { name: 'SSD/HDD', slug: 'sub-ssd' },
            { name: 'Bảng mạch chính', slug: 'sub-mainboard' },
            { name: 'CPU', slug: 'sub-cpu' },
            { name: 'Card đồ họa', slug: 'sub-gpu' },
            { name: 'Tai nghe', slug: 'sub-headphone' },
            { name: 'Bộ phát wifi', slug: 'sub-wifi' },
            { name: 'Nguồn', slug: 'sub-psu' },
            { name: 'Bàn phím', slug: 'sub-keyboard' },
            { name: 'Chuột', slug: 'sub-mouse' }
        ],
        'van-phong': [
            { name: 'Máy chấm công', slug: 'sub-cham-cong' },
            { name: 'Máy hủy giấy', slug: 'sub-huy-giay' },
            { name: 'Máy in bill', slug: 'sub-in-bill' },
            { name: 'Máy quét / Scanner', slug: 'sub-scan' },
            { name: 'Máy chiếu', slug: 'sub-chieu' },
            { name: 'Thiết bị khác', slug: 'sub-khac' }
        ],
        'internet': [
            { name: 'Bộ định tuyến Wifi', slug: 'sub-router' },
            { name: 'Bộ chuyển mạch (Switch)', slug: 'sub-switch' },
            { name: 'Dây cáp internet', slug: 'sub-cable' }
        ],
        'camera': [
            { name: 'Hikvision', slug: 'sub-hikvision' },
            { name: 'IMOU', slug: 'sub-imou' },
            { name: 'EVI', slug: 'sub-evi' },
            { name: 'Khác', slug: 'sub-khac' }
        ],
        'service': []
    };

    return {
        mainCategory: '{{ old("main_category", $currentMainCategory) }}',
        subcategories: [],
        existingSubcategories: @json(old('subcategories', $currentSubcategories)),
        init() {
            this.updateSubcategories();
        },
        updateSubcategories() {
            this.subcategories = subcategoryMap[this.mainCategory] || [];
        }
    };
}
</script>
@endsection

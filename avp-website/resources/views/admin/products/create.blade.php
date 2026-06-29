@extends('layouts.app')

@section('title', 'Thêm Sản Phẩm Mới - Âu Việt Phát')

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
                        <span class="ml-1 text-primary font-medium md:ml-2">Thêm sản phẩm mới</span>
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
        <div class="flex items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Thêm sản phẩm mới</h1>
                <p class="text-sm text-gray-500 mt-1">Điền thông tin sản phẩm vào biểu mẫu bên dưới để đăng bán lên website.</p>
            </div>
            <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 border border-gray-200 text-gray-600 hover:text-gray-800 hover:bg-gray-50 px-5 py-3 rounded-xl font-bold text-sm transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Quay lại
            </a>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

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
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                               placeholder="Ví dụ: Máy in HP LaserJet Pro M404dn"
                               class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                    </div>

                    <!-- Price & Stock Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="price" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Giá bán (VNĐ) <span class="text-rose-500">*</span></label>
                            <input type="number" name="price" id="price" value="{{ old('price') }}" required min="0" step="1000"
                                   placeholder="0"
                                   class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-bold">
                        </div>
                        <div>
                            <label for="stock_quant" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Số lượng tồn kho <span class="text-rose-500">*</span></label>
                            <input type="number" name="stock_quant" id="stock_quant" value="{{ old('stock_quant', 0) }}" required min="0"
                                   placeholder="0"
                                   class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-bold">
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Mô tả sản phẩm</label>
                        <textarea name="description" id="description" rows="5"
                                  placeholder="Nhập mô tả chi tiết về sản phẩm, thông số kỹ thuật, tính năng nổi bật..."
                                  class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium resize-y min-h-[120px]">{{ old('description') }}</textarea>
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
                    <div x-data="{ preview: null }">
                        <label class="block cursor-pointer">
                            <div class="border-2 border-dashed border-gray-200 rounded-2xl p-8 text-center hover:border-primary hover:bg-primary/5 transition-all duration-200 group">
                                <!-- Preview -->
                                <template x-if="preview">
                                    <div class="mb-4">
                                        <img :src="preview" alt="Preview" class="w-32 h-32 mx-auto object-contain rounded-xl border border-gray-100 bg-white p-2">
                                    </div>
                                </template>
                                <!-- Placeholder -->
                                <template x-if="!preview">
                                    <div class="mb-4">
                                        <svg class="w-12 h-12 mx-auto text-gray-300 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    </div>
                                </template>
                                <p class="text-sm font-bold text-gray-700 group-hover:text-primary transition-colors">Nhấn để tải ảnh lên</p>
                                <p class="text-xs text-gray-400 mt-1">Hỗ trợ: JPEG, PNG, JPG, GIF, SVG, WEBP • Tối đa 2MB</p>
                            </div>
                            <input type="file" name="image" accept="image/*" class="hidden"
                                   @change="const file = $event.target.files[0]; if(file) { const reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL(file); }">
                        </label>
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
                        <select name="main_category" id="main_category" required x-model="mainCategory" @change="updateSubcategories()"
                                class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-bold text-gray-700 cursor-pointer">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat['tag'] ?? $cat['slug'] }}" {{ old('main_category') === ($cat['tag'] ?? $cat['slug']) ? 'selected' : '' }}>
                                    {{ $cat['icon'] }} {{ $cat['title'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Subcategories (dynamic based on main category) -->
                    <div x-show="subcategories.length > 0" x-transition>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Thương hiệu / Phân loại phụ</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                            <template x-for="sub in subcategories" :key="sub.slug">
                                <label class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl border border-gray-200 hover:border-primary/50 hover:bg-primary/5 cursor-pointer transition-all duration-200 select-none group">
                                    <input type="checkbox" name="subcategories[]" :value="sub.slug" 
                                           class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary cursor-pointer"
                                           :checked="oldSubcategories.includes(sub.slug)">
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
                <button type="submit" class="inline-flex items-center gap-2 bg-primary text-white px-8 py-3 rounded-xl font-bold hover:bg-primary-dark transition-all duration-200 shadow-md hover:shadow-lg text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Thêm sản phẩm
                </button>
            </div>
        </form>

    </div>
</div>

<script>
function categorySelector() {
    const subcategoryMap = {
        @foreach($categories as $cat)
            '{{ $cat['tag'] ?? $cat['slug'] }}': @json($cat['subcategories']),
        @endforeach
    };

    return {
        mainCategory: '{{ old("main_category", "") }}',
        subcategories: [],
        oldSubcategories: @json(old('subcategories', [])),
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

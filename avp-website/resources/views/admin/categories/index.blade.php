@extends('layouts.app')

@section('title', 'Quản Lý Danh Mục - Âu Việt Phát')

@section('content')
<div class="bg-gray-50 min-h-screen py-12" x-data="categoryManager()">
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
                        <span class="ml-1 text-primary font-medium md:ml-2">Quản lý danh mục & thẻ</span>
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
                    <span class="text-sm font-bold">Lỗi xử lý yêu cầu:</span>
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
            <div>
                <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Cấu trúc danh mục & phân loại</h1>
                <p class="text-sm text-gray-500 mt-1">Sắp xếp thứ tự, thêm mới, sửa tên và quản lý các phân loại sản phẩm trên menu chính & thanh bên.</p>
            </div>
            <div>
                <button @click="openAddCategoryModal()" class="inline-flex items-center gap-2 bg-primary text-white px-5 py-3 rounded-xl font-bold hover:bg-primary-dark transition-all duration-200 shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Thêm danh mục chính
                </button>
            </div>
        </div>

        <!-- Categories List Grid -->
        <div class="grid grid-cols-1 gap-6">
            @foreach($categories as $index => $cat)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow p-6 flex flex-col md:flex-row md:items-center justify-between gap-6" data-slug="{{ $cat['slug'] }}">
                    <!-- Left: Icon, Title & Order buttons -->
                    <div class="flex items-center gap-4 flex-grow">
                        <!-- Sorting controls -->
                        <div class="flex flex-col gap-1 flex-shrink-0">
                            @if($index > 0)
                                <button @click="moveCategory({{ $index }}, 'up')" class="p-1.5 text-gray-400 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors" title="Di chuyển lên">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                </button>
                            @else
                                <div class="w-8 h-8"></div>
                            @endif
                            @if($index < count($categories) - 1)
                                <button @click="moveCategory({{ $index }}, 'down')" class="p-1.5 text-gray-400 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors" title="Di chuyển xuống">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                            @else
                                <div class="w-8 h-8"></div>
                            @endif
                        </div>

                        <!-- Category Info -->
                        <div class="w-14 h-14 rounded-xl bg-gray-50 border border-gray-100 flex items-center justify-center text-3xl flex-shrink-0 select-none">
                            {{ $cat['icon'] }}
                        </div>
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <h3 class="text-lg font-black text-gray-900">{{ $cat['title'] }}</h3>
                                <span class="text-[10px] bg-gray-100 text-gray-500 font-bold px-2 py-0.5 rounded-full uppercase">Slug: {{ $cat['slug'] }}</span>
                            </div>
                            <!-- Subcategories tags list -->
                            <div class="flex flex-wrap gap-2 pt-1">
                                @forelse($cat['subcategories'] as $sub)
                                    @php
                                        $subName = is_array($sub) ? $sub['name'] : $sub;
                                        $subSlug = is_array($sub) ? $sub['slug'] : 'sub-' . Str::slug($sub);
                                        $subUrl = is_array($sub) && isset($sub['url']) ? $sub['url'] : null;
                                    @endphp
                                    <div class="inline-flex items-center gap-1.5 bg-primary/5 border border-primary/10 text-primary px-3 py-1 rounded-xl text-xs font-bold">
                                        <span>{{ $subName }}</span>
                                        @if($subUrl)
                                            <span class="text-[9px] text-gray-400 font-normal" title="URL: {{ $subUrl }}">(Link)</span>
                                        @endif
                                        <button @click="openEditSubcategoryModal('{{ $cat['slug'] }}', '{{ $subSlug }}', '{{ $subName }}', '{{ $subUrl }}')" class="hover:text-primary-dark transition-colors ml-1">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </button>
                                        <form action="{{ route('admin.categories.destroy_subcategory', [$cat['slug'], $subSlug]) }}" method="POST" onsubmit="return confirm('Xóa phân loại phụ này?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="hover:text-rose-600 transition-colors">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                @empty
                                    <span class="text-xs text-gray-400 italic">Chưa có phân loại phụ</span>
                                @endforelse

                                <button @click="openAddSubcategoryModal('{{ $cat['slug'] }}')" class="inline-flex items-center gap-1 bg-gray-50 border border-gray-200 text-gray-500 hover:text-primary hover:border-primary/30 px-3 py-1 rounded-xl text-xs font-bold transition-all">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    Thêm tag phụ
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Edit / Delete category buttons -->
                    <div class="flex items-center gap-2 md:self-center self-end">
                        <button @click="openEditCategoryModal('{{ $cat['slug'] }}', '{{ $cat['title'] }}', '{{ $cat['icon'] }}')" class="inline-flex items-center gap-1.5 border border-gray-200 text-gray-600 hover:text-primary hover:bg-primary/5 px-4 py-2 rounded-xl text-sm font-bold transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            Sửa danh mục
                        </button>
                        <form action="{{ route('admin.categories.destroy', $cat['slug']) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này? Toàn bộ phân loại phụ sẽ bị xóa theo.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center gap-1.5 border border-transparent text-gray-400 hover:text-rose-600 hover:bg-rose-50 px-4 py-2 rounded-xl text-sm font-bold transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Xóa
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <!-- Modals Container -->

    <!-- Add Category Modal -->
    <div x-show="modals.addCategory" style="display: none;" class="fixed inset-0 bg-black/55 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl w-full max-w-md shadow-2xl overflow-hidden border border-gray-100" @click.outside="closeModals()">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-base font-black text-gray-900 uppercase">Thêm danh mục chính</h3>
                <button @click="closeModals()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tên danh mục chính <span class="text-rose-500">*</span></label>
                    <input type="text" name="title" required placeholder="Ví dụ: Thiết bị thông minh" class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Biểu tượng Icon (Emoji) <span class="text-rose-500">*</span></label>
                    <input type="text" name="icon" required placeholder="Ví dụ: 🕹️" class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:ring-1 focus:ring-primary focus:border-primary text-sm font-bold">
                </div>
                <div class="flex items-center justify-end gap-2 pt-2">
                    <button type="button" @click="closeModals()" class="px-5 h-12 border border-gray-200 text-gray-500 hover:text-gray-700 rounded-xl text-sm font-bold">Hủy</button>
                    <button type="submit" class="px-6 h-12 bg-primary text-white rounded-xl text-sm font-bold hover:bg-primary-dark transition-colors">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div x-show="modals.editCategory" style="display: none;" class="fixed inset-0 bg-black/55 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl w-full max-w-md shadow-2xl overflow-hidden border border-gray-100" @click.outside="closeModals()">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-base font-black text-gray-900 uppercase">Chỉnh sửa danh mục</h3>
                <button @click="closeModals()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <form :action="editCategoryRoute" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tên danh mục <span class="text-rose-500">*</span></label>
                    <input type="text" name="title" required x-model="editCategoryData.title" class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Biểu tượng Icon (Emoji) <span class="text-rose-500">*</span></label>
                    <input type="text" name="icon" required x-model="editCategoryData.icon" class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:ring-1 focus:ring-primary focus:border-primary text-sm font-bold">
                </div>
                <div class="flex items-center justify-end gap-2 pt-2">
                    <button type="button" @click="closeModals()" class="px-5 h-12 border border-gray-200 text-gray-500 hover:text-gray-700 rounded-xl text-sm font-bold">Hủy</button>
                    <button type="submit" class="px-6 h-12 bg-primary text-white rounded-xl text-sm font-bold hover:bg-primary-dark transition-colors">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Subcategory Modal -->
    <div x-show="modals.addSubcategory" style="display: none;" class="fixed inset-0 bg-black/55 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl w-full max-w-md shadow-2xl overflow-hidden border border-gray-100" @click.outside="closeModals()">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-base font-black text-gray-900 uppercase">Thêm phân loại phụ (Tag)</h3>
                <button @click="closeModals()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <form :action="addSubcategoryRoute" method="POST" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tên phân loại phụ <span class="text-rose-500">*</span></label>
                    <input type="text" name="name" required placeholder="Ví dụ: Canon" class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Đường dẫn liên kết tùy chọn (Không bắt buộc)</label>
                    <input type="text" name="url" placeholder="Ví dụ: /dich-vu/rieng" class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                    <p class="text-[10px] text-gray-400 mt-1">Để trống để tự động lọc sản phẩm có thẻ tương ứng.</p>
                </div>
                <div class="flex items-center justify-end gap-2 pt-2">
                    <button type="button" @click="closeModals()" class="px-5 h-12 border border-gray-200 text-gray-500 hover:text-gray-700 rounded-xl text-sm font-bold">Hủy</button>
                    <button type="submit" class="px-6 h-12 bg-primary text-white rounded-xl text-sm font-bold hover:bg-primary-dark transition-colors">Thêm tag</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Subcategory Modal -->
    <div x-show="modals.editSubcategory" style="display: none;" class="fixed inset-0 bg-black/55 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl w-full max-w-md shadow-2xl overflow-hidden border border-gray-100" @click.outside="closeModals()">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-base font-black text-gray-900 uppercase">Sửa phân loại phụ</h3>
                <button @click="closeModals()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <form :action="editSubcategoryRoute" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tên phân loại phụ <span class="text-rose-500">*</span></label>
                    <input type="text" name="name" required x-model="editSubcategoryData.name" class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Đường dẫn liên kết tùy chọn</label>
                    <input type="text" name="url" x-model="editSubcategoryData.url" placeholder="Ví dụ: /dich-vu/rieng" class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                </div>
                <div class="flex items-center justify-end gap-2 pt-2">
                    <button type="button" @click="closeModals()" class="px-5 h-12 border border-gray-200 text-gray-500 hover:text-gray-700 rounded-xl text-sm font-bold">Hủy</button>
                    <button type="submit" class="px-6 h-12 bg-primary text-white rounded-xl text-sm font-bold hover:bg-primary-dark transition-colors">Lưu lại</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function categoryManager() {
    return {
        modals: {
            addCategory: false,
            editCategory: false,
            addSubcategory: false,
            editSubcategory: false
        },
        editCategoryData: {
            title: '',
            icon: ''
        },
        editCategoryRoute: '',
        addSubcategoryRoute: '',
        editSubcategoryRoute: '',
        editSubcategoryData: {
            name: '',
            url: ''
        },
        closeModals() {
            this.modals.addCategory = false;
            this.modals.editCategory = false;
            this.modals.addSubcategory = false;
            this.modals.editSubcategory = false;
        },
        openAddCategoryModal() {
            this.closeModals();
            this.modals.addCategory = true;
        },
        openEditCategoryModal(slug, title, icon) {
            this.closeModals();
            this.editCategoryData.title = title;
            this.editCategoryData.icon = icon;
            this.editCategoryRoute = `/admin/categories/${slug}`;
            this.modals.editCategory = true;
        },
        openAddSubcategoryModal(slug) {
            this.closeModals();
            this.addSubcategoryRoute = `/admin/categories/${slug}/subcategories`;
            this.modals.addSubcategory = true;
        },
        openEditSubcategoryModal(catSlug, subSlug, name, url) {
            this.closeModals();
            this.editSubcategoryData.name = name;
            this.editSubcategoryData.url = url || '';
            this.editSubcategoryRoute = `/admin/categories/${catSlug}/subcategories/${subSlug}`;
            this.modals.editSubcategory = true;
        },
        async moveCategory(index, direction) {
            // Get all category slugs in current order
            const categoryCards = Array.from(document.querySelectorAll('[data-slug]'));
            let order = categoryCards.map(card => card.getAttribute('data-slug'));
            
            // Perform swap
            const targetIndex = direction === 'up' ? index - 1 : index + 1;
            if (targetIndex >= 0 && targetIndex < order.length) {
                const temp = order[index];
                order[index] = order[targetIndex];
                order[targetIndex] = temp;
                
                try {
                    // Send to backend
                    const response = await fetch('{{ route("admin.categories.reorder") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ order })
                    });
                    
                    if (response.ok) {
                        window.location.reload();
                    } else {
                        alert('Không thể thay đổi thứ tự danh mục.');
                    }
                } catch (error) {
                    console.error('Reorder error:', error);
                    alert('Lỗi kết nối khi sắp xếp danh mục.');
                }
            }
        }
    };
}
</script>
@endsection

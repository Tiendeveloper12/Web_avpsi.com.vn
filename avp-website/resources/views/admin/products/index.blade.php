@extends('layouts.app')

@section('title', 'Quản Lý Sản Phẩm - Âu Việt Phát')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
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
                        <span class="ml-1 text-primary font-medium md:ml-2">Quản lý sản phẩm</span>
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

        <!-- Page Header & Actions -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Quản lý danh sách sản phẩm</h1>
                <p class="text-sm text-gray-500 mt-1">Quản lý thông tin, giá bán, kho hàng và hiển thị của các sản phẩm trên website.</p>
            </div>
            <div>
                <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 bg-primary text-white px-5 py-3 rounded-xl font-bold hover:bg-primary-dark transition-all duration-200 shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Thêm sản phẩm mới
                </a>
            </div>
        </div>

        <!-- Filters Box -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm mb-8">
            <form action="{{ route('admin.products.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tìm kiếm sản phẩm</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nhập tên hoặc mô tả sản phẩm..." class="w-full h-11 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Trạng thái hiển thị</label>
                    <select name="status" class="w-full h-11 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-bold text-gray-700 cursor-pointer">
                        <option value="">Tất cả trạng thái</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Hiển thị (Active)</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Ẩn (Inactive)</option>
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-grow h-11 bg-dark text-white rounded-xl text-sm font-bold hover:bg-gray-800 transition-colors">
                        Lọc kết quả
                    </button>
                    @if(request('search') || request('status'))
                        <a href="{{ route('admin.products.index') }}" class="h-11 px-4 border border-gray-200 text-gray-500 hover:text-gray-700 hover:bg-gray-50 rounded-xl text-sm font-bold flex items-center justify-center transition-colors" title="Xóa bộ lọc">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 8H18.5"></path></svg>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Products Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-xs font-bold uppercase tracking-wider text-gray-400">
                            <th class="py-4 px-6">Ảnh</th>
                            <th class="py-4 px-6">Tên sản phẩm</th>
                            <th class="py-4 px-6">Giá bán</th>
                            <th class="py-4 px-6">Tồn kho</th>
                            <th class="py-4 px-6">Phân loại</th>
                            <th class="py-4 px-6">Hiển thị</th>
                            <th class="py-4 px-6 text-right">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm font-medium text-gray-700">
                        @forelse($products as $prod)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <!-- Image -->
                                <td class="py-4 px-6">
                                    <div class="w-12 h-12 bg-white border border-gray-100 rounded-xl overflow-hidden p-1 flex items-center justify-center flex-shrink-0">
                                        <img src="{{ $prod->image ? asset('images/products/' . $prod->image) : asset('images/placeholder.png') }}" alt="{{ $prod->title }}" class="w-full h-full object-contain">
                                    </div>
                                </td>
                                <!-- Title -->
                                <td class="py-4 px-6 font-bold text-gray-900">
                                    <div class="max-w-xs truncate" title="{{ $prod->title }}">{{ $prod->title }}</div>
                                    <span class="text-xs text-gray-400 font-semibold block mt-0.5">ID: #{{ $prod->id }}</span>
                                </td>
                                <!-- Price -->
                                <td class="py-4 px-6 font-extrabold text-red-600">
                                    {{ $prod->sell ? number_format($prod->sell, 0, ',', '.') . 'đ' : 'Liên hệ' }}
                                </td>
                                <!-- Stock -->
                                <td class="py-4 px-6 font-bold">
                                    @if($prod->variant_stock > 0)
                                        <span class="text-gray-900">{{ $prod->variant_stock }} chiếc</span>
                                    @else
                                        <span class="text-rose-600 bg-rose-50 border border-rose-100 px-2 py-0.5 rounded-md text-xs font-bold">Hết hàng</span>
                                    @endif
                                </td>
                                <!-- Category Tags -->
                                <td class="py-4 px-6">
                                    <div class="flex flex-wrap gap-1 max-w-[200px]">
                                        @php
                                            $tags = array_filter(explode(',', $prod->tags));
                                            $tagNames = [
                                                'photocopy' => 'Máy Photo',
                                                'muc' => 'Mực In',
                                                'printer' => 'Máy In',
                                                'laptop' => 'Laptop',
                                                'pc' => 'PC',
                                                'linh-kien' => 'Linh kiện',
                                                'van-phong' => 'VP',
                                                'internet' => 'Mạng',
                                                'camera' => 'Camera',
                                                'service' => 'Dịch vụ'
                                            ];
                                        @endphp
                                        @foreach($tags as $t)
                                            <span class="inline-flex px-2 py-0.5 text-[10px] font-bold rounded-md bg-gray-100 text-gray-600 border border-gray-200">
                                                {{ $tagNames[$t] ?? str_replace('sub-', '', $t) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                                <!-- Visibility Status -->
                                <td class="py-4 px-6">
                                    @if($prod->status === 'active')
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-bold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                                            Hiển thị
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-bold rounded-full bg-gray-100 text-gray-600 border border-gray-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                            Đang ẩn
                                        </span>
                                    @endif
                                </td>
                                <!-- Actions -->
                                <td class="py-4 px-6 text-right whitespace-nowrap" @click.stop>
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Visibility Toggle -->
                                        <form action="{{ route('admin.products.toggle_visibility', $prod->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="p-2 text-gray-500 hover:text-primary bg-gray-50 hover:bg-primary/5 rounded-lg border border-gray-200 transition-colors" title="{{ $prod->status === 'active' ? 'Ẩn sản phẩm này' : 'Hiển thị sản phẩm này' }}">
                                                @if($prod->status === 'active')
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path></svg>
                                                @else
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                @endif
                                            </button>
                                        </form>

                                        <!-- Edit -->
                                        <a href="{{ route('admin.products.edit', $prod->id) }}" class="p-2 text-blue-600 hover:text-white bg-blue-50 hover:bg-blue-600 rounded-lg border border-blue-100 hover:border-blue-600 transition-colors" title="Chỉnh sửa">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('admin.products.destroy', $prod->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn sản phẩm này? Thao tác này không thể hoàn tác.')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-rose-600 hover:text-white bg-rose-50 hover:bg-rose-600 rounded-lg border border-rose-100 hover:border-rose-600 transition-colors" title="Xóa vĩnh viễn">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-12 text-center text-gray-400 font-medium">
                                    Không tìm thấy sản phẩm nào phù hợp với bộ lọc.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                    {{ $products->links() }}
                </div>
            @endif
        </div>

    </div>
</div>
@endsection

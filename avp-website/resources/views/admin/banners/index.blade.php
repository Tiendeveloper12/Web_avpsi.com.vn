@extends('layouts.app')

@section('title', 'Quản Lý Banners - Âu Việt Phát')

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
                        <span class="ml-1 text-primary font-medium md:ml-2">Quản lý banner</span>
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
                <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Quản lý banners</h1>
                <p class="text-sm text-gray-500 mt-1">Các banner trang chủ điều hướng khách hàng tới các danh mục sản phẩm nổi bật.</p>
            </div>
            <div>
                <a href="{{ route('admin.banners.create') }}" class="inline-flex items-center gap-2 bg-primary text-white px-5 py-3 rounded-xl font-bold hover:bg-primary-dark transition-all duration-200 shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Thêm banner mới
                </a>
            </div>
        </div>

        <!-- Banners List -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                <h2 class="font-bold text-gray-900">Danh sách banners (kéo thả hoặc nhấn nút để đổi thứ tự)</h2>
            </div>

            <div class="divide-y divide-gray-100" id="banners-list">
                @forelse($banners as $index => $banner)
                <div class="p-6 flex flex-col md:flex-row items-center gap-6 hover:bg-gray-50/30 transition-colors" data-id="{{ $banner->id }}">
                    <!-- Thumbnail -->
                    <div class="w-full md:w-48 h-28 rounded-xl overflow-hidden border border-gray-100 shadow-sm bg-gray-100 flex-shrink-0">
                        <img src="{{ asset($banner->image_path) }}" alt="{{ $banner->title }}" class="w-full h-full object-cover">
                    </div>

                    <!-- Details -->
                    <div class="flex-grow space-y-2 text-center md:text-left">
                        <div class="flex flex-wrap items-center justify-center md:justify-start gap-2">
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-primary/10 text-primary uppercase">{{ $banner->badge ?: 'Chưa có nhãn' }}</span>
                            <span class="text-gray-400 text-xs">Thứ tự: {{ $banner->sort_order }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">{{ $banner->title }}</h3>
                        <p class="text-sm text-gray-500 max-w-2xl">{{ $banner->subtitle }}</p>
                        <div class="text-xs text-gray-400">Đường dẫn: <span class="text-gray-600 font-mono">{{ $banner->link }}</span></div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-3 flex-shrink-0">
                        <!-- Toggle Active -->
                        <button onclick="toggleBanner({{ $banner->id }}, this)" 
                                class="px-4 py-2 rounded-xl text-sm font-bold border transition-all flex items-center gap-2 {{ $banner->is_active ? 'bg-emerald-50 text-emerald-700 border-emerald-200 hover:bg-emerald-100' : 'bg-gray-50 text-gray-600 border-gray-200 hover:bg-gray-100' }}">
                            <span class="w-2 h-2 rounded-full {{ $banner->is_active ? 'bg-emerald-500 animate-pulse' : 'bg-gray-400' }}"></span>
                            {{ $banner->is_active ? 'Hiển thị' : 'Ẩn' }}
                        </button>

                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="p-2.5 rounded-xl border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors" title="Chỉnh sửa">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </a>

                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa banner này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2.5 rounded-xl border border-rose-200 text-rose-600 hover:bg-rose-50 transition-colors" title="Xóa">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="p-12 text-center text-gray-500">
                    Chưa có banner nào được tạo.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<script>
    function toggleBanner(id, button) {
        fetch(`/admin/banners/${id}/toggle`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (data.is_active) {
                    button.className = 'px-4 py-2 rounded-xl text-sm font-bold border transition-all flex items-center gap-2 bg-emerald-50 text-emerald-700 border-emerald-200 hover:bg-emerald-100';
                    button.innerHTML = '<span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Hiển thị';
                } else {
                    button.className = 'px-4 py-2 rounded-xl text-sm font-bold border transition-all flex items-center gap-2 bg-gray-50 text-gray-600 border-gray-200 hover:bg-gray-100';
                    button.innerHTML = '<span class="w-2 h-2 rounded-full bg-gray-400"></span> Ẩn';
                }
            }
        });
    }
</script>
@endsection

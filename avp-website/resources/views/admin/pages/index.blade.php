@extends('layouts.app')

@section('title', 'Tùy Chỉnh Trang: ' . ucfirst($page) . ' - Âu Việt Phát')

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
                        <span class="ml-1 text-primary font-medium md:ml-2">Tùy chỉnh trang {{ $page === 'home' ? 'Trang chủ' : 'Giới thiệu' }}</span>
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

        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Tùy chỉnh trang: {{ $page === 'home' ? 'Trang chủ' : 'Giới thiệu' }}</h1>
                <p class="text-sm text-gray-500 mt-1">Chỉnh sửa nội dung văn bản, hình ảnh quảng cáo, bố cục các thành phần hiển thị trên trang.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.pages.index', 'home') }}" class="px-5 py-2.5 rounded-xl font-bold border transition-colors {{ $page === 'home' ? 'bg-primary text-white border-primary' : 'bg-white text-gray-700 border-gray-200 hover:bg-gray-50' }}">Tùy chỉnh Trang chủ</a>
                <a href="{{ route('admin.pages.index', 'about') }}" class="px-5 py-2.5 rounded-xl font-bold border transition-colors {{ $page === 'about' ? 'bg-primary text-white border-primary' : 'bg-white text-gray-700 border-gray-200 hover:bg-gray-50' }}">Tùy chỉnh Giới thiệu</a>
            </div>
        </div>

        <!-- Sections List -->
        <div class="grid grid-cols-1 gap-6">
            @forelse($sections as $section)
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6 hover:shadow-md transition-all">
                <div class="space-y-2">
                    <div class="flex items-center gap-3">
                        <h2 class="text-lg font-bold text-gray-900">
                            @if($section->section_key === 'promo_pc_repair')
                                Banner sửa chữa PC & Laptop (Trang chủ)
                            @elseif($section->section_key === 'promo_photocopy')
                                Banner cho thuê Photocopy (Trang chủ)
                            @elseif($section->section_key === 'hero')
                                Section Hero (Đầu trang Giới thiệu)
                            @elseif($section->section_key === 'brand_story')
                                Câu chuyện thương hiệu & Điểm nổi bật
                            @elseif($section->section_key === 'vision_mission_values')
                                Tầm nhìn, Sứ mệnh & Giá trị cốt lõi
                            @elseif($section->section_key === 'timeline')
                                Lịch sử hình thành (Timeline chặng đường)
                            @else
                                {{ $section->title ?: $section->section_key }}
                            @endif
                        </h2>
                        <span class="text-xs text-gray-400 font-mono">[{{ $section->section_key }}]</span>
                    </div>
                    <p class="text-sm text-gray-500 max-w-3xl">
                        @if(!empty($section->content['description']))
                            {{ Str::limit($section->content['description'], 150) }}
                        @elseif(!empty($section->content['badge']))
                            {{ $section->content['badge'] }}
                        @elseif(!empty($section->content['paragraphs']))
                            {{ Str::limit($section->content['paragraphs'][0] ?? '', 150) }}
                        @elseif(!empty($section->content['vision']))
                            Tầm nhìn: {{ Str::limit($section->content['vision']['description'] ?? '', 100) }}
                        @endif
                    </p>
                </div>

                <div class="flex items-center gap-3 flex-shrink-0">
                    <!-- Toggle visibility -->
                    <button onclick="toggleSection({{ $section->id }}, this)" 
                            class="px-4 py-2 rounded-xl text-sm font-bold border transition-all flex items-center gap-2 {{ $section->is_active ? 'bg-emerald-50 text-emerald-700 border-emerald-200 hover:bg-emerald-100' : 'bg-gray-50 text-gray-600 border-gray-200 hover:bg-gray-100' }}">
                        <span class="w-2 h-2 rounded-full {{ $section->is_active ? 'bg-emerald-500 animate-pulse' : 'bg-gray-400' }}"></span>
                        {{ $section->is_active ? 'Đang kích hoạt' : 'Đang ẩn' }}
                    </button>

                    <!-- Edit button -->
                    <a href="{{ route('admin.pages.edit', $section->id) }}" class="px-5 py-2 rounded-xl bg-primary hover:bg-primary-dark text-white text-sm font-bold transition-all flex items-center gap-2 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        Chỉnh sửa nội dung
                    </a>
                </div>
            </div>
            @empty
            <div class="bg-white p-12 text-center text-gray-500 rounded-2xl border border-gray-100">
                Chưa có phần tùy chỉnh nào cho trang này.
            </div>
            @endforelse
        </div>
    </div>
</div>

<script>
    function toggleSection(id, button) {
        fetch(`/admin/pages/sections/${id}/toggle`, {
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
                    button.innerHTML = '<span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Đang kích hoạt';
                } else {
                    button.className = 'px-4 py-2 rounded-xl text-sm font-bold border transition-all flex items-center gap-2 bg-gray-50 text-gray-600 border-gray-200 hover:bg-gray-100';
                    button.innerHTML = '<span class="w-2 h-2 rounded-full bg-gray-400"></span> Đang ẩn';
                }
            }
        });
    }
</script>
@endsection

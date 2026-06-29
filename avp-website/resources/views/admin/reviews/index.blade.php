@extends('layouts.app')

@section('title', 'Quản Lý Đánh Giá - Âu Việt Phát')

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
                        <span class="ml-1 text-primary font-medium md:ml-2">Quản lý đánh giá</span>
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
                <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Quản lý đánh giá & phản hồi</h1>
                <p class="text-sm text-gray-500 mt-1">Duyệt hoặc từ chối các đánh giá của khách hàng gửi lên trước khi hiển thị công khai.</p>
            </div>
        </div>

        <!-- Stats Overview Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Stats -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Tổng số đánh giá</p>
                    <p class="text-2xl font-black text-gray-950 mt-0.5">{{ $stats['all'] }}</p>
                </div>
            </div>

            <!-- Pending Stats -->
            <div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-6 flex items-center gap-4 border-l-4 border-l-amber-500">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-amber-500 uppercase tracking-wider">Chờ kiểm duyệt</p>
                    <p class="text-2xl font-black text-gray-950 mt-0.5">{{ $stats['pending'] }}</p>
                </div>
            </div>

            <!-- Approved Stats -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex items-center gap-4 border-l-4 border-l-emerald-500">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-emerald-500 uppercase tracking-wider">Đã phê duyệt</p>
                    <p class="text-2xl font-black text-gray-950 mt-0.5">{{ $stats['approved'] }}</p>
                </div>
            </div>

            <!-- Rejected Stats -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex items-center gap-4 border-l-4 border-l-rose-500">
                <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-xl flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-rose-500 uppercase tracking-wider">Đã từ chối</p>
                    <p class="text-2xl font-black text-gray-950 mt-0.5">{{ $stats['rejected'] }}</p>
                </div>
            </div>
        </div>

        <!-- Filter Navigation Tabs -->
        <div class="flex flex-wrap items-center justify-between gap-4 mb-6 border-b border-gray-200">
            <div class="flex gap-2">
                <a href="{{ route('admin.reviews.index', ['status' => 'all', 'search' => request('search')]) }}" 
                   class="px-5 py-4 text-sm font-bold border-b-2 transition-all cursor-pointer whitespace-nowrap {{ $status === 'all' ? 'text-primary border-primary' : 'text-gray-500 hover:text-dark border-transparent' }}">
                    Tất cả ({{ $stats['all'] }})
                </a>
                <a href="{{ route('admin.reviews.index', ['status' => 'pending', 'search' => request('search')]) }}" 
                   class="px-5 py-4 text-sm font-bold border-b-2 transition-all cursor-pointer whitespace-nowrap {{ $status === 'pending' ? 'text-primary border-primary' : 'text-gray-500 hover:text-dark border-transparent' }}">
                    Chờ duyệt ({{ $stats['pending'] }})
                </a>
                <a href="{{ route('admin.reviews.index', ['status' => 'approved', 'search' => request('search')]) }}" 
                   class="px-5 py-4 text-sm font-bold border-b-2 transition-all cursor-pointer whitespace-nowrap {{ $status === 'approved' ? 'text-primary border-primary' : 'text-gray-500 hover:text-dark border-transparent' }}">
                    Đã duyệt ({{ $stats['approved'] }})
                </a>
                <a href="{{ route('admin.reviews.index', ['status' => 'rejected', 'search' => request('search')]) }}" 
                   class="px-5 py-4 text-sm font-bold border-b-2 transition-all cursor-pointer whitespace-nowrap {{ $status === 'rejected' ? 'text-primary border-primary' : 'text-gray-500 hover:text-dark border-transparent' }}">
                    Từ chối ({{ $stats['rejected'] }})
                </a>
            </div>
            
            <div class="pb-3 md:pb-0">
                <form action="{{ route('admin.reviews.index') }}" method="GET" class="flex gap-2">
                    <input type="hidden" name="status" value="{{ $status }}">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Tìm theo sản phẩm, người dùng..." 
                           class="h-10 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-xs font-semibold w-64 shadow-inner">
                    <button type="submit" class="h-10 px-4 bg-dark text-white rounded-xl text-xs font-bold hover:bg-gray-800 transition-colors cursor-pointer">
                        Tìm
                    </button>
                    @if($search)
                        <a href="{{ route('admin.reviews.index', ['status' => $status]) }}" class="h-10 w-10 flex items-center justify-center border border-gray-200 rounded-xl text-gray-400 hover:text-gray-600 bg-white">
                            ✕
                        </a>
                    @endif
                </form>
            </div>
        </div>

        <!-- Main Reviews Moderation Panel -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-xs font-bold uppercase tracking-wider text-gray-400">
                            <th class="py-4 px-6 w-12 text-center"></th>
                            <th class="py-4 px-6">Sản phẩm</th>
                            <th class="py-4 px-6">Người đánh giá</th>
                            <th class="py-4 px-6 text-center">Sao</th>
                            <th class="py-4 px-6">Nội dung</th>
                            <th class="py-4 px-6">Ngày gửi</th>
                            <th class="py-4 px-6">Trạng thái</th>
                            <th class="py-4 px-6 text-right">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody x-data="{ expandedRow: null }" class="divide-y divide-gray-100 text-sm font-medium text-gray-700">
                        @forelse($reviews as $review)
                            <!-- Main Row -->
                            <tr class="hover:bg-gray-50/50 transition-all cursor-pointer" @click="expandedRow = (expandedRow === {{ $review->id }} ? null : {{ $review->id }})">
                                <!-- Expand Icon -->
                                <td class="py-4 px-6 text-center" @click.stop>
                                    <button @click="expandedRow = (expandedRow === {{ $review->id }} ? null : {{ $review->id }})" class="focus:outline-none text-gray-400 hover:text-gray-700">
                                        <svg class="w-4 h-4 transition-transform duration-200" :class="expandedRow === {{ $review->id }} ? 'rotate-90' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                    </button>
                                </td>

                                <!-- Product Info -->
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 border border-gray-100 rounded-lg overflow-hidden p-1 flex items-center justify-center bg-white flex-shrink-0">
                                            <img src="{{ $review->product_image ? asset('images/products/' . $review->product_image) : asset('images/placeholder.png') }}" class="w-full h-full object-contain">
                                        </div>
                                        <div class="max-w-[180px]">
                                            <p class="font-bold text-gray-900 truncate" title="{{ $review->product_title }}">{{ $review->product_title }}</p>
                                            <p class="text-xs text-gray-400">ID: {{ $review->product_id }}</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Reviewer Info -->
                                <td class="py-4 px-6">
                                    <div>
                                        <p class="font-bold text-gray-900">{{ $review->user_name ?? 'Khách vãng lai' }}</p>
                                        <p class="text-xs text-gray-400 font-normal">{{ $review->user_email ?? 'Không có email' }}</p>
                                    </div>
                                </td>

                                <!-- Rating Stars -->
                                <td class="py-4 px-6 text-center">
                                    <div class="flex justify-center text-highlight">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                <span>★</span>
                                            @else
                                                <span class="text-gray-200">★</span>
                                            @endif
                                        @endfor
                                    </div>
                                </td>

                                <!-- Comment Body Preview -->
                                <td class="py-4 px-6 max-w-[220px]">
                                    <div>
                                        @if($review->title)
                                            <p class="text-xs font-bold text-gray-800 truncate mb-0.5">{{ $review->title }}</p>
                                        @endif
                                        <p class="text-xs text-gray-500 font-normal line-clamp-2">{{ $review->body }}</p>
                                    </div>
                                </td>

                                <!-- Date -->
                                <td class="py-4 px-6 text-xs text-gray-400 font-normal">
                                    {{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y H:i') }}
                                </td>

                                <!-- Status Badge -->
                                <td class="py-4 px-6">
                                    @if($review->status === 'pending')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                            Chờ duyệt
                                        </span>
                                    @elseif($review->status === 'approved')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Đã duyệt
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                            Từ chối
                                        </span>
                                    @endif
                                </td>

                                <!-- Quick Actions -->
                                <td class="py-4 px-6 text-right" @click.stop>
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Approve Quick Button -->
                                        @if($review->status !== 'approved')
                                            <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center hover:bg-emerald-100 transition duration-150 cursor-pointer" title="Phê duyệt">
                                                    ✓
                                                </button>
                                            </form>
                                        @endif

                                        <!-- Delete Quick Button -->
                                        <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn đánh giá này? Hành động này không thể hoàn tác.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 flex items-center justify-center hover:bg-rose-100 transition duration-150 cursor-pointer" title="Xóa vĩnh viễn">
                                                🗑
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Expanded Detail Row -->
                            <tr x-show="expandedRow === {{ $review->id }}" class="bg-gray-50/70" style="display: none;" @click.stop>
                                <td colspan="8" class="p-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-sm">
                                        <!-- Review Details & Images -->
                                        <div class="space-y-4">
                                            <h4 class="font-bold text-gray-900 border-b border-gray-200 pb-2 uppercase text-xs tracking-wider">Chi tiết đánh giá</h4>
                                            
                                            <div class="space-y-2">
                                                <p><span class="font-bold text-gray-500">Người đánh giá:</span> {{ $review->user_name ?? 'Khách vãng lai' }} ({{ $review->user_email ?? 'Không có email' }})</p>
                                                <p><span class="font-bold text-gray-500">Mức đánh giá:</span> <span class="text-highlight font-bold">{{ $review->rating }} sao</span></p>
                                                @if($review->title)
                                                    <p><span class="font-bold text-gray-500">Tiêu đề:</span> <span class="font-bold text-gray-800">{{ $review->title }}</span></p>
                                                @endif
                                                <p><span class="font-bold text-gray-500">Nội dung:</span></p>
                                                <div class="bg-white p-4 rounded-xl border border-gray-200 text-gray-700 leading-relaxed font-normal shadow-inner">
                                                    {{ $review->body }}
                                                </div>
                                            </div>

                                            @if($review->image)
                                                <div class="space-y-2">
                                                    <p class="font-bold text-gray-500">Hình ảnh đính kèm:</p>
                                                    <a href="{{ asset('images/reviews/' . $review->image) }}" target="_blank" class="inline-block group">
                                                        <div class="relative w-40 h-40 rounded-xl overflow-hidden border border-gray-200 bg-white p-1 shadow hover:scale-[1.02] transition duration-200">
                                                            <img src="{{ asset('images/reviews/' . $review->image) }}" class="w-full h-full object-cover rounded-lg">
                                                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white text-xs font-bold transition duration-200">
                                                                Xem ảnh gốc ↗
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Moderation actions & Admin Note -->
                                        <div class="space-y-4 border-t md:border-t-0 md:border-l border-gray-200 pt-6 md:pt-0 md:pl-8 flex flex-col justify-between">
                                            <div>
                                                <h4 class="font-bold text-gray-900 border-b border-gray-200 pb-2 uppercase text-xs tracking-wider">Hành động kiểm duyệt</h4>
                                                
                                                <div class="mt-4 p-4 rounded-2xl border border-gray-200 bg-white">
                                                    <form action="{{ route('admin.reviews.reject', $review->id) }}" method="POST" class="space-y-4">
                                                        @csrf
                                                        <div>
                                                            <label for="admin_note_{{ $review->id }}" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Lý do từ chối (Ghi chú nội bộ)</label>
                                                            <textarea name="admin_note" id="admin_note_{{ $review->id }}" rows="3" placeholder="Ví dụ: Đánh giá chứa từ ngữ thô tục hoặc spam..." 
                                                                      class="w-full px-3 py-2 text-xs border border-gray-300 rounded-xl focus:ring-1 focus:ring-primary focus:border-primary outline-none transition font-normal">{{ $review->admin_note }}</textarea>
                                                        </div>
                                                        <div class="flex gap-2">
                                                            <button type="submit" class="flex-grow bg-rose-50 text-rose-700 border border-rose-200 hover:bg-rose-100 font-bold py-2 px-4 rounded-xl text-xs transition cursor-pointer">
                                                                Từ chối đánh giá
                                                            </button>
                                                        </form>

                                                        @if($review->status !== 'approved')
                                                            <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST" class="inline flex-grow">
                                                                @csrf
                                                                <button type="submit" class="w-full bg-emerald-650 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded-xl text-xs transition cursor-pointer">
                                                                    Phê duyệt công khai
                                                                </button>
                                                            </form>
                                                        @endif
                                                        </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Additional internal stats -->
                                            <div class="text-xs text-gray-400 font-normal">
                                                <p>Được tạo lúc: {{ $review->created_at }}</p>
                                                <p>Cập nhật lần cuối: {{ $review->updated_at }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-12 text-center text-gray-400 italic">
                                    Không có đánh giá nào phù hợp với bộ lọc.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($reviews->hasPages())
                <div class="p-6 border-t border-gray-100 bg-gray-50/50">
                    {{ $reviews->links() }}
                </div>
            @endif
        </div>

    </div>
</div>
@endsection

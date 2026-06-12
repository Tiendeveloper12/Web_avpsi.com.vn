@extends('layouts.app')

@section('title', 'Quản Lý Liên Hệ - Âu Việt Phát')

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
                        <span class="ml-1 text-primary font-medium md:ml-2">Quản lý liên hệ</span>
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
                <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Quản lý liên hệ khách hàng</h1>
                <p class="text-sm text-gray-500 mt-1">Xem, lọc, quản lý trạng thái đọc và đánh dấu quan trọng các tin nhắn gửi từ form liên hệ.</p>
            </div>
            @if($stats['unread'] > 0)
                <div>
                    <form action="{{ route('admin.contacts.mark_all_read') }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn đánh dấu tất cả tin nhắn là đã đọc?')">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-2 bg-primary text-white px-5 py-3 rounded-xl font-bold hover:bg-primary-dark transition-all duration-200 shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l8-4.8a2 2 0 012.22 0l8 4.8A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-2.25-1.5a2 2 0 00-2.22 0l-2.25 1.5"></path></svg>
                            Đánh dấu tất cả đã đọc ({{ $stats['unread'] }})
                        </button>
                    </form>
                </div>
            @endif
        </div>

        <!-- Stats Overview Widgets -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <!-- Total Card -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0V9a2 2 0 00-2-2H6a2 2 0 00-2 2v4m16 0h-1.586a1 1 0 01-.707-.293l-2.414-2.414a1 1 0 00-.707-.293h-3.172a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293H4"></path></svg>
                </div>
                <div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-wider">Tổng thư gửi</div>
                    <div class="text-2xl font-black text-gray-900 mt-0.5">{{ $stats['total'] }}</div>
                </div>
            </div>

            <!-- Unread Card -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-wider">Chưa đọc</div>
                    <div class="text-2xl font-black text-amber-600 mt-0.5">{{ $stats['unread'] }}</div>
                </div>
            </div>

            <!-- Read Card -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l8-4.8a2 2 0 012.22 0l8 4.8A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5"></path></svg>
                </div>
                <div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-wider">Đã đọc</div>
                    <div class="text-2xl font-black text-emerald-600 mt-0.5">{{ $stats['read'] }}</div>
                </div>
            </div>

            <!-- Flagged/Important Card -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
                <div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-wider">Quan trọng</div>
                    <div class="text-2xl font-black text-rose-600 mt-0.5">{{ $stats['flagged'] }}</div>
                </div>
            </div>
        </div>

        <!-- Filters Box -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm mb-8">
            <form action="{{ route('admin.contacts.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tìm kiếm tin nhắn</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Tên, email, SĐT, nội dung..." class="w-full h-11 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Trạng thái đọc</label>
                    <select name="read" class="w-full h-11 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-bold text-gray-700 cursor-pointer">
                        <option value="">Tất cả trạng thái</option>
                        <option value="0" {{ request('read') === '0' ? 'selected' : '' }}>Chưa đọc</option>
                        <option value="1" {{ request('read') === '1' ? 'selected' : '' }}>Đã đọc</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Đánh dấu nổi bật</label>
                    <select name="flagged" class="w-full h-11 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-bold text-gray-700 cursor-pointer">
                        <option value="">Tất cả tin nhắn</option>
                        <option value="1" {{ request('flagged') === '1' ? 'selected' : '' }}>Quan trọng</option>
                        <option value="0" {{ request('flagged') === '0' ? 'selected' : '' }}>Thường</option>
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-grow h-11 bg-dark text-white rounded-xl text-sm font-bold hover:bg-gray-800 transition-colors">
                        Lọc kết quả
                    </button>
                    @if(request('search') || request('read') !== null && request('read') !== '' || request('flagged') !== null && request('flagged') !== '')
                        <a href="{{ route('admin.contacts.index') }}" class="h-11 px-4 border border-gray-200 text-gray-500 hover:text-gray-700 hover:bg-gray-50 rounded-xl text-sm font-bold flex items-center justify-center transition-colors" title="Xóa bộ lọc">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 8H18.5"></path></svg>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Contacts Table / List -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden" x-data="{ activeMsg: null }">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-xs font-bold uppercase tracking-wider text-gray-400">
                            <th class="py-4 px-6 w-10"></th> <!-- Flag/Star status -->
                            <th class="py-4 px-6">Khách hàng</th>
                            <th class="py-4 px-6">Thông tin liên hệ</th>
                            <th class="py-4 px-6">Xem trước nội dung</th>
                            <th class="py-4 px-6">Thời gian gửi</th>
                            <th class="py-4 px-6 text-right">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm font-medium text-gray-700">
                        @forelse($contacts as $contact)
                            <!-- Main Row -->
                            <tr class="hover:bg-gray-50/50 transition-colors cursor-pointer {{ !$contact->read ? 'bg-amber-50/20 font-bold' : '' }}" 
                                @click="activeMsg = activeMsg === {{ $contact->id }} ? null : {{ $contact->id }}">
                                
                                <!-- Flag Star Column -->
                                <td class="py-4 px-6 text-center" @click.stop>
                                    <form action="{{ route('admin.contacts.toggle_flag', $contact->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="focus:outline-none transition-transform hover:scale-110">
                                            @if($contact->flagged)
                                                <svg class="w-5 h-5 text-rose-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                            @else
                                                <svg class="w-5 h-5 text-gray-300 hover:text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.837-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                                            @endif
                                        </button>
                                    </form>
                                </td>

                                <!-- Customer Info -->
                                <td class="py-4 px-6">
                                    <div class="text-sm font-semibold text-gray-900">{{ $contact->name }}</div>
                                </td>

                                <!-- Contact Details -->
                                <td class="py-4 px-6">
                                    <div class="flex flex-col gap-0.5 text-xs">
                                        <a href="mailto:{{ $contact->email }}" class="text-gray-500 hover:text-primary flex items-center gap-1 font-medium" @click.stop>
                                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                            {{ $contact->email }}
                                        </a>
                                        @if($contact->phone)
                                            <a href="tel:{{ $contact->phone }}" class="text-gray-500 hover:text-primary flex items-center gap-1 font-medium" @click.stop>
                                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                                {{ $contact->phone }}
                                            </a>
                                        @endif
                                    </div>
                                </td>

                                <!-- Snippet -->
                                <td class="py-4 px-6 text-gray-500 max-w-xs truncate">
                                    {{ Str::limit($contact->content, 60) }}
                                </td>

                                <!-- Timestamp -->
                                <td class="py-4 px-6 text-xs text-gray-400">
                                    {{ \Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}
                                    <div class="text-[10px]">{{ \Carbon\Carbon::parse($contact->created_at)->format('H:i d/m/Y') }}</div>
                                </td>

                                <!-- Quick Actions -->
                                <td class="py-4 px-6 text-right" @click.stop>
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Read/Unread Toggle Button -->
                                        <form action="{{ route('admin.contacts.toggle_read', $contact->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="p-2 rounded-lg transition-colors {{ $contact->read ? 'text-gray-400 hover:text-amber-500 hover:bg-gray-100' : 'text-amber-600 hover:text-emerald-600 hover:bg-amber-50' }}" title="{{ $contact->read ? 'Đánh dấu là chưa đọc' : 'Đánh dấu là đã đọc' }}">
                                                @if($contact->read)
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                                @else
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.334 4z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z"></path></svg>
                                                @endif
                                            </button>
                                        </form>

                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa vĩnh viễn tin nhắn này không?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Xóa thư">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Expandable Message Detail View -->
                            <tr x-show="activeMsg === {{ $contact->id }}" x-transition style="display: none;" class="bg-gray-50/70 border-t border-gray-100">
                                <td colspan="6" class="p-6">
                                    <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-inner max-w-3xl mx-auto">
                                        <div class="flex items-start justify-between border-b border-gray-100 pb-4 mb-4">
                                            <div>
                                                <div class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Chi tiết liên hệ</div>
                                                <h3 class="text-lg font-black text-gray-900">{{ $contact->name }}</h3>
                                                <div class="flex flex-wrap gap-4 mt-2 text-sm text-gray-600">
                                                    <span class="flex items-center gap-1.5">
                                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                                        Email: <a href="mailto:{{ $contact->email }}" class="text-primary font-semibold hover:underline">{{ $contact->email }}</a>
                                                    </span>
                                                    @if($contact->phone)
                                                        <span class="flex items-center gap-1.5">
                                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                                            SĐT: <a href="tel:{{ $contact->phone }}" class="text-primary font-semibold hover:underline">{{ $contact->phone }}</a>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="text-right text-xs text-gray-400">
                                                <div>Gửi lúc: {{ \Carbon\Carbon::parse($contact->created_at)->format('H:i:s d/m/Y') }}</div>
                                                <div class="mt-1 font-semibold text-gray-500">ID tin nhắn: #{{ $contact->id }}</div>
                                            </div>
                                        </div>

                                        <div class="mb-6">
                                            <div class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-2">Nội dung tin nhắn</div>
                                            <div class="p-4 bg-gray-50 rounded-xl text-gray-700 leading-relaxed text-sm whitespace-pre-wrap border border-gray-100 font-medium">
                                                {{ $contact->content }}
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                            <div class="flex items-center gap-2">
                                                <!-- Action forms for the detail pane -->
                                                <form action="{{ route('admin.contacts.toggle_read', $contact->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-xs font-bold transition-colors">
                                                        {{ $contact->read ? 'Đánh dấu chưa đọc' : 'Đánh dấu đã đọc' }}
                                                    </button>
                                                </form>

                                                <form action="{{ route('admin.contacts.toggle_flag', $contact->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="px-4 py-2 border border-gray-200 hover:bg-gray-50 text-gray-600 rounded-lg text-xs font-bold transition-colors flex items-center gap-1.5">
                                                        <svg class="w-4 h-4 {{ $contact->flagged ? 'text-rose-500' : 'text-gray-400' }}" fill="{{ $contact->flagged ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.837-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                                                        {{ $contact->flagged ? 'Hủy đánh dấu quan trọng' : 'Đánh dấu quan trọng' }}
                                                    </button>
                                                </form>
                                            </div>

                                            <div class="flex items-center gap-2">
                                                <a href="mailto:{{ $contact->email }}?subject=Phản hồi từ Âu Việt Phát&body=Xin chào {{ $contact->name }}," class="px-4 py-2 bg-primary hover:bg-primary-dark text-white rounded-lg text-xs font-bold transition-all shadow-sm flex items-center gap-1">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
                                                    Trả lời email
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 px-6 text-center text-gray-400">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0V9a2 2 0 00-2-2H6a2 2 0 00-2 2v4m16 0h-1.586a1 1 0 01-.707-.293l-2.414-2.414a1 1 0 00-.707-.293h-3.172a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293H4"></path></svg>
                                        <span class="text-sm font-bold">Không tìm thấy thư liên hệ nào phù hợp.</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            @if($contacts->hasPages())
                <div class="py-4 px-6 border-t border-gray-100 bg-gray-50/50">
                    {{ $contacts->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

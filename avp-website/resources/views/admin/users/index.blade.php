@extends('layouts.app')

@section('title', 'Quản Lý Thành Viên - Âu Việt Phát')

@section('content')
<div class="bg-gray-50 min-h-screen py-12" x-data="{ 
    roleModalOpen: false, 
    passwordModalOpen: false,
    selectedUser: {},
    openRoleModal(user) {
        this.selectedUser = user;
        this.roleModalOpen = true;
    },
    openPasswordModal(user) {
        this.selectedUser = user;
        this.passwordModalOpen = true;
    }
}">
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
                        <span class="ml-1 text-primary font-medium md:ml-2">Quản lý thành viên</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Flash Notifications -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-xl text-emerald-800 flex items-center gap-3 shadow-sm">
                <svg class="w-6 h-6 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div class="text-sm font-semibold">{{ session('success') }}</div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-rose-50 border-l-4 border-rose-500 rounded-xl text-rose-800 flex flex-col gap-1 shadow-sm">
                @foreach($errors->all() as $error)
                    <div class="text-sm font-semibold flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-600"></span>
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Page Header & Actions -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Quản lý thành viên</h1>
                <p class="text-sm text-gray-500 mt-1">Quản lý danh sách người dùng, phân quyền quản trị, đặt lại mật khẩu và khóa/mở khóa tài khoản.</p>
            </div>
        </div>

        <!-- Stats Overview Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
            <!-- Total -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Tổng thành viên</p>
                    <p class="text-2xl font-black text-gray-950 mt-0.5">{{ $stats['total'] }}</p>
                </div>
            </div>

            <!-- Super Admin -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex items-center gap-4 border-l-4 border-l-purple-500">
                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-purple-500 uppercase tracking-wider">Super Admin</p>
                    <p class="text-2xl font-black text-gray-950 mt-0.5">{{ $stats['super_admin'] }}</p>
                </div>
            </div>

            <!-- Admin -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex items-center gap-4 border-l-4 border-l-blue-500">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-blue-500 uppercase tracking-wider">Quản trị viên (Admin)</p>
                    <p class="text-2xl font-black text-gray-950 mt-0.5">{{ $stats['admin'] }}</p>
                </div>
            </div>

            <!-- Customers -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex items-center gap-4 border-l-4 border-l-gray-400">
                <div class="w-12 h-12 bg-gray-50 text-gray-600 rounded-xl flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Khách hàng</p>
                    <p class="text-2xl font-black text-gray-950 mt-0.5">{{ $stats['customer'] }}</p>
                </div>
            </div>

            <!-- Suspended -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex items-center gap-4 border-l-4 border-l-rose-500">
                <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-xl flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-rose-500 uppercase tracking-wider">Bị khóa</p>
                    <p class="text-2xl font-black text-gray-950 mt-0.5">{{ $stats['suspended'] }}</p>
                </div>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm mb-8">
            <form action="{{ route('admin.users.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tìm kiếm thành viên</label>
                    <input type="text" name="search" value="{{ $search }}" placeholder="Tên, Email hoặc Số điện thoại..." class="w-full h-11 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-medium">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Vai trò</label>
                    <select name="role" class="w-full h-11 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-bold text-gray-700 cursor-pointer">
                        <option value="">Tất cả vai trò</option>
                        <option value="0" {{ $role === '0' ? 'selected' : '' }}>Khách hàng (Customer)</option>
                        <option value="1" {{ $role === '1' ? 'selected' : '' }}>Quản trị viên (Admin)</option>
                        <option value="2" {{ $role === '2' ? 'selected' : '' }}>Quản trị cấp cao (Super Admin)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Trạng thái tài khoản</label>
                    <select name="status" class="w-full h-11 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary text-sm font-bold text-gray-700 cursor-pointer">
                        <option value="">Tất cả trạng thái</option>
                        <option value="active" {{ $status === 'active' ? 'selected' : '' }}>Hoạt động (Active)</option>
                        <option value="suspended" {{ $status === 'suspended' ? 'selected' : '' }}>Bị khóa (Suspended)</option>
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-grow h-11 bg-dark text-white rounded-xl text-sm font-bold hover:bg-gray-800 transition-colors cursor-pointer">
                        Lọc kết quả
                    </button>
                    @if($search || $role !== null || $status)
                        <a href="{{ route('admin.users.index') }}" class="h-11 px-4 border border-gray-200 text-gray-500 hover:text-gray-700 hover:bg-gray-50 rounded-xl text-sm font-bold flex items-center justify-center transition-colors" title="Xóa bộ lọc">
                            ✕
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Users Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-xs font-bold uppercase tracking-wider text-gray-400">
                            <th class="py-4 px-6 w-12 text-center"></th>
                            <th class="py-4 px-6">Họ tên / Email</th>
                            <th class="py-4 px-6">Số điện thoại</th>
                            <th class="py-4 px-6">Vai trò</th>
                            <th class="py-4 px-6">Trạng thái</th>
                            <th class="py-4 px-6">Đơn mua</th>
                            <th class="py-4 px-6">Ngày đăng ký</th>
                            <th class="py-4 px-6 text-right">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody x-data="{ expandedUser: null }" class="divide-y divide-gray-100 text-sm font-medium text-gray-700">
                        @forelse($users as $user)
                            <!-- Main Row -->
                            <tr class="hover:bg-gray-50/50 transition-colors cursor-pointer" @click="expandedUser = (expandedUser === {{ $user->id }} ? null : {{ $user->id }})">
                                <!-- Expand indicator -->
                                <td class="py-4 px-6 text-center" @click.stop>
                                    <button @click="expandedUser = (expandedUser === {{ $user->id }} ? null : {{ $user->id }})" class="focus:outline-none text-gray-400 hover:text-gray-700">
                                        <svg class="w-4 h-4 transition-transform duration-200" :class="expandedUser === {{ $user->id }} ? 'rotate-90' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                    </button>
                                </td>

                                <!-- User Info -->
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold text-sm select-none uppercase">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900">{{ $user->name }}</p>
                                            <p class="text-xs text-gray-400 font-normal">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Phone -->
                                <td class="py-4 px-6 text-gray-500 font-normal">
                                    {{ $user->phone ?: '-' }}
                                </td>

                                <!-- Role Badge -->
                                <td class="py-4 px-6">
                                    @if($user->role_id == 2)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-purple-50 text-purple-700 border border-purple-200">
                                            Super Admin
                                        </span>
                                    @elseif($user->role_id == 1)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200">
                                            Admin
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-gray-50 text-gray-700 border border-gray-200">
                                            Khách hàng
                                        </span>
                                    @endif
                                </td>

                                <!-- Status Badge -->
                                <td class="py-4 px-6">
                                    @if($user->status === 'suspended')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                            Bị khóa
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Hoạt động
                                        </span>
                                    @endif
                                </td>

                                <!-- Orders Count -->
                                <td class="py-4 px-6 text-gray-500 font-semibold">
                                    {{ $orderCounts[$user->id] ?? 0 }} đơn
                                </td>

                                <!-- Join Date -->
                                <td class="py-4 px-6 text-xs text-gray-400 font-normal">
                                    {{ $user->created_at ? \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') : '-' }}
                                </td>

                                <!-- Actions -->
                                <td class="py-4 px-6 text-right font-normal" @click.stop>
                                    @if($user->id !== Auth::id())
                                        <div class="flex items-center justify-end gap-2">
                                            <!-- Edit Role Trigger -->
                                            <button @click="openRoleModal({ id: {{ $user->id }}, name: '{{ $user->name }}', role_id: {{ $user->role_id }} })" 
                                                    class="w-8 h-8 rounded-lg bg-gray-50 hover:bg-gray-100 text-gray-600 flex items-center justify-center transition cursor-pointer" 
                                                    title="Thay đổi vai trò">
                                                ⚙
                                            </button>

                                            <!-- Reset Password Trigger -->
                                            <button @click="openPasswordModal({ id: {{ $user->id }}, name: '{{ $user->name }}' })" 
                                                    class="w-8 h-8 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-600 flex items-center justify-center transition cursor-pointer" 
                                                    title="Đặt lại mật khẩu">
                                                🔑
                                            </button>

                                            <!-- Toggle Status (Lock/Unlock) -->
                                            <form action="{{ route('admin.users.toggle_status', $user->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" 
                                                        class="w-8 h-8 rounded-lg flex items-center justify-center transition cursor-pointer {{ $user->status === 'suspended' ? 'bg-emerald-50 hover:bg-emerald-100 text-emerald-600' : 'bg-amber-50 hover:bg-amber-100 text-amber-600' }}"
                                                        title="{{ $user->status === 'suspended' ? 'Mở khóa tài khoản' : 'Khóa tài khoản' }}">
                                                    @if($user->status === 'suspended')
                                                        🔓
                                                    @else
                                                        🔒
                                                    @endif
                                                </button>
                                            </form>

                                            <!-- Delete User -->
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tài khoản của {{ $user->name }}? Mọi đơn hàng liên quan sẽ được giữ lại nhưng sẽ không còn liên kết với tài khoản này. Hành động này không thể hoàn tác!')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-8 h-8 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-600 flex items-center justify-center transition cursor-pointer" title="Xóa vĩnh viễn">
                                                    🗑
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-xs text-gray-400 italic">Tài khoản của bạn</span>
                                    @endif
                                </td>
                            </tr>

                            <!-- Expand Detail Row -->
                            <tr x-show="expandedUser === {{ $user->id }}" class="bg-gray-50/70" style="display: none;" @click.stop>
                                <td colspan="8" class="p-6">
                                    <div class="space-y-4 max-w-4xl text-sm font-medium">
                                        <h4 class="font-bold text-gray-900 border-b border-gray-200 pb-2 uppercase text-xs tracking-wider">Thông tin chi tiết</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div class="space-y-1.5">
                                                <p><span class="text-gray-500 font-bold">Địa chỉ đăng ký nhận hàng:</span></p>
                                                <div class="bg-white p-3 rounded-xl border border-gray-200 text-gray-700 shadow-inner min-h-[50px] font-normal leading-relaxed">
                                                    {{ $user->address ?: 'Chưa cập nhật địa chỉ giao nhận.' }}
                                                </div>
                                            </div>
                                            <div class="space-y-1.5">
                                                <p><span class="text-gray-500 font-bold">Ghi chú hệ thống:</span></p>
                                                <p>Thành viên này đã thực hiện tổng cộng <span class="font-bold text-gray-900">{{ $orderCounts[$user->id] ?? 0 }} đơn đặt hàng</span> trên website.</p>
                                                <p>ID tài khoản: <span class="font-mono text-xs bg-gray-200 px-1.5 py-0.5 rounded">{{ $user->id }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-12 text-center text-gray-400 italic">
                                    Không tìm thấy thành viên nào phù hợp với bộ lọc.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($users->hasPages())
                <div class="p-6 border-t border-gray-100 bg-gray-50/50">
                    {{ $users->links() }}
                </div>
            @endif
        </div>

    </div>

    <!-- Edit Role Modal -->
    <div x-show="roleModalOpen" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50"
         style="display: none;"
         x-transition>
        <div class="bg-white rounded-3xl p-6 md:p-8 max-w-md w-full shadow-2xl border border-gray-100" @click.outside="roleModalOpen = false">
            <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-6">
                <h3 class="text-lg font-black text-gray-900 uppercase">Thay đổi vai trò thành viên</h3>
                <button @click="roleModalOpen = false" class="text-gray-400 hover:text-gray-600 text-xl cursor-pointer">✕</button>
            </div>
            
            <form :action="'/admin/users/' + selectedUser.id + '/role'" method="POST" class="space-y-6">
                @csrf
                <div>
                    <p class="text-sm text-gray-500 mb-4">Bạn đang thay đổi phân quyền cho thành viên: <span class="font-bold text-gray-900" x-text="selectedUser.name"></span></p>
                    
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Chọn vai trò mới</label>
                    <select name="role_id" x-model="selectedUser.role_id" class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary text-sm font-bold text-gray-700 cursor-pointer">
                        <option value="0">Khách hàng (Customer)</option>
                        <option value="1">Quản trị viên (Admin)</option>
                        <option value="2">Quản trị cấp cao (Super Admin)</option>
                    </select>
                </div>

                <div class="flex gap-3">
                    <button type="button" @click="roleModalOpen = false" class="flex-1 border border-gray-200 hover:bg-gray-50 font-bold py-3 rounded-xl text-sm transition cursor-pointer">
                        Hủy
                    </button>
                    <button type="submit" class="flex-1 bg-primary hover:bg-primary-dark text-white font-bold py-3 rounded-xl text-sm transition shadow-lg shadow-primary/10 cursor-pointer">
                        Lưu thay đổi
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Reset Password Modal -->
    <div x-show="passwordModalOpen" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50"
         style="display: none;"
         x-transition>
        <div class="bg-white rounded-3xl p-6 md:p-8 max-w-md w-full shadow-2xl border border-gray-100" @click.outside="passwordModalOpen = false">
            <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-6">
                <h3 class="text-lg font-black text-gray-900 uppercase">🔑 Đặt lại mật khẩu thành viên</h3>
                <button @click="passwordModalOpen = false" class="text-gray-400 hover:text-gray-600 text-xl cursor-pointer">✕</button>
            </div>
            
            <form :action="'/admin/users/' + selectedUser.id + '/reset-password'" method="POST" class="space-y-5">
                @csrf
                <p class="text-sm text-gray-500">Đặt lại mật khẩu cho thành viên: <span class="font-bold text-gray-900" x-text="selectedUser.name"></span></p>
                
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Mật khẩu mới</label>
                    <input type="password" name="password" required placeholder="Nhập mật khẩu từ 6 ký tự..." 
                           class="w-full h-11 px-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary text-sm font-medium">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Xác nhận mật khẩu mới</label>
                    <input type="password" name="password_confirmation" required placeholder="Nhập lại mật khẩu mới..." 
                           class="w-full h-11 px-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary text-sm font-medium">
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button" @click="passwordModalOpen = false" class="flex-1 border border-gray-200 hover:bg-gray-50 font-bold py-3 rounded-xl text-sm transition cursor-pointer">
                        Hủy
                    </button>
                    <button type="submit" class="flex-1 bg-primary hover:bg-primary-dark text-white font-bold py-3 rounded-xl text-sm transition shadow-lg shadow-primary/10 cursor-pointer">
                        Đổi mật khẩu
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

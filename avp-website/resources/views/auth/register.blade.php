@extends('layouts.app')

@section('title', 'Đăng ký tài khoản - Âu Việt Phát')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 tracking-tight">
                Đăng ký tài khoản mới
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Đã có tài khoản?
                <a href="{{ route('login') }}" class="font-medium text-primary hover:text-primary-dark transition-colors">
                    Đăng nhập tại đây
                </a>
            </p>
        </div>

        <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Họ và tên</label>
                    <input id="name" name="name" type="text" autocomplete="name" required 
                        value="{{ old('name') }}"
                        class="appearance-none relative block w-full px-4 py-3 border @error('name') border-red-500 @else border-gray-200 @enderror placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 sm:text-sm" 
                        placeholder="Nguyễn Văn A">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email-address" class="block text-sm font-semibold text-gray-700 mb-1">Địa chỉ Email</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required 
                        value="{{ old('email') }}"
                        class="appearance-none relative block w-full px-4 py-3 border @error('email') border-red-500 @else border-gray-200 @enderror placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 sm:text-sm" 
                        placeholder="ten@viethu.com">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Mật khẩu</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required 
                        class="appearance-none relative block w-full px-4 py-3 border @error('password') border-red-500 @else border-gray-200 @enderror placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 sm:text-sm" 
                        placeholder="••••••••">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">Xác nhận mật khẩu</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required 
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 sm:text-sm" 
                        placeholder="••••••••">
                </div>
            </div>

            <div>
                <button type="submit" 
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-dark bg-[#facc15] hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-300 shadow-md">
                    Đăng ký tài khoản
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

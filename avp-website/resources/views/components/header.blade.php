<header class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
    <!-- Top Bar -->
    <div class="bg-primary text-white py-2 text-xs">
        <div class="container-custom flex justify-between items-center">
            <div class="flex items-center gap-6">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    028 3550 0122
                </span>
                <span class="hidden md:flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Giờ làm việc: 8:00 - 20:00
                </span>
            </div>
            <div class="flex items-center gap-4">
                <a href="#" class="hover:text-primary-light">Tra cứu đơn hàng</a>
                <span class="text-white/30">|</span>
                <a href="#" class="hover:text-primary-light">Hệ thống showroom</a>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="py-4 bg-white">
        <div class="container-custom flex items-center justify-between gap-8">
            <!-- Logo -->
            <a href="/" class="flex-shrink-0">
                <div class="flex items-center gap-2">
                    <div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center text-white font-bold text-2xl shadow-lg">AVP</div>
                    <div class="hidden lg:block">
                        <h1 class="text-xl font-bold text-dark leading-tight">Âu Việt Phát</h1>
                        <p class="text-[10px] text-gray-400 uppercase tracking-widest font-semibold">Technology Solutions</p>
                    </div>
                </div>
            </a>

            <!-- Search -->
            <div class="flex-grow max-w-2xl relative group">
                <form action="#" method="GET" class="relative">
                    <input type="text" placeholder="Bạn cần tìm sản phẩm gì..." 
                        class="w-full h-12 pl-12 pr-4 rounded-full border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-primary outline-none transition-all duration-300 shadow-sm group-hover:shadow-md">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-primary transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 bg-primary text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-primary-dark transition-colors shadow-md">
                        Tìm kiếm
                    </button>
                </form>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-6">
                <a href="#" class="flex flex-col items-center gap-1 text-gray-600 hover:text-primary transition-colors">
                    <div class="relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <span class="text-xs font-medium">Tài khoản</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-1 text-gray-600 hover:text-primary transition-colors">
                    <div class="relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-bold border-2 border-white shadow-sm">0</span>
                    </div>
                    <span class="text-xs font-medium">Giỏ hàng</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-dark border-t border-gray-800 hidden md:block">
        <div class="container-custom">
            <ul class="flex items-center gap-8 py-3">
                <li>
                    <a href="#" class="flex items-center gap-2 text-highlight font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        DANH MỤC SẢN PHẨM
                    </a>
                </li>
                @php
                    $menus = [
                        ['title' => 'TRANG CHỦ', 'url' => '/'],
                        ['title' => 'LAPTOP/DESKTOP', 'url' => '#'],
                        ['title' => 'MÁY VĂN PHÒNG', 'url' => '#'],
                        ['title' => 'MỰC IN', 'url' => '#'],
                        ['title' => 'DỊCH VỤ', 'url' => '#'],
                        ['title' => 'TIN TỨC', 'url' => '#'],
                        ['title' => 'LIÊN HỆ', 'url' => '#'],
                    ];
                @endphp
                @foreach($menus as $item)
                    <li>
                        <a href="{{ $item['url'] }}" class="text-sm font-semibold text-gray-200 hover:text-highlight transition-colors tracking-wide uppercase">
                            {{ $item['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>

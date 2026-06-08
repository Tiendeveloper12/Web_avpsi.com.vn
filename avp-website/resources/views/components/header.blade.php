<header x-data="{ isScrolled: false }" 
        @scroll.window="isScrolled = (window.pageYOffset > 50)"
        class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-[100] transition-all duration-300">
    
    <!-- Top Bar -->
    <div x-show="!isScrolled" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-full"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-full"
         class="bg-primary text-white py-2 text-xs">
        <div class="container-custom flex justify-between items-center">
            <div class="flex items-center gap-6">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    0912 97 9394 / 0903 111 052
                </span>
                <span class="hidden md:flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Giờ làm việc: 7:45 - 11:45, 13:00 - 17:00
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
    <div :class="isScrolled ? 'py-2' : 'py-4'" class="container-custom flex items-center justify-between gap-4 md:gap-6 lg:gap-8 transition-all duration-300">
        <a href="/" class="flex-shrink-0">
            <img src="{{ asset('images/logo_header.jpg') }}" alt="Âu Việt Phát Logo" class="h-8 md:h-10 lg:h-14 w-auto object-contain transition-all">
        </a>

        <!-- Search -->
        <div class="flex-grow max-w-2xl relative group" 
             x-data="productSearch()" 
             @click.outside="showDropdown = false">
            <form action="{{ route('products.index') }}" method="GET" class="relative">
                <input type="text" name="search"
                    x-model="query"
                    @input.debounce.500ms="fetchResults"
                    @focus="showDropdown = true"
                    placeholder="Bạn cần tìm sản phẩm gì..." 
                    autocomplete="off"
                    class="w-full h-12 pl-12 pr-4 rounded-full border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-primary outline-none transition-all duration-300 shadow-sm group-hover:shadow-md">
                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-primary transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 bg-[#facc15] text-dark px-6 py-2 rounded-full text-sm font-bold hover:bg-yellow-300 transition-colors shadow-md">
                    Tìm kiếm
                </button>
            </form>
            
            <!-- Search Dropdown -->
            <div x-show="showDropdown && query.length > 1" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-2"
                 class="absolute top-full left-0 right-0 mt-2 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden z-50"
                 style="display: none;" x-cloak>
                 
                <!-- Loading State -->
                <div x-show="isLoading" class="p-4 text-center text-gray-500">
                    <svg class="animate-spin h-6 w-6 mx-auto text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <p class="mt-2 text-sm">Đang tìm kiếm...</p>
                </div>

                <!-- Results -->
                <div x-show="!isLoading && results.length > 0" class="max-h-[60vh] overflow-y-auto">
                    <template x-for="item in results" :key="item.id">
                        <a :href="'/products/' + item.id" class="flex items-center gap-4 p-3 hover:bg-gray-50 transition-colors border-b border-gray-50 last:border-0">
                            <div class="w-12 h-12 flex-shrink-0 bg-white border border-gray-100 rounded flex items-center justify-center p-1">
                                <img :src="item.image ? '{{ asset('images/products') }}/' + item.image : '{{ asset('images/placeholder.png') }}'" 
                                     :alt="item.title" class="w-full h-full object-contain">
                            </div>
                            <div class="flex-grow min-w-0">
                                <h4 class="text-sm font-medium text-gray-900 truncate" x-text="item.title"></h4>
                                <p class="text-sm font-bold text-red-600 mt-1">
                                    <span x-text="item.sell ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(item.sell) : 'Liên hệ'"></span>
                                </p>
                            </div>
                        </a>
                    </template>
                </div>

                <!-- No Results -->
                <div x-show="!isLoading && results.length === 0 && !hasError" class="p-4 text-center text-gray-500">
                    <p class="text-sm">Không tìm thấy sản phẩm nào.</p>
                </div>
                
                <!-- Error State -->
                <div x-show="!isLoading && hasError" class="p-4 text-center text-red-500">
                    <p class="text-sm">Có lỗi xảy ra khi tìm kiếm.</p>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-3 md:gap-4 lg:gap-6">
            @auth
                <!-- User Logged In: Show Dropdown -->
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button @click="open = !open" class="flex flex-col items-center gap-1 text-gray-600 hover:text-primary transition-colors focus:outline-none">
                        <div class="relative">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <span class="text-xs font-medium max-w-[80px] truncate">{{ Auth::user()->name }}</span>
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 mt-2 rounded-xl shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 z-[60] border border-gray-100"
                         style="display: none; width: 10rem;">
                        <div class="px-3 py-2 border-b border-gray-100">
                            <p class="text-[10px] text-gray-500">Xin chào,</p>
                            <p class="text-sm font-bold text-gray-900 truncate">{{ Auth::user()->name }}</p>
                        </div>
                        
                        @if(Auth::user()->email === 'Admin1@gmail.com')
                            <a href="{{ route('admin.orders.index') }}" class="block px-3 py-2.5 text-base font-semibold text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors flex items-center gap-2 border-b border-gray-50" style="white-space: nowrap;">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                Quản lý đơn hàng
                            </a>
                        @endif
                        
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="w-full text-left px-3 py-2.5 text-base font-semibold text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors flex items-center gap-2" style="white-space: nowrap;">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Đăng xuất
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Guest: Link to Login / Register -->
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button @click="open = !open" class="flex flex-col items-center gap-1 text-gray-600 hover:text-primary transition-colors focus:outline-none">
                        <div class="relative">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <span class="text-xs font-medium">Tài khoản</span>
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 mt-2 rounded-xl shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 z-[60] border border-gray-100"
                         style="display: none; width: 10rem;">
                        <a href="{{ route('login') }}" class="block px-3 py-2.5 text-base font-semibold text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors flex items-center gap-2" style="white-space: nowrap;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Đăng nhập
                        </a>
                        <a href="{{ route('register') }}" class="block px-3 py-2.5 text-base font-semibold text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors flex items-center gap-2 border-t border-gray-50" style="white-space: nowrap;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                            Đăng ký
                        </a>
                    </div>
                </div>
            @endauth
            @php
                $cartCount = 0;
                if (session()->has('cart')) {
                    $cartCount = array_sum(session()->get('cart', []));
                }
            @endphp
            <a href="{{ route('cart.index') }}" class="flex flex-col items-center gap-1 text-gray-600 hover:text-primary transition-colors">
                <div class="relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span data-cart-count class="absolute -top-2 -right-2 bg-red-500 text-white text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-bold border-2 border-white shadow-sm">{{ $cartCount }}</span>
                </div>
                <span class="text-xs font-medium">Giỏ hàng</span>
            </a>
        </div>
    </div>

    <!-- Navigation -->
    <nav x-show="!isScrolled" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-y-0"
         x-transition:enter-end="opacity-100 scale-y-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-y-100"
         x-transition:leave-end="opacity-0 scale-y-0"
         class="bg-dark border-t border-gray-800 hidden md:block origin-top">
        <div class="container-custom relative" x-data="{ menuOpen: false, servicesOpen: false }">
            <ul class="flex items-center justify-between py-2">
                <!-- <li>
                    <a href="#" class="flex items-center gap-2.5 text-highlight text-base md:text-lg font-extrabold tracking-wide">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        DANH MỤC SẢN PHẨM
                    </a>
                </li> -->
                @php
                    $menus = [
                        ['title' => 'Trang chủ', 'url' => '/'],
                        ['title' => 'Sản phẩm', 'url' => route('products.index')],
                        ['title' => 'Dịch vụ', 'url' => route('services.index')],
                        ['title' => 'Giới thiệu', 'url' => route('about')],
                        ['title' => 'Liên hệ', 'url' => route('contact.create')],
                    ];
                @endphp
                @foreach($menus as $item)
                    @if($item['title'] === 'Sản phẩm')
                        <li @mouseenter="menuOpen = true" @mouseleave="menuOpen = false">
                            <a href="{{ $item['url'] }}" class="text-xs md:text-sm lg:text-base xl:text-lg font-bold text-gray-200 hover:text-highlight transition-colors tracking-wide uppercase py-2 block">
                                {{ $item['title'] }}
                            </a>
                        </li>
                    @elseif($item['title'] === 'Dịch vụ')
                        <li class="relative" @mouseenter="servicesOpen = true" @mouseleave="servicesOpen = false">
                            <a href="{{ $item['url'] }}" class="text-xs md:text-sm lg:text-base xl:text-lg font-bold text-gray-200 hover:text-highlight transition-colors tracking-wide uppercase py-2 block">
                                {{ $item['title'] }}
                            </a>
                            
                            <!-- Services Dropdown -->
                            <div x-show="servicesOpen"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 translate-y-2"
                                 class="absolute left-0 top-full pt-1 w-80 z-50"
                                 style="display: none;"
                                 x-cloak>
                                <div class="bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden py-3">
                                    @php
                                        $services = [
                                            ['name' => 'Cho thuê máy photocopy', 'slug' => 'cho-thue-may-photocopy', 'url' => '/dich-vu/cho-thue-photocopy'],
                                            ['name' => 'Nạp mực in & photocopy', 'slug' => 'nap-muc-in-photocopy', 'url' => '/dich-vu/nap-muc-in'],
                                            ['name' => 'Thiết kế, thi công hệ thống server', 'slug' => 'he-thong-server'],
                                            ['name' => 'Thiết kế, thi công camera văn phòng - nhà xưởng', 'slug' => 'camera-van-phong'],
                                            ['name' => 'Dịch vụ sửa chữa máy photocopy - máy in', 'slug' => 'sua-chua-may-in', 'url' => '/dich-vu/sua-chua-may-in'],
                                            ['name' => 'Dịch vụ bảo trì, sửa chữa laptop - máy tính để bàn', 'slug' => 'bao-tri-may-tinh', 'url' => '/dich-vu/sua-chua-may-tinh'],
                                            ['name' => 'Cho thuê laptop, máy tính, máy in, máy văn phòng', 'slug' => 'cho-thue-thiet-bi']
                                        ];
                                    @endphp
                                    @foreach($services as $srv)
                                        @php
                                            $srvUrl = isset($srv['url']) ? $srv['url'] : '/category/dich-vu?sub=' . $srv['slug'];
                                        @endphp
                                        <a href="{{ $srvUrl }}" class="group/srv flex items-center gap-2.5 px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-primary/5 hover:text-primary transition-colors duration-150">
                                            <div class="w-1.5 h-1.5 rounded-full bg-gray-200 group-hover/srv:bg-primary transition-all duration-300"></div>
                                            <span>{{ $srv['name'] }}</span>
                                        </a>
                                    @endforeach
                                    <div class="border-t border-gray-100 mt-2 pt-2 px-4">
                                        <a href="/dich-vu" class="inline-flex items-center gap-1.5 text-xs font-bold text-dark hover:text-primary transition-colors uppercase">
                                            Xem tất cả dịch vụ
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="{{ $item['url'] }}" class="text-xs md:text-sm lg:text-base xl:text-lg font-bold text-gray-200 hover:text-highlight transition-colors tracking-wide uppercase">
                                {{ $item['title'] }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>

            <!-- Horizontal Mega Menu -->
            <div x-show="menuOpen"
                 @mouseenter="menuOpen = true"
                 @mouseleave="menuOpen = false"
                 x-transition:enter="transition ease-out duration-250"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-2"
                 class="absolute left-0 right-0 top-full bg-white rounded-b-2xl shadow-2xl border border-t-0 border-gray-100 z-50 py-5 px-6"
                 style="display: none;"
                 x-cloak>
                 @php
                     $categories = [
                         [
                             'title' => 'Máy Photocopy', 
                             'slug' => 'may-photocopy',
                             'icon' => '🖨️', 
                             'subcategories' => ['Ricoh']
                         ],
                         [
                             'title' => 'Mực In', 
                             'slug' => 'muc-in',
                             'icon' => '💧', 
                             'subcategories' => [
                                 ['name' => 'AVP', 'slug' => 'sub-avp'],
                                 ['name' => 'HP', 'slug' => 'sub-hp'],
                                 ['name' => 'Canon', 'slug' => 'sub-canon'],
                                 ['name' => 'Epson', 'slug' => 'sub-epson'],
                                 ['name' => 'Brother', 'slug' => 'sub-brother'],
                                 ['name' => 'Oki', 'slug' => 'sub-oki'],
                                 ['name' => 'Ricoh', 'slug' => 'sub-ricoh'],
                                 ['name' => 'Xerox', 'slug' => 'sub-xerox']
                             ]
                         ],
                         [
                             'title' => 'Máy In', 
                             'slug' => 'may-in',
                             'icon' => '📠', 
                             'subcategories' => [
                                 ['name' => 'Máy in HP', 'slug' => 'sub-hp'],
                                 ['name' => 'Máy in Canon', 'slug' => 'sub-canon'],
                                 ['name' => 'Máy in Epson', 'slug' => 'sub-epson'],
                                 ['name' => 'Máy in Brother', 'slug' => 'sub-brother'],
                                 ['name' => 'Máy in Xerox', 'slug' => 'sub-xerox'],
                                 ['name' => 'Máy in Pantum', 'slug' => 'sub-pantum']
                             ]
                         ],
                         [
                             'title' => 'Laptop / Macbook', 
                             'slug' => 'laptop-macbook',
                             'icon' => '💻', 
                             'subcategories' => [
                                 ['name' => 'Apple MacBook', 'slug' => 'sub-macbook'],
                                 ['name' => 'Laptop ASUS', 'slug' => 'sub-asus'],
                                 ['name' => 'Laptop Dell', 'slug' => 'sub-dell'],
                                 ['name' => 'Laptop HP', 'slug' => 'sub-hp'],
                                 ['name' => 'Laptop Lenovo', 'slug' => 'sub-lenovo'],
                                 ['name' => 'Laptop MSI', 'slug' => 'sub-msi'],
                                 ['name' => 'Laptop Acer', 'slug' => 'sub-acer'],
                                 ['name' => 'Laptop Razer', 'slug' => 'sub-razer'],
                                 ['name' => 'Laptop Microsoft', 'slug' => 'sub-microsoft'],
                                 ['name' => 'Laptop Samsung', 'slug' => 'sub-samsung'],
                                 ['name' => 'Laptop LG', 'slug' => 'sub-lg'],
                                 ['name' => 'Laptop Huawei', 'slug' => 'sub-huawei'],
                                 ['name' => 'Laptop Gigabyte', 'slug' => 'sub-gigabyte']
                             ]
                         ],
                         [
                             'title' => 'Máy tính để bàn', 
                             'slug' => 'may-tinh-de-ban',
                             'icon' => '🖥️', 
                             'subcategories' => [
                                 ['name' => 'Apple', 'slug' => 'sub-apple'],
                                 ['name' => 'Dell', 'slug' => 'sub-dell'],
                                 ['name' => 'HP', 'slug' => 'sub-hp'],
                                 ['name' => 'Lenovo', 'slug' => 'sub-lenovo'],
                                 ['name' => 'ASUS', 'slug' => 'sub-asus'],
                                 ['name' => 'MSI', 'slug' => 'sub-msi'],
                                 ['name' => 'Acer', 'slug' => 'sub-acer'],
                                 ['name' => 'Gigabyte', 'slug' => 'sub-gigabyte'],
                                 ['name' => 'Huawei', 'slug' => 'sub-huawei'],
                                 ['name' => 'Samsung', 'slug' => 'sub-samsung'],
                                 ['name' => 'Khác', 'slug' => 'sub-khac']
                             ]
                         ],
                         [
                             'title' => 'Linh kiện máy tính', 
                             'slug' => 'linh-kien-may-tinh',
                             'icon' => '⚙️', 
                             'subcategories' => [
                                 ['name' => 'Màn hình', 'slug' => 'sub-monitor'],
                                 ['name' => 'RAM', 'slug' => 'sub-ram'],
                                 ['name' => 'SSD/HDD', 'slug' => 'sub-ssd'],
                                 ['name' => 'Bảng mạch chính', 'slug' => 'sub-mainboard'],
                                 ['name' => 'CPU', 'slug' => 'sub-cpu'],
                                 ['name' => 'Card đồ họa', 'slug' => 'sub-gpu'],
                                 ['name' => 'Tai nghe', 'slug' => 'sub-headphone'],
                                 ['name' => 'Bộ phát wifi', 'slug' => 'sub-wifi'],
                                 ['name' => 'Nguồn', 'slug' => 'sub-psu'],
                                 ['name' => 'Bàn phím', 'slug' => 'sub-keyboard'],
                                 ['name' => 'Chuột', 'slug' => 'sub-mouse']
                             ]
                         ],
                         [
                             'title' => 'Thiết bị văn phòng', 
                             'slug' => 'thiet-bi-van-phong',
                             'icon' => '🏢', 
                             'subcategories' => [
                                 ['name' => 'Máy chấm công', 'slug' => 'sub-cham-cong'],
                                 ['name' => 'Máy hủy giấy', 'slug' => 'sub-huy-giay'],
                                 ['name' => 'Máy in bill', 'slug' => 'sub-in-bill'],
                                 ['name' => 'Máy quét / Scanner', 'slug' => 'sub-scan'],
                                 ['name' => 'Máy chiếu', 'slug' => 'sub-chieu'],
                                 ['name' => 'Thiết bị khác', 'slug' => 'sub-khac']
                             ]
                         ],
                         [
                             'title' => 'Thiết bị mạng', 
                             'slug' => 'thiet-bi-mang',
                             'icon' => '🌐', 
                             'subcategories' => [
                                 ['name' => 'Bộ định tuyến Wifi', 'slug' => 'sub-router'],
                                 ['name' => 'Bộ chuyển mạch (Switch)', 'slug' => 'sub-switch'],
                                 ['name' => 'Dây cáp internet', 'slug' => 'sub-cable']
                             ]
                         ],
                         [
                             'title' => 'Camera an ninh', 
                             'slug' => 'camera-an-ninh',
                             'icon' => '📹', 
                             'subcategories' => [
                                 ['name' => 'Hikvision', 'slug' => 'sub-hikvision'],
                                 ['name' => 'IMOU', 'slug' => 'sub-imou'],
                                 ['name' => 'EVI', 'slug' => 'sub-evi'],
                                 ['name' => 'Khác', 'slug' => 'sub-khac']
                             ]
                         ],
                     ];
                 @endphp
                 
                 <div class="grid grid-cols-3 gap-x-6 gap-y-4">
                     @foreach($categories as $cat)
                         <div class="flex flex-col gap-2">
                             <!-- Category Header -->
                             <a href="{{ $cat['slug'] === 'dich-vu' ? '/dich-vu' : '/category/' . $cat['slug'] }}" 
                                class="flex items-center gap-2 text-xs font-extrabold text-dark uppercase tracking-tight hover:text-primary transition-colors border-b border-gray-100 pb-1">
                                 <span class="text-base">{{ $cat['icon'] }}</span>
                                 <span>{{ $cat['title'] }}</span>
                             </a>
                             
                             <!-- Subcategories -->
                             <div class="grid grid-cols-2 gap-x-4 gap-y-1">
                                 @foreach($cat['subcategories'] as $sub)
                                     @php
                                         $subName = is_array($sub) ? $sub['name'] : $sub;
                                         $subSlug = is_array($sub) ? $sub['slug'] : $sub;
                                         $subUrl = is_array($sub) && isset($sub['url']) ? $sub['url'] : '/category/' . $cat['slug'] . '?sub=' . $subSlug;
                                     @endphp
                                     <a href="{{ $subUrl }}" class="group/link flex items-center gap-1.5 text-[11px] font-semibold text-gray-500 hover:text-primary transition-colors duration-150 truncate">
                                         <div class="w-1 h-1 rounded-full bg-gray-200 group-hover/link:bg-primary group-hover/link:scale-125 transition-all duration-200 flex-shrink-0"></div>
                                         <span class="truncate">{{ $subName }}</span>
                                     </a>
                                 @endforeach
                             </div>
                         </div>
                     @endforeach
                 </div>
                 
                 <div class="mt-5 pt-3 border-t border-gray-100 flex justify-between items-center text-[11px] text-gray-400">
                     <p class="font-medium">Âu Việt Phát - Chuyên cung cấp giải pháp thiết bị và linh kiện chính hãng hàng đầu.</p>
                     <a href="{{ route('products.index') }}" class="inline-flex items-center gap-1.5 text-[11px] font-bold text-dark hover:text-primary transition-colors uppercase">
                         Xem tất cả sản phẩm
                         <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                     </a>
                 </div>
            </div>
        </div>
    </nav>
</header>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('productSearch', () => ({
            query: '',
            results: [],
            isLoading: false,
            showDropdown: false,
            hasError: false,
            

            fetchResults() {
                if (this.query.length < 2) {
                    this.results = [];
                    this.showDropdown = false;
                    return;
                }
                
                this.isLoading = true;
                this.showDropdown = true;
                this.hasError = false;
                
                fetch(`/api/search-products?q=${encodeURIComponent(this.query)}`)
                    .then(response => {
                        if (!response.ok) throw new Error('Network response was not ok');
                        return response.json();
                    })
                    .then(data => {
                        this.results = data;
                        this.isLoading = false;
                    })
                    .catch(error => {
                        console.error('Error fetching search results:', error);
                        this.hasError = true;
                        this.isLoading = false;
                        this.results = [];
                    });
            }
        }))
    })
</script>

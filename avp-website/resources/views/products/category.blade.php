@extends('layouts.app')

@section('title', $title . ' - Âu Việt Phát')

@section('content')
    <div class="bg-surface py-12">
        <div class="container-custom">
            <!-- Breadcrumb -->
            <nav class="flex mb-8 text-sm" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home.index') }}" class="text-gray-500 hover:text-primary transition-colors">Trang chủ</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-gray-500 md:ml-2">Danh mục</span>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-dark font-bold md:ml-2">{{ $title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Category Header -->
            <div class="relative overflow-hidden rounded-3xl bg-dark text-white p-12 mb-12 shadow-2xl">
                <div class="absolute inset-0 opacity-10 pointer-events-none">
                    <div class="absolute top-0 right-0 w-96 h-96 bg-primary rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-64 h-64 bg-secondary rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>
                </div>
                
                <div class="relative z-10">
                    <h1 class="text-5xl font-black uppercase tracking-tighter mb-4">{{ $title }}</h1>
                    <p class="text-white/60 text-lg max-w-2xl leading-relaxed">
                        Khám phá bộ sưu tập {{ strtolower($title) }} chính hãng tại Âu Việt Phát. Chúng tôi cam kết cung cấp giải pháp tốt nhất với chi phí tối ưu nhất cho doanh nghiệp của bạn.
                    </p>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Filters (Placeholder) -->
                <aside class="lg:w-64 flex-shrink-0">
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm sticky top-24">
                        <h3 class="font-bold text-dark mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                            Bộ lọc tìm kiếm
                        </h3>
                        
                        <div class="space-y-6">
                            @if($slug === 'thiet-bi-mang')
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Phân loại</h4>
                                    <div class="space-y-2">
                                        @php
                                            $subCats = [
                                                'sub-router' => 'Bộ định tuyến Wifi',
                                                'sub-cable' => 'Dây cáp Internet',
                                                'sub-switch' => 'Bộ chuyển mạch (Switch)',
                                            ];
                                        @endphp
                                        <a href="/category/thiet-bi-mang" class="flex items-center gap-2 text-sm {{ !request('sub') ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                            <div class="w-1.5 h-1.5 rounded-full {{ !request('sub') ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                            Tất cả thiết bị
                                        </a>
                                        @foreach($subCats as $subTag => $subName)
                                            <a href="/category/thiet-bi-mang?sub={{ $subTag }}" class="flex items-center gap-2 text-sm {{ request('sub') === $subTag ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                                <div class="w-1.5 h-1.5 rounded-full {{ request('sub') === $subTag ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                                {{ $subName }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if($slug === 'thiet-bi-van-phong')
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Phân loại</h4>
                                    <div class="space-y-2">
                                        @php
                                            $subCats = [
                                                'sub-cham-cong' => 'Máy chấm công',
                                                'sub-huy-giay' => 'Máy hủy giấy',
                                                'sub-in-bill' => 'Máy in bill',
                                                'sub-scan' => 'Máy quét/scanner',
                                                'sub-chieu' => 'Máy chiếu',
                                                'sub-khac' => 'Thiết bị khác',
                                            ];
                                        @endphp
                                        <a href="/category/thiet-bi-van-phong" class="flex items-center gap-2 text-sm {{ !request('sub') ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                            <div class="w-1.5 h-1.5 rounded-full {{ !request('sub') ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                            Tất cả thiết bị
                                        </a>
                                        @foreach($subCats as $subTag => $subName)
                                            <a href="/category/thiet-bi-van-phong?sub={{ $subTag }}" class="flex items-center gap-2 text-sm {{ request('sub') === $subTag ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                                <div class="w-1.5 h-1.5 rounded-full {{ request('sub') === $subTag ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                                {{ $subName }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if($slug === 'linh-kien-may-tinh')
                                <div class="space-y-6">
                                    <div>
                                        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Loại linh kiện</h4>
                                        <div class="space-y-2">
                                            @php
                                                $compTypes = [
                                                    'sub-monitor' => 'Màn hình',
                                                    'sub-ram' => 'RAM',
                                                    'sub-ssd' => 'SSD/HDD',
                                                    'sub-mainboard' => 'Bảng mạch chính',
                                                    'sub-cpu' => 'CPU',
                                                    'sub-headphone' => 'Tai nghe',
                                                    'sub-wifi' => 'Bộ phát wifi',
                                                    'sub-psu' => 'Nguồn',
                                                    'sub-keyboard' => 'Bàn phím',
                                                    'sub-mouse' => 'Chuột',
                                                    'sub-gpu' => 'Card đồ họa',
                                                ];
                                            @endphp
                                            <a href="/category/linh-kien-may-tinh" class="flex items-center gap-2 text-sm {{ !request('sub') ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                                <div class="w-1.5 h-1.5 rounded-full {{ !request('sub') ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                                Tất cả linh kiện
                                            </a>
                                            @foreach($compTypes as $subTag => $subName)
                                                <a href="/category/linh-kien-may-tinh?sub={{ $subTag }}" class="flex items-center gap-2 text-sm {{ request('sub') === $subTag ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                                    <div class="w-1.5 h-1.5 rounded-full {{ request('sub') === $subTag ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                                    {{ $subName }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>

                                    @if(request('sub'))
                                        @php
                                            $brandsBySub = [
                                                'sub-monitor' => ['sub-lg' => 'LG', 'sub-asus' => 'ASUS', 'sub-msi' => 'MSI', 'sub-acer' => 'Acer', 'sub-samsung' => 'Samsung', 'sub-khac' => 'Khác'],
                                                'sub-ram' => ['sub-corsair' => 'Corsair', 'sub-gskill' => 'G.SKILL', 'sub-crucial' => 'Crucial', 'sub-khac' => 'Khác'],
                                                'sub-ssd' => ['sub-samsung' => 'Samsung', 'sub-seagate' => 'Seagate', 'sub-wd' => 'Western Digital', 'sub-khac' => 'Khác'],
                                                'sub-mainboard' => ['sub-asus' => 'ASUS', 'sub-gigabyte' => 'Gigabyte', 'sub-msi' => 'MSI', 'sub-khac' => 'Khác'],
                                                'sub-cpu' => ['sub-intel' => 'Intel', 'sub-amd' => 'AMD'],
                                                'sub-headphone' => ['sub-gaming' => 'Gaming', 'sub-van-phong' => 'Văn phòng'],
                                                'sub-wifi' => ['sub-tp-link' => 'TP-Link', 'sub-asus' => 'ASUS', 'sub-khac' => 'Khác'],
                                                'sub-psu' => ['sub-corsair' => 'Corsair', 'sub-asus' => 'ASUS', 'sub-msi' => 'MSI', 'sub-gigabyte' => 'Gigabyte', 'sub-khac' => 'Khác'],
                                                'sub-keyboard' => ['sub-gaming' => 'Gaming', 'sub-van-phong' => 'Văn phòng'],
                                                'sub-mouse' => ['sub-gaming' => 'Gaming', 'sub-van-phong' => 'Văn phòng'],
                                            ];
                                            $currentBrands = $brandsBySub[request('sub')] ?? null;
                                        @endphp

                                        @if($currentBrands)
                                            <div>
                                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Thương hiệu / Phân loại</h4>
                                                <div class="space-y-2">
                                                    <a href="/category/linh-kien-may-tinh?sub={{ request('sub') }}" class="flex items-center gap-2 text-sm {{ !request('brand') ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                                        <div class="w-1.5 h-1.5 rounded-full {{ !request('brand') ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                                        Tất cả
                                                    </a>
                                                    @foreach($currentBrands as $brandTag => $brandName)
                                                        <a href="/category/linh-kien-may-tinh?sub={{ request('sub') }}&brand={{ $brandTag }}" class="flex items-center gap-2 text-sm {{ request('brand') === $brandTag ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                                            <div class="w-1.5 h-1.5 rounded-full {{ request('brand') === $brandTag ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                                            {{ $brandName }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            @endif

                            @if($slug === 'may-tinh-de-ban')
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Thương hiệu</h4>
                                    <div class="space-y-2">
                                        @php
                                            $subCats = [
                                                'sub-apple' => 'Apple',
                                                'sub-dell' => 'Dell',
                                                'sub-hp' => 'HP',
                                                'sub-lenovo' => 'Lenovo',
                                                'sub-asus' => 'ASUS',
                                                'sub-msi' => 'MSI',
                                                'sub-acer' => 'Acer',
                                                'sub-gigabyte' => 'Gigabyte',
                                                'sub-huawei' => 'Huawei',
                                                'sub-samsung' => 'Samsung',
                                                'sub-khac' => 'Khác',
                                            ];
                                        @endphp
                                        <a href="/category/may-tinh-de-ban" class="flex items-center gap-2 text-sm {{ !request('sub') ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                            <div class="w-1.5 h-1.5 rounded-full {{ !request('sub') ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                            Tất cả thương hiệu
                                        </a>
                                        @foreach($subCats as $subTag => $subName)
                                            <a href="/category/may-tinh-de-ban?sub={{ $subTag }}" class="flex items-center gap-2 text-sm {{ request('sub') === $subTag ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                                <div class="w-1.5 h-1.5 rounded-full {{ request('sub') === $subTag ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                                {{ $subName }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if($slug === 'laptop-macbook')
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Thương hiệu</h4>
                                    <div class="space-y-2">
                                        @php
                                            $subCats = [
                                                'sub-macbook' => 'MacBook',
                                                'sub-asus' => 'ASUS',
                                                'sub-lenovo' => 'Lenovo',
                                                'sub-dell' => 'Dell',
                                                'sub-hp' => 'HP',
                                                'sub-acer' => 'Acer',
                                                'sub-msi' => 'MSI',
                                                'sub-razer' => 'Razer',
                                                'sub-microsoft' => 'Microsoft',
                                                'sub-lg' => 'LG',
                                                'sub-huawei' => 'Huawei',
                                                'sub-gigabyte' => 'Gigabyte',
                                                'sub-samsung' => 'Samsung',
                                            ];
                                        @endphp
                                        <a href="/category/laptop-macbook" class="flex items-center gap-2 text-sm {{ !request('sub') ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                            <div class="w-1.5 h-1.5 rounded-full {{ !request('sub') ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                            Tất cả thương hiệu
                                        </a>
                                        @foreach($subCats as $subTag => $subName)
                                            <a href="/category/laptop-macbook?sub={{ $subTag }}" class="flex items-center gap-2 text-sm {{ request('sub') === $subTag ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                                <div class="w-1.5 h-1.5 rounded-full {{ request('sub') === $subTag ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                                {{ $subName }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if($slug === 'may-in')
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Thương hiệu</h4>
                                    <div class="space-y-2">
                                        @php
                                            $subCats = [
                                                'sub-hp' => 'HP',
                                                'sub-canon' => 'Canon',
                                                'sub-epson' => 'Epson',
                                                'sub-brother' => 'Brother',
                                                'sub-xerox' => 'Xerox',
                                                'sub-pantum' => 'Pantum',
                                            ];
                                        @endphp
                                        <a href="/category/may-in" class="flex items-center gap-2 text-sm {{ !request('sub') ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                            <div class="w-1.5 h-1.5 rounded-full {{ !request('sub') ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                            Tất cả thương hiệu
                                        </a>
                                        @foreach($subCats as $subTag => $subName)
                                            <a href="/category/may-in?sub={{ $subTag }}" class="flex items-center gap-2 text-sm {{ request('sub') === $subTag ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                                <div class="w-1.5 h-1.5 rounded-full {{ request('sub') === $subTag ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                                {{ $subName }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if($slug === 'muc-in')
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Thương hiệu</h4>
                                    <div class="space-y-2">
                                        @php
                                            $subCats = [
                                                'sub-avp' => 'AVP',
                                                'sub-hp' => 'HP',
                                                'sub-epson' => 'Epson',
                                                'sub-oki' => 'Oki',
                                                'sub-canon' => 'Canon',
                                                'sub-brother' => 'Brother',
                                                'sub-ricoh' => 'Ricoh',
                                            ];
                                        @endphp
                                        <a href="/category/muc-in" class="flex items-center gap-2 text-sm {{ !request('sub') ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                            <div class="w-1.5 h-1.5 rounded-full {{ !request('sub') ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                            Tất cả thương hiệu
                                        </a>
                                        @foreach($subCats as $subTag => $subName)
                                            <a href="/category/muc-in?sub={{ $subTag }}" class="flex items-center gap-2 text-sm {{ request('sub') === $subTag ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                                <div class="w-1.5 h-1.5 rounded-full {{ request('sub') === $subTag ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                                {{ $subName }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </aside>

                <!-- Product Grid -->
                <div class="flex-grow">
                    <div class="flex items-center justify-between mb-8 bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
                        <p class="text-sm text-gray-500 font-medium">
                            Hiển thị <span class="text-dark font-bold">{{ $products->count() }}</span> sản phẩm
                        </p>
                        <div class="flex items-center gap-4">
                            <span class="text-sm text-gray-400">Sắp xếp:</span>
                            <select class="text-sm border-none focus:ring-0 font-bold text-dark cursor-pointer">
                                <option>Mới nhất</option>
                                <option>Giá thấp đến cao</option>
                                <option>Giá cao đến thấp</option>
                                <option>Bán chạy nhất</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                        @foreach($products as $product)
                            <x-product-card :product="$product" />
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if($products->hasPages())
                        <div class="mt-16 flex justify-center">
                            <nav class="flex items-center gap-2 bg-white px-4 py-3 rounded-2xl border border-gray-100 shadow-premium">
                                {{-- Previous Page Link --}}
                                @if ($products->onFirstPage())
                                    <span class="w-10 h-10 flex items-center justify-center rounded-xl text-gray-300 cursor-not-allowed">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                    </span>
                                @else
                                    <a href="{{ $products->previousPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-xl text-gray-500 hover:bg-primary hover:text-white transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                    </a>
                                @endif

                                {{-- Pagination Elements --}}
                                <div class="flex items-center gap-1">
                                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                        @if ($page == $products->currentPage())
                                            <span class="w-10 h-10 flex items-center justify-center rounded-xl bg-primary text-white font-bold shadow-md shadow-primary/20">
                                                {{ $page }}
                                            </span>
                                        @else
                                            <a href="{{ $url }}" class="w-10 h-10 flex items-center justify-center rounded-xl text-gray-600 font-bold hover:bg-gray-50 hover:text-primary transition-all">
                                                {{ $page }}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>

                                {{-- Next Page Link --}}
                                @if ($products->hasMorePages())
                                    <a href="{{ $products->nextPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-xl text-gray-500 hover:bg-primary hover:text-white transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </a>
                                @else
                                    <span class="w-10 h-10 flex items-center justify-center rounded-xl text-gray-300 cursor-not-allowed">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </span>
                                @endif
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

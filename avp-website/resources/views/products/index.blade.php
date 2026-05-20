@extends('layouts.app')

@section('title', 'Sản phẩm - Âu Việt Phát')

@section('content')
    <div class="bg-surface py-12">
        <div class="container-custom">
            <!-- Breadcrumb -->
            <nav class="flex mb-8 text-sm" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home.index') }}" class="text-gray-500 hover:text-primary transition-colors">Trang chủ</a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-dark font-bold md:ml-2">Tất cả sản phẩm</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Page Header -->
            <div class="relative overflow-hidden rounded-3xl bg-dark text-white p-12 mb-12 shadow-2xl">
                <div class="absolute inset-0 opacity-10 pointer-events-none">
                    <div class="absolute top-0 right-0 w-96 h-96 bg-primary rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-64 h-64 bg-secondary rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>
                </div>
                
                <div class="relative z-10">
                    <h1 class="text-5xl font-black uppercase tracking-tighter mb-4">Sản Phẩm</h1>
                    <p class="text-white/60 text-lg max-w-2xl leading-relaxed">
                        Khám phá bộ sưu tập sản phẩm chính hãng tại Âu Việt Phát. Chúng tôi cam kết cung cấp giải pháp tốt nhất với chi phí tối ưu nhất cho doanh nghiệp của bạn.
                    </p>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Filters -->
                <aside class="lg:w-64 flex-shrink-0">
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm sticky top-24">
                        <!-- Search Box -->
                        <form action="{{ route('products.index') }}" method="GET" class="mb-6">
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm sản phẩm..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-xl text-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </form>

                        <h3 class="font-bold text-dark mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                            Danh mục
                        </h3>
                        
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <a href="{{ route('products.index') }}" class="flex items-center gap-2 text-sm {{ !request('sub') ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                    <div class="w-1.5 h-1.5 rounded-full {{ !request('sub') ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                    Tất cả sản phẩm
                                </a>
                            </div>

                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Linh kiện máy tính</h4>
                                <div class="space-y-2">
                                    @php
                                        $compSubCats = [
                                            'sub-monitor' => 'Màn hình',
                                            'sub-ram' => 'RAM',
                                            'sub-ssd' => 'SSD/HDD',
                                            'sub-mainboard' => 'Bảng mạch chính',
                                            'sub-cpu' => 'CPU',
                                            'sub-gpu' => 'Card đồ họa',
                                            'sub-headphone' => 'Tai nghe',
                                            'sub-wifi' => 'Bộ phát wifi',
                                            'sub-psu' => 'Nguồn',
                                            'sub-keyboard' => 'Bàn phím',
                                            'sub-mouse' => 'Chuột',
                                        ];
                                    @endphp
                                    @foreach($compSubCats as $subTag => $subName)
                                        <a href="/products?sub={{ $subTag }}" class="flex items-center gap-2 text-sm {{ request('sub') === $subTag ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                            <div class="w-1.5 h-1.5 rounded-full {{ request('sub') === $subTag ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                            {{ $subName }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Máy tính để bàn</h4>
                                <div class="space-y-2">
                                    @php
                                        $pcSubCats = [
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
                                    @foreach($pcSubCats as $subTag => $subName)
                                        <a href="/products?sub={{ $subTag }}" class="flex items-center gap-2 text-sm {{ request('sub') === $subTag ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                            <div class="w-1.5 h-1.5 rounded-full {{ request('sub') === $subTag ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                            {{ $subName }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Laptop / Macbook</h4>
                                <div class="space-y-2">
                                    @php
                                        $laptopSubCats = [
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
                                    @foreach($laptopSubCats as $subTag => $subName)
                                        <a href="/products?sub={{ $subTag }}" class="flex items-center gap-2 text-sm {{ request('sub') === $subTag ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                            <div class="w-1.5 h-1.5 rounded-full {{ request('sub') === $subTag ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                            {{ $subName }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Máy in</h4>
                                <div class="space-y-2">
                                    @php
                                        $printerSubCats = [
                                            'sub-hp' => 'HP',
                                            'sub-canon' => 'Canon',
                                            'sub-epson' => 'Epson',
                                            'sub-brother' => 'Brother',
                                            'sub-xerox' => 'Xerox',
                                            'sub-pantum' => 'Pantum',
                                        ];
                                    @endphp
                                    @foreach($printerSubCats as $subTag => $subName)
                                        <a href="/products?sub={{ $subTag }}" class="flex items-center gap-2 text-sm {{ request('sub') === $subTag ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                            <div class="w-1.5 h-1.5 rounded-full {{ request('sub') === $subTag ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                            {{ $subName }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Thiết bị mạng</h4>
                                <div class="space-y-2">
                                    @php
                                        $networkSubCats = [
                                            'sub-router' => 'Bộ định tuyến Wifi',
                                            'sub-cable' => 'Dây cáp Internet',
                                            'sub-switch' => 'Bộ chuyển mạch (Switch)',
                                        ];
                                    @endphp
                                    @foreach($networkSubCats as $subTag => $subName)
                                        <a href="/products?sub={{ $subTag }}" class="flex items-center gap-2 text-sm {{ request('sub') === $subTag ? 'text-primary font-bold' : 'text-gray-600 hover:text-primary' }} transition-colors">
                                            <div class="w-1.5 h-1.5 rounded-full {{ request('sub') === $subTag ? 'bg-primary' : 'bg-gray-200' }}"></div>
                                            {{ $subName }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </aside>

                <!-- Product Grid -->
                <div class="flex-grow">
                    <div class="flex items-center justify-between mb-8 bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
                        <p class="text-sm text-gray-500 font-medium">
                            Hiển thị <span class="text-dark font-bold">{{ $products->count() }}</span> sản phẩm
                        </p>
                        <form action="{{ route('products.index') }}" method="GET" class="flex items-center gap-4">
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                            @if(request('sub'))
                                <input type="hidden" name="sub" value="{{ request('sub') }}">
                            @endif
                            <span class="text-sm text-gray-400">Sắp xếp:</span>
                            <select name="sort" onchange="this.form.submit()" class="text-sm border-none focus:ring-0 font-bold text-dark cursor-pointer">
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá thấp đến cao</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá cao đến thấp</option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Bán chạy nhất</option>
                            </select>
                        </form>
                    </div>

                    @if($products->isEmpty())
                        <div class="bg-white rounded-2xl border border-gray-100 p-16 text-center shadow-sm">
                            <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl">
                                🔍
                            </div>
                            <h3 class="text-xl font-bold text-dark mb-2">Không tìm thấy sản phẩm nào</h3>
                            <p class="text-gray-500">Vui lòng thử lại với từ khóa hoặc bộ lọc khác.</p>
                            <a href="{{ route('products.index') }}" class="inline-block mt-6 px-6 py-3 bg-primary text-white rounded-xl font-medium hover:bg-primary-dark transition-colors">
                                Xóa bộ lọc
                            </a>
                        </div>
                    @else
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
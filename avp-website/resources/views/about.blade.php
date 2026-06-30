@extends('layouts.app')

@section('title', 'Giới Thiệu Về Âu Việt Phát - Giải Pháp Thiết Bị & Tin Học Văn Phòng Toàn Diện')
@section('meta_description', 'Tìm hiểu về Âu Việt Phát, đơn vị uy tín hàng đầu chuyên cung cấp thiết bị văn phòng, dịch vụ cho thuê máy photocopy, sửa chữa máy in, bảo trì máy tính và giải pháp công nghệ toàn diện.')

@php
    $hero = \App\Models\PageSection::getSection('about', 'hero');
    $brandStory = \App\Models\PageSection::getSection('about', 'brand_story');
    $visionMission = \App\Models\PageSection::getSection('about', 'vision_mission_values');
    $timeline = \App\Models\PageSection::getSection('about', 'timeline');
@endphp

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
                            <span class="ml-1 text-primary font-medium md:ml-2">Giới thiệu</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Hero Section -->
            @if($hero)
            <div class="bg-gradient-to-br from-dark to-slate-900 rounded-3xl overflow-hidden shadow-2xl mb-16 relative">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                <div class="relative z-10 px-8 py-16 md:p-20 max-w-4xl">
                    <span class="inline-block bg-white/10 text-highlight text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-6 border border-white/10">
                        {{ $hero['content']['badge'] ?? 'Về chúng tôi - Âu Việt Phát' }}
                    </span>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight uppercase tracking-tight">
                        {{ $hero['title'] }} <br class="hidden md:inline"><span class="text-highlight">{{ $hero['content']['title_highlight'] }}</span>
                    </h1>
                    <p class="text-gray-300 text-lg md:text-xl leading-relaxed mb-8 max-w-2xl font-medium">
                        {{ $hero['content']['description'] }}
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('contact.create') }}" class="bg-highlight hover:bg-yellow-300 text-dark font-extrabold px-8 py-4 rounded-xl transition-all duration-300 transform hover:-translate-y-1 shadow-lg shadow-highlight/20 flex items-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            <span>LIÊN HỆ VỚI CHÚNG TÔI</span>
                        </a>
                        <a href="tel:{{ str_replace(' ', '', setting('phone_primary', '0912979394')) }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 font-bold px-8 py-4 rounded-xl transition-all duration-300 flex items-center gap-3">
                            <svg class="w-6 h-6 text-highlight" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>HOTLINE: {{ setting('phone_primary', '0912 97 9394') }}</span>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <!-- Stats Grid Section -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-20">
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm text-center">
                    <div class="text-4xl md:text-5xl font-black text-primary mb-2">{{ setting('stat_years', '10+') }}</div>
                    <div class="text-gray-500 text-xs md:text-sm font-bold uppercase tracking-wider">Năm Kinh Nghiệm</div>
                </div>
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm text-center">
                    <div class="text-4xl md:text-5xl font-black text-primary mb-2">{{ setting('stat_customers', '2,000+') }}</div>
                    <div class="text-gray-500 text-xs md:text-sm font-bold uppercase tracking-wider">Doanh Nghiệp Tin Dùng</div>
                </div>
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm text-center">
                    <div class="text-4xl md:text-5xl font-black text-primary mb-2">{{ setting('stat_support', '24/7') }}</div>
                    <div class="text-gray-500 text-xs md:text-sm font-bold uppercase tracking-wider">Hỗ Trợ Kỹ Thuật</div>
                </div>
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm text-center">
                    <div class="text-4xl md:text-5xl font-black text-primary mb-2">{{ setting('stat_satisfaction', '100%') }}</div>
                    <div class="text-gray-500 text-xs md:text-sm font-bold uppercase tracking-wider">Khách Hàng Hài Lòng</div>
                </div>
            </div>

            <!-- Intro Section (Story) -->
            @if($brandStory)
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-20">
                <div class="lg:col-span-6 space-y-6">
                    <span class="text-primary font-bold text-sm tracking-widest uppercase block">{{ $brandStory['content']['badge'] ?? 'CÂU CHUYỆN THƯƠNG HIỆU' }}</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight">{{ $brandStory['title'] }}</h2>
                    <div class="w-16 h-1 bg-highlight rounded-full"></div>
                    @if(!empty($brandStory['content']['paragraphs']))
                        @foreach($brandStory['content']['paragraphs'] as $p)
                        <p class="text-gray-600 leading-relaxed">{{ $p }}</p>
                        @endforeach
                    @endif
                </div>
                <div class="lg:col-span-6">
                    <div class="bg-gradient-to-br from-primary/10 to-blue-50 rounded-3xl p-8 border border-primary/10 relative overflow-hidden flex flex-col gap-6">
                        @if(!empty($brandStory['content']['features']))
                            @foreach($brandStory['content']['features'] as $f)
                            <div class="flex gap-4 items-start">
                                <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center flex-shrink-0 text-primary">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-lg">{{ $f['title'] }}</h4>
                                    <p class="text-gray-500 text-sm mt-1">{{ $f['description'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @endif

            <!-- Vision, Mission & Values -->
            @if($visionMission)
            <div class="bg-white rounded-3xl p-8 md:p-16 border border-gray-100 shadow-sm mb-20">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div class="space-y-4">
                        <div class="w-14 h-14 bg-green-50 text-primary rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 uppercase">{{ $visionMission['content']['vision']['title'] ?? 'Tầm Nhìn' }}</h3>
                        <p class="text-gray-500 leading-relaxed text-sm">
                            {{ $visionMission['content']['vision']['description'] ?? '' }}
                        </p>
                    </div>
                    <div class="space-y-4">
                        <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 uppercase">{{ $visionMission['content']['mission']['title'] ?? 'Sứ Mệnh' }}</h3>
                        <p class="text-gray-500 leading-relaxed text-sm">
                            {{ $visionMission['content']['mission']['description'] ?? '' }}
                        </p>
                    </div>
                    <div class="space-y-4">
                        <div class="w-14 h-14 bg-yellow-50 text-yellow-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 uppercase">{{ $visionMission['content']['values']['title'] ?? 'Giá Trị Cốt Lõi' }}</h3>
                        <div class="text-gray-500 leading-relaxed text-sm whitespace-pre-line">
                            {{ $visionMission['content']['values']['description'] ?? '' }}
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Development Path (Timeline) -->
            @if($timeline)
            <div class="mb-20">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-primary font-bold text-sm tracking-widest uppercase mb-3 block">{{ $timeline['content']['badge'] ?? 'CHẶNG ĐƯỜNG PHÁT TRIỂN' }}</span>
                    <h2 class="text-3xl md:text-4.5xl font-extrabold text-gray-900 uppercase">{{ $timeline['title'] }}</h2>
                    <div class="w-16 h-1 bg-highlight mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="relative border-l border-gray-200 ml-4 md:ml-32">
                    @if(!empty($timeline['content']['milestones']))
                        @foreach($timeline['content']['milestones'] as $m)
                        <div class="mb-10 ml-8 relative">
                            <span class="absolute -left-12 top-1 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full shadow">{{ $m['year'] }}</span>
                            <div class="absolute -left-[37px] top-1.5 bg-white border-4 border-primary w-4 h-4 rounded-full"></div>
                            <h3 class="text-lg font-bold text-gray-900">{{ $m['title'] }}</h3>
                            <p class="text-gray-500 mt-2 text-sm leading-relaxed max-w-2xl">
                                {{ $m['description'] }}
                            </p>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
            @endif

            <!-- Call to Action Section -->
            <div class="bg-gradient-to-br from-primary to-green-700 text-white rounded-3xl p-8 md:p-16 text-center shadow-xl relative overflow-hidden">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                <div class="relative z-10 max-w-3xl mx-auto space-y-6">
                    <h2 class="text-3xl md:text-5xl font-black uppercase leading-tight">Sẵn Sàng Đồng Hành Cùng Văn Phòng Của Bạn?</h2>
                    <p class="text-green-50 text-lg">
                        Hãy liên hệ với đội ngũ chuyên gia của Âu Việt Phát ngay hôm nay để nhận được sự tư vấn giải pháp tối ưu và tiết kiệm chi phí nhất cho doanh nghiệp của bạn.
                    </p>
                    <div class="pt-4 flex flex-wrap justify-center gap-4">
                        <a href="{{ setting('zalo_link', 'https://zalo.me/0912979394') }}" target="_blank" rel="noopener noreferrer" class="bg-[#facc15] hover:bg-yellow-300 text-dark font-extrabold px-8 py-4 rounded-xl transition-all duration-300 transform hover:-translate-y-1 shadow-lg flex items-center gap-3">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.003 21c-5.522 0-9.997-4.477-9.997-10S6.48 1 12.003 1s9.997 4.477 9.997 10-4.475 10-9.997 10zm3.001-11.5h-5.002v-1.2l2.601-3.1h-2.601V4h5.002v1.2l-2.601 3.1h2.601v1.2z"/></svg>
                            <span>CHAT ZALO NGAY</span>
                        </a>
                        <a href="{{ route('contact.create') }}" class="bg-white text-primary hover:bg-gray-100 font-bold px-8 py-4 rounded-xl transition-all duration-300 flex items-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>GỬI YÊU CẦU BÁO GIÁ</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

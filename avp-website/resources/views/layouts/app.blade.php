<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Âu Việt Phát - Công ty TNHH TM DV Tin học Viễn thông Âu Việt Phát')</title>
    
    <meta name="description" content="@yield('meta_description', 'Chuyên cung cấp Laptop, PC, Máy in, Linh kiện máy tính và Dịch vụ tin học chuyên nghiệp.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <div class="min-h-screen flex flex-col">
        <x-header />

        <main class="flex-grow">
            {{ $slot ?? '' }}
            @yield('content')
        </main>

        <x-footer />
    </div>

    @stack('scripts')
</body>
</html>

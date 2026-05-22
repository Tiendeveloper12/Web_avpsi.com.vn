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
    @php
        $viteHasDevServer = isset($viteDevServerAvailable) && $viteDevServerAvailable && env('VITE_DEV_SERVER_URL');
    @endphp

    @if ($viteHasDevServer)
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        @if (!empty($viteManifest['resources/css/app.css']['file']))
            <link rel="stylesheet" href="{{ asset('build/' . $viteManifest['resources/css/app.css']['file']) }}">
        @endif

        @if (!empty($viteManifest['resources/js/app.js']['file']))
            <script type="module" src="{{ asset('build/' . $viteManifest['resources/js/app.js']['file']) }}"></script>
        @endif
    @endif
    
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

    @if (session('success'))
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 4000)"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="transform translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
             x-transition:enter-end="transform translate-y-0 opacity-100 sm:translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             style="position: fixed; bottom: 20px; right: 20px; z-index: 9999; max-width: 350px; width: calc(100% - 40px); background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 1rem; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); padding: 16px; display: flex; align-items: center; gap: 12px; font-family: sans-serif; box-sizing: border-box;">
            <div style="width: 32px; height: 32px; border-radius: 50%; background-color: rgba(16, 185, 129, 0.1); display: flex; align-items: center; justify-content: center; color: #10b981; flex-shrink: 0;">
                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <div style="flex-grow: 1; min-width: 0;">
                <p style="margin: 0; font-size: 14px; font-weight: 600; color: #111827;">Thành công!</p>
                <p style="margin: 0; font-size: 12px; color: #6b7280; white-space: normal; overflow: hidden; text-overflow: ellipsis;">{{ session('success') }}</p>
            </div>
            <button @click="show = false" style="background: none; border: none; cursor: pointer; padding: 4px; color: #9ca3af; display: flex; align-items: center; justify-content: center;" onmouseover="this.style.color='#4b5563'" onmouseout="this.style.color='#9ca3af'">
                <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    @endif

    <script>
        function addToCart(productId, btn) {
            // Brief visual feedback on the button
            const originalHTML = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>';

            fetch('{{ route("cart.add") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ product_id: productId, quantity: 1 })
            })
            .then(res => res.json())
            .then(data => {
                // Update all cart count badges in the header
                document.querySelectorAll('[data-cart-count]').forEach(el => {
                    el.textContent = data.cart_count;
                });

                // Show a brief checkmark
                btn.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.disabled = false;
                }, 800);
            })
            .catch(() => {
                btn.innerHTML = originalHTML;
                btn.disabled = false;
            });
        }
    </script>

    @stack('scripts')
</body>
</html>

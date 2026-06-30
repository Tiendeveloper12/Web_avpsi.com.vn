<div class="bg-white py-8 border-y border-gray-100 overflow-hidden group">
    <div class="container-custom">
        <h4 class="text-center text-gray-400 font-bold text-xs uppercase tracking-widest mb-8">Đối tác chiến lược</h4>
        
        @php
            $partnerFiles = glob(public_path('images/partners/*.*'));
            $partners = [];
            if ($partnerFiles) {
                $partners = array_map('basename', $partnerFiles);
            }
            // Fallback to initial hardcoded list if folder is empty or not readable
            if (empty($partners)) {
                $partners = [
                    'Ricoh_logo.png',
                    'logo-brother.jpg',
                    'logo-cisco.jpg',
                    'logo-commscope-amp.jpg',
                    'logo-dell.jpg',
                    'logo-gigabyte.jpg',
                    'logo-hikvision.jpg',
                    'logo-hp.jpg',
                    'logo-intel.jpg',
                    'logo-seagate.jpg',
                    'logo-unifi.jpg',
                    'logo-western-digital.jpg',
                    'logo-zebra.jpg',
                    'logo_apple.jpg',
                    'logo_asus.jpg',
                ];
            }
        @endphp

        <!-- Infinite Scroll Marquee -->
        <div class="relative flex overflow-x-hidden">
            <div class="flex animate-marquee whitespace-nowrap gap-12 items-center px-6">
                @foreach ($partners as $partner)
                    <div class="w-60 h-32 bg-white border border-gray-100 rounded-2xl flex items-center justify-center p-8 hover:border-primary/30 hover:shadow-xl transition-all duration-500 flex-shrink-0 group/logo">
                        <img src="{{ asset('images/partners/' . $partner) }}" 
                             alt="Partner Logo" 
                             class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover/logo:scale-110">
                    </div>
                @endforeach
            </div>

            <!-- Duplicate for infinite effect -->
            <div class="absolute top-0 flex animate-marquee2 whitespace-nowrap gap-12 items-center px-6">
                @foreach ($partners as $partner)
                    <div class="w-60 h-32 bg-white border border-gray-100 rounded-2xl flex items-center justify-center p-8 hover:border-primary/30 hover:shadow-xl transition-all duration-500 flex-shrink-0 group/logo">
                        <img src="{{ asset('images/partners/' . $partner) }}" 
                             alt="Partner Logo" 
                             class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover/logo:scale-110">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes marquee {
        0% { transform: translateX(0%); }
        100% { transform: translateX(-100%); }
    }
    @keyframes marquee2 {
        0% { transform: translateX(100%); }
        100% { transform: translateX(0%); }
    }
    .animate-marquee {
        animation: marquee 30s linear infinite;
    }
    .animate-marquee2 {
        animation: marquee2 30s linear infinite;
    }
    .group:hover .animate-marquee,
    .group:hover .animate-marquee2 {
        animation-play-state: paused;
    }
</style>

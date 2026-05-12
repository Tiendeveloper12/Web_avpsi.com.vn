<div class="bg-white rounded-xl shadow-premium border border-gray-100 overflow-hidden">
    <div class="bg-secondary px-5 py-3 text-white font-bold flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        Tất cả danh mục
    </div>
    <ul class="py-2">
        @php
            $categories = [
                ['title' => 'Laptop & Macbook', 'icon' => '💻'],
                ['title' => 'Máy tính để bàn', 'icon' => '🖥️'],
                ['title' => 'Linh kiện máy tính', 'icon' => '⚙️'],
                ['title' => 'Màn hình máy tính', 'icon' => '📺'],
                ['title' => 'Máy in - Mực in', 'icon' => '🖨️'],
                ['title' => 'Thiết bị văn phòng', 'icon' => '📠'],
                ['title' => 'Thiết bị mạng', 'icon' => '🌐'],
                ['title' => 'Camera an ninh', 'icon' => '📹'],
                ['title' => 'Phụ kiện máy tính', 'icon' => '🖱️'],
                ['title' => 'Phần mềm bản quyền', 'icon' => '💿'],
            ];
        @endphp
        @foreach($categories as $cat)
            <li class="group">
                <a href="#" class="flex items-center justify-between px-5 py-3 text-sm text-gray-700 hover:bg-primary/5 hover:text-primary transition-all duration-200">
                    <div class="flex items-center gap-3">
                        <span class="text-lg">{{ $cat['icon'] }}</span>
                        <span class="font-medium">{{ $cat['title'] }}</span>
                    </div>
                    <svg class="w-4 h-4 text-gray-300 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </li>
        @endforeach
    </ul>
</div>

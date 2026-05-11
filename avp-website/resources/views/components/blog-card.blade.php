@props(['article'])

<div class="card-premium group">
    <div class="relative overflow-hidden aspect-[16/9]">
        <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&q=80&w=600" 
            alt="{{ $article->title }}" 
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        <div class="absolute top-4 left-4">
            <span class="bg-primary text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Tin tức</span>
        </div>
    </div>
    
    <div class="p-6">
        <div class="flex items-center gap-3 text-xs text-gray-400 mb-3">
            <span class="flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                12/05/2024
            </span>
            <span class="flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                1.2k xem
            </span>
        </div>
        
        <h3 class="text-lg font-bold text-gray-800 line-clamp-2 mb-3 group-hover:text-primary transition-colors leading-snug">
            {{ $article->title }}
        </h3>
        
        <p class="text-sm text-gray-500 line-clamp-3 mb-6 leading-relaxed">
            {{ Str::limit(strip_tags($article->content), 120) }}
        </p>
        
        <a href="#" class="inline-flex items-center gap-2 text-primary text-sm font-bold group/link">
            Xem thêm
            <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>
</div>

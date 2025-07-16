<x-detail-layout>
    <div class="py-8 bg-white text-black">
        <nav aria-label="breadcrumb" class="mb-8 py-4">
            <div class="flex items-center space-x-2 text-sm text-gray-600 whitespace-nowrap">
                <a href="{{ route('home') }}" class="hover:text-green-600 flex items-center">
                    <span class="material-symbols-outlined text-lg">home</span>
                </a>
                <span class="text-gray-400">&gt;</span>
                <a href="{{ route('home') }}" class="hover:text-green-600">News</a>
                <span class="text-gray-400">&gt;</span>
                <span class="font-semibold text-gray-900 truncate">{{ Str::limit($post->title, 60) }}</span>
            </div>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center mb-8">
            <div class="flex flex-col justify-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-black leading-tight">
                    {{ $post->title }}
                </h1>
                <div class="mt-4 text-gray-600 text-sm">
                    <span>Oleh {{ $post->user->name }}</span>
                    <span class="mx-2">&bull;</span>
                    <span>{{ $post->published_at->format('d F Y') }}</span>
                </div>
            </div>
            <div>
                <img class="w-full h-auto object-cover rounded-lg shadow-lg"
                     src="{{ $post->image ? asset('storage/' . $post->image) : 'https://placehold.co/800x600' }}"
                     alt="{{ $post->title }}">
            </div>
        </div>

        <hr class="max-w-4xl mx-auto my-12 border-gray-300">

        <div class="relative max-w-4xl mx-auto">
            <aside class="hidden md:block absolute top-0 left-0 -translate-x-full pr-10">
                <div class="sticky top-24 flex flex-col items-center space-y-4">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider"></p>
                    <a href="#" class="text-gray-500 hover:text-blue-600 transition-colors" title="Facebook">
                        <i class="fa-brands fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-black transition-colors" title="X">
                        <i class="fa-brands fa-x-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-pink-600 transition-colors" title="Instagram">
                        <i class="fa-brands fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-green-600 transition-colors" title="Tautan">
                        <i class="fa-solid fa-link text-xl"></i>
                    </a>
                </div>
            </aside>

            <div>
                @if ($post->subtitle)
                    <p class="text-xl md:text-2xl leading-relaxed text-green-700 font-serif italic mb-8">
                        "{{ $post->subtitle }}"
                    </p>
                @endif
                <div class="prose prose-lg max-w-none text-gray-900 leading-relaxed">
                    {!! nl2br(e($post->body)) !!}
                </div>
            </div>

            <div class="md:hidden mt-10 pt-6 border-t border-gray-200">
                <p class="text-base font-semibold text-gray-800 mb-4">Bagikan Artikel Ini</p>
                <div class="flex items-center space-x-5">
                   <a href="#" class="text-gray-500 hover:text-blue-600 transition-colors" title="Bagikan ke Facebook">
                       <i class="fa-brands fa-facebook-f fa-lg"></i>
                   </a>
                   <a href="#" class="text-gray-500 hover:text-black transition-colors" title="Bagikan ke X">
                       <i class="fa-brands fa-x-twitter fa-lg"></i>
                   </a>
                   <a href="#" class="text-gray-500 hover:text-green-600 transition-colors" title="Salin Tautan">
                       <i class="fa-solid fa-link fa-lg"></i>
                   </a>
                </div>
            </div>
        </div>
        <div class="max-w-4xl mx-auto mt-16 p-6 border-t border-gray-200 flex justify-between items-center gap-4">
            
        <div class="max-w-7xl mx-auto mt-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Find Other News</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($relatedPosts as $relatedPost)
                    <a href="{{ route('news.show', $relatedPost) }}"
                       class="group block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        
                        <img class="w-full h-48 object-cover" 
                             src="{{ $relatedPost->image ? asset('storage/' . $relatedPost->image) : 'https://placehold.co/400x300/e2e8f0/adb5bd?text=Berita' }}" 
                             alt="{{ $relatedPost->title }}">
                        
                        <div class="p-6">
                            @if ($relatedPost->categories->isNotEmpty())
                                <p class="text-sm text-green-700 mb-2">
                                    {{ $relatedPost->categories->first()->name }}
                                </p>
                            @endif
                            <h3 class="font-bold text-lg text-gray-900 mb-2 group-hover:text-green-600 transition-colors">
                                {{ $relatedPost->title }}
                            </h3>
                            <p class="text-gray-700 text-sm line-clamp-3">
                                {{ Str::limit(strip_tags($relatedPost->subtitle ?? $relatedPost->body), 100) }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-detail-layout>
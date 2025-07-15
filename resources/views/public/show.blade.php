<x-detail-layout>
    <div class="py-8">
        <header aria-label="" class="mb-8 py-4">
            <div
                class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap overflow-x-auto">
                <a href="{{ route('home') }}" class="hover:text-green-600 flex items-center">
                    <span class="material-symbols-outlined text-lg">home</span>
                </a>
                <span class="text-gray-400 dark:text-gray-600">&gt;</span>
                <a href="#" class="hover:text-green-600">Activities</a>
                <span class="text-gray-400 dark:text-gray-600">&gt;</span>
                <a href="{{ route('home') }}" class="hover:text-green-600">Berita</a>
                <span class="text-gray-400 dark:text-gray-600">&gt;</span>
                <span
                    class="font-semibold text-gray-700 dark:text-white truncate">{{ Str::limit($post->title, 40) }}</span>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center mb-8">
            <div class="flex flex-col justify-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white leading-tight">
                    {{ $post->title }}
                </h1>
                <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm">
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

        <hr class="max-w-4xl mx-auto my-12 dark:border-gray-700">

        <div class="max-w-4xl mx-auto">
            @if ($post->subtitle)
                <p
                    class="text-xl md:text-2xl leading-relaxed text-green-600 dark:text-green-400 font-serif italic mb-8">
                    "{{ $post->subtitle }}"
                </p>
            @endif
            <div class="prose prose-lg max-w-none text-gray-800 dark:text-gray-200 leading-relaxed">
                {!! nl2br(e($post->body)) !!}
            </div>
        </div>

        <div
            class="max-w-4xl mx-auto mt-16 p-6 border-t border-gray-200 dark:border-gray-700 flex justify-between items-center gap-4">
            <div class="flex-1">
                @if ($previousPost)
                    <a href="{{ route('news.show', $previousPost) }}"
                        class="group inline-flex items-center text-gray-700 dark:text-gray-300 hover:text-green-600 transition-colors duration-300">
                        <span
                            class="material-symbols-outlined mr-2 transition-transform duration-300 group-hover:-translate-x-1">arrow_back</span>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Sebelumnya</p>
                            <p class="font-semibold">{{ Str::limit($previousPost->title, 25) }}</p>
                        </div>
                    </a>
                @endif
            </div>

            <div class="flex-1 text-right">
                @if ($nextPost)
                    <a href="{{ route('news.show', $nextPost) }}"
                        class="group inline-flex items-center text-gray-700 dark:text-gray-300 hover:text-green-600 transition-colors duration-300">
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Selanjutnya</p>
                            <p class="font-semibold">{{ Str::limit($nextPost->title, 25) }}</p>
                        </div>
                        <span
                            class="material-symbols-outlined ml-2 transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                    </a>
                @endif
            </div>
        </div>
        <div class="max-w-7xl mx-auto mt-16">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">Find Other News</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($relatedPosts as $relatedPost)
                    <a href="{{ route('news.show', $relatedPost) }}"
                        class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        @if ($relatedPost->categories->isNotEmpty())
                            <p class="text-sm text-green-600 dark:text-green-400 mb-2">
                                {{ $relatedPost->categories->first()->name }}</p>
                        @endif
                        <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-2">{{ $relatedPost->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm line-clamp-3">
                            {{ Str::limit(strip_tags($relatedPost->subtitle ?? $relatedPost->body), 100) }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-detail-layout>

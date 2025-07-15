@props(['post'])

<article
    class="bg-white rounded-lg shadow-sm mb-6 flex flex-col md:flex-row items-center p-4 gap-4 hover:shadow-lg transition-shadow duration-300">
    <a href="{{ route('news.show', $post) }}" class="w-full md:w-1/4 flex-shrink-0">
        <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://placehold.co/400x300/e2e8f0/adb5bd?text=Berita' }}"
            alt="{{ $post->subtitle }}" class="w-full h-auto object-cover rounded-md">
    </a>

    <div class="flex-1">
        <div class="flex flex-wrap gap-2 mb-2">
            @if ($post->categories->isNotEmpty())
                @foreach ($post->categories as $category)
                    <p class="text-xs text-white bg-green-600 inline-block px-2 py-1 rounded-full">
                        TPB {{ str_pad($category->id, 2, '0', STR_PAD_LEFT) }} {{ $category->name }}
                    </p>
                @endforeach
            @endif
        </div>

        <h2 class="text-lg font-bold text-gray-800 mb-2">
            <a href="{{ route('news.show', $post) }}" class="hover:text-green-700">{{ $post->subtitle }}</a>
        </h2>

        <p class="text-sm text-gray-600 line-clamp-3 mb-3">
            {{ Str::limit(strip_tags($post->body), 300) }}
        </p>

        <p class="text-xs text-gray-500">{{ $post->published_at->format('d F Y') }}</p>
    </div>
</article>

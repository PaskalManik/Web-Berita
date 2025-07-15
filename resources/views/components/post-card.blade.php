@props(['post'])

<a href="{{ route('news.show', $post) }}" class="block group bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:-translate-y-2">
    <div>
        <img class="w-full h-48 object-cover" src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/400x250' }}" alt="Gambar Berita">
    </div>
    <div class="p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-600 transition-colors duration-300">{{ Str::limit($post->title, 50) }}</h3>
        <p class="text-gray-600 text-sm">
            {{ $post->published_at->format('d F Y') }}
        </p>
    </div>
</a>
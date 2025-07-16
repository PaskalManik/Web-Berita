<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm font-medium">Judul Berita</label>
                            <input type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                value="{{ old('title', $post->title) }}" required>
                            @error('title')
                                <p class="mt-2 text-sm text-red-600 ">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="subtitle" class="block mb-2 text-sm font-medium">Sub Judul </label>
                            <input name="subtitle" id="subtitle" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                value="{{ old('subtitle', $post->subtitle) }}" required>
                            @error('title')
                                <p class="mt-2 text-sm text-red-600 ">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="image" class="block mb-2 text-sm font-medium">Gambar Utama</label>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar saat ini"
                                    class="w-48 h-auto my-2">
                            @endif
                            <input type="file" name="image" id="image"
                                class="block w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 cursor-pointer  focus:outline-none">
                            @error('image')
                                <p class="mt-2 text-sm text-red-600 ">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="published_at" class="block mb-2 text-sm font-medium">Tanggal Publikasi</label>
                            <input type="datetime-local" 
                                   name="published_at" 
                                   id="published_at" 
                                   class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                   value="{{ old('published_at', $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') : '') }}">
                            @error('published_at')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-6">
                            <label for="body" class="block mb-2 text-sm font-medium">Isi Berita</label>
                            <textarea name="body" id="body" rows="10"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required>{{ old('body', $post->body) }}</textarea>
                            @error('body')
                                <p class="mt-2 text-sm text-red-600 ">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium">Kategori TPB</label>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-4 border border-gray-200  rounded-lg">
                                @foreach ($categories as $category)
                                    <div class="flex items-center">
                                        <input id="category-{{ $category->id }}" name="categories[]" type="checkbox"
                                            value="{{ $category->id }}"
                                            class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500"
                                            @if (in_array($category->id, old('categories', $post->categories->pluck('id')->toArray()))) checked @endif>
                                        <label for="category-{{ $category->id }}"
                                            class="ms-2 text-sm font-medium text-gray-900">{{ $category->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('categories')
                                <p class="mt-2 text-sm text-red-600 ">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('admin.posts.index') }}"
                                class="text-gray-600 hover:text-gray-900">Batal</a>
                            <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition-all duration-300">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

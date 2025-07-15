<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category; // <-- 1. Mengimpor model Category
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Menampilkan daftar semua berita.
     */
    public function index()
    {
        $posts = Post::with('categories')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Menampilkan form untuk membuat berita baru.
     */
    public function create()
    {
        // 2. Mengambil semua kategori untuk ditampilkan di form
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Menyimpan berita baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories' => 'nullable|array', 
            'categories.*' => 'exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($request->title);
        $validated['published_at'] = now();

        // 3. Buat post terlebih dahulu
        $post = Post::create($validated);

        // 4. Hubungkan post dengan kategori yang dipilih
        if ($request->has('categories')) {
            $post->categories()->attach($request->categories);
        }

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit berita.
     */
    public function edit(Post $post)
    {
        // 5. Mengambil semua kategori untuk ditampilkan di form edit
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Mengupdate berita yang ada di database.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        $validated['slug'] = Str::slug($request->title);

        // 6. Update data post
        $post->update($validated);

        // 7. Sinkronkan kategori. Sync akan otomatis menambah/menghapus hubungan.
        $post->categories()->sync($request->categories ?? []);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Menghapus berita dari database.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil dihapus.');
    }
}
<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Menampilkan halaman detail sebuah berita.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
public function show(Post $post)
{
    $nextPost = Post::where('published_at', '>', $post->published_at)
                    ->orderBy('published_at', 'asc')->first();

    $previousPost = Post::where('published_at', '<', $post->published_at)
                        ->orderBy('published_at', 'desc')->first();

    $relatedPosts = Post::where('id', '!=', $post->id)
                            ->latest('published_at')
                            ->take(3)
                            ->get();

    return view('public.show', compact('post', 'nextPost', 'previousPost', 'relatedPosts'));
}
}
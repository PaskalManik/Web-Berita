<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('categories') 
                     ->whereNotNull('published_at')
                     ->latest('published_at')
                     ->paginate(9);

        return view('public.index', [
            'posts' => $posts,
        ]);
    }
}
<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $selectedCategories = $request->query('categories', []);

        $postsQuery = Post::with('categories')
            ->whereNotNull('published_at')
            ->latest('published_at');

        if (!empty($selectedCategories)) {
            $postsQuery->whereHas('categories', function ($query) use ($selectedCategories) {
                $query->whereIn('categories.id', $selectedCategories);
            }, '=', count($selectedCategories)); 
        }

        $posts = $postsQuery->paginate(9)->withQueryString();

        return view('public.index', compact('posts', 'categories', 'selectedCategories'));
    }
}

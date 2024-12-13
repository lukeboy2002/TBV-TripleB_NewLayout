<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $featuredPosts = Post::published()
            ->featured()
            ->with('author', 'category')
            ->latest()
            ->take(1)
            ->get();

        $latestPosts = Post::published()
            ->latest()
            ->with('author', 'category')
            ->take(2)
            ->get();

        return view('home', [
            'featuredPosts' => $featuredPosts,
            'latestPosts' => $latestPosts,
        ]);
    }
}

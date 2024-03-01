<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {




        $featuredPosts = Post::published()->featured()->with('categories')->latest('published_at')->take(3)->get();


        $latestPosts = Post::published()->with('categories')->latest('published_at')->take(9)->get();
        ;

        return view('home', [
            'featuredPosts' => $featuredPosts,
            'latestPosts' => $latestPosts,
            // 'featuredPosts2' => $featuredPosts2
        ]);
    }
}

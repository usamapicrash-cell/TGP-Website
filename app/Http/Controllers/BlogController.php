<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogSetting;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $blogSetting = BlogSetting::first();
        // Latest posts fetch kar rahe hain category ke sath
        $posts = BlogPost::with('category')->orderBy('date', 'desc')->get();
        
        return view('blogs', compact('blogSetting', 'posts'));
    }

    public function show($slug)
    {
        // Post fetch karein slug ke zariye, agar na mile to 404
        $post = BlogPost::with('category')->where('slug', $slug)->firstOrFail();
        
        return view('blog-detail', compact('post'));
    }
}

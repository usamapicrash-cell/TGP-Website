<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Database se settings fetch karein
        $setting = HomeSetting::first();
        $gallery = GalleryItem::where('show_on_home', 1)
            ->latest()
            ->take(10)
            ->get();
        // Agar data nahi hai to error se bachne ke liye empty object pass karein
        return view('home', compact('setting', 'gallery'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GallerySetting;
use App\Models\GalleryCategory;
class GalleryController extends Controller
{
    public function index()
    {
        $gallerySetting = GallerySetting::first();
        // Categories with subcategories and their items
        $categories = GalleryCategory::with('subCategories.items')->get();
        
        return view('gallery', compact('gallerySetting', 'categories'));
    }
}

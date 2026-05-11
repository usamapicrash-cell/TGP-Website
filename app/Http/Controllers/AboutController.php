<?php

namespace App\Http\Controllers;
use App\Models\AboutSetting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Pehla record fetch karein
        $about = AboutSetting::first();
        return view('about', compact('about'));
    }
}
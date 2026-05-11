<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewSetting;
class ReviewController extends Controller
{
    public function index()
    {
        $reviewSetting = ReviewSetting::first();
        return view('reviews', compact('reviewSetting'));
    }
}

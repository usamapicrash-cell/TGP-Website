<?php
namespace App\Http\Controllers;

use App\Models\CustomPage;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function show($slug)
    {
        $page = CustomPage::where('slug', $slug)->where('status', 1)->firstOrFail();
        
        return view('pages.dynamic', compact('page'));
    }
}
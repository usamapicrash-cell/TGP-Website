<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\Term;
class TPController extends Controller
{
    public function terms()
    {
        $term = Term::first();
        return view('terms', compact('term'));
    }

    public function privacy()
    {
        $privacy = PrivacyPolicy::first();
        return view('privacy', compact('privacy'));
    }
}

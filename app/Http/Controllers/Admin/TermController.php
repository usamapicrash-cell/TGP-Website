<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;

class TermController extends Controller
{
    public function edit()
    {
        $term = Term::first(); 
        return view('admin.terms.edit', compact('term'));
    }

    public function update(Request $request)
    {
        // 1. Validation for SEO and Content fields
        $request->validate([
            'meta_title'       => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords'    => 'nullable',
            'heading_1'        => 'nullable|max:255',
            'heading_2'        => 'nullable|max:255',
            'description'      => 'nullable',
        ]);

        // 2. Database Update or Create (ID 1 fix rakha hai single record ke liye)
        Term::updateOrCreate(
            ['id' => 1], 
            $request->only([
                'meta_title', 
                'meta_description', 
                'meta_keywords', 
                'heading_1', 
                'heading_2', 
                'description'
            ])
        );

        return redirect()->back()->with('success', 'Terms of Service updated successfully!');
    }
}
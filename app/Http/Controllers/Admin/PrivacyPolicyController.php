<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    // Form show karne ke liye
    public function edit()
    {
        // First record get karega, agar nahi hai to empty instance pass karega
        $privacy = PrivacyPolicy::first(); 
        
        return view('admin.privacy.edit', compact('privacy'));
    }

    // Form data save/update karne ke liye
    public function update(Request $request)
    {
        // Validation rules
        $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'heading_1' => 'nullable|string|max:255',
            'heading_2' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // updateOrCreate use kar rahe hain taake agar table empty ho to new record ban jaye, 
        // aur agar pehle se mojood ho to wahi update ho (id: 1).
        PrivacyPolicy::updateOrCreate(
            ['id' => 1], 
            [
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
                'heading_1' => $request->heading_1,
                'heading_2' => $request->heading_2,
                'description' => $request->description,
            ]
        );

        return redirect()->back()->with('success', 'Privacy Policy updated successfully!');
    }
}
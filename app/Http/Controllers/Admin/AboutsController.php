<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\GallerySetting;
use App\Models\GalleryCategory;
use App\Models\GallerySubCategory;
use App\Models\GalleryItem;
use App\Models\BlogSetting;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\ReviewSetting;
use App\Models\Service;
use App\Models\ServiceSetting;
use App\Models\AboutSetting;
use App\Models\Team;
use Illuminate\Support\Facades\File;

class AboutsController extends Controller
{

    public function edit()
    {
        // Agar record nahi hai to pehla create karega (First-time setup)
        $about = AboutSetting::first() ?: AboutSetting::create(['hero_h1' => "Welcome"]);
        $team = Team::orderBy('id', 'desc')->get();
        return view('admin.about.edit', compact('about', 'team'));
    }

    public function update(Request $request)
    {
        $about = AboutSetting::first();

        $data = $request->all();

        // Checkboxes (Switches) Logic
        $data['hero_status'] = $request->has('hero_status') ? 1 : 0;
        $data['breadform_status'] = $request->has('breadform_status') ? 1 : 0;

        // Hero Image Upload
        if ($request->hasFile('hero_img')) {
            if ($about->hero_img && File::exists(public_path($about->hero_img))) {
                File::delete(public_path($about->hero_img));
            }
            $data['hero_img'] = $this->uploadFile($request->file('hero_img'));
        }

        // Story Image Upload
        if ($request->hasFile('story_img')) {
            if ($about->story_img && File::exists(public_path($about->story_img))) {
                File::delete(public_path($about->story_img));
            }
            $data['story_img'] = $this->uploadFile($request->file('story_img'));
        }

        $about->update($data);

        return redirect()->back()->with('success', 'About Page updated successfully! 🚀');
    }

    public function storeMember(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $data = $request->only('title', 'subtitle');
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->file('image'));
        }

        Team::create($data);
        return redirect()->back()->with('success', 'Team Member added! 👥');
    }

    public function deleteMember($id)
    {
        $member = Team::findOrFail($id);
        if ($member->image && File::exists(public_path($member->image))) {
            File::delete(public_path($member->image));
        }
        $member->delete();
        return redirect()->back()->with('success', 'Member removed!');
    }

    private function uploadFile($file) {
        $name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/about'), $name);
        return 'uploads/about/' . $name;
    }
}
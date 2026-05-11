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
use Illuminate\Support\Facades\File;

class ServicesController extends Controller
{

public function index() {
        $settings = ServiceSetting::first() ?? ServiceSetting::create(['meta_title' => 'Services']);
        $services = Service::orderBy('order', 'asc')->get();
        return view('admin.services.index', compact('settings', 'services'));
    }

    public function updateSettings(Request $request) {
        $settings = ServiceSetting::first();
        $data = $request->all();

        // Toggles (Hero & Breadcrumb)
        $data['hero_status'] = $request->has('hero_status') ? 1 : 0;
        $data['breadform_status'] = $request->has('breadform_status') ? 1 : 0;

        if ($request->hasFile('hero_img')) {
            if ($settings->hero_img && File::exists(public_path($settings->hero_img))) {
                File::delete(public_path($settings->hero_img));
            }
            $image = $request->file('hero_img');
            $name = 'hero_'.time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/images/services'), $name);
            $data['hero_img'] = 'assets/images/services/'.$name;
        }

        $settings->update($data);
        return back()->with('success', 'Page settings updated successfully!');
    }

    public function store(Request $request)
	{
	    $request->validate([
	        'heading' => 'required',
	        'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
	    ]);

	    $data = $request->all();

	    if ($request->hasFile('image')) {
	        $imageName = time().'.'.$request->image->extension();
	        $request->image->move(public_path('uploads/services'), $imageName);
	        $data['image'] = 'uploads/services/'.$imageName;
	    }

	    Service::create($data);

	    return redirect()->back()->with('success', 'Service Section created successfully!');
	}

    public function destroy($id) {
        $service = Service::findOrFail($id);
        if ($service->image && File::exists(public_path($service->image))) {
            File::delete(public_path($service->image));
        }
        $service->delete();
        return back()->with('success', 'Service deleted!');
    }

}
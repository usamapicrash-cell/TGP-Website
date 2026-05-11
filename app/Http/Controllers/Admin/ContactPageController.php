<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use App\Models\ServiceArea;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactPageController extends Controller
{
    public function index() {
        $setting = ContactSetting::first() ?? new ContactSetting();
        $areas = ServiceArea::orderBy('order_position')->get();
        $faqs = Faq::orderBy('order_position')->get();
        return view('admin.contact.index', compact('setting', 'areas', 'faqs'));
    }

    public function update(Request $request) {
        $setting = ContactSetting::first() ?? new ContactSetting();
        $data = $request->except('hero_image');

        if ($request->hasFile('hero_image')) {
            if ($setting->hero_image && File::exists(public_path($setting->hero_image))) {
                File::delete(public_path($setting->hero_image));
            }
            $imageName = time().'.'.$request->hero_image->extension();
            $request->hero_image->move(public_path('uploads/contact'), $imageName);
            $data['hero_image'] = 'uploads/contact/'.$imageName;
        }

        $data['is_hero_visible'] = $request->has('is_hero_visible');
        
        $setting->fill($data)->save();
        return back()->with('success', 'Settings updated successfully!');
    }

    public function storeServiceArea(Request $request) {
        ServiceArea::create($request->all());
        return back()->with('success', 'Area added!');
    }

    public function deleteServiceArea($id) {
        ServiceArea::findOrFail($id)->delete();
        return back()->with('success', 'Area deleted!');
    }

    public function storeFaq(Request $request) {
        Faq::create($request->all());
        return back()->with('success', 'FAQ added!');
    }

    public function deleteFaq($id) {
        Faq::findOrFail($id)->delete();
        return back()->with('success', 'FAQ deleted!');
    }
}
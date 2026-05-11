<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomPageController extends Controller
{
    public function index() {
        $pages = CustomPage::all();
        return view('admin.custom_pages.index', compact('pages'));
    }

    public function create() {
        return view('admin.custom_pages.create');
    }

    public function store(Request $request)
{
    $data = $request->all();
    $data['slug'] = \Illuminate\Support\Str::slug($request->page_name);
    
    // 1. Hero Image Upload (Direct to Public)
    if ($request->hasFile('hero_img')) {
        $fileName = time() . '_hero.' . $request->hero_img->extension();
        $request->hero_img->move(public_path('uploads/pages/hero'), $fileName);
        $data['hero_img'] = 'uploads/pages/hero/' . $fileName;
    }

    // 2. Dynamic Sections Handling
    $finalSections = [];
    if ($request->has('sections')) {
        foreach ($request->sections as $index => $section) {
            $sectionData = [
                'type'    => $section['type'],
                'heading' => $section['heading'] ?? null,
                'text'    => $section['text'] ?? null,
                'map'     => $section['map'] ?? null,
                'image'   => null
            ];

            // Section Image Upload (Direct to Public)
            if ($request->hasFile("sections.$index.file")) {
                $sectionFile = $request->file("sections.$index.file");
                $secFileName = time() . '_' . $index . '_sec.' . $sectionFile->extension();
                $sectionFile->move(public_path('uploads/pages/sections'), $secFileName);
                $sectionData['image'] = 'uploads/pages/sections/' . $secFileName;
            }

            $finalSections[] = $sectionData;
        }
    }

    $data['content_json'] = $finalSections;

    \App\Models\CustomPage::create($data);
    return redirect()->route('admin.custom-pages.index')->with('success', 'Page Created Successfully!');
}

public function update(Request $request, $id)
{
    $page = \App\Models\CustomPage::findOrFail($id);
    $data = $request->all();
    $data['slug'] = \Illuminate\Support\Str::slug($request->page_name);

    // Hero Image Update
    if ($request->hasFile('hero_img')) {
        $fileName = time() . '_hero.' . $request->hero_img->extension();
        $request->hero_img->move(public_path('uploads/pages/hero'), $fileName);
        $data['hero_img'] = 'uploads/pages/hero/' . $fileName;
    }

    // Dynamic Sections Update
    $finalSections = [];
    if ($request->has('sections')) {
        foreach ($request->sections as $index => $section) {
            $sectionData = [
                'type'    => $section['type'],
                'heading' => $section['heading'] ?? null,
                'text'    => $section['text'] ?? null,
                'map'     => $section['map'] ?? null,
                'image'   => $section['old_image'] ?? null 
            ];

            if ($request->hasFile("sections.$index.file")) {
                $sectionFile = $request->file("sections.$index.file");
                $secFileName = time() . '_' . $index . '_sec.' . $sectionFile->extension();
                $sectionFile->move(public_path('uploads/pages/sections'), $secFileName);
                $sectionData['image'] = 'uploads/pages/sections/' . $secFileName;
            }

            $finalSections[] = $sectionData;
        }
    }
    $data['content_json'] = $finalSections;

    $page->update($data);
    return redirect()->route('admin.custom-pages.index')->with('success', 'Page Updated Successfully!');
}

	public function edit($id)
	{
	    $page = CustomPage::findOrFail($id);
	    return view('admin.custom_pages.edit', compact('page'));
	}

	

	public function destroy($id)
	{
	    $page = CustomPage::findOrFail($id);

	    // Optional: Delete images from storage to save space
	    if ($page->hero_img && \Storage::disk('public')->exists($page->hero_img)) {
	        \Storage::disk('public')->delete($page->hero_img);
	    }

	    if ($page->content_json) {
	        foreach ($page->content_json as $section) {
	            if (isset($section['image']) && \Storage::disk('public')->exists($section['image'])) {
	                \Storage::disk('public')->delete($section['image']);
	            }
	        }
	    }

	    $page->delete();

	    return redirect()->route('admin.custom-pages.index')->with('success', 'Page deleted successfully!');
	}

	public function updateStatus(Request $request, $id)
	{
	    $page = CustomPage::findOrFail($id);
	    $page->status = $request->status;
	    $page->save();

	    return response()->json(['success' => true]);
	}
}
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
use App\Models\HomeSetting;
use App\Models\ContactEnquiry;
use App\Models\ContractorEnquiry;

use Illuminate\Support\Facades\File;
class AdminController extends Controller
{
    
    public function dashboard()
    {
        // Latest submissions pehle dikhane ke liye latest() use kiya hai
        $contactQueries = ContactEnquiry::latest()->get();
        $contractorRfqs = ContractorEnquiry::latest()->get();

        return view('admin.dashboard', compact('contactQueries', 'contractorRfqs'));
    }

    public function toggleHome(Request $request)
    {
        $item = GalleryItem::find($request->id);

        if (!$item) {
            return response()->json(['success' => false]);
        }

        $item->show_on_home = $request->show_on_home;
        $item->save();

        return response()->json(['success' => true]);
    }

    public function gallery()
    {
        $setting = GallerySetting::first() ?? new GallerySetting();
        $categories = GalleryCategory::all();
        $subCategories = GallerySubCategory::with('category')->get();
        $items = GalleryItem::with('subCategory')->latest()->get();

        return view('admin.gallery', compact('setting', 'categories', 'subCategories', 'items'));
    }

    // 1. Store Main Category (e.g., Residential)
    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        
        GalleryCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) // Auto-generates slug for isotope filter
        ]);

        return back()->with('success', 'Main Category Added!');
    }

    // 2. Store Sub Category (e.g., Windows)
    public function storeSubCategory(Request $request)
    {
        $request->validate([
            'gallery_category_id' => 'required|exists:gallery_categories,id',
            'name' => 'required|string|max:255'
        ]);
        
        GallerySubCategory::create([
            'gallery_category_id' => $request->gallery_category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name) // Auto-generates slug for isotope filter
        ]);

        return back()->with('success', 'Sub Category Added!');
    }

    // 3. Store Image with Description
    public function storeGalleryItem(Request $request)
    {
        $request->validate([
            'gallery_sub_category_id' => 'required|exists:gallery_sub_categories,id',
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $item = new GalleryItem();
        $item->gallery_sub_category_id = $request->gallery_sub_category_id;
        $item->title = $request->title;
        $item->location = $request->location;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/images/gallery'), $imageName);
            $item->image = 'assets/images/gallery/' . $imageName;
        }

        $item->save();

        return back()->with('success', 'Image Uploaded Successfully!');
    }

    public function updateGallery(Request $request)
    {
        $setting = GallerySetting::first() ?? new GallerySetting();

        $setting->title = $request->title;
        $setting->meta_description = $request->meta_description;
        $setting->meta_keywords = $request->meta_keywords;
        
        // Switches Handle (If null set 0, else 1)
        $setting->hero_status = $request->has('hero_status') ? 1 : 0;
        $setting->breadform_status = $request->has('breadform_status') ? 1 : 0;
        
        $setting->hero_heading = $request->hero_heading;
        $setting->hero_subheading = $request->hero_subheading;
        $setting->hero_description = $request->hero_description;
        $setting->portfolio_subtitle = $request->portfolio_subtitle;
        $setting->portfolio_heading = $request->portfolio_heading;

        if ($request->hasFile('hero_image')) {
            // Purani image delete karna chaho to: 
            // if($setting->hero_image) File::delete(public_path($setting->hero_image));
            
            $imageName = 'hero_'.time().'.'.$request->hero_image->extension();  
            $request->hero_image->move(public_path('assets/images/gallery'), $imageName);
            $setting->hero_image = 'assets/images/gallery/' . $imageName;
        }

        $setting->save();

        return back()->with('success', 'Gallery Page Settings updated!');
    }

    // 4. Delete Image
    public function deleteGalleryItem($id)
    {
        $item = GalleryItem::findOrFail($id);
        if(File::exists(public_path($item->image))){
            File::delete(public_path($item->image));
        }
        $item->delete();
        return back()->with('success', 'Image Deleted!');
    }


    public function deleteCategory($id)
    {
        // Assuming your model is named GalleryCategory
        $category = GalleryCategory::findOrFail($id);
        
        // Optional: If you aren't using constrained()->cascadeOnDelete() in your migrations, 
        // you should delete associated subcategories and items here first.
        // $category->subCategories()->delete(); 

        $category->delete();

        return redirect()->back()->with('success', 'Main category deleted successfully.');
    }

    public function deleteSubCategory($id)
    {
        // Assuming your model is named GallerySubCategory
        $subCategory = GallerySubCategory::findOrFail($id);
        
        // Optional: Delete associated gallery items
        // $subCategory->items()->delete();

        $subCategory->delete();

        return redirect()->back()->with('success', 'Sub-category deleted successfully.');
    }



    // 1. Show Blog Admin Page
    public function blog()
    {
        $setting = BlogSetting::first() ?? new BlogSetting();
        $categories = BlogCategory::all();
        $posts = BlogPost::with('category')->latest()->get();

        return view('admin.blog', compact('setting', 'categories', 'posts'));
    }

    // 2. Update Blog Page Settings
    public function updateBlogSetting(Request $request)
    {
        $setting = BlogSetting::first() ?? new BlogSetting();
        $setting->fill($request->except(['hero_status', 'breadform_status', 'hero_image']));
        
        $setting->hero_status = $request->has('hero_status') ? 1 : 0;
        $setting->breadform_status = $request->has('breadform_status') ? 1 : 0;

        if ($request->hasFile('hero_image')) {
            $imageName = 'blog_hero_'.time().'.'.$request->hero_image->extension();  
            $request->hero_image->move(public_path('assets/images/blog'), $imageName);
            $setting->hero_image = 'assets/images/blog/' . $imageName;
        }
        $setting->save();
        return back()->with('success', 'Blog settings updated!');
    }

    // 3. Store Category
    public function storeBlogCategory(Request $request)
    {
        $request->validate(['name' => 'required']);
        BlogCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return back()->with('success', 'Category Added!');
    }

    // 4. Store Post
    public function storeBlogPost(Request $request)
    {
        $request->validate([
            'blog_category_id' => 'required',
            'title' => 'required',
            'image' => 'required|image',
            'content' => 'required'
        ]);

        $post = new BlogPost();
        $post->blog_category_id = $request->blog_category_id;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;
        $post->date = $request->date ?? now()->format('F d, Y');

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/images/blog'), $imageName);
            $post->image = 'assets/images/blog/' . $imageName;
        }
        $post->save();
        return back()->with('success', 'Post Published!');
    }

    // 5. Delete Post
    public function deleteBlogPost($id)
    {
        $post = BlogPost::findOrFail($id);
        if(File::exists(public_path($post->image))) {
            File::delete(public_path($post->image));
        }
        $post->delete();
        return back()->with('success', 'Post Deleted!');
    }

    public function reviews()
    {
        // FirstOrCreate approach: Agar table khali hai to default data ke sath row bana dega
        $setting = ReviewSetting::first() ?? ReviewSetting::create([
            'title' => 'Customer Reviews | The Glass People',
            'hero_heading' => "Portland's Premier Glass Experts",
            'promise_text' => 'The Neighborly Done Right Promise® delivered by <br> <strong>The Glass People®</strong>',
        ]);

        return view('admin.reviews', compact('setting'));
    }

    public function updateReviewSetting(Request $request)
    {
        $setting = ReviewSetting::first();
        $data = $request->all();

        // Checkboxes Toggle Handling
        $data['hero_status'] = $request->has('hero_status') ? 1 : 0;
        $data['breadform_status'] = $request->has('breadform_status') ? 1 : 0;

        // Image Upload
        if ($request->hasFile('hero_image')) {
            $image = $request->file('hero_image');
            $name = 'hero_review_'.time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/images/hero'), $name);
            $data['hero_image'] = 'assets/images/hero/'.$name;
        }

        $setting->update($data);

        return back()->with('success', 'Reviews Page Updated Successfully!');
    }

    public function homeEdit()
    {
        // Pehla record uthayega, nahi milega to empty create kar dega
        $setting = HomeSetting::firstOrCreate(['id' => 1]); 
        return view('admin.home-edit', compact('setting'));
    }

    public function updateHome(Request $request)
    {
        $setting = HomeSetting::firstOrCreate(['id' => 1]);

        // Sirf text data capture karein, images aur arrays ko alag handle karenge
        $data = $request->except([
            '_token', 
            'hero_image', 
            'about_image_1', 
            'about_image_2', 
            'why_choose_side_image',
            'why_choose_badges', 
            'contractor_bullets'
        ]);

        // --- 1. Handle Images (Charo images ke liye same logic) ---
        $imageFields = [
            'hero_image' => 'assets/images/banners',
            'about_image_1' => 'assets/images/about',
            'about_image_2' => 'assets/images/about',
            'why_choose_side_image' => 'assets/images/why-us'
        ];

        foreach ($imageFields as $field => $path) {
            if ($request->hasFile($field)) {
                // Purani image delete karein agar exist karti hai
                if ($setting->$field && File::exists(public_path($setting->$field))) {
                    File::delete(public_path($setting->$field));
                }
                
                $imageName = $field . '_' . time() . '.' . $request->$field->extension();  
                $request->$field->move(public_path($path), $imageName);
                $data[$field] = $path . '/' . $imageName;
            }
        }

        // --- 2. Handle JSON Data (Badges aur Bullets) ---
        // Why Choose Us Badges: Array of Objects (Icon, Title, Desc)
        if ($request->has('why_choose_badges')) {
            $data['why_choose_badges'] = $request->why_choose_badges;
        }

        // Contractor Bullet Points: Simple Array of strings
        if ($request->has('contractor_bullets')) {
            $data['contractor_bullets'] = $request->contractor_bullets;
        }

        // --- 3. Database Update ---
        $setting->update($data);

        return redirect()->back()->with('success', 'Home Page Settings Updated Successfully!');
    }
}
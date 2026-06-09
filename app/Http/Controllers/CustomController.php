<?php
namespace App\Http\Controllers;

use App\Models\CustomPage;
use App\Models\Menu;
use App\Models\Footer;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function show($slug)
    {
        $page = CustomPage::where('slug', $slug)->where('status', 1)->firstOrFail();
        return view('pages.dynamic', compact('page'));
    }

    public function index() {
        // Fetch all menus and build a tree structure for Nestable
        $allMenus = Menu::orderBy('order')->get();
        $menuTree = $this->buildTree($allMenus);
        
        $footers = Footer::all()->groupBy('column_index');
        
        return view('admin.custom.index', compact('menuTree', 'footers'));
    }

    // Helper function to build parent/child tree
    private function buildTree($elements, $parentId = null) {
        $branch = [];
        foreach ($elements as $element) {
            if ($element->parent_id == $parentId) {
                $children = $this->buildTree($elements, $element->id);
                if ($children) {
                    $element->children = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }

    public function update(Request $request) {
        // 1. Menu Logic (Nestable JSON)
        if ($request->menu_json) {
            Menu::truncate();
            $items = json_decode($request->menu_json, true);
            if ($items) {
                $this->saveMenu($items);
            }
        }

        // 2. Footer Logic
        Footer::truncate();
        if($request->footer) {
            foreach($request->footer as $col => $items) {
                foreach($items as $item) {
                    if(!empty($item['title'])) {
                        Footer::create(['column_index' => $col, 'title' => $item['title'], 'url' => $item['url']]);
                    }
                }
            }
        }
        return back()->with('success', 'Settings Saved Successfully!');
    }

    private function saveMenu($items, $parentId = null, $order = 0) {
        foreach ($items as $item) {
            $title = $item['title'] ?? 'Untitled';
            $url = $item['url'] ?? '#';
            
            $menu = Menu::create([
                'title' => $title,
                'url'   => $url,
                'parent_id' => $parentId,
                'order' => $order++
            ]);
            
            if (!empty($item['children'])) {
                $this->saveMenu($item['children'], $menu->id);
            }
        }
    }
}
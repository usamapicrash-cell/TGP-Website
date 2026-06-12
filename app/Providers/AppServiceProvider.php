<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Yeh zaroori hai
use App\Models\Menu;
use App\Models\Footer;
use Illuminate\Support\Facades\Http;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {
        //
    }

    public function boot(): void
    {
        // View Composer ka istemal: '*' ka matlab hai saari files/views
        View::composer('*', function ($view) {
            
            // 1. Menu Tree Logic
            $allMenus = Menu::orderBy('order')->get();
            $menuTree = $this->buildTreeGlobal($allMenus);

            // 2. Footer Logic
            $footers = Footer::all()->groupBy('column_index');

            // Data ko share karna
            $view->with([
                'menuTree' => $menuTree,
                'footers'  => $footers
            ]);
        });
    }

    // Recursive function yahan provider mein move kar dein
    private function buildTreeGlobal($elements, $parentId = null) {
        $branch = [];
        foreach ($elements as $element) {
            if ($element->parent_id == $parentId) {
                $children = $this->buildTreeGlobal($elements, $element->id);
                if ($children) {
                    $element->children = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }
}
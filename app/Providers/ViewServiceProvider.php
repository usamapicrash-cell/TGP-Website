<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ContactSetting;
use App\Models\HomeSetting;
use App\Models\Service;
use App\Models\ServiceArea;
use App\Models\ReviewSetting;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Sabhi views (*) ke liye variables share karein
        View::composer('*', function ($view) {
            // Data fetch karein
            $Pcontact = ContactSetting::first();
            $Psetting = HomeSetting::first();
            $Pservices = Service::orderBy('order', 'asc')->get(); // Order wise fetch
            $PserviceArea = ServiceArea::where('is_active', true)
                            ->orderBy('order_position', 'asc')
                            ->get();
            $PReview = ReviewSetting::first();
            // Array ke zariye multiple variables pass karein
            $view->with([
                'Pcontact' => $Pcontact,
                'Psetting' => $Psetting,
                'Pservices' => $Pservices,
                'PserviceArea' => $PserviceArea,
                'PReview' => $PReview,
            ]);
        });
    }
}
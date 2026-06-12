<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ContactSetting;
use App\Models\HomeSetting;
use App\Models\Service;
use App\Models\ServiceArea;
use App\Models\ReviewSetting;
use Illuminate\Support\Facades\Http;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Sabhi views (*) ke liye variables share karein
        View::composer('*', function ($view) {
            
            // Data fetch karein
            $Pcontact = ContactSetting::first();
            $Psetting = HomeSetting::first();
            $Pservices = Service::orderBy('order', 'asc')->get();
            $PserviceArea = ServiceArea::where('is_active', true)
                            ->orderBy('order_position', 'asc')
                            ->get();
            $PReview = ReviewSetting::first();

            $apiKey = env('GOOGLE_MAPS_API_KEY');
            
            // Yahan apna Place ID daalein (ya database se PReview waghera se fetch karein)
            $placeId = "ChIJMVlzQHkPlVQRIK2Himg6_mM"; 

            $url = "https://maps.googleapis.com/maps/api/place/details/json";
            $response = Http::get($url, [
                'place_id' => $placeId,
                'fields' => 'reviews,rating,name,user_ratings_total',
                'key' => $apiKey
            ]);

            // Return karne ke bajaye usko ek variable mein save karein
            $googleReviews = $response->json();

            // Ab Array ke zariye multiple variables pass karein
            $view->with([
                'Pcontact' => $Pcontact,
                'Psetting' => $Psetting,
                'Pservices' => $Pservices,
                'PserviceArea' => $PserviceArea,
                'PReview' => $PReview,
                'googleReviews' => $googleReviews, // Yeh Google Reviews ko view mein bhej dega
            ]);
        });
    }
}
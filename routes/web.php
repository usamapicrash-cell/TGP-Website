<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\TPController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\AboutsController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\CustomPageController;

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutController::class, 'index'])->name('about-us');
Route::get('/services', [ServiceController::class, 'index'])->name('service');
Route::get('/our-reviews', [ReviewController::class, 'index'])->name('our-reviews');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.detail');
Route::post('/contractor-enquiry', [ContactController::class, 'storeContractorEnquiry'])->name('contractor.send');
Route::post('/contact/send', [ContactController::class, 'store'])->name('contact.send');
Route::get('/page/{slug}', [CustomController::class, 'show'])->name('page.show');
Route::get('/terms-conditions', [TPController::class, 'terms']);
Route::get('/privacy-policy', [TPController::class, 'privacy']);

Route::prefix('admin/contact')->name('admin.contact.')->middleware('auth')->group(function () {
    Route::get('/', [ContactPageController::class, 'index'])->name('index');
    Route::post('/update', [ContactPageController::class, 'update'])->name('update');
    
    // Service Areas
    Route::post('/service-area', [ContactPageController::class, 'storeServiceArea'])->name('service_area.store');
    Route::delete('/service-area/{id}', [ContactPageController::class, 'deleteServiceArea'])->name('service_area.delete');
    
    // FAQs
    Route::post('/faq', [ContactPageController::class, 'storeFaq'])->name('faq.store');
    Route::delete('/faq/{id}', [ContactPageController::class, 'deleteFaq'])->name('faq.delete');
});
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('custom-pages', CustomPageController::class);
    Route::post('custom-pages/update-status/{id}', [CustomPageController::class, 'updateStatus'])->name('custom-pages.update-status');
    // Profile Edit Page
    Route::get('/profile-edit', [AdminProfileController::class, 'edit'])->name('profile.edit');
    
    // Update Name & Email
    Route::post('/profile-update', [AdminProfileController::class, 'updateProfile'])->name('profile.update');
    
    // Update Password
    Route::post('/password-update', [AdminProfileController::class, 'updatePassword'])->name('password.update');
    
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/home-edit', [AdminController::class, 'homeEdit'])->name('home.edit');
    Route::post('/home-update', [AdminController::class, 'updateHome'])->name('home.update');
    // Gallery Page Settings & View
    Route::get('/gallery-edit', [AdminController::class, 'gallery'])->name('gallery');
    Route::post('/gallery-edit', [AdminController::class, 'updateGallery'])->name('gallery.update');

    // Categories, Sub-Categories & Items Actions
    Route::post('/gallery/category', [AdminController::class, 'storeCategory'])->name('gallery.category.store');
    Route::post('/gallery/subcategory', [AdminController::class, 'storeSubCategory'])->name('gallery.subcategory.store');
    Route::post('/gallery/item', [AdminController::class, 'storeGalleryItem'])->name('gallery.item.store');
    
    // Delete Route (Optional but recommended)
    Route::delete('/gallery/item/{id}', [AdminController::class, 'deleteGalleryItem'])->name('gallery.item.delete');


    Route::get('/blog-edit', [AdminController::class, 'blog'])->name('blog');
    Route::post('/blog-edit', [AdminController::class, 'updateBlogSetting'])->name('blog.update');
    Route::post('/blog/category', [AdminController::class, 'storeBlogCategory'])->name('blog.category.store');
    Route::post('/blog/post', [AdminController::class, 'storeBlogPost'])->name('blog.post.store');
    Route::delete('/blog/post/{id}', [AdminController::class, 'deleteBlogPost'])->name('blog.post.delete');

    Route::get('/review-edit', [AdminController::class, 'reviews'])->name('reviews');
    Route::post('/reviews-update', [AdminController::class, 'updateReviewSetting'])->name('reviews.update');


    Route::get('service-edit', [ServicesController::class, 'index'])->name('services.index');
    Route::post('services/settings-update', [ServicesController::class, 'updateSettings'])->name('services.settings.update');
    
    // Services CRUD
    Route::post('services/store', [ServicesController::class, 'store'])->name('services.store');
    Route::get('services/edit/{id}', [ServicesController::class, 'edit'])->name('services.edit');
    Route::post('services/update/{id}', [ServicesController::class, 'update'])->name('services.update');
    Route::get('services/delete/{id}', [ServicesController::class, 'destroy'])->name('services.delete');

    Route::get('/about-edit', [AboutsController::class, 'edit'])->name('about.edit');
    Route::post('/about-update', [AboutsController::class, 'update'])->name('about.update');
    // Team Members CRUD
    Route::post('team-member/store', [AboutsController::class, 'storeMember'])->name('team.store');
    Route::get('team-member/delete/{id}', [AboutsController::class, 'deleteMember'])->name('team.delete');
    
    Route::get('/privacy-edit', [PrivacyPolicyController::class, 'edit'])->name('privacy.edit');
    Route::post('/privacy-policy', [PrivacyPolicyController::class, 'update'])->name('privacy.update');

    Route::get('/terms-edit', [TermController::class, 'edit'])->name('terms.edit');
    Route::post('/terms-of-service', [TermController::class, 'update'])->name('terms.update');

});

Auth::routes();


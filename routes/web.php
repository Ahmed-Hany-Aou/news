<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Frontend\ExtraController;




 
/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| These routes are accessible to everyone, including unauthenticated users.
| The home route uses Route::view() because it only returns a static view,
| which is faster and more efficient than using a closure or a controller.
|
*/

// Home Page
Route ::get('/',function(){
    return view('main.home');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
|
| These routes require the user to be authenticated and, for the dashboard, 
| also verified. The 'auth' middleware ensures the user is logged in, 
| and 'verified' middleware ensures the user's email is verified.
|
| The Route::view() method is used instead of a closure or controller
| because these routes only return a view without any additional logic.
| This approach is faster and adheres to the Single Responsibility Principle.
|
| Previously considered (but not used) code:
|
| Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
|     return view('admin.index');
| })->name('dashboard');  from udemy course
|
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Admin Dashboard
    Route::view('/dashboard', 'admin.index')->name('dashboard');

    // User Profile
    Route::view('/profile', 'profile')->name('profile');

});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| These routes handle authentication features such as login, registration,
| password reset, and email verification. They are automatically generated
| by Laravel Breeze (or the chosen starter kit) and include all necessary
| logic for secure authentication.
|
*/

// Admin Logout 
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

// Admin Category All Routes 

Route::get('/categories', [CategoryController::class, 'Index'])->name('categories');
Route::get('/add/category', [CategoryController::class, 'AddCategory'])->name('add.category');
Route::post('/store/category', [CategoryController::class, 'StoreCategory'])->name('store.category');
Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');
Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');
Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');


// Admin SubCategory All Routes 
Route::get('/subcategories', [SubCategoryController::class, 'Index'])->name('subcategories');

Route::get('/add/subcategory', [SubCategoryController::class, 'AddSubCategory'])->name('add.subcategory');

Route::post('/store/subcategory', [SubCategoryController::class, 'StoreSubCategory'])->name('store.subcategory');

Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'EditSubCategory'])->name('edit.subcategory');

Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'UpdateSubCategory'])->name('update.subcategory');

Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'DeleteSubCategory'])->name('delete.subcategory');

// Admin District All Routes 
Route::get('/district', [DistrictController::class, 'Index'])->name('district');

Route::get('/add/district', [DistrictController::class, 'AddDistrict'])->name('add.district');

Route::post('/store/district', [DistrictController::class, 'StoreDistrict'])->name('store.district');

Route::get('/edit/district/{id}', [DistrictController::class, 'EditDistrict'])->name('edit.district');

Route::post('/update/district/{id}', [DistrictController::class, 'UpdateDistrict'])->name('update.district');

Route::get('/delete/district/{id}', [DistrictController::class, 'DeleteDistrict'])->name('delete.district');

// Admin SubDistrict All Routes 
Route::get('/subdistrict', [SubDistrictController::class, 'Index'])->name('subdistrict');

Route::get('/add/subdistrict', [SubDistrictController::class, 'AddSubDistrict'])->name('add.subdistrict');

Route::post('/store/subdistrict', [SubDistrictController::class, 'StoreSubDistrict'])->name('store.subdistrict');

Route::get('/edit/subdistrict/{id}', [SubDistrictController::class, 'EditSubDistrict'])->name('edit.subdistrict');

Route::post('/update/subdistrict/{id}', [SubDistrictController::class, 'UpdateSubDistrict'])->name('update.subdistrict');

Route::get('/delete/subdistrict/{id}', [SubDistrictController::class, 'DeleteSubDistrict'])->name('delete.subdistrict');



// Json Data for Category and District
Route::get('/get/subcategory/{category_id}', [PostController::class, 'GetSubCategory']);

Route::get('/get/subdistrict/{district_id}', [PostController::class, 'GetSubDistrict']);



// Admin Posts All Routes
Route::get('/allpost', [PostController::class, 'index'])->name('all.post');

Route::get('/createpost', [PostController::class, 'Create'])->name('create.post');

//Route::post('/store/post', [PostController::class, 'StorePost'])->name('store.post');
Route::post('/store/post', [PostController::class, 'store'])->name('store.post');


Route::get('/edit/post/{id}', [PostController::class, 'EditPost'])->name('edit.post');

Route::post('/update/post/{id}', [PostController::class, 'UpdatePost'])->name('update.post');

Route::get('/delete/post/{id}', [PostController::class, 'DeletePost'])->name('delete.post');

// Social Settings 
Route::get('/social/setting', [SettingController::class, 'SocialSetting'])->name('social.setting');

Route::post('/social/update/{id}', [SettingController::class, 'SocialUpdate'])->name('update.social');

// Seo Settings Routes

Route::get('/seo/setting', [SettingController::class, 'SeoSetting'])->name('seo.setting');

Route::post('/seo/update/{id}', [SettingController::class, 'SeoUpdate'])->name('update.seo');

/// Prayers Setting Routes 

Route::get('/prayer/setting', [SettingController::class, 'PrayerSetting'])->name('prayer.setting');

Route::post('/prayer/update/{id}', [SettingController::class, 'PrayerUpdate'])->name('update.prayer');


// Live Tv Setting 
Route::get('/livetv/setting', [SettingController::class, 'LiveTvSetting'])->name('livetv.setting');

Route::post('/livetv/update/{id}', [SettingController::class, 'LivetvUpdate'])->name('update.livetv');

Route::get('/livetv/active/{id}', [SettingController::class, 'ActiveSetting'])->name('active.livetv');//ActiveSetting was missing setting controller 

Route::get('/livetv/deactive/{id}', [SettingController::class, 'DeActiveSetting'])->name('deactive.livetv');

// Notice Setting Route
Route::get('/notice/setting', [SettingController::class, 'NoticeSetting'])->name('notice.setting');

Route::post('/notice/update/{id}', [SettingController::class, 'NoticeUpdate'])->name('update.notice');

Route::get('/notice/active/{id}', [SettingController::class, 'ActiveNoticeSetting'])->name('active.notice');

Route::get('/notice/deactive/{id}', [SettingController::class, 'DeActiveNoticeSetting'])->name('deactive.notice');

// Website LiNK Route 
//Route::get('/website/All', [SettingController::class, 'WebsiteAll'])->name('all.website');
Route::get('/website/setting', [SettingController::class, 'WebsiteSetting'])->name('website.setting');

Route::get('/add/website', [SettingController::class, 'AddWebsiteSetting'])->name('add.website');

Route::post('/store/website', [SettingController::class, 'StoreWebsite'])->name('store.website');

Route::get('/edit-website/{id}', [SettingController::class, 'EditWebsite'])->name('edit.website');
Route::post('/update-website/{id}', [SettingController::class, 'UpdateWebsite'])->name('update.websetting');

Route::get('/delete-website/{id}', [SettingController::class, 'DeleteWebsite'])->name('delete.website');


//Frontend
//Multi Langusage Routes

Route::get('/lang/hindi', [ExtraController::class, 'Hindi'])->name('lang.hindi');
Route::get('/lang/english', [ExtraController::class, 'English'])->name('lang.english');








require __DIR__.'/auth.php';
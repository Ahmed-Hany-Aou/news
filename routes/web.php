<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
Route::view('/', 'welcome')->name('home');

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


require __DIR__.'/auth.php';
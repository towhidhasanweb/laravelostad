<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Task 1: Request Validation: check api.php

// Task 2: Request Redirect
Route::get('/home', [AssignmentController::class, 'RedirectToDashboard']);
Route::get('/dashboard', [AssignmentController::class, 'dashboard']);



// Task 3: Global Middleware
// middleware setup done

// Task 4: Controller
// use like this URL /profile?name=towhid
// register new user using /registration api route
Route::middleware('authuser')->group(function () {
    Route::get('/profile', [AssignmentController::class, 'profile']);
    Route::get('/settings', [AssignmentController::class, 'settings']);
});

// Task 5: Controller : check api.php


// Task 6: Single Action Controller
route::get('/contact', ContactController::class);

// Task 7: Resource Controller
route::resource('/post', PostController::class);

// Task 8: Blade Template Engine
route::get('/', [AssignmentController::class, 'welcomePage']);




<?php

use App\Http\Controllers\AssignmentController;
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

Route::get('/', function () {
    return view('welcome');
});


// Answer 1 & 2
Route::post('/users', [AssignmentController::class, 'users_information']);




// Answer of Question-4
Route::get('/json-response', [AssignmentController::class, 'json_response']);

// Answer of Question-5
Route::post('/files', [AssignmentController::class, 'file_upload']);

// Answer of Question-6
Route::get('/cookie', [AssignmentController::class, 'add_cookie']);

// Answer of Question-7
Route::post('/submit', [AssignmentController::class, 'submit_email']);

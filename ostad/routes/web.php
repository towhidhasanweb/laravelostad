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



Route::post('/users', [AssignmentController::class, 'users_information']);


Route::get('/json-response', [AssignmentController::class, 'json_response']);


Route::post('/files', [AssignmentController::class, 'file_upload']);


Route::post('/cookie', [AssignmentController::class, 'add_cookie']);


Route::post('/submit', [AssignmentController::class, 'submit_email']);

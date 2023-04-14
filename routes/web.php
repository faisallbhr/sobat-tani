<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DaftarLowonganController;
use App\Http\Controllers\DaftarPekerjaanController;
use App\Http\Controllers\PetaniAccController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [UserController::class, 'index']);
Route::get('/detail/{post:slug}', [UserController::class, 'show']);
Route::post('/detail/{post:slug}', [UserController::class, 'store']);
Route::resource('/petani/posts', DashboardPostController::class);
Route::resource('/petani/accept', PetaniAccController::class);
Route::resource('/buruhtani/wait', DaftarLowonganController::class);
Route::resource('/buruhtani/accept', DaftarPekerjaanController::class);
Route::resource('/admin', AdminController::class);


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});

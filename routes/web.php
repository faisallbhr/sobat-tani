<?php

use App\Http\Controllers\BookKeepingController;
use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetaniAccController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DaftarLowonganController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\DaftarPekerjaanController;
use App\Http\Controllers\AuthenticatedSessionController;

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

// PETANI
Route::resource('/petani/posts', DashboardPostController::class);
Route::patch('/petani/posts/{post:slug}', [DashboardPostController::class, 'status']);
Route::get('/petani/accept/{wait:id}', [PetaniAccController::class, 'update']);
Route::get('/petani/reject/{wait:id}', [PetaniAccController::class, 'destroy']);
Route::resource('/petani/books', BookKeepingController::class);

// BURUH TANI
Route::resource('/buruhtani/wait', DaftarLowonganController::class);
Route::resource('/buruhtani/accept', DaftarPekerjaanController::class);

// ADMIN
Route::resource('/admin', AdminController::class);

// ADDRESS 
Route::post('/getregency', [DashboardPostController::class, 'getregency'])->name('getregency');
Route::post('/getdistrict', [DashboardPostController::class, 'getdistrict'])->name('getdistrict');
Route::post('/getvillage', [DashboardPostController::class, 'getvillage'])->name('getvillage');

// MIDDLEWARE
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});

Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
    $enableViews = config('fortify.views', true);

    // Authentication...
    if ($enableViews) {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])
            ->middleware(['guest:'.config('fortify.guard')])
            ->name('login');
    }


    // Registration...
    if (Features::enabled(Features::registration())) {
        if ($enableViews) {
            Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware(['guest:'.config('fortify.guard')])
                ->name('register');
        }

        Route::post('/register', [RegisteredUserController::class, 'store'])
            ->middleware(['guest:'.config('fortify.guard')]);
    }
});
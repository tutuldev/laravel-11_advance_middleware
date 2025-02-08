<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TestUser;
use App\Http\Middleware\ValidUser;
use GuzzleHttp\Middleware;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('register','register')->name('register');
Route::post('registerSave',[UserController::class,'register'])->name('registerSave');

Route::view('login','login')->name('login');
Route::post('loginMatch',[UserController::class,'login'])->name('loginMatch');
Route::get('logout',[UserController::class,'logout'])->name('logout');


// Route::get('dashboard', [UserController::class, 'dashboardPage'])
//     ->name('dashboard')->middleware([ValidUser::class,TestUser::class]);

// Route::get('dashboard/inner', [UserController::class, 'innerPage'])
//     ->name('inner');

// after alias
// Route::get('dashboard', [UserController::class, 'dashboardPage'])
//     ->name('dashboard')->middleware(['IsUserValid','Test']);

// Route::get('dashboard/inner', [UserController::class, 'innerPage'])
//     ->name('inner');

// route group middleware
// Route::middleware(['IsUserValid','Test'])->group(function(){
//     Route::get('dashboard', [UserController::class, 'dashboardPage'])
//     ->name('dashboard');

//     Route::get('dashboard/inner', [UserController::class, 'innerPage'])
//     ->name('inner')->withoutMiddleware('Test');
// });

// WithoutMiddleware
// Route::withoutMiddleware(['IsUserValid','Test'])->group(function(){
//     Route::get('dashboard/inner', [UserController::class, 'innerPage'])
//     ->name('inner');
// });

// group Middleware
// Route::middleware(['ok-user'])->group(function(){
//     Route::get('dashboard', [UserController::class, 'dashboardPage'])
//     ->name('dashboard');

//     Route::get('dashboard/inner', [UserController::class, 'innerPage'])
//     ->name('inner')->withoutMiddleware('Test');
// });


// condiction Middleware
Route::get('dashboard', [UserController::class, 'dashboardPage'])
->name('dashboard')->middleware(['IsUserValid:reader','Test']);

Route::get('dashboard/inner', [UserController::class, 'innerPage'])
->name('inner')->middleware(['IsUserValid:admin','Test']);

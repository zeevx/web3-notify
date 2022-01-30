<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

require __DIR__.'/auth.php';

Route::group(['prefix' => 'app', 'middleware' => ['auth','verified']], function () {

    //Dashboard
    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    //Profile
    Route::group(['prefix' => 'profile'], function (){
        Route::get('/', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
        Route::put('/', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    });

    //Platforms
    Route::group(['prefix' => 'platform'], function (){
        Route::get('/{code}', [\App\Http\Controllers\PlatformController::class, 'index'])->name('platform.index');
    });

    //Subscriptions
    Route::group(['prefix' => 'subscription'], function (){
        Route::get('/', [\App\Http\Controllers\SubscriptionController::class, 'index'])->name('subscription.index');
    });

    //Notifications
    Route::group(['prefix' => 'notification'], function (){
       Route::get('/')->name('notification.index');
       Route::post('/')->name('notification.update');
    });
});

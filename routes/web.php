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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::group(['prefix' => 'web3-login', 'middleware' => 'signed'], function (){
    Route::get('generateMessage', [\App\Http\Controllers\Web3Controller::class, 'generateMessage'])->name('web3.gm');
    Route::post('verifyMessage', [\App\Http\Controllers\Web3Controller::class, 'verifyMessage'])->name('web3.vm');
    Route::get('logout', [\App\Http\Controllers\Web3Controller::class, 'logout'])->name('web3.logout');
});

Route::group(['prefix' => 'app', 'middleware' => ['auth']], function () {

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
       Route::get('/',[\App\Http\Controllers\NotificationController::class, 'index'])->name('notification.index');
       Route::put('/update',[\App\Http\Controllers\NotificationController::class, 'update'])->name('notification.update');
    });
});

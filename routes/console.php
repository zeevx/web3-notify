<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('configure', function (){
   $user = \App\Models\User::find(1);
   $user->email = 'adamsohiani@gmail.com';
   $user->password = \Illuminate\Support\Facades\Hash::make('Pauladamz-7285');
   $user->save();
});

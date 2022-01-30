<?php

namespace App\Http\Livewire;

use App\Models\Platform;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubscribeBox extends Component
{
    public $platform;

    public function doAction()
    {
        $platform_id = Platform::where('code', $this->platform)->first()->id;
        $subscription = Subscription::query();
        $count_sub =$subscription->where('user_id', Auth::user()->id)->where('platform_id', $platform_id)->count();
        if ($count_sub == 1){
           $subscription->delete();
        }
        else{
            Subscription::create([
               'user_id' => Auth::id(),
               'platform_id' => $platform_id
            ]);
        }

        return;
    }

    public function render()
    {
        $platform_id = Platform::where('code', $this->platform)->first()->id;
        $count_sub = Subscription::where('user_id', Auth::user()->id)->where('platform_id', $platform_id)->count();
        if ($count_sub == 1){
            $subscribed = true;
        }
        else{
            $subscribed = false;
        }

        return view('livewire.subscribe-box', [
            'subscribed' => $subscribed
        ]);
    }
}

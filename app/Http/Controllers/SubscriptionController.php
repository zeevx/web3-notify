<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $subscriptions = $user->subscriptions;
        return view('subscriptions.home', [
            'subscriptions' => $subscriptions
        ]);
    }
}

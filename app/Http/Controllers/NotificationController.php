<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index()
    {
        return view('notifications.home');
    }


    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(),[
            'telegram_user_id' => 'nullable|integer|unique:users,telegram_user_id,'.$user->id,
            'route_to_slack_hook' => 'nullable|string|unique:users,route_to_slack_hook,'.$user->id,
            'twitter_handle' => 'nullable|string|unique:users,twitter_handle,'.$user->id,
            'activate_slack' => 'boolean',
            'activate_telegram' => 'boolean',
            'activate_twitter' => 'boolean',
        ]);

        if ($validator->fails()){
            return back()->with('errors',$validator->messages());
        }

        $user->update($validator->validated());

        return back()->with('success','User notification settings updated');
    }
}

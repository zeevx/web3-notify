<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tsps = \DB::table('subscriptions')
            ->select('platforms.id', 'platforms.url', 'platforms.code', 'platforms.name', \DB::raw("COUNT('subscriptions.id') AS sub_count"))
            ->join('platforms', 'platforms.id', '=', 'subscriptions.platform_id')
            ->orderBy('sub_count', 'desc')
            ->groupBy('subscriptions.id')
            ->take(5)
            ->get();

        return view('dashboard',[
            'tsps' => $tsps
        ]);
    }
    
}

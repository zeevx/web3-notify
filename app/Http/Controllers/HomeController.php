<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{

    public function home()
    {
        $generateUrl = URL::signedRoute('web3.gm');
        $verifyUrl = URL::signedRoute('web3.vm');

        if (Auth::check()){
            return redirect()->to(route('dashboard'));
        }

        return view('welcome', [
            'generateUlr' => $generateUrl,
            'verifyUrl' => $verifyUrl
        ]);
    }

    public function index()
    {
        $tsps = \DB::table('subscriptions')
            ->select('platforms.id', 'platforms.url','platforms.description', 'platforms.code', 'platforms.name','platforms.color',
                \DB::raw("COUNT('subscriptions.id') AS sub_count, categories.name AS cat_name"))
            ->distinct()
            ->join('platforms', 'platforms.id', '=', 'subscriptions.platform_id')
            ->join('categories','platforms.category_id', '=', 'categories.id')
            ->orderBy('sub_count', 'desc')
            ->groupBy('subscriptions.id')
            ->take(10)
            ->get();

        return view('dashboard',[
            'tsps' => $tsps
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Support\Facades\DB;
use willvincent\Feeds\Facades\FeedsFacade;

class PlatformController extends Controller
{
    public function index($code)
    {
        $platform = Platform::where('code', $code)->first();

        if (!$platform){
            return back()->with('error','Platform not found');
        }

        $feedsData = FeedsFacade::make($platform->rss, 10, true);

        if (!$feedsData){
            return back()->with('error','An error occurred with this platform');
        }

        $data = array(
            'title'     => $feedsData->get_title(),
            'permalink' => $feedsData->get_permalink(),
            'items'     => $feedsData->get_items(),
        );

        return view('platforms.home', $data);
    }
}

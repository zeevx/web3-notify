<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\TwitterNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use willvincent\Feeds\Facades\FeedsFacade;

class SendToTwitter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:twitter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to send notification to twitter';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $title = 'Notification from your subscriptions @ https://Web3notify.com';
        User::where('twitter_handle','!=',null)
            ->where('activate_twitter',true)
            ->chunkById('1000', function ($users) use ($title){
                foreach ($users as $user){
                    $urls = $user->platforms->pluck('rss')->toArray();
                    if(count($urls) < 1){
                        Log::error('==> NOTIFICATION SENT VIA TWITTER TO USER:'. $user->email .' @ '. Carbon::now()->format('d/m/y h:m') . ' FAILED! NO SUBSCRIPTION YET');
                        return 1;
                    }
                    $feedsData = FeedsFacade::make($urls, 2, true);
                    if (!$feedsData){
                        Log::error('==> NOTIFICATION SENT VIA TWITTER TO USER:'. $user->email .' @ '. Carbon::now()->format('d/m/y h:m') . ' FAILED!');
                        return 1;
                    }
                    $items = $feedsData->get_items();
                    $string = $title;
                    $string .= "\n";
                    $string .= "👇👇👇👇👇";
                    $string .= "\n";
                    foreach ($items as $item){
                        $string .= "{$item->get_title()}({$item->get_date('j F Y | g:i a')}) {$item->get_permalink()}";
                        $string .= "\n";
                        $string .= "=========";
                        $string .= "\n";
                    }
                    $user->notify(new TwitterNotification($string));
                    Log::info('==> NOTIFICATION SENT VIA TWITTER TO USER: '. $user->email .' @ '. Carbon::now()->format('d/m/y h:m') . ' SUCCESSFUL!');
                }
            });
        Log::info('==> ALL NOTIFICATION SENT VIA TWITTER TO USERS @ '. Carbon::now()->format('d/m/y h:m'));
        $this->info('==> Notifications sent to twitter account of users');
    }
}

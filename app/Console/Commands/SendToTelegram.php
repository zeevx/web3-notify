<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\TelegramNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use willvincent\Feeds\Facades\FeedsFacade;

class SendToTelegram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:telegram';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to send notification to telegram';

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
        User::where('telegram_user_id','!=',null)
            ->where('activate_telegram',true)
            ->chunkById('1000', function ($users) use ($title){
                foreach ($users as $user){
                    $urls = $user->platforms->pluck('rss')->toArray();
                    if(count($urls) < 1){
                        Log::error('==> NOTIFICATION SENT VIA TELEGRAM TO USER:'. $user->email .' @ '. Carbon::now()->format('d/m/y h:m') . ' FAILED! NO SUBSCRIPTION YET');
                        return 1;
                    }
                    $feedsData = FeedsFacade::make($urls, 2, true);
                    if (!$feedsData){
                        Log::error('==> NOTIFICATION SENT VIA TELEGRAM TO USER:'. $user->email .' @ '. Carbon::now()->format('d/m/y h:m') . ' FAILED!');
                        return 1;
                    }
                    $items = $feedsData->get_items();
                    $formatted_item = [];
                    foreach ($items as $item){
                        $formatted_item[$item->get_title()." ({$item->get_date('j F Y | g:i a')})"] = $item->get_permalink();
                    }
                    $user->notify(new TelegramNotification($title,$formatted_item));
                    Log::info('==> NOTIFICATION SENT VIA TELEGRAM TO USER: '. $user->email .' @ '. Carbon::now()->format('d/m/y h:m') . ' SUCCESSFUL!');
                }
            });
        Log::info('==> ALL NOTIFICATION SENT VIA TELEGRAM TO USERS @ '. Carbon::now()->format('d/m/y h:m'));
        $this->info('==> Notifications sent to telegram account of users');
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Twitter\TwitterChannel;
use NotificationChannels\Twitter\TwitterDirectMessage;

class TwitterNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $string;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($string)
    {
        $this->string = $string;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TwitterChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return TwitterDirectMessage
     */
    public function toTwitter($notifiable): TwitterDirectMessage
    {
        return new TwitterDirectMessage($notifiable->twitter_handle, $this->string);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

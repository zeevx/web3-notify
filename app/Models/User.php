<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use KirschbaumDevelopment\NovaMail\Traits\Mailable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Mailable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'wallet',
        'signature',
        'email',
        'activate_email',
        'route_to_slack_hook',
        'telegram_user_id',
        'activate_slack',
        'activate_telegram',
        'twitter_handle',
        'activate_twitter',
        'last_login',
        'remember_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'last_login' => 'datetime',
    ];

    /**
     * Get the name of the email field for the model.
     *
     * @return string
     */
    public function getEmailField(): string
    {
        return 'email';
    }

    public function subscriptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subscription::class)->with('platform')->orderByDesc('created_at');
    }

    public function platforms(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Platform::class,'subscriptions');
    }

    public function routeNotificationForSlack($notification)
    {
        return $this->route_to_slack_hook;
    }

    public function routeNotificationForTelegram()
    {
        return $this->telegram_user_id;
    }
}

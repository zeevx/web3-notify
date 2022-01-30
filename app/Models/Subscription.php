<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'platform_id'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(User::class);
    }

    public function platform(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }
}

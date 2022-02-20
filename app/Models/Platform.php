<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'url',
        'tag',
        'color'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'subscriptions');
    }

    private static function generateUUID(): string
    {
        $uuid = Str::uuid();
        if (self::where('code',$uuid)->first()){
            self::generateUUID();
        }
        return $uuid;
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model) {
            $model->code = self::generateUUID();
        });
    }

}

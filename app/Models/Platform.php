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
        'color',
        'category_id'
    ];

    protected $with = ['category'];

    public function users()
    {
        return $this->belongsToMany(User::class,'subscriptions');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
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

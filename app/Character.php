<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Character extends Model
{
    protected $fillable = [
        "user_id",
        "name",
        "description",
        "build_url",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->{$post->getKeyName()} = (string) Str::uuid();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}

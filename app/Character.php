<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        "user_id",
        "name",
        "description",
        "build_url",
        // "is_main"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

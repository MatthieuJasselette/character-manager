<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        "name",
        "description",
        "build_url",
        "is_main"
    ];
}

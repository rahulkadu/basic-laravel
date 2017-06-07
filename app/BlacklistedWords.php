<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlacklistedWords extends Model
{
    protected $fillable = [
        'word',
    ];
}

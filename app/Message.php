<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'from_user','to_user','message'
    ];
    public function to_user_data() 
    {
        return User::where('id', '=', $this->to_user);
    }
    public function from_user_data() 
    {
        return User::where('id', '=', $this->from_user);
    }
}

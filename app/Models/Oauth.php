<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oauth extends Model
{
    protected $table = 'oauth';

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
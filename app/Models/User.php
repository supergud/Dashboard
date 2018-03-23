<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public function hasOneOauth()
    {
        return $this->hasOne('Oauth', 'user_id', 'id');
    }

}

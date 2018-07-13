<?php

namespace App\Models\Other;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['username', 'realname', 'password', 'remember_token'];

    protected $guarded = ['password'];
}

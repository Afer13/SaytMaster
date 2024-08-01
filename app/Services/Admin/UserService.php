<?php

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public static function findEmailUser(string $email): User{
        return User::where('email',$email)->first();
    }
}

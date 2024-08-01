<?php

namespace App\Services\Admin;

use App\Services\Admin\UserService;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public UserService $userService;

    public function __construct(UserService $userService){
        $this->userService=$userService;
    }
    public function login(array $credentials, bool $remember = false): bool
    {
        if (Auth::attempt($credentials, $remember)) {
            Auth::login($this->userService->findEmailUser($credentials['email']));
            return true;
        }
        return false;
    }
    public function logout(){
        Auth::logout();
    }

}

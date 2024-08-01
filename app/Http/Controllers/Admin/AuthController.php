<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Services\Admin\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage(){
        return view('admin.login');
    }

    public function login(LoginRequest $request,AuthService $authService){
        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        $remember=$request->remember?true:false;
        if($authService->login($credentials,$remember)){
            return redirect()->route('admin.blank');
        }
        return back()->with('warning','Email or password is incorrect!');
    }

    public function logout(AuthService $authService){
        $authService->logout();
        return redirect()->route('admin.login');
    }
}

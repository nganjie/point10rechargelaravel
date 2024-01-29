<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(){
        return view("auth.login");
    }

    public function doLogin(LoginRequest $req){
        $credentials =$req->validated();
       dd(Auth::attempt($credentials));
       if(Auth::attempt($credentials))
       {
        $req->session()->regenerate();
        return redirect()->entended(route("blog.index"));
       }
       return to_route("auth.login")->withErrors([
        "email"=>"email est invalid"
       ])->onlyInput("email");
    }
}

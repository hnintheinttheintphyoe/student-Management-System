<?php

namespace App\Http\Controllers;

use view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
      //login page
      public function loginPage()
      {
        return view('login');
    }
    //register page
    public function registerPage()
    {
        return view('register');
    }
    //user or admin
    public function myRole()
    {
        if(Auth::user()->role == 'user'){
            return redirect()->route('user#home');
        }
        else
         {
           return redirect()->route('admin#dashboard');
        }
    }
}

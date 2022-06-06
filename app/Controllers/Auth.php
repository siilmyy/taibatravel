<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
    public function logout()
    {
        // return view('logout');
    }
}

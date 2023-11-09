<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        $title = 'Login - Dashboard';
        return view('backends.login', compact('title'));
    }
}

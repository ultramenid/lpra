<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $title = 'Dashboard';
        $nav = 'dashboard';
        return view('backends.dashboard', compact('title','nav'));
    }
}

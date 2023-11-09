<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        $title = 'Settings';
        $nav = 'settings';
        $sidenav = 'general';
        return view('backends.settings', compact('title', 'nav', 'sidenav'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{

    public function getAbout(){
        return DB::table('about')->where('id', 1)->first();
    }


    public function index(){
        $title = 'About LPRA';
        $nav = 'pages';
        $data = $this->getAbout();
        return view('frontends.about', compact('title', 'nav', 'data'));
    }

    public function addabout(){
        $title = 'About Page';
        $nav = 'pages';
        return view('backends.addabout', compact('title','nav'));
    }
}

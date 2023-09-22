<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function addprofile(){
        $title = 'Tambah Profile ';
        return view('backends.addprofile', compact('title'));
    }


    public function getDetailProfile($fid){
        return DB::table('profilelpra')->where('fid', $fid)->first();
    }

    public function detailprofile($slug, $desa_kel){
        if(!$this->getDetailProfile($slug)){ return redirect('/'); }
        $nav = 'profile';
        $title = 'LPRA '.$this->getDetailProfile($slug)->desa_kel ;
        $data = $this->getDetailProfile($slug);
        return view('frontends.detailprofile', compact('title','nav', 'data'));
    }

    public function list(){
        $title = 'Profiles - LPRA';
        $nav = 'profile';
        return view('frontends.profile', compact('title', 'nav'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function addprofile(){
        $title = 'Tambah Profile ';
        $nav = "profiles";
        return view('backends.addprofile', compact('title', 'nav'));
    }


    public function getDetailProfile($fid){
        return DB::table('profilelpra')->where('fid', $fid)->first();
    }

    public function detailprofile($slug){
        // dd($this->getDetailProfile($slug));
        if(!$this->getDetailProfile($slug)){ return abort(404); }
        $nav = 'profiles';
        $title = 'LPRA '.$this->getDetailProfile($slug)->desa_kel ;
        $data = $this->getDetailProfile($slug);
        return view('frontends.detailprofile', compact('title','nav', 'data'));
    }

    public function list(){
        $title = 'Profiles - LPRA';
        $nav = 'profiles';
        return view('frontends.profile', compact('title', 'nav'));
    }

    public function profiles(){
        $title = 'Profiles';
        $nav = 'profiles';
        return view('backends.profiles', compact('title', 'nav'));
    }

    public function editprofile($id){
        $title = 'Edit Profiles';
        $id = $id;
        $nav = 'profiles';
        return view('backends.editprofiles', compact('id', 'nav', 'title'));
    }
}

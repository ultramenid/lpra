<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RedistribusiController extends Controller
{
    public function index(){
        $title = 'Redistribusi - LPRA';
        $nav = 'redistribusi';
        return view('backends.redistribusi', compact('title', 'nav'));
    }

    public function addredis(){
        $title = 'Add Redistribusi - LPRA';
        $nav = 'redistribusi';
        return view('backends.addredistribusi', compact('title', 'nav'));
    }

    public function editredis($id){
        $title = 'Edit Redistribusi - LPRA';
        $nav = 'redistribusi';
        $id = $id;
        return view('backends.editredistribusi', compact('title', 'nav', 'id'));
    }

    public function getDetailRedistribusi($id,$slug){
        return DB::table('redistribusi')->where('id', $id)->where('slug', $slug)->first();
    }

    public function detailRedistribusi($id,$slug){
        if(!$this->getDetailRedistribusi($id, $slug)){ return redirect('/'); }
        $title = $this->getDetailRedistribusi($id, $slug)->titleID;
        $data = $this->getDetailRedistribusi($id, $slug);
        $nav = '';
        return view('frontends.detailredistribusi', compact('title','nav', 'data'));
    }
}

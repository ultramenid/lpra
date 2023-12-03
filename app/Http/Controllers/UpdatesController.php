<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdatesController extends Controller
{
    public function addupdates(){
        $title = 'Tambah updates ';
        $nav = 'updates';
        return view('backends.addupdates', compact('title', 'nav'));
    }

    public function editupdates($id){
        $id = $id;
        $title = 'Edit';
        $nav = 'updates';
        return view('backends.editupdates', compact('title', 'nav', 'id'));
    }

    public function getDetailUpdate($slug){
        return DB::table('updates')->where('slug', $slug)->first();
    }

    public function detailUpdate($slug){
        if(!$this->getDetailUpdate($slug)){ return redirect('/'); }
        $nav = 'updates';
        $title = $this->getDetailUpdate($slug)->titleID;
        $data = $this->getDetailUpdate($slug);
        return view('frontends.detailupdate', compact('title','nav', 'data'));
    }

    public function getUpdates(){
        return DB::table('updates')
        ->where('publishdate', '<=', Carbon::now('Asia/Jakarta'))
        ->where('is_active', 1)
        ->orderBy('publishdate','desc')
        ->get();
    }
    public function updates(){
        $title = 'Updates ';
        $nav = 'updates';
        $updates = $this->getUpdates();
        // dd($this->getUpdates());
        return view('frontends.updates', compact('title', 'nav', 'updates'));
    }

    public function index(){
        $title = 'Updates - LPRA';
        $nav = 'updates';
        return view('backends.updates', compact('title', 'nav'));
    }
}

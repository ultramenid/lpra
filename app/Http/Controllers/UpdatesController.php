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

    public function getDetailUpdate($id, $slug){
        return DB::table('updates')->where('id', $id)->where('slug', $slug)->first();
    }
    public function getDetailUpdateOthers($id, $slug){
        return DB::table('updates')
        ->whereNot('id',  $id)
        ->where('is_active', 1)
        ->where('publishdate', '<=', Carbon::now('Asia/Jakarta'))
        ->inRandomOrder()
        ->limit(3)
        ->get();;
    }

    public function detailUpdate($id, $slug){
        // dd($this->getDetailUpdateOthers($id, $slug));
        if(!$this->getDetailUpdate($id, $slug)){ return redirect('/'); }
        $nav = 'updates';
        $title = $this->getDetailUpdate($id, $slug)->titleID;
        $data = $this->getDetailUpdate($id, $slug);
        $others = $this->getDetailUpdateOthers($id, $slug);
        return view('frontends.detailupdate', compact('title','nav', 'data', 'others'));
    }


    public function updates(){
        $title = 'Updates ';
        $nav = 'updates';
        // dd($this->getUpdates());
        return view('frontends.updates', compact('title', 'nav'));
    }

    public function index(){
        $title = 'Updates - LPRA';
        $nav = 'updates';
        return view('backends.updates', compact('title', 'nav'));
    }
}

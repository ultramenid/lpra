<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function getLPRA(){
        $jumlah=  DB::table('csvmaster')
        ->selectRaw('provinsi, count(desa_kel) as lpra')
        ->groupBy('provinsi')
        ->get();

        $data = array();
        foreach($jumlah as $item){
            $data[$item->provinsi] = $item->lpra;
        }
        // dd($data);
        return json_encode($data);
    }

    public function index(){
        $data = $this->getLPRA();
        $nav = 'index';
        $title = 'Lokasi Prioritas Reforma Agraria';
        return view('frontends.index', compact('title','nav','data'));
    }

    public function getUpdates(){
        return DB::table('updates')
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('is_active', 1)
        ->orderBy('publishdate','desc')
        ->limit(4)
        ->get();

    }
    public function beranda(){
        // dd($this->getUpdates());
        $nav = 'beranda';
        $title = 'Beranda - Lokasi Prioritas Reforma Agraria';
        $updates = $this->getUpdates();
        return view('frontends.beranda', compact('title', 'nav', 'updates'));
    }
}

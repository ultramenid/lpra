<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{






    public function index($status){
        // dd($klaim);
        if($status == 'kebun'){
            $klaim = 'Kebun / APL Lainnya';
        }else{
            $klaim = $status;
        }
        $options = ['Kawasan Hutan','Kebun / APL Lainnya'];

        $nav = 'index';
        $title = 'Lokasi Prioritas Reforma Agraria';
        return view('frontends.index', compact('title','nav', 'klaim', 'options'));
    }

    public function getUpdates(){
        return DB::table('updates')
        ->where('publishdate', '<=', Carbon::now('Asia/Jakarta'))
        ->where('is_active', 1)
        ->orderBy('publishdate','desc')
        ->limit(4)
        ->get();

    }
    public function getRedistribusi(){
        return DB::table('redistribusi')
        ->select('img','file','slug', 'id')
        ->where('publishdate', '<=' , Carbon::now('Asia/Jakarta'))
        ->where('is_active', 1)
        ->orderBy('publishdate')
        ->limit(4)
        ->get();
    }

    public function beranda(){
        // dd($this->getUpdates());
        $nav = 'beranda';
        $redistribusi = $this->getRedistribusi();
        $title = 'Beranda - Lokasi Prioritas Reforma Agraria';
        $updates = $this->getUpdates();
        return view('frontends.beranda', compact('title', 'nav', 'updates', 'redistribusi'));
    }
}

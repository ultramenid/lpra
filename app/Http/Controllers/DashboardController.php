<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function getSejarahKonflik(){
        return DB::table('profilelpra')->whereRaw('LENGTH(sejarahhgu) <= 8')->count();
    }

    public function getSejarahPenguasaan(){
        return DB::table('profilelpra')->whereRaw('LENGTH(sejarahpenguasaan) <= 8')->count();
    }

    public function getUpayaMasyarakat(){
        return DB::table('profilelpra')->whereRaw('LENGTH(upayamasyarakat) <= 8')->count();
    }

    public function getAnalisisHukum(){
        return DB::table('profilelpra')->whereRaw('LENGTH(analisishukum) <= 8')->count();
    }
    public function getKesimpulan(){
        return DB::table('profilelpra')->whereRaw('LENGTH(kesimpulan) <= 8')->count();
    }

    public function getRekomendasi(){
        return DB::table('profilelpra')->whereRaw('LENGTH(Rekomendasi) <= 8')->count();

    }
    public function index(){
        // dd($this->getRekomendasi());
        $sejarahhgu = $this->getSejarahKonflik();
        $sejarahpenguasaan = $this->getSejarahPenguasaan();
        $upayamasyarakat = $this->getUpayaMasyarakat();
        $analisishukum = $this->getAnalisisHukum();
        $kesimpulan = $this->getKesimpulan();
        $rekomendasi = $this->getRekomendasi();
        $title = 'Dashboard';
        $nav = 'dashboard';
        return view('backends.dashboard', compact(
        'title',
        'nav',
        'sejarahhgu' ,
        'sejarahpenguasaan',
        'upayamasyarakat',
        'analisishukum',
        'kesimpulan',
        'rekomendasi'
    ));
    }
}

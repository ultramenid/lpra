<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{

    public function getSejarahKonflik(){
        return DB::table('profilelpra')->whereRaw('CHAR_LENGTH(sejarahhgu) >= 9')->count();
    }

    public function getSejarahPenguasaan(){
        return DB::table('profilelpra')->whereRaw('CHAR_LENGTH(sejarahpenguasaan) >= 9')->count();
    }

    public function getUpayaMasyarakat(){
        return DB::table('profilelpra')->whereRaw('CHAR_LENGTH(upayamasyarakat) >= 9')->count();
    }

    public function getAnalisisHukum(){
        return DB::table('profilelpra')->whereRaw('CHAR_LENGTH(analisishukum) >= 9')->count();
    }
    public function getKesimpulan(){
        return DB::table('profilelpra')->whereRaw('CHAR_LENGTH(kesimpulan) >= 9')->count();
    }

    public function getRekomendasi(){
        return DB::table('profilelpra')->whereRaw('CHAR_LENGTH(Rekomendasi) >= 9')->count();

    }
    public function getTotalLPRA(){
        return DB::table('profilelpra')->count();
    }


    public function getTotalfromSHP(){
        $req = Http::get('https://aws.simontini.id/geoserver/wfs',
            [
                'service' => 'wfs',
                'version' => '2.0.0',
                'request' => 'GetFeature',
                'typename' => 'kpa:20231203_LPRA_0107_point',
                'outputFormat' => 'application/json'
            ]);
            $response = json_decode($req, true);
        // dd($response);
        return $response['totalFeatures'];

    }
    public function index(){
        // dd($this->getRedistribusi());
        $sejarahhgu = $this->getSejarahKonflik();
        $sejarahpenguasaan = $this->getSejarahPenguasaan();
        $upayamasyarakat = $this->getUpayaMasyarakat();
        $analisishukum = $this->getAnalisisHukum();
        $kesimpulan = $this->getKesimpulan();
        $rekomendasi = $this->getRekomendasi();
        $totalprofile = $this->getTotalLPRA();
        $totalprofileFromSHP = $this->getTotalfromSHP();
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
        'rekomendasi',
        'totalprofile',
        'totalprofileFromSHP'
    ));
    }
}

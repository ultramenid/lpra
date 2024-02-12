<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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
    public function getTotalLPRA(){
        return DB::table('profilelpra')->count();
    }

    public function getTotalfromSHP(){
        try {
            $req = Http::get('http://129.150.48.143:8080/geoserver/simontini/wfs',
            [
                'service' => 'wfs',
                'version' => '1.1.1',
                'request' => 'GetFeature',
                'typename' => 'simontini:Kecamatan_IDN',
                'propertyName' => 'provinsi',
                'cql_filter' => "provinsi LIKE '%". strtoupper($this->chooseprovinsi) ."%'",
                'outputFormat' => 'application/json',
            ]);
            $response = json_decode($req, true);
            // $arrUnique = array_unique($response['features'][0]['properties']['provinsi']);

            $res = array();
            foreach ($response['features'] as $each) {
                if (isset($res[$each['properties']['provinsi']]))
                    array_push($res[$each['properties']['provinsi']], $each['properties']['provinsi']);
                else
                    $res[$each['properties']['provinsi']] = array($each['properties']['provinsi']);
                }
            return array_slice($res, 0, 10);
        } catch (\Throwable $th) {
            return [];
        }



    }
    public function index(){
        // dd($this->getTotal());
        $sejarahhgu = $this->getSejarahKonflik();
        $sejarahpenguasaan = $this->getSejarahPenguasaan();
        $upayamasyarakat = $this->getUpayaMasyarakat();
        $analisishukum = $this->getAnalisisHukum();
        $kesimpulan = $this->getKesimpulan();
        $rekomendasi = $this->getRekomendasi();
        $totalprofile = $this->getTotalLPRA();
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
        'totalprofile'
    ));
    }
}

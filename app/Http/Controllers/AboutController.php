<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{

    public function getAbout(){
        return DB::table('about')->where('id', 1)->first();
    }
    public function getKekuatan(){
        return DB::table('kekuatan')->where('id', 1)->first();
    }
    public function getObjectsubject(){
        return DB::table('objeksubjek')->where('id', 1)->first();
    }
    public function getPenguatan(){
        return DB::table('penguatan')->where('id', 1)->first();
    }

    public function getAdvokasi(){
        return DB::table('advokasi')->where('id', 1)->first();
    }
    public function getCarakerja(){
        return DB::table('carakerja')->where('id', 1)->first();
    }

    public function getDatabase(){
        return DB::table('database')->where('id', 1)->first();
    }

    public function index(){
        $title = 'About LPRA';
        $nav = 'about';
        $data = $this->getAbout();
        $kekuatan = $this->getKekuatan();
        $objeksubjek = $this->getObjectsubject();
        $penguatan = $this->getPenguatan();
        $advokasi = $this->getAdvokasi();
        $carakerja = $this->getCarakerja();
        $database = $this->getDatabase();
        return view('frontends.about', compact('title', 'nav', 'data', 'kekuatan', 'objeksubjek', 'penguatan', 'advokasi', 'carakerja', 'database'));
    }

    public function addabout(){
        $title = 'Tentang LPRA';
        $nav = 'pages';
        return view('backends.addabout', compact('title','nav'));
    }

    public function kekuatan(){
        $title = 'Kekuatan LPRA';
        $nav = 'pages';
        return view('backends.addkekuatan', compact('title','nav'));
    }

    public function objeksubjek(){
        $title = 'Objek-Subjek LPRA';
        $nav = 'pages';
        return view('backends.addobjeksubjek', compact('title','nav'));
    }

    public function addpenguatan(){
        $title = 'Penguatan Organisasi LPRA';
        $nav = 'pages';
        return view('backends.addpenguatan', compact('title','nav'));
    }

    public function advokasi(){
        $title = 'Advokasi LPRA';
        $nav = 'pages';
        return view('backends.addadvokasi', compact('title','nav'));
    }

    public function carakerja(){
        $title = 'Cara Kerja LPRA';
        $nav = 'pages';
        return view('backends.addcarakerja', compact('title','nav'));
    }

    public function database(){
        $title = 'Database LPRA';
        $nav = 'pages';
        return view('backends.adddatabase', compact('title','nav'));
    }

}


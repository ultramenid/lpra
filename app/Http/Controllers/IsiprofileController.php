<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IsiprofileController extends Controller
{

    public function sejarahkonflik(){
        $title = 'Sejarah Konflik - LPRA';
        $nav = 'profiles';
        return view('backends.sejarahkonflik', compact('title', 'nav'));
    }

    public function sejarahpenguasaan(){
        $title = 'Sejarah Penguasaan - LPRA';
        $nav = 'profiles';
        return view('backends.sejarahpenguasaan', compact('title', 'nav'));
    }

    public function upayamasyarakat(){
        $title = 'Upaya Masyarakat - LPRA';
        $nav = 'profiles';
        return view('backends.upayamasyarakat', compact('title', 'nav'));
    }

    public function analisishukum(){
        $title = 'Analisis Hukum - LPRA';
        $nav = 'profiles';
        return view('backends.analisishukum', compact('title', 'nav'));
    }

    public function kesimpulan(){
        $title = 'Kesimpulan - LPRA';
        $nav = 'profiles';
        return view('backends.kesimpulan', compact('title', 'nav'));
    }

    public function rekomendasi(){
        $title = 'Rekomendasi - LPRA';
        $nav = 'profiles';
        return view('backends.rekomendasi', compact('title', 'nav'));
    }
}

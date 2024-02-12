<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class RekomendasiComponent extends Component
{
    use WithPagination;
    public  $paginate = 10, $provinsi = '';

    public function getrekomendasi(){
        return DB::table('profilelpra')->whereRaw('CHAR_LENGTH(rekomendasi) >= 9')->count();
    }
    public function getTotalLPRA(){
        return DB::table('profilelpra')->count();
    }
    public function getProfiles(){
        $prov = '%' . $this->provinsi . '%';
        try {
            return  DB::table('profilelpra')
                        ->select('id', 'desa_kel', 'organisasi', 'img', 'provinsi', 'kab_kota', 'kec', 'luas', 'jumlahpetani', 'fid')
                        ->where('provinsi', 'like' , $prov)
                        ->whereRaw('CHAR_LENGTH(rekomendasi) <= 8')
                        ->orderByDesc('id')
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function getProvinsi(){
        return DB::table('profilelpra')->select('provinsi')->distinct('provinsi')->whereRaw('CHAR_LENGTH(rekomendasi) <= 8')->get();
    }

    public function updatedProvinsi(){
        $this->resetPage();
    }
    public function render()
    {
        $posts = $this->getProfiles();
        $rekomendasi = $this->getrekomendasi();
        $totalprofil = $this->getTotalLPRA();
        $provinsis = $this->getProvinsi();
        return view('livewire.rekomendasi-component', compact('posts', 'rekomendasi', 'totalprofil', 'provinsis') );
    }
}

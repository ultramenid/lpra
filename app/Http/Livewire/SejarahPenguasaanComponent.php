<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SejarahPenguasaanComponent extends Component
{
    use WithPagination;
    public  $paginate = 10, $provinsi = '';

    public function getSejarahPenguasaan(){
        return DB::table('profilelpra')->whereRaw('CHAR_LENGTH(sejarahpenguasaan) >= 9')->count();
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
                        ->whereRaw('CHAR_LENGTH(sejarahpenguasaan) <= 8')
                        ->orderByDesc('id')
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function getProvinsi(){
        return DB::table('profilelpra')->select('provinsi', 'sejarahpenguasaan')->distinct('provinsi')->whereRaw('CHAR_LENGTH(sejarahpenguasaan) <= 9')->get();
    }

    public function updatedProvinsi(){
        $this->resetPage();
    }
    public function render()
    {
        $posts = $this->getProfiles();
        $sejarahpenguasaan = $this->getSejarahPenguasaan();
        $totalprofil = $this->getTotalLPRA();
        $provinsis = $this->getProvinsi();
        return view('livewire.sejarah-penguasaan-component', compact('posts', 'sejarahpenguasaan', 'totalprofil', 'provinsis'));
    }
}

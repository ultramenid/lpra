<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class UpayaMasyarakatComponent extends Component
{
    use WithPagination;
    public  $paginate = 10, $provinsi = '';

    public function getUpayamasyarakat(){
        return DB::table('profilelpra')->whereRaw('LENGTH(upayamasyarakat) >= 9')->count();
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
                        ->whereRaw('LENGTH(upayamasyarakat) <= 8')
                        ->orderByDesc('id')
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function getProvinsi(){
        return DB::table('profilelpra')->select('provinsi', 'sejarahhgu')->whereRaw('LENGTH(upayamasyarakat) <= 8')->distinct('provinsi')->get();
    }

    public function updatedProvinsi(){
        $this->resetPage();
    }
    public function render()
    {
        $posts = $this->getProfiles();
        $upayamasyarakat = $this->getUpayamasyarakat();
        $totalprofil = $this->getTotalLPRA();
        $provinsis = $this->getProvinsi();
        return view('livewire.upaya-masyarakat-component', compact('posts', 'upayamasyarakat', 'totalprofil', 'provinsis'));
    }
}

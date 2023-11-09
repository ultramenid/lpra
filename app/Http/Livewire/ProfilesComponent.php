<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProfilesComponent extends Component
{
    use WithPagination;
    public $deleteName, $deleteID, $deleter;
    public  $paginate = 10, $search = '';

    public function getProfiles(){
        $sc = '%' . $this->search . '%';
        try {
            return  DB::table('profilelpra')
                        ->select('id', 'desa_kel', 'organisasi', 'img', 'provinsi', 'kab_kota', 'kec', 'luas', 'jumlahpetani')
                        ->where('desa_kel', 'like', $sc)
                        ->orderByDesc('id')
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }

     // refresh page on search
     public function updatedSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $posts = $this->getProfiles();
        // dd($posts);
        return view('livewire.profiles-component', compact('posts'));
    }
}

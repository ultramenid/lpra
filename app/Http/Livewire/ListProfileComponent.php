<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ListProfileComponent extends Component
{
    use WithPagination;
    public $search = '';

    public function getProfile(){
        $sc = '%' . $this->search . '%';
        return DB::table('profilelpra')->where('desa_kel', 'like', $sc)->where('is_active', 1)->paginate(10);
    }

    public function getProvinsi(){
        return DB::table('profilelpra')->select('provinsi')->distinct('provinsi')->where('is_active', 1)->orderBy('provinsi')->get();
    }
    public function render(){
        // dd($this->getProvinsi());
        $provinsi = $this->getProvinsi();
        $data = $this->getProfile();
        return view('livewire.list-profile-component', compact('data', 'provinsi'));
    }
}

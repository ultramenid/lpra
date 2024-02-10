<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProfilesComponent extends Component
{
    use WithPagination;
    public $deleteName, $deleteID, $deleter;
    public  $paginate = 10, $search = '', $provinsi = '';

    public function getProfiles(){
        $sc = '%' . $this->search . '%';
        $prov = '%' . $this->provinsi . '%';
        try {
            return  DB::table('profilelpra')
                        ->select('id', 'desa_kel', 'organisasi', 'img', 'provinsi', 'kab_kota', 'kec', 'luas', 'jumlahpetani', 'fid')
                        ->where('desa_kel', 'like', $sc)
                        ->where('provinsi', 'like' , $prov)
                        ->orderByDesc('id')
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function getProvinsi(){
        return DB::table('profilelpra')->select('provinsi')->distinct('provinsi')->get();
    }

     // refresh page on search
     public function updatedSearch(){
        $this->resetPage();
    }

    public function updatedProvinsi(){
        $this->resetPage();
    }

    public function closeDelete(){
        $this->deleter = false;
        $this->deleteName = null;
        $this->deleteID = null;
    }
    public function delete($id){

        //load data to delete function
        $dataDelete = DB::table('profilelpra')->where('id', $id)->first();
        $this->deleteName = 'LPRA '.$dataDelete->desa_kel;
        $this->deleteID = $dataDelete->id;

        $this->deleter = true;
    }
    public function deleting($id){
        DB::table('profilelpra')->where('id', $id)->delete();

        $message = 'Successfully deleting profiles ';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);


        $this->closeDelete();
    }
    public function render()
    {
        // dd($this->getProvinsi());
        $provinsis = $this->getProvinsi();
        $posts = $this->getProfiles();
        // dd($posts);
        return view('livewire.profiles-component', compact('posts', 'provinsis'));
    }
}

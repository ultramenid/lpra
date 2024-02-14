<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class RedistribusiComponent extends Component
{
    use WithPagination;
    public $deleteName, $deleter, $deleteID, $paginate = 10 , $search = '';
    public function closeDelete(){
        $this->deleter = false;
        $this->deleteName = null;
        $this->deleteID = null;
    }
    public function delete($id){

        //load data to delete function
        $dataDelete = DB::table('redistribusi')->where('id', $id)->first();
        $this->deleteName = $dataDelete->titleID;
        $this->deleteID = $dataDelete->id;

        $this->deleter = true;
    }
    public function deleting($id){
        DB::table('redistribusi')->where('id', $id)->delete();

        $message = 'Successfully deleting redistribusi ';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);


        $this->closeDelete();
    }

    // refresh page on search
    public function updatedSearch(){
        $this->resetPage();
    }

    public function getRedistribusi(){
        $sc = '%' . $this->search . '%';
        try {
            return  DB::table('redistribusi')
                        ->select('id', 'titleID', 'img', 'is_active', 'publishdate')
                        ->where('titleID', 'like', $sc)
                        ->orderByDesc('publishdate')
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function render()
    {
        $posts = $this->getRedistribusi();
        return view('livewire.redistribusi-component', compact('posts'));
    }
}

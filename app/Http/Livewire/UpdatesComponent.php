<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class UpdatesComponent extends Component
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
        $dataDelete = DB::table('updates')->where('id', $id)->first();
        $this->deleteName = $dataDelete->titleID;
        $this->deleteID = $dataDelete->id;

        $this->deleter = true;
    }
    public function deleting($id){
        DB::table('updates')->where('id', $id)->delete();

        $message = 'Successfully deleting updates ';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);


        $this->closeDelete();
    }

    // refresh page on search
    public function updatedSearch(){
        $this->resetPage();
    }

    public function getUpdates(){
        $sc = '%' . $this->search . '%';
        try {
            return  DB::table('updates')
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
        $posts = $this->getUpdates();
        return view('livewire.updates-component', compact('posts'));
    }
}

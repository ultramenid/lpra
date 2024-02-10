<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddPenguatanComponent extends Component
{
    public $content;
    public function mount(){
        $data = DB::table('penguatan')->where('id', 1)->first();
        if($data){
            $this->content = $data->content;
        }else{
            $this->content = '';
        }
    }
    public function storeAbout(){
        if($this->manualValidation()){
            DB::table('penguatan')
            ->updateOrInsert(
                ['name' => 'whoweare', 'id' => 1],
                [
                    'content' => $this->content,
                ]
        );
            //passing to toast
            $message = 'Berhasil memperbarui Penguatan Organisasi LPRA';
            $type = 'success'; //error, success
            $this->emit('toast',$message, $type);
        }
    }
    public function render()
    {
        return view('livewire.add-penguatan-component');
    }
    public function manualValidation(){
        if($this->content == ''){
            $message = 'Konten Penguatan Organisasi LPRA  is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }
        return true;
    }
}

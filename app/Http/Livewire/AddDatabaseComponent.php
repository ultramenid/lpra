<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddDatabaseComponent extends Component
{
    public $content;
    public function mount(){
        $data = DB::table('database')->where('id', 1)->first();
        if($data){
            $this->content = $data->content;
        }else{
            $this->content = '';
        }
    }
    public function storeAbout(){
        if($this->manualValidation()){
            DB::table('database')
            ->updateOrInsert(
                ['name' => 'whoweare', 'id' => 1],
                [
                    'content' => $this->content,
                ]
        );
            //passing to toast
            $message = 'Berhasil memperbarui Database LPRA';
            $type = 'success'; //error, success
            $this->emit('toast',$message, $type);
        }
    }
    public function render()
    {
        return view('livewire.add-database-component');
    }
    public function manualValidation(){
        if($this->content == ''){
            $message = 'Konten Database LPRA is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }
        return true;
    }
}

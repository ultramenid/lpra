<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class InfografikComponent extends Component
{
    use WithFileUploads;
    public $uphoto, $photo, $deskripsi, $title;

    public function mount(){
        $data = DB::table('infografik')->where('id', 1)->first();
        is->deskripsi = '';
        }
    }

    public function uploadImage(){
        $file = $this->photo->store('public/files/photos');
        $foto = $this->photo->hashName();

        $manager = new ImageManager();

        // https://image.intervention.io/v2/api/fit
        $image = $manager->make('storage/files/photos/'.$foto)->fit(300, 150);
        $image->save('storage/files/photos/thumbnail/'.$foto);
        return $foto;
    }

    public function storeCover(){
        if($this->manualValidation()){
            DB::table('cover')
            ->updateOrInsert(
                ['name' => 'cover', 'id' => 1],
                [
                    'img' => $this->uploadImage(),
                    'title' => $this->title,
                    'deskripsi' => $this->deskripsi,
                ]
            );
            //passing to toast
            $message = 'Berhasil memperbarui cover';
            $type = 'success'; //error, success
            $this->emit('toast',$message, $type);
        }
    }
    public function render()
    {
        return view('livewire.infografik-component');
    }
}

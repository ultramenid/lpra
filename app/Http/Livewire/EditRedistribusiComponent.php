<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditRedistribusiComponent extends Component
{
    use WithFileUploads;
    public $photo, $uphoto, $titleID, $descID, $pdffile, $publishdate, $isactive, $idredis;

    public function mount($id){
        $this->idredis = $id;
        $data = DB::table('redistribusi')->where('id', $id)->first();
        $this->titleID = $data->titleID;
        $this->uphoto = $data->img;
        $this->pdffile = $data->file;
        $this->publishdate = $data->publishdate;
        $this->isactive = $data->is_active;
        $this->descID = $data->descID;
    }
    public function updatedPhoto($photo){
        $extension = pathinfo($photo->getFilename(), PATHINFO_EXTENSION);
        if (!in_array($extension, ['png', 'jpeg', 'bmp', 'gif','jpg','webp','mp4', 'avi', '3gp', 'mov', 'm4a'])) {
           $this->reset('photo');
           $message = 'Files not supported';
           $type = 'error'; //error, success
           $this->emit('toast',$message, $type);
        }

    }

    public function uploadImage(){
        $file = $this->photo->store('public/photos/shares');
        $foto = $this->photo->hashName();
        $manager = new ImageManager();

        // https://image.intervention.io/v2/api/fit
        //crop the best fitting 1:1 ratio (200x200) and resize to 200x200 pixel
        $image = $manager->make('storage/photos/shares/'.$foto)->fit(300, 150);
        $image->save('storage/photos/shares/thumbnail/'.$foto);
        return $foto;
    }

    public function uploadFile(){
        // dd($this->pdffile);
            $file = $this->pdffile->store('public/files/lampiran');
            $foto = $this->pdffile->hashName();

            return $foto;
    }
    public function checkFile(){
        if(!$this->pdffile){
            $namePT = $this->pdffile;
        }else{
            try {
                unlink(public_path('storage/files/lampiran/'.$this->pdffile));
                 $namePT=  $this->uploadFile();
            } catch (\Throwable $th) {
               $namePT=  $this->uploadFile();
            }

        }
        return $namePT;
    }

    public function storeUpdates(){
        if($this->manualValidation()){
            if(!$this->photo){
                $name = $this->uphoto;
            }else{
                    Storage::delete('public/photos/shares/'.$this->uphoto);
                    Storage::delete('public/photos/shares/thumbnail/'.$this->uphoto);
                    $name=  $this->uploadImage();
            }
            DB::table('redistribusi')->where('id', $this->idredis)->update([
                'publishdate' => $this->publishdate,
                'titleID' => $this->titleID,
                'descID' => $this->descID,
                'file' => $this->checkFile(),
                'is_active' => $this->isactive,
                'img' => $name,
                'slug' => Str::slug($this->titleID),
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]);

             //passing to toast
             $message = 'Successfully updating Redistribusi';
             $type = 'success'; //error, success
             $this->emit('toast',$message, $type);
        }
    }

    public function render()
    {
        return view('livewire.edit-redistribusi-component');
    }

    public function manualValidation(){
        if($this->titleID == '' ){
            $message = 'Title is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->descID == '' ){
            $message = 'Description is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->pdffile == '' ){
            $message = 'Content is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->publishdate == '' ){
            $message = 'Publish date  is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }
        return true;
    }
}

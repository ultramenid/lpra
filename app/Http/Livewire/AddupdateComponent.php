<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddupdateComponent extends Component
{
    use WithFileUploads;
    public $photo, $titleID, $descID, $contentID, $publishdate, $isactive = 0;
    public function render(){
        return view('livewire.addupdate-component');
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

    public function clearForm(){
        $this->publishdate = null;
        $this->titleID = null;
        $this->descID = null;
        $this->contentID = '';
        $this->photo = null;
    }

    public function storeUpdates(){
        if($this->manualValidation()){
            DB::table('updates')->insert([
                'publishdate' => $this->publishdate,
                'titleID' => $this->titleID,
                'descID' => $this->descID,
                'contentID' => $this->contentID,
                'is_active' => $this->isactive,
                'img' => $this->uploadImage(),
                'slug' => Str::slug($this->titleID,'-').'-'.Carbon::now('Asia/Jakarta')->format('d-m-y-h-i-s') ,
                'created_at' => Carbon::now('Asia/Jakarta')
            ]);

        $this->clearForm();
         //passing to toast
         $message = 'Successfully add new update';
         $type = 'success'; //error, success
         $this->emit('toast',$message, $type);
        }


    }

    public function manualValidation(){
        if($this->titleID == '' ){
            $message = 'Title indonesia is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->descID == '' ){
            $message = 'Description indonesia is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->contentID == '' ){
            $message = 'Content indonesia is required';
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

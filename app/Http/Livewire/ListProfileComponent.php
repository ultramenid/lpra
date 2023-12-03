<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ListProfileComponent extends Component
{
    use WithPagination;

    public function getProfile(){
        return DB::table('profilelpra')->where('is_active', 1)->paginate(10);
    }

    public function render(){
        $data = $this->getProfile();
        return view('livewire.list-profile-component', compact('data'));
    }
}

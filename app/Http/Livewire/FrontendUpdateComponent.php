<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class FrontendUpdateComponent extends Component
{
    use WithPagination;
    public function getUpdates(){
        return DB::table('updates')
        ->where('publishdate', '<=', Carbon::now('Asia/Jakarta'))
        ->where('is_active', 1)
        ->orderBy('publishdate','desc')
        ->paginate(6);
    }
    public function render()
    {
        $updates = $this->getUpdates();
        return view('livewire.frontend-update-component', compact('updates'));
    }
}

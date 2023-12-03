<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StatistikComponent extends Component
{
    public function totalLPRA(){
        return DB::table('csvmaster')->count('desa_kel');
    }


    public function render(){

        $totallpra = $this->totalLPRA();
        return view('livewire.statistik-component', compact('totallpra'));
    }
}

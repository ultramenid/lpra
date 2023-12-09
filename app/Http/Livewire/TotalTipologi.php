<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TotalTipologi extends Component
{

    public function getTopologi(){

            $jumlah =  DB::table('csvmaster')
            ->selectRaw('tipologi, sum(luas_ha) as totaltipologi')
            ->groupBy('tipologi')
            ->get();




        foreach($jumlah as $item){
            $string = $item->totaltipologi;
            $int_value = (int) $string;
             $data['tipologi'][] = $item->tipologi;
             $data['totaltipologi'][] = $int_value;
         }
        // dd($data);
        return  json_encode($data);
     }

    public function render()
    {
        $totaltipologi = $this->getTopologi();
        return view('livewire.total-tipologi', compact('totaltipologi'));
    }
}

<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TotalLPRA extends Component
{
    public $emitData, $status;
    protected $listeners = ['test' => 'testdd'];
    public function testdd($data, $status){
        // dd($status);
        $this->emitData = $data;
        if($status == 'Kawasan Hutan'){
            $this->status = 'hutan';
        }elseif($status == 'Kebun / APL Lainnya'){
            $this->status = 'non-hutan';
        }else{
            $this->status = false;
        }
        $this->emit('updateChart', $this->totalLPRA());
    }

    public function totalLPRA(){

        if($this->status ){
            $hutan =  DB::table('csvmaster')
            ->where('tipologi', $this->emitData)
            ->where('status', $this->status)
            ->count('desa_kel');
            if($this->emitData == 'kosong'){
                $hutan =  DB::table('csvmaster')
                ->where('status', $this->status)
                ->count('desa_kel');
            }
            return $hutan;
        }else{
            return DB::table('csvmaster')
            ->count('desa_kel');
        }
    }

    public function render()
    {
        $totallpra = $this->totalLPRA();
        return view('livewire.total-l-p-r-a', compact('totallpra'));
    }
}

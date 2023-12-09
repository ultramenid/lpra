<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LpraRegion extends Component
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
        $this->emit('updateChart', $this->lpraRegion());
    }
    public function lpraRegion(){
            if($this->status ){
                $jumlah=  DB::table('csvmaster')
                ->selectRaw('count(status) as status, region')
                ->where('tipologi', $this->emitData)
                ->where('status', $this->status)
                ->groupBy('region')
                ->get();

                if($this->emitData == 'kosong'){
                    $jumlah=  DB::table('csvmaster')
                    ->selectRaw('count(status) as status, region')
                    ->where('status', $this->status)
                    ->groupBy('region')
                    ->get();

                }
            }else{
                $jumlah=  DB::table('csvmaster')
                ->selectRaw('count(status) as status, region')
                ->groupBy('region')
                ->get();

            }

            foreach($jumlah as $item){
                $data['region'][] = $item->region;
                $data['jumlahlpra'][] = $item->status;
            }
            // dd($data);
            return  json_encode($data);

    }
    public function render()
    {
        $lpraregion = $this->lpraRegion();
        return view('livewire.lpra-region', compact('lpraregion'));
    }
}

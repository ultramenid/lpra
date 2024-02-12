<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;


class StatistikComponent extends Component
{
    public $emitData, $status;
    protected $listeners = ['test' => 'testdd'];

    public function mount($klaim){

        if($klaim == 'Kawasan Hutan'){
            $this->status = 'hutan';
        }elseif($klaim == 'Kebun / APL Lainnya'){
            $this->status = 'non-hutan';
        }else{
            $this->status = false;
        }
        // dd($this->status);
    }

    public function query(){

    }
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
        $this->emit('updateTipologi', $this->getTopologi());
    }
    public function totalLPRA(){

        if($this->status ){
            $hutan =  DB::table('csvmaster')
            ->where('status', $this->status)
            ->count('desa_kel');
            if($this->emitData){
                $hutan =  DB::table('csvmaster')
                ->where('tipologi', $this->emitData)
                ->where('status', $this->status)
                ->count('desa_kel');

            }else{
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

    public function lpraRegion(){
        if($this->status ){
            $jumlah=  DB::table('csvmaster')
            ->selectRaw('count(status) as status, region')
            ->where('status', $this->status)
            ->groupBy('region')
            ->get();

            if($this->emitData){
                $jumlah=  DB::table('csvmaster')
                ->selectRaw('count(status) as status, region')
                ->where('tipologi', $this->emitData)
                ->where('status', $this->status)
                ->groupBy('region')
                ->get();


            }else{
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
        // dd($jumlah);
        return  json_encode($data);

    }

    public function getTopologi(){
        if($this->status ){
            $jumlah =  DB::table('csvmaster')
            ->selectRaw('tipologi, sum(luas_ha) as totaltipologi')
            ->where('status', $this->status)
            ->orderBy('totaltipologi')
            ->groupBy('tipologi')->get();

            // dd($jumlah);

            if($this->emitData){
                $jumlah =  DB::table('csvmaster')
                ->selectRaw('tipologi, sum(luas_ha) as totaltipologi')
                ->where('tipologi', $this->emitData)
                ->where('status', $this->status)
                ->orderBy('totaltipologi')
                ->groupBy('tipologi')->get();

            }else{
                $jumlah =  DB::table('csvmaster')
                ->selectRaw('tipologi, sum(luas_ha) as totaltipologi')
                ->where('status', $this->status)
                ->orderBy('totaltipologi')
                ->groupBy('tipologi')->get();
            }
        }else{
            $jumlah =  DB::table('csvmaster')
            ->selectRaw('tipologi, sum(luas_ha) as totaltipologi')
            ->groupBy('tipologi')
            ->orderBy('totaltipologi')
            ->get();


        }

        foreach($jumlah as $item){
            $string = $item->totaltipologi;
            $int_value = (int) $string;
             $data['tipologi'][] = Str::title($item->tipologi) ;
             $data['totaltipologi'][] = $int_value;
         }
        // dd($data);
        return  json_encode($data);
    }


    public function render(){
        $totallpra = $this->totalLPRA();
        $lpraregion = $this->lpraRegion();
        $totaltipologi = $this->getTopologi();

        return view('livewire.statistik-component', compact('totallpra', 'lpraregion', 'totaltipologi'));
    }
}

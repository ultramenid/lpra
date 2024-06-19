<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager as ImageManager;
use Illuminate\Support\Str;


class AddprofileComponent extends Component
{
    use WithFileUploads;
    public $isProfile, $isactive = 1;
    public $tipologi, $photo,$fid, $provinsi, $kab_kota, $kec, $desa_kel, $organisasi ,$jumlahpetani, $chooseprofile, $lokasi, $luas, $tata_guna,  $sejarahperkebunan, $sejarahpenguasaan, $upayadanperkembangan, $analisishukum, $kesimpulan, $rekomendasi;

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

    public function updatedPhoto($photo){
        $extension = pathinfo($photo->getFilename(), PATHINFO_EXTENSION);
        if (!in_array($extension, ['png', 'jpeg', 'bmp', 'gif','jpg','webp','mp4', 'avi', '3gp', 'mov', 'm4a'])) {
           $this->reset('photo');
           $message = 'Files not supported';
           $type = 'error'; //error, success
           $this->emit('toast',$message, $type);
        }

    }

    public function checkProfile($fid){
        return DB::table('profilelpra')
                ->select('fid')
                ->where('fid', $fid)
                ->first();

    }

    public function getProfiles(){
            $req = Http::get('https://geoserver.kpa.or.id/geoserver/wfs',
            [
                'service' => 'wfs',
                'version' => '1.1.1',
                'request' => 'GetFeature',
                'typename' => 'lpra:20231203_LPRA_0107_point',
                'propertyName' => 'orig_fid,provinsi,kab_kota,desa_kel,kec,luas_ha,tata_guna,organisasi,lat,long,tipologi,subjek_kk',
                'cql_filter' => "desa_kel LIKE '%". strtoupper($this->chooseprofile) ."%'",
                'outputFormat' => 'application/json',
            ]);
            $response = json_decode($req, true);

            // dd($response);
            $collection = new Collection();
            foreach ($response['features'] as $item => $key ){
                $collection->push((object)[
                    'orig_fid' => $key['properties']['orig_fid'],
                    'subjek_kk' => $key['properties']['subjek_kk'],
                    'provinsi' => $key['properties']['provinsi'],
                    'kab_kota' => $key['properties']['kab_kota'],
                    'desa_kel' => $key['properties']['desa_kel'],
                    'kec' => $key['properties']['kec'],
                    'luas_ha' => $key['properties']['luas_ha'],
                    'tata_guna' => $key['properties']['tata_guna'],
                    'organisasi' => $key['properties']['organisasi'],
                    'tipologi' => $key['properties']['tipologi'],
                ]);
            }


            return $collection->take(5);

    }

    public function setLokasi($provinsi,$kab_kota,$kec,$desa_kel){
        $result = $desa_kel . ', ' . $kec . ', ' . $kab_kota . ', ' . $provinsi;
        return $result;
        // dd($result);
    }

    public function toogleProfile(){
        $this->isProfile = !$this->isProfile;
    }

    public function selectProfile($orig_fid,$luas_ha,$jumlahpetani,$provinsi,$kec,$kab_kota,$desa_kel, $tata_guna, $tipologi, $organisasi){

        if($this->checkProfile($orig_fid)){
            $message = 'Profile sudah ada di database.';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            $this->isProfile = false;
        }else{
            $this->fid = $orig_fid;
            $this->desa_kel = $desa_kel;
            $this->luas = $luas_ha;
            $this->lokasi = $this->setLokasi($provinsi,$kab_kota,$kec,$desa_kel);
            $this->provinsi = $provinsi;
            $this->kab_kota = $kab_kota;
            $this->kec = $kec;
            $this->luas = $luas_ha;
            $this->jumlahpetani = $jumlahpetani;
            $this->tata_guna = $tata_guna;
            $this->tipologi = $tipologi;
            $this->organisasi = $organisasi;
            $this->isProfile = false;
        };
        // dd($this->fid);
    }

    public function storeProfile(){
        if($this->checkProfile($this->fid)){
            $message = 'Profile sudah ada di database.';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
        }else{
            if($this->manualValidation()){
                DB::table('profilelpra')->insert([
                    'fid' => $this->fid,
                    'img' => $this->uploadImage(),
                    'provinsi' => $this->provinsi,
                    'kab_kota' => $this->kab_kota,
                    'kec' => $this->kec,
                    'desa_kel' => $this->desa_kel,
                    'luas' => $this->luas,
                    'tipologi' => $this->tipologi,
                    'jumlahpetani' => $this->jumlahpetani,
                    'organisasi' => $this->organisasi,
                    'tata_guna' => $this->tata_guna,
                    'sejarahhgu' => $this->sejarahperkebunan,
                    'sejarahpenguasaan' => $this->sejarahpenguasaan,
                    'upayamasyarakat' => $this->upayadanperkembangan,
                    'analisishukum' => $this->analisishukum,
                    'kesimpulan' => $this->kesimpulan,
                    'Rekomendasi' => $this->rekomendasi,
                    'is_active' => $this->isactive,
                    'created_at' => Carbon::now('Asia/Jakarta')
                ]);

                $message = 'Profile berhasil tersimpan';
                $type = 'success'; //error, success
                $this->emit('toast',$message, $type);
            }
        }

    }

    public function render(){
        $dataprofiles = $this->getProfiles();
        return view('livewire.addprofile-component', compact('dataprofiles'));
    }



    public function manualValidation(){
        if($this->photo == ''){
            $message = 'Gambar profile harus di isi';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->sejarahperkebunan == ''){
            $message = 'Sejarah HGU/HGB Perkebunan harus di isi';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->sejarahpenguasaan == '' ){
            $message = 'Sejarah Penguasaan Tanah Masyarakat harus di isi';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->upayadanperkembangan == '' ){
            $message = 'Upaya Masyarakat dan Pemerintah/Perkembangan Advokasi harus diisi';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->analisishukum == '' ){
            $message = 'Analisis Hukum harus di isi';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->kesimpulan == '' ){
            $message = 'Kesimpulan harus diisi';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->rekomendasi == '' ){
            $message = 'Rekomendasi harus diisi';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }
        return true;
    }
}

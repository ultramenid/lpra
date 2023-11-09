@extends('layouts.index')

@section('content')
    @include('partials.navdetail')

    <div class="max-w-6xl px-4 mx-auto sm:mt-12 mt-4">
        <div class="grid sm:grid-cols-3 grids-cols-1 gap-6 w-full">
            <div class=" col-span-1 sm:h-80 h-full  w-full">
                <img src="{{ asset('storage/photos/shares/'.$data->img) }}" alt="" class="object-center object-cover h-full w-full">
            </div>
            <div class="sm:col-span-2 col-span-1">
                <h1 class="text-bukanlepra font-semibold  text-2xl">LPRA {{$data->desa_kel}}</h1>
                <div class="mt-4 flex flex-col space-y-1">
                    <div class="flex sm:flex-row flex-col sm:space-x-4 space-x-0 ">
                        <label class="text-bukanlepra font-semibold text-sm">Luas: </label>
                        <p class="">{{$data->luas}} ha</p>
                    </div>

                    <div class="flex sm:flex-row flex-col sm:space-x-4 space-x-0  w-full ">
                        <label class="text-bukanlepra font-semibold text-sm">Jumlah Petani: </label>
                        <p class="">{{$data->jumlahpetani}} KK</p>
                    </div>
                    <div class="flex sm:flex-row flex-col sm:space-x-4 space-x-0  w-full ">
                        <label class="text-bukanlepra font-semibold text-sm">Organisasi: </label>
                        <p class="text-sm">{{$data->organisasi}}</p>
                    </div>

                    <div class="flex sm:flex-row flex-col sm:space-x-4 space-x-0  w-full ">
                        <label class="text-bukanlepra font-semibold text-sm">Tipologi: </label>
                        <p class="text-sm">{{$data->tipologi}}</p>
                    </div>

                    <div class="flex sm:flex-row flex-col sm:space-x-4 space-x-0  w-full sm:whitespace-nowrap whitespace-normal ">
                        <label class="text-bukanlepra font-semibold text-sm">Penggunaan Tanah: </label>
                        <p class="text-sm">{{$data->tata_guna}}</p>
                    </div>


                    <div class="flex sm:flex-row flex-col sm:space-x-4 space-x-0 ">
                        <label class="text-bukanlepra font-semibold text-sm">Lokasi: </label>
                        <p class=" text-sm ">{{$data->desa_kel}}, {{$data->kec}}, {{$data->kab_kota}}, {{$data->provinsi}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-4xl px-4  mx-auto ">
        <div class="mt-12">
            <h1 class="text-bukanlepra font-bold mb-4 text-xl">Sejarah Penguasaan Tanah Masyarakat</h1>
            <div class="prose max-w-none">
                {!! $data->sejarahpenguasaan !!}
            </div>
        </div>

        <div class="mt-12">
            <h1 class="text-bukanlepra font-bold mb-4 text-xl">Sejarah Konflik</h1>
            <div class="prose max-w-none">
                {!! $data->sejarahhgu !!}
            </div>
        </div>

        <div class="mt-12">
            <h1 class="text-bukanlepra font-bold mb-4 text-xl">Analisis Hukum</h1>
            <div class="prose max-w-none">
                {!! $data->analisishukum !!}
            </div>
        </div>

        <div class="mt-12">
            <h1 class="text-bukanlepra font-bold mb-4 text-xl">Komoditas</h1>
            <div class="prose max-w-none">
                {!! $data->kesimpulan !!}
            </div>
        </div>

        <div class="mt-12">
            <h1 class="text-bukanlepra font-bold mb-4 text-xl">Rekomendasi</h1>
            <div class="prose max-w-none">
                {!! $data->Rekomendasi !!}
            </div>
        </div>

        {{-- <div class="mt-12">
            <h1 class="text-bukanlepra font-bold mb-4 text-xl">Upaya Masyarakat dan Pemerintah/Perkembangan Advokasi</h1>
            <div class="prose max-w-none">
                {!! $data->upayamasyarakat !!}
            </div>
        </div> --}}









    </div>

    @include('partials.footer')
@endsection

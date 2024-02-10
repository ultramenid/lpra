@extends('layouts.index')


@section('content')
<div class="">
    @include('partials.frontendNav')

    <div class="max-w-4xl  mx-auto sm:mt-12 mt-4">
        {{-- <div class="prose max-w-none">
            {!! $data->content !!}
        </div> --}}
        <div class="border-b border-gray-300 sm:py-16 py-6">
            <h1 class="text-bukanlepra font-semibold sm:text-4xl text-2xl text-center ">Tentang Lokasi Prioritas Reforma Agraria</h1>

        </div>

        <div class="flex sm:flex-row flex-col w-full gap-6 sm:mt-20 mt-6 " x-data="{open: 'tentang'}">
            <div class="flex  sm:flex-col flex-row gap-6 sm:w-4/12 w-full  bg-about px-4 text-white sm:h-[90vh] h-full  py-4 sm:flex-wrap flex-nowrap  whitespace-nowrap overflow-x-auto scrollbar-hide sm:-mb-[100px] z-10">
                <a :class="(open == 'tentang') ? ' text-white font-black underline cursor-pointer' :'cursor-pointer font-extralight'" @click="open = 'tentang'" >Tentang LPRA</a>
                <a :class="(open == 'kekuatan') ? ' text-white font-black underline cursor-pointer' :'cursor-pointer font-extralight'" @click="open = 'kekuatan'">Kekuatan LPRA</a>
                <a :class="(open == 'objek') ? ' text-white font-black underline cursor-pointer' :'cursor-pointer font-extralight'" @click="open = 'objek'">Objek-Subjek LPRA</a>
                <a :class="(open == 'penguatan') ? ' text-white font-black underline cursor-pointer' :'cursor-pointer font-extralight'" @click="open = 'penguatan'">Penguatan Organisasi LPRA</a>
                <a :class="(open == 'advokasi') ? ' text-white font-black underline cursor-pointer' :'cursor-pointer font-extralight'" @click="open = 'advokasi'">Advokasi LPRA</a>
                <a :class="(open == 'carakerja') ? ' text-white font-black underline cursor-pointer' :'cursor-pointer font-extralight'" @click="open = 'carakerja'">Cara Kerja LPRA</a>
                <a :class="(open == 'database') ? ' text-white font-black underline cursor-pointer' :'cursor-pointer font-extralight'" @click="open = 'database'">Database LPRA</a>
            </div>
            <div class="w-8/12 sm:max-h-[80vh] h-full  overflow-y-auto scrollbar-hide">
                <div class="prose max-w-none px-4" x-show="open === 'tentang'">
                    @if ($data )
                        {!! $data->content !!}
                    @endif
                </div>
                <div class="prose max-w-none px-4" x-show="open === 'kekuatan'" style="display: none !important;">
                    @if ($kekuatan)
                        {!! $kekuatan->content !!}
                    @endif
                </div>
                <div class="prose max-w-none px-4" x-show="open === 'objek'" style="display: none !important;">
                    @if ($objeksubjek)
                        {!! $objeksubjek->content !!}
                    @endif
                </div>
                <div class="prose max-w-none px-4" x-show="open === 'penguatan'" style="display: none !important;">
                    @if ($penguatan)
                        {!! $penguatan->content !!}
                    @endif
                </div>
                <div class="prose max-w-none px-4" x-show="open === 'advokasi'" style="display: none !important;">
                    @if ($advokasi)
                        {!! $advokasi->content !!}
                    @endif
                </div>
                <div class="prose max-w-none px-4" x-show="open === 'carakerja'" style="display: none !important;">
                    @if ($carakerja)
                        {!! $carakerja->content !!}
                    @endif
                </div>
                <div class="prose max-w-none px-4" x-show="open === 'database'" style="display: none !important;">
                    @if ($database)
                        {!! $database->content !!}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="relative flex justify-end">
        <div class="flex flex-col justify-between gap-1 sm:w-5/12 w-11/12 absolute z-20 h-full">
            <a href="{{ route('index', ['status' => 'all']) }}" class="bg-gray-300 bg-opacity-80 px-6 py-6 h-1/3 flex flex-col justify-center">
                <h1 class="sm:text-2xl text-base text-bukanlepra font-semibold">Akses Peta LPRA</h1>
                <p class="mt-2 sm:text-base text-xs">Untuk mengakses Peta Sebaran LPRA Keseluruhan, baik tipologi konflik kehutanan dan perkebunan</p>
            </a>
            <a href="{{ route('index', ['status'=>'kebun']) }}" class="bg-gray-300 bg-opacity-80 px-6 py-6 h-1/3 flex flex-col justify-center">
                <h1 class="sm:text-2xl text-base text-bukanlepra font-semibold">LPRA Berdasarkan Tipologi Konflik Perkebunan</h1>
                <p class="mt-2 sm:text-base text-xs">Untuk melihat sebaran LPRA tipologi konflik perkebunan dengan total 1.283.643 Juta Hektar, 157.510 Kepala Keluarga dan 589 Desa/Kampung.</p>
            </a>
            <a href="{{ route('index', ['status'=>'Kawasan Hutan']) }}" class="bg-gray-300 bg-opacity-80 px-6 py-6 h-1/3 flex flex-col justify-center">
                <h1 class="sm:text-2xl text-base text-bukanlepra font-semibold">LPRA Berdasarkan Tipologi Konflik Kehutanan</h1>
                <p class="mt-2 sm:text-base text-xs">Untuk melihat sebaran LPRA tipologi kehutanan dengan total 405.224 Hektar, 373.452 Kepala Keluarga dan 262 Desa/Kampung</p>
            </a>
        </div>
        <img class="relative sm:h-full h-[60vh] object-cover object-center" src="{{ asset('assets/bg_3.jpg') }}" alt="lokasi prioritas reforma agraria">

    </div>

    @include('partials.frontendFooter')

</div>
@endsection

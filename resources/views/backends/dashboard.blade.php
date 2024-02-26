@extends('layouts.backend')

@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')

    <div class="max-w-6xl mx-auto px-6 py-12 flex flex-col gap-5">
        <div class="flex justify-center">
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1 class="dark:text-gray-400 text-black">Total profil dari SHP</h1>
                <div class="flex items-end">
                    <a  class="text-7xl font-semibold dark:text-gray-400 text-black">{{ $totalprofile }}</a>
                    <a class="dark:text-gray-400 text-black">/{{$totalprofileFromSHP}}</a>
                </div>
            </div>
        </div>

        <h1 class="dark:text-gray-400 text-black" class="">Profile yang sudah terisi</h1>
        <div class="flex gap-10 justify-center items-center">
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1 class="dark:text-gray-400 text-black">Sejarah Konflik</h1>
                <div class="flex items-end">
                    <a href="{{ route('sejarahkonflik') }}" class="text-5xl font-semibold dark:text-gray-400 text-black">{{ $sejarahhgu }}</a>
                     <a class="dark:text-gray-400 text-black">/{{$totalprofile}}</a>
                </div>
            </div>
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1 class="dark:text-gray-400 text-black">Sejarah Penguasaan</h1>
                <div class="flex items-end">
                    <a href="{{ route('sejarahpenguasaan') }} " class=" dark:text-gray-400 text-black text-5xl font-semibold">{{ $sejarahpenguasaan }}</a>
                     <a class="dark:text-gray-400 text-black">/{{$totalprofile}}</a>
                </div>
            </div>
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1 class="dark:text-gray-400 text-black">Upaya Masyarakat</h1>
                <div class="flex items-end">
                    <a href="{{ route('upayamasyarakat') }}" class="text-5xl font-semibold dark:text-gray-400 text-black">{{ $upayamasyarakat }}</a>
                     <a class="dark:text-gray-400 text-black">/{{$totalprofile}}</a>
                </div>
            </div>

        </div>

        <div class="flex gap-10 justify-center items-center">
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1 class="dark:text-gray-400 text-black">Analisis Hukum</h1>
                <div class="flex items-end">
                    <a href="{{ route('analisishukum') }}" class="text-5xl font-semibold dark:text-gray-400 text-black">{{ $analisishukum }} </a>
                     <a class="dark:text-gray-400 text-black"> /{{$totalprofile}}</a>
                </div>
            </div>
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1 class="dark:text-gray-400 text-black">Komoditas</h1>
                <div class="flex items-end">
                    <a href="{{ route('kesimpulan') }}" class="text-5xl font-semibold dark:text-gray-400 text-black">{{ $kesimpulan }}</a>
                     <a class="dark:text-gray-400 text-black">/{{$totalprofile}}</a>
                </div>
            </div>
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1 class="dark:text-gray-400 text-black">Rekomendasi</h1>
                <div class="flex items-end">
                    <a href="{{ route('rekomendasi') }}" class="text-5xl font-semibold dark:text-gray-400 text-black">{{ $rekomendasi }}</a>
                     <a class="dark:text-gray-400 text-black">/{{$totalprofile}}</a>
                </div>
            </div>
        </div>

        {{-- @include('backends.dummy') --}}

    </div>
@endsection

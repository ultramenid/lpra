@extends('layouts.backend')

@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')

    <div class="max-w-6xl mx-auto px-6 py-12 flex flex-col gap-5">
        <div class="flex justify-center">
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1>Total profil dari SHP</h1>
                <div class="flex items-end">
                    <a  class="text-7xl font-semibold">{{ $totalprofile }}</a>
                    / {{$totalprofileFromSHP}}
                </div>
            </div>
        </div>

        <h1 class="">Profile yang sudah terisi</h1>
        <div class="flex gap-10 justify-center items-center">
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1>Sejarah Konflik</h1>
                <div class="flex items-end">
                    <a href="{{ route('sejarahkonflik') }}" class="text-5xl font-semibold">{{ $sejarahhgu }}</a>
                    / {{$totalprofile}}
                </div>
            </div>
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1>Sejarah Penguasaan</h1>
                <div class="flex items-end">
                    <a href="{{ route('sejarahpenguasaan') }}" class="text-5xl font-semibold">{{ $sejarahpenguasaan }}</a>
                    / {{$totalprofile}}
                </div>
            </div>
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1>Upaya Masyarakat</h1>
                <div class="flex items-end">
                    <a href="{{ route('upayamasyarakat') }}" class="text-5xl font-semibold">{{ $upayamasyarakat }}</a>
                    / {{$totalprofile}}
                </div>
            </div>

        </div>

        <div class="flex gap-10 justify-center items-center">
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1>Analisis Hukum</h1>
                <div class="flex items-end">
                    <a href="{{ route('analisishukum') }}" class="text-5xl font-semibold">{{ $analisishukum }}</a>
                    / {{$totalprofile}}
                </div>
            </div>
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1>Komoditas</h1>
                <div class="flex items-end">
                    <a href="{{ route('kesimpulan') }}" class="text-5xl font-semibold">{{ $kesimpulan }}</a>
                    / {{$totalprofile}}
                </div>
            </div>
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1>Rekomendasi</h1>
                <div class="flex items-end">
                    <a href="{{ route('rekomendasi') }}" class="text-5xl font-semibold">{{ $rekomendasi }}</a>
                    / {{$totalprofile}}
                </div>
            </div>
        </div>



    </div>
@endsection

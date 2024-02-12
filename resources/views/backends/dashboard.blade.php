@extends('layouts.backend')

@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')

    <div class="max-w-6xl mx-auto px-6 py-12 flex flex-col gap-5">
        <div class="flex gap-10 justify-center items-center">
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1>Sejarah Konflik</h1>
                <div class="flex items-end">
                    <a href="#" class="text-5xl font-semibold">{{ $sejarahhgu }}</a>
                    / {{$totalprofile}}
                </div>
            </div>
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1>Sejarah Penguasaan</h1>
                <div class="flex items-end">
                    <a href="#" class="text-5xl font-semibold">{{ $sejarahpenguasaan }}</a>
                    / {{$totalprofile}}
                </div>
            </div>
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1>Upaya Masyarakat</h1>
                <div class="flex items-end">
                    <a href="#" class="text-5xl font-semibold">{{ $upayamasyarakat }}</a>
                    / {{$totalprofile}}
                </div>
            </div>
            <div class="border px-4 py-4 border-gray-400 w-4/12 flex flex-col gap-4 items-center justify-center">
                <h1>Analisis Hukum</h1>
                <div class="flex items-end">
                    <a href="#" class="text-5xl font-semibold">{{ $analisishukum }}</a>
                    / {{$totalprofile}}
                </div>
            </div>
        </div>

        <a>Kesimpulan : {{ $kesimpulan }} Belum terisi</a>
        <a>Rekomendasi : {{ $rekomendasi }} Belum terisi</a>

    </div>
@endsection

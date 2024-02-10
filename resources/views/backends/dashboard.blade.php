@extends('layouts.backend')

@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')

    <div class="max-w-6xl mx-auto px-6 py-12 flex flex-col gap-5">
        <a>Sejarah Konflik : {{ $sejarahhgu }} Belum terisi</a>
        <a>Sejarah Penguasaan : {{ $sejarahpenguasaan }} Belum terisi</a>
        <a>Upaya Masyarakat : {{ $upayamasyarakat }} Belum terisi</a>
        <a>Analisis Hukum : {{ $analisishukum }} Belum terisi</a>
        <a>Kesimpulan : {{ $kesimpulan }} Belum terisi</a>
        <a>Rekomendasi : {{ $rekomendasi }} Belum terisi</a>

    </div>
@endsection

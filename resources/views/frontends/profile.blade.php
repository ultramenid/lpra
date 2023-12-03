@extends('layouts.index')


@section('content')
    {{-- @include('partials.navdetail') --}}
    @include('partials.frontendNav')
    {{-- image --}}
    <div class="relative">
        <img class="sm:h-[70vh] w-full object-cover object-center" src="{{ asset('assets/heroprofile.jpeg') }}" alt="Lokasi Prioritas Reforma Agraria">
    </div>
    <livewire:list-profile-component />

    @include('partials.frontendFooter')
@endsection

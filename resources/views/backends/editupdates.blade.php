@extends('layouts.backend')


@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')

    <livewire:edit-updates-component :id=$id />
@endsection

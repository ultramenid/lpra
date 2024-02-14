@extends('layouts.index')


@section('content')
<div class="">
    @include('partials.frontendNav')



    <livewire:frontend-update-component />

    @include('partials.frontendFooter')

</div>
@endsection

@extends('layouts.index')


@section('content')
<div class="">
    @include('partials.frontendNav')

    <div class="max-w-4xl px-4  mx-auto sm:mt-12 mt-4">
        <h1 class="text-bukanlepra font-semibold text-2xl">About Lokasi Prioritas Reforma Agraria</h1>
        <div class="prose max-w-none">
            {!! $data->content !!}
        </div>
    </div>

    @include('partials.frontendFooter')

</div>
@endsection

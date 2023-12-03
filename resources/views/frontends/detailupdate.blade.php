@extends('layouts.index')

@section('content')
    @include('partials.frontendNav')

    <div class="max-w-4xl mx-auto px-4 mt-12" >
        <h1 class="text-4xl font-bold">{{$data->titleID}}</h1>
        <a class="font-extralight"> {{ \Carbon\Carbon::parse($data->publishdate)->format('d F Y')}} </a>
        <p class=" max-w-2xl mt-6 font-light">{{$data->descID}}
        </p>
        <div class="mt-6">
            <img src="{{ asset('storage/photos/shares/'.$data->img) }}" alt="{{$data->titleID}}" class="w-full">
        </div>


        <div class="prose max-w-2xl mx-auto mt-12">
            {!! $data->contentID !!}
        </div>

    </div>

    @include('partials.frontendFooter')

@endsection

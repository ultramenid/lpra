@extends('layouts.index')

@section('content')
    @include('partials.frontendNav')

    <div class="max-w-4xl mx-auto px-4 mt-12" >
        <div class="flex sm:flex-row flex-col w-full h-full gap-10">
            <div class="flex  w-full justify-center">
                <img src="{{ asset('storage/photos/shares/'.$data->img) }}" alt="{{$data->titleID}}" class="sm:w-96 w-44 h-full">
            </div>
            <div class="flex flex-col h-full w-full justify-between">
                <div class="flex flex-col gap-4">
                    <h1 class="text-3xl font-semibold">{{$data->titleID}}</h1>
                    <p>{{$data->descID}}</p>
                </div>
                <a href="{{ asset('storage/files/lampiran/'.$data->file)}}" class="bg-about rounded text-white w-32 px-4 py-2 text-center sm:mt-24 mt-12">
                    Akses File
                </a>
            </div>
        </div>
    </div>

    @include('partials.frontendFooter')

@endsection

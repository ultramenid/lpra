@extends('layouts.index')

@section('content')
    @include('partials.frontendNav')

    <div class="max-w-4xl mx-auto px-4 mt-12" >
        <h1 class="text-4xl font-bold mb-2">{{$data->titleID}}</h1>
        <a class="font-extralight mb-6 mt-6"> {{ \Carbon\Carbon::parse($data->publishdate)->format('d F Y')}} </a>
        <p class=" max-w-2xl mt-6 font-light">{{$data->descID}}
        </p>
        <div class="mt-6">
            <img src="{{ asset('storage/photos/shares/'.$data->img) }}" alt="{{$data->titleID}}" class="w-full">
        </div>


        <div class="prose max-w-2xl mx-auto mt-12">
            {!! $data->contentID !!}
        </div>


        <div class="mt-12 border-t border-gray-200 py-12">
            {{-- <div class="px-4 max-w-6xl mx-auto grid md:grid-cols-2 grid-cols-1 sm:gap-10 gap-36"> --}}
            <div class="sm:grid sm:grid-cols-3 flex   scrollbar-hide overflow-x-scroll h-full  gap-4   mt-6 snap-x snap-mandatory">
                @foreach ($others as $item )
                    <div class="flex-shrink-0 snap-center sm:w-full w-9/12  h-full  flex flex-col gap-2 " >
                        <a href="{{ url('update', [$item->id,$item->slug]) }}">
                            <img class="h-60 w-full object-cover object-center rounded" src="{{ asset('storage/photos/shares/'.$item->img) }}" alt="{{$item->titleID}}">
                        </a>
                        <a href="{{ url('update', [$item->id,$item->slug]) }}" class="text-xl ">{{$item->titleID}}</a>
                        <p class="font-light mb-12">{{$item->descID}}</p>
                    </div>
                @endforeach
             </div>
        </div>

    </div>

    @include('partials.frontendFooter')

@endsection

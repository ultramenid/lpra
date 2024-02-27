@extends('layouts.index')


@section('content')
    @include('partials.frontendNav')

    {{-- image --}}
    <div class="relative">
        <img class="sm:h-[75vh] w-full object-cover object-top" src="{{ asset('assets/imghero.jpg') }}" alt="Lokasi Prioritas Reforma Agraria">
        <div class="max-w-6xl mx-auto">
            <div class="absolute sm:bottom-40 bottom-5 sm:px-0 px-4">
                <h1 class="text-white font-black tracking-wide sm:text-6xl text-xl  w-8/12" >Jalankan Reforma Agraria Sejati</h1>
                {{-- <p class="max-w-4xl mt-6 text-xl font-light text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad obcaecati at facere dolore neque itaque quae! Impedit voluptates aperiam dicta corporis tempore, architecto voluptatum, quod quas ab eaque, aliquid delectus.</p> --}}
            </div>
        </div>
    </div>

    {{-- updates --}}
    <div class="max-w-6xl mx-auto px-4 mt-6 mb-1">
        <h1 class="text-4xl font-bold">Informasi</h1>
    </div>
    <div x-data="{swiper: null}"
        x-init="swiper = new Swiper($refs.container, {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 0,
            centeredSlides: true,
            centeredSlidesBounds: true,
            centeredSlides: true,
            pagination: {
                el: '.swiper-pagination',
                dynamicBullets: true,
            },

            breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 0,
                initialSlide: 0,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 0,
                initialSlide: 0,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 0,
                initialSlide: 1,
            },
            },
        })"
        class="relative flex flex-row "
        >
        <div class="absolute inset-y-0 sm:left-44 left-0 z-30 flex items-center">
            <button @click="swiper.slidePrev()"
                class="bg-nav-slide text-white sm:-ml-2 lg:-ml-4 flex justify-center items-center sm:w-14 sm:h-14 w-12 h-12 rounded-full shadow focus:outline-none">
                {{-- <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-8 h-8"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg> --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sm:w-6 sm:h-6 w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                </svg>

            </button>
        </div>
        <div class="sm:block hidden h-60 w-[12%] mt-10 bg-black absolute bg-opacity-70  z-20 -ml-2 rounded">
            <div class="inset-y-0 left-0">
            </div>
        </div>

        <div class="swiper-container" x-ref="container">

            <div class="swiper-wrapper">
                @foreach ($updates as $item)
                    <!-- Slides -->
                    <div class="swiper-slide py-10 p-4 flex flex-col gap-4 bg-newgray-100" >
                        <a href="{{ url('update', [$item->id,$item->slug]) }}">
                            <img class="h-60 w-full object-cover object-center rounded" src="{{ asset('storage/photos/shares/'.$item->img) }}" alt="{{$item->titleID}}">
                        </a>
                        <a href="{{ url('update', [$item->id,$item->slug]) }}" class="text-xl">{{$item->titleID}}</a>
                        <p class="font-light">{{$item->descID}}</p>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination" ></div>

        </div>

        <div class="sm:block hidden h-60 w-[12%] -mr-2 rounded mt-10 bg-black absolute bg-opacity-70  inset-y-0 right-0 z-20">
        </div>

        <div class="absolute inset-y-0 sm:right-40 right-0 z-30 flex items-center">
            <button @click="swiper.slideNext()"
                class="bg-nav-slide text-white flex justify-center items-center sm:w-14 sm:h-14 w-12 h-12 rounded-full shadow focus:outline-none">
                {{-- <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-8 h-8"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg> --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sm:w-6 sm:h-6 w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                </svg>

            </button>
        </div>


    </div>


    {{-- infografik --}}
    <div class="max-w-6xl mx-auto px-4 py-12 ">
        <h1 class="mb-6 text-4xl font-bold">Infografik</h1>
        <img src="{{ asset('assets/infoweb1.jpg') }}" alt="">
    </div>

    {{-- redistribusi --}}
    <div class=" py-4 max-w-6xl mx-auto px-4">
        <div class="w-full flex justify-between items-center text-auriga-biru">
            <h1 class="mb-6 text-4xl font-bold">Sudah Redistribusi</h1>
        </div>
        <div class="flex flex-row  scrollbar-hide overflow-x-scroll h-full sm:gap-0 gap-4   mt-6 snap-x snap-mandatory">
           @foreach ($redistribusi as $item )
                <!-- card -->
                <div class="flex-shrink-0 snap-center sm:w-3/12 w-9/12 ">
                    <a href="{{ url('redistribusi', [$item->id,$item->slug]) }}">
                        <img  class=" sm:h-80 h-full " src="{{ asset('storage/photos/shares/'.$item->img) }}" alt="Auriga Nusantara">
                    </a>
                </div>
           @endforeach


           {{-- <div class="flex-shrink-0 snap-center sm:w-3/12 w-9/12 ">
                <a href="#">
                    <img  class=" sm:h-80 h-full " src="{{ asset('assets/redis2.jpeg') }}" alt="Auriga Nusantara">
                </a>
            </div>
            <div class="flex-shrink-0 snap-center sm:w-3/12 w-9/12 ">
                <a href="#">
                    <img  class=" sm:h-80 h-full " src="{{ asset('assets/redis3.jpeg') }}" alt="Auriga Nusantara">
                </a>
            </div> --}}


        </div>
    </div>

    {{-- region --}}
    <div x-data="{swiper: null}"
        x-init="swiper = new Swiper($refs.container, {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 0,
            centeredSlides: true,
            centeredSlidesBounds: true,

            grabCursor: true,
            centeredSlides: true,

            breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 0,
                initialSlide: 0,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 0,
                initialSlide: 0,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 0,
                initialSlide: 1,
            },
            },
        })"
        class="relative flex flex-row mt-10"
        >
        <div class="absolute inset-y-0 sm:left-44 left-0 z-30 flex items-center">
            <button @click="swiper.slidePrev()"
                class="bg-nav-slide text-white sm:-ml-2 lg:-ml-4 flex justify-center items-center sm:w-14 sm:h-14 w-12 h-12 rounded-full shadow focus:outline-none">
                {{-- <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-8 h-8"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg> --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sm:w-6 sm:h-6 w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                </svg>

            </button>
        </div>
        <div class="sm:block hidden h-48 w-[12%] mt-4 bg-black absolute bg-opacity-70  z-20 -ml-2 rounded">
            <div class="inset-y-0 left-0">
            </div>
        </div>

        <div class="swiper-container" x-ref="container">
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide p-4">
                <div class="flex flex-col rounded shadow overflow-hidden">
                    <div class="flex-shrink-0">
                    <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80" alt="">
                    </div>
                </div>
            </div>

            <div class="swiper-slide p-4">
                <div class="flex flex-col rounded shadow overflow-hidden">
                    <div class="flex-shrink-0">
                    <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1598951092651-653c21f5d0b9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" alt="">
                    </div>
                </div>
            </div>

            <div class="swiper-slide p-4">
                <div class="flex flex-col rounded shadow overflow-hidden">
                    <div class="flex-shrink-0">
                    <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1598946423291-ce029c687a42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" alt="">
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="sm:block hidden h-48 w-[12%] -mr-2 rounded mt-4 bg-black absolute bg-opacity-70  inset-y-0 right-0 z-20">
        </div>

        <div class="absolute inset-y-0 sm:right-40 right-0 z-30 flex items-center">
            <button @click="swiper.slideNext()"
                class="bg-nav-slide text-white flex justify-center items-center sm:w-14 sm:h-14 w-12 h-12 rounded-full shadow focus:outline-none">
                {{-- <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-8 h-8"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg> --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sm:w-6 sm:h-6 w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                </svg>

            </button>
        </div>
    </div>

    @include('partials.frontendFooter')


@endsection()

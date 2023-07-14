<div class=" w-full bg-nav z-20 pt-8">
    <div class=" max-w-7xl mx-auto items-center justify-between w-full">
        <div class=" absolute">
            <img src="{{ asset('assets/kpa-nav.png') }}" alt="logo" class="w-52 sm:block hidden">
        </div>
        <a class="flex items-center justify-center sm:text-4xl text-base font-semibold  text-white">Lokasi Prioritas Reforma Agraria</a>
        <div></div>
    </div>
    <div class=" w-full  bg-nav">
        <div class="sm:max-w-7xl  mx-auto px-4 flex items-center sm:justify-center justify-between mt-6 ">
            <div class="px-4 py-2 bg-nav @if($nav == 'about') border-b-4 border-black -mb-1  rounded @endif">
                <a href="{{ route('about') }}" class="text-white font-semibold sm:text-base text-xs">about</a>
            </div>
            <div class="px-4 py-2 bg-nav @if($nav == 'index') border-b-4 border-black -mb-1  rounded @endif">
                <a href="{{ route('index') }}" class=" text-white font-bold sm:text-base text-xs">map</a>
            </div>
            <div class="px-4 py-2 bg-nav @if($nav == 'profile') border-b-4 border-black -mb-1  rounded @endif">
                <a href="{{ route('profile') }}" class="text-white font-semibold sm:text-base text-xs">profile</a>
            </div>
            <div class="px-4 py-2 bg-nav @if($nav == 'updates') border-b-4 border-black -mb-1  rounded @endif">
                <a href="{{ route('updates') }}" class="text-white font-semibold sm:text-base text-xs">updates</a>
            </div>
        </div>
    </div>


</div>

<div class="absolute top-0 w-full z-20 mt-12">
    <div class=" max-w-7xl mx-auto items-center justify-between w-full">
        <div class=" absolute">
            {{-- <img src="assets/Kpa-nav.png" alt="logo" class="w-52 sm:block hidden"> --}}
        </div>
        <a class="flex items-center justify-center sm:text-4xl text-base font-semibold  text-white">Lokasi Prioritas Reforma Agraria</a>
        <div></div>
    </div>
    <div class=" w-full ">
        <div class="sm:max-w-7xl  mx-auto px-4 flex items-center sm:justify-center justify-between ">
            <div class="px-4 py-2  @if($nav == 'beranda') border-b-4 border-white  rounded @endif">
                <a href="{{ route('beranda') }}" class="text-white font-semibold sm:text-base text-xs">beranda</a>
            </div>
            <div class="px-4 py-2  @if($nav == 'about') border-b-4 border-white  rounded @endif">
                <a href="{{ route('about') }}" class="text-white font-semibold sm:text-base text-xs">tentang</a>
            </div>
            <div class="px-4 py-2  @if($nav == 'index') border-b-4 border-white  rounded @endif">
                <a href="{{ route('index', ['status'=>'all']) }}" class=" text-white font-bold sm:text-base text-xs">map</a>
            </div>
            <div class="px-4 py-2  @if($nav == 'profile') border-b-4 border-white  rounded @endif">
                <a href="{{ route('profile') }}" class="text-white font-semibold sm:text-base text-xs">profil</a>
            </div>
            <div class="px-4 py-2  @if($nav == 'updates') border-b-4 border-white  rounded @endif">
                <a href="{{ route('updates') }}" class="text-white font-semibold sm:text-base text-xs">informasi</a>
            </div>
        </div>
    </div>


</div>

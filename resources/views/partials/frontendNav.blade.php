<div class="flex justify-center border-b-1 border-newgray-400">
    <a href="/">
        <img class="h-24 py-4" src="{{ asset('assets/lpralogo-1.png') }}" alt="Lokasi Prioritas Reforma Agraria">
    </a>
</div>

{{-- nav --}}
<div class=" w-full py-2">
    <div class="sm:max-w-7xl  mx-auto px-4 flex items-center sm:justify-center justify-between">
        <div class="sm:px-10 px-4 py-2  ">
            <a href="{{ route('about') }}" class=" @if($nav == 'about') text-red-500 @endif font-light">Tentang</a>
        </div>
        <div class="sm:px-10 px-4 py-2  ">
            <a href="{{ route('index') }}" class="font-light @if($nav == 'peta') text-red-500 @endif">Peta</a>
        </div>
        <div class="sm:px-10 px-4 py-2 ">
            <a href="{{ route('profile') }}" class=" font-light @if($nav == 'profiles') text-red-500 @endif">Profil</a>
        </div>
        <div class="sm:px-10 px-4 py-2  ">
            <a href="{{ route('updates') }}" class=" font-light @if($nav == 'updates') text-red-500 @endif">Informasi</a>
        </div>
    </div>
</div>

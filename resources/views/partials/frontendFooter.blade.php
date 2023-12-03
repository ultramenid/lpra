<div class="max-w-3xl mx-auto px-4 py-4 border-t-1 border-newgray-400 mt-12">
    <div class="flex flex-col justify-center items-center gap-2">
        <a class="font-light tracking-wide text-sm">&copy; 2023 Lokasi Prioritas Reforma Agraria</a>
        <div class="flex gap-4 justify-center">
            <img class="h-12" src="{{ asset('assets/lprawarna.png') }}" alt="Lokasi Prioritas Reforma Agraria">
            <img class="h-12" src="{{ asset('assets/auriga.png') }}" alt="Lokasi Prioritas Reforma Agraria">

        </div>
    </div>
</div>

{{-- nav --}}
<div class="border-t-1 border-newgray-400">
    <div class=" w-full py-2">
        <div class="sm:max-w-7xl  mx-auto px-4 flex items-center sm:justify-center justify-between">
            <div class="sm:px-10 px-4 py-2  ">
                <a href="{{ route('about') }}" class=" font-light">Tentang</a>
            </div>
            <div class="sm:px-10 px-4 py-2  ">
                <a href="{{ route('index') }}" class="font-light">Peta</a>
            </div>
            <div class="sm:px-10 px-4 py-2 ">
                <a href="{{ route('profile') }}" class=" font-light">Profil</a>
            </div>
            <div class="sm:px-10 px-4 py-2  ">
                <a href="{{ route('updates') }}" class=" font-light">Informasi</a>
            </div>
        </div>
    </div>
</div>

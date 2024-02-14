<div class="flex justify-center border-b-1 border-newgray-400">
    <a href="/">
        <img class="h-24 py-4" src="{{ asset('assets/lpralogo-1.png') }}" alt="Lokasi Prioritas Reforma Agraria">
    </a>
</div>

{{-- nav --}}
<div class=" w-full py-2">
    <div class="sm:max-w-7xl  mx-auto px-4 flex items-center sm:justify-center justify-between overflow-x-auto scrollbar-hide">
        <div class="sm:px-10 px-4 py-2  ">
            <a href="{{ route('beranda') }}" class=" @if($nav == 'home') text-bukanlepra font-bold @else  @endif ">Beranda</a>
        </div>
        <div class="sm:px-10 px-4 py-2  ">
            <a href="{{ route('about') }}" class=" @if($nav == 'about') text-bukanlepra font-bold @else  @endif ">Tentang</a>
        </div>
        <div class="sm:px-10 px-4 py-2  ">
            <a href="{{ route('index', ['status'=>'all']) }}" class=" @if($nav == 'peta') text-bukanlepra font-bold  @else  @endif">Peta</a>
        </div>
        <div class="sm:px-10 px-4 py-2 ">
            <a href="{{ route('profile') }}" class="  @if($nav == 'profiles') text-bukanlepra font-bold @else  @endif">Profil</a>
        </div>
        <div class="sm:px-10 px-4 py-2  ">
            <a href="{{ route('updates') }}" class="  @if($nav == 'updates') text-bukanlepra font-bold @else  @endif">Informasi</a>
        </div>
    </div>
</div>

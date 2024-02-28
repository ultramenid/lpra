<div>
    <h1 class="text-black font-semibold text-3xl mb-8 max-w-4xl px-4  mx-auto sm:mt-12 mt-4">Lokasi Prioritas Reforma Agraria</h1>
    <div class="border-b-1 border-gray-400 py-4">
        <div class="max-w-2xl mx-auto px-4 flex sm:flex-row flex-col items-center justify-center gap-6">
            {{-- <select  class="   bg-filter text-newgray-700 sm:w-6/12  dark:text-gray-300 rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                <option value="">Filter</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
            <select  class="   bg-filter text-newgray-700 sm:w-6/12  dark:text-gray-300 rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                <option value="">Filter </option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select> --}}
            <div class=" w-full">
                <input  placeholder="Cari nama LPRA" type="text" class=" text-newgray-700 dark:text-gray-300 rounded w-full border  py-3 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 text-sm"  wire:model.debounce.400ms="search">
            </div>
        </div>
    </div>
    <div class="max-w-3xl px-4  mx-auto sm:mt-12 mt-4">
        @foreach ($data as $item)
        <div class="mt-4">
            <div class="flex items-center w-full gap-6">
                <div class="w-96 h-full">
                    <img class="w-full h-full  object-center " src="{{ asset('storage/photos/shares/'.$item->img) }}" alt="LPRA {{$item->desa_kel}}" >
                </div>
                <div class="text-brown-ndpe w-full flex flex-col gap-2">
                    <a href="{{ route('detailprofile', [$item->fid]) }}" class="hover:underline sm:text-2xl text-xl font-notoserif cursor-pointer">LPRA {{$item->desa_kel}}</a>
                    <div class="flex flex-col  text-xs text-gray-500 font-light mt-2">
                        <a>Luas: </a>
                        <a class="font-bold">{{$item->luas}} ha</a>
                    </div>

                    <div class="flex flex-col  text-xs text-gray-500 font-light">
                        <a>Tahapan: </a>
                        <a class="font-bold">{{$item->tipologi}}</a>
                    </div>

                    <div class="flex flex-col  text-xs text-gray-500 font-light">
                        <a>Jumlah Petani: </a>
                        <a class="font-bold">{{$item->jumlahpetani}} KK</a>
                    </div>


                    <div class="flex flex-col  text-xs text-gray-500 font-light">
                        <a>Penggunaan Tanah: </a>
                        <a class="font-bold">{{$item->tata_guna}}</a>
                    </div>
                </div>
            </div>
            <div class="border-b border-gray-300 mt-4"></div>
        </div>
        @endforeach
        @if ($data)
            {{ $data->links('livewire.pagination') }}
        @endif
    </div>

    <div
    x-data="{ loading: false }"
    x-show="loading"
    @loading.window="loading = $event.detail.loading"
    >
        <div
        class="fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden bg-about opacity-75 flex flex-col items-center justify-center">
        <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 mb-4"></div>
    </div>



</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        this.livewire.hook('message.sent', () => {
            window.dispatchEvent(
                new CustomEvent('loading', { detail: { loading: true }})
            );
        } )
        this.livewire.hook('message.processed', (message, component) => {
            window.dispatchEvent(
                new CustomEvent('loading', { detail: { loading: false }})
            );
        })
    });



        </script>

<div>
    <h1 class="text-black font-semibold text-3xl mb-8 max-w-4xl px-4  mx-auto sm:mt-12 mt-4">Lokasi Prioritas Reforma Agraria</h1>
    <div class="border-t-1 border-b-1 border-gray-400 py-4">
        <div class="max-w-2xl mx-auto px-4 flex sm:flex-row flex-col items-center justify-center gap-6">
            <select  class="   bg-filter text-newgray-700 sm:w-6/12  dark:text-gray-300 rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                <option value="">Filter</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
            <select  class="   bg-filter text-newgray-700 sm:w-6/12  dark:text-gray-300 rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                <option value="">Filter </option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </div>
    </div>
    <div class="max-w-4xl px-4  mx-auto sm:mt-12 mt-4">
        @foreach ($data as $item)
        <div class="mt-4">
            <div class="flex  w-full gap-6">
                <div class="w-32">
                    <img class="w-full h-full object-cover object-center rounded-full  border" src="{{ asset('storage/photos/shares/'.$item->img) }}" alt="LPRA {{$item->desa_kel}}" >
                </div>
                <div class="text-brown-ndpe w-full ">
                    <a href="{{ url('profile', [$item->fid, $item->desa_kel]) }}" class="hover:underline sm:text-2xl text-xl font-notoserif cursor-pointer mb-6">LPRA {{$item->desa_kel}}</a>
                    <div class="flex space-x-2 text-xs text-gray-500 font-light mt-2">
                        <a>Luas: </a>
                        <a>{{$item->luas}}</a>
                    </div>

                    <div class="flex space-x-2 text-xs text-gray-500 font-light">
                        <a>Tahapan: </a>
                        <a>{{$item->tipologi}}</a>
                    </div>

                    <div class="flex space-x-2 text-xs text-gray-500 font-light">
                        <a>Jumlah Petani: </a>
                        <a>{{$item->jumlahpetani}} KK</a>
                    </div>


                    <div class="flex space-x-2 text-xs text-gray-500 font-light">
                        <a>Penggunaan Tanah: </a>
                        <a>{{$item->tata_guna}}</a>
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

</div>

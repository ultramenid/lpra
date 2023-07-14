<div class="max-w-3xl px-4  mx-auto sm:mt-12 mt-4">
    <h1 class="text-bukanlepra font-semibold text-3xl mb-8">Profiles</h1>

    @foreach ($data as $item)
    <div class="mt-4">
        <div class="flex justify-between w-full ">
            <div class="text-brown-ndpe w-ful hover:underlinel">
                <a href="{{ url('profile', [$item->slug]) }}" class="sm:text-2xl text-xl font-notoserif cursor-pointer mb-6">{{$item->profile}}</a>
                <div class="flex space-x-2 text-xs text-gray-500 font-light mt-2">
                    <a>Luas: </a>
                    <a>{{$item->luas}}</a>
                </div>

                <div class="flex space-x-2 text-xs text-gray-500 font-light">
                    <a>Tahapan: </a>
                    <a>{{$item->tahapan}}</a>
                </div>

                <div class="flex space-x-2 text-xs text-gray-500 font-light">
                    <a>Jumlah Petani: </a>
                    <a>{{$item->jumlahpetani}}</a>
                </div>


                <div class="flex space-x-2 text-xs text-gray-500 font-light">
                    <a>Penggunaan Tanah: </a>
                    <a>{{$item->penggunaantanah}}</a>
                </div>
            </div>
        </div>
        <div class="border-b border-gray-300 mt-4"></div>
    </div>
    @endforeach
</div>

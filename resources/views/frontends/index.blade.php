@extends('layouts.map')

@section('content')
<div class="relative">
    {{-- @include('partials.nav') --}}
    <div class="flex">
        <div class="h-screen w-3/12 sm:block hidden  bg-white py-6 shadow-lg shadow-r select-none overflow-y-auto scrollbar-hide">
            <a class="z-50 relative" href="{{ route('beranda') }}"><img src="{{ asset('assets/lpralogo-1.png') }}" alt="" class=" text-center mx-auto h-28"></a>

            <div class=" overflow-x-auto scrollbar-hide  gap-3 px-4 flex   mt-6 border-b border-gray-300">
                <a class="whitespace-nowrap text-xs font-medium uppercase py-1 border-b-2 border-b-red-500">peta</a>
                <a class="whitespace-nowrap text-xs font-medium uppercase py-1">beranda</a>
                <a class="whitespace-nowrap text-xs font-medium uppercase py-1">tentang</a>
                <a class="whitespace-nowrap text-xs font-medium uppercase py-1">profil</a>
                <a class="whitespace-nowrap text-xs font-medium uppercase py-1">informasi</a>
            </div>
            <div class="px-4 py-4" x-data="{
                hutan: 'Aset Pemerintah Daerah',
                kebun: 'HGB Habis Perusahaan Swasta',
                status: 'Kawasan Hutan',
                options: ['Kawasan Hutan','Kebun / APL Lainnya'],
                hutans: ['Aset Pemerintah Daerah','Klaim Hutan Perhutani','Konsesi Hutan Produksi', 'Penetapan Hutan Lindung', 'Penetapan Hutan Produksi', 'Zona Otorita Pariwisata', 'Pelepasan Kawasan Hutan'],
                kebuns: ['HGB Habis Perusahaan Swasta', 'HGU Habis Perkebunan Negara', 'HGU Habis Perkebunan Swasta', 'HGU Terlantar Perkebunan Negara', 'HGU Terlantar Perkebunan Swasta', 'Izin Usaha Pertambangan', 'Redistribusi']
                }">
                <h2>Status / Klaim</h2>
                <select x-model="status" id="status" class=" text-sm w-full mb-2 bg-white  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-simontono">
                    <option value="kosong">Pilih status / klaim</option>
                    <template x-for="item in options" :key="item">
                        <option :value="item" :selected="item === '{{$klaim}}'" x-text="item"></option>
                    </template>
                </select>

                <h2 class="">Tipologi</h2>
                <div x-show="status == 'Kawasan Hutan'">
                    <select x-model="hutan" id="hutan" class="  text-sm w-full mb-2 bg-white  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-simontono">
                        <option value="kosong" class="text-xs">Pilih tipologi</option>
                        <template x-for="item in hutans" :key="item">
                            <option :value="item" x-text="item" class="text-xs"></option>
                        </template>
                    </select>
                </div>
                <div x-show="status == 'Kebun / APL Lainnya'" style="display: none !important">
                    <select x-model="kebun" id="kebun" class="text-sm w-full mb-2 bg-white  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-simontono">
                        <option value="kosong" class="text-xs">Pilih tipologi</option>
                        <template x-for="item in kebuns" :key="item">
                            <option :value="item" x-text="item" class="text-xs"></option>
                        </template>
                    </select>
                </div>

            </div>

            <div class="flex justify-center items-center  gap-4 px-4">
                <div class="w-6/12">
                    <button onclick="resetLayer()" class="w-full bg-about text-white py-1 px-1 rounded-lg">Reset</button>
                </div>
                <div class="w-6/12">
                    <button onclick="submitLayer()" class="w-full bg-hijau-lpra text-white py-1 px-1 rounded-lg">Submit</button>
                </div>
            </div>

            <div class=" py-2 px-4" x-data=" {open:true}">
                <div  class=" flex items-center">

                    <div class=" flex justify-between w-full items-center cursor-pointer" >
                        <label  class="w-full text-xl  mt-4  ">Status / Klaim Legend</label>
                        {{-- <div>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-0': open, 'rotate-180': !open}" class="inline w-4 h-4 items-center mt-1 ml-1 transition-transform duration-200 transform "><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div> --}}
                    </div>

                </div>
                <div class="" x-show="open" style="display: none !important;">
                    <div class="flex items-center  mt-2">
                        <div class="w-[19px] h-4  rounded-full  " style="background-color: #16DB65"></div>
                        <label for="penetapanhutanlindung" class="w-full ml-1 text-sm  ">Kawasan Hutan</label>
                    </div>
                    <div class="flex items-center  mt-2">
                        <div class="w-[19px] h-4  rounded-full " style="background-color: #960200"></div>
                        <label for="penetapanhutanlindung" class="w-full ml-1 text-sm  ">Kebun / APL Lainnya</label>
                    </div>
                </div>
            </div>
            {{-- checkbox --}}
            <h1 class="mt-4 mb-2 text-xl   px-4">Layers</h1>
            <div class="mt-4 mb-2 px-4" >
                <div class="flex gap-2">
                    <label for="LPRA" class="flex  cursor-pointer select-none text-dark dark:text-white" >
                        <div class="relative">
                            <input type="checkbox" id="LPRA" class="peer sr-only" checked/>
                            <div class="block h-5 rounded-full  bg-gray-200 w-9 peer-checked:bg-hijau-lpra" ></div>
                            <div class="absolute w-[13px] h-[13px] transition bg-white rounded-full  left-1 bottom-1 top-[3.5px] peer-checked:translate-x-full peer-checked:bg-white "></div>
                        </div>
                    </label>
                    <div class="flex items-center gap-1" >
                        <a class="text-sm">LPRA</a>
                        <span class="group relative">
                            <div class="absolute bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[40%] hidden group-hover:block w-auto">
                              <div class="bottom-full right-0 rounded bg-black px-4 py-2 text-xs text-white whitespace-nowrap">
                                Lokasi Prioritas Reforma Agraria
                                {{-- <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve"><polygon class="fill-current" points="0,0 127.5,127.5 255,0" /></svg> --}}
                              </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" x-tooltip="tooltip" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer active:outline-none focus:outline-none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>

                          </span>

                    </div>

                   </div>
                <div id="legendLPRA" class=" pb-4" style="display: block !important;" class="">
                    <div class="pl-9 " >
                        <div class="flex items-center rounded mt-2">
                            <div class="w-4 h-3 ml-2 border-2 " style="border-color: #FFA500"></div>
                            <label for="asetpemerintahdaerah" class="w-full ml-1 text-xs ">Polygon LPRA</label>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mt-1 mb-2 px-4" >
                <div class="flex gap-2">
                    <label for="HGU" class="flex  cursor-pointer select-none text-dark dark:text-white" >
                        <div class="relative">
                            <input type="checkbox" id="HGU" class="peer sr-only" />
                            <div class="block h-5 rounded-full  bg-gray-200 w-9 peer-checked:bg-hijau-lpra" ></div>
                            <div class="absolute w-[13px] h-[13px] transition bg-white rounded-full  left-1 bottom-1 top-[3.5px] peer-checked:translate-x-full peer-checked:bg-white "></div>
                        </div>
                    </label>
                    <div class="flex items-center gap-1" >
                        <a class="text-sm">HGU</a>
                        <span class="group relative">
                            <div class="absolute bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[40%] hidden group-hover:block w-auto">
                              <div class="bottom-full right-0 rounded bg-black px-4 py-2 text-xs text-white whitespace-nowrap">
                                Hak Guna Usaha
                                {{-- <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve"><polygon class="fill-current" points="0,0 127.5,127.5 255,0" /></svg> --}}
                              </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" x-tooltip="tooltip" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer active:outline-none focus:outline-none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>

                          </span>

                    </div>
                   </div>
                <div id="legendHGU" class=" pb-4" style="display: none !important;">
                    <div class="pl-9 " >
                        <div class="flex items-center rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #3C7A89"></div>
                            <label for="asetpemerintahdaerah" class="w-full ml-1 text-xs ">HGU</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-1 mb-2 px-4" >

                <div class="flex gap-2">
                    <label for="PBPH" class="flex  cursor-pointer select-none text-dark dark:text-white" >
                        <div class="relative">
                            <input type="checkbox" id="PBPH" class="peer sr-only" />
                            <div class="block h-5 rounded-full  bg-gray-200 w-9 peer-checked:bg-hijau-lpra" ></div>
                            <div class="absolute w-[13px] h-[13px] transition bg-white rounded-full  left-1 bottom-1 top-[3.5px] peer-checked:translate-x-full peer-checked:bg-white "></div>
                        </div>
                    </label>
                    <div class="flex items-center gap-1" >
                        <a class="text-sm">PBPH</a>
                        <span class="group relative">
                            <div class="absolute  bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[40%] hidden group-hover:block w-auto">
                              <div class="bottom-full right-0 rounded bg-black px-4 py-2 text-xs text-white whitespace-nowrap">
                                Perizinan Berusaha Pemanfaatan Hutan
                                {{-- <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve"><polygon class="fill-current" points="0,0 127.5,127.5 255,0" /></svg> --}}
                              </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" x-tooltip="tooltip" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer active:outline-none focus:outline-none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>

                          </span>

                    </div>
                   </div>

                <div id="legendPBPH" class=" pb-4" style="display: none !important;">
                    <div class="pl-9 " >
                        <div class="flex items-center rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #BA2D0B"></div>
                            <label for="klaimhutanperhutani" class="w-full ml-1 text-xs">PBPH-HT</label>
                        </div>
                        <div class="flex items-center rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #B0A084"></div>
                            <label for="konsesihutanproduksi" class="w-full ml-1 text-xs">PBPH-HA</label>
                        </div>
                        <div class="flex items-center rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #16DB65"></div>
                            <label for="penetapanhutanlindung" class="w-full ml-1 text-xs">PBPH-RE</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-1 mb-2 px-4" >
                <div class="flex gap-2">
                    <label for="kawasanhutan" class="flex  cursor-pointer select-none text-dark dark:text-white" >
                        <div class="relative">
                            <input type="checkbox" id="kawasanhutan" class="peer sr-only" />
                            <div class="block h-5 rounded-full  bg-gray-200 w-9 peer-checked:bg-hijau-lpra" ></div>
                            <div class="absolute w-[13px] h-[13px] transition bg-white rounded-full  left-1 bottom-1 top-[3.5px] peer-checked:translate-x-full peer-checked:bg-white "></div>
                        </div>
                    </label>
                    <a class="text-sm">Kawasan Hutan</a>
                   </div>
                <div id="legendKawasanhutan" class=" pb-4" style="display: none !important;" class="">
                    <div class="pl-9 " >
                        <div class="flex  rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #ad40ff"></div>
                            <label for="asetpemerintahdaerah" class="w-full ml-1 text-xs  ">Hutan Konservasi</label>
                        </div>
                        <div class="flex  rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #01ad00"></div>
                            <label for="klaimhutanperhutani" class="w-full ml-1 text-xs  ">Hutan Lindung</label>
                        </div>
                        <div class="flex  rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #ff5eff"></div>
                            <label for="konsesihutanproduksi" class="w-full ml-1 text-xs  ">Hutan Produksi Konversi</label>
                        </div>
                        <div class="flex  rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #8af200"></div>
                            <label for="penetapanhutanlindung" class="w-full ml-1 text-xs  ">Hutan Produksi Terbatas</label>
                        </div>
                        <div class="flex  rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color:  #ffff00"></div>
                            <label for="penetapanhutanproduksi" class="w-full ml-1 text-xs  ">Hutan Produksi Tetap</label>
                        </div>
                        <div class="flex  rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color:  #0000ff"></div>
                            <label for="zonaotoritapariwisata" class="w-full ml-1 text-xs  ">Air/Danau/Laut</label>
                        </div>
                        <div class="flex  rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color:  #fef9f1"></div>
                            <label for="pelepasankawasanhutan" class="w-full ml-1 text-xs  ">Areal Penggunaan Lain</label>
                        </div>
                    </div>
                </div>
            </div>

            <livewire:statistik-component  :klaim=$klaim />
        </div>
        <div id="map" class="h-screen w-full z-10 "></div>
    </div>
</div>



@endsection

@push('scripts')
    <script>

        var data = '<?php echo $klaim  ?>';
        console.log(data)
    </script>
    <script src="{{ asset('js/map.js') }}"></script>
@endpush

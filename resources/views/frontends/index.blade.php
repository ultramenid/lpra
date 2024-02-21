@extends('layouts.map')

@section('content')
<div class="relative">
    @include('partials.nav')
    <div class="flex">
        <div class="h-screen w-3/12 sm:block hidden  bg-white  px-6 py-6 shadow-lg shadow-r select-none overflow-y-auto">
            <a class="z-50 relative" href="{{ route('beranda') }}"><img src="{{ asset('assets/lpralogo-1.png') }}" alt="" class=" text-center mt-8 mx-auto h-16"></a>

            {{-- <h1 class="mt-12  font-bold">Marker</h1>
            <div class="border-b border-gray-300 py-2" x-data=" {open:false}">
                <div  class=" flex items-center">
                    <div class="flex items-center rounded " >
                            <input checked  type="checkbox" id="hutan" name="hutan" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                            <div class="w-5 h-3 bg-hutan ml-2"></div>
                    </div>
                    <div class=" flex justify-between w-full items-center cursor-pointer" @click="open=!open ">
                        <label  class="w-full ml-1 text-xs font-medium text-gray-500">Hutan</label>
                        <div>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-0': open, 'rotate-180': !open}" class="inline w-4 h-4 items-center mt-1 ml-1 transition-transform duration-200 transform "><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>

                </div>
                <div class="pl-5 mt-3" x-show="open" style="display: none !important;">
                    <div class="flex items-center rounded mt-2">
                        <input checked  type="checkbox" id="asetpemerintahdaerah" name="bordered-checkbox" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                        <label for="asetpemerintahdaerah" class="w-full ml-1 text-xs font-medium text-gray-500">Aset Pemerintah Daerah</label>
                    </div>
                    <div class="flex items-center rounded mt-2">
                        <input checked  type="checkbox" id="klaimhutanperhutani" name="bordered-checkbox" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                        <label for="klaimhutanperhutani" class="w-full ml-1 text-xs font-medium text-gray-500">Klaim Hutan Perhutani</label>
                    </div>
                    <div class="flex items-center rounded mt-2">
                        <input checked  type="checkbox" id="konsesihutanproduksi" name="bordered-checkbox" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                        <label for="konsesihutanproduksi" class="w-full ml-1 text-xs font-medium text-gray-500">Konsesi Hutan Produksi</label>
                    </div>
                    <div class="flex items-center rounded mt-2">
                        <input checked  type="checkbox" id="penetapanhutanlindung" name="bordered-checkbox" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                        <label for="penetapanhutanlindung" class="w-full ml-1 text-xs font-medium text-gray-500">Penetapan Hutan Lindung</label>
                    </div>
                    <div class="flex items-center rounded mt-2">
                        <input checked  type="checkbox" id="penetapanhutanproduksi" name="bordered-checkbox" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                        <label for="penetapanhutanproduksi" class="w-full ml-1 text-xs font-medium text-gray-500">Penetapan Hutan Produksi</label>
                    </div>
                    <div class="flex items-center rounded mt-2">
                        <input checked  type="checkbox" id="zonaotoritapariwisata" name="bordered-checkbox" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                        <label for="zonaotoritapariwisata" class="w-full ml-1 text-xs font-medium text-gray-500">Zona Otorita Pariwisata</label>
                    </div>
                    <div class="flex items-center rounded mt-2">
                        <input checked  type="checkbox" id="pelepasankawasanhutan" name="bordered-checkbox" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                        <label for="pelepasankawasanhutan" class="w-full ml-1 text-xs font-medium text-gray-500">Pelepasan Kawasan Hutan</label>
                    </div>
                </div>
            </div>

            <div class="border-b border-gray-300 py-2" x-data=" {open:false}">
                <div  class=" flex items-center">
                    <div class="flex items-center rounded " >
                            <input checked  type="checkbox" id="hutan" name="hutan" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                            <div class="w-5 h-3 bg-kebun ml-2"></div>
                    </div>
                    <div class=" flex justify-between w-full items-center cursor-pointer" @click="open=!open ">
                        <label  class="w-full ml-1 text-xs font-medium text-gray-500">Kebun</label>
                        <div>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-0': open, 'rotate-180': !open}" class="inline w-4 h-4 items-center mt-1 ml-1 transition-transform duration-200 transform "><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>

                </div>
                <div class="pl-5 mt-3" x-show="open" style="display: none !important;">
                    <div class="flex items-center rounded mt-2">
                        <input checked  type="checkbox" id="hgbhabisperusahaanswasta" name="bordered-checkbox" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                        <label for="hgbhabisperusahaanswasta" class="w-full ml-1 text-xs font-medium text-gray-500">HGB Habis Perusahaan Swasta</label>
                    </div>
                    <div class="flex items-center rounded mt-2">
                        <input checked  type="checkbox" id="hguhabisperkebunannegara" name="bordered-checkbox" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                        <label for="hguhabisperkebunannegara" class="w-full ml-1 text-xs font-medium text-gray-500">HGU Habis Perkebunan Negara</label>
                    </div>
                    <div class="flex items-center rounded mt-2">
                        <input checked  type="checkbox" id="hguhabisperkebunanswasta" name="bordered-checkbox" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                        <label for="hguhabisperkebunanswasta" class="w-full ml-1 text-xs font-medium text-gray-500">HGU Habis Perkebunan Swasta</label>
                    </div>
                    <div class="flex items-center rounded mt-2">
                        <input checked  type="checkbox" id="hguterlantarperkebunannegara" name="bordered-checkbox" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                        <label for="hguterlantarperkebunannegara" class="w-full ml-1 text-xs font-medium text-gray-500">HGU Terlantar Perkebunan Negara</label>
                    </div>
                    <div class="flex items-center rounded mt-2">
                        <input checked  type="checkbox" id="hguterlantarperkebunanswasta" name="bordered-checkbox" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                        <label for="hguterlantarperkebunanswasta" class="w-full ml-1 text-xs font-medium text-gray-500">HGU Terlantar Perkebunan Swasta</label>
                    </div>
                    <div class="flex items-center rounded mt-2">
                        <input checked  type="checkbox" id="izinusahapertambangan" name="bordered-checkbox" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                        <label for="izinusahapertambangan" class="w-full ml-1 text-xs font-medium text-gray-500">Izin Usaha Pertambangan</label>
                    </div>
                    <div class="flex items-center rounded mt-2">
                        <input checked  type="checkbox" id="redistribusi" name="bordered-checkbox" class="w-3 h-3 accent-black bg-gray-100 border-gray-300 border rounded-full">
                        <label for="redistribusi" class="w-full ml-1 text-xs font-medium text-gray-500">Redistribusi</label>
                    </div>
                </div>
            </div> --}}
            <h1 class="mt-12 mb-2 text-xl  font-bold">Filter</h1>
            <div x-data="{
                hutan: 'Aset Pemerintah Daerah',
                kebun: 'HGB Habis Perusahaan Swasta',
                status: 'Kawasan Hutan',
                options: ['Kawasan Hutan','Kebun / APL Lainnya'],
                hutans: ['Aset Pemerintah Daerah','Klaim Hutan Perhutani','Konsesi Hutan Produksi', 'Penetapan Hutan Lindung', 'Penetapan Hutan Produksi', 'Zona Otorita Pariwisata', 'Pelepasan Kawasan Hutan'],
                kebuns: ['HGB Habis Perusahaan Swasta', 'HGU Habis Perkebunan Negara', 'HGU Habis Perkebunan Swasta', 'HGU Terlantar Perkebunan Negara', 'HGU Terlantar Perkebunan Swasta', 'Izin Usaha Pertambangan', 'Redistribusi']
                }">
                <h2>Status / Klaim</h2>
                <select x-model="status" id="status" class="text-sm w-full mb-2 bg-gray-100  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-simontono">
                    <option value="kosong">...</option>
                    <template x-for="item in options" :key="item">
                        <option :value="item" :selected="item === '{{$klaim}}'" x-text="item"></option>
                    </template>
                </select>

                <h2 class="mt-2">Tipologi</h2>
                <div x-show="status == 'Kawasan Hutan'">
                    <select x-model="hutan" id="hutan" class="text-sm w-full mb-2 bg-gray-100  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-simontono">
                        <option value="kosong">...</option>
                        <template x-for="item in hutans" :key="item">
                            <option :value="item" x-text="item"></option>
                        </template>
                    </select>
                </div>
                <div x-show="status == 'Kebun / APL Lainnya'" style="display: none !important">
                    <select x-model="kebun" id="kebun" class="text-sm w-full mb-2 bg-gray-100  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-simontono">
                        <option value="kosong">...</option>
                        <template x-for="item in kebuns" :key="item">
                            <option :value="item" x-text="item"></option>
                        </template>
                    </select>
                </div>

            </div>

            <div class="flex justify-center items-center mt-2 space-x-4">
                <div class="w-6/12">
                    <button onclick="resetLayer()" class="w-full bg-black text-white py-1 px-1">Reset</button>
                </div>
                <div class="w-6/12">
                    <button onclick="submitLayer()" class="w-full bg-nav text-white py-1 px-1">Submit</button>
                </div>
            </div>

            {{-- checkbox --}}
            <h1 class="mt-12 mb-2 text-xl  font-bold">Layer</h1>
            <div class="mt-4 mb-2" >
                <div class="flex gap-2">
                    <label for="LPRA" class="flex  cursor-pointer select-none text-dark dark:text-white" >
                        <div class="relative">
                            <input type="checkbox" id="LPRA" class="peer sr-only" checked/>
                            <div class="block h-5 rounded-full  bg-gray-200 w-9 peer-checked:bg-about" ></div>
                            <div class="absolute w-[13px] h-[13px] transition bg-white rounded-full  left-1 bottom-1 top-[3.5px] peer-checked:translate-x-full peer-checked:bg-white "></div>
                        </div>
                    </label>
                    <a class="text-sm">Lokasi Prioritas Reforma Agraria (LPRA)</a>
                   </div>
                <div id="legendLPRA" class="border-b border-gray-300 pb-4" style="display: block !important;" class="">
                    <div class="pl-5 " >
                        <div class="flex items-center rounded mt-2">
                            <div class="w-6 h-5 ml-2 border-2 " style="border-color: #FFA500"></div>
                            <label for="asetpemerintahdaerah" class="w-full ml-1 text-sm font-medium text-gray-500">Hutan Konservasi</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-1 mb-2" >
                <div class="flex gap-2">
                    <label for="kawasanhutan" class="flex  cursor-pointer select-none text-dark dark:text-white" >
                        <div class="relative">
                            <input type="checkbox" id="kawasanhutan" class="peer sr-only" />
                            <div class="block h-5 rounded-full  bg-gray-200 w-9 peer-checked:bg-about" ></div>
                            <div class="absolute w-[13px] h-[13px] transition bg-white rounded-full  left-1 bottom-1 top-[3.5px] peer-checked:translate-x-full peer-checked:bg-white "></div>
                        </div>
                    </label>
                    <a class="text-sm">Kawasan Hutan</a>
                   </div>
                <div id="legendKawasanhutan" class="border-b border-gray-300 pb-4" style="display: none !important;" class="">
                    <div class="pl-5 " >
                        <div class="flex  rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #ad40ff"></div>
                            <label for="asetpemerintahdaerah" class="w-full ml-1 text-sm font-medium text-gray-500">Hutan Konservasi</label>
                        </div>
                        <div class="flex  rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #01ad00"></div>
                            <label for="klaimhutanperhutani" class="w-full ml-1 text-sm font-medium text-gray-500">Hutan Lindung</label>
                        </div>
                        <div class="flex  rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #ff5eff"></div>
                            <label for="konsesihutanproduksi" class="w-full ml-1 text-sm font-medium text-gray-500">Hutan Produksi Konversi</label>
                        </div>
                        <div class="flex  rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #8af200"></div>
                            <label for="penetapanhutanlindung" class="w-full ml-1 text-sm font-medium text-gray-500">Hutan Produksi Terbatas</label>
                        </div>
                        <div class="flex  rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color:  #ffff00"></div>
                            <label for="penetapanhutanproduksi" class="w-full ml-1 text-sm font-medium text-gray-500">Hutan Produksi Tetap</label>
                        </div>
                        <div class="flex  rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color:  #0000ff"></div>
                            <label for="zonaotoritapariwisata" class="w-full ml-1 text-sm font-medium text-gray-500">Air/Danau/Laut</label>
                        </div>
                        <div class="flex  rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color:  #fef9f1"></div>
                            <label for="pelepasankawasanhutan" class="w-full ml-1 text-sm font-medium text-gray-500">Areal Penggunaan Lain</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-1 mb-2" >
                <div class="flex gap-2">
                    <label for="HGU" class="flex  cursor-pointer select-none text-dark dark:text-white" >
                        <div class="relative">
                            <input type="checkbox" id="HGU" class="peer sr-only" />
                            <div class="block h-5 rounded-full  bg-gray-200 w-9 peer-checked:bg-about" ></div>
                            <div class="absolute w-[13px] h-[13px] transition bg-white rounded-full  left-1 bottom-1 top-[3.5px] peer-checked:translate-x-full peer-checked:bg-white "></div>
                        </div>
                    </label>
                    <a class="text-sm">Hak Guna Usaha (HGU)</a>
                   </div>
                <div id="legendHGU" class="border-b border-gray-300 pb-4" style="display: none !important;">
                    <div class="pl-5 " >
                        <div class="flex items-center rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #3C7A89"></div>
                            <label for="asetpemerintahdaerah" class="w-full ml-1 text-sm font-medium text-gray-500">HGU</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-1 mb-2" >

                <div class="flex gap-2">
                    <label for="PBPH" class="flex  cursor-pointer select-none text-dark dark:text-white" >
                        <div class="relative">
                            <input type="checkbox" id="PBPH" class="peer sr-only" />
                            <div class="block h-5 rounded-full  bg-gray-200 w-9 peer-checked:bg-about" ></div>
                            <div class="absolute w-[13px] h-[13px] transition bg-white rounded-full  left-1 bottom-1 top-[3.5px] peer-checked:translate-x-full peer-checked:bg-white "></div>
                        </div>
                    </label>
                    <a class="text-sm">Perizinan Berusaha Pemanfaatan Hutan (PBPH)</a>
                   </div>

                <div id="legendPBPH" class="border-b border-gray-300 pb-4" style="display: none !important;">
                    <div class="pl-5 " >
                        <div class="flex items-center rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #BA2D0B"></div>
                            <label for="klaimhutanperhutani" class="w-full ml-1 text-sm font-medium text-gray-500">PBPH-HT</label>
                        </div>
                        <div class="flex items-center rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #B0A084"></div>
                            <label for="konsesihutanproduksi" class="w-full ml-1 text-sm font-medium text-gray-500">PBPH-HA</label>
                        </div>
                        <div class="flex items-center rounded mt-2">
                            <div class="w-4 h-3 ml-2" style="background-color: #16DB65"></div>
                            <label for="penetapanhutanlindung" class="w-full ml-1 text-sm font-medium text-gray-500">PBPH-RE</label>
                        </div>
                    </div>
                </div>
            </div>


            <h1 class="mt-12 mb-2 text-xl  font-bold">Legend</h1>

            <div class="border-b border-gray-300 py-2" x-data=" {open:true}">
                <div  class=" flex items-center">

                    <div class=" flex justify-between w-full items-center cursor-pointer" >
                        <label  class="w-full ml-1 text-sm  font-medium text-gray-500">Status / Klaim</label>
                        {{-- <div>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-0': open, 'rotate-180': !open}" class="inline w-4 h-4 items-center mt-1 ml-1 transition-transform duration-200 transform "><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div> --}}
                    </div>

                </div>
                <div class="pl-5 " x-show="open" style="display: none !important;">
                    <div class="flex items-center  mt-2">
                        <div class="w-[23px] h-5 ml-2 rounded-full  border-2" style="border-color: #16DB65"></div>
                        <label for="penetapanhutanlindung" class="w-full ml-1 text-sm  text-gray-500">Kawasan Hutan</label>
                    </div>
                    <div class="flex items-center  mt-2">
                        <div class="w-[23px] h-5 ml-2 rounded-full border-2" style="border-color: #960200"></div>
                        <label for="penetapanhutanlindung" class="w-full ml-1 text-sm  text-gray-500">Kebun / APL Lainnya</label>
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

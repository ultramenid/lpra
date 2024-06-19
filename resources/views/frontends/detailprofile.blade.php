@extends('layouts.index')

@section('content')
    @include('partials.frontendNav')
    <div class="relative">
        <img class="sm:h-[70vh] w-full object-cover object-center" src="{{ asset('assets/heroprofile.jpeg') }}" alt="Lokasi Prioritas Reforma Agraria">
    </div>

    <div class="border-b-1 border-gray-400 mt-16">
        <div class="max-w-5xl mx-auto px-4">
            <a class="text-3xl font-bold">LPRA {{$data->desa_kel}}</a>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4">
        <div class="flex sm:flex-row flex-col gap-6 py-4 items-center">
            <img src="{{ asset('storage/photos/shares/'.$data->img) }}" alt="LPRA {{$data->desa_kel}}" class="sm:w-4/12 w-full h-full">
            <div class="">
                <div class="mt-4 flex flex-col gap-2">
                    <div class="flex  flex-col ">
                        <label class="text-bukanlepra font-semibold text-sm">Luas: </label>
                        <p class="font-bold">{{$data->luas}} ha</p>
                    </div>

                    <div class="flex  flex-col ">
                        <label class="text-bukanlepra font-semibold text-sm">Jumlah Petani: </label>
                        <p class="font-bold">{{$data->jumlahpetani}} KK</p>
                    </div>
                    <div class="flex  flex-col  ">
                        <label class="text-bukanlepra font-semibold text-sm">Organisasi: </label>
                        <p class="text-sm font-bold">{{$data->organisasi}}</p>
                    </div>

                    <div class="flex  flex-col  ">
                        <label class="text-bukanlepra font-semibold text-sm">Tipologi: </label>
                        <p class="text-sm font-bold">{{$data->tipologi}}</p>
                    </div>

                    <div class="flex  flex-col  ">
                        <label class="text-bukanlepra font-semibold text-sm">Penggunaan Tanah: </label>
                        <p class="text-sm font-bold">{{$data->tata_guna}}</p>
                    </div>


                    <div class="flex  flex-col  ">
                        <label class="text-bukanlepra font-semibold text-sm">Lokasi: </label>
                        <p class=" text-sm font-bold">{{$data->desa_kel}}, {{$data->kec}}, {{$data->kab_kota}}, {{$data->provinsi}}</p>
                    </div>

                    <div class="flex  flex-col  ">
                        <label class="text-bukanlepra font-semibold text-sm">Komoditas: </label>
                        <p class=" text-sm font-bold">{!! $data->kesimpulan !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="border border-gray-400 min-h-screen overflow-auto" x-data="{open: 'map'}"">
            <div class="flex flex-row  scrollbar-hide overflow-auto h-full sm:gap-0 gap-4  mt-3 snap-x snap-mandatory px-4 justify-center">
                <!-- card -->
                <div
                :class="(open === 'map') ? 'bg-nav-slide text-white' : 'bg-filter text-gray-800 hover:bg-nav-slide hover:text-white'"
                class="flex-shrink-0 snap-center sm:w-2/12 w-4/12 border text-center  py-2  items-center inline-flex justify-center cursor-pointer"
                @click="open = 'map'">
                    Peta
                </div>
                <div
                :class="(open === 'sejarah1') ? 'bg-nav-slide text-white' : 'bg-filter text-gray-800 hover:bg-nav-slide hover:text-white'"
                class="flex-shrink-0 snap-center sm:w-2/12 w-4/12 border text-center  py-2  items-center inline-flex justify-center cursor-pointer"
                @click="open = 'sejarah1'">
                    Sejarah Penguasaan
                 </div>
                 <div :class="(open === 'sejarah2') ? 'bg-nav-slide text-white' : 'bg-filter text-gray-800 hover:bg-nav-slide hover:text-white'"
                 class="flex-shrink-0 snap-center sm:w-2/12 w-4/12 border text-center  py-2  items-center inline-flex justify-center cursor-pointer"
                 @click="open = 'sejarah2'">
                    Sejarah Konflik
                 </div>
                 <div :class="(open === 'analisishukum') ? 'bg-nav-slide text-white' : 'bg-filter text-gray-800 hover:bg-nav-slide hover:text-white'"
                 class="flex-shrink-0 snap-center sm:w-2/12 w-4/12 border text-center  py-2  items-center inline-flex justify-center cursor-pointer"
                 @click="open = 'analisishukum'">
                    Analisis Hukum

                 </div>
                 {{-- <div :class="(open === 'komoditas') ? 'bg-nav-slide text-white' : 'bg-filter text-gray-800 hover:bg-nav-slide hover:text-white'"
                 class="flex-shrink-0 snap-center sm:w-2/12 w-4/12 border text-center  py-2  items-center inline-flex justify-center cursor-pointer"
                 @click="open = 'komoditas'">
                    Komoditas
                 </div> --}}
                 <div :class="(open === 'rekomendasi') ? 'bg-nav-slide text-white' : 'bg-filter text-gray-800 hover:bg-nav-slide hover:text-white'"
                 class="flex-shrink-0 snap-center sm:w-2/12 w-4/12 border text-center  py-2  items-center inline-flex justify-center cursor-pointer"
                 @click="open = 'rekomendasi'">
                    Rekomendasi
                 </div>

            </div>

            <div class="border-b-1 border-gray-400 mt-2 mb-4"></div>

            <div class="px-4">
                <div x-show= "open==='map'"  class="relative">
                    <div class="absolute top-1 right-5 z-20">
                        <div class="bg-white px-2 rounded mt-1 w-64" x-data=" {legend:false}">
                            <div :class="{'w-full': legend, 'w-64': !legend}" class=" flex justify-between   items-center cursor-pointer" @click="legend=!legend ">
                                <label  class="w-full ml-1  font-bold text-gray-500">Legenda</label>
                                <div>
                                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-0': legend, 'rotate-180 mr-4 ': !legend}" class="inline w-4 h-4 items-center transition-transform duration-200 transform "><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </div>
                            </div>
                            <div class="px-4" x-show="legend">
                                <div class="border-b border-gray-300 py-2" x-data=" {open:true}">
                                    <div  class=" flex items-center">

                                        <div class=" flex justify-between w-full items-center cursor-pointer" @click="open=!open ">
                                            <label  class="w-full ml-1 text-sm text-gray-500">Kawasan Hutan</label>
                                            <div>
                                                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-0': open, 'rotate-180': !open}" class="inline w-4 h-4 items-center mt-1 ml-1 transition-transform duration-200 transform "><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="pl-5 " x-show="open" style="display: none !important;">
                                        <div class="flex items-center rounded mt-2">
                                            <div class="w-4 h-3 ml-2" style="background-color: #ad40ff"></div>
                                            <label for="asetpemerintahdaerah" class="w-full ml-1  text-sm text-gray-500">Hutan Konservasi</label>
                                        </div>
                                        <div class="flex items-center rounded mt-2">
                                            <div class="w-4 h-3 ml-2" style="background-color: #01ad00"></div>
                                            <label for="klaimhutanperhutani" class="w-full ml-1  text-sm text-gray-500">Hutan Lindung</label>
                                        </div>
                                        <div class="flex items-center rounded mt-2">
                                            <div class="w-4 h-3 ml-2" style="background-color: #ff5eff"></div>
                                            <label for="konsesihutanproduksi" class="w-full ml-1  text-sm text-gray-500">Hutan Produksi Konversi</label>
                                        </div>
                                        <div class="flex items-center rounded mt-2">
                                            <div class="w-4 h-3 ml-2" style="background-color: #8af200"></div>
                                            <label for="penetapanhutanlindung" class="w-full ml-1  text-sm text-gray-500">Hutan Produksi Terbatas</label>
                                        </div>
                                        <div class="flex items-center rounded mt-2">
                                            <div class="w-4 h-3 ml-2" style="background-color:  #ffff00"></div>
                                            <label for="penetapanhutanproduksi" class="w-full ml-1  text-sm text-gray-500">Hutan Produksi Tetap</label>
                                        </div>
                                        <div class="flex items-center rounded mt-2">
                                            <div class="w-4 h-3 ml-2" style="background-color:  #0000ff"></div>
                                            <label for="zonaotoritapariwisata" class="w-full ml-1  text-sm text-gray-500">Air/Danau/Laut</label>
                                        </div>
                                        <div class="flex items-center rounded mt-2">
                                            <div class="w-4 h-3 ml-2" style="background-color:  #fef9f1"></div>
                                            <label for="pelepasankawasanhutan" class="w-full ml-1  text-sm text-gray-500">Areal Penggunaan Lain</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-b border-gray-300 py-2" x-data=" {open:true}">
                                    <div  class=" flex items-center">

                                        <div class=" flex justify-between w-full items-center cursor-pointer" @click="open=!open ">
                                            <label  class="w-full ml-1  text-sm text-gray-500">Izin / Hak Atas Tanah</label>
                                            <div>
                                                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-0': open, 'rotate-180': !open}" class="inline w-4 h-4 items-center mt-1 ml-1 transition-transform duration-200 transform "><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="pl-5 " x-show="open" style="display: none !important;">
                                        <div class="flex items-center rounded mt-2">
                                            <div class="w-4 h-3 ml-2" style="background-color: #3C7A89"></div>
                                            <label for="asetpemerintahdaerah" class="w-full ml-1  text-sm text-gray-500">HGU</label>
                                        </div>
                                        <div class="flex items-center rounded mt-2">
                                            <div class="w-4 h-3 ml-2" style="background-color: #BA2D0B"></div>
                                            <label for="klaimhutanperhutani" class="w-full ml-1  text-sm text-gray-500">PBPH-HT</label>
                                        </div>
                                        <div class="flex items-center rounded mt-2">
                                            <div class="w-4 h-3 ml-2" style="background-color: #B0A084"></div>
                                            <label for="konsesihutanproduksi" class="w-full ml-1  text-sm text-gray-500">PBPH-HA</label>
                                        </div>
                                        <div class="flex items-center rounded mt-2">
                                            <div class="w-4 h-3 ml-2" style="background-color: #16DB65"></div>
                                            <label for="penetapanhutanlindung" class="w-full ml-1  text-sm text-gray-500">PBPH-RE</label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="profilemap" class="min-h-screen w-full mb-4 relative z-10"></div>

                </div>
                <div x-show= "open==='sejarah1'" style="display: none !important" class="prose max-w-none">
                    {!! $data->sejarahpenguasaan !!}
                </div>
                <div x-show= "open==='sejarah2'" style="display: none !important" class="prose max-w-none">
                    {!! $data->sejarahhgu !!}
                </div>
                <div x-show= "open==='analisishukum'" style="display: none !important" class="prose max-w-none">
                    {!! $data->analisishukum !!}
                </div>
                {{-- <div x-show= "open==='komoditas'" style="display: none !important" class="prose max-w-none">

                </div> --}}
                <div x-show= "open==='rekomendasi'" style="display: none !important" class="prose max-w-none">
                    {!! $data->Rekomendasi !!}
                </div>
            </div>
        </div>
    </div>

    @include('partials.frontendFooter')

@endsection

@push('scripts')
        <script>
           var map = L.map('profilemap', {
                center: [0.7893, 118.5213],
                zoom: 4,
                gestureHandling: true,
                zoomControl: false
            });


            var planet = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}.png', {
                detectRetina: true,
                attribution: 'KPA & Auriga',
                maxNativeZoom: 17
            }).addTo(map);

            var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
                maxZoom: 20,
                subdomains:['mt0','mt1','mt2','mt3'],
                attribution: 'KPA & Auriga'
            })

            var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                detectRetina: true,
                attribution: 'KPA & Auriga',
                maxNativeZoom: 17
            });

            var forestADM = L.tileLayer.wms('https://geoserver.kpa.or.id/geoserver/wms', {
                    layers: '	lpra:forest_estate_adm',
                    transparent: true,
                    format: 'image/png'
            })

            var hgu = L.tileLayer.wms('https://geoserver.kpa.or.id/geoserver/wms', {
                    layers: 'lpra:hgu_bpn_2019',
                    transparent: true,
                    format: 'image/png'
            })

            var IUPHHK_adm = L.tileLayer.wms('https://geoserver.kpa.or.id/geoserver/wms', {
                    layers: 'lpra:iuphhk_adm',
                    transparent: true,
                    format: 'image/png'
            })




            var baseLayers = {
                "OpenStreetMap": osm,
                "Esri Satellite": planet,
                "Google Sattelite" : googleSat
            };

            var overlays = {
                "Kawasan Hutan": forestADM,
                "HGU" : hgu,
                "PBPH ": IUPHHK_adm,
            };

            L.control.layers(baseLayers, overlays, {position: 'topleft'}).addTo(map);


            $.ajax('https://geoserver.kpa.or.id/geoserver/wfs',{
                type: 'GET',
                data: {
                    service: 'WFS',
                    version: '1.1.0',
                    request: 'GetFeature',
                    typename: 'lpra:20231201_LPRA_11_45',
                    CQL_FILTER: "orig_fid = '"+ {{$data->fid}} +"'",
                    srsname: 'EPSG:4326',
                    outputFormat: 'text/javascript',
                },
                    dataType: 'jsonp',
                    jsonpCallback:'callback:handleJson',
                    jsonp:'format_options'
            });
            function handleJson(data) {
                selectedArea = L.geoJson(data).addTo(map);
            map.fitBounds(selectedArea.getBounds());
            }
        </script>
@endpush

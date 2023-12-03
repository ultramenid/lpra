<div class="absolute top-1 right-5 z-20">
    <div class="bg-white bg-opacity-50 px-2 rounded mt-1 w-96 py-2 " x-data=" {legend:true}">
        <div :class="{'w-full': legend, 'w-96': !legend}" class=" flex justify-between   items-center cursor-pointer" @click="legend=!legend ">
            <label  class="w-full ml-4 mt-2 font-bold ">Statistik</label>
            <div>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-0': legend, 'rotate-180 mr-4 ': !legend}" class="inline w-4 h-4 items-center transition-transform duration-200 transform "><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </div>
        </div>
        <div class="px-4" x-show="legend" :class="{'block': legend, 'hidden': !legend}">
           <h1 class="mt-4 text-2xl">{{$totallpra}} LPRA</h1>
           <div class="">

           </div>
        </div>

    </div>

</div>

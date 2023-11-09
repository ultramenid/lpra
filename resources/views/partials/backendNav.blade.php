<div class="border-b border-gray-300 bg-gray-100 dark:bg-newgray-900 bg-opacity-90 dark:border-opacity-20  z-10 ">
    <div class="max-w-6xl mx-auto px-6 "  x-data="{ pages: false }">
        <nav class="-mb-px flex space-x-4 text-sm leading-5 overflow-x-auto scrollbar-hide text-gray-500">
            <div class="hover:bg-gray-200 dark:hover:bg-newgray-700 py-3 px-2 rounded @if($nav == 'dashboard' )border-b-2  dark:border-gray-300 border-newgray-900 @endif ">
                <a href="{{url('/cms/dashboard')}}" class=" px-0.5  @if($nav == 'dashboard' )   text-newgray-900 dark:text-gray-300 @endif   hover:text-newgray-900 dark:hover:text-gray-300 cursor-pointer" >Dashboard</a>
            </div>

            <div @click.away="open = false" class="cursor-pointer flex-col flex hover:bg-gray-200 dark:hover:bg-newgray-700 py-3  rounded @if($nav == 'pages' )border-b-2  dark:border-gray-300 border-newgray-900 @endif" x-data="{ open: false }">
                <button @click="open = !open" class="cursor-pointer  flex hover:bg-gray-200 dark:hover:bg-newgray-700  rounded ">
                    <a  class="px-2 hover:text-newgray-900 dark:hover:text-gray-300 cursor-pointer inline-flex   items-center">Pages</a>
                  <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 items-center mt-1 ml-1 transition-transform duration-200 transform "><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <div x-show="open" style="display: none !important;" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute  w-full mt-8 origin-top-right  shadow-lg md:w-48 z-20">
                  <div class="  bg-gray-100 dark:bg-newgray-700   shadow ">
                        <button   class="flex flex-row items-center px-4 py-2 ">
                            <a href="{{url('/cms/addabout')}}" class=" ">about</a>
                        </button>

                  </div>

                </div>
            </div>

            <div class="hover:bg-gray-200 dark:hover:bg-newgray-700 py-3 px-2 rounded @if($nav == 'profiles' )border-b-2  dark:border-gray-300 border-newgray-900 @endif ">
                <a href="{{url('/cms/profiles')}}" class=" px-0.5  @if($nav == 'profiles' )   text-newgray-900 dark:text-gray-300 @endif   hover:text-newgray-900 dark:hover:text-gray-300 cursor-pointer" >Profiles</a>
            </div>

            <div class="hover:bg-gray-200 dark:hover:bg-newgray-700 py-3 px-2 rounded @if($nav == 'updates' )border-b-2  dark:border-gray-300 border-newgray-900 @endif ">
                <a href="{{url('/cms/updates')}}" class=" px-0.5  @if($nav == 'updates' )   text-newgray-900 dark:text-gray-300 @endif   hover:text-newgray-900 dark:hover:text-gray-300 cursor-pointer" >Updates</a>
            </div>

            <div class="hover:bg-gray-200 dark:hover:bg-newgray-700 py-3 px-2 rounded @if($nav == 'settings' )border-b-2  dark:border-gray-300 border-newgray-900 @endif">
                <a href="{{url('/cms/settings')}}" class=" px-0.5 py-3  @if($nav == 'settings' )  text-newgray-900:text-gray-300 @endif hover:text-newgray-900 dark:hover:text-gray-300 cursor-pointer   " >Settings</a>
            </div>

        </nav>
    </div>
</div>

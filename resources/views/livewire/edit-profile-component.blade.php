<div class="">
    <livewire:toastr />
    <div class=" border-b border-gray-300 dark:border-opacity-20 ">
        <div class="max-w-6xl mx-auto px-6  flex justify-between  py-16">
            <h1 class="sm:text-4xl text-xl text-newgray-900 dark:text-newgray-300 font-semibold ">New profile</h1>
            <div class="z-30">
                <button wire:loading.remove wire:target='storeProfile'  wire:click='storeProfile' id="btnStore" class="inline-flex sm:px-16 px-8 sm:py-2 py-1 rounded dark:hover:bg-newgray-900 dark:hover:border-gray-200 dark:hover:text-gray-200 hover:bg-white hover:text-newgray-900 border hover:border-newgray-900 bg-newgray-900 dark:bg-gray-100 text-newgray-100 dark:text-newgray-900">
                    Save
                </button>
                <button wire:loading wire:target='storeProfile' id="btnStore" class="inline-flex sm:px-16 px-8 sm:py-2 py-1 rounded dark:hover:bg-newgray-900 dark:hover:border-gray-200 dark:hover:text-gray-200 hover:bg-white hover:text-newgray-900 border hover:border-newgray-900 bg-newgray-900 dark:bg-gray-100 text-newgray-100 dark:text-newgray-900">
                    <svg class="animate-spin mx-auto h-6 w-6 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 md:px-8  py-8 min-h-screen" x-data="{ tabs: 'english' }">



    <div class="grid grid-cols-12 gap-x-4" >
        <div class= "sm:col-span-3 col-span-12" >
            <div class="">
                <div class="w-full border border-gray-300 dark:border-opacity-20 rounded px-6 mb-6 ">

                    <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4 mt-6">Status</h1>
                    <label class="w-full"  >
                        <select wire:model='isactive' class=" mb-6 bg-gray-100 dark:bg-newgray-700 text-newgray-700 dark:text-gray-300 rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </label>


                </div>


            </div>
        </div>
        <div class="sm:col-span-9 col-span-12 " >
            <div class="w-full border border-gray-300 dark:border-opacity-20 rounded px-6 py-6 mb-6">
                <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-6">Image </h1>
                <div class="flex items-center justify-center px-2 py-2 border border-dashed border-gray-400 rounded" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false; progress = 5" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <label class="cursor-pointer">
                        @if ($uphoto)
                                @if ($photo)
                                    <img src="{{$photo->temporaryUrl()}}" alt="" class=" mx-auto w-full rounded ">
                                @else
                                    <img src="{{ asset('/storage/photos/shares/'.$uphoto)  }}" alt="" class=" mx-auto w-full rounded ">
                                @endif
                            @endif
                        <input type='file' class="hidden" wire:model='photo' accept="image/*" />
                        <p wire:loading.remove wire:target="photo" class="text-xs text-center text-gray-400 mt-2">Clik to upload image</p>
                        <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded flex justify-center">
                            <span class="text-xs text-black dark:text-white" x-text="'Uploading ' + progress + '%'"></span>
                    </div>
                    </label>
                </div>
            </div>


            {{-- tab english --}}
            <div x-show="tabs==='english'" x-cloak style="display: none !important">
                <div class="w-full border border-gray-300 dark:border-opacity-20 rounded px-6 py-6 mb-6" x-data="{count:0}">

                    <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4">Profile</h1>
                    <label class="w-full">
                        <div   wire:click='toogleProfile'   class="cursor-pointer bg-gray-100 dark:bg-newgray-700 text-newgray-700 dark:text-gray-300 rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" >{{$fid}} - {{$desa_kel}} - {{$luas}}ha</div>
                    </label>

                    @if ($isProfile)
                      <div class="shadow px-4 py-4 flex flex-col   bg-black absolute z-20 w-96" >
                          <input   wire:model='chooseprofile' type="text" name="" id="" class="w-full mb-2  bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Provinsi. . .">

                          @foreach ($dataprofiles as $item )
                              <a wire:click="selectProfile('{{ $item->orig_fid }}','{{ $item->luas_ha }}','{{ $item->subjek_kk }}','{{ $item->provinsi }}','{{ $item->kec }}','{{ $item->kab_kota }}','{{ $item->desa_kel }}', '{{ $item->tata_guna }}', '{{$item->tipologi}}', '{{$item->organisasi}}')" class="text-white py-1 hover:bg-gray-700 px-4">{{$item->orig_fid}} - {{$item->desa_kel}} - {{$item->luas_ha}}ha</a>
                          @endforeach
                      </div>
                    @endif

                    <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4 mt-6">Lokasi</h1>
                    <input  type="text" class="bg-gray-100 dark:bg-newgray-700 text-newgray-700 dark:text-gray-300 rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='lokasi' >

                    <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4 mt-6">Luas garapan</h1>
                    <input  type="text" class="bg-gray-100 dark:bg-newgray-700 text-newgray-700 dark:text-gray-300 rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='luas' >

                    <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4 mt-6">Organisasi</h1>
                    <input  type="text" class="bg-gray-100 dark:bg-newgray-700 text-newgray-700 dark:text-gray-300 rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='organisasi' >

                    <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4 mt-6">Jumlah Petani</h1>
                    <input  type="text" class="bg-gray-100 dark:bg-newgray-700 text-newgray-700 dark:text-gray-300 rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='jumlahpetani' >

                    <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4 mt-6">Penggunaan Tanah</h1>
                    <input  type="text" class="bg-gray-100 dark:bg-newgray-700 text-newgray-700 dark:text-gray-300 rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='tata_guna' >

                    <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4 mt-6">Tahapan</h1>
                    <input  type="text" class="bg-gray-100 dark:bg-newgray-700 text-newgray-700 dark:text-gray-300 rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='tipologi' >






                </div>

                <div class="w-full border border-gray-300 dark:border-opacity-20  px-6 py-6 mb-6">
                    <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4">Sejarah Konflik</h1>
                    <div class="w-full  "
                        wire:ignore
                        x-init="
                        tinymce.init({
                            selector: '#sejarahperkebunan',
                            height : '40vh',
                            relative_urls : false,
                                remove_script_host : false,
                                convert_urls : true,
                                content_style: 'body {  background-color: #f4f5f7; }',
                                plugins:
                                    'lists advlist autolink  link image  charmap    anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table emoticons template  help',

                                    toolbar: ' fullscreen fontfamily fontsizeselect fontsize   bold italic underline forecolor backcolor |  link image  |  bullist numlist   alignleft aligncenter alignright alignjustify outdent indent| ' +
                                            ' | media  | ' +
                                            ' backcolor emoticons |undo redo  help',
                                    menu: {
                                    favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
                                    },
                                    menubar: ' file edit view insert format tools table help',
                                    file_picker_callback : function(callback, value, meta) {
                                        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                        var cmsURL = '/cms/' + 'lpra-filemanager?editor=' + meta.fieldname;
                                        if (meta.filetype == 'image') {
                                            cmsURL = cmsURL + '&type=Images';
                                        } else {
                                            cmsURL = cmsURL + '&type=Files';
                                        }
                                        tinyMCE.activeEditor.windowManager.openUrl({
                                            url : cmsURL,
                                            title : 'Filemanager',
                                            width : x * 0.8,
                                            height : y * 0.8,
                                            resizable : 'yes',
                                            close_previous : 'no',
                                            onMessage: (api, message) => {
                                            callback(message.content);
                                            }
                                        });
                                    },
                                    setup: function(editor) {
                                        editor.on('change', function(e) {
                                            @this.set('sejarahperkebunan', editor.getContent());
                                    });
                                }
                        });">
                        <textarea rows="20" id="sejarahperkebunan" name="sejarahperkebunan"  wire:model.defer='sejarahperkebunan' required></textarea>
                    </div>
                </div>

                <div class="w-full border border-gray-300 dark:border-opacity-20  px-6 py-6 mb-6">
                    <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4">Sejarah Penguasaan Tanah Masyarakat</h1>
                    <div class="w-full  "
                        wire:ignore
                        x-init="
                        tinymce.init({
                            selector: '#sejarahpenguasaan',
                            height : '40vh',
                            relative_urls : false,
                                remove_script_host : false,
                                convert_urls : true,
                                content_style: 'body {  background-color: #f4f5f7; }',
                                plugins:
                                    'lists advlist autolink  link image  charmap    anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table emoticons template  help',

                                    toolbar: ' fullscreen fontfamily fontsizeselect fontsize   bold italic underline forecolor backcolor |  link image  |  bullist numlist   alignleft aligncenter alignright alignjustify outdent indent| ' +
                                            ' | media  | ' +
                                            ' backcolor emoticons |undo redo  help',
                                    menu: {
                                    favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
                                    },
                                    menubar: ' file edit view insert format tools table help',
                                    file_picker_callback : function(callback, value, meta) {
                                        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                        var cmsURL = '/cms/' + 'lpra-filemanager?editor=' + meta.fieldname;
                                        if (meta.filetype == 'image') {
                                            cmsURL = cmsURL + '&type=Images';
                                        } else {
                                            cmsURL = cmsURL + '&type=Files';
                                        }
                                        tinyMCE.activeEditor.windowManager.openUrl({
                                            url : cmsURL,
                                            title : 'Filemanager',
                                            width : x * 0.8,
                                            height : y * 0.8,
                                            resizable : 'yes',
                                            close_previous : 'no',
                                            onMessage: (api, message) => {
                                            callback(message.content);
                                            }
                                        });
                                    },
                                    setup: function(editor) {
                                        editor.on('change', function(e) {
                                            @this.set('sejarahpenguasaan', editor.getContent());
                                    });
                                }
                        });">
                        <textarea rows="20" id="sejarahpenguasaan" name="sejarahpenguasaan"  wire:model.defer='sejarahpenguasaan' required></textarea>
                    </div>
                </div>

                <div class="w-full border border-gray-300 dark:border-opacity-20  px-6 py-6 mb-6">
                    <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4">Upaya Masyarakat dan Pemerintah/Perkembangan Advokasi</h1>
                    <div class="w-full  "
                        wire:ignore
                        x-init="
                        tinymce.init({
                            selector: '#upayadanperkembangan',
                            height : '40vh',
                            relative_urls : false,
                                remove_script_host : false,
                                convert_urls : true,
                                content_style: 'body {  background-color: #f4f5f7; }',
                                plugins:
                                    'lists advlist autolink  link image  charmap    anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table emoticons template  help',

                                    toolbar: ' fullscreen fontfamily fontsizeselect fontsize   bold italic underline forecolor backcolor |  link image  |  bullist numlist   alignleft aligncenter alignright alignjustify outdent indent| ' +
                                            ' | media  | ' +
                                            ' backcolor emoticons |undo redo  help',
                                    menu: {
                                    favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
                                    },
                                    menubar: ' file edit view insert format tools table help',
                                    file_picker_callback : function(callback, value, meta) {
                                        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                        var cmsURL = '/cms/' + 'lpra-filemanager?editor=' + meta.fieldname;
                                        if (meta.filetype == 'image') {
                                            cmsURL = cmsURL + '&type=Images';
                                        } else {
                                            cmsURL = cmsURL + '&type=Files';
                                        }
                                        tinyMCE.activeEditor.windowManager.openUrl({
                                            url : cmsURL,
                                            title : 'Filemanager',
                                            width : x * 0.8,
                                            height : y * 0.8,
                                            resizable : 'yes',
                                            close_previous : 'no',
                                            onMessage: (api, message) => {
                                            callback(message.content);
                                            }
                                        });
                                    },
                                    setup: function(editor) {
                                        editor.on('change', function(e) {
                                            @this.set('upayadanperkembangan', editor.getContent());
                                    });
                                }
                        });">
                        <textarea rows="20" id="upayadanperkembangan" name="upayadanperkembangan"  wire:model.defer='upayadanperkembangan' required></textarea>
                    </div>
                </div>

                <div class="w-full border border-gray-300 dark:border-opacity-20  px-6 py-6 mb-6">
                    <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4">Analisis Hukum</h1>
                    <div class="w-full  "
                        wire:ignore
                        x-init="
                        tinymce.init({
                            selector: '#analisishukum',
                            height : '40vh',
                            relative_urls : false,
                                remove_script_host : false,
                                convert_urls : true,
                                content_style: 'body {  background-color: #f4f5f7; }',
                                plugins:
                                    'lists advlist autolink  link image  charmap    anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table emoticons template  help',

                                    toolbar: ' fullscreen fontfamily fontsizeselect fontsize   bold italic underline forecolor backcolor |  link image  |  bullist numlist   alignleft aligncenter alignright alignjustify outdent indent| ' +
                                            ' | media  | ' +
                                            ' backcolor emoticons |undo redo  help',
                                    menu: {
                                    favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
                                    },
                                    menubar: ' file edit view insert format tools table help',
                                    file_picker_callback : function(callback, value, meta) {
                                        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                        var cmsURL = '/cms/' + 'lpra-filemanager?editor=' + meta.fieldname;
                                        if (meta.filetype == 'image') {
                                            cmsURL = cmsURL + '&type=Images';
                                        } else {
                                            cmsURL = cmsURL + '&type=Files';
                                        }
                                        tinyMCE.activeEditor.windowManager.openUrl({
                                            url : cmsURL,
                                            title : 'Filemanager',
                                            width : x * 0.8,
                                            height : y * 0.8,
                                            resizable : 'yes',
                                            close_previous : 'no',
                                            onMessage: (api, message) => {
                                            callback(message.content);
                                            }
                                        });
                                    },
                                    setup: function(editor) {
                                        editor.on('change', function(e) {
                                            @this.set('analisishukum', editor.getContent());
                                    });
                                }
                        });">
                        <textarea rows="20" id="analisishukum" name="analisishukum"  wire:model.defer='analisishukum' required></textarea>
                    </div>
                </div>

                <div class="w-full border border-gray-300 dark:border-opacity-20  px-6 py-6 mb-6">
                    <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4">Komoditas</h1>
                    <div class="w-full  "
                        wire:ignore
                        x-init="
                        tinymce.init({
                            selector: '#kesimpulan',
                            height : '40vh',
                            relative_urls : false,
                                remove_script_host : false,
                                convert_urls : true,
                                content_style: 'body {  background-color: #f4f5f7; }',
                                plugins:
                                    'lists advlist autolink  link image  charmap    anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table emoticons template  help',

                                    toolbar: ' fullscreen fontfamily fontsizeselect fontsize   bold italic underline forecolor backcolor |  link image  |  bullist numlist   alignleft aligncenter alignright alignjustify outdent indent| ' +
                                            ' | media  | ' +
                                            ' backcolor emoticons |undo redo  help',
                                    menu: {
                                    favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
                                    },
                                    menubar: ' file edit view insert format tools table help',
                                    file_picker_callback : function(callback, value, meta) {
                                        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                        var cmsURL = '/cms/' + 'lpra-filemanager?editor=' + meta.fieldname;
                                        if (meta.filetype == 'image') {
                                            cmsURL = cmsURL + '&type=Images';
                                        } else {
                                            cmsURL = cmsURL + '&type=Files';
                                        }
                                        tinyMCE.activeEditor.windowManager.openUrl({
                                            url : cmsURL,
                                            title : 'Filemanager',
                                            width : x * 0.8,
                                            height : y * 0.8,
                                            resizable : 'yes',
                                            close_previous : 'no',
                                            onMessage: (api, message) => {
                                            callback(message.content);
                                            }
                                        });
                                    },
                                    setup: function(editor) {
                                        editor.on('change', function(e) {
                                            @this.set('kesimpulan', editor.getContent());
                                    });
                                }
                        });">
                        <textarea rows="20" id="kesimpulan" name="kesimpulan"  wire:model.defer='kesimpulan' required></textarea>
                    </div>
                </div>
                <div class="w-full border border-gray-300 dark:border-opacity-20  px-6 py-6 mb-6">
                    <h1 class="text-2xl font-semibold  text-newbg-newgray-900 dark:text-gray-300 mb-4">Rekomendasi</h1>
                    <div class="w-full  "
                        wire:ignore
                        x-init="
                        tinymce.init({
                            selector: '#rekomendasi',
                            height : '40vh',
                            relative_urls : false,
                                remove_script_host : false,
                                convert_urls : true,
                                content_style: 'body {  background-color: #f4f5f7; }',
                                plugins:
                                    'lists advlist autolink  link image  charmap    anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table emoticons template  help',

                                    toolbar: ' fullscreen fontfamily fontsizeselect fontsize   bold italic underline forecolor backcolor |  link image  |  bullist numlist   alignleft aligncenter alignright alignjustify outdent indent| ' +
                                            ' | media  | ' +
                                            ' backcolor emoticons |undo redo  help',
                                    menu: {
                                    favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
                                    },
                                    menubar: ' file edit view insert format tools table help',
                                    file_picker_callback : function(callback, value, meta) {
                                        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                        var cmsURL = '/cms/' + 'lpra-filemanager?editor=' + meta.fieldname;
                                        if (meta.filetype == 'image') {
                                            cmsURL = cmsURL + '&type=Images';
                                        } else {
                                            cmsURL = cmsURL + '&type=Files';
                                        }
                                        tinyMCE.activeEditor.windowManager.openUrl({
                                            url : cmsURL,
                                            title : 'Filemanager',
                                            width : x * 0.8,
                                            height : y * 0.8,
                                            resizable : 'yes',
                                            close_previous : 'no',
                                            onMessage: (api, message) => {
                                            callback(message.content);
                                            }
                                        });
                                    },
                                    setup: function(editor) {
                                        editor.on('change', function(e) {
                                            @this.set('rekomendasi', editor.getContent());
                                    });
                                }
                        });">
                        <textarea rows="20" id="rekomendasi" name="rekomendasi"  wire:model.defer='rekomendasi' required></textarea>
                    </div>
                </div>
            </div>






        </div>
    </div>
    </div>
</div>

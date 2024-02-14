<div class="max-w-5xl px-4  mx-auto mt-4">
    <div class="grid md:grid-cols-3 grid-cols-1 gap-10 md:mt-12 mt-6">
        <!-- card -->
        @foreach ($updates as $item)
        <div class="flex flex-col  text-auriga-biru">
            <img
            class="md:w-80 w-full h-52 object-cover"
            src="{{ asset('storage/photos/shares/'.$item->img) }}"
            alt="">

            <a href="{{ url('update', [$item->id ,$item->slug]) }}" class="md:mt-6 mt-3 md:text-2xl text-xl font-bold ">{{$item->titleID}}
            </a>
            <div class="md:mt-6 mt-3 ">
                <a class="font-bold">{{ \Carbon\Carbon::parse($item->publishdate)->format('d F Y')}}</a><span> | </span><a>{{$item->descID}}</a>
            </div>
       </div>
        @endforeach
     </div>
     @if ($updates)
        {{ $updates->links('livewire.pagination') }}
        @endif
</div>

@section('title') Hachimaru @stop
<div class="h-full">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
        @foreach ($images as $image)
            <div class="rounded-xl overflow-hidden hover:scale-[1.1] duration-300 ease-in-out group">
                <img src="{{ asset('storage/assets/' . $image->getFilename()) }}" alt="K8.io asset">
                <div class="w-full">
                    <a download="{{ $image->getFilename() }}" href="{{ url('storage/assets/' . $image->getFilename()) }}" class="bg-indigo-600 duration-300 ease-in-out group-hover:bg-indigo-700 text-center font-semibold text-white w-full p-4 block">
                        {{ __('Download') }}
                    </a>
                </div>
            </div>
        @endforeach
        
    </div>
</div>
@section('title') News @stop
<div>
    {{-- news slider --}}
    <div wire:ignore id="newsSlider" class="glide rounded-2xl overflow-hidden mb-10">
        <div class="glide__track" data-glide-el="track">
            <div class="glide__slides text-slate-100">
                @foreach ($newsSlider as $news)
                    <div class="glide__slide relative">
                        <div class="flex flex-col lg:flex-row gap-10">
                            <div class="w-100 lg:w-[65%]">
                                <img src="{{ url('storage/article/', $news->image) }}" alt="{{ $news->title }}" class="rounded-xl">
                            </div>
                            <div class="w-100 lg:w-[35%] space-y-5">
                                <h1 class="text-slate-200 text-3xl font-semibold">{{ $news->title }}</h1>
                                <p class="text-slate-400">
                                    {{ $news->short_description }}
                                </p>
                                <div class="flex">
                                    <x-href href="{{ route('news.single.index', $news->slug) }}" class="!float-none">{{ __('Read more') }}</x-href>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- news categories --}}
    <div class="mb-20">
        {{-- <div class="grid grid-cols-1 sm:grid-cols-2 gap-8"> --}}
        <div class="flex gap-2">

            <div class="md:hidden block w-full">
                <p class="text-slate-200 font-semibold text-xl pb-2">Categories</p>
                <select wire:ignore id="select" class="bg-slate-900 border-0 w-full text-slate-200 py-3 px-5">
                    @foreach ($newsCategories as $category)
                        <option value="{{ route('news.category.index', $category->slug) }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            @foreach ($newsCategories as $category)
                <div wire:ignore class="md:block hidden bg-slate-900 flex-1 p-2 rounded-md hover:bg-slate-800 duration-300 ease-in-out cursor-pointer">
                    <div class="flex justify-between items-center relative">
                        <a class="absolute top-0 bottom-0 right-0 left-0" href="{{ route('news.category.index', $category->slug) }}"></a>
                        <div class="flex w-full">
                            <div>
                                @if($category->image != null)
                                    <img src="{{ url('storage/article_category/', $category->image) }}" alt="{{ __($category->title) }}" class="w-20">
                                @else
                                    <div class="py-6"></div>
                                @endif
                            </div>
                            <div class="flex items-center justify-center w-full">
                                <p class="text-slate-200 text-base font-semibold text-center">
                                    {{ __($category->title) }}
                                </p>
                            </div>
                        </div>
                        {{-- <div class="pe-4 hover:pe-0 duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="text-slate-500 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </div> --}}
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>

    {{-- news --}}
    <div class="mb-10">
        <h1 class="text-slate-200 font-semibold text-3xl mb-5">{{ __('Trending') }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-10">
            @foreach ($newsAll as $news)
            <div class="flex flex-col gap-4 bg-slate-900 hover:bg-slate-800 duration-300 ease-in-out p-5 rounded-lg cursor-pointer relative">
                <a href="{{ route('news.single.index', $news->slug) }}" class="absolute top-0 bottom-0 right-0 left-0"></a>
                <div>
                    <img src="{{ url('storage/article/', $news->image) }}" alt="{{ $news->title }}" class="rounded-lg">
                </div>
                <div class="flex flex-col gap-4">
                    <div class="flex justify-between">
                        <div class="relative">
                            <div class="z-10 absolute flex">
                                @foreach ($news->categories as $category)
                                    <span class="text-slate-500 text-sm me-1 rounded-sm">
                                        <a href="{{ route('news.category.index', $category->slug) }}" class=" bg-slate-800 px-2 py-1 rounded-sm">{{ $category->title }}</a>
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <span class="text-sm text-slate-500">
                                @if(app()->getLocale() == 'jp') 
                                    {{ Carbon\Carbon::parse($news->updated_at->locale('ja-JP'))->diffForHumans() }}
                                @else
                                    {{ Carbon\Carbon::parse($news->updated_at)->diffForHumans() }}
                                @endif
                            </span>
                        </div>
                    </div>
                    <h1 class="text-slate-200 font-semibold text-xl leading-normal mt-2">{{ $news->title }}</h1>
                    <p class="text-slate-400">
                        {{ Str::limit($news->short_description, 150) }}
                    </p>
                    <a href="" class="text-indigo-600">{{ __('Read more') }}</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-10">
            <div class="flex justify-center">
                <x-button wire:click="loadMore" class="!float-none">{{ __('Load more') }}</x-button>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready( function() {
        $('#select').change( function() {
            location.href = $(this).val();
        });
    });
</script>

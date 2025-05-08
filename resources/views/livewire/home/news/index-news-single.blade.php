@section('title') {{$title}} @stop
@section('description') {{ Str::words(strip_tags($description), 35) }} @stop
@section('image') {{ url('storage/article', $image) }} @stop
<div>
    <div class="w-full max-w-[720px] mx-auto">
        <div class="mb-10">
            <a wire:navigate href="{{ route('news.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10 text-slate-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </a>
        </div>
        <div class="flex flex-col gap-5">
            <div>
                <div class="mb-5">
                    <span class="text-slate-400 font-semibold">
                        @if(app()->getLocale() == 'jp')
                            {{ Carbon\Carbon::parse($created_at)->locale('ja-JP')->isoFormat('LL') }}
                        @else
                            {{ Carbon\Carbon::parse($created_at)->translatedFormat('d F Y') }}
                        @endif
                    </span>
                </div>
                <img src="{{ url('storage/article/', $image) }}" alt="{{ $title }}" loading="lazy" class="w-full rounded-xl">
            </div>
            <div>
                <div class="mb-10 flex flex-col">
                    <h1 class="text-slate-200 font-semibold text-4xl leading-[3rem]">{{ $title }}</h1>
                    <div class="mt-5">
                        @foreach ($categories as $category)
                            <a href="{{ route('news.category.index', $category->slug) }}" class="bg-slate-900 text-sm text-slate-500 px-3 py-1 rounded-sm">{{ $category->title }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="text-slate-400 text-lg news-description leading-8">
                    {!! $description !!}
                </div>
                <div class="mt-20">
                    @foreach ($tags as $tag)
                        <a href="" class="bg-slate-900 text-sm text-slate-500 px-3 py-1 rounded-sm">{{ $tag->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="mt-40">
        <h1 class="text-slate-200 font-semibold text-3xl mb-10">{{ __('Recommended to read') }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($recommendedNews as $news)
                <div class="flex flex-col gap-4 bg-slate-900 hover:bg-slate-800 duration-300 ease-in-out p-5 rounded-lg cursor-pointer relative">
                    <a wire:navigate href="{{ route('news.single.index', $news->slug) }}" class="absolute top-0 bottom-0 right-0 left-0"></a>
                    <div>
                        <img src="{{ url('storage/article/', $news->image) }}" alt="{{ $news->title }}" class="rounded-lg" loading="lazy">
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
                                    {{ Carbon\Carbon::parse($news->updated_at->locale('ja-JP'))->diffForHumans() }}
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
    </div>
</div>

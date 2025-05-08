@section('title') News Category @stop
<div>
    <div class="mb-10">
        <div class="mb-10">
            @if($slug != "how-to-guides")
                <h1 class="text-slate-200 font-semibold text-3xl">{{ __($title) }}</h1>
            @endif
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
            @foreach ($newsAll as $news)
                <div class="flex flex-col gap-4 bg-slate-900 hover:bg-slate-800 duration-300 ease-in-out p-5 rounded-lg cursor-pointer relative">
                    <a href="{{ route('news.single.index', $news->slug) }}" class="absolute top-0 bottom-0 right-0 left-0"></a>
                    <div>
                        <img src="{{ url('storage/article/', $news->image) }}" alt="{{ $news->title }}" class="rounded-lg">
                    </div>
                    <div class="flex flex-col gap-4">
                        <div class="flex justify-between">
                            <div>
                                @foreach ($news->categories as $category)
                                    <span class="bg-slate-800 text-slate-500 text-sm px-2 py-1 rounded-sm">{{ $category->title }}</span>
                                @endforeach
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
                        <h1 class="text-slate-200 font-semibold text-2xl leading-tight mt-2">{{ $news->title }}</h1>
                        <p class="text-slate-400">
                            {{ Str::limit($news->short_description, 150) }}
                        </p>
                        <a href="" class="text-indigo-600">{{ __('Read more') }}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="w-full">
            <div class="w-[170px] mx-auto">
                {{ $newsAll->links() }}
            </div>
        </div>
    </div>


</div>

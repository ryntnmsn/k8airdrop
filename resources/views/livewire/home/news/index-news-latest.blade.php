@section('title') K8 Airdrop Latest News @stop
<div>
    <div class="mb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($news as $news)
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
                                    {{ Carbon\Carbon::parse($news->updated_at)->diffForHumans() }}
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

<div>

    {{-- news slider --}}
    <div wire:ignore id="newsSlider" class="glide rounded-2xl overflow-hidden mb-10">
        <div class="glide__track" data-glide-el="track">
            <div class="glide__slides text-slate-100">
                @foreach ($newsSlider as $news)
                    <div class="glide__slide relative">
                        <div class="flex gap-10">
                            <div class="w-[65%]">
                                <img src="{{ url('storage/article/', $news->image) }}" alt="{{ $news->title }}" class="rounded-xl">
                            </div>
                            <div class="w-[35%] space-y-5">
                                <h1 class="text-slate-200 text-3xl font-semibold">{{ $news->title }}</h1>
                                <p class="text-slate-400">
                                    {{ $news->short_description }}
                                </p>
                                <div class="flex">
                                    <x-href href="{{ route('news.single.index', $news->slug) }}" class="!float-none">Read more</x-href>
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
        <div class="grid grid-cols-2 gap-8">
            @foreach ($newsCategories as $category)
                <div class="bg-slate-900 flex-1 p-2 rounded-md hover:bg-slate-800 duration-300 ease-in-out cursor-pointer">
                    <div class="flex justify-between items-center relative">
                        <a class="absolute top-0 bottom-0 right-0 left-0" href="{{ route('news.category.index', $category->slug) }}"></a>
                        <div class="flex gap-4">
                            <div>
                                <img src="{{ url('storage/article_category/', $category->image) }}" alt="{{ $category->title }}" class="w-20">
                            </div>
                            <div class="flex items-center">
                                <p class="text-slate-200 text-xl font-semibold">
                                    {{ $category->title }}
                                </p>
                            </div>
                        </div>
                        <div class="pe-4 hover:pe-0 duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="text-slate-500 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- latest news --}}
    <div class="mb-10">
        <div class="flex justify-between">
            <h1 class="text-slate-200 font-semibold text-3xl mb-5">Latest news</h1>
            <a href="{{ route('news.latest.index') }}" class="text-indigo-600 flex items-center font-medium">
                <span>See more</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
        <div class="grid grid-cols-3 gap-8">
            @foreach ($newsLatest as $news)
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
                        <a href="" class="text-indigo-600">Read more</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- news --}}
    <div class="mb-10">
        <h1 class="text-slate-200 font-semibold text-3xl mb-5">Incase you missed it</h1>
        <div class="grid grid-cols-3 gap-8 mb-10">
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
                                {{ Carbon\Carbon::parse($news->updated_at)->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    <h1 class="text-slate-200 font-semibold text-xl leading-normal mt-2">{{ $news->title }}</h1>
                    <p class="text-slate-400">
                        {{ Str::limit($news->short_description, 150) }}
                    </p>
                    <a href="" class="text-indigo-600">Read more</a>
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

    <div class="cryptohopper-web-widget" data-id="1" data-chart_color="#5850ec" data-table_columns="rank,name,price_usd,market_cap_usd,available_supply,weekly" data-coins="bitcoin,ethereum,tether,solana,xrp,usd-coin" data-table_style="dark" data-realtime="on"></div>
</div>

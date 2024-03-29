<div>
    <div class="mb-10">
        <h1 class="text-slate-200 font-semibold text-3xl mb-10">{{ $title }}</h1>
        <div class="grid grid-cols-3 gap-8 mb-10">
            @foreach ($newsAll as $news)
                <div class="flex flex-col gap-4 bg-slate-900 hover:bg-slate-800 duration-300 ease-in-out p-5 rounded-lg cursor-pointer">
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
                                    {{ Carbon\Carbon::parse($news->updated_at)->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                        <h1 class="text-slate-200 font-semibold text-2xl leading-tight mt-2">{{ $news->title }}</h1>
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

    <div wire:ignore class="cryptohopper-web-widget" data-id="1" data-chart_color="#5850ec" data-table_columns="rank,name,price_usd,market_cap_usd,available_supply,weekly" data-coins="bitcoin,ethereum,tether,solana,xrp,usd-coin" data-table_style="dark" data-realtime="on"></div>

</div>

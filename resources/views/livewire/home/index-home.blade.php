<div>
    {{-- Hero Banners --}}

    <div id="banner" class="glide rounded-2xl overflow-hidden">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides text-slate-100">
                @foreach ($promos as $promo)
                    @if($promo->language->code == app()->getLocale())
                        <li class="glide__slide relative rounded-2xl">
                            <div class="absolute top-0 left-0 bottom-0 right-0 flex items-center p-28 z-10">
                                <div class="p-20 bg-slate-400/[.50] backdrop-blur-md rounded-2xl h-full w-1/2 flex items-center">
                                    <div class="space-y-5">
                                        <div>
                                            {{ app()->getLocale() }}
                                            {{ $promo->language->code }}
                                            <x-title class="!text-slate-50">{{ $promo->name }}</x-title>
                                        </div>
                                        <div>
                                            <div>
                                                <p class="text-slate-50 text-lg">Promo type: {{$promo->type}}</p>
                                            </div>
                                            <div>
                                                <p class="text-slate-50 text-lg">Duration: {{date('F j', strtotime($promo->start_date))}} - {{date('F j Y', strtotime($promo->end_date))}}</p>
                                            </div>
                                            <div>
                                                <p class="text-slate-50 text-lg">Prize pool: {{ $promo->prize_pool }}</p>
                                            </div>
                                            <div>
                                                <p class="text-slate-50 text-lg">Platforms:
                                                    @foreach ($promo->platforms as $platform)
                                                        <span class="border rounded-md px-2 text-sm">{{ $platform->name }}</span>
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                        <div>
                                            <x-button class="!float-none">Click to Join</x-button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ url('storage/promo', $promo->image) }}" alt="{{ $promo->name }}" class="w-full">
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left !rounded-full" data-glide-dir="<"><</button>
            <button class="glide__arrow glide__arrow--right !rounded-full" data-glide-dir=">">></button>
        </div>
    </div>

    {{-- Promo Carousel --}}
    <div id="carousel" class="carousel rounded-2xl overflow-hidden mt-5">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides text-slate-100">
                @foreach ($carousels as $carousel)
                    <li class="glide__slide relative rounded-2xl">
                        <a href="{!! $carousel->url !!}" class="absolute block top-0 left-0 right-0 bottom-0" target="__blank"></a>
                        <img src="{{ url('storage/carousel', $carousel->image) }}" alt="{{ $carousel->name }}" class="w-full rounded-xl">
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


</div>

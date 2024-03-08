<div>
    <div classs="mt-20">
       <div class="flex gap-10">
        
            <div class="w-[70%]">
                <div>
                    <div class="relative">
                        <img src="{{ url('storage/promo/', $image) }}" alt="{{ $name }}" class="w-full rounded-xl">
                        @if($end_date >= Carbon\Carbon::now()->format('Y-m-d'))
                            <div class="ribbon_active z-50">Ongoing</div>
                        @else
                            <div class="ribbon_inactive z-50">Ended</div>
                        @endif  
                    </div>
                    <div class="flex justify-between">
                        <p class="text-slate-500 my-5 font-semibold">
                            <span>
                                Duration: 
                            </span>
                            <span>
                                {{date('F j Y', strtotime($start_date))}} - {{date('F j Y', strtotime($end_date))}}
                            </span>
                        </p>
                        <p class="text-slate-500 my-5 font-semibold">
                            @foreach ($platforms as $platform)
                                <span style="background-color:{{ $platform->hex_color }}" class="text-white rounded-sm px-1 font-semibold">{{ $platform->name }}</span>
                            @endforeach
                        </p>
                    </div>
                    <div>
                        <h1 class="text-slate-200 text-3xl font-semibold">{{ $name }}</h1>
                    </div>
                    <div class="flex border-2 border-slate-800 mt-10 rounded-lg overflow-hidden">
                        <div class="flex-1 border-r-2 border-slate-800 py-5">
                            <div class="flex flex-col justify-center items-center space-y-2 ">
                                <p class="!text-slate-500 font-semibold">Prize pool</p>
                                <p class="!text-slate-200 font-semibold text-3xl">
                                    {{ $prize_pool }}
                                </p>
                            </div>
                        </div>
                        <div class="flex-1 border-r-2 border-slate-800 py-5">
                            <div class="flex flex-col justify-center items-center space-y-2">
                                <p class="!text-slate-500 font-semibold">Promo type</p>
                                <p class="!text-slate-200 font-semibold text-3xl">
                                    @if($type == 'click_to_join')
                                        Interactive    
                                    @else
                                        Non-interactive
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="flex-1 py-5">
                            <div class="flex flex-col justify-center items-center space-y-2">
                                <p class="!text-slate-500 font-semibold">Days Left</p>
                                <p class="!text-slate-200 font-semibold text-3xl">
                                    @if($days_left >= 1)
                                        {{ $days_left }}
                                    @else
                                        Ended
                                    @endif
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div wire:ignore class="mt-10">
                    {{-- Other details --}}
                    <div id="accordion-open" data-accordion="open" data-active-classes="bg-slate-900 rounded-t-lg overfolow-hidden">
                        @if($description != null)
                        {{-- Description --}}
                        <h2 id="accordion-open-heading-1" class="bg-slate-800/[.20] rounded-t-lg">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-semibold rtl:text-right rounded-t-lg gap-3 text-slate-200" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
                                <div class="flex space-x-2 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                    </svg>
                                    <span class="flex items-center text-lg font-semibold">Promo Description</span>
                                </div>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/></svg>
                            </button>
                        </h2>
                        <div id="accordion-open-body-1" class="rounded-b-lg hidden bg-slate-800/[.20] py-5" aria-labelledby="accordion-open-heading-1">
                            <div class="p-5 border-b-0 text-slate-200 leading-6">
                                {!! $description !!}
                                @if(!empty($button_name) && !empty($button_link))
                                    <div class="mt-10 flex">
                                        <x-href href="{!! $button_link !!}" target="__blank" class="!float-none flex items-center !font-semibold">
                                            <span>
                                                {{ $button_name }}
                                            </span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                            </svg>
                                        </x-href>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @endif

                        @if($terms != null)
                        {{-- Terms and Conditions --}}
                        <h2 id="accordion-open-heading-2" class="bg-slate-800/[.20] rounded-t-lg mt-5">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-semibold rtl:text-right gap-3 rounded-t-lg text-slate-200" data-accordion-target="#accordion-open-body-2" aria-expanded="false" aria-controls="accordion-open-body-2">
                                <div class="flex space-x-2 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                      </svg>
                                    <span class="flex items-center text-lg font-semibold">Terms and Conditions</span>
                                </div>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/></svg>
                            </button>
                        </h2>
                        <div id="accordion-open-body-2" class="rounded-b-lg hidden bg-slate-800/[.20] py-5" aria-labelledby="accordion-open-heading-2">
                            <div class="p-5 border-b-0 text-slate-200 leading-6">
                                {!! $terms !!}
                            </div>
                        </div>
                        @endif

                        @if($article != null)
                        {{-- Article --}}
                        <h2 id="accordion-open-heading-3" class="bg-slate-800/[.20] rounded-t-lg mt-5">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-semibold rtl:text-right gap-3 rounded-t-lg text-slate-200" data-accordion-target="#accordion-open-body-3" aria-expanded="false" aria-controls="accordion-open-body-3">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                                    </svg>
                                    <span class="flex items-center text-lg font-semibold">Article</span>
                                </div>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/></svg>
                            </button>
                        </h2>
                        <div id="accordion-open-body-3" class="rounded-b-lg hidden bg-slate-800/[.20] py-5" aria-labelledby="accordion-open-heading-3">
                            <div class="p-5 border-b-0 text-slate-200 leading-6">
                                {!! $article !!}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>


                {{-- PROMO TYPES --}}
                    {{-- UPLOAD IMAGE --}}
                    @if($type == 'click_to_join')
                        @if(auth()->user())
                            @if($type == 'click_to_join' && $game_type == 'upload_image')
                                <div class="mt-20 bg-slate-800/[.20] rounded-xl p-10">
                                    @if($joinPromo == true)
                                        <form wire:submit="uploadImage">
                                            <h1 class="text-slate-200 font-semibold text-2xl mb-10">Upload image below to participate.</h1>
                                            <div> 
                                                <div class="mb-8">
                                                    <div class="flex items-center justify-center w-full">
                                                        <label for="dropzone-file" class="flex flex-col items-center justify-center overflow-hidden w-full  h-96 border-2 border-slate-800/[.50] border-dashed rounded-xl cursor-pointer bg-slate-900">
                                                            <div class="flex flex-col items-center justify-center pt-5 pb-6 h-96">
                                                                @if($userUploadImage)
                                                                    <img src="{{ $userUploadImage->temporaryUrl() }}" class="w-full">
                                                                @else
                                                                    <svg class="w-8 h-8 mb-4 text-slate-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                                    </svg>
                                                                    <p class="mb-2 text-slate-700"><span class="font-bold">Click to upload</span> or drag and drop</p>
                                                                    <p class="text-xs text-slate-700 font-bold">PNG, JPG, JPEG</p>
                                                                @endif
                                                            </div>
                                                            <input wire:model="userUploadImage" id="dropzone-file" type="file" class="hidden" />
                                                        </label>
                                                    </div> 
                                                </div>
                                                <div>
                                                    <x-button type="submit" class="!float-none font-semibold">Submit Entry</x-button>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <div class="flex flex-col items-center justify-center py-10">
                                            <h1 class="text-green-300 font-semibold text-2xl text-center mb-10">Thank you for participating to this promo. <br> Please stay tuned for the announcement of winners.</h1>
                                            <div class="flex space-x-5">
                                                <x-href href="{{ route('user.login') }}" class="!float-none font-semibold">Check other promos</x-href>
                                                <x-href href="{{ route('user.register') }}" class="!float-none font-semibold !bg-transparent !text-indigo-500">Go to home page</x-href>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            {{-- END OF UPLOAD IMAGE --}}
                            {{-- MULTIPLE CHOICE --}}
                            @elseif($type == 'click_to_join' && $game_type == 'multiple_choice')
                                <div wire:ignore class="mt-20 bg-slate-800/[.20] rounded-xl p-10">
                                    @if($joinPromo == true)
                                        <form wire:submit="multipleChoice">
                                            <h1 class="text-slate-200 font-semibold text-2xl mb-10">Multiple Choice</h1>
                                            <div> 
                                                <div class="mb-8">
                                                    <div class="flex flex-col w-full">
                                                        @foreach ($questions as $question)
                                                            <div class="mb-8">
                                                                <div class="flex text-slate-200 font-semibold gap-1 mb-2">
                                                                    <span scope="row">{{$loop->iteration}}.</span><span><p>{{ $question->question_title }}</p></span>
                                                                </div>
                                                                <div class="grid grid-cols-2 gap-2 text-slate-500">
                                                                    @foreach ($question->choices as $key => $choice)

                                                                        @if($question->question_type == 'single_select')
                                                                            <div class="w-full">
                                                                                <div class="flex items-center px-4 py-2 border border-slate-900 rounded">
                                                                                    <input wire:model="choices.{{ $question->id }}" value="{{ $choice->id }}" name="choice_{{ $question->id }}" id="choice_{{ $question->id }}" type="radio" class="w-5 h-5 text-indigo-600 bg-slate-800 border-slate-800 focus:ring-indigo-600">
                                                                                    <label for="choice_{{ $question->id }}" class="w-full text-sm ms-2 font-semibold">{{ $choice->choice }}</label>
                                                                                </div>
                                                                            </div>
                                                                        @elseif($question->question_type == 'multiple_select')
                                                                            <div class="w-full">
                                                                                <div class="flex items-center px-4 py-2 border border-slate-900 rounded">
                                                                                    <input wire:model="choices.{{ $choice->id }}[]" value="{{ $choice->id }}" name="choice_{{ $question->id }}" id="choice_{{ $question->id }}" type="checkbox" class="text-indigo-600 bg-slate-800 border-slate-800 focus:ring-indigo-600 rounded-sm w-5 h-5">
                                                                                    <label for="choice_{{ $question->id }}" class="w-full text-sm ms-2 font-semibold">{{ $choice->choice }}</label>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div> 
                                                </div>
                                                <div>
                                                    <x-button type="submit" class="!float-none font-semibold">Submit Entry</x-button>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <div class="flex flex-col items-center justify-center py-10">
                                            <h1 class="text-green-300 font-semibold text-2xl text-center mb-10">Thank you for participating to this promo. <br> Please stay tuned for the announcement of winners.</h1>
                                            <div class="flex space-x-5">
                                                <x-href href="{{ route('user.login') }}" class="!float-none font-semibold">Check other promos</x-href>
                                                <x-href href="{{ route('user.register') }}" class="!float-none font-semibold !bg-transparent !text-indigo-500">Go to home page</x-href>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            {{-- END OF MULTIPLE CHOICE --}}
                        @else
                            <div class="mt-20 bg-slate-800/[.20] rounded-xl px-10 py-20 flex flex-col items-center justify-center">
                                <h1 class="text-slate-200 font-semibold text-2xl mb-10">Please login to participate.</h1>
                                <div class="flex space-x-5">
                                    <x-href href="{{ route('user.login') }}" class="!float-none font-semibold">Login here</x-href>
                                    <x-href href="{{ route('user.register') }}" class="!float-none font-semibold !bg-transparent !text-indigo-500">Register here</x-href>
                                </div>
                            </div>
                        @endif
                    @endif

               

                <div class="flex justify-between mt-20 border-t border-b border-slate-800 py-5">
                    <x-button class="!bg-transparent !border-0 !p-0 flex flex-col !items-start !float-none w-full" wire:click.prevent="previousRecord">
                        <div class="flex flex-row-reverse items-center gap-3">
                            <span class="text-sm text-slate-800 font-semibold">
                                Previous promo
                            </span>
                            <span>
                                <div class="rounded-full border-2 border-slate-800 h-10 w-10 flex items-center justify-center p-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-slate-800 w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                      </svg>
                                </div>
                            </span>
                        </div>
                        <p class="text-sm mt-3 text-slate-500 text-left font-semibold">{{ $previous_record }}</p>
                    </x-button>
                    <div class="px-10 flex items-center">
                        <x-href href="{{ route('home.index') }}" class="!bg-transparent !border-0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-slate-800 w-10 h-10">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z" clip-rule="evenodd" />
                            </svg>
                        </x-href>
                    </div>
                    <x-button class="!bg-transparent !border-0 !p-0 flex flex-col !items-end !float-none w-full" wire:click.prevent="nextRecord">
                        <div class="flex items-center gap-3">
                            <span class="text-sm text-slate-800">
                                Next promo
                            </span>
                            <span>
                                <div class="rounded-full border-2 border-slate-800 h-10 w-10 flex items-center justify-center p-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="text-slate-800 w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </div>
                            </span>
                        </div>
                        <p class="text-sm mt-3 text-slate-500 text-right font-semibold">{{ $next_record }}</p>
                    </x-button>
                </div>
            </div>
            <div class="w-[30%]">
                <div class="bg-slate-800/[.20] p-10 rounded-xl">
                    <div>
                        <div class="mb-5">
                            <h1 class="text-slate-200 font-semibold text-2xl">Other Promos</h1>
                        </div>
                        <div class="flex-col space-y-5">
                            @foreach ($getPromos as $promo)
                                <div class="flex gap-3 relative">
                                    <a href="{{ route('single.promo', $promo->slug) }}" class="absolute top-0 bottom-0 left-0 right-0 z-10 cursor-pointer"></a>
                                    <div class="w-[40%] relative">
                                        <img src="{{ url('storage/promo/', $promo->image) }}" alt="{{ $promo->name }}" class="w-full rounded-md">
                                    </div>
                                    <div class="w-[60%]">
                                        <p class="text-xs text-slate-500 font-semibold mb-2">{{date('F j Y', strtotime($start_date))}} to {{date('F j Y', strtotime($end_date))}}</p>
                                        <p class="text-slate-200 font-semibold break-words">
                                            {{ Str::limit($promo->name, 34, '...') }}
                                        </p>
                                        <p class="text-slate-200 font-semibold">
                                            <span>Prize:</span>
                                            <span>
                                                {{ $promo->prize_pool }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-20">
                        <div class="mb-5">
                            <h1 class="text-slate-200 font-semibold text-2xl">Platforms</h1>
                        </div>
                        <div class="inline-block space-y-1">
                            @foreach ($getPlatforms as $platform)
                               <span style="background-color: {{ $platform->hex_color }}" class="text-white px-2 rounded-sm text-xs font-semibold">{{ $platform->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>

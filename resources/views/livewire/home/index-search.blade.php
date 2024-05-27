<div>
    <div class="flex relative">
        <div class="relative !w-full">
            <x-input-text wire:model.live.debounce.100ms="globalSearch" placeholder="{{ __('Search here') }}.." class="!text-slate-200 bg-slate-700/[.50] !border-slate-800 focus:!ring-indigo-600 placeholder-slate-600 font-semibold"></x-input-text>
            @if(strlen($globalSearch) >= 2)
                <svg wire:click="resetSearch" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 text-slate-50 absolute right-0 top-0 mt-2 me-2">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z" clip-rule="evenodd" />
                </svg>              
            @else
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-slate-600 absolute right-0 top-0 mt-2 me-2">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>
            @endif
        </div>
        {{-- <x-input-text wire:model.live="globalSearch" class="!w-full !bg-slate-800/[.50] !border-b !border-slate-600 placeholder-slate-600 !text-slate-50 !pr-5 !pl-10 !border-0" placeholder="Search here..."></x-input-text> --}}
    </div>
    @if(strlen($globalSearch) >= 2)
        <div class="absolute z-[100] left-0 px-5 right-0 text-slate-50 w-full mt-5 rounded-xl overflow-hidden">
            <div class="text-slate-200 border-b border-slate-700" wire:loading>{{ __('Loading') }}...</div>
            <div wire:loading.remove class="bg-slate-800 rounded-b-xl overflow-hidden shadow-2xl">
                @foreach ($promoResults as $result)
                    <div class="relative p-3 border-b border-slate-700 hover:bg-slate-700 cursor-pointer duration-300 ease-in-out">
                        <a href="{{ route('single.promo', $result->slug) }}" class="absolute top-0 left-0 right-0 bottom-0"></a>
                        <div>
                            <span class="text-xs text-slate-500">{{ __('Promo') }}</span>
                        </div>
                        <div>
                            <span class="text-slate-50 font-semibold">{{ $result->name }}</span>
                        </div>
                        <div>
                            <span class="text-slate-50">{{ __('Prize pool') }}: {{ $result->prize_pool }}</span>
                        </div>
                    </div>
                @endforeach
                @foreach ($newsResults as $result)
                    <div class="p-3 relative border-b group border-slate-700 hover:bg-slate-700 cursor-pointer duration-300 ease-in-out">
                        <a href="{{ route('news.single.index', $result->slug) }}" class="absolute top-0 left-0 right-0 bottom-0"></a>
                        <div>
                            <span class="text-xs text-slate-500">{{ __('News') }}</span>
                        </div>
                        <div>
                            <span class="text-slate-50 font-semibold">{{ $result->title }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

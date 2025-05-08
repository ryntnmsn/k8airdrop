@section('title') Promos @stop
<div>
    {{-- Promos --}}
    <div class="mt-10">
     <div class="flex mb-5 items-center justify-between">
         <div>
             <button onclick="showFilter()" class="border rounded-md p-1 bg-slate-800 border-slate-700 flex gap-2 items-center pe-2">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-slate-400">
                     <path d="M18.75 12.75h1.5a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM12 6a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 6ZM12 18a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 18ZM3.75 6.75h1.5a.75.75 0 1 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM5.25 18.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 0 1.5ZM3 12a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 3 12ZM9 3.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM12.75 12a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0ZM9 15.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                 </svg>
                 <span class="text-slate-400">{{ __('Filter') }}</span>
             </button>
         </div>
     </div>

     <div wire:ignore.self id="containerFilter" class="hidden mb-10 p-5 bg-slate-900 rounded-xl">
         <div class="flex flex-col md:flex-row gap-10">
             <div class="flex-1">
                 <x-label class="!text-slate-200">{{ __('Search') }}</x-label>
                 <div class="relative">
                     <x-input-text wire:model.live="searchPromo" placeholder="Enter text here.." class="!text-slate-200 bg-slate-800/[.50] !border-slate-800 focus:!ring-indigo-600 placeholder-slate-700"></x-input-text>
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-slate-700 absolute right-0 top-0 mt-2 me-2">
                         <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                     </svg>
                 </div>
             </div>
             <div class="flex-1">
                 <div class="flex flex-col">
                     <x-label class="!text-slate-200">{{ __('Promo type') }}</x-label>
                     <x-select wire:model.live="filterPromoType" class="!text-slate-200 bg-slate-800/[.50] !border-slate-800 focus:!ring-indigo-600">
                         <option value="">All</option>
                         <option value="click_to_redirect">{{ __('Click to Redirect') }}</option>
                         <option value="click_to_join">{{ __('Click to Join') }}</option>
                         <option value="click_to_redeem">{{ __('Click to Redeem') }}</option>
                     </x-select>
                 </div>
             </div>
             <div class="flex-1">
                 <div class="flex flex-col">
                     <x-label class="!text-slate-200">{{ __('Status') }}</x-label>
                     <x-select wire:model.live="filterIsVisible" class="!text-slate-200 bg-slate-800/[.50] !border-slate-800 focus:!ring-indigo-600">
                         <option value="">{{ __('All') }}</option>
                         <option value=">=">{{ __('Ongoing') }}</option>
                         <option value="<">{{ __('Ended') }}</option>
                     </x-select>
                 </div>
             </div>
         </div>
     </div>

     <div class="text-slate-200" wire:loading.delay>{{ __('Loading') }}...</div>
     <div wire:loading.remove class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
         @forelse ($promos as $promo)
             <div wire:key="{{ $promo['id'] }}" class="relative rounded-xl overflow-hidden bg-slate-900 hover:bg-slate-800 hover:z-50 p-4 md:hover:scale-[1.1] duration-300 ease-in-out cursor-pointer">
                 <a href="{{ route('single.promo', $promo->slug) }}" class="absolute z-30 top-0 left-0 right-0 bottom-0"></a>
                 <div class="relative">
                     @if($promo->end_date >= Carbon\Carbon::now()->format('Y-m-d'))
                         <div class="ribbon_active z-50">{{ __('Ongoing') }}</div>
                     @else
                         <div class="ribbon_inactive z-50">{{ __('Ended') }}</div>
                     @endif

                     <div class="absolute top-0 left-0 p-2">
                         <svg wire:click.prevent="viewPromo({{ $promo->id }})" data-modal-target="default-modal" data-modal-toggle="default-modal" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-400">
                             <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                             </svg>
                     </div>
                     <img src="{{ url('storage/promo/', $promo->image) }}" alt="{{ $promo->name }}" class="w-full rounded-xl">
                 </div>
                 <div class="py-5 h-full">
                     <x-text class="text-sm font-semibold !text-slate-500 mb-2">{{ __('Duration') }}:
                        @if(app()->getLocale() == 'jp')
                            {{ Carbon\Carbon::parse($promo->start_date)->locale('ja-JP')->isoFormat('LL') }} - {{ Carbon\Carbon::parse($promo->end_date)->locale('ja-JP')->isoFormat('LL') }}
                        @else
                            {{ Carbon\Carbon::parse($promo->start_date)->translatedFormat('F j') }} - {{ Carbon\Carbon::parse($promo->end_date)->translatedFormat('F j Y') }}
                        @endif
                    </x-text>
                     <x-text class="text-xl !text-slate-200 font-semibold mb-2">{{ $promo->name }}</x-text>
                     @if($promo->prize_pool != null)
                        <x-text class="text-md !text-slate-200 font-semibold">{{ __('Prize pool') }}: {{ $promo->prize_pool }}</x-text>
                     @endif
                     @if(count($promo->platforms) != null)
                         <x-text class="text-md !text-slate-200 font-semibold">{{ __('Platforms') }}:
                             @foreach ($promo->platforms as $platform)
                                 <span class="text-xs px-1 rounded-sm me-1 !text-white" style="background: {{ $platform->hex_color }}">
                                     {{ $platform->name }}
                                 </span>
                             @endforeach
                         </x-text>
                     @endif
                 </div>
             </div>
         @empty
             <div>
                 <x-text>{{ __('No promos available') }}.</x-text>
             </div>
         @endforelse
     </div>
     <div class="mt-10">
         <div class="flex justify-center">
             <x-button wire:click="loadMore" class="!float-none">{{ __('Load more') }}</x-button>
         </div>
     </div>
 </div>


 <script>
     function showFilter() {
       var filterX = document.getElementById('containerFilter');
       if(filterX.style.display == 'block') {
          filterX.style.display = 'none'
       } else {
          filterX.style.display = 'block'
       }
     }
  </script>
</div>

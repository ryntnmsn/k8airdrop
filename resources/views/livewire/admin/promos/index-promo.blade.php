<div>
    <div class="flex">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>Promos</x-title>
            <x-text-helper>Manage promos by using operations create, update and delete.</x-text-helper>
        </div>
        <div class="flex-1">
            <form action="{{ route('promos.create') }}" method="get">
                <x-button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>
                        Create
                    </span>
                </x-button>
            </form>
        </div>
    </div>

    <div class="mt-10">
        <div class="flex space-x-5 mb-5">
            <div class="flex-1 relative">
                <x-input-text wire:model.live='search' placeholder="Seach here..." class="pl-8 mb-0"></x-input-text>
                <div class="absolute left-0 top-0 flex items-center pl-2 h-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-5 h-5 text-slate-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>
            </div>
            <div class="flex-1">
                <div class="flex justify-end gap-4">
                    <div>
                        <select wire:model.live='lang' class="border-slate-200 rounded-lg">
                            <option value="">All</option>
                            <option value="1">English</option>
                            <option value="2">Japanese</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span>Show active</span>
                        <span>
                            <input checked type="checkbox" wire:model.live="active" class="w-5 h-5 rounded  text-indigo-600 border-slate-300">
                        </span>
                    </div>
                    <div class="flex items-center float-right space-x-3">
                        <span>
                            Show records:
                        </span>
                        <span>
                            <select wire:model.live='pagination' class="border-slate-200 rounded-lg">
                                <option value="20">20</option>
                                <option value="40">40</option>
                                <option value="100">100</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        @if($promos->count() != null)
            <div class="overflow-x-auto sm:rounded-lg">
                <table class="w-full text-left rtl:text-right rounded-2xl text-slate-700 ">
                    <thead class="text-xs uppercase bg-slate-100">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                               ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <button wire:click="sortBy('name')" class="uppercase flex items-center space-x-1">
                                    <span>
                                        Name
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </span>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Platforms
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <button wire:click="sortBy('type')" class="uppercase flex items-center space-x-1">
                                    <span>
                                        Promo type
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </span>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Language
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <button wire:click="sortBy('prize_pool')" class="uppercase flex items-center space-x-1">
                                    <span>
                                        Prize Pool
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </span>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <button wire:click="sortBy('is_visible')" class="uppercase flex items-center space-x-1">
                                    <span>
                                        Status
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </span>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Views
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($promos as $promo)
                            <tr class="border-b hover:bg-slate-100 rounded-xl">
                                <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap w-1">
                                    {{ $loop->iteration }}
                                </td>
                                <td scope="row" class="px-6 py-3 font-medium whitespace-nowrap">
                                    <div class="flex flex-row items-center space-x-4">
                                        <div class="w-20">
                                            <div class="p-[2px] border border-slate-200 rounded-md">
                                                @if($promo->image == null)
                                                    <img src="{{ url('storage/promo/default-image.jpg') }}" alt="" class="w-20 rounded-md">
                                                @else
                                                    <img src="{{ url('storage/promo/' . $promo->image) }}" alt="" class="w-20 rounded-md">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="w-[250px] flex flex-col">
                                            <h1 class="whitespace-pre-wrap">{{$promo->name}}</h1>
                                            <span class="text-xs font-light text-slate-400">Duration: {{date('F j', strtotime($promo->start_date))}} - {{date('F j Y', strtotime($promo->end_date))}}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    @foreach ($promo->platforms as $platform)
                                        <span class="bg-slate-100 px-2 rounded-full font-medium">{{$platform->name}}</span>
                                    @endforeach
                                </td>
                                <td class="px-6 py-3 capitalize">
                                    <span class="font-medium">
                                        {{ str_replace('_', ' ', $promo->type)}}
                                    </span>
                                </td>
                                <td class="px-6 py-3">
                                    @if($promo->language_id == '1')
                                        <img src="{{ url('storage/images/english-icon.png') }}" loading='lazy' class="border border-slate-200 rounded-sm p-1 overflow-hidden">
                                    @else
                                        <img src="{{ url('storage/images/japan-icon.png') }}" loading='lazy'  class="border border-slate-200 rounded-sm p-1 overflow-hidden">
                                    @endif
                                </td>
                                <td class="px-6 py-3">
                                    <span class="font-medium">
                                        {{$promo->prize_pool}}
                                    </span>
                                </td>
                                <td class="px-6 py-3">
                                    @if($promo->is_visible == 1)
                                        <x-status-visible></x-status-visible>
                                    @else
                                        <x-status-hidden></x-status-hidden>
                                    @endif
                                </td>
                                <td class="px-6 py-3">
                                    <div class="flex flex-col">
                                        <div class="flex items-center gap-1"><span class="text-[10px] text-slate-500">TODAY:</span> <span>{{ views($promo)->period(\CyrildeWit\EloquentViewable\Support\Period::since(today()))->count() }}</span></div>
                                        <div class="flex items-center gap-1"><span class="text-[10px] text-slate-500">TOTAL:</span> <span>{{ views($promo)->count() }}</span></div>
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class="flex flex-row gap-3">

                                        <x-href href="{{ route('promos.edit', $promo->id) }}" class="!p-1 !bg-transparent !border-0 !text-slate-600" >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </x-href>

                                        <x-href href="{{ route('promos.view', $promo->id) }}" class="!p-1 !bg-transparent !border-0 !text-slate-600" >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </x-href>

                                        <x-button wire:click="deletePromo({{$promo->id}})" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="!p-1 !bg-transparent !border-0 !text-slate-600" >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </x-button>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <x-empty-record>No promos available..</x-empty-record>
        @endif
        <x-pagination>
            {{ $promos->links() }}
        </x-pagination>
    </div>


    {{-- Delete modal confirmation --}}
    <div wire:ignore.self id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button" class="absolute top-3 end-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-slate-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-slate-500">Are you sure you want to delete this record?</h3>
                    <form wire:submit.prevent="destroyPromo">
                        <button data-modal-hide="popup-modal" type="submit" class="text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg inline-flex items-center px-5 py-2.5 text-center me-2">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal" type="submit" class="text-slate-500 bg-white hover:bg-slate-100 focus:ring-4 focus:outline-none focus:ring-slate-200 rounded-lg border border-slate-200 font-medium px-5 py-2.5 hover:text-slate-900 focus:z-10 ">No, cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:initialized', ()=>{
            @this.on('deleted', (event)=>{
                const data=event
                swal.fire({
                    title:data[0]['title'],
                    text:data[0]['text'],
                    icon:data[0]['icon'],
                })
            });
        });
    </script>
</div>

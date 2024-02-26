<div>
    <div class="flex">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>Featured Games</x-title>
            <x-text-helper>Manage featured games by using operations create, update and delete.</x-text-helper>
        </div>
        <div class="flex-1">
            <form action="{{ route('featured.games.create') }}">
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
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-left rtl:text-right rounded-2xl text-slate-700 ">
                <thead class="text-xs uppercase bg-slate-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Language
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($featuredGames as $featuredGame)
                        <tr class="border-b hover:bg-slate-100 rounded-xl">
                            <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap w-1">
                                {{ $loop->iteration }}
                            </td>
                            <td scope="row" class="px-6 py-3 font-medium whitespace-nowrap">
                                <div class="flex flex-row space-x-5">
                                    <div>
                                        <img src="{{ url('storage/featured_games', $featuredGame->image) }}" class="w-14">
                                    </div>
                                    <div>
                                        <h1>
                                            {{ $featuredGame->title }}
                                        </h1>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-3">
                                @if($featuredGame->language_id == '1')
                                    <img src="{{ url('storage/images/english-icon.png') }}" loading='lazy' class="border border-slate-200 rounded-sm p-1 overflow-hidden">
                                @else
                                    <img src="{{ url('storage/images/japan-icon.png') }}" loading='lazy'  class="border border-slate-200 rounded-sm p-1 overflow-hidden">
                                @endif
                            </td>
                            <td class="px-6 py-3">
                                @if($featuredGame->is_visible == 1)
                                    <x-status-visible></x-status-visible>
                                @else
                                    <x-status-hidden></x-status-hidden>
                                @endif
                            </td>
                            <td class="px-6 py-3 flex">
                                <x-button wire:navigate href="{{ route('featured.games.edit', $featuredGame->id) }}" class="!p-2 !bg-transparent !border-0 !text-slate-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                </x-button>
                                <x-button wire:click="deleteFeaturedGame({{ $featuredGame->id }})" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="!p-2 !bg-transparent !border-0 !text-slate-600" >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                </x-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    {{-- Delete modal confirmation --}}
    <div wire:ignore.self id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this record?</h3>
                    <form wire:submit="destroyFeaturedGame">
                        <button data-modal-hide="popup-modal" type="submit" class="text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No, cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('refresh-page', event => {
           window.location.reload(false); 
        })
    </script>
    
</div>
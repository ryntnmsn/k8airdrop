<div>
    <div class="flex">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>News</x-title>
            <x-text-helper>Manage news by using operations create, update and delete.</x-text-helper>
        </div>
        <div class="flex-1">
            <form action="{{ route('articles.create') }}" method="get">
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
                            <input checked type="checkbox" wire:model.live="active" class="w-5 h-5 rounded  text-indigo-500 border-slate-300">
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
    </div>
</div>
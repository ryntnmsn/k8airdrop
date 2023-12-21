<div class="mt-10">
    <div class="flex space-x-5">
        <div class="flex-1 relative mb-5">
            <x-input-text wire:model.live='search' placeholder="Seach here..." class="pl-8 mb-0"></x-input-text>
            <div class="absolute left-0 top-0 flex items-center h-full pl-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-5 h-5 text-slate-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>
        </div>
        <div class="flex-1">
            <div class="flex items-center float-right space-x-3">
                <span>
                    Show records:
                </span>
                <span>
                    <select wire:model.live='pagination' name="" id="" class="border-slate-200 rounded-lg">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                    </select>
                </span>
            </div>
        </div>
    </div>

    @if($platforms->count() != null)
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-left rtl:text-right rounded-2xl text-slate-700 ">
                <thead class="text-xs uppercase bg-slate-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Platform name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Slug
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Hex color
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($platforms as $platform)
                        <tr class="border-b hover:bg-slate-50 rounded-xl">
                            <th scope="row" class="px-6 py-3 font-medium whitespace-nowrap">
                                {{$platform->name}}
                            </th>
                            <td class="px-6 py-3">
                                {{$platform->slug}}
                            </td>
                            <td class="px-6 py-3">
                                {{$platform->hex_color}}
                            </td>
                            <td class="px-6 py-3">
                                <a href="#" class="font-medium text-indigo-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <x-pagination>
                {{ $platforms->links('pagination::tailwind') }}
            </x-pagination>
        </div>
    @else
        <x-empty-record>No platforms available..</x-empty-record>
    @endif
</div>

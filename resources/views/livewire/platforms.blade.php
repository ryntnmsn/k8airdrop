<div class="mt-10">
    @if($platforms->count() != null)

        <div>
            <x-input-text wire:model.live='search' placeholder="Seach here..."></x-input-text>
        </div>

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

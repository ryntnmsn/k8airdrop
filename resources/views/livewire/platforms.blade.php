<div class="mt-10">
    @if($platforms->count() != null)
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right rounded-2xl text-slate-700 ">
                <thead class="text-xs uppercase bg-slate-50">
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
                        <tr class="border-b hover:bg-indigo-500 hover:text-slate-100 rounded-xl">
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
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <x-empty-record>No platforms available..</x-empty-record>
    @endif
</div>

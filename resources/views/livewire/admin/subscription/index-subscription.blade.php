<div>
    <div class="relative">
        <div class="flex">
            <div class="flex-1 flex flex-col space-y-1">
                <x-title>Subscriptions</x-title>
            </div>
            <div class="flex-1">
                <x-button id="dropdownDefaultButton" data-dropdown-toggle="dropdownExport">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>
                        Export
                    </span>
                </x-button>
                <!-- Dropdown menu -->
                <div id="dropdownExport" class="z-20 hidden bg-white divide-y divide-slate-100 rounded-lg shadow w-44">
                    <ul class="py-2 text-slate-800" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="{{ route('export.english.subscribers') }}" class="block px-4 py-2 hover:bg-slate-100">English</a>
                        </li>
                        <li>
                            <a href="{{ route('export.japan.subscribers') }}" class="block px-4 py-2 hover:bg-slate-100">Japan</a>
                        </li>
                    </ul>
                </div>
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
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Code
                            </th>
                            <th scope="col" class="px-6 py-3">
                                IP
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b hover:bg-slate-100 rounded-xl">
                                <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap w-1">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $user->code }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $user->ip }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ date('F j Y', strtotime($user->created_at)) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div>
    <div class="relative">
        <div class="flex">
            <div class="flex-1 flex flex-col space-y-1">
                <x-title>Users</x-title>
            </div>
            <div class="flex-1">
                <x-button type="submit" data-modal-target="add-modal" data-modal-toggle="add-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>
                        Create
                    </span>
                </x-button>
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
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Rewards
                            </th>
                            <th scope="col" class="px-6 py-3">
                                IP
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Joined date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Is winner
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b hover:bg-slate-100 rounded-xl">
                                <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap w-1">
                                    {{ $loop->iteration }}
                                </td>
                                <td scope="row" class="px-6 py-3 font-medium whitespace-nowrap">
                                    {{ $user->users->name ?? '' }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $user->users->email ?? '' }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $user->rewards }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $user->ip }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $user->joined_date }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $user->is_winner }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


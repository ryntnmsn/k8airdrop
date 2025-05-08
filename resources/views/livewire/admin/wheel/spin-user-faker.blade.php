<div>
    <div class="relative">
        <div class="flex">
            <div class="flex-1 flex flex-col space-y-1">
                <x-title>User Faker</x-title>
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
                                Rewards
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
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
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $user->rewards }}
                                </td>
                                <td class="px-6 py-3 flex">
                                    <x-button wire:click="editUserFaker({{ $user->id }})" class="!p-2 !bg-transparent !border-0 !text-slate-600" data-modal-target="edit-modal" data-modal-toggle="edit-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </x-button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    <!-- Add modal -->
    <div wire:ignore.self id="add-modal" data-modal-backdrop="add" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-slate-600">
                        Add Fake User
                    </h3>
                    <button type="button" class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="add-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form wire:submit.prevent="addUserFaker">
                    <div class="p-4 md:p-5">
                        <div class="mb-8">
                            <x-label>Name</x-label>
                            <x-input-text wire:model="name"></x-input-text>
                            @error('name')
                                <span class="text-rose-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-label>Rewards</x-label>
                            <x-input-text wire:model="rewards"></x-input-text>
                            @error('rewards')
                                <span class="text-rose-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-slate-200 rounded-b">
                        <x-button type="submit">Save</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Edit modal -->
    <div wire:ignore.self id="edit-modal" data-modal-backdrop="edit" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-slate-600">
                        Edit
                    </h3>
                    <button type="button" class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="edit-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form wire:submit.prevent="updateUserFaker">
                    <div class="p-4 md:p-5">
                        <div class="mb-8">
                            <x-label>Name</x-label>
                            <x-input-text wire:model="name" value="{{ $name }}"></x-input-text>
                            @error('name')
                                <span class="text-rose-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-8">
                            <x-label>Name</x-label>
                            <x-input-text wire:model="rewards" value="{{ $rewards }}"></x-input-text>
                            @error('name')
                                <span class="text-rose-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-slate-200 rounded-b">
                        <x-button wire:target="updateUserFaker">Update</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


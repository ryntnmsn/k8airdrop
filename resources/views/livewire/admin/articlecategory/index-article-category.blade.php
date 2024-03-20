<div>
    <div class="flex">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>News Categories</x-title>
            <x-text-helper>Manage news categories by using operations create, update and delete.</x-text-helper>
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
                        <th scope="col" class="px-6 py-3 text-right">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articleCategories as $articleCategory)
                        <tr class="border-b hover:bg-slate-100 rounded-xl">
                            <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap w-1">
                                {{ $loop->iteration }}
                            </td>
                            <td scope="row" class="px-6 py-3 font-medium whitespace-nowrap">
                                {{$articleCategory->title}}
                            </td>
                            <td class="px-6 py-3 flex justify-end">
                                <x-button wire:click="editArticleCategory({{ $articleCategory->id }})" class="!p-2 !bg-transparent !border-0 !text-slate-600" data-modal-target="edit-modal" data-modal-toggle="edit-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                      </svg>
                                </x-button>
                                <x-button wire:click="deleteArticleCategory({{ $articleCategory->id }})" data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="!p-2 !bg-transparent !border-0 !text-slate-600" >
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
<!-- Add modal -->
<div wire:ignore.self id="add-modal" data-modal-backdrop="add" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-slate-600">
                    Create Category
                </h3>
                <button type="button" class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-slate-600 dark:hover:text-white" data-modal-hide="add-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form wire:submit="storeArticleCategory">
                <div class="p-4 md:p-5 space-y-4">
                    <div>
                        <x-label>Title</x-label>
                        <x-input-text wire:model="title"></x-input-text>
                        @error('title')
                            <span class="text-rose-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label>Icon (400x400)</x-label>
                        <x-input-text type="file" wire:model="image"></x-input-text>
                        @error('image')
                            <span class="text-rose-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-slate-200 rounded-b">
                    <x-button wire:target="storeArticleCategory">Create</x-button>
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
                    Edit Category
                </h3>
                <button type="button" class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-slate-600 dark:hover:text-white" data-modal-hide="edit-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form wire:submit="updateArticleCategory">
                <div class="p-4 md:p-5 space-y-4">
                    <div>
                        <x-label>Title</x-label>
                        <x-input-text wire:model="title" value="{{ $title ?? ''}}"></x-input-text>
                        @error('title')
                        <span class="text-rose-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label>Image</x-label>
                        <img src="{{ url('storage/article_category/', $image) }}" alt="" class="w-40">
                        <input type="hidden" wire:model="image" value="{{ $image ?? '' }}">
                    </div>
                    <div>
                        <x-label>Change image (400x400)</x-label>
                        <x-input-text type="file" wire:model="newImage"></x-input-text>
                        @error('image')
                            <span class="text-rose-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-slate-200 rounded-b">
                    <x-button wire:target="updateArticleCategory">Create</x-button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete modal -->
<div wire:ignore.self id="delete-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" class="absolute top-3 end-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-slate-600 dark:hover:text-white" data-modal-hide="delete-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-slate-400 w-12 h-12 dark:text-slate-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-slate-500 dark:text-slate-400">Are you sure you want to delete this record?</h3>
                <button wire:click="destroyArticleCategory" data-modal-hide="delete-modal" class="text-white bg-rose-600 hover:bg-rose-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="delete-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-slate-600 focus:outline-none bg-white rounded-lg border border-slate-200 hover:bg-slate-100 focus:z-10">No, cancel</button>
            </div>
        </div>
    </div>
</div>
  
</div>
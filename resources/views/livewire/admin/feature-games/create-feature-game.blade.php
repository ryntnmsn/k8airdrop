<div>
    <div class="flex">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>Create Featured Game</x-title>
        </div>
    </div>
    <div class="mt-10">
        <div class="flex">
            <form wire:submit.prevent='storeFeaturedGame' class="w-full space-y-8">
                <div>
                    <x-label>Title</x-label>
                    <x-input-text wire:model='title'></x-input-text>
                    @error('title')
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-label>URL</x-label>
                    <x-input-text wire:model='url'></x-input-text>
                </div>
                <div>
                    <x-label>Language</x-label>
                    <x-select wire:model='language_id'>
                        <option value="" selected class="hidden">Select language</option>
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                        @endforeach
                    </x-select>
                    @error('language_id')
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-label for="is_visible">Status</x-label>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" wire:model='is_visible'>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                    </label>
                </div>
                <div class="flex-none pt-8 xl:pt-0">
                    <x-label for="image">Image</x-label>
                    <div class="flex items-center justify-left w-full">
                        <label for="dropzone-file" class="overflow-hidden flex flex-col items-center justify-center w-96 h-96 border-2 border-slate-300 border-dashed cursor-pointer bg-slate-50">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6 relative">
                                @if($image)
                                    <img src="{{ $image->temporaryUrl() }}" class="w-full rounded-xl"/>
                                @else
                                    <svg class="w-8 h-8 mb-4 text-slate-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-slate-500"><span class="font-semibold">Click to upload</p>
                                    <p class="text-xs text-slate-500">PNG, JPG or JPEG (640x640)</p>
                                @endif
                            </div>
                            <input wire:model='image' name='image' type="file" id="dropzone-file" class="hidden" />
                        </label>
                    </div>
                    @error('image')
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex">
                    <x-button wire:target='storeFeaturedGame' type="submit" class="!float-none">Save</x-button>
                    <x-href href="{{ route('featured.games.index') }}" class="ml-3 bg-white hover:!bg-rose-500 !text-rose-500 !border-rose-500 !float-none hover:!text-slate-100">Cancel</x-href>
                </div>
            </form>
        </div>
    </div>

    <script>
        window.addEventListener('created',function(e){ 
            Swal.fire({
                title: 'Created',
                text: 'Featured games created successfully',
                icon: 'success',
                iconColor: 'lightgreen'
            }).then(function() {
                location.reload();
            });
        });
    </script>
</div>

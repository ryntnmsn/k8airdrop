<div>
    <div class="flex">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>Create Carousel</x-title>
        </div>
    </div>
    <div class="mt-10">
        <div class="flex">
            <form wire:submit.prevent='updateCarousel' class="w-full space-y-8">
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
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}" {{ $language_id == $language->id ? 'selected' : ''}}>{{ $language->name }}</option>
                        @endforeach
                    </x-select>
                    @error('language_id')
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="flex space-x-8">
                        <div class="flex-1">
                            <x-label>Start Date</x-label>
                            <x-input-text wire:model="start_date" type="date"></x-input-text>
                        </div>
                        <div class="flex-1">
                            <x-label>End Date</x-label>
                            <x-input-text wire:model="end_date" type="date"></x-input-text>
                        </div>
                    </div>
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
                        <label for="dropzone-file" class="overflow-hidden flex flex-col items-center justify-center w-96 h-52 border-2 border-slate-300 border-dashed cursor-pointer bg-slate-50">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6 relative">
                                @if($new_image)
                                    <img src="{{ $new_image->temporaryUrl() }}" class="w-full rounded-xl"/>
                                @else
                                    <img src="{{ url('storage/carousel/', $old_image) }}" class="w-full rounded-xl"/>
                                @endif
                            </div>
                            <input wire:model='new_image' type="file" id="dropzone-file" class="hidden" />
                            <input wire:model="old_image" class="hidden"/>
                        </label>
                    </div>
                    {{-- @error('image')
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                    @enderror --}}
                </div>
                <div class="flex">
                    <x-button wire:target='updateCarousel' type="submit" class="!float-none">Save</x-button>
                    <x-href href="{{ route('carousel.index') }}" class="ml-3 bg-white hover:!bg-rose-500 !text-rose-500 !border-rose-500 !float-none hover:!text-slate-100">Cancel</x-href>
                </div>
            </form>
        </div>
    </div>

    <script>
        window.addEventListener('updated',function(e){ 
            Swal.fire({
                title: 'Updated',
                text: 'Featured games updated successfully',
                icon: 'success',
                iconColor: 'lightgreen'
            }).then(function() {
                location.reload();
            });
        });
    </script>
</div>

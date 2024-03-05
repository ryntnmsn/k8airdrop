<div>
    <div class="flex">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>Edit platform</x-title>
            <x-text-helper>Manage platforms by using operations create, update and delete.</x-text-helper>
        </div>
    </div>
    <div class="mt-10">
        <div class="flex">
            <form wire:submit.prevent='updatePlatformn' class="w-full">
                <div class="mb-8">
                    <x-label>Name</x-label>
                    <x-input-text wire:model='name' name="name" wire:keyup='generateSlug'></x-input-text>
                    @error('name')
                        <span class="text-rose-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-8">
                    <x-label>Slug</x-label>
                    <div class="flex items-center border border-slate-200 rounded-lg">
                        <span class="text-slate-400 bg-slate-100 p-2">{{ config('app.url') }}/platforms/</span>
                        <x-input-text wire:model='slug' name="slug" class="border-0 p-0 rounded-0 focus:ring-0 focus:border-0" readonly></x-input-text>
                    </div>
                    @error('slug')
                        <span class="text-rose-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-8">
                    <x-label>Color</x-label>
                    <x-color-picker wire:model='hex_color' name="hex_color"></x-color-picker>
                    @error('hex_color')
                        <span class="text-rose-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-8">
                <x-label>Status</x-label>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" @if($platform->is_visible == '1') checked @endif name="is_visible"
                        value="1" class="sr-only peer" wire:model='is_visible'>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                    </label>
                </div>
                <div>
                    <x-button wire:target='updatePlatformn' type="submit" class="float-left">Save</x-button>
                    <x-href href="{{ route('platforms.index') }}" class="ml-3 bg-white hover:!bg-rose-500 !text-rose-500 !border-rose-500 float-left hover:!text-slate-100">Cancel</x-href>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:initialized', ()=>{
            @this.on('updated', (event)=>{
                const data=event
                swal.fire({
                    title:data[0]['title'],
                    text:data[0]['text'],
                    icon:data[0]['icon'],
                })
            });
        });
    </script>
</div>

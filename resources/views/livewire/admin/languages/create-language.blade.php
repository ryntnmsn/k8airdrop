<div>
    <div class="flex">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>Create language</x-title>
            <x-text-helper>Manage platforms by using operations create, update and delete.</x-text-helper>
        </div>
    </div>
    <div class="mt-10">
        <div class="flex">
            <form wire:submit.prevent='store' class="w-full">
                <div class="mb-8">
                    <x-label>Name</x-label>
                    <x-input-text wire:model='name' name="name"></x-input-text>
                    @error('name')
                        <span class="text-rose-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-8">
                    <x-label>Code</x-label>
                    <x-input-text wire:model='code' name="code"></x-input-text>
                    @error('code')
                        <span class="text-rose-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-button wire:target='store' type="submit" class="float-left">Save</x-button>
                    <x-href href="{{ route('languages.index') }}" class="ml-3 bg-white hover:!bg-rose-500 !text-rose-500 !border-rose-500 float-left hover:!text-slate-100">Cancel</x-href>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:initialized', ()=>{
            @this.on('created', (event)=>{
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

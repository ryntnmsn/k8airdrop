<div>
    <div class="flex">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>Create promo</x-title>
            <x-text-helper>Manage promo by using operations create, update and delete.</x-text-helper>
        </div>
    </div>
    <div class="mt-10">
        <div class="flex">
            <form wire:submit.prevent='store' class="w-full">
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
                        <span class="text-slate-400 bg-slate-100 p-2">{{ config('app.url') }}/promos/</span>
                        <x-input-text wire:model='slug' name="slug" class="border-0 p-0 rounded-0 focus:ring-0 focus:border-0" readonly></x-input-text> 
                    </div>
                    @error('slug')
                        <span class="text-rose-500">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="mb-8">
                    <x-label>Description</x-label>
                    <div id="container">
                        <x-textarea style="height: 200px" id="editor"></x-textarea>
                    </div>
                </div>

                <div class="mb-8">
                    <x-label>Terms</x-label>
                    <div id="container">
                        <x-textarea style="height: 200px" id="editor1"></x-textarea>
                    </div>
                </div>

                <div>
                    <x-button wire:target='store' type="submit" class="float-left">Save</x-button>
                    <x-href href="{{ route('platforms.index') }}" class="ml-3 bg-white hover:!bg-rose-500 !text-rose-500 !border-rose-500 float-left hover:!text-slate-100">Cancel</x-href>
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

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
                <div class="mb-2">
                    <x-label>Name</x-label>
                    <x-input-text wire:model='name' name="name" wire:keyup='generateSlug'></x-input-text>
                    @error('name')
                        <span class="text-rose-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-8 flex flex-row w-full space-x-2">
                    <span class="flex-none">
                        <x-label class="!text-sm !text-slate-400"></x-label>
                    </span>
                    <span class="flex-none w-full">
                        <x-input-text id='slug_url' wire:model='slug' name="slug" class="!text-sm text-slate-400 !border-0 !p-0 rounded-0 focus:ring-0 focus:border-0" readonly></x-input-text>
                    </span>
                </div>

                <div class="mb-8 flex space-x-4">
                    <div class="flex-1">
                        <x-label>Prize pool</x-label>
                        <x-input-text></x-input-text>
                    </div>
                    <div wire:ignore class="flex-1">
                        <x-label>Platforms</x-label>
                        <select name="platforms[]" class="w-full" id="platforms_select" multiple>
                            @foreach ($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div date-rangepicker class="flex items-center mb-8">
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-slate-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <x-input-text name="start" type="text" class="!ps-10" placeholder="Select date end"></x-input-text>
                    </div>
                    <span class="mx-4 text-slate-500">to</span>
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-slate-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <x-input-text name="end" type="text" class="!ps-10" placeholder="Select date end"></x-input-text>
                    </div>
                </div>


                <div wire:ignore class="mb-8">
                    <x-label>Description</x-label>
                    <div id="container">
                        <x-textarea></x-textarea>
                    </div>
                </div>

                <div wire:ignore class="mb-8">
                    <x-label>Terms</x-label>
                    <div id="container">
                        <x-textarea></x-textarea>
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

    <script>
        $(document).ready(function() {
            $('#platforms_select').select2();
        });
    </script>

</div>

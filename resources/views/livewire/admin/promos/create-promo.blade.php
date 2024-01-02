<div class="relative">
    <div class="flex">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>Create Promo</x-title>
            <x-text-helper>Manage promo by using operations create, update and delete.</x-text-helper>
        </div>
    </div>
    <div class="mt-10">
        <div class="flex">
            <form wire:submit.prevent='store' class="w-full">
                <div class="mb-20">
                    <x-title class="!text-base border-b-2 border-slate-200 mb-4 pb-2 uppercase">Promo details</x-title>
                    <div class="space-y-8">
                        <div class="flex space-x-8">
                            <div class="flex-1 space-y-8">
                                <div class="mb-2">
                                    <x-label>Name</x-label>
                                    <x-input-text wire:model='name' name="name" wire:keyup='generateSlug'></x-input-text>
                                    
                                    <div class="flex items-center rounded mt-2">
                                        <span class="flex-none text-sm text-slate-400 ">
                                            URL Preview: {{ config('app.url') }}/promos/
                                        </span>
                                        <span class="flex-1">
                                            <x-input-text id='slug_url' wire:model='slug' name="slug" class="!bg-transparent !text-sm text-slate-400 !border-0 !p-0 rounded-0 focus:ring-0 focus:border-0" readonly></x-input-text>
                                        </span>
                                    </div>
                                    
                                    @error('name')
                                        <span class="text-rose-500">{{ $message }}</span>
                                    @enderror
                                </div>
                
                                <div class="flex space-x-4">
                                    <div class="flex-1">
                                        <x-label>Prize pool</x-label>
                                        <x-input-text></x-input-text>
                                    </div>
                                    <div wire:ignore class="flex-1">
                                        <x-label>Platforms</x-label>
                                        <x-select name="platforms[]" class="w-full" id="platforms_select" multiple>
                                            @foreach ($platforms as $platform)
                                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                                            @endforeach
                                        </x-select>
                                    </div>
                                </div>
                             </div>
                             <div class="flex-none w-96">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-52 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-slate-50">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-slate-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-sm text-slate-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-slate-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" />
                                    </label>
                                </div> 
                             </div>
                        </div>

                        <div>
                            <x-label>Language</x-label>
                            <x-select name="language" class="w-full">
                                @foreach ($languages as $language)
                                    <option class="{{ $language->id }}">{{ $language->name }}</option>                            
                                @endforeach
                            </x-select>
                        </div>

                        <div>
                            <x-label>Promo type</x-label>
                            <x-select name="promo_type" class="w-full">
                                <option class="click_to_redirect">Click to Redirect</option>
                                <option class="click_to_join">Click to Join</option>
                                <option class="click_to_redeem">Click to Redeem</option>
                            </x-select>
                        </div>

                        <div wire:keyup = 'showGameType'>
                            <x-select name="promo_type" class="w-full">
                                <option class="click_to_redirect">Click to Redirect</option>
                                <option class="click_to_join">Click to Join</option>
                                <option class="click_to_redeem">Click to Redeem</option>
                            </x-select>
                        </div>
                    </div>
                </div>


                <div>
                    <x-title class="!text-base border-b-2 border-slate-200 mb-4 pb-2 uppercase">Visibility Status</x-title>
                    <div class="space-y-8 mb-20">
                        <div date-rangepicker class="flex items-center mb-8 space-x-4">
                            <div class="flex-1">
                                <x-label>Start date</x-label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-slate-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <x-input-text name="start" type="text" class="!ps-10" placeholder="Select date"></x-input-text>
                                </div>
                            </div>
                        
                            <div class="flex-1">
                                <x-label>End date</x-label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-slate-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <x-input-text name="end" type="text" class="!ps-10" placeholder="Select date"></x-input-text>
                                </div>
                            </div>
                        </div>
    
                        <div class="absolute top-0 right-0 text-center">
                            <x-label class="!text-xs">Status</x-label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked name="is_visible" value="0" class="sr-only peer" wire:model='is_visible'>
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-500"></div>
                            </label>
                            </div>
                        <div>
                    </div>
                </div>

                <div>
                    <x-title class="!text-base border-b-2 border-slate-200 mb-4 pb-2 uppercase">Button Settings</x-title>
                    <div class="space-y-8 mb-20">
                        <div>
                            <x-label>Button name</x-label>
                            <x-input-text></x-input-text>
                        </div>
                        <div>
                            <x-label>Button link</x-label>
                            <x-input-text></x-input-text>
                        </div>
                    </div>
                </div>

                <div class="mb-20">
                    <x-title class="!text-base border-b-2 border-slate-200 mb-4 pb-2 uppercase">Description, terms and article</x-title>
                    <div class="space-y-8">
                        <div wire:ignore>
                            <x-label>Description</x-label>
                            <div id="container">
                                <x-textarea></x-textarea>
                            </div>
                        </div>
        
                        <div wire:ignore>
                            <x-label>Terms and Conditions</x-label>
                            <div id="container">
                                <x-textarea></x-textarea>
                            </div>
                        </div>
        
                        <div wire:ignore>
                            <x-label>Article</x-label>
                            <div id="container">
                                <x-textarea></x-textarea>
                            </div>
                        </div>
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

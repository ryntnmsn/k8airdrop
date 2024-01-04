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
                @csrf
                <div class="mb-20">
                    <x-title class="!text-base border-b-2 border-slate-200 mb-4 pb-2 uppercase">Promo details</x-title>
                    <div class="space-y-8">
                        <div class="flex flex-col xl:flex-row space-x-0 xl:space-x-8">
                            <div class="flex-1 space-y-8">
                                <div class="mb-2">
                                    <x-label for="name">Name</x-label>
                                    <x-input-text wire:model='name' id="name" name="name" wire:keyup='generateSlug' value="{{ old('name') }}"></x-input-text>
                                    
                                    <div wire:key='slug' class="flex items-center rounded mt-2">
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
                
                                <div class="flex-1">
                                    <div class="flex flex-col xl:flex-row space-x-0 xl:space-x-4">
                                        <div class="flex-1">
                                            <x-label for="prize_pool">Prize pool</x-label>
                                            <x-input-text wire:model='prize_pool' id="prize_pool" name="prize_pool"></x-input-text>
                                        </div>
                                        <div wire:ignore class="flex-1 pt-8 xl:pt-0">
                                            <x-label for="platforms_select">Platforms</x-label>
                                            <x-select name="platforms[]" class="w-full" id="platforms_select" multiple>
                                                @foreach ($platforms as $platform)
                                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>
                                </div>
                             </div>
                             <div class="flex-none w-96 pt-8 xl:pt-0">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" class="overflow-hidden flex flex-col items-center justify-center w-full h-52 border-2 border-slate-300 border-dashed cursor-pointer bg-slate-50">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6 relative">
                                            @if($image)
                                                <img src="{{ $image->temporaryUrl() }}" class="w-full rounded-xl"/>
                                            @else
                                                <svg class="w-8 h-8 mb-4 text-slate-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-sm text-slate-500"><span class="font-semibold">Click to upload</p>
                                                <p class="text-xs text-slate-500">PNG, JPG or JPEG (1388x750px)</p>
                                            @endif
                                        </div>
                                        <input wire:model='image' name='image' type="file" id="dropzone-file" class="hidden" />
                                    </label>
                                </div>
                                @error('image')
                                    <span class="text-rose-500">{{ $message }}</span>
                                @enderror
                             </div>
                        </div>

                        <div>
                            <x-label for="language">Language</x-label>
                            <x-select wire:model='language_id' name="language_id" id="language" class="w-full">
                                    <option value="" class="hidden" selected>Select language</option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}">{{ $language->name }}</option>                            
                                @endforeach
                            </x-select>
                            @error('language_id')
                                <span class="text-rose-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <x-label for="promoType">Promo type</x-label>
                            <x-select wire:model='type' name="type" class="w-full" id="promoType">
                                <option value="" class="hidden" selected>Select promo type</option>
                                <option value="click_to_redirect">Click to Redirect</option>
                                <option value="click_to_join">Click to Join</option>
                                <option value="click_to_redeem">Click to Redeem</option>
                            </x-select>
                        </div>
                        @error('type')
                            <span class="text-rose-500">{{ $message }}</span>
                        @enderror

                        <div id="gameType">
                            <x-label for="game_type">Game type</x-label>
                            <x-select wire:model='game_type' name="game_type" id="game_type" class="w-full">
                                <option value="" class="hidden" selected>Select game type</option>
                                <option value="upload_image">Upload Image</option>
                                <option value="multiple_choice">Multiple Choice</option>
                                <option value="paste_retweet_url">Paste Retweet URL</option>
                                <option value="leave_comment">Leave Comment</option>
                                <option value="subscribe_newsletter">Subscribe Newsletter</option>
                            </x-select>
                        </div>
                    </div>
                </div>


                <div>
                    <x-title class="!text-base border-b-2 border-slate-200 mb-4 pb-2 uppercase">Promo Duration</x-title>
                    <div class="space-y-8 mb-20">
                        <div class="grid grid-cols-2 mb-8 gap-4">
                            <div>
                                <x-label for="start_date">Start date</x-label>
                                <x-input-text wire:model='start_date' name="start_date" id="start_date" type="date"></x-input-text>
                                @error('start_date')
                                    <span class="text-rose-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <x-label for="end_date">End date</x-label>
                                <x-input-text wire:model='end_date' name="end_date" id="end_date" type="date"></x-input-text>
                                @error('end_date')
                                    <span class="text-rose-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="absolute top-0 right-0">
                            <x-label for="is_visible">Status</x-label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked name="is_visible" value="0" class="sr-only peer" wire:model='is_visible'>
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-500"></div>
                            </label>
                        </div>
                    </div>
                </div>


                <div>
                    <x-title class="!text-base border-b-2 border-slate-200 mb-4 pb-2 uppercase">Featured and Banner</x-title>
                    <div class="space-y-8 mb-20">
                        <div class="grid grid-cols-2 mb-8 gap-4">
                            <div>
                                <x-label for="is_featured">Is Featured?</x-label>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked name="is_featured" value="0" class="sr-only peer" wire:model='is_featured'>
                                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-500"></div>
                                </label>
                                </div>
                            <div>
                                <div>
                                    <x-label for="is_banner">Is Banner?</x-label>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" checked name="is_banner" value="0" class="sr-only peer" wire:model='is_banner'>
                                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-500"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                

                    <div>
                        <x-title class="!text-base border-b-2 border-slate-200 mb-4 pb-2 uppercase">Button Settings</x-title>
                        <div class="space-y-8 mb-20">
                            <div>
                                <x-label for="button_name">Button name</x-label>
                                <x-input-text wire:model='button_name' id="button_name" name='button_name'></x-input-text>
                            </div>
                            <div>
                                <x-label for="button_link">Button link</x-label>
                                <x-input-text wire:model='button_link' id="button_link" name='button_link'></x-input-text>
                            </div>
                        </div>
                    </div>

                    <div class="mb-20">
                        <x-title class="!text-base border-b-2 border-slate-200 mb-4 pb-2 uppercase">Description, terms and article</x-title>
                        <div class="space-y-8">
                            <div>
                                <x-label for="description">Description</x-label>
                                <div wire:ignore id="container">
                                    <x-textarea wire:model='description' name='description' id="description"></x-textarea>
                                </div>
                            </div>
            
                            <div wire:ignore>
                                <x-label for="terms">Terms and Conditions</x-label>
                                <div id="container">
                                    <x-textarea wire:model='terms' id="terms" name='terms' id="terms"></x-textarea>
                                </div>
                            </div>
            
                            <div wire:ignore>
                                <x-label for="article">Article</x-label>
                                <div id="container">
                                    <x-textarea wire:model='article' id="article" name='article' id="article"></x-textarea>
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

    <script>
        const promo_type = document.getElementById('promoType');
        const game_type = document.getElementById('gameType');

        promo_type.addEventListener('change', function handleChange(event) {
            if(event.target.value === 'click_to_join') {
                game_type.style.display = 'block'
            } else {
                game_type.style.display = 'none'
            }
        });
    </script>

    <script>
        tinymce.init({
            selector: '#description',
            forced_root_block: false,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('change', function (e) {
                    @this.set('description', editor.getContent());
                });
            }
        });

        tinymce.init({
            selector: '#terms',
            forced_root_block: false,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('change', function (e) {
                    @this.set('terms', editor.getContent());
                });
            }
        });

        tinymce.init({
            selector: '#article',
            forced_root_block: false,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('change', function (e) {
                    @this.set('article', editor.getContent());
                });
            }
        });
    </script>

</div>


<div>
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
                                            <span class="flex-none text-sm text-slate-400">
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
                                            <div class="flex-1 pt-8 xl:pt-0">
                                                <x-label for="platforms_select">Platforms</x-label>
                                                <div wire:ignore>
                                                    <x-select wire:model='platforms' class="w-full" id="platforms_select" multiple='multiple'>
                                                        @foreach ($platformsData as $platform)
                                                            <option value="{{$platform->id}}">{{$platform->name}}</option>
                                                        @endforeach
                                                    </x-select>
                                                </div>

                                                @error('platforms')
                                                    <span class="text-rose-500">{{ $message }}</span>
                                                @enderror
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

                                <div id="textHelper">
                                    <div class="flex flex-row items-center space-x-1 mt-2">
                                        <span class="text-sm text-slate-400">After creating this promo you can manage your question by clicking view </span>
                                        <span>
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-slate-400">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>


                            {{-- CREATE QUESTIONS
                            <div class="questionGameType">
                                <div class="border-2 border-dashed p-10 border-slate-300 bg-slate-100">
                                    <x-title class="!text-base border-b-2 border-slate-200 mb-4 pb-2 uppercase">Manage Questions</x-title>

                                    @foreach ($questionInputs as $key => $value)
                                        <div class="add-input mb-10">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-1 w-full">
                                                    <x-input-text type="text" wire:model="questionTitle.{{$value}}" class="my-5"></x-input-text>
                                                </div>
                                                <div>
                                                    <x-select>
                                                        <option value="single_select">Single select</option>
                                                        <option value="multiple_select">Multiple select</option>
                                                        <option value="comment">Comment</option>
                                                    </x-select>
                                                </div>
                                                <div>
                                                    <button wire:click.prevent='remove({{ $key }})' class="text-rose-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                          </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="flex flex-col">
                                                <div class="flex flex-row">
                                                    <x-input-text type="text"></x-input-text>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="flex justify-center mt-10">
                                        <x-button wire:click.prevent='add({{$i}})' class="!float-none">Add Question</x-button>
                                    </div>

                                </div>
                            </div> --}}

                        </div>
                    </div>


                    <div>
                        <x-title class="!text-base border-b-2 border-slate-200 mb-4 pb-2 uppercase">Promo Duration</x-title>
                        <div class="space-y-8 mb-20">
                            <div  class="mb-8 gap-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <div wire:ignore class="relative">
                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-slate-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                </svg>
                                            </div>
                                            <x-input-text type="date" wire:model='start_date' id="start_date" class="focus:ring-indigo-600 focus:border-indigo-600 block w-full ps-10 p-2.5" placeholder="Select start date" ></x-input-text>
                                        </div>
                                        @error('start_date')
                                            <span class="text-rose-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- <span class="mx-4 text-slate-500">to</span> --}}

                                    <div>
                                        <div wire:ignore class="relative">
                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-slate-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                </svg>
                                            </div>
                                            <x-input-text type="date" wire:model='end_date' id="end_date" class="focus:ring-indigo-600 focus:border-indigo-600 block w-full ps-10 p-2.5" placeholder="Select end date" ></x-input-text>
                                        </div>
                                        @error('end_date')
                                            <span class="text-rose-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="absolute top-0 right-0">
                                <x-label for="is_visible">Status</x-label>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked name="is_visible" value="0" class="sr-only peer" wire:model='is_visible'>
                                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
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
                                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                                    </label>
                                    </div>
                                <div>
                                    <div>
                                        <x-label for="is_banner">Is Banner?</x-label>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" checked name="is_banner" value="0" class="sr-only peer" wire:model='is_banner'>
                                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
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
                                        <div>
                                            <x-textarea wire:model='description' name='description' id="description"></x-textarea>
                                        </div>
                                    </div>
                                </div>

                                <div wire:ignore>
                                    <x-label for="terms">Terms and Conditions</x-label>
                                    <div id="container">
                                        <x-textarea wire:model='terms' id="terms" name='terms'></x-textarea>
                                    </div>
                                </div>

                                <div wire:ignore>
                                    <x-label for="article">Article</x-label>
                                    <div id="container">
                                        <x-textarea wire:model='article' id="article" name='article'></x-textarea>
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




        @script()
            <script>
                $(document).ready(function() {
                    $('#platforms_select').select2();
                    $('#platforms_select').on('change', function() {
                        let $data = $(this).val();
                        $wire.set('platforms', $data);
                    });
                });
            </script>
        @endscript

        {{-- <script>
            const start_date = document.getElementById("start_date");
            start_date.addEventListener("click", (event) => {
                @this.set('start_date', event.target.value);
            });

            const end_date = document.getElementById("end_date");
            end_date.addEventListener("click", (event) => {
                @this.set('end_date', event.target.value);
            });
        </script> --}}

        <script>
            window.addEventListener("load", function() {
            elStart = document.getElementById("start_date");
            elEnd = document.getElementById("end_date");
            elStart.addEventListener("blur", (event) => {
                @this.set('start_date', event.target.value);
            });
            elEnd.addEventListener("blur", (event) => {
                @this.set('end_date', event.target.value);
            });
            });
        </script>



        <script>
            //Alert
            document.addEventListener('livewire:initialized', ()=>{
                @this.on('created', (event)=>{
                    const data=event
                    swal.fire({
                        title:data[0]['title'],
                        text:data[0]['text'],
                        icon:data[0]['icon'],
                    }).then(function() {
                        location.reload();
                    })
                });
            });

            //Show Hide game type
            const promo_type = document.getElementById('promoType');
            const game_type = document.getElementById('gameType');
            const text_helper = document.getElementById('textHelper');
            promo_type.addEventListener('change', function handleChange(event) {
                if(event.target.value === 'click_to_join') {
                    game_type.style.display = 'block'
                } else {
                    game_type.style.display = 'none'
                }
            });
            game_type.addEventListener('change', function handleChange(event) {
                if(event.target.value === 'multiple_choice') {
                    text_helper.style.display = 'block'
                } else {
                    text_helper.style.display = 'none'
                }
            });


            //tinymce editor
            tinymce.init({
                selector: '#description',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',

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
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',

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
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',

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
</div>

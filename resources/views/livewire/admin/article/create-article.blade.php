<div>
    <div class="relative">
        <div class="flex">
            <div class="flex-1 flex flex-col space-y-1">
                <x-title>Create News</x-title>
            </div>
        </div>
        <form wire:submit.prevent="storeArticle">
            <div class="space-y-5 mt-10">
                <div>
                    <x-label>Title</x-label>
                    <x-input-text wire:model="title"></x-input-text>
                    @error('title')
                        <span class="text-rose-500 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div>
                    <x-label>Language</x-label>
                    <x-select wire:model="language_id">
                        <option value="" selected class="hidden">Select language</option>
                        @foreach ($getLanguages as $language)
                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                        @endforeach
                    </x-select>
                    @error('language_id')
                        <span class="text-rose-500 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div wire:ignore>
                    <x-label>Category</x-label>
                    <x-select wire:model="article_categories" id="article_categories" multiple>
                        @foreach ($getCategories as $getCategory)
                            <option value="{{ $getCategory['id'] }}">{{ $getCategory['title'] }}</option>
                        @endforeach
                    </x-select>
                    {{-- @error('article_categories')
                        <span class="text-rose-500 text-sm">{{$message}}</span>
                    @enderror --}}
                </div>

                <div wire:ignore>
                    <x-label class="!mb-0 !pb-0">Sub Category (nullable)</x-label>
                    <small class="text-slate-400">Commonly use for "How to Guides" category only.</small>
                    <x-select wire:model="article_sub_category">
                        <option value="" selected class="hidden">--Select here--</option>
                        @foreach ($getSubCategories as $getSubCategory)
                            <option value="{{ $getSubCategory['id'] }}">{{ $getSubCategory['title'] }}</option>
                        @endforeach
                    </x-select>
                </div>

                <div wire:ignore>
                    <x-label>Tags</x-label>
                    <x-select wire:model="article_tags" id="article_tags" multiple>
                        @foreach ($getTags as $getTag)
                            <option value="{{ $getTag['id'] }}">{{ $getTag['title'] }}</option>
                        @endforeach
                    </x-select>
                    @error('article_tags')
                        <span class="text-rose-500 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div>
                    <x-label>Demo URL (Optional)</x-label>
                    <x-input-text wire:model="demo_url"></x-input-text>
                </div>

                <div>
                    <x-label>Short Description</x-label>
                    <x-textarea wire:model="short_description" class="w-full !h-40"></x-textarea>
                    @error('short_description')
                        <span class="text-rose-500 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div wire:ignore>
                    <x-label>Description</x-label>
                    <x-textarea wire:model="description" class="w-full !h-40" id="description"></x-textarea>
                    @error('description')
                        <span class="text-rose-500 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="absolute top-0 right-0">
                    <x-label for="is_visible">Status</x-label>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked name="is_visible" value="0" class="sr-only peer" wire:model='is_visible'>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                    </label>
                </div>

                <div class="flex-none pt-8 xl:pt-0">
                    <x-label for="image">Image</x-label>
                    <div class="flex items-center justify-left w-full">
                        <label for="dropzone-file" class="overflow-hidden flex flex-col items-center justify-center w-96 h-52 border-2 border-slate-300 border-dashed cursor-pointer bg-slate-50">
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
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="pt-10 flex space-x-4">
                    <x-button wire:target="storeArticle" type="submit" class="!float-none">Save</x-button>
                    <x-href href="{{ route('articles.index') }}" class="!float-none !bg-transparent !text-indigo-600">Cancel</x-button>
                </div>
            </div>
        </form>
    </div>



    @script()
        <script>
            $(document).ready(function() {
                $('#article_categories').select2();
                $('#article_categories').on('change', function() {
                    let $data = $(this).val();
                    $wire.set('article_categories', $data);
                });
            });
        </script>
    @endscript

    @script
        <script>
            $(document).ready(function() {
                $('#article_tags').select2();
                $('#article_tags').on('change', function() {
                    let $data = $(this).val();
                    $wire.set('article_tags', $data);
                });
            });
        </script>
    @endscript

    <script>
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
    </script>

    <script>
         window.addEventListener('created',function(e){ 
                Swal.fire({
                    title: 'Created',
                    text: 'Article created successfully',
                    icon: 'success',
                    iconColor: 'lightgreen'
                }).then(function() {
                    location.reload();
                });
            });
    </script>
</div>
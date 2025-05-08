<div>
    <div class="relative">
        <div class="flex">
            <div class="flex-1 flex flex-col space-y-1">
                <x-title>Create Question</x-title>
            </div>
        </div>

        <form wire:submit.prevent="storeQuestion">
            <div class="space-y-5 mt-10">
                <div>
                    <x-label>Question</x-label>
                    <x-input-text wire:model="question_title"></x-input-text>
                    @error($question_title)
                        <span class="text-rose-500 text-sm">{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <x-label>Type</x-label>
                    <x-select wire:model="question_type" id="selectType">
                        <option value="" class="hidden" select>--Select type--</option>
                        <option value="single_select">Single Select</option>
                        <option value="multiple_select">Multiple Select</option>
                        <option value="comment">Comment</option>
                    </x-select>
                    @error($question_type)
                        <span class="text-rose-500 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div wire:ignore.self class="space-y-5">
                    @foreach ($choices as $key => $item)
                        <div wire:key="{{$key}}" class="flex justify-between items-center relative">
                            <span class="pe-2 font-medium text-slate-600">{{ $key + 1 }}</span>
                            <x-input-text wire:model="choices.{{$key}}.choice" class="overflow-hidden"></x-input-text>
                            <div class="absolute right-0 flex justify-between">
                                {{-- <x-button wire:click.prevent="addInputRow" class="!bg-blue-500 !border-0 !px-2 !rounded-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </x-button> --}}
                                <x-button wire:click.prevent="removeInputRow({{$key}})" class="!bg-transparent !border-0 !px-2 !text-slate-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                      </svg>
                                </x-button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-between">
                    <x-button wire:ignore wire:click.prevent="addInputRow" id="btnChoice" class="!float-none !bg-transparent !text-indigo-600">Add Choices</x-button>
                    <x-button wire:target="storeQuestion" class="!float-none">Save</x-button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    const select_type = document.getElementById('selectType');
    const btn_choice = document.getElementById('btnChoice');
    select_type.addEventListener('change', function handleChange(event) {
        if(event.target.value == 'single_select' || event.target.value == 'multiple_select') {
            btn_choice.style.display = 'block'
        } else {
            btn_choice.style.display = 'none'
        }
    });
</script>

<script>
    document.addEventListener('livewire:initialized', ()=>{
        @this.on('created', (event)=>{
            const data=event
            swal.fire({
                title:data[0]['title'],
                text:data[0]['text'],
                icon:data[0]['icon'],
            }).then(function() {
                location.reload();
            });
        });
    });
</script>

<script>
    window.addEventListener('refresh-page', event => {
       window.location.reload(false); 
    })
</script>

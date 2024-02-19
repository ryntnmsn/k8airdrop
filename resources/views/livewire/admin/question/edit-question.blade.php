<div>
    <div class="relative">
        <div class="flex">
            <div class="flex-1 flex flex-col space-y-1">
                <x-title>Edit Question</x-title>
                <x-text-helper>Manage promo by using operations create, update and delete.</x-text-helper>
            </div>
        </div>
        {{ $promo_id }}
        {{ $question_id }}
        <form wire:submit.prevent="updateQuestion">
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
                        <option value="single_select" @if($question_type == 'single_select') selected @endif>Single Select</option>
                        <option value="multiple_select" @if($question_type == 'multi_select') selected @endif>Multiple Select</option>
                        <option value="comment" @if($question_type == 'comment') selected @endif>Comment</option>
                    </x-select>
                    @error($question_type)
                        <span class="text-rose-500 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div wire:ignore.self class="space-y-5">
                    @foreach ($choices as $key => $item)
                        <div wire:key="{{$key}}" class="flex justify-between items-center relative">
                            <span class="pe-2 font-medium text-slate-400">{{ $key + 1 }}</span>
                            <x-input-text wire:model="choices.{{$key}}.choice" class="overflow-hidden"></x-input-text>
                            <div class="absolute right-0 flex justify-between">
                                <x-button wire:click.prevent="removeInputRow({{$key}})" class="!bg-rose-500 !border-0 !px-2 !rounded-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                    </svg>
                                </x-button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-between">
                    <x-button wire:ignore wire:click.prevent="addInputRow" id="" class="!float-none !bg-transparent !text-indigo-500">Add Choices</x-button>
                    <x-button wire:target="updateQuestion" class="!float-none">Update</x-button>
                </div>
            </div>
        </form>
    </div>
</div>


{{-- <script>
    const select_type = document.getElementById('selectType');
    const btn_choice = document.getElementById('btnChoice');
    select_type.addEventListener('change', function handleChange(event) {
        if(event.target.value == 'single_select' || event.target.value == 'multiple_select') {
            btn_choice.style.display = 'block'
        } else {
            btn_choice.style.display = 'none'
        }
    });
</script> --}}
{{-- 
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
</script> --}}

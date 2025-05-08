<div>
    <div class="relative">
        <div class="flex">
            <div class="flex-1 flex flex-col space-y-1">
                <x-title>Edit Question</x-title>
            </div>
        </div>
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
                            {{-- <x-input-text wire:model="choices.{{$key}}.id"></x-input-text> --}}
                            <x-input-text wire:model="choices.{{$key}}.choice" class="overflow-hidden"></x-input-text>
                            <div class="absolute right-0 flex justify-between items-center">

                                <x-button wire:click.prevent="removeChoiceRow({{ $item['id']}})" class="!bg-transparent !border-0 !px-2 !rounded-none !text-rose-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </x-button>

                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-between">
                    <x-button disabled wire:ignore wire:click.prevent="addInputRow" id="" class="!float-none !bg-transparent !text-indigo-600">Add Choices</x-button>
                    <x-button wire:target="updateQuestion" class="!float-none">Update</x-button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    window.addEventListener('refresh-page', event => {
       window.location.reload(false);
    })
</script>

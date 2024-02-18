<div>
    <div class="relative">
        <div class="flex">
            <div class="flex-1 flex flex-col space-y-1">
                <x-title>Create Question</x-title>
                <x-text-helper>Manage promo by using operations create, update and delete.</x-text-helper>
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

                <div wire:ignore.self class="space-y-5" id="choiceContainer">
                        <div class="flex justify-between items-center relative">
                            <x-input-text wire:model="choices.0.choice" class="overflow-hidden"></x-input-text>
                            <div class="absolute right-0 flex justify-between">
                                <x-button wire:ignore.self wire:click.prevent="addInputRow" class="!bg-blue-500 !border-0 !px-2 !rounded-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </x-button>
                            </div>
                        </div>
                    @foreach ($choices as $key => $item)
                        <div wire:key="{{$key}}" class="flex justify-between items-center relative">
                            <x-input-text wire:model="choices.{{$key}}.choice" class="overflow-hidden"></x-input-text>
                            <div class="absolute right-0 flex justify-between">
                                <x-button wire:click.prevent="addInputRow" class="!bg-blue-500 !border-0 !px-2 !rounded-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </x-button>
                                <x-button wire:click.prevent="removeInputRow({{$key}})" class="!bg-rose-500 !border-0 !px-2 !rounded-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                    </svg>
                                </x-button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div>
                    <x-button wire:target="storeQuestion" class="!float-none">Save</x-button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    const select_type = document.getElementById('selectType');
    const choice_container = document.getElementById('choiceContainer');
    select_type.addEventListener('change', function handleChange(event) {
        if(event.target.value == 'single_select' || event.target.value == 'multiple_select') {
            choice_container.style.display = 'block'
        }
    });
</script>

<div>
    <div class="flex pb-8">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>View Promo</x-title>
        </div>
    </div>

    <div class="py-20">
        <input wire:model.live='question_title' type="text">
    </div>

    <div class="pb-10">
        <div class="flex flex-col lg:flex-row space-x-0 space-y-5 lg:space-y-0 lg:space-x-5 lg:items-center">
            <div class="p-1 rounded-lg flex-none">
                <img src="{{ url('storage/promos/', $image) }}" alt="" class="w-40 rounded-lg">
            </div>
            <div class="flex flex-col">
                <x-label class="!font-medium block !text-xl">{{ $name }}</x-label>
                <x-label class="!text-slate-400">{{ $slug }}</x-label>
                <x-label class="!text-slate-400 block">
                    @if($is_visible == '1')
                        <span class="bg-green-100 text-green-500 font-medium px-2 rounded-full">Active</span>
                    @else
                        <span class="bg-rose-100 text-rose-500 font-medium px-2 rounded-full">Inactive</span>
                    @endif
                </x-label>
            </div>
        </div>
    </div>

    <!--Tabs navigation-->
    <ul wire:ignore
      class="mb-5 flex list-none flex-row flex-wrap border-b-0 pl-0 bg-slate-100"
      role="tablist"
      data-te-nav-ref>
      <li role="presentation">
        <a
          href="#basic-information"
          class="block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 font-medium leading-tight text-slate-500 hover:isolate hover:border-transparent hover:bg-slate-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-indigo-500 data-[te-nav-active]:text-indigo-500 "
          data-te-toggle="pill"
          data-te-target="#basic-information"
          data-te-nav-active
          role="tab"
          aria-controls="basic-information"
          aria-selected="true"
          >Basic Informations</a
        >
      </li>
      <li role="presentation">
        <a
          href="#participant"
          class="block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 font-medium leading-tight text-slate-500 hover:isolate hover:border-transparent hover:bg-slate-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-indigo-500 data-[te-nav-active]:text-indigo-500 "
          data-te-toggle="pill"
          data-te-target="#participant"
          role="tab"
          aria-controls="participant"
          aria-selected="false"
          >Participants</a
        >
      </li>
      <li role="presentation">
        <a
          href="#manage-question"
          class="block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 font-medium leading-tight text-slate-500 hover:isolate hover:border-transparent hover:bg-slate-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-indigo-500 data-[te-nav-active]:text-indigo-500 "
          data-te-toggle="pill"
          data-te-target="#manage-question"
          role="tab"
          aria-controls="manage-question"
          aria-selected="false"
          >Manage Questions</a
        >
      </li>
    </ul>

    <!--Tabs content-->
    <div wire:ignore class="mb-6">
      <div
        class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
        id="basic-information"
        role="tabpanel"
        aria-labelledby="basic-information-tab"
        data-te-tab-active>
        <div>
            <div class="flex flex-col lg:flex-row border-b border-slate-200 py-6">
                <div class="flex-1 flex flex-col lg:pb-0 pb-6">
                    <x-label class="!text-slate-400 block pb-1">Duration</x-label>
                    <x-label class="!font-medium block !mb-0">
                        {{date('F j', strtotime($promo->start_date))}} - {{date('F j, Y', strtotime($promo->end_date))}}
                    </x-label>
                </div>
                <div class="flex-1 flex flex-col pt-6 lg:pt-0 lg:border-0 border-t border-slate-200">
                    <x-label class="!text-slate-400 block pb-1">Platforms</x-label>
                    <x-label class="!font-medium block !mb-0">
                        @foreach ($platforms as $platform)
                            <span class="rounded-full bg-slate-100 text-slate-500 px-2">{{ $platform }}</span>
                        @endforeach
                    </x-label>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row border-b border-slate-200 py-6">
                <div class="flex-1 flex flex-col lg:pb-0 pb-6">
                    <x-label class="!text-slate-400 block pb-1">Prize Pool</x-label>
                    <x-label class="!font-medium block !mb-0">
                        <span>{{ $prize_pool }}</span>
                    </x-label>
                </div>
                <div class="flex-1 flex flex-col pt-6 lg:pt-0 lg:border-0 border-t border-slate-200">
                    <x-label class="!text-slate-400 block pb-1">Promo type</x-label>
                    <x-label class="!font-medium block">
                        <span class="capitalize">{{ str_replace('_', ' ', $type) }}</span>
                    </x-label>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row border-b border-slate-200 py-6">
                <div class="flex-1 flex flex-col lg:pb-0 pb-6">
                    <x-label class="!text-slate-400 block pb-1">Language</x-label>
                    <x-label class="!font-medium block !mb-0">
                        <span>{{ $language_id->name }}</span>
                    </x-label>
                </div>
                <div class="flex-1 flex flex-col pt-6 lg:pt-0 lg:border-0 border-t border-slate-200">
                    <x-label class="!text-slate-400 block pb-1">Game type</x-label>
                    <x-label class="!font-medium block !mb-0">
                        @if($game_type == '')
                            <span>N/A</span>
                        @else
                            <span class="capitalize">{{ str_replace('_', ' ', $game_type) }}</span>
                        @endif
                    </x-label>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row border-b border-slate-200 py-6">
                <div class="flex-1 flex flex-col lg:pb-0 pb-6">
                    <x-label class="!text-slate-400 block pb-1">Is featured?</x-label>
                    <x-label class="!font-medium block !mb-0">
                        @if($is_featured == '1')
                            <span>Yes</span>
                        @else
                            <span>No</span>
                        @endif
                    </x-label>
                </div>
                <div class="flex-1 flex flex-col pt-6 lg:pt-0 lg:border-0 border-t border-slate-200">
                    <x-label class="!text-slate-400 block pb-1">Is banner?</x-label>
                    <x-label class="!font-medium block !mb-0">
                        @if($is_banner == '1')
                            <span>Yes</span>
                        @else
                            <span>No</span>
                        @endif
                    </x-label>
                </div>
            </div>

            @if($button_name != '' || $button_link != '')
                <div class="flex flex-col lg:flex-row border-b border-slate-200 py-6">
                    <div class="flex-1 flex flex-col lg:pb-0 pb-6">
                        <x-label class="!text-slate-400 block pb-1">Button name</x-label>
                        <x-label class="!font-medium block !mb-0">
                           <span> {{ $button_name }}</span>
                        </x-label>
                    </div>
                    <div class="flex-1 flex flex-col pt-6 lg:pt-0 lg:border-0 border-t border-slate-200">
                        <x-label class="!text-slate-400 block pb-1">Button link</x-label>
                        <x-label class="!font-medium block !mb-0">
                            <span> {{ $button_link }}</span>
                        </x-label>
                    </div>
                </div>
            @endif

            <div class="flex flex-row border-b border-slate-200">
                <div class="flex-1 flex flex-col">
                    <div id="accordion-collapse" data-accordion="collapse">
                        <h2 id="accordion-collapse-heading-1">
                            <button type="button" class="py-6 flex items-center justify-between w-full font-medium rtl:text-right gap-3 bg-transparent" data-accordion-target="#accordion-collapse-body-1" aria-expanded="false" aria-controls="accordion-collapse-body-1">
                            <x-label class="!text-slate-400 block !mb-0">Description</x-label>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                            </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                            <div class="pb-5">
                                <x-label class="!font-medium block">
                                    {!! $description !!}
                                </x-label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-row border-b border-slate-200">
                <div class="flex-1 flex flex-col">
                    <div id="accordion-collapse-2" data-accordion="collapse">
                        <h2 id="accordion-collapse-heading-2">
                            <button type="button" class="py-6 flex items-center justify-between w-full font-medium rtl:text-right gap-3 bg-transparent" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                            <x-label class="!text-slate-400 block !mb-0">Terms and Conditions</x-label>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                            </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                            <div class="pb-5">
                                <x-label class="!font-medium block">
                                    {!! $terms !!}
                                </x-label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-row border-b border-slate-200">
                <div class="flex-1 flex flex-col">
                    <div id="accordion-collapse-3" data-accordion="collapse">
                        <h2 id="accordion-collapse-heading-3">
                            <button type="button" class="py-6 flex items-center justify-between w-full font-medium rtl:text-right gap-3 bg-transparent" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                            <x-label class="!text-slate-400 block !mb-0">Article</x-label>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                            </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                            <div class="pb-5">
                                <x-label class="!font-medium block">
                                    {!! $article !!}
                                </x-label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div
        class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
        id="participant"
        role="tabpanel"
        aria-labelledby="participant-tab">
        Tab 2 content
      </div>
      <div
        class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
        id="manage-question"
        role="tabpanel"
        aria-labelledby="manage-question-tab">
            @if($type == 'click_to_join' && $game_type == 'multiple_choice')
            <div>
                <div class="py-6">
                    <div class="flex items-center justify-between pb-8">
                        <div>
                            <span class="text-2xl font-medium text-slate-600">Questions</span>
                            <x-text-helper>Manage questions by using opearation add, edit and delete.</x-text-helper>
                        </div>
                        <div>
                            <div class="flex-1">
                                <x-button data-modal-target="default-modal" data-modal-toggle="default-modal" >
                                    <span>
                                        Create
                                    </span>
                                </x-button>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto sm:rounded-lg">
                        <table class="w-full text-left rtl:text-right rounded-2xl text-slate-600 ">
                            <thead class="bg-slate-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-2 uppercase text-xs">
                                        No.
                                    </th>
                                    <th scope="col" class="px-6 py-3 uppercase text-xs">
                                        Question
                                    </th>
                                    <th scope="col" class="px-6 py-3 uppercase text-xs">
                                        Type
                                    </th>
                                    <th scope="col" class="px-6 py-3 uppercase text-xs">
                                        Created at
                                    </th>
                                    <th scope="col" class="px-6 py-3 uppercase text-xs">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($questions as $question)
                                    <tr class="border-b hover:bg-slate-100 rounded-xl">
                                        <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap w-2">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td row='scope' class="px-6 py-3 font-medium w-[500px]">
                                            {{ $question->question_title }}
                                        </td>
                                        <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                            {{ $question->question_type }}
                                        </td>
                                        <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                            {{ $question->created_at->diffForHumans() }}
                                        </td>
                                        <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                            <x-button wire:click='editQuestion({{ $question->id }})' data-modal-target="edit-default-modal" data-modal-toggle="edit-default-modal" >Edit</x-button>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
      </div>
    </div>




<!-- add modal -->
<div wire:ignore.self id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[820px] max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-slate-600 dark:text-white">
                    Add Question
                </h3>
                <button type="button" class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div>
                @if(session('statusAdded'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="p-4 pb-0 md:p-6 md:pb-0">
                        <div class="bg-green-200 text-green-500 rounded flex items-center p-5 space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>{{ session('statusAdded') }}</span>
                        </div>
                    </div>
                @endif
            </div>
            <!-- Modal body -->
            <form wire:submit.prevent='storeQuestion'>
                <div class="p-4 md:p-5 space-y-4">
                    <div>
                        <x-label for="question_title">Title</x-label>
                        <x-input-text wire:model="question_title" id="question_title"></x-input-text>
                        @error('question_title')
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <x-label for="question_type">Type</x-label>
                        <x-select wire:model="question_type" id="question_type">
                            <option value="single_select">Single select</option>
                            <option value="multiple_select">Multiple select</option>
                            <option value="comment">Comment</option>
                        </x-select>
                        @error('question_type')
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                  
                    <div>
                        @foreach ($choices as $key => $choice)
                            <div wire:key="{{ $key }}" class="mb-2">
                                <div class="flex">
                                    <x-input-text wire:model="choices.{{ $key }}.choice"></x-input-text>
                                    <x-button wire:click.prevent="deleteRowForChoice({{ $key }})">delete</x-button>
                                </div>
                            </div>
                        @endforeach
                    </div> 
                </div>
            
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-slate-200 rounded-b">
                <x-button wire:click.prevent="addRowForChoice()">Add</x-button>
                <x-button wire:target="storeQuestion">Save</x-button>
            </div>
            </form>
        </div>
    </div>
</div>






<!-- edit modal -->
<div wire:ignore.self id="edit-default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[820px] max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-slate-600 dark:text-white">
                    Edit Question
                </h3>
                <button type="button" class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="edit-default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form wire:submit.prevent='updateQuestion'>
                <div class="p-4 md:p-5 space-y-4">
                    <div>
                        <x-label for="question_title">Title</x-label>
                        
                        <x-input-text wire:model.defer="question_title" value="{{ $question_title }}" name="question_title"></x-input-text>
                        
                        @error('question_title')
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <x-label for="question_type">Type</x-label>
                        <x-select wire:model="question_type">
                            <option value="single_select" @if($question_type == 'single_select') selected @endif>Single select</option>
                            <option value="multiple_select" @if($question_type == 'multiple_select') selected @endif>Multiple select</option>
                            <option value="comment" @if($question_type == 'comment') selected @endif>Comment</option>
                        </x-select>
                        @error('question_type')
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        @foreach ($choices as $key => $choice)
                            <div wire:key="{{ $key }}" class="mb-2">
                                <div class="flex">
                                    <x-input-text wire:model.defer="choices.{{ $key }}.choice"></x-input-text>
                                    <x-button wire:click.prevent="deleteRowForChoice({{ $key }})">delete</x-button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-slate-200 rounded-b">
                    <x-button wire:click.prevent="addRowForChoice()">Add</x-button>
                    <x-button wire:target="updateQuestion">Save</x-button>
                </div>
            </form>
        </div>
    </div>
</div>






{{-- <!-- Edit question modal -->
<div wire:ignore.self id="editQuestion-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[800px] max-h-full">

        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-6 border-b rounded-t">
                <h3 class="text-xl font-semibold text-slate-600">
                    Edit Questions
                </h3>
                <button type="button" class="end-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="editQuestion-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            @if(session('updatedAdded'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="p-4 pb-0 md:p-6 md:pb-0">
                    <div class="bg-green-200 text-green-500 rounded flex items-center p-5 space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span>{{ session('updatedAdded') }}</span>
                    </div>
                </div>
            @endif

            <form wire:submit.prevent="updateQuestion">
                <div class="p-4 md:p-6 space-y-4">
                    <div>
                        <x-label for="question_title">Title</x-label>
                        <x-input-text wire:model="question_title" id="question_title" value="{{$question_title}}"></x-input-text>
                        @error('question_title')
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <x-label for="question_type">Type</x-label>
                        <x-select wire:model="question_type" id="question_type">
                            <option value="single_select" @if($question_type == 'single_select') selected @endif>Single select</option>
                            <option value="multiple_select" @if($question_type == 'multiple_select') selected @endif>Multiple select</option>
                            <option value="comment" @if($question_type == 'comment') selected @endif>Comment</option>
                        </x-select>
                        @error('question_type')
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        @if($choices == true)
                            
                              
                                @foreach ($choices as $key => $value)
                                    <div class="mb-4">
                                        <div class="flex w-full items-center justify-between">
                                            <div class="w-full">
                                                <x-input-text wire:model="choices.{{ $key }}.choice" value="{{ $value->choice }}" class="!w-full"></x-input-text>
                                            </div>
                                            <div>
                                                <x-href wire:click.prevent="" class="!bg-transparent !text-rose-500 px-3 !border-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </x-href>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            
                        @endif
                       
                        @foreach ($inputs as $key => $value)
                            <div class="add-input mb-4">
                                <div class="flex w-full items-center justify-between">
                                    <div class="w-full">
                                        <x-input-text wire:model="inputs.{{ $key }}.choice" class="!w-full"></x-input-text>
                                    </div>
                                    <div>
                                        <x-href wire:click="removeInputs({{$key}})" class="!bg-transparent !text-rose-500 px-3 !border-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </x-href>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex items-center justify-between border-t p-4 md:p-6">
                    <x-href  wire:click.prevent="add()" class="block !float-none !bg-transparent !text-indigo-500 !hover:text-indigo-600 !border-indigo-500">Add options</x-href>
                    <x-button wire:target="updateQuestion" class="block !float-none">Save Question</x-button>
                </div>

            </form>
        </div>
    </div>
</div> --}}




{{-- <!-- Add question modal -->
<div wire:ignore.self id="addQuestion-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[800px] max-h-full">

        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-6 border-b rounded-t">
                <h3 class="text-xl font-semibold text-slate-600">
                    Add Questions
                </h3>
                <button type="button" class="end-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="addQuestion-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            @if(session('statusAdded'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="p-4 pb-0 md:p-6 md:pb-0">
                    <div class="bg-green-200 text-green-500 rounded flex items-center p-5 space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span>{{ session('statusAdded') }}</span>
                    </div>
                </div>
            @endif

            <form wire:submit.prevent="storeQuestion">
                <div class="p-4 md:p-6 space-y-4">
                    <div>
                        <x-label for="question_title">Title</x-label>
                        <x-input-text wire:model="question_title" id="question_title"></x-input-text>
                        @error('question_title')
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <x-label for="question_type">Type</x-label>
                        <x-select wire:model="question_type" id="question_type">
                            <option value="" selected class="hidden">Select Type</option>
                            <option value="single_select">Single select</option>
                            <option value="multiple_select">Multiple select</option>
                            <option value="comment">Comment</option>
                        </x-select>
                        @error('question_type')
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        @foreach ($inputs as $key => $value)
                            <div class="add-input mb-4">
                                <div class="flex w-full items-center justify-between">
                                    <div class="w-full">
                                        <x-input-text wire:model="inputs.{{ $key }}.choice"  class="!w-full"></x-input-text>
                                    </div>
                                    <div>
                                        <x-href wire:click="removeInputs({{$key}})" class="!bg-transparent !text-rose-500 px-3 !border-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </x-href>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="flex items-center justify-between border-t p-4 md:p-6">
                    <x-href class="block !float-none !bg-transparent !text-indigo-500 !hover:text-indigo-600 !border-indigo-500" wire:click="addInputs">Add options</x-href>
                    <x-button wire:target="storeQuestion" class="block !float-none">Save Question</x-button>
                </div>

            </form>
        </div>
    </div>
</div> --}}

</div>

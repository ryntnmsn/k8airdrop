<div>
    <div class="flex pb-8">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>View Promo</x-title>
        </div>
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
                            <span class="text-lg font-medium text-slate-600">Questions</span>
                            <x-text-helper>Manage questions by using opearation add, edit and delete.</x-text-helper>
                        </div>
                        <div>
                            <div class="flex-1">
                                <x-button data-modal-target="addQuestion-modal" data-modal-toggle="addQuestion-modal" >
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
                                        <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                            {{ $question->title }}
                                        </td>
                                        <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                            {{ $question->type }}
                                        </td>
                                        <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                            {{ $question->created_at->diffForHumans() }}
                                        </td>
                                        <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                            edit delete
                                        </td>
                                    </tr>
                                @empty
                                    No questions found
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
      </div>
    </div>



<!-- Add question modal -->
<div wire:ignore.self id="addQuestion-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[800px] max-h-full">

        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-slate-600 dark:text-white">
                    Add Questions
                </h3>
                <button type="button" class="end-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="addQuestion-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="#">
                    <div>
                        <x-label>Question title</x-label>
                        <x-input-text></x-input-text>
                    </div>
                    <div>
                        <x-label>Type</x-label>
                        <x-select>
                            <option value="single_select">Single select</option>
                            <option value="multiple_select">Multiple select</option>
                            <option value="comment">Comment</option>
                        </x-select>
                    </div>
                    <div>
                        <x-button class="block !float-none add-btn" wire:click.prevent="add({{ $i }})">Add options</x-button>
                    </div>
                    <div>
                        @foreach ($inputs as $key => $value)
                            <div class="add-input">
                                <x-input-text></x-input-text>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    document.querySelector('.add-btn').addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        @this.call('render');
    });
</script>
@endpush










</div>
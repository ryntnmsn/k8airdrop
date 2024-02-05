<div>
    <div class="flex pb-8">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>View Promo</x-title>
        </div>
    </div>

    <div class="flex flex-col">
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

        <div class="wrapper">
            <div class="tab flex items-center space-x-3 border-b-4 border-slate-200 bg-slate-100">
                <button class="py-3 px-6 text-base flex items-center space-x-2 tabButton active" data-id="basic">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                    </svg>
                    Basic Informations
                </button>
                @if($type == 'click_to_join')
                    <button class="py-3 px-6 text-base flex items-center space-x-2 tabButton" data-id="participants">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        Participants
                    </button>
                @endif
                @if($type == 'click_to_join' && $game_type == 'multiple_choice')
                    <button class="py-3 px-6 text-base flex items-center space-x-2 tabButton" data-id="questions">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>
                        Manage Questions ({{ $questions->count() }})
                    </button>
                @endif
            </div>
            <div class="p-3 tabContents">
                <div id="basic" class="active tabContent">
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


                {{-- MANAGE PARTICIPANTS --}}
                @if($type == 'click_to_join')
                    <div id="participants" class="tabContent">
                        <div class="py-6">
                            Participants
                        </div>
                    </div>
                @endif

                {{-- MANAGE QUESTIONS --}}
                @if($type == 'click_to_join' && $game_type == 'multiple_choice')
                    <div id="questions" class="tabContent">
                        <div class="py-6">
                           
                            <div class="flex items-center justify-between pb-8">
                                <div>
                                    <span class="text-lg font-medium">Questions</span>
                                    <x-text-helper>Manage questions by using opearation add, edit and delete.</x-text-helper>
                                </div>
                                <div>
                                    <div class="flex-1">
                                        <form action="{{ route('promos.create') }}" method="get">
                                            <x-button type="submit">
                                                <span>
                                                    Create
                                                </span>
                                            </x-button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-x-auto sm:rounded-lg">
                                <table class="w-full text-left rtl:text-right rounded-2xl text-slate-700 ">
                                    <thead class="text-xs uppercase bg-slate-100">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 w-2">
                                                No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Question
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Type
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Created at
                                            </th>
                                            <th scope="col" class="px-6 py-3">
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
    </div>
</div>
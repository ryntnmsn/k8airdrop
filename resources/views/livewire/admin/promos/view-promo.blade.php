<div>
    <div class="flex pb-8">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>View Promo</x-title>
        </div>
    </div>

    <div class="pb-10">
        <div class="flex flex-col lg:flex-row space-x-0 space-y-5 lg:space-y-0 lg:space-x-5 lg:items-center">
            <div class="p-1 rounded-lg flex-none">
                <img src="{{ url('storage/promo/', $image) }}" alt="" class="w-40 rounded-lg">
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
          class="block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 font-medium leading-tight text-slate-500 hover:isolate hover:border-transparent hover:bg-slate-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-indigo-600 data-[te-nav-active]:text-indigo-600 "
          data-te-toggle="pill"
          data-te-target="#basic-information"
          data-te-nav-active
          role="tab"
          aria-controls="basic-information"
          aria-selected="true"
          >Basic Informations</a
        >
      </li>
      {{-- <li role="presentation">
        <a
          href="#participant"
          class="block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 font-medium leading-tight text-slate-500 hover:isolate hover:border-transparent hover:bg-slate-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-indigo-600 data-[te-nav-active]:text-indigo-600 "
          data-te-toggle="pill"
          data-te-target="#participant"
          role="tab"
          aria-controls="participant"
          aria-selected="false"
          >Participants <span class="text-xs">({{ count($getParticipants) }})</span></a
        >
      </li> --}}
      @if($type == 'click_to_join' && $game_type == 'multiple_choice')
        <li role="presentation">
            <a
            href="#manage-question"
            class="block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 font-medium leading-tight text-slate-500 hover:isolate hover:border-transparent hover:bg-slate-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-indigo-600 data-[te-nav-active]:text-indigo-600 "
            data-te-toggle="pill"
            data-te-target="#manage-question"
            role="tab"
            aria-controls="manage-question"
            aria-selected="false"
            >Manage Questions</a
            >
        </li>
    @endif
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
                        {{date('F j', strtotime($start_date))}} - {{date('F j, Y', strtotime($end_date))}}
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
                        <span>{{ $language_id }}</span>
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



            {{-- PARTICIPANTS --}}
            <div class="mb-5 mt-20">
                <div class="flex justify-between">
                    <div><x-title>Participants <span class="text-xl">({{ count($getParticipants) }})</span></x-title></div>
                    <div class="flex gap-2">
                        <x-button class="!float-none" data-modal-target="add-participant-modal" data-modal-toggle="add-participant-modal">Create Dummy</x-button>
                        <x-href href="{{ route('export.promo.participants', $promo_id) }}" class="!float-none" >Export</x-href>
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
                                Nick Name
                            </th>
                            <th scope="col" class="px-6 py-3 uppercase text-xs">
                                K8 Username
                            </th>
                            <th scope="col" class="px-6 py-3 uppercase text-xs">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 uppercase text-xs">
                                IP
                            </th>
                            <th scope="col" class="px-6 py-3 uppercase text-xs">
                                SNS ID
                            </th>
                            <th scope="col" class="px-6 py-3 uppercase text-xs">
                                Is winner
                            </th>
                            <th scope="col" class="px-6 py-3 uppercase text-xs">
                                Joined date
                            </th>
                            <th scope="col" class="px-6 py-3 uppercase text-xs">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getParticipants as $participant)
                            <tr class="border-b hover:bg-slate-100 rounded-xl">
                                <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap w-2">
                                    {{ $loop->iteration }}
                                </td>
                                <td row='scope' class="px-6 py-3 font-medium">
                                    {{ $participant->name }}
                                </td>
                                <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                    {{ $participant->k8_username }}
                                </td>
                                <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                    {{ $participant->email }}
                                </td>
                                <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                    {{ $participant->ip }}
                                </td>
                                <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                    {{ $participant->sns_id }}
                                </td>
                                <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                    @if($participant->is_winner == 0)
                                        No
                                    @else
                                        Yes
                                    @endif
                                </td>
                                <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                    {{ $participant->created_at->diffForHumans() }}
                                </td>
                                <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap flex">
                                    <div>
                                        <x-href wire:click="editParticipant({{ $participant->id }})" class="!bg-transparent !text-slate-600 !border-0 !p-2" data-modal-target="image-modal" data-modal-toggle="image-modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                              </svg>
                                        </x-href>
                                    </div>
                                    <div>
                                        <x-href wire:click="editParticipant({{ $participant->id }})" class="!bg-transparent !text-slate-600 !border-0 !p-2" data-modal-target="edit-participant-modal" data-modal-toggle="edit-participant-modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                              </svg>
                                        </x-href>
                                    </div>
                                    <div>
                                        <x-href wire:click="" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="!bg-transparent !text-slate-600 !border-0 !p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>
                                        </x-href>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
      </div>
     {{--  <div
        class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
        id="participant"
        role="tabpanel"
        aria-labelledby="participant-tab">
        
        <div class="mb-5">
            <div class="flex justify-end">
                <div class="flex gap-2">
                    <x-button class="!float-none" data-modal-target="add-participant-modal" data-modal-toggle="add-participant-modal">Create Dummy</x-button>
                    <x-href href="{{ route('export.promo.participants', $promo_id) }}" class="!float-none" >Export</x-href>
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
                            Nick Name
                        </th>
                        <th scope="col" class="px-6 py-3 uppercase text-xs">
                            K8 Username
                        </th>
                        <th scope="col" class="px-6 py-3 uppercase text-xs">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 uppercase text-xs">
                            IP
                        </th>
                        <th scope="col" class="px-6 py-3 uppercase text-xs">
                            SNS ID
                        </th>
                        <th scope="col" class="px-6 py-3 uppercase text-xs">
                            Is winner
                        </th>
                        <th scope="col" class="px-6 py-3 uppercase text-xs">
                            Joined date
                        </th>
                        <th scope="col" class="px-6 py-3 uppercase text-xs">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getParticipants as $participant)
                        <tr class="border-b hover:bg-slate-100 rounded-xl">
                            <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap w-2">
                                {{ $loop->iteration }}
                            </td>
                            <td row='scope' class="px-6 py-3 font-medium">
                                {{ $participant->name }}
                            </td>
                            <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                {{ $participant->k8_username }}
                            </td>
                            <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                {{ $participant->email }}
                            </td>
                            <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                {{ $participant->ip }}
                            </td>
                            <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                {{ $participant->sns_id }}
                            </td>
                            <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                @if($participant->is_winner == 0)
                                    No
                                @else
                                    Yes
                                @endif
                            </td>
                            <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap">
                                {{ $participant->created_at->diffForHumans() }}
                            </td>
                            <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap flex">
                                <div>
                                    <x-href wire:click="editParticipant({{ $participant->id }})" class="!bg-transparent !text-slate-600 !border-0 !p-2" data-modal-target="image-modal" data-modal-toggle="image-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                          </svg>
                                    </x-href>
                                </div>
                                <div>
                                    <x-href wire:click="editParticipant({{ $participant->id }})" class="!bg-transparent !text-slate-600 !border-0 !p-2" data-modal-target="edit-participant-modal" data-modal-toggle="edit-participant-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                          </svg>
                                    </x-href>
                                </div>
                                <div>
                                    <x-href wire:click="" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="!bg-transparent !text-slate-600 !border-0 !p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                          </svg>
                                    </x-href>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

      </div> --}}
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
                                <x-href href="{{route('question.create', $promo_id)}}">
                                    <span>
                                        Create
                                    </span>
                                </x-href>
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
                                @foreach ($questions as $question)
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
                                        <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap flex">
                                            <div>
                                                <x-href href="{{route('question.edit', ['promo' => $promo_id, 'question' => $question->id])}}" class="!bg-transparent !text-slate-600 !border-0 !p-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                      </svg>
                                                </x-href>
                                            </div>
                                            <div>
                                                <x-href wire:click="deleteQuestion({{ $question->id }})" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="!bg-transparent !text-slate-600 !border-0 !p-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                      </svg>
                                                </x-href>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
                        <x-input-text wire:model.defer="question_title" id="question_title"></x-input-text>
                        @error('question_title')
                        <span class="text-rose-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <x-label for="question_type">Type</x-label>
                        <x-select wire:model.defer="question_type" id="question_type">
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
                            <div class="mb-2">
                                <div class="flex">
                                    <x-input-text wire:model="inputs.{{ $key }}.choice"></x-input-text>
                                    <x-button wire:click.prevent="removeInput({{ $key }})">delete</x-button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-slate-200 rounded-b">
                <x-button wire:click.prevent="addInput()">Add</x-button>
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
                        <x-input-text wire:model="question_title" value="{{ $question_title ?? '' }}" id="question_title"></x-input-text>
                        @error('question_title')
                            <span class="text-rose-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <x-label for="question_type">Type</x-label>
                        <x-select wire:model="question_type" id="question_type">
                            <option wire:key="single_select" value="single_select" @if($question_type == 'single_select') selected @endif>Single select</option>
                            <option wire:key="multi_select" value="multiple_select" @if($question_type == 'multiple_select') selected @endif>Multiple select</option>
                            <option wire:key="comment" value="comment" @if($question_type == 'comment') selected @endif>Comment</option>
                        </x-select>
                        @error('question_type')
                            <span class="text-rose-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>


                    <div>
                        @foreach ($inputs as $key => $value)

                            <div wire:key="{{ $key }}" class="mb-2">
                                <div class="flex">
                                    <x-input-text wire:model.defer="inputs.{{ $key }}.choice" value=""></x-input-text>
                                    <x-href wire:click.prevent="removeInput({{ $key }})">delete</x-href>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-slate-200 rounded-b">
                    <x-button wire:click.prevent="addInput()">Add</x-button>
                    <x-button wire:target="updateQuestion()">Save</x-button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Delete modal confirmation --}}
<div wire:ignore.self id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" class="absolute top-3 end-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-slate-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-slate-500">Are you sure you want to delete this record?</h3>
                <form wire:submit.prevent="destroyQuestion">
                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg inline-flex items-center px-5 py-2.5 text-center me-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="popup-modal" type="button" class="text-slate-500 bg-white hover:bg-slate-100 focus:ring-4 focus:outline-none focus:ring-slate-200 rounded-lg border border-slate-200 font-medium px-5 py-2.5 hover:text-slate-900 focus:z-10 ">No, cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Add participants modal --}}
<div wire:ignore.self id="add-participant-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" class="absolute top-3 end-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="add-participant-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-left">
                <h3 class="mb-5 text-xl font-semibold text-slate-600">Create Participant</h3>
                <form wire:submit.prevent="storeParticipant">
                    <div class="mb-5">
                        <x-label>K8 Username</x-label>
                        <x-input-text wire:model="k8_username"></x-input-text>
                        @error('k8_username')
                            <span class="text-sm text-rose-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <x-label>Is winner</x-label>
                        <x-select wire:model="is_winner">
                            <option value="false">No</option>
                            <option value="true">Yes</option>
                        </x-select>
                        @error('is_winner')
                            <span class="text-sm text-rose-500">{{ $message }}</span>
                        @enderror
                        @if(session('errorParticipant'))
                            <span class="text-sm text-rose-500">{{ session('errorParticipant') }}</span>
                        @endif
                    </div>
                    <div class="mb-5">
                        <x-button wire:target="storeParticipant" type="submit" class="!float-none">Create</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



{{-- Edit participants modal --}}
<div wire:ignore.self id="edit-participant-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" class="absolute top-3 end-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="edit-participant-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-left">
                <h3 class="mb-5 text-xl font-semibold text-slate-600">Edit Participant</h3>
                <form wire:submit.prevent="updateParticipant">
                    <div class="mb-5">
                        <x-label>K8 Username</x-label>
                        <x-input-text wire:model="k8_username" value="{{ $k8_username }}"></x-input-text>
                        @error('k8_username')
                            <span class="text-sm text-rose-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <x-label>Is winner</x-label>
                        <x-select wire:model="is_winner">
                            <option {{ $is_winner == 0 ? 'selected' : '' }} value="false">No</option>
                            <option {{ $is_winner == 1 ? 'selected' : '' }} value="true">Yes</option>
                        </x-select>
                        @error('is_winner')
                            <span class="text-sm text-rose-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <x-button wire:target="updateParticipant" type="submit" class="!float-none">Create</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Image modal --}}
<div wire:ignore.self wire:click="resetUploadedImage" id="image-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button wire:click="resetUploadedImage" type="button" class="absolute top-3 end-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="image-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-left">
                <div class="text-slate-800" wire:loading.delay>{{ __('Loading') }}...</div>
                <div wire:loading.remove>
                    <img src="{{ url('storage/user/' . $uploadedImage) }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    document.addEventListener('livewire:initialized', ()=>{
        @this.on('deleted', (event)=>{
            const data=event
            swal.fire({
                title:data[0]['title'],
                text:data[0]['text'],
                icon:data[0]['icon'],
            })
        });
    });
</script>





</div>

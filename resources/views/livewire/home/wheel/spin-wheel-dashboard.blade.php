<div class="h-full">
    <div class="lg:flex w-100 gap-10 h-full">
        <div wire:ignore class="hidden lg:block w-[20%] border-r border-slate-900">
            @include('layouts/user/nav')
        </div>
        <div class="w-100 lg:w-[80%]">
            <div class="flex items-center justify-between pb-8">
                <div>
                    <h1 class="text-slate-200 text-3xl font-semibold border-b border-slate-900">{{ __('Spin the Wheel') }} <span class="text-xl"></span></h1>
                </div>
                <div>
                    <x-href href="{{ route('spin.wheel') }}" class="!font-semibold">{{ __('Spin now') }}</x-href>
                </div>
            </div>
            <div>
                <div class="flex flex-col w-full gap-1">
                    @if(count($spinWheels) != null)
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-slate-500">
                                <thead class="text-xs text-slate-200 uppercase bg-slate-800">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            {{ __('Joined Date') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            {{ __('Rewards') }} ($)
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            {{ __('Status') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($spinWheels as $spinWheel)
                                        <tr class="bg-slate-900 text-slate-200 font-semibold border-b border-slate-800 hover:bg-slate-800">
                                            <th scope="row" class="px-6 py-4 whitespace-nowrap">
                                                {{ $spinWheel->joined_date }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $spinWheel->rewards }}
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($spinWheel->is_winner == 1)
                                                    <span class="text-green-400">{{ __('Winner') }}</span>
                                                @else
                                                    <span class="text-rose-500">{{ __('Lose') }}</span>
                                                @endif
                                            
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="px-10 py-20 items-center justify-center flex flex-col gap-5 bg-slate-900 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-200">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                            <h1 class="text-slate-200 font-semibold">{{ __('No spin yet') }}.</h1>
                            <x-href href="{{ route('spin.wheel') }}" class="!font-semibold">{{ __('Spin now') }}</x-href>
                        </div>
                    @endif
                </div>
                {{-- <div>
                    {{ $promos->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</div>

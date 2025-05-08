@section('title') Dashboard @stop
<div class="h-full">
    <div class="lg:flex w-100 gap-10 h-full">
        <div wire:ignore class="hidden lg:block w-[20%] border-r border-slate-900">
            @include('layouts/user/nav')
        </div>
        <div class="w-100 lg:w-[80%]">
            <h1 class="text-slate-200 text-3xl font-semibold pb-8 border-b border-slate-900">{{ __('Entries') }} <span class="text-xl">({{ count($promos) }})</span></h1>
            <div>
                <div class="flex flex-col w-full gap-1">

                    @if(count($promos) != 0)
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-slate-500">
                                <thead class="text-xs text-slate-200 uppercase bg-slate-800">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            {{ __('Promo name') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            {{ __('Prize pool') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            {{ __('Status') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            {{ __('Action') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($promos as $promo)
                                        <tr class="bg-slate-900 text-slate-200 font-semibold border-b border-slate-800 hover:bg-slate-800">
                                            <th scope="row" class="px-6 py-4 whitespace-nowrap">
                                                {{ $promo->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $promo->prize_pool }}
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($promo->end_date >= Carbon\Carbon::now()->format('Y-m-d'))
                                                    <span class="text-green-400">{{ __('Ongoing') }}</span>
                                                @else
                                                    <spa class="text-rose-500">{{ __('Ended') }}</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4">
                                                <div>
                                                    <a href="{{ route('single.promo', $promo->slug) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-slate-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                                        </svg>
                                                    </a>
                                                </div>
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
                            <h1 class="text-slate-200 font-semibold">{{ __('No joined promos available') }}.</h1>
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

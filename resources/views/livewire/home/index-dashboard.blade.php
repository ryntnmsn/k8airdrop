<div class="h-full">
    <div class="flex gap-10 h-full">
        <div class="w-[20%] rounded-xl border-r border-slate-900">
            <p class="font-semibold text-slate-500 mb-10">MENU</p>
            <ul class="flex flex-col space-y-8">
                <li class="{{ request()->is('user/dashboard') ? 'bg-indigo-600' : ''}} pr-10 pl-2 py-3 rounded-md">
                    <a class="text-slate-200 font-semibold flex gap-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M4.606 12.97a.75.75 0 0 1-.134 1.051 2.494 2.494 0 0 0-.93 2.437 2.494 2.494 0 0 0 2.437-.93.75.75 0 1 1 1.186.918 3.995 3.995 0 0 1-4.482 1.332.75.75 0 0 1-.461-.461 3.994 3.994 0 0 1 1.332-4.482.75.75 0 0 1 1.052.134Z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M5.752 12A13.07 13.07 0 0 0 8 14.248v4.002c0 .414.336.75.75.75a5 5 0 0 0 4.797-6.414 12.984 12.984 0 0 0 5.45-10.848.75.75 0 0 0-.735-.735 12.984 12.984 0 0 0-10.849 5.45A5 5 0 0 0 1 11.25c.001.414.337.75.751.75h4.002ZM13 9a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" clip-rule="evenodd" />
                              </svg>
                        </span>
                        <span>
                            Promos ({{ count($promos) }})
                        </span>
                    </a>
                </li>
                <li class="{{ request()->is('user/account') ? 'bg-indigo-600' : ''}} pr-10 pl-2 py-3 rounded-md">
                    <a href="#" class="text-slate-200 font-semibold flex gap-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
                              </svg>
                        </span>
                        <span>
                            Account
                        </span>
                    </a>
                </li>
                <li class="pr-10 pl-2 py-3">
                    <form action="{{ route('user.logout') }}" method="post">
                        @csrf
                        <button type="submit" class="text-slate-200 font-semibold flex gap-2">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M17 4.25A2.25 2.25 0 0 0 14.75 2h-5.5A2.25 2.25 0 0 0 7 4.25v2a.75.75 0 0 0 1.5 0v-2a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 .75.75v11.5a.75.75 0 0 1-.75.75h-5.5a.75.75 0 0 1-.75-.75v-2a.75.75 0 0 0-1.5 0v2A2.25 2.25 0 0 0 9.25 18h5.5A2.25 2.25 0 0 0 17 15.75V4.25Z" clip-rule="evenodd" />
                                    <path fill-rule="evenodd" d="M14 10a.75.75 0 0 0-.75-.75H3.704l1.048-.943a.75.75 0 1 0-1.004-1.114l-2.5 2.25a.75.75 0 0 0 0 1.114l2.5 2.25a.75.75 0 1 0 1.004-1.114l-1.048-.943h9.546A.75.75 0 0 0 14 10Z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span>
                                Sign out
                            </span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="w-[80%]">
            <h1 class="text-slate-200 text-3xl font-semibold pb-8 border-b border-slate-900">Entries <span class="text-xl">({{ count($promos) }})</span></h1>
            <div>
                <div class="flex flex-col w-full gap-1">
                    @forelse ($promos as $promo)
                        <div class="p-8 flex justify-between items-center bg-slate-900/[.30] hover:bg-slate-900 rounded-lg relative">
                            <a href="{{ route('single.promo', $promo->slug) }}" class="absolute top-0 right-0 left-0 bottom-0"></a>
                            <div>
                                <div class="flex flex-row gap-2">
                                    <div><img src="{{ url('storage/promo/', $promo->image) }}" alt="{{ $promo->name }}" class="w-full max-w-[120px] rounded-md"></div>
                                    <div>
                                        <h1 class="text-slate-200 font-semibold">{{ $promo->name }}</h1> 
                                        <p class="text-slate-200 font-semibold text-sm">Prize pool: {{ $promo->prize_pool }}</p>
                                        <p class="flex gap-2 text-slate-200 font-semibold text-sm"><span>Status:</span>
                                           
                                                @if($promo->end_date >= Carbon\Carbon::now()->format('Y-m-d'))
                                                    <span class="text-green-300">Ongoing</span>
                                                @else
                                                    <spa class="text-rose-500">Ended</span>
                                                @endif
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </div>
                        </div>
                    @empty
                        <div class="px-10 py-20 items-center justify-center flex flex-col gap-5 bg-slate-900 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-200">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                            <h1 class="text-slate-200 font-semibold">No joined promos available.</h1>
                        </div>
                    @endforelse
                </div>
                {{-- <div>
                    {{ $promos->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</div>

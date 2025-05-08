<p class="font-semibold text-slate-500 mb-10">{{ __('MENU') }}</p>
            <ul class="flex flex-col space-y-8">
                <li class="{{ request()->is('user/dashboard') ? 'bg-indigo-600' : ''}} pr-10 pl-2 py-3 rounded-md">
                    <a wire:navigate href="{{ route('user.dashboard') }}" class="text-slate-200 font-semibold flex gap-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M4.606 12.97a.75.75 0 0 1-.134 1.051 2.494 2.494 0 0 0-.93 2.437 2.494 2.494 0 0 0 2.437-.93.75.75 0 1 1 1.186.918 3.995 3.995 0 0 1-4.482 1.332.75.75 0 0 1-.461-.461 3.994 3.994 0 0 1 1.332-4.482.75.75 0 0 1 1.052.134Z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M5.752 12A13.07 13.07 0 0 0 8 14.248v4.002c0 .414.336.75.75.75a5 5 0 0 0 4.797-6.414 12.984 12.984 0 0 0 5.45-10.848.75.75 0 0 0-.735-.735 12.984 12.984 0 0 0-10.849 5.45A5 5 0 0 0 1 11.25c.001.414.337.75.751.75h4.002ZM13 9a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" clip-rule="evenodd" />
                              </svg>
                        </span>
                        <span>
                            {{ __('Promos') }}  @if(request()->is('user/dashboard')) ({{ count($promos) }})@endif
                        </span>
                    </a>
                </li>
                {{-- <li class="{{ request()->is('user/spin-the-wheel') ? 'bg-indigo-600' : ''}} pr-10 pl-2 py-3 rounded-md">
                    <a wire:navigate href="{{ route('spin.wheel.dashboard') }}" class="text-slate-200 font-semibold flex gap-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path d="M12 9a1 1 0 0 1-1-1V3c0-.552.45-1.007.997-.93a7.004 7.004 0 0 1 5.933 5.933c.078.547-.378.997-.93.997h-5Z" />
                                <path d="M8.003 4.07C8.55 3.994 9 4.449 9 5v5a1 1 0 0 0 1 1h5c.552 0 1.008.45.93.997A7.001 7.001 0 0 1 2 11a7.002 7.002 0 0 1 6.003-6.93Z" />
                              </svg>
                        </span>
                        <span>
                            {{ __('Spin the Wheel') }}  @if(request()->is('user/spin-the-wheel')) ({{ count($spinWheels) }})@endif
                        </span>
                    </a>
                </li> --}}
                <li class="{{ request()->is('user/account') ? 'bg-indigo-600' : ''}} pr-10 pl-2 py-3 rounded-md">
                    <a wire:navigate href="{{ route('user.account') }}" class="text-slate-200 font-semibold flex gap-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
                              </svg>
                        </span>
                        <span>
                            {{ __('Account') }}
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
                                {{ __('Sign out') }}
                            </span>
                        </button>
                    </form>
                </li>
            </ul>
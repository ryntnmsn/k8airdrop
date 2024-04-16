<header class="w-full bg-slate-900">
    <div class="py-6 md:py-0">
        <div class="max-w-[1280px] px-5 w-full mx-auto flex justify-between items-center">
            <div class="flex-1">
                <img src="{{ url('storage/images/k8_logo.png') }}" alt="K8 Airdrop Promo Giveaways" class="w-48">
            </div>

            <div class="flex-1 hidden md:block">
                <ul class="flex justify-center items-center gap-10 font-semibold text-slate-200 cursor-pointer">
                    <li class="py-8 text-center hover:text-indigo-600 duration-300 ease-in-out {{ request()->is('/') ? 'text-indigo-600' : '' }}">
                        <a wire:navigate href="{{ route('home.index') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="py-8 text-center hover:text-indigo-600 duration-300 ease-in-out {{ request()->is('promos*') ? 'text-indigo-600' : '' }}">
                        <a wire:navigate href="{{ route('index.promos') }}">{{ __('Promos') }}</a>
                    </li>
                    <li class="py-8 text-center hover:text-indigo-600 duration-300 ease-in-out {{ request()->is('news*') ? 'text-indigo-600' : '' }}">
                        <a wire:navigate href="{{ route('news.index') }}">{{ __('News') }}</a>
                    </li>
                    <li class="py-8 text-center hover:text-indigo-600 duration-300 ease-in-out {{ request()->is('media') ? 'text-indigo-600' : '' }}">
                        <a wire:navigate href="{{ route('index.media') }}">{{ __('Media') }}</a>
                    </li>
                </ul>
            </div>
    
            <div class="flex-1">
                <div class="flex justify-end space-x-3">
                    @if(auth()->user())
                        <a  class="cursor-pointer hidden lg:block" href="{{ route('user.dashboard') }}" class="inline-flex" id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" aria-hidden="true" fill="none" viewBox="0 0 10 6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-slate-500 w-10 h-10">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                       
                        <button class="lg:hidden block cursor-pointer" id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" aria-hidden="true" fill="none" viewBox="0 0 10 6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-slate-500 w-10 h-10">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div wire:ignore id="dropdownNavbar" class="hidden font-normal bg-slate-700 divide-y divide-gray-100 rounded-lg shadow w-52 z-[100]">
                            <ul class="py-3 text-gray-700" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a wire:navigate href="{{ route('user.dashboard') }}" class="text-slate-200 font-semibold flex gap-2 px-4 py-3">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd" d="M4.606 12.97a.75.75 0 0 1-.134 1.051 2.494 2.494 0 0 0-.93 2.437 2.494 2.494 0 0 0 2.437-.93.75.75 0 1 1 1.186.918 3.995 3.995 0 0 1-4.482 1.332.75.75 0 0 1-.461-.461 3.994 3.994 0 0 1 1.332-4.482.75.75 0 0 1 1.052.134Z" clip-rule="evenodd" />
                                                <path fill-rule="evenodd" d="M5.752 12A13.07 13.07 0 0 0 8 14.248v4.002c0 .414.336.75.75.75a5 5 0 0 0 4.797-6.414 12.984 12.984 0 0 0 5.45-10.848.75.75 0 0 0-.735-.735 12.984 12.984 0 0 0-10.849 5.45A5 5 0 0 0 1 11.25c.001.414.337.75.751.75h4.002ZM13 9a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" clip-rule="evenodd" />
                                              </svg>
                                        </span>
                                        <span>
                                            {{ __('Promos') }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a wire:navigate href="{{ route('spin.wheel.dashboard') }}" class="text-slate-200 font-semibold flex px-4 py-3 gap-2">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path d="M12 9a1 1 0 0 1-1-1V3c0-.552.45-1.007.997-.93a7.004 7.004 0 0 1 5.933 5.933c.078.547-.378.997-.93.997h-5Z" />
                                                <path d="M8.003 4.07C8.55 3.994 9 4.449 9 5v5a1 1 0 0 0 1 1h5c.552 0 1.008.45.93.997A7.001 7.001 0 0 1 2 11a7.002 7.002 0 0 1 6.003-6.93Z" />
                                              </svg>
                                        </span>
                                        <span>
                                            {{ __('Spin the Wheel') }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a wire:navigate href="{{ route('user.account') }}" class="text-slate-200 font-semibold flex gap-2 px-4 py-3">
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
                                <li>
                                    <form action="{{ route('user.logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="text-slate-200 font-semibold flex gap-2 px-4 py-3">
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
                        </div>
                        
                    @else
                        <div class="flex">
                            <x-href href="{{ route('user.login') }}" class="!bg-transparent !border-0 !font-semibold">Sign in</x-href>
                            <x-href href="{{ route('user.register') }}" class="!font-semibold">Sign up</x-href>
                            {{-- <button id="theme-toggle" type="button" class="flex items-center justify-center bg-slate-800 dark:bg-slate-200 text-slate-500 dark:text-slate-400 hover:bg-slate-700 dark:hover:bg-slate-300 focus:outline-none dark:focus:ring-slate-700 rounded-full text-sm duration-300 ease-in-out h-10 w-10">
                                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5 rounded-full" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5 rounded-full" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                            </button> --}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- mobile menu --}}
    <div class="fixed block md:hidden md:relative bottom-0 py-5 bg-slate-800 w-full z-[100]">
        <div class="flex">
            <div class="flex-1 relative">
                <a href="{{ route('home.index') }}" class="absolute bottom-0 left-0 right-0 top-0"></a>
                <div class="flex justify-center">
                    <ul class="text-center flex flex-col items-center gap-2">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 {{ request()->is('/') ? 'text-indigo-600 ' : 'text-slate-200 '}}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                              </svg>
                        </li>
                        <li>
                            <p class="{{ request()->is('/') ? 'text-indigo-600 ' : 'text-slate-200 '}} font-medium">{{ __('Home') }}</p>
                        </li>
                    </ul>
               </div>
            </div>
            <div class="flex-1 relative">
                <a href="{{ route('index.promos') }}" class="absolute bottom-0 left-0 right-0 top-0"></a>
                <div class="flex justify-center">
                    <ul class="text-center flex flex-col items-center gap-2">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 {{ request()->is('promos') ? 'text-indigo-600 ' : 'text-slate-200 '}}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                              </svg>
                        </li>
                        <li>
                            <p class="{{ request()->is('promos*') ? 'text-indigo-600 ' : 'text-slate-200 '}} font-medium">{{ __('Promos') }}</p>
                        </li>
                    </ul>
               </div>
            </div>
            <div class="flex-1 relative">
                <a href="{{ route('news.index') }}" class="absolute bottom-0 left-0 right-0 top-0"></a>
                <div class="flex justify-center">
                    <ul class="text-center flex flex-col items-center gap-2">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 {{ request()->is('news*') ? 'text-indigo-600 ' : 'text-slate-200 '}}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                              </svg>
                        </li>
                        <li>
                            <p class="{{ request()->is('news*') ? 'text-indigo-600 ' : 'text-slate-200 '}} font-medium">{{ __('News') }}</p>                        
                        </li>
                    </ul>
               </div>
            </div>
            <div class="flex-1 relative">
                <a href="{{ route('index.media') }}" class="absolute bottom-0 left-0 right-0 top-0"></a>
                <div class="flex justify-center">
                    <ul class="text-center flex flex-col items-center gap-2">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 {{ request()->is('media*') ? 'text-indigo-600 ' : 'text-slate-200 '}}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                              </svg>
                        </li>
                        <li>
                            <p class="{{ request()->is('media*') ? 'text-indigo-600 ' : 'text-slate-200 '}} font-medium">{{ __('Media') }}</p>                         
                        </li>
                    </ul>
               </div>
            </div>
        </div>
    </div>

    {{-- page title --}}
    @if(request()->is('news*'))
        <div class="w-full bg-slate-800">
            <div class="max-w-[1280px] px-5 w-full mx-auto items-center">
                @if(request()->is('news/latest'))
                    <h1 class="text-slate-200 py-5 text-4xl font-semibold">{{ __('Latest news') }}</h1>
                @else
                    <h1 class="text-slate-200 py-5 text-4xl font-semibold">{{ __('News') }}</h1>
                @endif
            </div>
        </div>
    @endif

    @if(request()->is('promos*'))
        <div class="w-full bg-slate-800">
            <div class="max-w-[1280px] px-5 w-full mx-auto items-center">
                <h1 class="text-slate-200 py-5 text-4xl font-semibold">{{ __('Promos') }}</h1>
            </div>
        </div>
    @endif

    @if(request()->is('media'))
        <div class="w-full bg-slate-800">
            <div class="max-w-[1280px] px-5 w-full mx-auto items-center">
                <h1 class="text-slate-200 py-5 text-4xl font-semibold">{{ __('Media') }}</h1>
            </div>
        </div>
    @endif

</header>


<header class="w-full dark:bg-slate-100 bg-slate-900">
    <div class="py-3 bg-slate-800"></div>
    <div>
        <div class="max-w-[1280px] px-5 w-full mx-auto flex justify-between items-center">
            <div class="flex-1">
                <b>
                    <h1 class="text-xl text-slate-200 dark:text-slate-600">
                        LOGO HERE
                    </h1>
                </b>
            </div>

            <div class="flex-1">
                <ul class="flex justify-center items-center gap-10 font-semibold text-slate-200 dark:text-slate-600 cursor-pointer">
                    <li class="py-8 text-center hover:text-indigo-600 duration-300 ease-in-out {{ request()->is('/') ? 'border-b-4 border-indigo-600 text-indigo-600' : '' }}">{{ __('Home') }}</li>
                    <li class="py-8 text-center hover:text-indigo-600 duration-300 ease-in-out">Airdrops</li>
                    <li class="py-8 text-center hover:text-indigo-600 duration-300 ease-in-out">News</li>
                    <li class="py-8 text-center hover:text-indigo-600 duration-300 ease-in-out">Media</li>
                </ul>
            </div>
    
            <div class="flex-1">
                <div class="flex justify-end space-x-3">
                    @if(auth()->user())
                        <button type="button" data-dropdown-toggle="language-dropdown-menu" class="inline-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                        </button>
                    @else
                        <div>
                            <x-href href="{{ route('user.login') }}" class="!bg-transparent !border-0 !font-semibold">Sign in</x-href>
                            <x-href href="{{ route('user.register') }}" class="!font-semibold">Sign up</x-href>
                            {{-- <button id="theme-toggle" type="button" class="bg-slate-800 dark:bg-slate-200 text-slate-500 dark:text-slate-400 hover:bg-slate-700 dark:hover:bg-slate-300 focus:outline-none  dark:focus:ring-slate-700 rounded-full text-sm p-2 duration-300 ease-in-out">
                                <svg id="theme-toggle-dark-icon" class="hidden w-6 h-6 rounded-full" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                                <svg id="theme-toggle-light-icon" class="hidden w-6 h-6 rounded-full" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                            </button> --}}
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</header>
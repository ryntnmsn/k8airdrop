<footer class="mt-20 w-full">
    {{-- <div class="bg-slate-900 border-b border-slate-800 px-5">
        <div class="max-w-[1280px] mx-auto py-10">
            <div class="flex flex-col justify-center">
                <div class="space-y-5">
                    <h1 class="text-slate-200 font-semibold text-4xl">Get K8 Airdrop updates!</h1>
                    <x-input-text class="!bg-slate-800 border-0 text-slate-200 !px-4 max-w-[540px]" placeholder="Enter email address"></x-input-text>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="bg-slate-900 px-5">
        <div class="max-w-[1280px] mx-auto py-20">
            <div class="flex flex-col lg:flex-row justify-between">
                <div class="w-100 lg:w-[60%] flex">
                    <div class="w-full flex flex-col sm:flex-row">
                        <div class="flex w-100 sm:w-[33.33%] mb-10 sm:mb-0">
                            <h1 class="text-slate-200 font-bold text-lg">
                                <img class="w-52" src="{{ url('storage/images/k8_logo.png') }}" alt="K8 Airdrop Promo Giveaways">
                            </h1>
                        </div>
                        <div class="flex w-100 sm:w-[66.66%]">
                            <div class="flex-1">
                                <h1 class="text-slate-200 font-bold text-lg">{{ __('USEFUL LINKS') }}</h1>
                                <ul class="mt-5 space-y-2">
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">{{ __('Home') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">{{ __('Promos') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">{{ __('News') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">{{ __('Media') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">{{ __('Sign in') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">{{ __('Sign up') }}</a></li>
                                </ul>
                            </div>
                            <div class="flex-1">
                                <h1 class="text-slate-200 font-bold text-lg">{{ __('ENTERTAINMENT') }}</h1>
                                <ul class="mt-5 space-y-2">
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">{{ __('Games Lobby') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">{{ __('Promotions') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">{{ __('Affiliate Program') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">{{ __('VIP') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-100 lg:w-[40%] lg:mt-0 mt-10">
                    <div class="flex">
                        <div class="flex-1 hidden sm:block lg:hidden"></div>
                        <div class="flex-1">
                            <h1 class="text-slate-200 font-bold text-lg">{{ __('SOCIAL LINKS') }}</h1>
                            <ul class="mt-5 space-y-2">
                                <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">Facebook</a></li>
                                <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">Instagram</a></li>
                                <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">Twitter</a></li>
                                <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">Youtube</a></li>
                                <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">Discord</a></li>
                                <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">Telegram</a></li>
                                <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('home.index') }}">Tiktok</a></li>
                            </ul>
                        </div>
                        <div class="flex-1">
                            <h1 class="text-slate-200 font-bold text-lg">{{ __('THE AMBASSADORS') }}</h1>
                            <div class="mt-5">
                                <img src="{{ url('storage/images/sponsor.webp') }}" alt="K8 Ambassadors">
                                <span class="text-slate-400 text-sm">{{ __('Yaya Touré') }} | {{ __('Wesley Sneijder') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-4 bg-slate-800 px-5">
        <div class="max-w-[1280px] mx-auto text-center">
            <p class="text-slate-500 text-sm font-medium">
                {{ __('Copyright 2024 © K8 Airdrop. All rights reserved') }}.
                <a href="" class="text-slate-400">{{ __('Privacy Policy') }}</a>
            </p>
        </div>
    </div>
</footer>
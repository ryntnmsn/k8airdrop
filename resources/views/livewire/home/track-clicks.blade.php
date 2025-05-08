<div>
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
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('index.promos') }}">{{ __('Promos') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('news.index') }}">{{ __('News') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('index.media') }}">{{ __('Media') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('user.login') }}">{{ __('Sign in') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('user.register') }}">{{ __('Sign up') }}</a></li>
                                </ul>
                            </div>
                            <div class="flex-1">
                                <h1 class="text-slate-200 font-bold text-lg">{{ __('ENTERTAINMENT') }}</h1>
                                <ul class="mt-5 space-y-2">
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="https://playk8.io/games/slots/" target="__blank">{{ __('Games Lobby') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="https://playk8.io/promotions/" target="__blank">{{ __('Promotions') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="https://playk8.io/member/vip/" target="__blank">{{ __('Affiliate Program') }}</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="https://playk8.io/member/vip/" target="__blank">{{ __('VIP') }}</a></li>
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
                            @if(app()->getLocale() == 'jp')
                                <ul class="mt-5 space-y-2">
                                    <li><a wire:click="trackClick" class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('enDiscord') }}" target="__blank">Discord</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('jpTwitter') }}" target="__blank">X</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('jpInstagram') }}" target="__blank">Instagram</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('jpTelegram') }}" target="__blank">Telegram</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('jpTwitch') }}" target="__blank">Twitch</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('jpYoutube') }}" target="__blank">Youtube</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('jpLine') }}" target="__blank">Line</a></li>
                                </ul>
                            @else
                                <ul class="mt-5 space-y-2">
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('enFacebook') }}" target="__blank">Facebook</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('enInstagram') }}" target="__blank">Instagram</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('enTwitter') }}" target="__blank">X</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('enYoutube') }}" target="__blank">Youtube</a></li>
                                    <li><a wire:click="trackClick" class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('enDiscord') }}" target="__blank">Discord</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('enTelegram') }}" target="__blank">Telegram</a></li>
                                    <li><a class="text-slate-400 font-medium hover:text-indigo-600 duration-300 ease" href="{{ route('enTiktok') }}" target="__blank">Tiktok</a></li>
                                </ul>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h1 class="text-slate-200 font-bold text-lg">{{ __('THE AMBASSADORS') }}</h1>
                            <div class="mt-5 text-center">
                                <img src="{{ url('storage/images/sponsor.png') }}" alt="K8 Ambassadors">
                                <span class="text-slate-400 text-sm">{{ __('Atlético de Madrid') }}</span>
                                
                                <!--<span class="text-slate-400 text-sm">{{ __('Yaya Touré') }} | {{ __('Wesley Sneijder') }}</span>-->
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
</div>
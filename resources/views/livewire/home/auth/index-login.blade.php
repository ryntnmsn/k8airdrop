@section('title') Login Account @stop
<div>
    <div class="h-full w-full max-w-[900px] mx-auto mt-10 md:mt-40">
        <div class="flex bg-slate-900 flex-col md:flex-row rounded-3xl overflow-hidden">
           <div class="flex-1 p-10">
            <form  wire:submit.prevent="login">
                <h1 class="text-slate-200 font-semibold text-4xl mb-10">{{ __('Sign in') }}</h1>
                <div>
                    <div class="mb-8">
                        @if(session()->has('error'))
                            <span class="text-base text-rose-500">{{ __(session('error')) }}</span>
                        @endif
                    </div>
                    {{-- username --}}
                    <div class="mb-8">
                        <div class="relative">
                            <div class="absolute top-0 bottom-0 my-auto w-8 h-8 ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-slate-700">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                  </svg>
                                </div>
                            <x-input-text wire:model.live="k8_username" class="!bg-slate-800 border-none !text-slate-200 !ps-12 !p-4 font-bold focus:ring-indigo-600 focus:ring-2 placeholder-slate-600" placeholder="{{ __('Enter K8 username') }}"></x-input-text>
                        </div>
                        @error('k8_username')
                            <span class="text-sm text-rose-500 pt-2 block">{{ __($message) }}</span>
                        @enderror
                    </div>
                    
                
                  {{-- Password --}}
                    <div class="mb-8">
                        <div class="relative">
                            <div class="absolute top-0 bottom-0 my-auto w-8 h-8 ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-slate-700">
                                    <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z" clip-rule="evenodd" />
                                </svg>
                                </div>
                            <x-input-text type="password" wire:model.live="password"  class="!bg-slate-800 border-none !text-slate-200 !ps-12 !p-4 font-bold focus:ring-indigo-600 focus:ring-2 placeholder-slate-600" placeholder="{{ __('Enter password') }}"></x-input-text>
                        </div>
                        @error('password')
                            <span class="text-sm text-rose-500 pt-2 block">{{ __($message) }}</span>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <div class="relative">
                            <p class="font-semibold text-slate-500">
                                {{ __('Dont have an account') }}? <a href="{{ route('user.register') }}" class="text-indigo-600 hover:text-indigo-700">{{ __('Register here') }}</a>.
                            </p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <x-button type="submit" class="!float-none font-semibold px-12">{{ __('Sign in') }}</x-button>
                        </div>
                        <div>
                            <input wire:model="remember" id="checked-checkbox" type="checkbox" class="w-6 h-6 text-indigo-600 bg-transparent border-2 border-indigo-700 rounded-md focus:ring-indigo-500 focus:ring-2">
                            <label for="checked-checkbox" class="ms-2 text-sm font-semibold text-slate-500">{{ __('Remember me') }}</label>
                        </div>
                    </div>

                    <div class="mb-8">
                        <a href="{{ route('forgot.password') }}" class="text-indigo-600 text-sm">{{ __('Forgot password') }}</a>
                    </div>

                    <div>
                        <div class="relative">
                            <div class="flex items-center space-x-4">
                                <label for="checked-checkbox" class="text-sm font-semibold text-slate-500">
                                    {{ __('By accessing you confirm that you are at least 18 years old and agree to the Terms of service') }}</a>.
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                
            </form>
           </div>
           <div class="flex-1 bg-cover bg-center" style="background-image:url({{ url('storage/images/login-banner.jpg') }});">
                <img src="{{ url('storage/images/login-banner.jpg') }}" alt="" class="w-full md:hidden block">
           </div>
        </div>
    </div>
</div>

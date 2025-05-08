@section('title') Register Account @stop
<div>
    <div class="h-full w-full max-w-[900px] mx-auto  mt-10 md:mt-40">
        <div class="flex flex-col md:flex-row bg-slate-900 rounded-3xl overflow-hidden">
           <div class="flex-1 p-10">
            <form wire:submit.prevent="store">
                <h1 class="text-slate-200 font-semibold text-4xl mb-10">{{ __('Sign up') }}</h1>
                <div>
                    {{-- Name --}}
                    <div class="mb-8">
                        <div class="relative">
                            <div class="absolute top-0 bottom-0 my-auto w-8 h-8 ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-slate-700">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                  </svg>
                                </div>
                            <x-input-text wire:model.live="name" class="!bg-slate-800 border-none !text-slate-200 !ps-12 !p-4 font-bold focus:ring-indigo-600 focus:ring-2 placeholder-slate-600" placeholder="{{ __('Enter nickname') }}"></x-input-text>
                        </div>
                        @error('name')
                            <span class="text-sm text-rose-500 pt-2 block">{{ __($message) }}</span>
                        @enderror
                    </div>

                    
                    {{-- Email --}}
                    <div class="mb-8">
                        <div class="relative">
                            <div class="absolute top-0 bottom-0 my-auto w-7 h-7 ms-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-slate-700">
                                    <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                    <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                                </svg>
                                </div>
                            <x-input-text wire:model.live="email" class="!bg-slate-800 border-none !text-slate-200 !ps-12 !p-4 font-bold focus:ring-indigo-600 focus:ring-2 placeholder-slate-600" placeholder="{{ __('Enter email') }}"></x-input-text>
                        </div>
                        @error('email')
                            <span class="text-sm text-rose-500 pt-2 block">{{ __($message) }}</span>
                        @enderror
                    </div>

                    {{-- Name --}}
                    <div class="mb-8">
                        <div class="relative">
                            <div class="absolute top-0 bottom-0 my-auto w-8 h-8 ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-slate-700">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            <x-input-text wire:model.live="k8_username" class="!bg-slate-800 border-none !text-slate-200 !ps-12 !p-4 font-bold focus:ring-indigo-600 focus:ring-2 placeholder-slate-600" placeholder="{{ __('Enter K8 username') }}"></x-input-text>
                        </div>
                        <div class="mt-2">
                            <label for="" class="text-sm ">
                                <span class="text-slate-500">{{ __("Don't have a K8 account? Register now or use code") }}</span>
                                <span><a href="https://playk8.io?invite=K8airdrops" class="text-indigo-600">K8airdrops</a></span>
                                <span class="text-slate-500">{{ __("for exclusive offers!") }}</span>
                            </label>
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
                            <x-input-text type="password" wire:model.live="password" class="!bg-slate-800 border-none !text-slate-200 !ps-12 !p-4 font-bold focus:ring-indigo-600 focus:ring-2 placeholder-slate-600" placeholder="{{ __('Enter password') }}"></x-input-text>
                        </div>
                        @error('password')
                            <span class="text-sm text-rose-500 pt-2 block">{{ __($message) }}</span>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-8">
                        <div class="relative">
                            <div class="absolute top-0 bottom-0 my-auto w-8 h-8 ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-slate-700">
                                    <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z" clip-rule="evenodd" />
                                </svg>
                                </div>
                            <x-input-text type="password" wire:model.live="password_confirmation" name="password_confirmation" class="!bg-slate-800 border-none !text-slate-200 !ps-12 !p-4 font-bold focus:ring-indigo-600 focus:ring-2 placeholder-slate-600" placeholder="{{ __('Confirm password') }}"></x-input-text>
                        </div>
                    </div>

                    <div class="mb-8">
                        <div class="relative">
                            <div class="flex items-center space-x-4">
                                <input wire:model="terms" checked id="checked-checkbox" type="checkbox" class="w-6 h-6 text-indigo-600 bg-transparent border-2 border-indigo-700 rounded-md focus:ring-indigo-500 focus:ring-2">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-slate-500">
                                    {{ __('I confirm that I am 18 years old and I have read the Terms of service') }}</a>.
                                </label>
                            </div>
                        </div>
                        @if(session()->has('terms_message'))
                            <span class="text-sm text-rose-500 pt-2 block">{{ __(session('terms_message')) }}</span>
                        @endif
                    </div>

                    <div class="mb-8">
                        <div class="relative">
                            <p class="font-semibold text-slate-500">
                                {{ __('Already have an account?') }} <a href="{{ route('user.login') }}" class="text-indigo-600 hover:text-indigo-700">{{ __('Login here') }}</a>.
                            </p>
                        </div>
                    </div>

                    <div>
                        <x-button wire:target="store" class="!float-none font-semibold">{{ __('Create account') }}</x-button>
                    </div>
                </div>
            </form>
           </div>
           <div class="flex-1 bg-cover bg-center" style="background-image:url('{{ url('storage/images/register-banner.jpg') }}')">
                <img class="md:hidden block w-full" src="{{ url('storage/images/login-banner.jpg') }}" alt="">
           </div>
        </div>
    </div>
</div>

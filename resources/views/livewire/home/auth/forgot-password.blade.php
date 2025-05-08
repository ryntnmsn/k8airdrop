@section('title') Forgot Password @stop
<div>
    <div class="h-full w-full max-w-[900px] mx-auto mt-10 md:mt-40">
        <div class="flex bg-slate-900 flex-col md:flex-row rounded-3xl overflow-hidden">
           <div class="flex-1 p-10">
            <form  wire:submit.prevent="forgot">
                <h1 class="text-slate-200 font-semibold text-4xl mb-10">{{ __('Forgot password') }}</h1>
                <div>
                    <div wire:loading>  
                        <div wire:ignore role="status">
                            <span class="text-slate-200">{{ __('Loading') }}...</span>
                        </div>
                    </div>
                    <div class="mb-8">
                        @if(session()->has('error'))
                            <span class="text-base text-rose-500">{{ __(session('error')) }}</span>
                        @else
                            <span class="text-base text-green-400">{{ __(session('success')) }}</span>
                        @endif
                    </div>
                    {{-- email --}}
                    <div class="mb-8">
                        <div class="relative">
                            <div class="absolute top-0 bottom-0 my-auto w-8 h-8 ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-slate-700">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                  </svg>
                                </div>
                            <x-input-text wire:model="email" class="!bg-slate-800 border-none !text-slate-200 !ps-12 !p-4 font-bold focus:ring-indigo-600 focus:ring-2 placeholder-slate-600" placeholder="{{ __('Enter email') }}"></x-input-text>
                        </div>
                        @error('email')
                            <span class="text-sm text-rose-500 pt-2 block">{{ __($message) }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <x-button type="submit" class="!float-none font-semibold px-12">{{ __('Send reset link') }}</x-button>
                        </div>
                    </div>

                </div>

                {{-- <a href="{{ route('password.forgot') }}">Reset password</a> --}}
            </form>
           </div>
        </div>
    </div>
</div>

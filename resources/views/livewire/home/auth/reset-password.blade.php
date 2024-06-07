@section('title') Reset Password @stop
<div>
    <div class="h-full w-full max-w-[900px] mx-auto mt-10 md:mt-40">
        <div class="flex bg-slate-900 flex-col md:flex-row rounded-3xl overflow-hidden">
           <div class="flex-1 p-10">
            <form  wire:submit.prevent="resetPassword">
                <h1 class="text-slate-200 font-semibold text-4xl mb-10">{{ __('Reset Password') }}</h1>
                <div>
                    <div wire:loading>  
                        <div role="status">
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                            </svg>
                            <span class="sr-only">{{ __('Loading') }}...</span>
                        </div>
                    </div>
                    <div class="mb-8">
                        @if(session()->has('error'))
                            <span class="text-base text-rose-500">{{ __(session('error')) }}</span>
                        @else
                            <span class="text-base text-green-400">{{ __(session('success')) }}</span>
                        @endif
                    </div>
                    {{-- password --}}
                    <div class="mb-8 flex flex-col gap-5">
                        <div class="relative">
                            <div class="absolute top-0 bottom-0 my-auto w-8 h-8 ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-slate-700">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <x-input-text wire:model="password" type="password" name="password" class="!bg-slate-800 border-none !text-slate-200 !ps-12 !p-4 font-bold focus:ring-indigo-600 focus:ring-2 placeholder-slate-600" placeholder="{{ __('Enter password') }}"></x-input-text>
                        </div>
                        @error('password')
                            <span class="text-xs text-rose-600">{{__($message)}}</span>
                        @enderror
                        <div class="relative">
                            <div class="absolute top-0 bottom-0 my-auto w-8 h-8 ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-slate-700">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                  </svg>
                                </div>
                            <x-input-text wire:model="confirmed_password" type="password" name="confirmed_password" class="!bg-slate-800 border-none !text-slate-200 !ps-12 !p-4 font-bold focus:ring-indigo-600 focus:ring-2 placeholder-slate-600" placeholder="{{ __('Confirm password') }}"></x-input-text>
                        </div>
                        @error('confirmed_password')
                                <span class="text-xs text-rose-600">{{__($message)}}</span>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <x-button type="submit" class="!float-none font-semibold px-12">{{ __('Change password') }}</x-button>
                        </div>
                    </div>

                </div>

                {{-- <a href="{{ route('password.forgot') }}">Reset password</a> --}}
            </form>
           </div>
        </div>
    </div>
</div>

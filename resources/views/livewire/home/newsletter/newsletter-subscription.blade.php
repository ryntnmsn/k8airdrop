<!-- Main modal Auto pop up-->
<div wire:ignore.self id="mpopupBox" class="mpopup fixed h-full top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 max-h-full grid items-center">
    <div class="relative w-full max-w-[640px] max-h-full h-full grid items-center mx-auto">
      <!-- Modal content -->
        <div class="relative">
            <div class="absolute -top-10 flex justify-center right-20">
                <img src="{{ url('storage/images/mail-flying.png') }}" alt="" class="w-60">
            </div>
            <div class="sm:flex flex-none bg-slate-800 rounded-xl p-5 items-center">
              <div>
                <div class="rounded-lg border-0">
                  <button onclick="closeModal()" type="button" class="close absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
                  <div class="md:px-6 sm:px-0 py-6 lg:px-8">
                      <h3 class="mb-4 text-2xl font-medium text-slate-50">{{__('Get K8 Airdrop update!')}}</h3>
                      <p class="text-base mb-5 text-gray-400 !font-medium">{{__('Join our subscribers list to get latest news and updates about our promos delivered directly to your inbox')}}.</p>
                      <form wire:submit="subscribe" class="space-y-6">
                          <div>
                            <div class="relative">
                                <div class="absolute top-0 bottom-0 my-auto w-7 h-7 ms-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-slate-500">
                                        <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                        <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                                    </svg>
                                    </div>
                                <x-input-text wire:model="email" class="!bg-slate-700 border-none !text-slate-200 !ps-12 !p-4 font-bold focus:ring-indigo-600 focus:ring-2 placeholder-slate-500" placeholder="{{ __('Enter email') }}"></x-input-text>
                            </div>
                            @error('email')
                                <div class="text-rose-500 pt-2">{{ __($message) }}</div>
                            @enderror
                            <div>
                                @if (session()->has('success-message'))
                                    <div class="text-green-500 pt-2">
                                        {{ __(session('success-message')) }}
                                    </div>
                                @endif
                            </div>
                            <span class="error-msg text-sm text-slate-400" id="subscriptionMsg"></span>
                          </div>
                          <x-button type="submit" class="!float-none font-semibold px-12">{{__('SUBSCRIBE')}}</x-button>
                      </form>
                  </div>
              </div>
              </div>
            </div>
        </div>
    </div>
</div>
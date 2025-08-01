<div>
    @if(auth()->user())
        <div class="container-giveaways">
            <iframe onload="resizeIframe(this)"  class="responsive-iframe" title="仮想通貨アンケート" src="https://ooopenlab.cc/quiz/WtAUN3L4DFqQlewYoRm2" frameborder="0"></iframe>
        </div>
    @else
        <div>
            <div class="mx-auto py-10 rounded-xl flex flex-col items-center justify-center lg:w-[800px]">
                <div class="mb-10">
                    <img class="rounded-xl" src="https://img.ooopenlab.cc/VFIb-E40RxDqoXCjycTLMlpYyVqEReoX-pLyjEc3iR0/rs:fill:1920/q:90/aHR0cHM6Ly9wdWItZGNjNzVkYTE5OGY5NGQ0M2I4OGUxYTVjODcwYzQ0ZTYucjIuZGV2L2RONVE5MVpIMVdVd2tNVjQ0dmFZR3d5clBsUDIvcXVpenplcy9XdEFVTjNMNERGcVFsZXdZb1JtMi9jb3Zlci9naWYvc3JjP3Q9MTc1MzY5NTAwNA" alt="">
                </div>
                <h1 class="text-slate-200 font-semibold text-2xl mb-10 text-center">
                    【K8公式】仮想通貨アンケート｜総額$1,000相当のBTCがもらえる🎁 アンケートに答えてエアドロップコードをゲット！
                </h1>

                <h1 class="text-slate-200 font-semibold text-2xl mb-10">{{ __('Please login to participate') }}.</h1>
                <div class="flex space-x-5">
                    <x-href wire.click="login" class="!float-none font-semibold">{{ __('Login here') }}</x-href>
                    <x-href href="{{ route('user.register') }}" class="border-2 !float-none font-semibold !bg-transparent !text-[#a38e5c] !border-[#a38e5c]">{{ __('Register here') }}</x-href>
                </div>
            </div>
        </div>
    @endif



</div>

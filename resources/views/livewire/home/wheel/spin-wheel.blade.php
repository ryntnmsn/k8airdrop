<div class="h-full">
   
        @if($isJoined == false)
            <div class="h-full flex items-center justify-center">
                <div wire:ignore class="container">
                    <div class="spinBtn" wire:click="spinWheel">SPIN</div>
                    <div class="wheel">
                        <div class="number" style="--i:1;--clr:#ffaa00;">
                            <span>100</span>
                        </div>
                        <div class="number" style="--i:2;--clr:#00ff73;">
                            <span>200</span>
                        </div>
                        <div class="number" style="--i:3;--clr:#00d9ff;">
                            <span>300</span>
                        </div>
                        <div class="number" style="--i:4;--clr:#ea00ff;">
                            <span>400</span>
                        </div>
                        <div class="number" style="--i:5;--clr:#00ff33;">
                            <span>500</span>
                        </div>
                        <div class="number" style="--i:6;--clr:#0400ff;">
                            <span>600</span>
                        </div>
                        <div class="number" style="--i:7;--clr:#ff0000;">
                            <span>700</span>
                        </div>
                        <div class="number" style="--i:8;--clr:#9500ff;">
                            <span>800</span>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div>
                <div class="flex w-full h-full">
                    <div class="w-[70%]">
                        <h1 class="text-slate-200 font-semibold text-2xl">Please come back again for more exciting rewards!</h1>
                    </div>
                    <div class="w-[30%] h-full">
                        <div class="flex w-full">
                            <div class="bg-slate-900 p-10 w-full rounded-xl">
                                {{-- Users Carousel --}}
                                <div class="w-auto wrapper">
                                    <div class="boxes" id="boxCol">
                                        @foreach ($userNames as $name)
                                            <div class="box rounded-xl text-slate-200">
                                                {{ $name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    <script>
        let wheel = document.querySelector('.wheel');
        let spinBtn = document.querySelector('.spinBtn');
        let value = Math.ceil(Math.random() * 3600);

        spinBtn.onclick = function() {
            wheel.style.transform = "rotate(" + value + "deg)";
            value += Math.ceil(Math.random() * 3600);

            setTimeout(function() {
                let rewards = {{ $rewards }};
                Swal.fire({
                    title: 'Congratulations',
                    text: `You win airdrop code ${rewards}`,
                    icon: 'success',
                    iconColor: 'lightgreen'
                }).then(function() {
                    location.reload();
                })
            }, 5000);
        }
    </script>

</div>


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
                                <div class="services-ticker-block  h-96 overflow-hidden">
                                    <div class="stb_line_single">
                                        @foreach ($userNames as $name)
                                            <a class="stb-item box rounded-xl text-slate-200">
                                                <span>
                                                    {{ $name }}
                                                </span>
                                            </a>
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

    <script>
        gsap.utils.toArray('.stb_line_single').forEach((line, i) => {
        
        const links = line.querySelectorAll("a"),
                tl = verticalLoop(links, 30)
        
        tl.progress( i ? 1 : 0 )
        tl.timeScale( i ? -1 : 1 )
        
        i && tl.eventCallback("onReverseComplete", reverseCompleteHandler)
            
        function reverseCompleteHandler() {
            console.log('reverseComplete')
            tl.progress( 1 )
        }
        
        // links.forEach(link => {
        //     link.addEventListener("mouseenter", () => gsap.to(tl, {timeScale: 0, overwrite: true}));
        //     link.addEventListener("mouseleave", () => gsap.to(tl, {timeScale: i ? -1 : 1, overwrite: true}));
        // });
        
        });

        // speed can be positive or negative (in pixels per second)
        function verticalLoop(elements, speed) {
        elements = gsap.utils.toArray(elements);
        let firstBounds = elements[0].getBoundingClientRect(),
            lastBounds = elements[elements.length - 1].getBoundingClientRect(),
            top = firstBounds.top - firstBounds.height - Math.abs(elements[1].getBoundingClientRect().top - firstBounds.bottom),
            bottom = lastBounds.top,
            distance = bottom - top,
            duration = Math.abs(distance / speed),
            tl = gsap.timeline({repeat: -1}),
            plus = speed < 0 ? "-=" : "+=",
            minus = speed < 0 ? "+=" : "-=";
        elements.forEach(el => {
            let bounds = el.getBoundingClientRect(),
                ratio = Math.abs((bottom - bounds.top) / distance);
            if (speed < 0) {
            ratio = 1 - ratio;
            }
            tl.to(el, {
            y: plus + distance * ratio,
            duration: duration * ratio,
            ease: "none"
            }, 0);
            tl.fromTo(el, {
            y: minus + distance
            }, {
            y: plus + (1 - ratio) * distance,
            ease: "none",
            duration: (1 - ratio) * duration,
            immediateRender: false
            }, duration * ratio)
        });
        return tl;
        }
    </script>

</div>


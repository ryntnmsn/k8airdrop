<div class="h-full">
   
        @if($isJoined == false)
            <div class="h-full flex items-center justify-center">
                <div wire:ignore class="container">
                    <div class="spinBtn" wire:click="spinWheel">SPIN</div>
                    <div class="wheel bg-no-repeat bg-cover" style="background-image:url({{ url('storage/images/wheel_bg.jpg') }});">
                        @foreach ($wheels as $wheel)
                            <div class="number" style="--i:{{ $wheel->id }};">
                                <span>{{ $wheel->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div>
                <div class="flex w-full h-full">
                    <div class="w-[70%]">
                        <h1 class="text-slate-200 font-semibold text-2xl">Please come back again for more exciting rewards!</h1>
                        <div>
                            <p class="text-slate-200 font-semibold">Today's winners count: {{ count($winnersCount) }}</p>
                        </div>
                    </div>
                    <div class="w-[30%] h-full">
                        <div class="flex w-full">
                            <div class="bg-slate-900 p-8 w-full rounded-xl">
                                {{-- Users Carousel --}}
                                <div class="flex flex-col">
                                    <div class="flex justify-between text-slate-200 font-semibold text-sm mb-5">
                                        <div class="flex gap-1">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                    <path d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z" />
                                                  </svg>
                                            </span>
                                            <span>
                                                Names
                                            </span>
                                        </div>
                                        <div>Rewards</div>
                                    </div>
                                    <div class="services-ticker-block  h-96 overflow-hidden">
                                        <div class="stb_line_single flex w-full">
                                            @foreach ($users as $user)
                                                <div class="w-full">
                                                    <a class="stb-item box !flex text-slate-500 text-sm font-semibold !justify-between w-full border-b border-slate-800 py-2">
                                                        <span class="py-2">
                                                            {{ $user['name'] }}
                                                        </span>
                                                        <span class="py-2">
                                                            {{ $user['rewards'] }}
                                                        </span>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
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
        let value = 2000;

        spinBtn.onclick = function() {
            wheel.style.transform = "rotate(" + value + "deg)";
            value += 2000;

            setTimeout(function() {
                // let $i = 0;
                let rewards = {{ $rewards }}

                if(rewards == 0) {
                    Swal.fire({
                        title: 'Sorry',
                        text: `Come back again tomorrow for another spin`,
                        icon: 'error',
                        iconColor: 'red'
                    }).then(function() {
                        location.reload();
                    })
                } else {
                    Swal.fire({
                        title: 'Congratulations',
                        text: `You win ${rewards} dollar`,
                        icon: 'success',
                        iconColor: 'lightgreen'
                    }).then(function() {
                        location.reload();
                    })
                }
            }, 5000);
        }
    </script>

    <script>
        gsap.utils.toArray('.stb_line_single').forEach((line, i) => {
        
        const links = line.querySelectorAll("a"),
                tl = verticalLoop(links, 10)
        
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


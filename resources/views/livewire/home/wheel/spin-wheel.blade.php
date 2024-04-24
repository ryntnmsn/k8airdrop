<div class="h-full">
        @if($isJoined == false)
            <div class="h-full flex items-center justify-center">
                <div wire:ignore class="container">
                    <div class="spinBtn" wire:click="spinWheel">{{ __('SPIN') }}</div>
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
            <div class="flex w-full h-full items-center justify-center">
                <h1 class="text-slate-200 font-semibold text-2xl">{{ __('Please come back again for more exciting rewards') }}!</h1>
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
                        text: `Feel free to return tomorrow for another round of spins!`,
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


{{-- 
    <script>
        let wheel1 = document.querySelector('.wheel1');
        let spinBtn1 = document.querySelector('.spinBtn1');
        let value = 2000;

        spinBtn1.onclick = function() {
            wheel1.style.transform = "rotate(" + value + "deg)";
            value += 2000;
            setTimeout(function() {
                Swal.fire({
                    title: 'Sorry',
                    text: `Come back again tomorrow for another spin`,
                    icon: 'error',
                    iconColor: 'red'
                }).then(function() {
                    location.reload();
                })
            }, 5000);
        }
    </script> --}}



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


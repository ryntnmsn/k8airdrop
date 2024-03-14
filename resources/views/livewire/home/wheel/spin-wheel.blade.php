<div class="h-full">
    <div class="h-full flex items-center justify-center">
        <div wire:ignore class="container">
            <div class="spinBtn">SPIN</div>
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


    <script>
        let wheel = document.querySelector('.wheel');
        let spinBtn = document.querySelector('.spinBtn');
        let value = Math.ceil(Math.random() * 3600);

        spinBtn.onclick = function() {
            wheel.style.transform = "rotate(" + value + "deg)";
            value += Math.ceil(Math.random() * 3600);

            setTimeout(function() {
                Swal.fire({
                    title: 'Congratulations',
                    text: 'You win airdrop code',
                    icon: 'success',
                    iconColor: 'lightgreen'
                });
            }, 5000);
        }
    </script>


</div>


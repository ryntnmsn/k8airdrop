<div>
    <div class="glide rounded-2xl overflow-hidden">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides text-slate-100">
                @foreach ($promos as $promo)
                    <li class="glide__slide relative rounded-2xl">
                        <img src="{{ url('storage/promo', $promo->image) }}" alt="{{ $promo->name }}" class="w-full">
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
        </div>
        <div class="glide__bullets" data-glide-el="controls[nav]">
            <button class="glide__bullet" data-glide-dir="=0"></button>
            <button class="glide__bullet" data-glide-dir="=1"></button>
            <button class="glide__bullet" data-glide-dir="=2"></button>
        </div>
    </div>
</div>

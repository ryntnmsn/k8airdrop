<div>
    <div classs="mt-20">
       <div class="flex space-x-10">
            <div class="flex-none w-[70%]">
                <div>
                    <img src="{{ url('storage/promo/', $image) }}" alt="{{ $name }}" class="w-full rounded-xl">
                    <p class="text-slate-500 mb-5">
                        Duration: {{date('F j', strtotime($start_date))}} - {{date('F j Y', strtotime($end_date))}}
                    </p>
                    <h1 class="text-slate-200 text-3xl font-medium">{{ $name }}</h1>
                </div>
            </div>
            <div class="flex-none w-[30%]">
                
            </div>
       </div>
    </div>
</div>

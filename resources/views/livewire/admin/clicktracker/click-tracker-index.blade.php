<div>
    <div class="flex">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>Click Tracker (Discord)</x-title>
            <x-text-helper></x-text-helper>
        </div>
        <div class="flex-1">
            <form action="{{ route('featured.games.create') }}">
                <x-button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>
                        Create
                    </span>
                </x-button>
            </form>
        </div>
    </div>
    
    <div class="mt-10">
        <div class="flex gap-5">
            <div class="flex-1">
                <div class="bg-slate-100 border-slate-200 p-10 rounded-xl">
                    <span class="text-slate-500">Total clicks </span><br>
                    <span class="text-xl">
                        {{ count($clickTracker) }}
                    </span>
                </div>
            </div>
            <div class="flex-1">
                <div class="bg-slate-100 border-slate-200 p-10 rounded-xl">
                    <span class="text-slate-500">Total clicks today</span><br>
                    <span class="text-xl">
                        {{ count($totalClicksToday) }}
                    </span>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <table class="w-full text-left rtl:text-right rounded-2xl text-slate-700 ">
                <thead class="text-xs uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Clicks
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clickTrackerTable->groupby('click_date') as $key => $value)
                        <tr class="border-b hover:bg-slate-100 rounded-xl">
                            <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap w-1">
                                {{ count($value) }}
                            </td>
                            <td row='scope' class="px-6 py-3 font-medium whitespace-nowrap w-1">
                                {{ $key }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
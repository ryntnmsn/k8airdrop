@extends('layouts.app')

@section('contents')
<div>
    <div class="flex">
        <div class="flex-1 flex flex-col space-y-1">
            <x-title>Platforms</x-title>
            <x-text-helper>Manage platforms by using operations create, update and delete.</x-text-helper>
        </div>
        <div class="flex-1">
            <form action="{{ route('platforms.create') }}" method="get">
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
  
        <livewire:admin.platforms.index />

</div>
@endsection

@extends('layouts.app')

@section('contents')
<div>
    <div class="flex flex-col space-y-1">
        <x-title>Platforms</x-title>
        <x-text-helper>Manage platforms by using operations create, update and delete.</x-text-helper>
    </div>
    <livewire:platforms />
</div>
@endsection

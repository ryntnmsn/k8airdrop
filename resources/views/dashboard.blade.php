@extends('layouts.admin.app')

@section('contents')
    <div>
        <x-title>At a glance</x-title>
    </div>
    <div>
        <div class="cryptohopper-web-widget" data-id="2"></div>
    </div>
    <div class="grid grid-cols-3 gap-5 w-full mt-10">
        <div>
            <div class="p-5 border-slate-200 border rounded-lg bg-indigo-500">
                <div class="flex flex-col gap-5">
                    <div>
                        <x-title class="!text-white !text-4xl">{{ count($users) }}</x-title>
                    </div>
                    <div>
                        <x-text>Total number of users</x-text>
                    </div>
                </div>
            </div> 
        </div>


        <div>
            <div class="p-5 border-slate-200 border rounded-lg bg-indigo-500">
                <div class="flex flex-col gap-5">
                    <div>
                        <x-title class="!text-white !text-4xl">{{ count($newUsers) }}</x-title>
                    </div>
                    <div>
                        <x-text>Total number of new registered users</x-text>
                    </div>
                </div>
            </div> 
        </div>

        <div>
            <div class="p-5 border-slate-200 border rounded-lg bg-indigo-500">
                <div class="flex flex-col gap-5">
                    <div>
                        <x-title class="!text-white !text-4xl">{{ count($promos) }}</x-title>
                    </div>
                    <div>
                        <x-text>Total number of promos</x-text>
                    </div>
                </div>
            </div> 
        </div>

        <div>
            <div class="p-5 border-slate-200 border rounded-lg bg-indigo-500">
                <div class="flex flex-col gap-5">
                    <div>
                        <x-title class="!text-white !text-4xl">{{ count($subscribers) }}</x-title>
                    </div>
                    <div>
                        <x-text>Total number of subscribers</x-text>
                    </div>
                </div>
            </div> 
        </div>

    </div>
@endsection
<div class="h-full">
    <div class="flex gap-10 h-full">
        <div wire:ignore class="w-[20%] border-r border-slate-900">
            @include('layouts/user/nav')
        </div>
        <div class="w-[80%]">
            <div class="flex items-center justify-between pb-8">
                <div>
                    <h1 class="text-slate-200 text-3xl font-semibold border-b border-slate-900">Account<span class="text-xl"></span></h1>
                </div>
            </div>
            <div>
                @if(session()->has('success'))
                    <div id="flashMessage" class="mb-8 bg-green-600 p-3">
                        <span class="text-green-200 font-semibold">{{ session('success') }}</span>
                    </div>
                @endif
                
                <form wire:submit="updateUser">
                    <div class="flex flex-wrap gap-5 mb-10">
                        <div class="flex-1">
                            <x-label class="!text-slate-200 font-semibold">K8 Nick name</x-label>
                            <x-input-text wire:model="name" class="!p-3 text-slate-200 font-semibold bg-slate-900 border-0 w-full"></x-input-text>
                            @error('name')
                                <span class="text-rose-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <x-label class="!text-slate-200 font-semibold">K8 Username</x-label>
                            <x-input-text wire:model="k8_username" readonly class="!p-3 text-slate-600 font-semibold bg-slate-900 border-0 w-full"></x-input-text>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-5 mb-10">
                        <div class="flex-1">
                            <x-label class="!text-slate-200 font-semibold">Email</x-label>
                            <x-input-text wire:model="email" class="!p-3 text-slate-200 font-semibold bg-slate-900 border-0 w-full"></x-input-text>
                            @error('email')
                                <span class="text-rose-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="p-8 border border-slate-800 mb-10">
                        <x-label class="mb-4 !text-slate-200 font-semibold">Change password</x-label>
                        <div class="flex flex-wrap gap-5">
                            <div class="flex-1">
                                <x-label class="!text-slate-200 font-semibold">New password</x-label>
                                <x-input-text wire:model="password" type="password" name="password" class="!p-3 text-slate-200 font-semibold bg-slate-900 border-0 w-full"></x-input-text>
                            </div>
                            <div class="flex-1">
                                <x-label class="!text-slate-200 font-semibold">Confirm password</x-label>
                                <x-input-text wire:model="password_confirmation" type="password" name="password_confirmation" class="!p-3 text-slate-200 font-semibold bg-slate-900 border-0 w-full"></x-input-text>
                            </div>
                        </div>
                        @error('password')
                            <span class="text-rose-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <x-button class="!float-none">Update</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.setTimeout("document.getElementById('flashMessage').style.display='none';", 4000);
 </script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://cdn.tiny.cloud/1/19bxp0ozoqy0r717lfry5erv2vaaxw8lz3a0an0aeii0l8da/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="{{ url('assets/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <title>K8Airdrop | Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']);
    @livewireStyles
    <script>
        tinymce.init({
            plugins: 'code table lists link media',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
</head>
<body class="bg-gray-100">
    @include('layouts.admin.header')
    @include('layouts.admin.aside')

    <div class="p-4 sm:ml-64">
        <div class="bg-white mt-20 {{ request()->is('admin/promos') || request()->is('admin/articles') ? 'max-w-[1920px]' : 'max-w-screen-2xl' }} {{request()->is('admin/promos/*/question*') ? '!max-w-[780px]' : '' }} shadow-xl shadow-gray-200 mx-auto w-full p-10 rounded-xl">
            <x-alert></x-alert>
            @yield('contents')
        </div>
    </div>

    @include('layouts.admin.footer')
    @livewireScripts

    {{-- <script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script> --}}
    <script src="https://www.cryptohopper.com/widgets/js/script"></script>
</body>
</html>

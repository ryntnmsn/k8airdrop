<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']);
    @livewireStyles
</head>
<body>
    @include('layouts.header')
    @include('layouts.aside')

    <div class="p-4 sm:ml-64">
        @yield('contents')
    </div>

    @include('layouts.footer')
    @livewireScripts
</body>
</html>

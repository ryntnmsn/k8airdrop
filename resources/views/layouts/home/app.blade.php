<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']);
    @livewireStyles
</head>

<body>

    <header>
        @include('layouts.home.header')
    </header>

    <div class="bg-slate-100 h-full max-w-[1440px] mx-auto">
        @yield('contents')
    </div>

    <footer>
        @include('layouts.home.footer')
    </footer>
    @livewireScripts
</body>
</html>
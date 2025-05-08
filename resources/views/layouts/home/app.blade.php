<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{url('images/favicon-32x32.png')}}">

    <title>K8Airdrop Promo Giveaways @yield('title')</title>

    <meta property="og:title" content="K8Airdrop Promo Giveaways @yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:url" content="https://k8airdrop.com/" />
    <meta property="og:image" content="@yield('image')" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="200" />
    <meta property="og:type" content="website" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <!-- Matomo -->
    <script>
        var _paq = window._paq = window._paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
        _paq.push(["setCookieDomain", "*.k8airdrop.com"]);
        _paq.push(["setExcludedQueryParams", ["*.sarduse.com"]]);
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
        var u="https://k8.matomo.cloud/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '5']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.async=true; g.src='//cdn.matomo.cloud/k8.matomo.cloud/matomo.js'; s.parentNode.insertBefore(g,s);
        })();
    </script>
    <!-- End Matomo Code -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K45S4ZY0RP" defer></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-K45S4ZY0RP');
    </script>
    <meta name="google-site-verification" content="T9N027FUfIL4UY1BNx-srcGB6sQOg8oQYqJQDLY3MBM" />
    <style>
        .game-wheel-container {
            position:fixed;
            bottom:0;
            right:0;
            width:90px;
            padding-right:12px;
            padding-bottom:12px;
            z-index: 100
        }

        @media only screen and (max-width:1024px) {
            .game-wheel-container {
                padding-bottom:94px;
            }

        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-slate-950">
    <div class="h-full w-full flex flex-col justify-between">
        <div>
            @include('layouts.home.header')

            <div class="max-w-[1280px] w-full px-5 mx-auto mt-5 mb-10 relative box-border {{ request()->is('spin-the-wheel') || request()->is('user/dashboard*') || request()->is('user/spin-the-wheel*') || request()->is('user/account*') || request()->is('news*') ? 'h-fit' : '' }}">
                @yield('contents')
            </div>
        </div>

        @include('layouts.home.footer')
        @livewire('home.newsletter.newsletter-subscription')
    </div>

    @livewireScripts

    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    </script>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        direction: "vertical",
        slidesPerView: 3,
        loop: true,
        spaceBetween: 10,
        autoplay: {
        delay: 2500,
        disableOnInteraction: false,
        },

        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        },
    });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script>
        var banner = new Glide('#banner', {
            type: 'carousel',
            autoplay: 5000,
            loop: true,
            animationDuration: 500,
            animationTimingFunc: 'ease-in-out',
        })
        banner.mount()
    </script>

    <script>
        var carousel = new Glide('#carousel', {
            type: 'carousel',
            autoplay: 1,
            animationDuration: 10000,
            animationTimingFunc: 'linear',
            focusAt: 'center',
            perView: 3,
            gap: 17,
            breakpoints: {
                600: {
                    perView: 2
                }
            }
        })
        carousel.mount()
    </script>

    <script>
        var newsSlider = new Glide('#newsSlider', {
            type: 'slider',
            autoplay: 5000,
            animationDuration: 500,
            animationTimingFunc: 'ease-in-out',
        })
        newsSlider.mount()
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<script>
    function subscriptionPopup(){
        var mpopup = $('#mpopupBox');
        mpopup.show();
        $(".close").on('click',function(){
            mpopup.hide();
        });
        $(window).on('click', function(e) {
            if(e.target == mpopup[0]){
                mpopup.hide();
            }
        });
    }

    $(document).ready(function() {
        var popDisplayed = $.cookie('popDisplayed');
        if(popDisplayed == '1'){
            return false;
        }else{
            setTimeout( function() {
                subscriptionPopup();
            },3000);
            $.cookie('popDisplayed', '1', { expires: 7 });
        }
    });
</script>

</body>
</html>

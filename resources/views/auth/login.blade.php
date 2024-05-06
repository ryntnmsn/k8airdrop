<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="flex flex-col space-y-4 items-center justify-center h-full">
        <h1 class="font-bold text-lg uppercase text-slate-800">K8AIRDROP ADMIN</h1>
        <form action="{{route('auth.login')}}" method="post" class="bg-white p-10 rounded-2xl shadow-xl shadow-slate-200 w-[480px] flex flex-col">
            @csrf
            <h1 class="font-bold text-2xl pb-1 text-slate-800">Sign in</h1>
            <p class="pb-8 text-sm text-slate-400">Enter your credentials to access your account.</p>

            @error('errorMsg')
                <div class="w-full p-2 rounded-lg mb-4 text-center">
                    <span class="text-rose-500 text-sm">
                        {{$message}}
                    </span>
                </div>
            @enderror

            <div class="flex flex-col space-y-4 items-start">
                <div class="w-full">
                    <div class="relative">
                        <input type="text" name="email" id="floating_outlined" class="block px-2.5 pb-2.5 pt-4 w-full text-sm bg-transparent rounded-lg border-2 border-slate-200 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-500 peer" placeholder=" " />
                        <label for="floating_outlined" class="flex space-x-1 absolute text-sm text-slate-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </span>
                            <span>
                                Email address
                            </span>
                        </label>
                    </div>
                    <div>
                        @error('email')
                            <span class="text-xs text-rose-600">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="w-full">
                    <div class="relative">
                        <input type="password" name="password" id="floating_outlined" class="tracking-widest block  px-2.5 pb-2.5 pt-4 w-full text-sm bg-transparent rounded-lg border-2 border-slate-200 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-500 peer" placeholder=" " />
                        <label for="floating_outlined" class="flex space-x-1 absolute text-sm text-slate-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </span>
                            <span>
                                Password
                            </span>
                        </label>
                    </div>
                    <div>
                        @error('password')
                            <span class="text-xs text-rose-600">{{$message}}</span>
                        @enderror
                    </div>
                    

                </div>
                <button type="submit" class="flex justify-center items-center space-x-1 bg-indigo-500 px-5 py-3 text-white font-medium rounded-lg w-full hover:bg-indigo-600">
                    <span>
                        Login
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                          </svg>
                    </span>
                </button>
            </div>
        </form>
    </div>
</body>
</html>


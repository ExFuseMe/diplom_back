<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/js/notyf.js'])
    @vite(['resources/js/chart.js'])
</head>

<body class="flex min-h-screen">
<aside class="fixed top-0 left-0 h-screen w-[300px] bg-kpfu-blue text-white flex flex-col justify-between">
    <div class="mt-10">
        <div class="text-2xl flex justify-start items-center px-5 mb-2 font-bold">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 48 48" fill="none">
                    <path
                        d="M17 23.5C20.3137 23.5 23 20.8137 23 17.5C23 14.1863 20.3137 11.5 17 11.5C13.6863 11.5 11 14.1863 11 17.5C11 20.8137 13.6863 23.5 17 23.5Z"
                        fill="white"/>
                    <path d="M7 34.5C7 29 11.5 24.5 17 24.5C22.5 24.5 27 29 27 34.5V36.5H7V34.5Z" fill="white"/>
                    <path
                        d="M39 16.5H31C29.8954 16.5 29 17.3954 29 18.5V26.5C29 27.6046 29.8954 28.5 31 28.5H39C40.1046 28.5 41 27.6046 41 26.5V18.5C41 17.3954 40.1046 16.5 39 16.5Z"
                        fill="white"/>
                    <path d="M32 22.5L34 24.5L38 19.5" stroke="#005BBB" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </div>
            ПрофУчёт
        </div>

        <div class="w-full bg-white h-[0.1rem] mb-6"></div>

        <div class="">
            <a href="{{route('events.index')}}" class="px-5 py-2 items-center my-4 flex mb-12 hover:bg-white/15 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M6.133 21C4.955 21 4 20.02 4 18.81V10.008C4 9.34303 4.295 8.71303 4.8 8.29803L10.667 3.48003C11.0419 3.16961 11.5133 2.99976 12 2.99976C12.4867 2.99976 12.9581 3.16961 13.333 3.48003L19.199 8.29803C19.705 8.71303 20 9.34303 20 10.008V18.81C20 20.02 19.045 21 17.867 21H6.133Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path
                        d="M9.5 21V15.5C9.5 14.9696 9.71071 14.4609 10.0858 14.0858C10.4609 13.7107 10.9696 13.5 11.5 13.5H12.5C13.0304 13.5 13.5391 13.7107 13.9142 14.0858C14.2893 14.4609 14.5 14.9696 14.5 15.5V21"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="ml-4">
                    Главная
                </div>
            </a>
            <a href="{{route('events.create')}}" class="px-5 py-2 items-center my-4 flex mb-12 hover:bg-white/15 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M12 15.4286V12M12 12V8.57143M12 12H8.57143M12 12H15.4286M4 16.3429V7.65714C4 6.37714 4 5.73714 4.24914 5.248C4.46857 4.81714 4.81714 4.46857 5.248 4.24914C5.73714 4 6.37714 4 7.65714 4H16.3429C17.6229 4 18.2629 4 18.752 4.24914C19.1821 4.46828 19.5317 4.81793 19.7509 5.248C20 5.73714 20 6.37714 20 7.65714V16.3429C20 17.6229 20 18.2629 19.7509 18.752C19.5317 19.1821 19.1821 19.5317 18.752 19.7509C18.2629 20 17.6251 20 16.3474 20H7.65371C6.376 20 5.736 20 5.248 19.7509C4.81793 19.5317 4.46828 19.1821 4.24914 18.752C4 18.2629 4 17.6229 4 16.3429Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="ml-4">
                    Создать мероприятие
                </div>
            </a>
            <a href="{{route('events.index')}}" class="px-5 py-2 items-center my-4 flex mb-12 hover:bg-white/15 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M20 6.5H8H4M20 12H8H4M20 17.5H8H4" stroke="white" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
                <div class="ml-4">
                    Список мероприятий
                </div>
            </a>
            <a href="{{route('home')}}" class="px-5 py-2 items-center my-4 flex mb-12 hover:bg-white/15 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M12 21C14.3869 21 16.6761 20.0518 18.364 18.364C20.0518 16.6761 21 14.3869 21 12H12V3C9.61305 3 7.32387 3.94821 5.63604 5.63604C3.94821 7.32387 3 9.61305 3 12C3 14.3869 3.94821 16.6761 5.63604 18.364C7.32387 20.0518 9.61305 21 12 21Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="ml-4">
                    Аналитика
                </div>
            </a>
            <a href="{{route('events.index')}}" class="px-5 py-2 items-center my-4 flex mb-12 hover:bg-white/15 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M15.988 13L19.89 9.09799C21.327 7.66099 21.375 5.37999 19.997 4.00299C18.62 2.62499 16.339 2.67299 14.902 4.10999L11 8.01199M13 15.962L9.108 19.842C7.676 21.272 5.468 21.457 4.026 19.949C2.584 18.442 2.7 16.31 4.133 14.881L8.025 11M9 15L15 8.99999"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="ml-4">
                    Интеграции
                </div>
            </a>
        </div>
    </div>
    <div class="text-center py-4 flex justify-between mx-5 bg-kpfu-gray/50 rounded-xl p-2 mb-[1rem]">
        <div class="font-bold">
            {{auth()->user()->name}}
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path
                d="M14.5 12C14.5 11.337 14.2366 10.7011 13.7678 10.2322C13.2989 9.76339 12.663 9.5 12 9.5C11.337 9.5 10.7011 9.76339 10.2322 10.2322C9.76339 10.7011 9.5 11.337 9.5 12C9.5 12.663 9.76339 13.2989 10.2322 13.7678C10.7011 14.2366 11.337 14.5 12 14.5C12.663 14.5 13.2989 14.2366 13.7678 13.7678C14.2366 13.2989 14.5 12.663 14.5 12Z"
                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path
                d="M10.0001 4.89C10.0001 6.325 8.19806 7.424 6.92606 6.682C4.65506 5.459 2.93006 8.827 4.93606 10.178C6.16006 10.892 6.16106 13.058 4.93606 13.773C2.77306 15.084 4.74706 18.433 6.92606 17.259C8.30506 16.455 10.0011 17.771 10.0011 19.215C10.0011 21.626 13.9811 21.564 13.9811 19.215C13.9811 17.744 15.6511 16.44 17.0551 17.259C19.2951 18.466 21.2231 14.947 19.0451 13.773C17.8191 13.058 17.8201 10.883 19.0451 10.169C21.2081 8.858 19.2351 5.509 17.0551 6.682C15.8121 7.408 13.9821 6.319 13.9811 4.89C13.9811 2.33 10.0011 2.41 10.0011 4.89"
                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
</aside>

<!-- Контент -->
<main class="flex-1 bg-kpfu-black text-white p-6 ml-[300px]">
    {{ $slot }}
</main>
@fluxScripts

</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">
<flux:sidebar sticky stashable class="bg-kpfu-blue min-w-[300px] pt-[40px] pb-8 px-[20px] flex flex-col justify-between gap-1">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark"/>
    <div class="">
        <div class="flex flex-col">
            <div class="inline-flex justify-start items-center gap-1">
                <div class="w-12 h-12 flex justify-between items-center overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
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
                <div class="inline-flex flex-col justify-center items-center gap-2.5">
                    <div class="text-center justify-start text-white text-3xl font-normal font-['PT_Sans']">ПрофУчёт
                    </div>
                </div>
            </div>
            <div class="w-full bg-kpfu-gray h-[2px]"></div>
        </div>
        <div class="inline-flex flex-col justify-start items-start gap-10 mt-4">
            <div class="self-stretch h-6 inline-flex justify-start items-center gap-4">
                <div data-active="true" data-type="home" class="w-6 h-6 relative">

                </div>
                <div data-active="true" class="inline-flex flex-col justify-center items-center gap-2.5">
                    <div class="text-right justify-start text-white text-lg font-normal font-['PT_Sans']">Главная</div>
                </div>
            </div>
            <div class="self-stretch h-6 inline-flex justify-start items-center gap-4">
                <div data-active="true" data-type="add" class="w-6 h-6 p-[3px] flex justify-between items-center">

                </div>
                <div data-active="false" class="inline-flex flex-col justify-center items-center gap-2.5">
                    <div class="text-right justify-start text-zinc-400 text-lg font-normal font-['PT_Sans']">Создать мероприятие</div>
                </div>
            </div>
            <div class="self-stretch h-6 inline-flex justify-start items-center gap-4">
                <div data-active="true" data-type="list" class="w-6 h-6 relative">

                </div>
                <div data-active="false" class="inline-flex flex-col justify-center items-center gap-2.5">
                    <div class="text-right justify-start text-zinc-400 text-lg font-normal font-['PT_Sans']">Список мероприятий</div>
                </div>
            </div>
            <div class="self-stretch h-6 inline-flex justify-start items-center gap-4">
                <div data-active="true" data-type="chart" class="w-6 h-6 relative">

                </div>
                <div data-active="false" class="inline-flex flex-col justify-center items-center gap-2.5">
                    <div class="text-right justify-start text-zinc-400 text-lg font-normal font-['PT_Sans']">Аналитика</div>
                </div>
            </div>
            <div class="self-stretch h-6 inline-flex justify-start items-center gap-4">
                <div data-active="true" data-type="link" class="w-6 h-6 relative">

                </div>
                <div data-active="false" class="inline-flex flex-col justify-center items-center gap-2.5">
                    <div class="text-right justify-start text-zinc-400 text-lg font-normal font-['PT_Sans']">Интеграции</div>
                </div>
            </div>
        </div>
    </div>
    {{--bottom menu--}}
    <div class="">
        <div class="flex justify-between items-center text-2xl">
            @auth
                <div class=""><a>{{Auth::user()->name}}</a></div>
            @endauth
            <div class="">
                <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.5 10C11.5 9.33696 11.2366 8.70107 10.7678 8.23223C10.2989 7.76339 9.66304 7.5 9 7.5C8.33696 7.5 7.70107 7.76339 7.23223 8.23223C6.76339 8.70107 6.5 9.33696 6.5 10C6.5 10.663 6.76339 11.2989 7.23223 11.7678C7.70107 12.2366 8.33696 12.5 9 12.5C9.66304 12.5 10.2989 12.2366 10.7678 11.7678C11.2366 11.2989 11.5 10.663 11.5 10Z"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path
                        d="M7 2.89C7 4.325 5.198 5.424 3.926 4.682C1.655 3.459 -0.0700034 6.827 1.936 8.178C3.16 8.892 3.161 11.058 1.936 11.773C-0.227003 13.084 1.747 16.433 3.926 15.259C5.305 14.455 7.001 15.771 7.001 17.215C7.001 19.626 10.981 19.564 10.981 17.215C10.981 15.744 12.651 14.44 14.055 15.259C16.295 16.466 18.223 12.947 16.045 11.773C14.819 11.058 14.82 8.883 16.045 8.169C18.208 6.858 16.235 3.509 14.055 4.682C12.812 5.408 10.982 4.319 10.981 2.89C10.981 0.329997 7.001 0.409997 7.001 2.89"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>
</flux:sidebar>

<!-- Mobile User Menu -->
<flux:header class="lg:hidden">
    <flux:sidebar.toggle class="" icon="bars-2" inset="left"/>
</flux:header>

{{ $slot }}

@fluxScripts
</body>
</html>

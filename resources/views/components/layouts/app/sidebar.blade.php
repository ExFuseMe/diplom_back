<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>

<body class="flex min-h-screen">
<!-- Сайдбар -->
<aside class="fixed top-0 left-0 h-screen w-[300px] bg-kpfu-blue text-white flex flex-col justify-between pt-12 px-5">
    <div>
        <div class="text-2xl flex justify-start items-center">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 48 48" fill="none">
                    <path d="M17 23.5C20.3137 23.5 23 20.8137 23 17.5C23 14.1863 20.3137 11.5 17 11.5C13.6863 11.5 11 14.1863 11 17.5C11 20.8137 13.6863 23.5 17 23.5Z" fill="white"/>
                    <path d="M7 34.5C7 29 11.5 24.5 17 24.5C22.5 24.5 27 29 27 34.5V36.5H7V34.5Z" fill="white"/>
                    <path d="M39 16.5H31C29.8954 16.5 29 17.3954 29 18.5V26.5C29 27.6046 29.8954 28.5 31 28.5H39C40.1046 28.5 41 27.6046 41 26.5V18.5C41 17.3954 40.1046 16.5 39 16.5Z" fill="white"/>
                    <path d="M32 22.5L34 24.5L38 19.5" stroke="#005BBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            ПрофУчёт
        </div>
        <ul class="">
            <li class="px-5 py-4 items-center flex mb-12 hover:bg-white/15 cursor-pointer">Главная</li>
            <li class="px-5 py-4 items-center flex mb-12 hover:bg-white/15 cursor-pointer">Создать мероприятие</li>
            <li class="px-5 py-4 items-center flex mb-12 hover:bg-white/15 cursor-pointer">Список мероприятий</li>
            <li class="px-5 py-4 items-center flex mb-12 hover:bg-white/15 cursor-pointer">Аналитика</li>
            <li class="px-5 py-4 items-center flex cursor-pointer">Интеграции</li>
        </ul>
    </div>
    <div class="text-center py-4 border-t border-white/20">
        Иванов И.И.
    </div>
</aside>

<!-- Контент -->
<main class="flex-1 bg-kpfu-black text-white p-6 ml-[300px]">
    {{ $slot }}
</main>
@fluxScripts

</body>
</html>

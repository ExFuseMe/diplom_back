<div class="flex min-h-screen">
    <x-layouts.app.sidebar :title="$title ?? null">
        <main class="flex flex-col m-[40px] gap-6">
            @if(request()->routeIs('dashboard') === false)
                <div>
                    <a onclick="window.history.back()" class="flex items-center text-kpfu-blue hover:text-white hover:cursor-pointer font-semibold gap-2">
                        <x-svg-icon name="back" class="hover:text-white"/>
                        Назад
                    </a>
                </div>
            @endif

            {{ $slot }}
        </main>
    </x-layouts.app.sidebar>
</div>

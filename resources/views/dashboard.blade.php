@use(Carbon\Carbon)
<x-layouts.app :title="__('Dashboard')">
    <div class="px-2 flex h-full w-full flex-1 flex-col gap-16 rounded-xl">
        <div class="flex w-full justify-between text-black">
            <div
                class="w-72 h-72 px-10 py-3.5 bg-white rounded-2xl inline-flex flex-col justify-start items-center gap-2.5">
                <div data-active="false" class="flex flex-col justify-center items-center gap-2.5">
                    <div class="text-right justify-start text-stone-900 text-lg">Мероприятий за месяц</div>
                </div>
                <div class="w-56 text-center justify-start"><span class="text-green-500 text-lg font-bold ">+ 10%</span><span
                        class="text-black text-lg font-normal "> по сравнению с прошлым месяцом</span></div>
            </div>
            <div class="w-72 h-72 py-3.5 bg-white rounded-2xl inline-flex flex-col justify-start items-center gap-3">
                <div class="self-stretch flex flex-col justify-center items-center gap-3">
                    <div class="text-center justify-start text-stone-900 text-4xl font-bold">Предстоящие<br/>мероприятия
                    </div>
                </div>
                <div class="text-center justify-start text-black text-8xl font-bold">
                    {{$monthEvents}}
                </div>
            </div>

            <div class="w-72 h-72 py-3.5 bg-white rounded-2xl inline-flex flex-col justify-start items-center gap-3">
                <div class="self-stretch flex flex-col justify-center items-center gap-2.5">
                    <div class="text-center justify-start text-stone-900 text-4xl font-bold "> Проведённых<br/>мероприятий
                    </div>
                </div>
                <div class="text-center justify-start text-black text-8xl font-bold ">10</div>
            </div>
        </div>
        <div class="">
            <table class="w-full border-collapse text-white text-center">
                <thead>
                <tr class="">
                    <th class="p-3">Название мероприятия</th>
                    <th class="p-3">Дата/время</th>
                    <th class="p-3">Место</th>
                    <th class="p-3">Организаторов</th>
                    <th class="p-3">Участников</th>
                    <th class="p-3">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($events as $event)
                    <tr class="border-b border-white">
                        <td class="p-3 font-semibold">
                            <a href="{{ route('events.show', $event->id) }}" class="text-kpfu-blue">
                                {{ $event->name }}
                            </a>
                        </td>
                        <td class="p-3">{{ Carbon::parse($event->date)->format('d.m.Y') }} {{$event->time}}</td>
                        <td class="p-3">{{ $event->address }}</td>
                        <td class="p-3 text-center">—</td>
                        <td class="p-3 text-center">—</td>
                        <td class="p-3 flex gap-3">
                            <a href="{{ route('events.show', $event->id) }}" title="Просмотр">
{{--                                <x-flux::icon />--}}
                                <x-svg-icon name="show"/>
                            </a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Удалить мероприятие?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Удалить">
                                    <x-svg-icon name="trash"/>
                                </button>
                            </form>
                            <a href="{{ route('events.edit', $event->id) }}" title="Редактировать">
                                <x-svg-icon name="edit"/>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-layouts.app>

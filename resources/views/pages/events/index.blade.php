<x-layouts.auth>

    <div class="w-full grid grid-cols-3">
        <div class="h-[300px] w-[300px] bg-white rounded-2xl p-6 flex-col justify-center">
            <div class="text-2xl text-black text-center">Мероприятий за месяц</div>
            <canvas id="myChart" class=""></canvas>
        </div>

        <div class="h-[300px] w-[300px] bg-white rounded-2xl p-6 flex-col justify-center">
            <div class="text-2xl text-black text-center">Мероприятий в этом месяце</div>
            <div class="text-black text-center text-3xl font-bold items-center m-auto">{{$monthEvents}}</div>
        </div>

        <div class="h-[300px] w-[300px] bg-white rounded-2xl p-6 flex-col justify-center">
            <div class="text-2xl text-black text-center">Мероприятий в этом месяце</div>
            <div class="text-black text-center text-3xl font-bold items-center m-auto">{{$monthEvents}}</div>
        </div>
    </div>

    <div class="grid grid-cols-6 my-5 font-bold text-xl text-center">
        <div class="">Название</div>
        <div class="">Описание</div>
        <div class="">Место</div>
        <div class="">Дата/время</div>
        <div class="">Кол-во организаторов</div>
        <div class=""></div>
    </div>

    @foreach($events as $event)
        <div class="grid grid-cols-6 border-b-1 items-center gap-x-4">
            <div class="">{{$event->name}}</div>
            <div class="">{{$event->description}}</div>
            <div class="">{{$event->address}}</div>
            <div class="">{{$event->date}}</div>
            <div class=""></div>
            <div class="flex">
                <div class="text-kpfu-blue mx-2">1</div>
                <div class="text-kpfu-blue mx-2">2</div>
                <div class="text-kpfu-blue mx-2">3</div>
            </div>
        </div>
    @endforeach
    <script>
        window.chartData = {
            labels: @json($labels),
            data: @json($graphData),
        };

        document.addEventListener('DOMContentLoaded', () => {
            if (window.chartData) {
                const ctx = document.getElementById('myChart').getContext('2d');

                const infoEl = document.createElement('div');
                infoEl.className = `mt-2 text-sm font-medium text-black text-center`;
                infoEl.innerHTML = `<span class="text-kpfu-positive">1</span> по сравнению с прошлым месяцем`;

                ctx.canvas.parentNode.appendChild(infoEl);
            }
        });
    </script>

</x-layouts.auth>

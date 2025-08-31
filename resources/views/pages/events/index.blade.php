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

    <div class="grid grid-cols-7 my-8 font-bold text-lg text-center">
        <div class="">
            @php
                $orderPos = match (request()->query('name')){
                    'desc' => 'desc',
                    default => 'asc',
                };
            @endphp
            <a href="{{route('events.index', ['name' => $orderPos === 'asc' ? 'desc' : 'asc'])}}"
               class="flex items-center">
                <div class="">
                    @if($orderPos === 'asc')
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48" fill="none">
                            <path d="M12 18L24 30L36 18" stroke="white" stroke-width="3" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48" fill="none">
                            <path d="M36 30L24 18L12 30" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    @endif
                </div>
                <div class="">
                    Название
                </div>
            </a>
        </div>
        <div class="">
            @php
                $orderPos = match (request()->query('description')){
                    'desc' => 'desc',
                    default => 'asc',
                };
            @endphp
            <a href="{{route('events.index', ['description' => $orderPos === 'asc' ? 'desc' : 'asc'])}}"
               class="flex items-center">
                <div class="">
                    @if($orderPos === 'asc')
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48" fill="none">
                            <path d="M12 18L24 30L36 18" stroke="white" stroke-width="3" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48" fill="none">
                            <path d="M36 30L24 18L12 30" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    @endif
                </div>
                <div class="">
                    Описание
                </div>
            </a>
        </div>
        <div class="">Место</div>
        <div class="">Дата/время</div>
        <div class="">Организаторов</div>
        <div class="">Участников</div>
        <div class=""></div>
    </div>


    @foreach($events as $event)
        <div class="grid grid-cols-7 border-b-1 items-center gap-x-4 py-4">
            <div class="">{{$event->name}}</div>
            <div class="">{{$event->description}}</div>
            <div class="">{{$event->address}}</div>
            <div class="">{{$event->date}}</div>
            <div class=""></div>
            <div class=""></div>
            <div class="flex">
                <div class="text-kpfu-blue mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48" fill="none">
                        <path
                            d="M5.09998 26.812C4.55598 26.066 4.28398 25.692 4.09598 24.972C3.96906 24.3309 3.96906 23.6711 4.09598 23.03C4.28398 22.308 4.55598 21.934 5.09998 21.19C8.07798 17.1 14.606 10 24 10C33.394 10 39.922 17.1 42.9 21.188C43.444 21.934 43.716 22.308 43.904 23.028C44.0309 23.6691 44.0309 24.3289 43.904 24.97C43.716 25.692 43.444 26.066 42.9 26.81C39.922 30.9 33.394 38 24 38C14.606 38 8.07798 30.9 5.09998 26.812Z"
                            stroke="#0054C3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M24 28C25.0609 28 26.0783 27.5786 26.8284 26.8284C27.5786 26.0783 28 25.0609 28 24C28 22.9391 27.5786 21.9217 26.8284 21.1716C26.0783 20.4214 25.0609 20 24 20C22.9391 20 21.9217 20.4214 21.1716 21.1716C20.4214 21.9217 20 22.9391 20 24C20 25.0609 20.4214 26.0783 21.1716 26.8284C21.9217 27.5786 22.9391 28 24 28Z"
                            stroke="#0054C3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="text-kpfu-blue mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48" fill="none">
                        <path
                            d="M19.066 22.3C18.7278 22.6383 18.4595 23.0399 18.2766 23.4819C18.0937 23.9239 17.9997 24.3976 18 24.876V30H23.156C24.122 30 25.05 29.616 25.734 28.932L40.934 13.724C41.2729 13.3859 41.5419 12.9842 41.7253 12.542C41.9088 12.0998 42.0033 11.6258 42.0033 11.147C42.0033 10.6683 41.9088 10.1942 41.7253 9.752C41.5419 9.30979 41.2729 8.90813 40.934 8.57001L39.432 7.06801C39.0938 6.72877 38.6921 6.4596 38.2497 6.27594C37.8073 6.09228 37.333 5.99774 36.854 5.99774C36.375 5.99774 35.9007 6.09228 35.4583 6.27594C35.0159 6.4596 34.6142 6.72877 34.276 7.06801L19.066 22.3Z"
                            stroke="#0054C3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M42 24C42 32.486 42 36.728 39.364 39.364C36.728 42 32.484 42 24 42C15.516 42 11.272 42 8.636 39.364C6 36.728 6 32.484 6 24C6 15.516 6 11.272 8.636 8.636C11.272 6 15.516 6 24 6"
                            stroke="#0054C3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="text-kpfu-blue mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48" fill="none">
                        <path
                            d="M36 18L34.32 34.796C34.066 37.342 33.94 38.614 33.36 39.576C32.8513 40.4228 32.1032 41.1 31.21 41.522C30.196 42 28.92 42 26.36 42H21.64C19.082 42 17.804 42 16.79 41.52C15.8961 41.0983 15.1472 40.4211 14.638 39.574C14.062 38.614 13.934 37.342 13.678 34.796L12 18M27 31V21M21 31V21M9 13H18.23M18.23 13L19.002 7.656C19.226 6.684 20.034 6 20.962 6H27.038C27.966 6 28.772 6.684 28.998 7.656L29.77 13M18.23 13H29.77M29.77 13H39"
                            stroke="#0054C3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
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

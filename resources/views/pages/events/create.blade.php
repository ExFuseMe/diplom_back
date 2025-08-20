<x-layouts.auth>

    <div class="">
        <div class="text-3xl font-bold">Создать мероприятие</div>
        <div class="mt-6">
            <form action="{{route('events.store')}}" method="POST">
                @csrf
                <div class="my-4 flex flex-col">
                    <label>Название</label>
                    <input class="border-1 border-white rounded px-2 w-1/2" type="text" name="name" id="name"
                           required>
                </div>
                <div class="my-4 flex flex-col">
                    <label>Описание</label>
                    <input class="border-1 border-white rounded px-2 w-1/2" type="text" name="description"
                           id="description">
                </div>
                <div class="my-4 flex flex-col">
                    <label>Место проведения</label>
                    <input class="border-1 border-white rounded px-2 w-1/2" type="text" name="address"
                           id="address" required>
                </div>
                <div class="my-4 flex flex-col">
                    <label>Дата/время</label>
                    <input class="border-1 border-white rounded px-2 w-1/2" type="datetime-local"
                           name="date" id="date" required>
                </div>
                <div class="mt-6">
                    <button type="submit" class="bg-kpfu-blue rounded py-2 px-4 text-center">
                        Создать мероприятие!
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.auth>

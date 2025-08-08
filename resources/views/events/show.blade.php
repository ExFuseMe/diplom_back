<x-layouts.app :title="$event->name">
    <div class="text-3xl font-bold">
        {{$event->name}}
    </div>
    <div class="flex">
        <p class="font-semibold">Описание мероприятия:</p>
        <p>{{ $event->description }}</p>
    </div>
</x-layouts.app>

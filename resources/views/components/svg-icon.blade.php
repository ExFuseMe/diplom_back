@props(['name' => ''])

@php
    $svgPath = resource_path("svg/{$name}.svg");
    $svgContent = file_exists($svgPath) ? file_get_contents($svgPath) : '';

    // Заменяем только stroke на currentColor, fill оставляем как есть
    $svgContent = preg_replace('/stroke="[^"]*"/', 'stroke="currentColor"', $svgContent);
@endphp

<div {{ $attributes->merge(['class' => 'inline-block']) }}>
    {!! str_replace('<svg', '<svg class="w-full h-full"', $svgContent) !!}
</div>

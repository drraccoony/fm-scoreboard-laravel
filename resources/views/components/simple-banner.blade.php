@props([
    'color' => 'bg-green-400'
])

<section class="{{$color}} p-4 overflow-hidden sm:rounded-lg">
    {{$slot}}
</section>
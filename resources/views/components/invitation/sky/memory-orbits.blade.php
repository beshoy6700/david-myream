@props([
    'stars',
    'activeMessage' => null,
    'openedStars' => [],
])

@foreach([1,2,3] as $orbit)

<div
    class="orbit-layer orbit-layer-{{ $orbit }}"
    data-orbit="{{ $orbit }}"
>

    @foreach(
        $stars->filter(
            fn ($star, $index) =>
                (($index % 3) + 1) === $orbit
        ) as $star
    )

        @php

            $orbitStars =
                $stars->filter(
                    fn ($s, $i) =>
                        (($i % 3) + 1) === $orbit
                );

            $angle =
                ($loop->index / max($orbitStars->count(),1))
                * 360;

            $radius = match($orbit) {

                1 => 300,

                2 => 450,

                default => 600,
            };

            $size = collect([
                22,
                24,
                26,
                28,
                30,
                34,
                38,
            ])->random();

        @endphp

        <div
            class="orbit-star"
            style="
                --angle: {{ $angle }}deg;
                --radius: {{ $radius }}px;
                --size: {{ $size }}px;
            "
        >

            <div
    data-star-id="{{ $star->id }}"
    data-active="{{ $activeMessage && $activeMessage->id === $star->id ? 'true' : 'false' }}"

    @class([

        'memory-star',

            'opened-star'=>
    in_array(
        $star->id,
        $openedStars
    ),

    'active-star'=>
        $activeMessage &&
        $activeMessage->id === $star->id,

])

>
    ✦
</div>

        </div>

    @endforeach

</div>

@endforeach

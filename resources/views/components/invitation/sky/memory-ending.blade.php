@props([
    'showEnding',
    'stars'
])

@if($showEnding)

<div class="memory-overlay">

    <div class="memory-card">

      <div class="ending-star">

    ✦

</div>

        <div class="memory-name">
            Thank You
        </div>

       <div class="memory-message">

    <div class="memory-count">

        {{ $stars->count() }}

    </div>

    <div class="memory-text">

        Beautiful memories illuminated our sky ❤️

    </div>

    <div class="memory-love">

        ✨ ❤️ ✨

    </div>

    {{-- <div class="memory-final">

        Until we meet again...

    </div> --}}

</div>

    </div>

</div>

@endif

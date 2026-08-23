@if($activeMessage)

<div class="memory-overlay">

    <div class="memory-card">

        <div class="memory-star-icon">
            ✦
        </div>

        <div class="memory-name">
            {{ $activeMessage->guest->sky_display_name }}
        </div>

        <div class="memory-photo-box">

            {{-- <div class="memory-photo-halo"></div> --}}
            <div class="memory-photo-halo halo-1"></div>
            <div class="memory-photo-halo halo-2"></div>
            <div class="memory-photo-halo halo-3"></div>

            <img src="{{ asset('images/cover.jpg') }}" class="memory-photo">

        </div>

        <div
    class="
        memory-message
        overflow-y-auto
        max-h-[32vh]
        md:max-h-none
        px-1
    "
>

            {{-- <span class="quote">
                "
            </span> --}}

            <span class="message-text">

                {{ $activeMessage->message }}

            </span>

            {{-- <span class="quote">
                "
            </span> --}}

        </div>

        {{-- <div class="memory-love">
            ✨ ❤️ ✨
        </div> --}}

    </div>

</div>

@endif

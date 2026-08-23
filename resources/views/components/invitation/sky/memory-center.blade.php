@props([
'stars'
])
 <div class="music-toggle">

    🔊

</div>
<div class="
        absolute
        left-1/2
       top-[45%]
        z-20
        -translate-x-1/2
        -translate-y-1/2
        text-center
    ">

    <div class="mb-8">

        <div class="title-star">

            ✦

            <div class="star-tail"></div>

        </div>
        <h1 class="memory-title">

    <span class="text-white">
        Sky
    </span>

    <span class="text-yellow-400">
        Of Memories
    </span>

</h1>



    </div>

    <div class="
            relative
            mx-auto
            h-64
            w-64
        ">

        <div class="memory-halo halo-1"></div>
        <div class="memory-halo halo-2"></div>
        <div class="memory-halo halo-3"></div>

        <img src="{{ asset('images/cover.jpg') }}" class="
                couple-photo
                relative
                z-10
                h-64
                w-64
                rounded-full
                border-4
                border-yellow-500/30
                object-cover
            ">

        <div class="orbit-ring orbit-ring-1"></div>
        <div class="orbit-ring orbit-ring-2"></div>
        <div class="orbit-ring orbit-ring-3"></div>

    </div>

    {{-- <div class="
            mt-8
            inline-flex
            items-center
            gap-2
            rounded-full
            border
            border-yellow-500/20
            bg-yellow-500/10
            px-6
            py-3
            text-yellow-300
        ">

        ✨ {{ $stars->count() }} Beautiful Wishes Shine Tonight

    </div> --}}
   {{--  <p class="memory-subtitle">

        Every star carries a beautiful memory

    </p> --}}


</div>

@props([
    'settings',
])

<section
    class="
        mb-24
        mx-auto
        max-w-4xl
    "
>

    <div
        class="
            group
            relative
            overflow-hidden
            rounded-[32px]
            border
            border-yellow-500/20
            bg-white/5
            backdrop-blur-xl
            p-10
            text-center
            transition-all
            duration-700
            hover:border-yellow-500/40
            hover:shadow-[0_0_60px_rgba(234,179,8,.08)]
        "
    >

        {{-- Glow --}}
        <div
            class="
                absolute
        inset-0
        pointer-events-none
        opacity-0
        transition
        duration-700
        group-hover:opacity-100
        bg-gradient-to-br
        from-yellow-500/5
        via-transparent
        to-yellow-500/10
            "
        ></div>

        {{-- Icon --}}
        <div
            class="
                relative
                mx-auto
                mb-6
                flex
                h-20
                w-20
                items-center
                justify-center
                rounded-full
                border
                border-yellow-500/30
                bg-yellow-500/10
                text-4xl
                shadow-lg
                shadow-yellow-500/20
            "
        >
            🎉
        </div>

        {{-- Title --}}
        <h3
            class="
                relative
                text-4xl
                font-light
            "
        >
            الحفل
        </h3>

        {{-- Divider --}}
        <div
            class="
                mx-auto
                my-6
                flex
                items-center
                justify-center
                gap-4
            "
        >

            <div
                class="
                    h-px
                    w-16
                    bg-yellow-500/30
                "
            ></div>

            <span class="text-yellow-500">
                ✦
            </span>

            <div
                class="
                    h-px
                    w-16
                    bg-yellow-500/30
                "
            ></div>

        </div>

        {{-- Hall Name --}}
        <p
            class="
                mb-3
                text-xl
                text-white
            "
        >
            {{ $settings->reception_name_ar }}
        </p>



        {{-- Celebration Text --}}
        <p
            class="
                mt-6
                text-slate-400
            "
        >
            يسعدنا حضوركم ومشاركتنا
        </p>

        @if($settings->reception_maps_url)

            <div class="mt-8">

                <a
                    href="{{ $settings->reception_maps_url }}"
                    target="_blank"
                     rel="noopener noreferrer"
    class="
        relative
        z-50
        inline-flex
        items-center
        gap-2
        rounded-full
        border
        border-yellow-500/40
        bg-yellow-500/5
        px-8
        py-4
        text-yellow-400
        transition-all
        duration-300
        hover:bg-yellow-500
        hover:text-slate-900
        hover:scale-105
        hover:shadow-xl
        hover:shadow-yellow-500/20
                    "
                >
                    📍 الموقع على الخريطة
                </a>

            </div>

        @endif

    </div>

</section>

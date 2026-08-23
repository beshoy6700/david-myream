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
            ⛪
        </div>

    {{-- ==============================
    Invitation Header
============================== --}}

<div class="relative mb-14">

    {{-- Intro --}}
    <p
        class="
            text-sm
            tracking-[0.45em]
            uppercase
            text-[#D4AF37]
            font-light
        "
    >
        يتشرف كلٌ من
    </p>

    {{-- Parents --}}
 <div
    class="
        mt-8
        flex
        flex-wrap
        items-center
        justify-center
        gap-5
        text-[#F8F7F2]
    "
>
    <h3
        class="
            text-xl
            md:text-2xl
            font-light
        "
    >
        الدكتور بيشوي مكرم
    </h3>

    <span
        class="
            text-[#D4AF37]
            text-2xl
        "
    >
        ✦
    </span>

    <div class="flex flex-col items-center">
        <h3
            class="
                text-xl
                md:text-2xl
                font-light
            "
        >
            القس كيرلس ايليا
        </h3>

        <span class="text-sm md:text-base text-[#F8F7F2]">
            كاهن كنيسه السيده العذراء
        </span>
    </div>
</div>


    <div class="inv-divider">

        <span>✦</span>

    </div>

    {{-- Invitation --}}
    <div
        class="
            space-y-3
        "
    >

        <p
            class="
                text-lg
                text-[#D8DCE5]
            "
        >
            بدعوة سيادتكم والعائلة
        </p>

        <h2
            class="
                text-3xl
                md:text-4xl
                font-light
                text-[#D4AF37]
            "
        >
     لحضور صلاة الإكليل المقدس
        </h2>

    </div>



    {{-- Couple --}}
    <div
        class="
            flex
            items-center
            justify-center
            gap-10
            mt-10
        "
    >

        <div class="text-center">

            <p
                class="
                    text-xs
                    tracking-[0.4em]
                    text-slate-400
                "
            >
                الابن المبارك
            </p>

            <h2
                class="
                    mt-3
                    text-5xl
                    md:text-6xl
                    font-extralight
                    text-[#F8F7F2]
                "
            >
               ديفيد
            </h2>

        </div>

        <div
            class="
                text-4xl
                text-[#D4AF37]
            "
        >
            💍
        </div>

        <div class="text-center">

            <p
                class="
                    text-xs
                    tracking-[0.4em]
                    text-slate-400
                "
            >
                الابنة المباركة
            </p>

            <h2
                class="
                    mt-3
                    text-5xl
                    md:text-6xl
                    font-extralight
                    text-[#F8F7F2]
                "
            >
                مريام
            </h2>

        </div>

    </div>

    <div class="inv-divider">

        <span>✦</span>

    </div>



</div>
    {{-- Divider --}}

<p class="mt-8 text-2xl text-white">
    {{ $settings->church_name_ar }}
</p>

<div class="mt-8 space-y-4">

    <div class="flex justify-center items-center gap-3 text-slate-300">

        <span>📅</span>

        <span>
           الأحد 30/08/2026
        </span>

    </div>

    <div class="flex justify-center items-center gap-3 text-slate-300">

        <span>🕖</span>

        <span>
         05:30 مساءً
        </span>

    </div>

</div>




</div>


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

            <span
                class="
                    text-yellow-500
                "
            >
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


      @if($settings->church_maps_url)

<div
    class="
        mt-8
        flex
        flex-col
        items-center
        justify-center
        gap-4
        sm:flex-row
    "
>

    {{-- Google Maps --}}
    <a
        href="{{ $settings->church_maps_url }}"
        target="_blank"
        rel="noopener noreferrer"
        class="
            relative
            inline-flex
            items-center
            justify-center
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

        {{-- Calendar --}}
<a
    href="{{ route('calendar') }}" target="_blank"
rel="noopener"
    class="
        relative
        inline-flex
        items-center
        justify-center
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
📅 احفظ الموعد
</a>

</div>

@endif

    </div>

</section>

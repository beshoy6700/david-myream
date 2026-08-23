@props([
'rsvpStatus',
'attendeesCount',
'rsvpNotes',
])

<div
    class="
        relative
        overflow-hidden
        rounded-[32px]
        border
        border-yellow-500/20
        bg-white/5
        backdrop-blur-xl
        p-10
        text-center
    "
>

{{-- Glow --}}
<div
    class="
        absolute
        inset-0
        bg-gradient-to-br
        from-yellow-500/5
        via-transparent
        to-yellow-500/10
    "
></div>

<div class="relative">

    {{-- Icon --}}
    <div
        class="
            mx-auto
            mb-6
            flex
            h-20
            w-20
            items-center
            justify-center
            rounded-full
            border
            border-green-500/30
            bg-green-500/10
            text-4xl
        "
    >
        ✓
    </div>

    {{-- Title --}}
    <h3
        class="
            mb-3
            text-4xl
            font-light
        "
    >
        تم تسجيل ردكم بنجاح
    </h3>

    <p
        class="
            mb-8
            text-slate-400
        "
    >
        شكراً لتأكيد ردكم على الدعوة ✦
    </p>

    {{-- Divider --}}
    <div
        class="
            mx-auto
            mb-8
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

    {{-- Status --}}
    <div
        class="
            rounded-2xl
            border
            border-white/10
            bg-white/5
            p-5
            text-lg
        "
    >

        @if($rsvpStatus === 'attending')

            <div class="text-green-400 font-semibold">
                ✨ سأحضر
            </div>

        @else

            <div class="text-red-400 font-semibold">
                🤍 لن أتمكن من الحضور
            </div>

        @endif

    </div>

    {{-- Attendees --}}
    @if($rsvpStatus === 'attending')

        <div
            class="
                mt-4
                rounded-2xl
                border
                border-white/10
                bg-white/5
                p-5
            "
        >
            <div class="text-slate-400 mb-2">
                عدد الحضور
            </div>

            <div
                class="
                    text-3xl
                    font-bold
                    text-yellow-400
                "
            >
                {{ $attendeesCount }}
            </div>
        </div>

    @endif

    {{-- Notes --}}
    @if($rsvpNotes)

        <div
            class="
                mt-4
                rounded-2xl
                border
                border-white/10
                bg-white/5
                p-5
            "
        >

            <div
                class="
                    mb-2
                    text-slate-400
                "
            >
                الملاحظات
            </div>

            <div
                class="
                    text-slate-200
                "
            >
                {{ $rsvpNotes }}
            </div>

        </div>

    @endif

    {{-- Footer Message --}}
    @if($rsvpStatus === 'attending')

        <p
            class="
                mt-8
                text-lg
                text-yellow-300
            "
        >
            نتطلع لرؤيتكم ومشاركتكم فرحتنا ✦
        </p>

    @else

        <p
            class="
                mt-8
                text-lg
                text-slate-400
            "
        >
            نشكركم على الرد ونتمنى لكم كل الخير ✦
        </p>

    @endif

    {{-- Edit Button --}}
    <button
        wire:click="editRsvp"
        class="
            mt-10
            rounded-full
            border
            border-yellow-500/30
            bg-yellow-500/5
            px-8
            py-4
            text-yellow-400
            transition-all
            duration-300
            hover:bg-yellow-500
            hover:text-slate-900
            hover:scale-105
        "
    >
        ✦ تعديل الرد
    </button>

</div>


</div>

@props([
'rsvpStatus',
'attendeesCount',
'rsvpNotes',
])

<section
    class="
        mb-4
        mx-auto
        max-w-3xl
    "
>

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

        <div
            class="
                mb-4
                text-center
                text-4xl
                text-yellow-500
            "
        >
            ✦
        </div>

        <h3
            class="
                mb-3
                text-center
                text-4xl
                font-light
            "
        >
            هل ستشرفنا بالحضور؟
        </h3>

        <p
            class="
                mb-10
                text-center
                text-slate-400
            "
        >
            يسعدنا تأكيد حضوركم لمشاركتنا هذه المناسبة
        </p>

        <div
            class="
                grid
                gap-4
                md:grid-cols-2
            "
        >

            <button
                wire:click="$set('rsvpStatus','attending')"
                class="
                    rounded-3xl
                    border
                    p-6
                    text-center
                    transition-all
                    duration-300

                    {{
                        $rsvpStatus === 'attending'
                        ? 'border-green-500 bg-green-500/20 scale-[1.02]'
                        : 'border-white/10 hover:border-green-500/40'
                    }}
                "
            >

                <div class="mb-2 text-3xl">
                    ✨
                </div>

                <div class="text-xl font-semibold">
                    سأحضر
                </div>

                <div class="mt-2 text-sm text-slate-400">
                    أتطلع لمشاركتكم هذه الفرحة
                </div>

            </button>

            <button
                wire:click="$set('rsvpStatus','declined')"
                class="
                    rounded-3xl
                    border
                    p-6
                    text-center
                    transition-all
                    duration-300

                    {{
                        $rsvpStatus === 'declined'
                        ? 'border-red-500 bg-red-500/20 scale-[1.02]'
                        : 'border-white/10 hover:border-red-500/40'
                    }}
                "
            >

                <div class="mb-2 text-3xl">
                    🤍
                </div>

                <div class="text-xl font-semibold">
                    لن أتمكن من الحضور
                </div>

                <div class="mt-2 text-sm text-slate-400">
                    مع أطيب التمنيات لكم
                </div>

            </button>

        </div>

        @if($rsvpStatus === 'attending')

            <div class="mt-10">

                <label
                    class="
                        mb-3
                        block
                        text-yellow-400
                    "
                >
                    عدد الحضور
                </label>

                <input
                    type="number"
                    min="1"
                    wire:model.live="attendeesCount"
                    class="
                        w-full
                        rounded-2xl
                        border
                        border-white/10
                        bg-white/5
                        p-4
                        text-center
                    "
                >

                <textarea
                    wire:model.live="rsvpNotes"
                    rows="4"
                    placeholder="رسالة أو ملاحظات (اختياري)"
                    class="
                        mt-4
                        w-full
                        rounded-2xl
                        border
                        border-white/10
                        bg-white/5
                        p-4
                    "
                ></textarea>

            </div>

        @endif

        @if($rsvpStatus)

            <button
                wire:click="submitRsvp"
                class="
                    mt-10
                    w-full
                    rounded-full
                    bg-yellow-500
                    py-5
                    text-lg
                    font-bold
                    text-slate-900
                    transition-all
                    duration-300
                    hover:scale-[1.02]
                    hover:shadow-2xl
                    hover:shadow-yellow-500/30
                "
            >
                ✦ تأكيد الرد
            </button>

        @endif

    </div>

</div>

</section>

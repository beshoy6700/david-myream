@props([
    'hasMessage' => false,
])

<div
    class="
        mt-16
        mx-auto
        max-w-2xl
        rounded-[32px]
        border
        border-yellow-500/20
        bg-white/5
        backdrop-blur-xl
        p-10
        text-center
    "
>

    <div
        class="
            mb-4
            text-5xl
            text-yellow-500
        "
    >
        ✦
    </div>

    <h3
        class="
            text-3xl
            font-light
        "
    >
        أضيء  نجمة إلى سماء ذكرياتنا
    </h3>

    <p
        class="
            mt-4
            text-slate-400
            leading-relaxed
        "
    >
        كل أمنية أو صلاة أو ذكرى جميلة
        <br>
        ستتحول إلى نجمة تضيء في حياتنا
    </p>

    @if($isPublic)

<button
    wire:click="$set('showGuestModal', true)"
    class="
        mt-8
        rounded-full
        border
        border-yellow-500/40
        bg-yellow-500/10
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
    ✨ أضيء نجمتك
</button>

@else

<button
    wire:click="$set('showMemoryModal', true)"
    class="
        mt-8
        rounded-full
        border
        border-yellow-500/40
        bg-yellow-500/10
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
    {{ $hasMessage ? '✦ تعديل نجمتك' : '✨ أضيء نجمتك' }}
</button>

@endif

    {{-- <button
        wire:click="$set('showMemoryModal', true)"
        class="
            mt-8
            rounded-full
            border
            border-yellow-500/40
            bg-yellow-500/10
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
        {{ $hasMessage ? '✦ تعديل النجمة' : '✦ إنشاء نجمة' }}
    </button> --}}

    <p
        class="
            mt-6
            text-xs
            tracking-wide
            text-slate-500
        "
    >
        ✨
    </p>

</div>

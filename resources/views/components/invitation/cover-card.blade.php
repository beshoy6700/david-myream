@props([
'guestName',
'settings',
'openingAnimation' => false,
])

<div class="text-center"
  @class([
        'opening-scene' => $openingAnimation,
    ])>
{{-- Star --}}
<div
    class="
        mb-4
        text-4xl
        text-yellow-500
    "
>
    ✦
</div>


{{-- Cover Image --}}

<div
    class="
        relative
        mx-auto
        mb-6
        h-80
        w-80
    "
>

{{-- Orbit Stars --}}
<div class="orbit-wrapper">

    <div class="orbit orbit-1">✦</div>
    <div class="orbit orbit-2">✦</div>
    <div class="orbit orbit-3">✦</div>
    <div class="orbit orbit-4">✦</div>
    <div class="orbit orbit-5">✦</div>
    <div class="orbit orbit-6">✦</div>

</div>
  {{-- Halo --}}
    <div class="halo-ring"></div>
<div
    class="
        absolute
        inset-0
        scale-110
        rounded-full
        border
        border-yellow-500/15
    "
></div>

<div
    class="
        absolute
        inset-0
        rounded-full
        bg-yellow-500/10
        blur-3xl
    "
></div>

<div
    class="
        relative
        h-80
        w-80
        overflow-hidden
        rounded-full
        border-4
        border-yellow-500/30
        shadow-2xl
        shadow-yellow-500/40
        drop-shadow-[0_0_80px_rgba(234,179,8,0.45)]
        animate-[float_6s_ease-in-out_infinite]
    "
>

    <img
        src="{{ asset('images/cover.jpg') }}"
        alt="{{ $settings->groom_name }} & {{ $settings->bride_name }}"
        class="
            h-full
            w-full
            object-cover
            transition
            duration-700
            hover:scale-105
        "
    >
</div>

</div>


{{-- Couple Names --}}
<div class="flex items-center justify-center gap-4 my-6">

    <div class="h-px w-16 bg-yellow-500/40"></div>

    <span class="text-yellow-500">✦</span>

    <div class="h-px w-16 bg-yellow-500/40"></div>

</div>
<p
    class="
        mb-2
        text-lg
        tracking-[0.4em]
        text-yellow-500
    "
>
    {{ strtoupper($settings->groom_name) }}
    &
    {{ strtoupper($settings->bride_name) }}
</p>

<p
    class="
        mt-3
        text-slate-300
        text-lg
        leading-loose
    "
>

    "فالذي جمعه الله لا يفرقه إنسان"

    <span
        class="
            text-yellow-500
            text-base
            mr-2
            whitespace-nowrap
        "
    >
        ✝️ متى 19 : 6
    </span>

</p>

{{-- Main Title --}}
<h1
    class="
        mb-4
        text-2xl
        md:text-3xl
        font-light
        leading-relaxed
    "
>
يسعدنا دعوتكم

<span class="text-yellow-400">
لمشاركتنا فرحتنا
</span>
</h1>

{{-- Guest Name --}}
<h2
    class="
        mt-8
        text-3xl
        md:text-5xl
        font-bold
        tracking-tight
        text-yellow-100
    "
>
    {{ $guestName }}
</h2>

<p
    class="
        mt-4
        text-slate-400
        text-lg
    "
>
حضوركم يزيد فرحتنا
</p>

{{-- Days Remaining --}}
{{-- <div
    class="
        inline-flex
        items-center
        gap-2
        mt-6
        rounded-full
        border
        border-yellow-500/30
        bg-yellow-500/10
        px-6
        py-2
        text-yellow-400
        font-semibold
    "
>
    ✦ باقي

    {{ (int) now()->diffInDays($settings->wedding_date,false) }}
    يوم
</div> --}}

{{-- Wedding Date --}}

</div>

<style>

@keyframes float {

    0%,100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-12px);
    }
}

.orbit {
    position: absolute;
    color: #facc15;
    font-size: 22px;
    z-index: 20;
    text-shadow:
        0 0 10px rgba(250,204,21,.8),
        0 0 20px rgba(250,204,21,.6);
    animation: twinkle 3s ease-in-out infinite;
}

.orbit-1 {
    top: -15px;
    left: 50%;
}

.orbit-2 {
    top: 18%;
    left: -25px;
}

.orbit-3 {
    top: 18%;
    right: -25px;
}

.orbit-4 {
    bottom: 18%;
    left: -25px;
}

.orbit-5 {
    bottom: 18%;
    right: -25px;
}

.orbit-6 {
    bottom: -15px;
    left: 50%;
}

@keyframes twinkle {

    0%,100% {
        opacity: .35;
        transform: scale(1);
    }

    50% {
        opacity: 1;
        transform: scale(1.45);
    }
}
.orbit-wrapper{
    position:absolute;
    inset:-35px;
    animation:
        orbit 24s linear infinite;
}

@keyframes orbit{
    from{
        transform:rotate(0deg);
    }
    to{
        transform:rotate(360deg);
    }
}
.halo-ring{
    position:absolute;
    inset:-18px;
    border-radius:9999px;
    border:1px solid rgba(234,179,8,.25);
    animation:pulseHalo 4s ease-in-out infinite;
}

@keyframes pulseHalo{

    0%,100%{
        transform:scale(1);
        opacity:.3;
    }

    50%{
        transform:scale(1.08);
        opacity:.8;
    }
}
button:hover .star{
    transform:translateX(-6px);
}
.opening-scene {

    animation:
        invitationOpen 2.2s ease forwards;
}

@keyframes invitationOpen {

    0% {
        opacity: 1;
        transform: scale(1);
        filter: brightness(1);
    }

    40% {
        transform: scale(1.08);
        filter: brightness(1.4);
    }

    70% {
        transform: scale(1.18);
        filter: brightness(2);
    }

    100% {
        opacity: 0;
        transform: scale(1.35);
        filter: brightness(3);
    }
}
.opening-scene .orbit {

    animation:
        twinkle .5s ease-in-out infinite;
}

</style>

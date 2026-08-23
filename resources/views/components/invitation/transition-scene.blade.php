<div
    class="
        relative
        text-center
    "
    x-data
    x-init="
        setTimeout(() => {
            $wire.showInvitation()
        }, 5000)
    "
>


{{-- Background Glow --}}
<div
    class="
        absolute
        inset-0
        flex
        items-center
        justify-center
        pointer-events-none
    "
>
    <div
        class="
            h-96
            w-96
            rounded-full
            bg-yellow-500/10
            blur-3xl
            animate-pulse
        "
    ></div>
</div>

{{-- Main Star --}}
<div
    class="
        relative
        z-10
        mb-6
        text-6xl
        text-yellow-500
        animate-pulse
    "
>
    ✦
</div>

{{-- Couple Photo --}}
<div
    class="
        relative
        z-10
        mx-auto
        mb-10
        h-52
        w-52
        animate-[photoReveal_1.6s_ease]
    "
>

    <div
        class="
            absolute
            inset-0
            rounded-full
            bg-yellow-500/20
            blur-3xl
        "
    ></div>

    {{-- Orbit Stars --}}
    <div class="orbit-wrapper">

        <div class="orbit orbit-1">✦</div>
        <div class="orbit orbit-2">✦</div>
        <div class="orbit orbit-3">✦</div>
        <div class="orbit orbit-4">✦</div>

    </div>

    <img
        src="{{ asset('images/cover.jpg') }}"
        alt="Wedding"
        class="
            relative
            h-52
            w-52
            rounded-full
            border-4
            border-yellow-500/30
            object-cover
            shadow-2xl
            shadow-yellow-500/30
        "
    >

</div>

{{-- Text --}}
<h2
    class="
        relative
        z-10
        mb-6
        text-4xl
        md:text-6xl
        font-light
        leading-relaxed
        animate-[textReveal_2s_ease]
    "
>
    كل فرحة تصبح ذكرى
    <br>
    <span class="text-yellow-400">
        وكل ذكرى تصبح نجمة
    </span>
</h2>

<p
    class="
        relative
        z-10
        text-lg
        text-slate-400
        animate-[textReveal_2.5s_ease]
    "
>
    Every celebration becomes a memory.
    <br>
    Every memory becomes a star.
</p>

</div>

<style>

.orbit-wrapper{
    position:absolute;
    inset:-25px;
    animation:orbit 18s linear infinite;
}

.orbit{
    position:absolute;
    color:#facc15;
    font-size:18px;
}

.orbit-1{
    top:0;
    left:50%;
}

.orbit-2{
    top:50%;
    left:0;
}

.orbit-3{
    top:50%;
    right:0;
}

.orbit-4{
    bottom:0;
    left:50%;
}

@keyframes orbit{

    from{
        transform:rotate(0deg);
    }

    to{
        transform:rotate(360deg);
    }
}

@keyframes photoReveal{

    from{
        opacity:0;
        transform:scale(.7);
    }

    to{
        opacity:1;
        transform:scale(1);
    }
}

@keyframes textReveal{

    from{
        opacity:0;
        transform:translateY(20px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }
}

</style>

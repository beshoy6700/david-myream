@props([
'settings',
'guest',
])

<div class="mx-auto w-full max-w-6xl">

{{-- Hero --}}
<section class="mb-24 text-center">

    {{-- Couple Names --}}
  <div class="relative mb-8">

    <span class="name-star star-1">✦</span>
    <span class="name-star star-2">✦</span>
    <span class="name-star star-3">✦</span>

   <h1

class="
hero-names
text-6xl
md:text-8xl
leading-none
"

>

        {{ $settings->groom_name }}

        <span class="hero-center-star">


            ✦

        </span>

        {{ $settings->bride_name }}

    </h1>

</div>

<div class="flex items-center justify-center gap-4 my-6">

    <div class="h-px w-16 bg-yellow-500/40"></div>

    <span class="text-yellow-500">✦</span>

    <div class="h-px w-16 bg-yellow-500/40"></div>

</div>

    {{-- Couple Photo --}}
    <div
    class="
        relative
        mx-auto
        mt-10
        mb-10
        flex
        items-center
        justify-center
        h-40
        w-40
    "
>

     <div class="orbit-ring">

    <span class="orbit-star orbit-star-1">✦</span>
    <span class="orbit-star orbit-star-2">✦</span>
    <span class="orbit-star orbit-star-3">✦</span>
    <span class="orbit-star orbit-star-4">✦</span>

</div>

        <div
            class="
                absolute
                inset-0
                rounded-full
                bg-yellow-500/10
                blur-2xl
            "
        ></div>
<div class="halo-ring"></div>
        <img
            src="{{ asset('images/cover.jpg') }}"
            alt="{{ $settings->groom_name }} & {{ $settings->bride_name }}"
            class="
                relative
                h-40
                w-40
                rounded-full
                border-2
                border-yellow-500/30
                object-cover
                shadow-xl
                shadow-yellow-500/20
            "
        >

    </div>
{{-- Church --}}
<x-invitation.church-card
    :settings="$settings"
/>



</section>
<div class="flex items-center justify-center gap-4 my-6">

    <div class="h-px w-16 bg-yellow-500/40"></div>

    <span class="text-yellow-500">✦</span>

    <div class="h-px w-16 bg-yellow-500/40"></div>

</div>
{{-- Countdown --}}
<x-invitation.countdown
    :settings="$settings"
/>



{{-- Reception --}}

@if($guest && $guest->has_reception_invitation)

    <x-invitation.reception-card
        :settings="$settings"
    />

@endif

</div>
<link
href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&display=swap"
rel="stylesheet">
<style>

.orbit-ring{

    position:absolute;
    inset:-20px;

    animation:
        orbitSpin 30s linear infinite;
}

.orbit-star{

    position:absolute;

    color:#facc15;

    font-size:18px;

    text-shadow:
        0 0 10px rgba(250,204,21,.8);

    animation:
        heroTwinkle 3s ease-in-out infinite;
}

.orbit-star-1{
    top:0;
    left:50%;
    transform:translateX(-50%);
}

.orbit-star-2{
    right:0;
    top:50%;
    transform:translateY(-50%);
}

.orbit-star-3{
    bottom:0;
    left:50%;
    transform:translateX(-50%);
}

.orbit-star-4{
    left:0;
    top:50%;
    transform:translateY(-50%);
}
.hero-names{

    font-family:
       'Playfair Display',
        serif;

    font-weight:300;

    letter-spacing:.03em;
}
.hero-center-star{

    display:inline-flex;

    align-items:center;

    justify-content:center;

    margin:0 24px;

    color:#facc15;

    font-size:52px;

    text-shadow:
        0 0 15px rgba(250,204,21,.8),
        0 0 40px rgba(250,204,21,.6),
        0 0 80px rgba(250,204,21,.4);

    animation:
        heroStarRotate 20s linear infinite,
        heroStarTwinkle 3s ease-in-out infinite,
        heroStarFloat 5s ease-in-out infinite;
}
@keyframes orbitSpin{

    from{
        transform:rotate(0deg);
    }

    to{
        transform:rotate(360deg);
    }
}
@keyframes heroStarRotate{

    from{
        transform:rotate(0deg);
    }

    to{
        transform:rotate(360deg);
    }

}

@keyframes heroStarTwinkle{

    0%,100%{

        opacity:.5;

        filter:brightness(1);

        scale:1;

    }

    50%{

        opacity:1;

        filter:brightness(1.8);

        scale:1.3;

    }

}

@keyframes heroStarFloat{

    0%,100%{

        translate:0 0;

    }

    50%{

        translate:0 -8px;

    }

}
@keyframes heroTwinkle{

    0%,100%{
        opacity:.3;
        transform:scale(1);
    }

    50%{
        opacity:1;
        transform:scale(1.4);
    }
}
@keyframes haloPulse{

    0%,100%{
        transform:scale(1);
        opacity:.4;
    }

    50%{
        transform:scale(1.08);
        opacity:1;
    }
}
.name-star{
    position:absolute;
    color:#facc15;
    animation:twinkle 3s infinite ease-in-out;
}

.star-1{
    top:-40px;
    left:45%;
}

.star-2{
    top:-10px;
    left:20%;
}

.star-3{
    top:-10px;
    right:20%;
}

@keyframes twinkle{

    0%,100%{
        opacity:.4;
        transform:scale(1);
    }

    50%{
        opacity:1;
        transform:scale(1.3);
    }
}
.halo-ring{

    position:absolute;
    inset:-18px;

    border-radius:9999px;

    border:1px solid
    rgba(250,204,21,.15);

    animation:
        haloPulse 5s ease-in-out infinite;
}

</style>

@props([
    'stars',
    'activeMessage' => null,
    'openedStars' => [],
    'showEnding',
])


<div
    class="
        relative
        min-h-screen
        overflow-hidden
        bg-[#020617]
        text-white
    "
>

<x-invitation.star-background />

{{-- Center --}}
<div
    class="
        absolute
        left-1/2
        top-1/2
        z-20
        -translate-x-1/2
        -translate-y-1/2
        text-center
    "
>

    <div class="mb-8">
<div class="title-star">
    ✦
</div>


      <h1 class="memory-title">
    سماء الذكريات
</h1>

        <p
            class="
                mt-3
                text-slate-400
            "
        >
            كل نجمة تحمل أمنية أو ذكرى جميلة
        </p>

    </div>

    <div
        class="
            relative
            mx-auto
            h-64
            w-64
        "
    >

      <div class="memory-halo halo-1"></div>
<div class="memory-halo halo-2"></div>
<div class="memory-halo halo-3"></div>

        <img
    src="{{ asset('images/cover.jpg') }}"
    class="
        couple-photo
        relative
        z-10
        h-64
        w-64
        rounded-full
        border-4
        border-yellow-500/30
        object-cover
    "
>

        <div class="orbit-ring orbit-ring-1"></div>
<div class="orbit-ring orbit-ring-2"></div>
<div class="orbit-ring orbit-ring-3"></div>

    </div>

    <div
        class="
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
        "
    >
        ✨ {{ $stars->count() }} نجمة تضيء سماء ذكرياتنا
    </div>

</div>

{{-- Stars --}}
@foreach([1,2,3] as $orbit)

<div class="orbit-layer orbit-layer-{{ $orbit }}">

    @foreach(
        $stars->filter(
            fn ($star, $index) =>
                (($index % 3) + 1) === $orbit
        ) as $index => $star
    )

        @php

            $orbitStars =
                $stars->filter(
                    fn ($s, $i) =>
                        (($i % 3) + 1) === $orbit
                );

            $angle =
                ($loop->index / max($orbitStars->count(),1))
                * 360;

            $radius = match($orbit) {
    1 => 300,
    2 => 450,
    default => 600,
};
       $size = collect([
    22,
    24,
    26,
    28,
    30,
    34,
    38,
])->random();

        @endphp

       <div
    class="orbit-star"
    style="
        --angle: {{ $angle }}deg;
        --radius: {{ $radius }}px;
        --size: {{ $size }}px;
    "
>
   <div
    class="
        memory-star

        {{ in_array($star->id, $openedStars ?? [])
            ? 'opened-star'
            : ''
        }}

        {{ $activeMessage?->id === $star->id
            ? 'active-star'
            : ''
        }}
    "
    data-star-id="{{ $star->id }}"
>
✦</div>
</div>

    @endforeach

</div>

@endforeach



</div>


@if($activeMessage)

<div class="memory-overlay">
<div class="memory-bg"></div>
    <div class="memory-card">

        <div class="memory-star-icon">
            ✦
        </div>

        <div class="memory-name">
            {{ $activeMessage->guest->sky_display_name }}
        </div>
<div class="heart heart1">❤️</div>
<div class="heart heart2">💖</div>
<div class="heart heart3">✨</div>
        <div class="memory-photo-wrapper">

            <div class="photo-halo halo-1"></div>
            <div class="photo-halo halo-2"></div>
            <div class="photo-halo halo-3"></div>


            <img
                src="{{ asset('images/cover.jpg') }}"
                class="memory-photo"
            >

        </div>



     <div class="memory-message typewriter">
    ❝ {{ $activeMessage->message }} ❞
</div>

    <div class="memory-footer">
            ✨ ❤️ ✨
        </div>

    </div>

</div>

@endif

@if($showEnding)

<div class="memory-overlay">

    <div class="memory-card">

        <div class="text-6xl mb-6">
            ✨
        </div>

        <h2 class="text-4xl text-yellow-300 mb-6">
            شكراً لكم
        </h2>

        <p class="text-2xl leading-loose">
            {{ $stars->count() }}
            نجوم أضاءت سماءنا
            💛
        </p>

    </div>

</div>

@endif

<div class="shooting-star"></div>
<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>

<script>

window.addEventListener('star-selected', event => {

    let star =
        document.querySelector(
            `[data-star-id="${event.detail.id}"]`
        );

    if (!star) return;

    gsap.timeline()

        .to(star, {
            scale: 4,
            duration: .8,
            ease: 'power2.out'
        })

        .to(star, {
            x:
                window.innerWidth / 2
                - star.getBoundingClientRect().left,

            y:
                window.innerHeight / 2
                - star.getBoundingClientRect().top,

            duration: 1.2,
            ease: 'power3.inOut'
        })

        .to(star, {
            scale: 10,
            opacity: 0,
            duration: .5
        });

});

</script>
<script>
document.addEventListener('livewire:init', () => {

    let started = false;

    Livewire.on('presentation-started', () => {

        if(started){
            return;
        }

        started = true;

        playPresentation();
    });

    function playPresentation() {

        @this.nextMessage();

        setTimeout(() => {
            @this.hideMessage();
        }, 5000);

        setTimeout(() => {
            playPresentation();
        }, 8000);
    }
});
</script>

</div>

<style>
.memory-memory{

    text-align:center;

    max-width:700px;

    animation:
        memoryAppear 1s ease;
}
.halo-3{

    inset:-80px;

    animation:
        haloPulse 10s infinite;

}
.typewriter{

    overflow:hidden;

    white-space:nowrap;

    border-left:2px solid gold;

    width:0;

    animation:
        typing 4s steps(40,end) forwards,
        blink .7s infinite;

}
@keyframes typing{

    from{
        width:0;
    }

    to{
        width:100%;
    }

}

@keyframes blink{

    50%{
        border-color:transparent;
    }

}
.heart{

    position:absolute;

    font-size:28px;

    opacity:.7;

}

.heart1{

    left:20%;
    top:75%;

    animation:floatHeart 6s infinite;
}

.heart2{

    right:20%;
    top:70%;

    animation:floatHeart 7s infinite;
}

.heart3{

    left:50%;
    bottom:10%;

    animation:floatHeart 5s infinite;
}
.memory-bg{

    position:absolute;
    inset:0;

    background:url('{{ asset("images/cover.jpg") }}');

    background-size:cover;
    background-position:center;

    filter:blur(30px);

    opacity:.12;

    animation:bgFloat 20s ease-in-out infinite;

}
@keyframes bgFloat{

    0%,100%{
        transform:scale(1);
    }

    50%{
        transform:scale(1.08);
    }

}
.memory-author{

    font-size:42px;

    color:#FFD700;

    margin-bottom:25px;

    text-shadow:
        0 0 25px gold;
}

.memory-halo{

    position:absolute;

    inset:-25px;

    border-radius:9999px;

    border:1px solid rgba(250,204,21,.15);

    animation:
        haloPulse 5s ease-in-out infinite;
}

@keyframes haloPulse{

    0%,100%{

        transform:scale(1);
        opacity:.2;

    }

    50%{

        transform:scale(1.08);
        opacity:1;

    }

}

.memory-flash{

    position:absolute;

    inset:0;

    pointer-events:none;

    background:
        radial-gradient(
            circle,
            rgba(255,215,0,.25),
            transparent 60%
        );

    animation:
        flashGlow 2s ease-out;

}

@keyframes flashGlow{

    from{
        opacity:1;
    }

    to{
        opacity:0;
    }
}
@keyframes starFloat{

    0%,100%{
        transform:
            translateY(0);
    }

    50%{
        transform:
            translateY(-8px);
    }
}
@keyframes starPulse {

    0%,100%{

        filter:
            drop-shadow(0 0 8px gold);
    }

    50%{

        filter:
            drop-shadow(0 0 25px gold);
    }
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
.couple-photo{
    animation: coupleFloat 8s ease-in-out infinite;
    box-shadow:
    0 0 60px rgba(250,204,21,.15),
    0 0 120px rgba(250,204,21,.08);
}
#memory-message{

    animation:
        memoryReveal .8s ease;
}
.shooting-star{

    position:absolute;

    top:-100px;
    left:-200px;

    width:250px;
    height:2px;

    background:
        linear-gradient(
            90deg,
            transparent,
            white
        );

    opacity:0;

    animation:
        shootingStar 12s linear infinite;
}

@keyframes shootingStar{

    0%,85%{
        opacity:0;
        transform:
            translate(0,0)
            rotate(25deg);
    }

    90%{
        opacity:1;
    }

    100%{
        opacity:0;
        transform:
            translate(2200px,900px)
            rotate(25deg);
    }
}

@keyframes memoryReveal{

    from{

        opacity:0;

        transform:
            translateY(30px);

        filter:
            blur(8px);
    }

    to{

        opacity:1;

        transform:
            translateY(0);

        filter:
            blur(0);
    }
}
@keyframes coupleFloat {

    0%,100%{
        transform:
            translateY(0)
            rotate(-1deg);
    }

    50%{
        transform:
            translateY(-15px)
            rotate(1deg);
    }
}
.orbit-ring{

    position:absolute;

    left:50%;
    top:50%;

    transform:
        translate(-50%,-50%);

    border-radius:9999px;

    border:
        1px solid rgba(250,204,21,.08);
}

.orbit-ring-1{
    width:600px;
    height:600px;
}

.orbit-ring-2{
    width:900px;
    height:900px;
}

.orbit-ring-3{
    width:1200px;
    height:1200px;
}

.orbit-star{

    position:absolute;

    left:50%;
    top:50%;

    width:0;
    height:0;

    transform:
        rotate(var(--angle))
        translateX(var(--radius));
}
.memory-star{

    position:absolute;

    left:0;
    top:0;

    color:#facc15;

    font-size:var(--size);

    line-height:1;

    text-shadow:
        0 0 10px rgba(250,204,21,.8),
        0 0 25px rgba(250,204,21,.6),
        0 0 50px rgba(250,204,21,.4);

    animation:
        starFloat 6s ease-in-out infinite,
        starPulse 4s ease-in-out infinite;
}


@keyframes activeStarRotate{

    from{
        rotate:0deg;
    }

    to{
        rotate:360deg;
    }
}
@keyframes orbitSpin {

    from{
        transform:
            translate(-50%,-50%)
            rotate(0deg);
    }

    to{
        transform:
            translate(-50%,-50%)
            rotate(360deg);
    }
}

.orbit-layer{

    position:absolute;

    inset:0;
}
.orbit-layer-1{

    animation:
        orbitSpin 120s linear infinite;
}

.orbit-layer-2{

    animation:
        orbitSpinReverse 180s linear infinite;
}

.orbit-layer-3{

    animation:
        orbitSpin 240s linear infinite;
}
.title-star{

    position:absolute;

    top:-60px;

    left:50%;

    color:#facc15;

    font-size:38px;

    animation:
        titleStarFloat 8s ease-in-out infinite,
        titleStarGlow 4s ease-in-out infinite;
}
.memory-title{

   font-size: clamp(3rem, 6vw, 5rem);

    font-weight:200;

    letter-spacing:2px;

    line-height:1.2;

    color:white;

    text-shadow:
        0 0 30px rgba(255,255,255,.15);
}
.memory-subtitle{

    margin-top:12px;

    font-size:1.35rem;

    color:#94a3b8;

    letter-spacing:.5px;
}
.memory-overlay{

    position:fixed;
    inset:0;

    display:flex;
    justify-content:center;
    align-items:center;

    backdrop-filter:blur(10px);

    background:
    radial-gradient(
        circle,
        rgba(0,0,0,.1),
        rgba(0,0,0,.65)
    );

    z-index:9999;

}

.memory-card{

    text-align:center;

    animation:memoryAppear 1s ease;

}
.memory-photo{

    width:250px;
    height:250px;

    border-radius:999px;

    object-fit:cover;

    border:4px solid rgba(250,204,21,.25);

    position:relative;
    z-index:2;

}
.photo-halo{

    position:absolute;

    inset:-15px;

    border-radius:999px;

    border:1px solid rgba(250,204,21,.2);

}
.halo-1{

    animation:haloPulse 4s infinite;
}

.halo-2{

    inset:-40px;

    animation:haloPulse 6s infinite;
}
.halo-3{
    inset:-70px;
    animation:haloPulse 9s infinite;
}
.memory-star-icon{

    color:#FFD700;

    font-size:55px;

    filter:
        drop-shadow(0 0 20px gold)
        drop-shadow(0 0 50px gold);

    animation:
        starFloat 4s ease-in-out infinite;

}
.memory-name{

        font-size:42px;
    margin-bottom:25px;

    color:#FFD700;


    text-shadow:
        0 0 20px gold;

}

@keyframes photoHalo{

    0%,100%{
        transform:scale(1);
        box-shadow:
            0 0 40px rgba(250,204,21,.3);
    }

    50%{
        transform:scale(1.03);
        box-shadow:
            0 0 100px rgba(250,204,21,.5);
    }
}

.memory-message{

    margin-top:25px;
    font-size:28px;

    line-height:2;

    color:white;

    max-width:1000px;

    text-shadow:
        0 0 10px rgba(255,255,255,.2);

}
.memory-footer{

    margin-top:40px;

    font-size:32px;

    animation:
        heartFloat 4s ease-in-out infinite;

}
.memory-photo-wrapper{

    position:relative;

    width:250px;
    height:250px;

    margin:auto;

}
@keyframes memoryDrop{

    from{

        opacity:0;

        transform:
            translateY(-120px)
            scale(.8);

        filter:
            blur(20px);
    }

    to{

        opacity:1;

        transform:
            translateY(0)
            scale(1);

        filter:
            blur(0);
    }
}
.opened-star{

    opacity:.15;

    transform:
        scale(.5);

    filter:none;

    transition:all 1s ease;
}


@keyframes activeStarPulse{

    0%,100%{

        transform:
            scale(1);
    }

    50%{

        transform:
            scale(2.5);
    }
}
.memory-card h3{

    font-size:42px;

    font-weight:300;

    color:#FFD700;

    margin-bottom:25px;
}
.active-star{

    color:#FFD700;

    z-index:9999;

    animation:
        activeStarPulse 1.5s ease-in-out infinite,

}

@keyframes activeStarPulse{

    0%,100%{

        transform:scale(1);
    }

    50%{

        transform:scale(2);
    }
}

@keyframes activeStarRotate{

    from{
        rotate:0deg;
    }

    to{
        rotate:360deg;
    }
}
@keyframes activeStarGlow{

    0%,100%{

        filter:
            drop-shadow(0 0 10px gold);
    }

    50%{

        filter:
            drop-shadow(0 0 40px gold)
            drop-shadow(0 0 80px gold);
    }
}
@keyframes titleStarFloat{

    0%,100%{

        transform:
            translateX(-50%)
            translateY(0);
    }

    25%{

        transform:
            translateX(-70%)
            translateY(-10px);
    }

    75%{

        transform:
            translateX(-30%)
            translateY(-10px);
    }
}
@keyframes titleStarGlow{

    0%,100%{

        text-shadow:
            0 0 10px gold;
    }

    50%{

        text-shadow:
            0 0 30px gold,
            0 0 60px gold;
    }
}
@keyframes orbitSpin{

    from{

        transform:rotate(0deg);
    }

    to{

        transform:rotate(360deg);
    }
}

@keyframes orbitSpinReverse{

    from{

        transform:rotate(360deg);
    }

    to{

        transform:rotate(0deg);
    }
}

@keyframes memoryAppear{

    from{

        opacity:0;

        transform:
            scale(.7)
            translateY(100px);

    }

    to{

        opacity:1;

        transform:
            scale(1)
            translateY(0);

    }

}
</style>

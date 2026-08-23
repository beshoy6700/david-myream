<style>
    @keyframes twinkle {
        0%,100% {
            opacity:.2;
            transform:scale(1);
        }

        50% {
            opacity:1;
            transform:scale(1.4);
        }
    }

    @keyframes shooting-star {
        0% {
            transform:translateX(0) translateY(0);
            opacity:0;
        }

        10% {
            opacity:1;
        }

        100% {
            transform:translateX(-500px) translateY(250px);
            opacity:0;
        }
    }

    .star {
        position:absolute;
        border-radius:9999px;
        background:white;

        box-shadow:
            0 0 6px rgba(255,255,255,.8),
            0 0 12px rgba(255,255,255,.5);
    }

    .shooting-star {
        position:absolute;

        width:120px;
        height:2px;

        background:
            linear-gradient(
                to left,
                rgba(255,255,255,1),
                rgba(255,255,255,0)
            );

        animation:
            shooting-star 10s linear infinite;
    }
</style>

<div class="absolute inset-0 overflow-hidden">

    @for($i = 0; $i < 35; $i++)

        <span
            class="star"
            style="
                width: {{ rand(1,4) }}px;
                height: {{ rand(1,4) }}px;

                left: {{ rand(0,100) }}%;
                top: {{ rand(0,100) }}%;

                animation:
                    twinkle
                    {{ rand(2,8) }}s
                    ease-in-out
                    infinite;

                animation-delay:
                    -{{ rand(0,8) }}s;
            "
        ></span>

    @endfor

    <span
        class="shooting-star"
        style="top:15%;left:90%;"
    ></span>

    <span
        class="shooting-star"
        style="
            top:45%;
            left:100%;
            animation-delay:4s;
        "
    ></span>

</div>

<div
    class="
        absolute
        inset-0
        bg-[radial-gradient(circle_at_center,rgba(212,175,55,0.20),transparent_65%)]
    "
></div>

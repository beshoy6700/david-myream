@props([
    'settings',
])

<section
    class="mb-32 relative"
    x-data="{
        days:0,
        hours:0,
        minutes:0,
        seconds:0,

        init(){

            const target =
                new Date('{{ $settings->wedding_date->toIso8601String() }}');

            const update = () => {

                const diff = target - new Date();

                this.days =
                    Math.max(
                        Math.floor(diff / 86400000),
                        0
                    );

                this.hours =
                    Math.max(
                        Math.floor(
                            (diff % 86400000)
                            / 3600000
                        ),
                        0
                    );

                this.minutes =
                    Math.max(
                        Math.floor(
                            (diff % 3600000)
                            / 60000
                        ),
                        0
                    );

                this.seconds =
                    Math.max(
                        Math.floor(
                            (diff % 60000)
                            / 1000
                        ),
                        0
                    );
            };

            update();

            setInterval(update,1000);
        }
    }"
>

    {{-- Global Glow --}}
    <div
        class="
            absolute
            left-1/2
            top-1/2
            -translate-x-1/2
            -translate-y-1/2
            h-64
            w-[900px]
            rounded-full
            bg-yellow-500/10
            blur-3xl
            pointer-events-none
        "
    ></div>

    <div class="relative text-center">


        {{-- Star --}}
        <div
            class="
                mb-4
                text-4xl
                text-yellow-500
                animate-pulse
            "
        >
            ✦
        </div>

        {{-- Dynamic Title --}}
        <h3
            class="
                text-3xl
                md:text-5xl
                font-light
            "
        >
            <span
                class="
                    text-yellow-400
                    font-semibold
                "
                x-text="days"
            ></span>

            يوماً على ليلة العمر
        </h3>

        <p
            class="
                mt-4
                mb-14
                text-lg
                text-slate-400
            "
        >
            كل ثانية تقربنا من لحظة لن تُنسى ✦
        </p>

        {{-- Counter --}}
        <div
            class="
                grid
                grid-cols-2
                md:grid-cols-4
                gap-6
                max-w-5xl
                mx-auto
            "
        >

            {{-- Days --}}
            <div
                class="
                    group
                    relative
                    overflow-hidden
                    rounded-3xl
                    border
                    border-yellow-500/20
                    bg-white/5
                    backdrop-blur-md
                    p-8
                    transition-all
                    duration-500
                    hover:border-yellow-500/50
                    hover:shadow-2xl
                    hover:shadow-yellow-500/10
                "
            >

                <div class="mb-3 text-xl text-yellow-500">
                    ✦
                </div>

                <div
                    class="
                        relative
                        text-5xl
                        md:text-6xl
                        font-bold
                        text-white
                        drop-shadow-[0_0_15px_rgba(255,255,255,.4)]
                    "
                    x-text="days"
                ></div>

                <div
                    class="
                        mt-3
                        text-sm
                        tracking-[0.3em]
                        text-yellow-400
                    "
                >
                    يوم
                </div>

            </div>

            {{-- Hours --}}
            <div
                class="
                    group
                    relative
                    overflow-hidden
                    rounded-3xl
                    border
                    border-yellow-500/20
                    bg-white/5
                    backdrop-blur-md
                    p-8
                    transition-all
                    duration-500
                    hover:border-yellow-500/50
                    hover:shadow-2xl
                    hover:shadow-yellow-500/10
                "
            >

                <div class="mb-3 text-xl text-yellow-500">
                    ✦
                </div>

                <div
                    class="
                        text-5xl
                        md:text-6xl
                        font-bold
                        text-white
                        drop-shadow-[0_0_15px_rgba(255,255,255,.4)]
                    "
                    x-text="hours"
                ></div>

                <div
                    class="
                        mt-3
                        text-sm
                        tracking-[0.3em]
                        text-yellow-400
                    "
                >
                    ساعة
                </div>

            </div>

            {{-- Minutes --}}
            <div
                class="
                    group
                    relative
                    overflow-hidden
                    rounded-3xl
                    border
                    border-yellow-500/20
                    bg-white/5
                    backdrop-blur-md
                    p-8
                    transition-all
                    duration-500
                    hover:border-yellow-500/50
                    hover:shadow-2xl
                    hover:shadow-yellow-500/10
                "
            >

                <div class="mb-3 text-xl text-yellow-500">
                    ✦
                </div>

                <div
                    class="
                        text-5xl
                        md:text-6xl
                        font-bold
                        text-white
                        drop-shadow-[0_0_15px_rgba(255,255,255,.4)]
                    "
                    x-text="minutes"
                ></div>

                <div
                    class="
                        mt-3
                        text-sm
                        tracking-[0.3em]
                        text-yellow-400
                    "
                >
                    دقيقة
                </div>

            </div>

            {{-- Seconds --}}
            <div
                class="
                    group
                    relative
                    overflow-hidden
                    rounded-3xl
                    border
                    border-yellow-500/20
                    bg-white/5
                    backdrop-blur-md
                    p-8
                    animate-pulse
                    transition-all
                    duration-500
                    hover:border-yellow-500/50
                    hover:shadow-2xl
                    hover:shadow-yellow-500/10
                "
            >

                <div class="mb-3 text-xl text-yellow-500">
                    ✦
                </div>

                <div
                    class="
                        text-5xl
                        md:text-6xl
                        font-bold
                        text-white
                        drop-shadow-[0_0_15px_rgba(255,255,255,.4)]
                    "
                    x-text="seconds"
                ></div>

                <div
                    class="
                        mt-3
                        text-sm
                        tracking-[0.3em]
                        text-yellow-400
                    "
                >
                    ثانية
                </div>

            </div>

        </div>

    </div>

</section>

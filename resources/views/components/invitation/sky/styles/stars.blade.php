<style>

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

    position:relative;

    color:#facc15;

    font-size:var(--size);

    text-shadow:
        0 0 10px rgba(250,204,21,.8),
        0 0 30px rgba(250,204,21,.5);

    animation:
        twinkle 4s ease infinite,
        starFloat 6s ease infinite;

}

.active-star{

    filter:
        drop-shadow(0 0 20px gold)
        drop-shadow(0 0 50px gold);

    animation:
        activeStarPulse 1.5s ease infinite;
}

.opened-star{
    opacity:.15;
}

.memory-finale{

    opacity:1 !important;

    animation:
        finaleGlow 2s ease infinite;
}

.flying-star{

    color:#FFD700;

    filter:
        drop-shadow(0 0 20px gold)
        drop-shadow(0 0 70px gold);

    animation:
        activeStarPulse 2s infinite;

}

.returning-star::after{

    content:'';

    position:absolute;

    top:50%;

    left:100%;

    width:70px;

    height:2px;

    opacity:.7;

    background:
        linear-gradient(
            to right,
            gold,
            transparent
        );

    transform:
        translateY(-50%);

    animation:
        shootingTail 1s ease infinite;

}

</style>

<style>

.memory-halo{

    position:absolute;

    inset:-25px;

    border-radius:9999px;

    border:1px solid rgba(250,204,21,.15);

    animation:
        haloPulse 6s ease-in-out infinite;
}


.couple-photo{
box-shadow:
0 0 60px rgba(250,204,21,.2),
0 0 120px rgba(250,204,21,.1),
0 0 200px rgba(250,204,21,.05);

margin-top: 40px;
}


.memory-title{

   font-size:5rem;

    line-height:1;

   font-family: 'Cormorant Garamond', serif;

    font-weight:100;

    letter-spacing:3px;

    color:white;

    text-shadow:
        0 0 30px rgba(255,255,255,.1);

}

.memory-title span{

    display:block;

}
.gold-word{

    color:#FFD700;

    text-shadow:

        0 0 20px gold,

        0 0 40px rgba(255,215,0,.4);

}

.memory-subtitle{

    margin-top:15px;

    color:#94a3b8;

}


.orbit-ring{

    position:absolute;

    left:50%;
    top:50%;

    transform:
        translate(-50%,-50%);

    border-radius:9999px;

    border:
        1px solid rgba(250,204,21,.06);

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
.title-star{

    position:absolute;

    top:-45px;

    left:50%;

    color:#facc15;

    font-size:55px;
    margin-bottom:40px;

    transform:
        translateX(-50%);

    animation:
        titleStarFloat 10s ease-in-out infinite,
        titleStarGlow 4s ease-in-out infinite,
        titleStarRotate 30s linear infinite,
        titleStarJump 15s ease-in-out infinite;

}

</style>

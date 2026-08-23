<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500&family=Outfit:wght@300;400;500&display=swap"
      rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500&family=Manrope:wght@300;400;500&display=swap"
rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Marhey:wght@300;400;500&display=swap" rel="stylesheet">


<style>
.memory-overlay{

    position:fixed;

    inset:0;

    display:flex;

    justify-content:center;

    align-items:center;

    background:

        radial-gradient(

            circle,

            rgba(15,23,42,.1),

            rgba(0,0,0,.55)

        );

    backdrop-filter:blur(12px);

    z-index:99999;

    animation:

        overlayFade .8s ease,

        flashLight .8s ease;

}
.memory-card{

    text-align:center;

    animation:

        memoryAppear 1s ease;

}
.memory-star-icon{

    position:relative;

    display:inline-block;

    color:#FFD700;

    font-size:52px;

    margin-bottom:25px;

    text-shadow:
        0 0 15px gold,
        0 0 40px rgba(255,215,0,.8),
        0 0 80px rgba(255,215,0,.5);

    animation:
        starFloat 4s ease-in-out infinite,
        starGlow 2.5s ease-in-out infinite;

}
.memory-star-icon::before{

    content:'✦';

    position:absolute;

    inset:0;

    filter:blur(10px);

    opacity:.5;

    z-index:-1;

    animation:
        starPulse 3s linear infinite;

}
.memory-name{

    position:relative;

    display:inline-block;

        font-family:

        'Marhey',

        'Cormorant Garamond',

        serif;


    color:#FFD700;

    font-size:3.8rem;

    font-weight:300;

    letter-spacing:3px;

    margin-bottom:40px;

    text-shadow:
        0 0 10px rgba(255,215,0,.7),
        0 0 30px rgba(255,215,0,.5),
        0 0 70px rgba(255,215,0,.25);

    animation:
        nameGlow 4s ease-in-out infinite,
        fadeDown 1s ease;

}
.memory-name::after{

    content:'';

    position:absolute;

    left:50%;

    bottom:-15px;

    width:80px;

    height:1px;

    transform:translateX(-50%);

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,215,0,.8),
            transparent
        );

    box-shadow:
        0 0 10px gold;

}
.memory-photo-box{

    position:relative;

    width:300px;

    margin:auto;

}
.memory-photo{

    width:260px;

    height:260px;

    object-fit:cover;

    border-radius:999px;

    border:

        4px solid rgba(250,204,21,.3);

    animation:

        photoGlow 1.2s ease,

        photoFloat 8s ease-in-out infinite;

}
.memory-photo-halo{

    position:absolute;

    inset:-90px;

    border-radius:999px;

    background:

        radial-gradient(

            circle,

            rgba(250,204,21,.15),

            transparent 70%

        );
        filter:blur(30px);

}

.halo-1{

    animation:

        haloPulse 4s infinite;

}

.halo-2{

    opacity:.5;

    animation:

        haloPulse 6s infinite;

}

.halo-3{

    opacity:.3;

    animation:

        haloPulse 8s infinite;

}

.memory-message{

    background:

        rgba(255,255,255,.03);

    border:

        1px solid rgba(250,204,21,.08);

    backdrop-filter:

        blur(20px);

    border-radius:40px;

    padding:

        30px 50px;

}



.quote{

    color:#FFD700;

    font-size:2.8rem;

}



.message-text{

       font-family:

        'Manrope',

        'Cairo',

        sans-serif;

    font-size:2rem;

    line-height:2;

    font-weight:300;

    color:white;

    text-shadow:

        0 0 20px rgba(255,255,255,.1);

        sans-serif;

    display:inline-block;

    overflow:hidden;

    white-space:nowrap;

    border-right:

        2px solid gold;

    animation:

        typing 3s steps(40,end),

        blinkCursor .8s infinite;

}



.memory-love{

    margin-top:35px;

    font-size:30px;

}



.memory-count{

    font-size:5rem;

    color:#FFD700;

    text-shadow:

        0 0 20px gold;

}



.memory-text{

    font-size:2rem;

    color:white;

}



.memory-final{

    margin-top:35px;

    color:#94a3b8;

    letter-spacing:3px;

    opacity:.7;

}



.ending-star{

    color:#FFD700;

    font-size:70px;

    margin-bottom:30px;

    text-shadow:

        0 0 25px gold,

        0 0 60px gold;

    animation:

        endingStarFloat 8s ease infinite,

        endingStarGlow 3s ease infinite;

}



@media(max-width:768px){

    .memory-name{

        font-size:2.3rem;

    }

    .memory-photo{

        width:220px;

        height:220px;

    }

    .memory-message{

        font-size:1.5rem;

    }

}

.music-toggle{

    position:fixed;

    bottom:30px;

    left:30px;

    width:55px;

    height:55px;

    border-radius:50%;

    background:rgba(255,255,255,.05);

    border:1px solid rgba(250,204,21,.2);

    backdrop-filter:blur(20px);

    display:flex;

    align-items:center;

    justify-content:center;

    cursor:pointer;

    z-index:999999;

}
</style>

<style>

@keyframes memoryAppear{
    from{
        opacity:0;
        transform:scale(.7) translateY(80px);
    }
    to{
        opacity:1;
        transform:none;
    }
}

@keyframes twinkle{
    0%,100%{
        opacity:.4;
    }

    50%{
        opacity:1;
    }
}

@keyframes starFloat{
    0%,100%{
        transform:translateY(0);
    }

    50%{
        transform:translateY(-10px);
    }
}

@keyframes photoFloat{
    0%,100%{
        transform:translateY(0);
    }

    50%{
        transform:translateY(-12px);
    }
}

@keyframes haloPulse{
    0%,100%{
        transform:scale(1);
        opacity:.4;
    }

    50%{
        transform:scale(1.15);
        opacity:1;
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

@keyframes titleStarFloat{
    0%,100%{
        transform:
            translateX(-50%)
            translateY(0);
    }

    50%{
        transform:
            translateX(-50%)
            translateY(-12px);
    }
}

@keyframes titleStarGlow{
    0%,100%{
        text-shadow:
            0 0 10px gold,
            0 0 20px gold;
    }

    50%{
        text-shadow:
            0 0 30px gold,
            0 0 60px gold,
            0 0 100px gold;
    }
}

@keyframes fadeDown{
    from{
        opacity:0;
        transform:translateY(-40px);
    }

    to{
        opacity:1;
        transform:none;
    }
}

@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(40px);
    }

    to{
        opacity:1;
        transform:none;
    }
}

@keyframes photoGlow{
    from{
        transform:scale(.8);
        filter:brightness(.5);
    }

    to{
        transform:scale(1);
    }
}

@keyframes overlayFade{
    from{
        opacity:0;
    }

    to{
        opacity:1;
    }
}

@keyframes flashLight{
    0%{
        box-shadow:
            inset 0 0 300px rgba(255,215,0,.2);
    }

    100%{
        box-shadow:none;
    }
}

@keyframes activeStarPulse{
    0%,100%{
        scale:1;
    }

    50%{
        scale:1.4;
    }
}

@keyframes shootingTail{
    0%,100%{
        width:40px;
        opacity:.2;
    }

    50%{
        width:90px;
        opacity:.8;
    }
}

@keyframes endingStarFloat{
    0%,100%{
        transform:translateY(0);
    }

    50%{
        transform:translateY(-15px);
    }
}

@keyframes endingStarGlow{
    0%,100%{
        filter:drop-shadow(0 0 10px gold);
    }

    50%{
        filter:
            drop-shadow(0 0 40px gold)
            drop-shadow(0 0 80px gold);
    }
}

@keyframes finaleGlow{
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

@keyframes typing{
    from{
        width:0;
    }

    to{
        width:100%;
    }
}

@keyframes blinkCursor{
    50%{
        border-color:transparent;
    }
}
@keyframes starGlow{

    0%,100%{

        transform:scale(1);

        opacity:.8;

    }

    50%{

        transform:scale(1.15);

        opacity:1;

    }

}


@keyframes starPulse{

    0%{

        transform:scale(1);

        opacity:.6;

    }

    100%{

        transform:scale(2);

        opacity:0;

    }

}
@keyframes nameGlow{

    0%,100%{

        text-shadow:
            0 0 10px rgba(255,215,0,.7),
            0 0 30px rgba(255,215,0,.5),
            0 0 70px rgba(255,215,0,.25);

    }

    50%{

        text-shadow:
            0 0 20px gold,
            0 0 50px gold,
            0 0 100px rgba(255,215,0,.6);

    }

}
</style>

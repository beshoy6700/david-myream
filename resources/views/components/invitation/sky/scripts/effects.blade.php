<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>
<script>

let currentFlyingStar = null;
let currentAnimatedStar = null;
let isAnimating = false;

window.addEventListener(

    'star-selected',

    event => {

        if(isAnimating){
            return;
        }

        let id =
            event.detail.id;

        let star =
            document.querySelector(
                `[data-star-id="${id}"]`
            );

        if(!star){
            return;
        }

        isAnimating = true;

        currentAnimatedStar =
            star;

        let rect =
            star.getBoundingClientRect();

        // إخفاء النجمة الأصلية
        star.style.opacity = 0;

        // إيقاف المدارات
        document
            .querySelectorAll('.orbit-layer')
            .forEach(

                orbit => {

                    orbit.style.animationPlayState =
                        'paused';

                }

            );

        // إنشاء نسخة متحركة
        let clone =
            star.cloneNode(true);

        clone.classList.remove(
            'active-star'
        );

        clone.classList.add(
            'flying-star'
        );

        clone.style.position =
            'fixed';

        clone.style.left =
            rect.left + 'px';

        clone.style.top =
            rect.top + 'px';

        clone.style.zIndex =
            999999;

        clone.style.pointerEvents =
            'none';

        document.body.appendChild(
            clone
        );

        currentFlyingStar =
            clone;

        gsap.to(

            clone,

            {

                duration:1.6,

                left:
                    window.innerWidth/2 - 15,

                top:
                    window.innerHeight/2 - 320,

                scale:2,

                ease:"power2.out"

            }

        );

    }

);



window.addEventListener(

    'message-hidden',

    () => {

        if(
            !currentFlyingStar ||
            !currentAnimatedStar
        ){

            return;
        }

        currentFlyingStar.classList.remove(
            'flying-star'
        );

        currentFlyingStar.classList.add(
            'returning-star'
        );

        let rect =
            currentAnimatedStar.getBoundingClientRect();

        gsap.timeline({

            onComplete(){

                currentAnimatedStar.classList.add(
                    'opened-star'
                );

                currentAnimatedStar.style.opacity =
                    '';

                currentFlyingStar.remove();

                currentFlyingStar =
                    null;

                currentAnimatedStar =
                    null;

                isAnimating =
                    false;

                document
                    .querySelectorAll('.orbit-layer')
                    .forEach(

                        orbit => {

                            orbit.style.animationPlayState =
                                'running';

                        }

                    );

            }

        })

        .to(

            currentFlyingStar,

            {

                duration:2.2,

                left:
                    rect.left,

                top:
                    rect.top,

                scale:1,

                opacity:.4,

                ease:"power1.inOut"

            }

        );

    }

);



window.addEventListener(

    'sky-finished',

    () => {

        let stars =
            document.querySelectorAll(
                '.opened-star'
            );

        stars.forEach(

            (star,index)=>{

                setTimeout(

                    ()=>{

                        star.classList.add(
                            'memory-finale'
                        );

                    },

                    index * 500

                );

            }

        );

    }

);

</script>
<script>

let music =
    document.getElementById(
        'skyMusic'
    );

document
    .querySelector(
        '.music-toggle'
    )
    .addEventListener(

        'click',

        ()=>{

            if(music.paused){

                music.volume=.15;

                music.play();

            }
            else{

                music.pause();

            }

        }

    );

</script>
<script>

window.addEventListener(

    'click',

    () => {

        let music =
            document.getElementById(
                'skyMusic'
            );

        music.volume = .15;

        music.play();

    },

    {

        once:true

    }

);
</script>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
<meta charset="UTF-8">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    width:1200px;
    height:630px;

    background:#020617;

    font-family:"Cairo",sans-serif;

    display:flex;
    justify-content:center;
    align-items:center;

    color:#fff;

    overflow:hidden;
}

.card{

    width:1120px;
    height:560px;

    overflow:hidden;

    border-radius:38px;

    background:linear-gradient(
        135deg,
        #101827,
        #0F172A
    );

    border:1px solid rgba(212,175,55,.20);

    position:relative;

    box-shadow:
    0 20px 60px rgba(0,0,0,.45);

}

.glow{

    position:absolute;

    width:520px;
    height:520px;

    background:rgba(212,175,55,.08);

    filter:blur(130px);

    left:-180px;
    top:-180px;
}

.banner{

    position:relative;

    width:100%;

    height:210px;

    overflow:hidden;
}

.banner img{

    width:100%;

    height:100%;

    object-fit:cover;

    object-position:center center;

    transform:scale(1.03);
}

.overlay{

    position:absolute;

    inset:0;

    background:

    linear-gradient(

        to bottom,

        rgba(0,0,0,.10),

        rgba(15,23,42,.92)

    );

}

.content{

    position:relative;

    width:720px;

    margin:-55px auto 0;

    padding:40px;

    border-radius:28px;

    background:

    rgba(15,23,42,.65);

    backdrop-filter:blur(16px);

    border:1px solid rgba(255,255,255,.08);

    text-align:center;

    box-shadow:

    0 20px 50px rgba(0,0,0,.35);
}

.title{

    font-size:54px;

    font-weight:800;

    color:#D4AF37;

    margin-bottom:18px;

    letter-spacing:1px;
}

.subtitle{

    color:#CBD5E1;

    font-size:22px;

    margin-bottom:18px;
}

.name{

    font-size:60px;

    font-weight:900;

    color:white;

    margin-bottom:26px;

    text-shadow:

    0 10px 30px rgba(255,255,255,.10);
}

.message{

    font-size:30px;

    font-weight:700;

    color:#F8FAFC;

    margin-bottom:10px;
}

.message2{

    font-size:23px;

    color:#D4AF37;

    margin-bottom:35px;
}

.cta{

    display:inline-flex;

    align-items:center;
    justify-content:center;

    padding:15px 42px;

    border-radius:999px;

    background:rgba(212,175,55,.12);

    border:1px solid rgba(212,175,55,.35);

    color:#F5D76E;

    font-size:22px;

    font-weight:700;

    backdrop-filter:blur(10px);

    margin-bottom:18px;
}

.footer{

    color:#94A3B8;

    font-size:18px;

    letter-spacing:1px;
}

</style>

</head>

<body>

<div class="card">

<div class="glow"></div>

<div class="banner">

<img
src="{{ asset('images/og-cover-banner.jpg') }}"
alt="David & Myream Wedding Invitation Banner">

<div class="overlay"></div>

</div>

<div class="content">

<div class="title">
David ✦ Myream
</div>

<div class="subtitle">
✨ خصيصًا إلى
</div>

<div class="name">
{{ $guest->formal_name }}
</div>

<div class="message">
💌 تم إعداد تجربة خاصة لك
</div>

<div class="message2">
كل تفاصيل دعوتك بانتظارك داخل الموقع
</div>

<div class="cta">
✨ افتح دعوتك الشخصية
</div>

<div class="footer">
اضغط على الرابط أسفل الرسالة
</div>

</div>

</div>

</body>

</html>

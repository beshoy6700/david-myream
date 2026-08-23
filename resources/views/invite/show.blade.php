<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>
        ديفيد & ميريام
    </title>

    <meta name="description" content="يشرفنا حضوركم ومشاركتكم فرحتنا 🤍">

    {{-- Open Graph --}}

    <meta property="og:type" content="website">

    <meta property="og:title" content="💍 دعوة فرح ديفيد & ميريام">

    <meta property="og:description" content="يشرفنا حضوركم ومشاركتكم أجمل لحظات حياتنا 🤍">

    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="/images/og-cover-banner.jpg">

    <meta property="og:image:width" content="1200">

    <meta property="og:image:height" content="630">


    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title" content="💍 دعوة فرح ديفيد & ميريام">

    <meta name="twitter:description" content="يشرفنا حضوركم ومشاركتكم فرحتنا 🤍">

    <meta name="twitter:image" content="{{ asset('images/og-cover-banner.jpg') }}">

    @vite(['resources/css/app.css', 'resources/css/invitation.css', 'resources/js/app.js'])

    @livewireStyles

</head>
<script>
    function copyInvitationLink() {
        navigator.clipboard.writeText(

            document
            .getElementById(
                'invitationLink'
            )
            .innerText

        );

        alert('✨ تم نسخ رابط دعوتك');
    }
</script>
<script>
    function openCalendar() {

        const ua = navigator.userAgent.toLowerCase();

        let device = 'desktop';

        if (ua.includes('android')) {

            device = 'android';

        } else if (
            ua.includes('iphone') ||
            ua.includes('ipad') ||
            ua.includes('macintosh')
        ) {

            device = 'apple';

        }

        window.location =
            "{{ route('calendar') }}" + "?device=" + device;

    }
</script>

<body>
    @livewire('invite-page', [
        'token' => $token,
    ])

    @livewireScripts
</body>

</html>

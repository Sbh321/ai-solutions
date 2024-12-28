<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'AI-Solutions') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon_io/favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.ts', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
    <script type="text/javascript">
        (function(d, t) {
            var v = d.createElement(t),
                s = d.getElementsByTagName(t)[0];
            v.onload = function() {
                window.voiceflow.chat.load({
                    verify: {
                        projectID: '676f747bcbabbcd8e3fc18b6'
                    },
                    url: 'https://general-runtime.voiceflow.com',
                    versionID: 'development'
                });
            }
            v.src = "https://cdn.voiceflow.com/widget/bundle.mjs";
            v.type = "text/javascript";
            s.parentNode.insertBefore(v, s);
        })(document, 'script');
    </script>
</body>

</html>

<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Support Voice Australia — advocating, connecting, and empowering our community.">

    <title>@yield('title', 'About us') — Support Voice Australia</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-dvh bg-sva-lavender font-sans text-sva-body antialiased">
    @include('partials.support-voice-navbar')

    <main class="pt-[calc(5.5rem+1px)] md:pt-[calc(7rem+1px)] lg:pt-[calc(7.5rem+1px)]">
        @yield('content')
    </main>

    @include('partials.support-voice-footer')
</body>
</html>

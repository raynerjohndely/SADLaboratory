<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-800 antialiased">
        <div class="relative flex min-h-screen items-center justify-center overflow-hidden bg-slate-100 px-4 py-10">
            <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(59,130,246,0.2),transparent_36%),radial-gradient(circle_at_bottom_left,rgba(99,102,241,0.22),transparent_34%)]"></div>

            <div class="relative w-full max-w-5xl overflow-hidden rounded-3xl border border-white/70 bg-white/90 shadow-2xl backdrop-blur">
                <div class="grid md:grid-cols-2">
                    <div class="hidden bg-gradient-to-br from-indigo-600 via-blue-600 to-cyan-500 p-10 text-white md:flex md:flex-col md:justify-between">
                        <div>
                            <a href="/" class="inline-flex items-center gap-3">
                                <x-application-logo class="h-11 w-11 fill-current text-white" />
                                <span class="text-lg font-semibold tracking-wide">{{ config('app.name', 'SADLAB') }}</span>
                            </a>
                        </div>

                        <div class="space-y-4">
                            <p class="text-xs uppercase tracking-[0.2em] text-blue-100/90">Welcome</p>
                            <h2 class="text-3xl font-bold leading-tight">Manage your dashboard with a clean and modern interface.</h2>
                            <p class="text-sm text-blue-100/90">Secure sign in and quick onboarding inspired by VALEX-style auth screens.</p>
                        </div>

                        <div class="text-xs text-blue-100/90">{{ now()->format('Y') }} · {{ config('app.name', 'SADLAB') }}</div>
                    </div>

                    <div class="px-6 py-8 sm:px-10 sm:py-10">
                        <div class="mb-6 flex justify-center md:hidden">
                            <a href="/">
                                <x-application-logo class="h-14 w-14 fill-current text-indigo-600" />
                            </a>
                        </div>

                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

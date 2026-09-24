<!doctype html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Tailwind Labs Dashboard')</title>

    {{-- CSS و JavaScript محلی که Vite build می‌کند --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-zinc-950 text-zinc-100 antialiased">

{{-- Mobile sidebar overlay --}}
<div
    id="overlay"
    class="fixed inset-0 z-40 hidden bg-black/70 lg:hidden"
    onclick="closeSidebar()"
></div>

{{-- Mobile sidebar --}}
<aside
    id="mobileSidebar"
    class="fixed inset-y-0 left-0 z-50 hidden w-72 border-r border-white/10 bg-zinc-950 lg:hidden"
>
    <div class="flex h-full flex-col">

        <div class="flex h-16 items-center justify-between border-b border-white/10 px-4">
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-sm font-semibold">
                    <span class="grid h-7 w-7 place-items-center rounded-full bg-white text-zinc-900">
                        ✦
                    </span>

                <span>Tailwind Labs</span>
            </a>

            <button
                type="button"
                onclick="closeSidebar()"
                class="rounded-lg p-2 text-zinc-400 hover:bg-white/10 hover:text-white"
                aria-label="Close menu"
            >
                ✕
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto px-3 py-4">
            <div class="space-y-1">

                <a
                    href="{{ route('home') }}"
                    @class([
                        'flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition',
                        'bg-white/10 font-medium text-white' => request()->routeIs('home'),
                        'text-zinc-400 hover:bg-white/5 hover:text-white' => !request()->routeIs('home'),
                    ])
                >
                    <span>⌂</span>
                    <span>Home</span>
                </a>

                <a
                    href="{{ route('about') }}"
                    @class([
                        'flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition',
                        'bg-white/10 font-medium text-white' => request()->routeIs('about'),
                        'text-zinc-400 hover:bg-white/5 hover:text-white' => !request()->routeIs('about'),
                    ])
                >
                    <span>▣</span>
                    <span>About</span>
                </a>

                <a
                    href="{{ route('welcome') }}"
                    @class([
                        'flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition',
                        'bg-white/10 font-medium text-white' => request()->routeIs('welcome'),
                        'text-zinc-400 hover:bg-white/5 hover:text-white' => !request()->routeIs('welcome'),
                    ])
                >
                    <span>▤</span>
                    <span>Welcome</span>
                </a>

            </div>
        </nav>
    </div>
</aside>

{{-- Desktop top navigation --}}
<header class="sticky top-0 z-30 border-b border-white/10 bg-zinc-950/95 backdrop-blur">
    <div class="mx-auto flex h-16 max-w-[1440px] items-center px-4 sm:px-6 lg:px-8">

        <button
            type="button"
            onclick="openSidebar()"
            class="mr-3 rounded-lg p-2 text-zinc-400 hover:bg-white/10 hover:text-white lg:hidden"
            aria-label="Open menu"
        >
            ☰
        </button>

        <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2 text-sm font-semibold text-zinc-100">
                <span class="grid h-7 w-7 place-items-center rounded-full bg-white text-zinc-900">
                    ✦
                </span>

            <span>Tailwind Labs</span>
            <span class="ml-1 text-zinc-500">⌄</span>
        </a>

        <div class="mx-5 hidden h-6 w-px bg-white/10 lg:block"></div>

        <nav class="hidden h-full items-center gap-7 lg:flex">

            <a
                href="{{ route('home') }}"
                @class([
                    'relative flex h-full items-center text-sm font-medium transition',
                    'text-white' => request()->routeIs('home'),
                    'text-zinc-400 hover:text-white' => !request()->routeIs('home'),
                ])
            >
                Home

                @if (request()->routeIs('home'))
                    <span class="absolute inset-x-0 bottom-0 h-0.5 bg-white"></span>
                @endif
            </a>

            <a
                href="{{ route('about') }}"
                @class([
                    'relative flex h-full items-center text-sm font-medium transition',
                    'text-white' => request()->routeIs('about'),
                    'text-zinc-400 hover:text-white' => !request()->routeIs('about'),
                ])
            >
                About

                @if (request()->routeIs('about'))
                    <span class="absolute inset-x-0 bottom-0 h-0.5 bg-white"></span>
                @endif
            </a>

            <a
                href="{{ route('welcome') }}"
                @class([
                    'relative flex h-full items-center text-sm font-medium transition',
                    'text-white' => request()->routeIs('welcome'),
                    'text-zinc-400 hover:text-white' => !request()->routeIs('welcome'),
                ])
            >
                Welcome

                @if (request()->routeIs('welcome'))
                    <span class="absolute inset-x-0 bottom-0 h-0.5 bg-white"></span>
                @endif
            </a>

        </nav>

        <div class="ml-auto flex items-center gap-3">
            <button
                type="button"
                class="rounded-lg p-2 text-zinc-400 hover:bg-white/10 hover:text-white"
                aria-label="Search"
            >
                ⌕
            </button>

            <button
                type="button"
                class="rounded-lg p-2 text-zinc-400 hover:bg-white/10 hover:text-white"
                aria-label="Inbox"
            >
                ▰
            </button>

            <button
                type="button"
                class="h-8 w-8 overflow-hidden rounded-full ring-1 ring-white/20"
                aria-label="Profile"
            >
                <img
                    src="{{ asset('images/profile.jpg') }}"
                    alt="Profile"
                    class="h-full w-full object-cover"
                >
            </button>
        </div>
    </div>
</header>

{{-- محتوای هر صفحه --}}
<main class="mx-auto max-w-[1440px] px-2 py-2 sm:px-4 lg:px-6">
    <section class="min-h-[calc(100vh-5.25rem)] rounded-xl border border-white/10 bg-[#1c1c1f]">
        @yield('content')
    </section>
</main>

</body>
</html>

<!doctype html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Tailwind Labs Dashboard')</title>

    {{-- فایل‌های محلی CSS و JavaScript که Vite build می‌کند --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-zinc-950 text-zinc-100 antialiased">

{{-- ================================================================
    Mobile menu overlay
================================================================= --}}
<div
    id="overlay"
    class="fixed inset-0 z-40 hidden bg-black/70 backdrop-blur-[2px] lg:hidden"
    onclick="closeSidebar()"
></div>

{{-- ================================================================
    Mobile sidebar
================================================================= --}}
<aside
    id="mobileSidebar"
    class="fixed inset-y-0 left-0 z-50 hidden w-72 border-r border-white/10 bg-zinc-950 shadow-2xl shadow-black/50 lg:hidden"
>
    <div class="flex h-full flex-col">

        {{-- Mobile sidebar header --}}
        <div class="flex h-16 items-center justify-between border-b border-white/10 px-4">
            <a
                href="{{ route('home') }}"
                class="flex items-center gap-2 text-sm font-semibold text-white"
            >
                    <span class="grid h-7 w-7 place-items-center rounded-full bg-white text-zinc-900">
                        ✦
                    </span>

                <span>Tailwind Labs</span>
            </a>

            <button
                type="button"
                onclick="closeSidebar()"
                class="rounded-lg p-2 text-zinc-400 transition hover:bg-white/10 hover:text-white"
                aria-label="Close menu"
            >
                ✕
            </button>
        </div>

        {{-- Mobile navigation --}}
        <nav class="flex-1 overflow-y-auto px-3 py-4">
            <div class="space-y-1">

                {{-- Home --}}
                <a
                    href="{{ route('home') }}"
                    @class([
                        'flex items-center gap-3 rounded-lg border px-3 py-2 text-sm transition-all duration-150',
                        'border-white/10 bg-zinc-800/90 font-medium text-white shadow-md shadow-black/20 ring-1 ring-inset ring-white/5'
                            => request()->routeIs('home'),
                        'border-transparent text-zinc-400 hover:bg-zinc-900 hover:text-white'
                            => !request()->routeIs('home'),
                    ])
                >
                    <span class="w-5 text-center">⌂</span>
                    <span>Home</span>
                </a>

                {{-- About --}}
                <a
                    href="{{ route('about') }}"
                    @class([
                        'flex items-center gap-3 rounded-lg border px-3 py-2 text-sm transition-all duration-150',
                        'border-white/10 bg-zinc-800/90 font-medium text-white shadow-md shadow-black/20 ring-1 ring-inset ring-white/5'
                            => request()->routeIs('about'),
                        'border-transparent text-zinc-400 hover:bg-zinc-900 hover:text-white'
                            => !request()->routeIs('about'),
                    ])
                >
                    <span class="w-5 text-center">▣</span>
                    <span>About</span>
                </a>

                {{-- Jobs --}}
                <a
                    href="{{ route('jobs') }}"
                    @class([
                        'flex items-center gap-3 rounded-lg border px-3 py-2 text-sm transition-all duration-150',
                        'border-white/10 bg-zinc-800/90 font-medium text-white shadow-md shadow-black/20 ring-1 ring-inset ring-white/5'
                            => request()->routeIs('jobs'),
                        'border-transparent text-zinc-400 hover:bg-zinc-900 hover:text-white'
                            => !request()->routeIs('jobs'),
                    ])
                >
                    <span class="w-5 text-center">▤</span>
                    <span>Jobs</span>
                </a>

                {{-- Welcome --}}
                <a
                    href="{{ route('welcome') }}"
                    @class([
                        'flex items-center gap-3 rounded-lg border px-3 py-2 text-sm transition-all duration-150',
                        'border-white/10 bg-zinc-800/90 font-medium text-white shadow-md shadow-black/20 ring-1 ring-inset ring-white/5'
                            => request()->routeIs('welcome'),
                        'border-transparent text-zinc-400 hover:bg-zinc-900 hover:text-white'
                            => !request()->routeIs('welcome'),
                    ])
                >
                    <span class="w-5 text-center">▤</span>
                    <span>Welcome</span>
                </a>

            </div>
        </nav>

        {{-- Mobile sidebar footer --}}
        <div class="border-t border-white/10 p-4">
            <div class="rounded-lg border border-white/5 bg-white/[0.03] px-3 py-2">
                <p class="text-xs text-zinc-500">
                    © {{ date('Y') }} Tailwind Labs
                </p>
            </div>
        </div>
    </div>
</aside>

{{-- ================================================================
    Desktop top navigation
================================================================= --}}
<header class="sticky top-0 z-30 border-b border-white/10 bg-zinc-950/95 backdrop-blur">
    <div class="mx-auto flex h-16 max-w-[1440px] items-center px-4 sm:px-6 lg:px-8">

        {{-- Mobile menu button --}}
        <button
            type="button"
            onclick="openSidebar()"
            class="mr-3 rounded-lg p-2 text-zinc-400 transition hover:bg-white/10 hover:text-white lg:hidden"
            aria-label="Open menu"
        >
            ☰
        </button>

        {{-- Brand --}}
        <a
            href="{{ route('home') }}"
            class="flex shrink-0 items-center gap-2 text-sm font-semibold text-zinc-100"
        >
                <span class="grid h-7 w-7 place-items-center rounded-full bg-white text-zinc-900">
                    ✦
                </span>

            <span>Tailwind Labs</span>
            <span class="ml-1 text-zinc-500">⌄</span>
        </a>

        {{-- Desktop separator --}}
        <div class="mx-5 hidden h-6 w-px bg-white/10 lg:block"></div>

        {{-- Desktop navigation --}}
        <nav class="hidden h-full items-center gap-2 lg:flex">

            {{-- Home --}}
            <a
                href="{{ route('home') }}"
                @class([
                    'relative flex h-9 items-center rounded-lg px-3 text-sm font-medium transition-all duration-150',
                    'bg-zinc-800/80 text-white shadow-sm ring-1 ring-inset ring-white/10'
                        => request()->routeIs('home'),
                    'text-zinc-400 hover:bg-zinc-900 hover:text-white'
                        => !request()->routeIs('home'),
                ])
            >
                Home

                @if (request()->routeIs('home'))
                    <span class="absolute inset-x-2 -bottom-[13px] h-0.5 rounded-full bg-zinc-200"></span>
                @endif
            </a>

            {{-- About --}}
            <a
                href="{{ route('about') }}/"
                @class([
                    'relative flex h-9 items-center rounded-lg px-3 text-sm font-medium transition-all duration-150',
                    'bg-zinc-800/80 text-white shadow-sm ring-1 ring-inset ring-white/10'
                        => request()->routeIs('about'),
                    'text-zinc-400 hover:bg-zinc-900 hover:text-white'
                        => !request()->routeIs('about'),
                ])
            >
                About

                @if (request()->routeIs('about'))
                    <span class="absolute inset-x-2 -bottom-[13px] h-0.5 rounded-full bg-zinc-200"></span>
                @endif
            </a>

            {{-- Jobs --}}
            <a
                href="{{ route('jobs') }}/"
                @class([
                    'relative flex h-9 items-center rounded-lg px-3 text-sm font-medium transition-all duration-150',
                    'bg-zinc-800/80 text-white shadow-sm ring-1 ring-inset ring-white/10'
                        => request()->routeIs('jobs'),
                    'text-zinc-400 hover:bg-zinc-900 hover:text-white'
                        => !request()->routeIs('jobs'),
                ])
            >
                Jobs

                @if (request()->routeIs('jobs'))
                    <span class="absolute inset-x-2 -bottom-[13px] h-0.5 rounded-full bg-zinc-200"></span>
                @endif
            </a>

            {{-- Employers --}}
            <a
                href="{{ route('employers') }}/"
                @class([
                    'relative flex h-9 items-center rounded-lg px-3 text-sm font-medium transition-all duration-150',
                    'bg-zinc-800/80 text-white shadow-sm ring-1 ring-inset ring-white/10'
                        => request()->routeIs('employers'),
                    'text-zinc-400 hover:bg-zinc-900 hover:text-white'
                        => !request()->routeIs('employers'),
                ])
            >
                Employers

                @if (request()->routeIs('employers'))
                    <span class="absolute inset-x-2 -bottom-[13px] h-0.5 rounded-full bg-zinc-200"></span>
                @endif
            </a>

            {{-- Welcome --}}
            <a
                href="{{ route('welcome') }}"
                @class([
                    'relative flex h-9 items-center rounded-lg px-3 text-sm font-medium transition-all duration-150',
                    'bg-zinc-800/80 text-white shadow-sm ring-1 ring-inset ring-white/10'
                        => request()->routeIs('welcome'),
                    'text-zinc-400 hover:bg-zinc-900 hover:text-white'
                        => !request()->routeIs('welcome'),
                ])
            >
                Welcome

                @if (request()->routeIs('welcome'))
                    <span class="absolute inset-x-2 -bottom-[13px] h-0.5 rounded-full bg-zinc-200"></span>
                @endif
            </a>

        </nav>

        {{-- Header actions --}}
        <div class="ml-auto flex items-center gap-2 sm:gap-3">

            <button
                type="button"
                class="rounded-lg p-2 text-zinc-400 transition hover:bg-white/10 hover:text-white"
                aria-label="Search"
            >
                ⌕
            </button>

            <button
                type="button"
                class="rounded-lg p-2 text-zinc-400 transition hover:bg-white/10 hover:text-white"
                aria-label="Inbox"
            >
                ▰
            </button>

            <button
                type="button"
                class="h-8 w-8 overflow-hidden rounded-full bg-zinc-800 ring-1 ring-white/20"
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

{{-- ================================================================
    Main page content
================================================================= --}}
<main class="mx-auto max-w-[1440px] px-2 py-2 sm:px-4 lg:px-6">
    <section class="min-h-[calc(100vh-5.25rem)] rounded-xl border border-white/10 bg-[#1c1c1f]">
        @yield('content')
    </section>
</main>

</body>
</html>

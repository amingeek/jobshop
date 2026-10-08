@php
    $navItems = [
        ['label' => 'Home', 'route' => 'home', 'patterns' => ['home'], 'icon' => '⌂'],
        ['label' => 'Jobs', 'route' => 'jobs', 'patterns' => ['jobs', 'jobs.show', 'jobs.edit'], 'icon' => '▤'],
        ['label' => 'Tags', 'route' => 'tags', 'patterns' => ['tags'], 'icon' => '⌗'],
        ['label' => 'Employers', 'route' => 'employers', 'patterns' => ['employers'], 'icon' => '⚑'],
        ['label' => 'About', 'route' => 'about', 'patterns' => ['about'], 'icon' => '▣'],
        ['label' => 'Welcome', 'route' => 'welcome', 'patterns' => ['welcome'], 'icon' => '◇'],
    ];

    $ctaItems = [
        ['label' => 'Log in', 'route' => 'login', 'patterns' => ['login'], 'icon' => '→'],
        ['label' => 'Register', 'route' => 'register', 'patterns' => ['register'], 'icon' => '✦'],
    ];

    $isActive = fn (array $item): bool => request()->routeIs(...$item['patterns']);
@endphp
    <!doctype html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="dark">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Tailwind Labs')</title>

    {{-- Local CSS and JavaScript bundled by Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="app-shell">

{{-- ================================================================
    Mobile menu overlay
================================================================= --}}
<div
    id="overlay"
    class="fixed inset-0 z-40 hidden bg-black/60 backdrop-blur-[2px] transition-opacity duration-200 lg:hidden"
    onclick="closeSidebar()"
></div>

{{-- ================================================================
    Mobile sidebar
================================================================= --}}
<aside
    id="mobileSidebar"
    class="fixed inset-y-0 left-0 z-50 hidden w-72 max-w-[85vw] border-r border-white/10 bg-zinc-950/95 shadow-2xl shadow-black/60 backdrop-blur-xl lg:hidden"
    aria-label="Mobile navigation"
>
    <div class="flex h-full flex-col">

        {{-- Mobile sidebar header --}}
        <div class="flex h-16 shrink-0 items-center justify-between border-b border-white/10 px-4">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 text-sm font-semibold text-white">
                <span class="brand-mark">✦</span>
                <span>Tailwind Labs</span>
            </a>

            <button
                type="button"
                onclick="closeSidebar()"
                class="icon-button"
                aria-label="Close menu"
            >
                ✕
            </button>
        </div>

        {{-- Mobile navigation --}}
        <nav class="flex-1 overflow-y-auto px-3 py-4">
            <p class="px-3 pb-2 text-[11px] font-semibold uppercase tracking-widest text-zinc-500">
                Menu
            </p>

            <div class="space-y-1">
                @foreach ($navItems as $item)
                    <x-nav-link-mobile
                        :href="route($item['route'])"
                        :active="$isActive($item)"
                        :icon="$item['icon']"
                    >
                        {{ $item['label'] }}
                    </x-nav-link-mobile>
                @endforeach
            </div>

            <p class="px-3 pt-6 pb-2 text-[11px] font-semibold uppercase tracking-widest text-zinc-500">
                Actions
            </p>

            <div class="space-y-1">
                @foreach ($ctaItems as $item)
                    <x-nav-link-mobile
                        :href="route($item['route'])"
                        :active="$isActive($item)"
                        :icon="$item['icon']"
                    >
                        {{ $item['label'] }}
                    </x-nav-link-mobile>
                @endforeach
            </div>
        </nav>

        {{-- Mobile sidebar footer --}}
        <div class="border-t border-white/10 p-4">
            <p class="text-xs text-zinc-500">
                © {{ date('Y') }} Tailwind Labs
            </p>
        </div>
    </div>
</aside>

{{-- ================================================================
    Header
================================================================= --}}
<header class="app-header">
    <div class="app-container flex h-16 items-center gap-3">

        {{-- Mobile menu button --}}
        <button
            type="button"
            onclick="openSidebar()"
            class="icon-button shrink-0 lg:hidden"
            aria-label="Open menu"
        >
            ☰
        </button>

        {{-- Brand --}}
        <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2.5 text-sm font-semibold text-zinc-100">
            <span class="brand-mark">✦</span>
            <span class="hidden sm:inline">Tailwind Labs</span>
        </a>

        {{-- Desktop navigation --}}
        <nav class="ml-2 hidden h-full items-center gap-1 lg:flex">
            <div class="mx-3 h-6 w-px bg-white/10"></div>

            @foreach ($navItems as $item)
                <x-nav-link :href="route($item['route'])" :active="$isActive($item)">
                    {{ $item['label'] }}
                </x-nav-link>
            @endforeach
        </nav>

        {{-- Header actions --}}
        <div class="ml-auto flex items-center gap-1.5 sm:gap-2">
            <button type="button" class="icon-button hidden sm:inline-flex" aria-label="Search">
                ⌕
            </button>

            @guest

                <a
                    href="{{ route('login') }}"
                    class="btn btn-primary btn-sm hidden sm:inline-flex"
                >
                    Log in
                </a>

                <a
                    href="{{ route('register') }}"
                    class="btn btn-secondary btn-sm hidden md:inline-flex"
                >
                    Sign up
                </a>
            @endguest

            @auth

                <button
                    type="button"
                    class="ml-1 h-8 w-8 shrink-0 overflow-hidden rounded-full bg-gradient-to-br from-indigo-500 to-violet-600 ring-1 ring-white/20 transition hover:ring-indigo-400/60"
                    aria-label="Profile"
                >
                    <img
                        src="{{ asset('images/profile.jpg') }}"
                        alt="Profile"
                        class="h-full w-full object-cover"
                        onerror="this.style.display='none'"
                    >
                </button>
            @endauth

        </div>
    </div>
</header>

{{-- ================================================================
    Main page content
================================================================= --}}
<main class="app-container py-4 sm:py-6 lg:py-8">
    <section class="app-page">
        @yield('content')
    </section>
</main>

{{-- ================================================================
    Footer
================================================================= --}}
<footer class="app-container pb-8">
    <div class="flex flex-col gap-4 border-t border-white/10 pt-6 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex items-center gap-2.5">
            <span class="brand-mark h-6 w-6 text-xs">✦</span>
            <p class="text-xs text-zinc-500">
                © {{ date('Y') }} Tailwind Labs — built with Laravel &amp; Tailwind CSS.
            </p>
        </div>

        <nav class="flex flex-wrap items-center gap-x-5 gap-y-2 text-xs text-zinc-500">
            <a href="{{ route('jobs') }}" class="transition hover:text-zinc-200">Jobs</a>
            <a href="{{ route('employers') }}" class="transition hover:text-zinc-200">Employers</a>
            <a href="{{ route('tags') }}" class="transition hover:text-zinc-200">Tags</a>
            <a href="{{ route('about') }}" class="transition hover:text-zinc-200">About</a>
        </nav>
    </div>
</footer>

</body>
</html>

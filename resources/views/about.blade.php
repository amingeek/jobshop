@extends('layouts.app')

@section('title', 'About')

@section('content')
    <x-page
        title="About"
        subtitle="What this project is and how it is built."
        icon="▣"
        eyebrow="About"
        width="3xl"
    >
        <p class="mt-7 text-sm leading-7 text-zinc-400">
            این صفحه دربارهٔ پروژه است.
        </p>

        <div class="mt-8 grid gap-4 sm:grid-cols-3">
            <div class="card p-5">
                <span class="brand-mark h-9 w-9 text-sm" aria-hidden="true">⚡</span>

                <h2 class="mt-4 text-sm font-semibold text-zinc-100">Laravel</h2>

                <p class="mt-1.5 text-xs leading-6 text-zinc-500">
                    Controllers, models and Blade views power every page.
                </p>
            </div>

            <div class="card p-5">
                <span class="brand-mark h-9 w-9 text-sm" aria-hidden="true">◧</span>

                <h2 class="mt-4 text-sm font-semibold text-zinc-100">Tailwind CSS</h2>

                <p class="mt-1.5 text-xs leading-6 text-zinc-500">
                    A utility-first design system with a CSS-first theme.
                </p>
            </div>

            <div class="card p-5">
                <span class="brand-mark h-9 w-9 text-sm" aria-hidden="true">✦</span>

                <h2 class="mt-4 text-sm font-semibold text-zinc-100">Responsive</h2>

                <p class="mt-1.5 text-xs leading-6 text-zinc-500">
                    Built mobile-first, from phones up to wide desktop screens.
                </p>
            </div>
        </div>
    </x-page>
@endsection

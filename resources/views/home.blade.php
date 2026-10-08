@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="mx-auto w-full max-w-5xl px-5 py-14 text-center sm:px-8 sm:py-20">
        <span class="badge badge-accent mx-auto">
            ✦ Laravel + Tailwind CSS demo
        </span>

        <h1 class="mx-auto mt-6 max-w-3xl text-4xl font-semibold leading-tight tracking-tight text-white sm:text-5xl lg:text-6xl">
            Find the role that
            <span class="bg-gradient-to-r from-indigo-400 via-violet-400 to-indigo-300 bg-clip-text text-transparent">
                moves you forward
            </span>
        </h1>

        <p class="mx-auto mt-5 max-w-2xl text-sm leading-7 text-zinc-400 sm:text-base">
            Welcome to Tailwind Labs — a small demo job board built with Laravel and
            Tailwind CSS. Browse the latest offers, employers, and tags from the
            navigation above.
        </p>

        @isset($msg)
            <p class="mt-5 text-sm text-zinc-400">{{ $msg }}</p>
        @endisset

        <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('jobs') }}" class="btn btn-primary">
                Browse jobs
                <span aria-hidden="true">→</span>
            </a>

            <a href="{{ route('jobs.create') }}" class="btn btn-secondary">
                Post a job
            </a>
        </div>

        {{-- Quick links --}}
        <div class="mt-14 grid gap-4 text-left sm:grid-cols-3">
            <a href="{{ route('jobs') }}" class="card group p-5">
                <span class="brand-mark h-9 w-9 text-sm" aria-hidden="true">▤</span>

                <h2 class="mt-4 text-sm font-semibold text-zinc-100 transition group-hover:text-white">
                    Job offers
                </h2>

                <p class="mt-1.5 text-xs leading-6 text-zinc-500">
                    Fresh positions from partner companies, updated daily.
                </p>
            </a>

            <a href="{{ route('employers') }}" class="card group p-5">
                <span class="brand-mark h-9 w-9 text-sm" aria-hidden="true">⚑</span>

                <h2 class="mt-4 text-sm font-semibold text-zinc-100 transition group-hover:text-white">
                    Employers
                </h2>

                <p class="mt-1.5 text-xs leading-6 text-zinc-500">
                    Discover the teams behind each opening.
                </p>
            </a>

            <a href="{{ route('tags') }}" class="card group p-5">
                <span class="brand-mark h-9 w-9 text-sm" aria-hidden="true">⌗</span>

                <h2 class="mt-4 text-sm font-semibold text-zinc-100 transition group-hover:text-white">
                    Tags
                </h2>

                <p class="mt-1.5 text-xs leading-6 text-zinc-500">
                    Filter opportunities by skill and category.
                </p>
            </a>
        </div>
    </div>
@endsection

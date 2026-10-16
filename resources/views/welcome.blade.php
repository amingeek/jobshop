@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <x-page
        title="Welcome to Tailwind Labs"
        subtitle="Explore our job board demo built with Laravel and Tailwind CSS."
        icon="◇"
        eyebrow="Getting Started"
        width="4xl"
    >
        <div class="mt-7 grid gap-4 sm:grid-cols-2">
            <div class="card p-6">
                <span class="brand-mark h-9 w-9 text-sm" aria-hidden="true">▤</span>
                <h2 class="mt-4 text-sm font-semibold text-zinc-100">Browse Jobs</h2>
                <p class="mt-1.5 text-xs leading-6 text-zinc-500">
                    Discover open positions from partner companies, filter by tags, and find your next role.
                </p>
                <a href="{{ route('jobs') }}" class="mt-4 inline-flex items-center text-xs font-medium text-indigo-400 hover:text-indigo-300">
                    View job listings →
                </a>
            </div>

            <div class="card p-6">
                <span class="brand-mark h-9 w-9 text-sm" aria-hidden="true">✦</span>
                <h2 class="mt-4 text-sm font-semibold text-zinc-100">Post a Job</h2>
                <p class="mt-1.5 text-xs leading-6 text-zinc-500">
                    Create a new job listing with custom salary, requirements, tags, and employment type.
                </p>
                <a href="{{ route('jobs.create') }}" class="mt-4 inline-flex items-center text-xs font-medium text-indigo-400 hover:text-indigo-300">
                    Create listing →
                </a>
            </div>

            <div class="card p-6">
                <span class="brand-mark h-9 w-9 text-sm" aria-hidden="true">⚑</span>
                <h2 class="mt-4 text-sm font-semibold text-zinc-100">Employers</h2>
                <p class="mt-1.5 text-xs leading-6 text-zinc-500">
                    See all registered employers and their current open job opportunities.
                </p>
                <a href="{{ route('employers') }}" class="mt-4 inline-flex items-center text-xs font-medium text-indigo-400 hover:text-indigo-300">
                    View employers →
                </a>
            </div>

            <div class="card p-6">
                <span class="brand-mark h-9 w-9 text-sm" aria-hidden="true">⌗</span>
                <h2 class="mt-4 text-sm font-semibold text-zinc-100">Tags & Categories</h2>
                <p class="mt-1.5 text-xs leading-6 text-zinc-500">
                    Browse positions organized by tech stack, skills, and industry tags.
                </p>
                <a href="{{ route('tags') }}" class="mt-4 inline-flex items-center text-xs font-medium text-indigo-400 hover:text-indigo-300">
                    Explore tags →
                </a>
            </div>
        </div>
    </x-page>
@endsection

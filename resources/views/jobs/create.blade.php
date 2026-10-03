@extends('layouts.app')

@section('title', 'Create Job')

@section('content')
    <div class="mx-auto max-w-2xl px-6 py-11 sm:px-10 lg:px-14">

        {{-- Page header --}}
        <div class="flex items-center gap-3">
            <span class="grid h-9 w-9 place-items-center rounded-full bg-white text-zinc-900">
                ＋
            </span>
            <div>
                <h1 class="text-xl font-semibold tracking-tight text-white">
                    Create a Job Offer
                </h1>
                <p class="mt-0.5 text-xs text-zinc-500">
                    Fill in the details below to publish a new listing.
                </p>
            </div>
        </div>

        <div class="mt-7 border-t border-white/10"></div>

        {{-- Validation errors --}}
        @if ($errors->any())
            <div class="mt-6 rounded-xl border border-red-500/20 bg-red-500/[0.06] px-4 py-3 ring-1 ring-inset ring-red-500/10">
                <p class="mb-1.5 text-xs font-medium text-red-300">
                    Please fix the following:
                </p>
                <ul class="space-y-1 text-sm text-red-300/90">
                    @foreach ($errors->all() as $error)
                        <li style="color: red">• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Create form --}}
        <form
            method="POST"
            action="{{ route('jobs.store') }}"
            class="mt-6 space-y-6 rounded-xl border border-white/10 bg-zinc-900/60 px-6 py-7 shadow-sm shadow-black/20 ring-1 ring-inset ring-white/5"
        >
            @csrf

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-zinc-300">
                    Job Title
                </label>
                <input
                    type="text" name="title" id="title" value="{{ old('title') }}"
                    placeholder="e.g. Senior Backend Developer"
                    class="mt-2 w-full rounded-lg border border-white/10 bg-zinc-950/60 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-600 outline-none ring-1 ring-inset ring-transparent transition focus:border-white/20 focus:ring-white/10"
                >
                @error('title')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
            </div>

            {{-- Salary + Location --}}
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="salary" class="block text-sm font-medium text-zinc-300">
                        Salary
                    </label>
                    <div class="mt-2 flex items-center rounded-lg border border-white/10 bg-zinc-950/60 ring-1 ring-inset ring-transparent transition focus-within:border-white/20 focus-within:ring-white/10">
                        <span class="pl-3.5 text-sm text-zinc-500">$</span>
                        <input
                            type="text" name="salary" id="salary" value="{{ old('salary') }}"
                            placeholder="50000"
                            class="w-full bg-transparent px-2 py-2.5 text-sm text-zinc-100 placeholder-zinc-600 outline-none"
                        >
                    </div>
                    @error('salary')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-zinc-300">
                        Location
                    </label>
                    <input
                        type="text" name="location" id="location" value="{{ old('location') }}"
                        placeholder="e.g. Remote / Berlin"
                        class="mt-2 w-full rounded-lg border border-white/10 bg-zinc-950/60 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-600 outline-none ring-1 ring-inset ring-transparent transition focus:border-white/20 focus:ring-white/10"
                    >
                    @error('location')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Type --}}
            <div>
                <label for="type" class="block text-sm font-medium text-zinc-300">
                    Employment Type
                </label>
                <select
                    name="type" id="type"
                    class="mt-2 w-full rounded-lg border border-white/10 bg-zinc-950/60 px-3.5 py-2.5 text-sm text-zinc-100 outline-none ring-1 ring-inset ring-transparent transition focus:border-white/20 focus:ring-white/10"
                >
                    <option value="" {{ old('type') ? '' : 'selected' }} disabled>Select a type…</option>
                    @foreach (['Full-time', 'Part-time', 'Contract', 'Internship'] as $option)
                        <option value="{{ $option }}" {{ old('type') === $option ? 'selected' : '' }}>
                            {{ $option }}
                        </option>
                    @endforeach
                </select>
                @error('type')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-zinc-300">
                    Description
                </label>
                <textarea
                    name="description" id="description" rows="4"
                    placeholder="What does this role involve?"
                    class="mt-2 w-full rounded-lg border border-white/10 bg-zinc-950/60 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-600 outline-none ring-1 ring-inset ring-transparent transition focus:border-white/20 focus:ring-white/10"
                >{{ old('description') }}</textarea>
                @error('description')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
            </div>

            {{-- Requirements (one per line) --}}
            <div>
                <label for="requirements" class="block text-sm font-medium text-zinc-300">
                    Requirements
                </label>
                <p class="mt-1 text-xs text-zinc-500">
                    One requirement per line — each line becomes a separate item.
                </p>
                <textarea
                    name="requirements" id="requirements" rows="4"
                    placeholder="3+ years of Laravel&#10;Experience with REST APIs"
                    class="mt-2 w-full rounded-lg border border-white/10 bg-zinc-950/60 px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-600 outline-none ring-1 ring-inset ring-transparent transition focus:border-white/20 focus:ring-white/10"
                >{{ old('requirements') }}</textarea>
                @error('requirements')<p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>@enderror
            </div>

            {{-- Submit --}}
            <div class="flex items-center justify-between gap-4 border-t border-white/10 pt-5">
                <a href="{{ route('jobs') }}" class="flex items-center gap-1.5 text-xs text-zinc-500 transition hover:text-zinc-300">
                    ← Back to jobs
                </a>

                <button type="submit"
                        class="rounded-lg bg-white px-4 py-2 text-xs font-medium text-zinc-900 shadow-sm transition hover:bg-zinc-200"
                >
                    Create Job
                </button>
            </div>
        </form>

    </div>
@endsection

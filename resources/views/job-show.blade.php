@extends('layouts.app')

@section('title', $job['title'])

@section('content')
    <div class="mx-auto max-w-4xl px-6 py-11 sm:px-10 lg:px-14">

        {{-- Back link --}}
        <a
            href="{{ route('jobs') }}"
            class="inline-flex items-center gap-2 rounded-lg px-2 py-1.5 text-sm text-zinc-400 transition hover:bg-white/5 hover:text-white"
        >
            <span aria-hidden="true">←</span>
            <span>Back to jobs</span>
        </a>

        {{-- Header --}}
        <div class="mt-7 border-b border-white/10 pb-7">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <p class="text-sm font-medium text-zinc-400">
                        {{ $job['company'] }}
                    </p>

                    <h1 class="mt-2 text-2xl font-semibold tracking-tight text-white sm:text-3xl">
                        {{ $job['title'] }}
                    </h1>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-medium text-zinc-300">
                            {{ $job['location'] }}
                        </span>

                        <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-medium text-zinc-300">
                            {{ $job['type'] }}
                        </span>
                    </div>
                </div>

                <div class="shrink-0">
                    <span class="inline-flex rounded-lg border border-emerald-400/20 bg-emerald-400/10 px-3 py-2 text-sm font-medium text-emerald-300">
                        ${{ $job['salary'] }}
                    </span>
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="mt-8 grid gap-8 lg:grid-cols-3">

            {{-- Main content --}}
            <div class="space-y-8 lg:col-span-2">

                {{-- Description --}}
                <section>
                    <h2 class="text-base font-semibold text-white">
                        About this role
                    </h2>

                    <p class="mt-3 text-sm leading-7 text-zinc-400">
                        {{ $job['description'] }}
                    </p>
                </section>

                {{-- Requirements --}}
                <section>
                    <h2 class="text-base font-semibold text-white">
                        Requirements
                    </h2>

                    <ul class="mt-4 space-y-3">
                        @foreach ($job['requirements'] as $requirement)
                            <li class="flex gap-3 text-sm leading-6 text-zinc-400">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-zinc-500"></span>
                                <span>{{ $requirement }}</span>
                            </li>
                        @endforeach
                    </ul>
                </section>

            </div>

            {{-- Side action card --}}
            <aside class="h-fit rounded-xl border border-white/10 bg-zinc-900/60 p-5 shadow-lg shadow-black/20">
                <h2 class="text-sm font-semibold text-white">
                    Interested in this role?
                </h2>

                <p class="mt-2 text-sm leading-6 text-zinc-400">
                    Send your CV and portfolio to start the application process.
                </p>

                <button
                    type="button"
                    class="mt-5 inline-flex w-full items-center justify-center rounded-lg bg-zinc-100 px-4 py-2.5 text-sm font-medium text-zinc-900 transition hover:bg-white focus:outline-none focus:ring-2 focus:ring-white/50 focus:ring-offset-2 focus:ring-offset-zinc-900"
                >
                    Apply now
                </button>

                <p class="mt-3 text-center text-xs text-zinc-500">
                    You will be contacted by {{ $job['company'] }}.
                </p>
            </aside>

        </div>
    </div>
@endsection

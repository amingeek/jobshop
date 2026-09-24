@extends('layouts.app')

@section('title', 'Jobs')

@section('content')
    <div class="mx-auto max-w-4xl px-6 py-11 sm:px-10 lg:px-14">

        {{-- Page title --}}
        <h1 class="text-xl font-semibold tracking-tight text-white">
            List of Job Offers
        </h1>

        <div class="mt-7 border-t border-white/10"></div>

        {{-- Message from route/controller --}}
        @isset($msg)
            <p class="mt-6 text-sm text-zinc-400">
                {{ $msg }}
            </p>
        @endisset

        {{-- Jobs list --}}
        <ol class="mt-6 space-y-3">
            @forelse ($jobs as $job)
                <li>
                    <a
                        href="/jobs/{{$job['id']}}"
                        class="group flex items-center justify-between gap-4 rounded-xl border border-white/10 bg-zinc-900/60 px-4 py-4 transition duration-150 hover:border-white/20 hover:bg-zinc-800"
                    >
                        <div class="min-w-0">
                            <h2 class="truncate text-sm font-medium text-zinc-100 transition group-hover:text-white">
                                {{ $job['title'] }}
                            </h2>

                            <p class="mt-1 text-xs text-zinc-500">
                                Position available
                            </p>
                        </div>

                        <div class="flex shrink-0 items-center gap-3">
                            <span class="rounded-full bg-emerald-400/10 px-2.5 py-1 text-xs font-medium text-emerald-300">
                                ${{ $job['salary'] }}
                            </span>

                            <span class="text-zinc-600 transition group-hover:translate-x-0.5 group-hover:text-zinc-300">
                                →
                            </span>
                        </div>
                    </a>
                </li>
                <br>
            @empty
                <li class="rounded-xl border border-dashed border-white/10 bg-white/[0.02] px-5 py-10 text-center">
                    <p class="text-sm text-zinc-400">
                        No job offers are available at the moment.
                    </p>
                </li>
            @endforelse
        </ol>

    </div>
@endsection

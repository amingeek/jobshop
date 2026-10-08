@extends('layouts.app')

@section('title', 'Jobs')

@section('content')
    <x-page
        title="Job Offers"
        subtitle="Browse the latest open positions from our partner companies."
        icon="▤"
        eyebrow="Careers"
        width="full"
    >
        {{-- Message from route/controller --}}
        @isset($msg)
            <p class="mt-5 text-sm text-zinc-400">{{ $msg }}</p>
        @endisset

        {{-- Jobs list --}}
        <ol class="mt-7 grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
            @forelse ($jobs as $job)
                <li class="min-w-0">
                    <a
                        href="/jobs/{{ $job['id'] }}"
                        class="card group flex h-full flex-col justify-between gap-4 p-5"
                    >
                        <div class="min-w-0">
                            <div class="flex items-start justify-between gap-3">
                                <p class="truncate text-xs font-medium text-indigo-300/90">
                                    {{ $job->employer->name }}
                                </p>

                                <span class="badge badge-success shrink-0">
                                    ${{ $job['salary'] }}
                                </span>
                            </div>

                            <h2 class="mt-2 text-base font-semibold leading-6 text-zinc-100 transition group-hover:text-white">
                                {{ $job['title'] }}
                            </h2>

                            <div class="mt-3 flex flex-wrap gap-1.5">
                                @if ($job->location)
                                    <span class="badge badge-neutral">{{ $job->location }}</span>
                                @endif

                                @if ($job->type)
                                    <span class="badge badge-neutral">{{ $job->type }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center justify-between border-t border-white/5 pt-3 text-xs text-zinc-500">
                            <span>Position available</span>

                            <span class="inline-flex items-center gap-1 font-medium text-zinc-400 transition group-hover:gap-2 group-hover:text-indigo-300">
                                View
                                <span aria-hidden="true">→</span>
                            </span>
                        </div>
                    </a>
                </li>
            @empty
                <li class="sm:col-span-2 xl:col-span-3">
                    <div class="empty-state">
                        <p class="text-sm text-zinc-400">
                            No job offers are available at the moment.
                        </p>

                        <a href="{{ route('jobs.create') }}" class="btn btn-primary btn-sm mt-4">
                            Post the first job
                        </a>
                    </div>
                </li>
            @endforelse
        </ol>

        <div class="mt-8">
            {{ $jobs->links() }}
        </div>
    </x-page>
@endsection

@extends('layouts.app')

@section('title', $job['title'])

@section('content')
    <div class="mx-auto w-full max-w-4xl px-5 py-9 sm:px-8 sm:py-11 lg:px-12">

        {{-- Back link --}}
        <a
            href="{{ route('jobs') }}"
            class="btn btn-ghost -ml-2 px-2 py-1.5"
        >
            <span aria-hidden="true">←</span>
            <span>Back to jobs</span>
        </a>

        {{-- Header --}}
        <header class="mt-6">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">
                <div class="min-w-0">
                    <p class="text-sm font-medium text-indigo-300/90">
                        {{ $job->employer->name }}
                    </p>

                    <h1 class="mt-2 text-2xl font-semibold tracking-tight text-white sm:text-3xl">
                        {{ $job->title }}
                    </h1>

                    <div class="mt-4 flex flex-wrap gap-2">
                        @if ($job->location)
                            <span class="badge badge-neutral">{{ $job->location }}</span>
                        @endif

                        @if ($job->type)
                            <span class="badge badge-neutral">{{ $job->type }}</span>
                        @endif
                    </div>
                </div>

                <div class="shrink-0">
                    <span class="badge badge-success px-3.5 py-2 text-sm">
                        ${{ $job->salary }}
                    </span>
                </div>
            </div>

            <div class="page-divider mt-7"></div>
        </header>

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
                        {{ $job->description }}
                    </p>
                </section>

                {{-- Requirements --}}
                <section>
                    <h2 class="text-base font-semibold text-white">
                        Requirements
                    </h2>

                    <ul class="mt-4 space-y-3">
                        @foreach ($job->requirements as $requirement)
                            <li class="flex gap-3 text-sm leading-6 text-zinc-400">
                                <span class="bullet"></span>
                                <span>{{ $requirement }}</span>
                            </li>
                        @endforeach
                    </ul>
                </section>

            </div>

            {{-- Side action card --}}
            <aside class="card-raised h-fit p-5">
                <h2 class="text-sm font-semibold text-white">
                    Interested in this role?
                </h2>

                <p class="mt-2 text-sm leading-6 text-zinc-400">
                    Send your CV and portfolio to start the application process.
                </p>

                <button type="button" class="btn btn-primary mt-5 w-full">
                    Apply now
                </button>

                <p class="mt-3 text-center text-xs text-zinc-500">
                    You will be contacted by {{ $job->company ?? $job->employer->name }}.
                </p>
            </aside>

            {{-- Actions --}}
            <div class="flex flex-wrap items-center gap-3 lg:col-span-3">
                <a href="{{ route('jobs.edit', $job) }}" class="btn btn-secondary">
                    Edit Job
                </a>

                <form
                    action="{{ route('jobs.destroy', $job) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this job?');"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Delete Job
                    </button>
                </form>
            </div>

        </div>
    </div>
@endsection

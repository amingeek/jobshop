@extends('layouts.app')

@section('title', 'Employers')

@section('content')
    <x-page
        title="Employers"
        subtitle="Companies currently hiring on Tailwind Labs."
        icon="⚑"
        eyebrow="Directory"
        width="full"
    >
        {{-- Message from route/controller --}}
        @isset($msg)
            <p class="mt-5 text-sm text-zinc-400">{{ $msg }}</p>
        @endisset

        {{-- Employers list --}}
        <ol class="mt-7 grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
            @forelse ($employers as $employer)
                <li class="min-w-0">
                    <a
                        href="/employers/{{ $employer['id'] }}"
                        class="card group flex h-full items-center gap-4 p-5"
                    >
                        <span class="brand-mark h-11 w-11 shrink-0 text-lg" aria-hidden="true">
                            {{ strtoupper(substr($employer['name'], 0, 1)) }}
                        </span>

                        <div class="min-w-0 flex-1">
                            <h2 class="truncate text-sm font-semibold text-zinc-100 transition group-hover:text-white">
                                {{ $employer['name'] }}
                            </h2>

                            <p class="mt-1 text-xs text-zinc-500">
                                {{ count($employer->jobs) }} {{ Str::plural('job', count($employer->jobs)) }}
                            </p>
                        </div>

                        <span class="shrink-0 text-zinc-600 transition group-hover:translate-x-0.5 group-hover:text-indigo-300" aria-hidden="true">
                            →
                        </span>
                    </a>
                </li>
            @empty
                <li class="sm:col-span-2 xl:col-span-3">
                    <div class="empty-state">
                        <p class="text-sm text-zinc-400">
                            No employers are available at the moment.
                        </p>
                    </div>
                </li>
            @endforelse
        </ol>

        <div class="mt-8">
            {{ $employers->links() }}
        </div>
    </x-page>
@endsection

@extends('layouts.app')

@section('title', 'Tags')

@section('content')
    <x-page
        title="Tags"
        subtitle="Explore jobs grouped by skill and category."
        icon="⌗"
        eyebrow="Browse"
        width="full"
    >
        {{-- Message from route/controller --}}
        @isset($msg)
            <p class="mt-5 text-sm text-zinc-400">{{ $msg }}</p>
        @endisset

        {{-- Tag list --}}
        <ul class="mt-7 flex flex-wrap gap-3">
            @forelse ($tags as $tag)
                <li class="min-w-0">
                    <a
                        href="/tags/{{ $tag['id'] }}"
                        class="card group inline-flex items-center gap-2.5 px-4 py-3"
                    >
                        <span class="badge badge-accent">
                            {{ count($tag->jobs) }}
                        </span>

                        <span class="text-sm font-medium text-zinc-200 transition group-hover:text-white">
                            {{ $tag['name'] }}
                        </span>

                        <span class="text-zinc-600 transition group-hover:translate-x-0.5 group-hover:text-indigo-300" aria-hidden="true">
                            →
                        </span>
                    </a>
                </li>
            @empty
                <li class="w-full">
                    <div class="empty-state">
                        <p class="text-sm text-zinc-400">
                            No tags are available at the moment.
                        </p>
                    </div>
                </li>
            @endforelse
        </ul>
    </x-page>
@endsection

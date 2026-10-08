@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex flex-wrap items-center justify-between gap-4">

        {{-- Mobile: previous / next --}}
        <div class="flex items-center gap-2 sm:hidden">

            @if ($paginator->onFirstPage())
                <span class="pagination-link pagination-link-disabled" aria-disabled="true">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-link">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-link">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="pagination-link pagination-link-disabled" aria-disabled="true">
                    {!! __('pagination.next') !!}
                </span>
            @endif

        </div>

        {{-- Desktop: page info + numbers --}}
        <div class="hidden flex-1 items-center justify-between sm:flex">

            <p class="text-xs text-zinc-500">
                {!! __('Viewing') !!}
                @if ($paginator->firstItem())
                    <span class="font-medium text-zinc-300">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium text-zinc-300">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-medium text-zinc-300">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>

            <div class="flex items-center gap-2">

                @if ($paginator->onFirstPage())
                    <span class="pagination-link pagination-link-disabled" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                        <span aria-hidden="true">←</span>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-link" aria-label="{{ __('pagination.previous') }}">
                        <span aria-hidden="true">←</span>
                    </a>
                @endif

                @foreach ($elements as $element)
                    {{-- "Three dots" separator --}}
                    @if (is_string($element))
                        <span class="px-1 text-xs text-zinc-600" aria-hidden="true">{{ $element }}</span>
                    @endif

                    {{-- Array of links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="pagination-link pagination-link-active" aria-current="page">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="pagination-link" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-link" aria-label="{{ __('pagination.next') }}">
                        <span aria-hidden="true">→</span>
                    </a>
                @else
                    <span class="pagination-link pagination-link-disabled" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                        <span aria-hidden="true">→</span>
                    </span>
                @endif

            </div>
        </div>
    </nav>
@endif

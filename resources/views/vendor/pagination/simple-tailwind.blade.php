@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex flex-wrap items-center justify-between gap-4">

        {{-- Page info --}}
        <p class="text-xs text-zinc-500">
            @if ($paginator->firstItem())
                {!! __('Viewing') !!}
                <span class="font-medium text-zinc-300">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="font-medium text-zinc-300">{{ $paginator->lastItem() }}</span>
            @else
                <span class="font-medium text-zinc-300">{{ $paginator->count() }}</span>
                {!! __('results') !!}
            @endif
        </p>

        {{-- Prev / next --}}
        <div class="flex items-center gap-2">

            @if ($paginator->onFirstPage())
                <span class="pagination-link pagination-link-disabled" aria-disabled="true">
                    <span aria-hidden="true">←</span>
                    <span>{!! __('pagination.previous') !!}</span>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-link">
                    <span aria-hidden="true">←</span>
                    <span>{!! __('pagination.previous') !!}</span>
                </a>
            @endif

            <span class="pagination-link pagination-link-active" aria-current="page">
                {{ $paginator->currentPage() }}
            </span>

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-link">
                    <span>{!! __('pagination.next') !!}</span>
                    <span aria-hidden="true">→</span>
                </a>
            @else
                <span class="pagination-link pagination-link-disabled" aria-disabled="true">
                    <span>{!! __('pagination.next') !!}</span>
                    <span aria-hidden="true">→</span>
                </span>
            @endif

        </div>
    </nav>
@endif

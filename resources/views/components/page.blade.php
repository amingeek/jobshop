@props(['title' => null, 'subtitle' => null, 'icon' => null, 'width' => '4xl', 'eyebrow' => null])

@php
    $widthClass = match ($width) {
        '2xl' => 'max-w-2xl',
        '3xl' => 'max-w-3xl',
        'full' => 'max-w-none',
        default => 'max-w-4xl',
    };
@endphp

<div class="mx-auto w-full px-5 py-9 sm:px-8 sm:py-11 lg:px-12 {{ $widthClass }}">
    @if ($title)
        <header class="flex flex-col gap-4 sm:flex-row sm:items-center sm:gap-4">
            @if ($icon)
                <span class="brand-mark h-11 w-11 shrink-0 text-lg" aria-hidden="true">
                    {{ $icon }}
                </span>
            @endif

            <div class="min-w-0">
                @if ($eyebrow)
                    <p class="page-eyebrow mb-1">{{ $eyebrow }}</p>
                @endif

                <h1 class="page-title">{{ $title }}</h1>

                @if ($subtitle)
                    <p class="mt-1.5 text-sm leading-6 text-zinc-400">{{ $subtitle }}</p>
                @endif
            </div>
        </header>

        <div class="page-divider"></div>
    @endif

    {{ $slot }}
</div>

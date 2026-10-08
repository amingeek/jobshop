@props(['href', 'active' => false, 'icon' => null])

<a
    href="{{ $href }}"
    @class(['nav-link-mobile', 'nav-link-mobile-active' => $active])
    @if ($active) aria-current="page" @endif
>
    @if ($icon)
        <span class="grid h-7 w-7 shrink-0 place-items-center rounded-lg border border-white/10 bg-white/5 text-sm" aria-hidden="true">{{ $icon }}</span>
    @endif

    <span>{{ $slot }}</span>
</a>

@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <x-page
        title="Login to your account"
        subtitle="Join Tailwind Labs to post and apply for jobs."
        icon="✦"
        width="2xl"
    >
        {{-- Validation errors --}}
        @if ($errors->any())
            <div class="form-alert mt-6">
                <p class="mb-1.5 text-xs font-medium text-red-300">
                    Please fix the following:
                </p>
                <ul class="space-y-1 text-sm text-red-300/90">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Register form (UI only until a POST route is wired up) --}}
        <form class="card mt-7 space-y-6 px-5 py-6 sm:px-7 sm:py-8" action="/login" method="POST">

            @csrf
            {{-- Email --}}
            <div>
                <label for="email" class="form-label">Email address</label>
                <input
                    type="email" name="email" id="email" value="{{ old('email') }}"
                    placeholder="you@example.com"
                    autocomplete="email"
                    class="form-input"
                >
                @error('email')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            {{-- Password --}}
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password" name="password" id="password"
                        placeholder="••••••••"
                        autocomplete="new-password"
                        class="form-input"
                    >
                    @error('password')<p class="form-error">{{ $message }}</p>@enderror
                </div>

            </div>


            {{-- Submit --}}
            <div class="flex flex-wrap items-center justify-between gap-4 border-t border-white/10 pt-5">
                <a href="{{ route('home') }}" class="text-xs text-zinc-500 transition hover:text-zinc-300">
                    ← Back to home
                </a>

                <button type="submit" class="btn btn-primary btn-sm">
                    Login
                </button>
            </div>
        </form>
    </x-page>
@endsection

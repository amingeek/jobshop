@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <x-page
        title="Create your account"
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
        <form class="card mt-7 space-y-6 px-5 py-6 sm:px-7 sm:py-8" action="{{ route('register.store') }}" method="POST">
            @csrf
            {{-- First Name --}}
            <div>
                <label for="first_name" class="form-label">First name</label>
                <input
                    type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                    placeholder="Ada"
                    autocomplete="name"
                    class="form-input"
                >
                @error('name')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            {{-- Last Name --}}
            <div>
                <label for="last_name" class="form-label">Last name</label>
                <input
                    type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                    placeholder="Lovelace"
                    autocomplete="name"
                    class="form-input"
                >
                @error('name')<p class="form-error">{{ $message }}</p>@enderror
            </div>


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

                <div>
                    <label for="password_confirmation" class="form-label">Confirm password</label>
                    <input
                        type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="••••••••"
                        autocomplete="new-password"
                        class="form-input"
                    >
                </div>
            </div>

            {{-- Terms --}}
            <label class="flex items-start gap-2 text-xs leading-5 text-zinc-500">
                <input
                    type="checkbox" name="terms"
                    class="mt-0.5 h-4 w-4 shrink-0 accent-white"
                >
                <span>I agree to the terms of service and privacy policy.</span>
            </label>

            {{-- Submit --}}
            <div class="flex flex-wrap items-center justify-between gap-4 border-t border-white/10 pt-5">
                <a href="{{ route('home') }}" class="text-xs text-zinc-500 transition hover:text-zinc-300">
                    ← Back to home
                </a>

                <button type="submit" class="btn btn-primary btn-sm">
                    Create account
                </button>
            </div>
        </form>
    </x-page>
@endsection

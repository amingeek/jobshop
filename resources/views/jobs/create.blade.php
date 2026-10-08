@extends('layouts.app')

@section('title', 'Create Job')

@section('content')
    <x-page
        title="Create a Job Offer"
        subtitle="Fill in the details below to publish a new listing."
        icon="＋"
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

        {{-- Create form --}}
        <form
            method="POST"
            action="{{ route('jobs.store') }}"
            class="card mt-7 space-y-6 px-5 py-6 sm:px-7 sm:py-8"
        >
            @csrf

            {{-- Title --}}
            <div>
                <label for="title" class="form-label">Job Title</label>
                <input
                    type="text" name="title" id="title" value="{{ old('title') }}"
                    placeholder="e.g. Senior Backend Developer"
                    class="form-input"
                >
                @error('title')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            {{-- Salary + Location --}}
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="salary" class="form-label">Salary</label>
                    <div class="form-input-group">
                        <span class="form-input-prefix">$</span>
                        <input
                            type="text" name="salary" id="salary" value="{{ old('salary') }}"
                            placeholder="50000"
                            class="form-input-bare"
                        >
                    </div>
                    @error('salary')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="location" class="form-label">Location</label>
                    <input
                        type="text" name="location" id="location" value="{{ old('location') }}"
                        placeholder="e.g. Remote / Berlin"
                        class="form-input"
                    >
                    @error('location')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Type --}}
            <div>
                <label for="type" class="form-label">Employment Type</label>
                <select name="type" id="type" class="form-input">
                    <option value="" {{ old('type') ? '' : 'selected' }} disabled>Select a type…</option>
                    @foreach (['Full-time', 'Part-time', 'Contract', 'Internship'] as $option)
                        <option value="{{ $option }}" {{ old('type') === $option ? 'selected' : '' }}>
                            {{ $option }}
                        </option>
                    @endforeach
                </select>
                @error('type')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="form-label">Description</label>
                <textarea
                    name="description" id="description" rows="4"
                    placeholder="What does this role involve?"
                    class="form-input"
                >{{ old('description') }}</textarea>
                @error('description')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            {{-- Requirements (one per line) --}}
            <div>
                <label for="requirements" class="form-label">Requirements</label>
                <p class="form-hint">
                    One requirement per line — each line becomes a separate item.
                </p>
                <textarea
                    name="requirements" id="requirements" rows="4"
                    placeholder="3+ years of Laravel&#10;Experience with REST APIs"
                    class="form-input"
                >{{ old('requirements') }}</textarea>
                @error('requirements')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            {{-- Submit --}}
            <div class="flex flex-wrap items-center justify-between gap-4 border-t border-white/10 pt-5">
                <a href="{{ route('jobs') }}" class="text-xs text-zinc-500 transition hover:text-zinc-300">
                    ← Back to jobs
                </a>

                <button type="submit" class="btn btn-primary btn-sm">
                    Create Job
                </button>
            </div>
        </form>
    </x-page>
@endsection

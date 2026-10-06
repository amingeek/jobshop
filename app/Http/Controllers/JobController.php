<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //

    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(10);
        return view('jobs.index', [
            'msg' => 'Job offers:',
            'jobs' => $jobs,
        ]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job,
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {
        $validated = request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric'],
            'location' => ['required', 'min:2'],
            'type' => ['required', 'in:Full-time,Part-time,Contract,Internship'],
            'description' => ['required', 'min:10'],
            'requirements' => ['required', 'string', 'min:3'],
        ]);

        $validated['requirements'] = collect(preg_split('/\r\n|\r|\n/', $validated['requirements']))
            ->map(fn($line) => trim($line))
            ->filter()
            ->values()
            ->all();
        $validated['employer_id'] = 1;
        Job::create($validated);

        return redirect()->route('jobs')->with('msg', 'Job listing created.');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', [
            'job' => $job,
        ]);
    }

    public function update(Job $job)
    {
        // validate
        $validated = request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric'],
            'location' => ['required', 'min:2'],
            'type' => ['required', 'in:Full-time,Part-time,Contract,Internship'],
            'description' => ['required', 'min:10'],
            'requirements' => ['required', 'string', 'min:3'],
        ]);

        $validated['requirements'] = collect(preg_split('/\r\n|\r|\n/', $validated['requirements']))
            ->map(fn($line) => trim($line))
            ->filter()
            ->values()
            ->all();
        $validated['employer_id'] = 1;

        // authorize ( on hold.... )
        // update

        $job->update([
            'title' => $validated['title'],
            'salary' => $validated['salary'],
            'location' => $validated['location'],
            'type' => $validated['type'],
            'description' => $validated['description'],
            'requirements' => $validated['requirements'],
            'employer_id' => $validated['employer_id'],
        ]);
        // redirect to job page

        return redirect('/jobs/' . $job->id)->with('msg', 'Job listing updated.');
    }

    public function destroy(Job $job)
    {
        // authorize ( on hold.... )
        // delete

        $job->delete();
        // redirect
        return redirect()->route('jobs')->with('msg', 'Job listing deleted.');
    }
}

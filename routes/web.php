<?php

use App\Models\Employer;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

use App\Models\Job;

/*
|--------------------------------------------------------------------------
| Basic pages
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home', [
        'msg' => 'Hello World!',
    ]);
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Jobs list
|--------------------------------------------------------------------------
*/

// index jobs
Route::get('/jobs', function () {

    $jobs = Job::with('employer')->latest()->simplePaginate(10);
    return view('jobs.index', [
        'msg' => 'Job offers:',
        'jobs' => $jobs,
    ]);
})->name('jobs');


// create
Route::post('/jobs', function () {
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
})->name('jobs.store');

// show create
Route::get('/jobs/create', function () {
    return view('jobs.create');
})->name('jobs.create');

// show job
Route::get('/jobs/{id}', function (int $id) {
    $job = Job::find($id);
    return view('jobs.show', [
        'job' => $job,
    ]);
})->whereNumber('id')->name('jobs.show');


// edit
Route::get('/jobs/{id}/edit', function (int $id) {
    $job = Job::find($id);
    return view('jobs.edit', [
        'job' => $job,
    ]);
})->name('jobs.edit');

// update
Route::patch('/jobs/{id}', function ($id) {
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

    $job = Job::findOrFail($id);

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
})->name('jobs.update');


// Destroy
Route::delete('/jobs/{id}', function ($id) {
    // authorize ( on hold.... )
    // delete

    $job = Job::findOrFail($id);
    $job->delete();
    // redirect
    return redirect()->route('jobs')->with('msg', 'Job listing deleted.');
})->name('jobs.destroy');

/*
|--------------------------------------------------------------------------
| Employers list
|--------------------------------------------------------------------------
*/

Route::get('/employers/', function () {
    $employers = Employer::with('jobs')->paginate(10);
    return view('employers', [
        'employers' => $employers,
    ]);
})->name('employers');


/*
|--------------------------------------------------------------------------
| Tags list
|--------------------------------------------------------------------------
*/
Route::get('/tags/', function () {
    return view('tags', [
        "tags" => Tag::all(),
    ]);
})->name('tags');

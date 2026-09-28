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

Route::get('/jobs', function () {

    $jobs = Job::with('employer')->simplePaginate(3);
    return view('jobs', [
        'msg' => 'Job offers:',
        'jobs' => $jobs,
    ]);

;
})->name('jobs');


Route::get('/jobs/{id}', function (int $id) {
    $job = Job::find($id);


    return view('job-show', [
        'job' => $job,
    ]);
})->whereNumber('id')->name('jobs.show');


Route::get('/employers/', function () {
    return view('employers', [
        'employers' => Employer::all(),
    ]);
})->name('employers');

Route::get('/tags/', function () {
    return view('tags', [
        "tags"=> Tag::all(),
    ]);
})->name('tags');

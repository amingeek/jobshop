<?php

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
    return view('jobs', [
        'msg' => 'Job offers:',
        'jobs' => Job::all(),
    ]);
})->name('jobs');


Route::get('/jobs/{id}', function (int $id) {
    $job = Job::find($id);


    return view('job-show', [
        'job' => $job,
    ]);
})->whereNumber('id')->name('jobs.show');

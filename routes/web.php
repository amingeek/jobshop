<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Basic pages
|--------------------------------------------------------------------------
*/

Route::get('/test', function () {
    $job = Job::first();
    TranslateJob::dispatch($job);
    return "Done";
});

Route::view('/', 'home')->name('home');

Route::view('/about', 'about')->name('about');

Route::view('/welcome', 'welcome')->name('welcome');

// Auth
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
/*
|--------------------------------------------------------------------------
| Jobs list
|--------------------------------------------------------------------------
*/

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index')->name('jobs');
    Route::post('/jobs', 'store')->name('jobs.store');
    Route::get('/jobs/create', 'create')->name('jobs.create')->middleware('auth');
    Route::get('/jobs/{job}', 'show')->name('jobs.show');
    Route::get('/jobs/{job}/edit', 'edit')->name('jobs.edit')->middleware('auth')->can('edit', 'job');
    Route::patch('/jobs/{job}', 'update')->name('jobs.update')->middleware('auth')->can('edit', 'job');
    Route::delete('/jobs/{job}', 'destroy')->name('jobs.destroy')->middleware('auth')->can('edit', 'job');
});

// Route::resource('jobs' , JobController::class);

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
        'tags' => Tag::all(),
    ]);
})->name('tags');

<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\AboutController;


// Frontend

Route::get('/', function () {
    return view('front.index');
})->name('home');
// About routes
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/courses', function () {
    return view('front.course');
})->name('courses');

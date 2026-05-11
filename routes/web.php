<?php
use Illuminate\Support\Facades\Route;

// Frontend

Route::get('/', function () {
    return view('front.index');
})->name('home');

Route::get('/about', function () {
    return view('front.about');
})->name('about');
Route::get('/courses', function () {
    return view('front.course');
})->name('courses');

Route::get('/services', function () {
    return view('front.service');
})->name('services');

Route::get('/contact', function () {
    return view('front.contact');
})->name('contact');

<?php
use Illuminate\Support\Facades\Route;

// Frontend

Route::get('/', function () {
    return view('front.index');
})->name('home');


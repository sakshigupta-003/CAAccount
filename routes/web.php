<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\CourseController;
use App\Http\Controllers\Front\ServiceController;

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

Route::get('/courses/{id}', [CourseController::class, 'show'])->name('course.detail');
// Dynamic route for course details (FIXED)
Route::get('/courses/{id}', function ($id) {
    // For demo purposes - create a sample course object
    // In real app, fetch from database: $course = Course::findOrFail($id);
    
    $course = (object)[
        'id' => $id,
        'name' => 'Sample Course ' . $id,
        'short_description' => 'Professional training program to boost your career',
        'full_description' => 'This comprehensive course covers all essential topics with practical examples and hands-on projects.',
        'image' => 'course.jpg',
        'price' => 299,
        'duration' => '8 weeks',
        'level' => 'Beginner to Intermediate',
        'modules' => [
            'Module 1: Introduction to the Course',
            'Module 2: Core Concepts and Fundamentals',
            'Module 3: Advanced Topics and Applications',
            'Module 4: Practical Hands-on Projects',
            'Module 5: Final Assessment and Certification'
        ]
    ];
    
    return view('front.coursedetails', compact('course'));
})->name('course.detail');

// Course routes
Route::get('/courses', function () {
    return view('front.course');
})->name('courses.index');

Route::get('/courses/{id}', [CourseController::class, 'show'])->name('course.detail');

// Enroll route
Route::get('/course/enroll/{id}', function ($id) {
    return redirect()->route('courses.index')->with('success', 'Course added to cart!');
})->name('course.enroll');



Route::get('/services', function () {
    return view('front.service');
})->name('services');

// Service routes
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/service/{id}', [ServiceController::class, 'show'])->name('service.detail');
Route::get('/service/enroll/{id}', [ServiceController::class, 'enroll'])->name('service.enroll');
Route::get('/contact', function () {
    return view('front.contact');
})->name('contact');

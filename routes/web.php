<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/about', 'about')->name('about');

Route::view('/faq', 'faq')->name('faq');

Route::view('/you-asked', 'you-asked')->name('you.asked');

Route::view('/contact', 'contact')->name('contact');

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'subject' => ['nullable', 'string', 'max:255'],
        'message' => ['required', 'string', 'max:5000'],
    ]);

    return back()->with('success', 'Thank you for your message. We will get back to you as soon as we can.');
})->name('contact.submit');

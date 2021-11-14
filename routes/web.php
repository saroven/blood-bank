<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;

Route::name('public.')->group(function (){
    Route::get('/', function () {
        return view('index');
    })->name('home');
    Route::get('/volunteer', function () {
        return view('public.volunteer');
    })->name('volunteer');
    Route::get('/blood-request', function (){
        return view('public.blood-seeking-requests');
    })->name('bloodRequest');
    Route::get('/user-guide', function (){
        return view('public.user-guide');
    })->name('userGuide');
    Route::get('/contact', function (){
        return view('public.contact');
    })->name('contact');
    Route::get('/contact', function (){
        return view('public.contact');
    })->name('contact');
    Route::get('/faq', function (){
        return view('public.faq');
    })->name('faq');
    Route::get('/terms-and-condition', function (){
        return view('public.terms-conditions');
    })->name('tmc');

    Route::get('/login', function (){
        return "Login";
    })->name('login');

    Route::get('/register', function (){
        return "Register";
    })->name('register');
});

Route::prefix('dashboard')->group(function (){

    Route::resource('category', categoryController::class);

    Route::get('settings', function (){
        return view('admin.settings');
    })->name('settings');

    Route::get('/', function (){
        return view('admin.home');
    })->name('dashboard');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
    Route::get('/setting', [\App\Http\Controllers\SettingController::class, 'index'])->name('setting');
    Route::post('/setting', [\App\Http\Controllers\SettingController::class, 'update'])->name('setting.update');

    Route::resource('category', categoryController::class);

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');

    Route::get('/', function (){
        return view('admin.home');
    })->name('dashboard');
    Route::get('blood-request', [\App\Http\Controllers\BloodRequestController::class, 'index'])->name('dashboard.bloodRequest');
    Route::get('blood-request/{status}', [\App\Http\Controllers\BloodRequestController::class, 'filter'])->name('dashboard.filterRequest');
    Route::get('blood-request/edit/{id}', [\App\Http\Controllers\BloodRequestController::class, 'edit'])->name('bloodRequest.edit');
    Route::post('blood-request/edit/{id}', [\App\Http\Controllers\BloodRequestController::class, 'update'])->name('bloodRequest.update');
    Route::put('blood-request/edit/{id}', [\App\Http\Controllers\BloodRequestController::class, 'clear'])->name('bloodRequest.clear');
    Route::get('blood-request/details/{id}', [\App\Http\Controllers\BloodRequestController::class, 'details'])->name('bloodRequest.details');
});

Auth::routes();
Route::get('/home', function (){
    return redirect('/');
})->name('home');

Route::prefix('user')->group(function (){
    Route::get('add', [\App\Http\Controllers\UserController::class, 'addPage'])->name('addUser');
    Route::post('add', [\App\Http\Controllers\UserController::class, 'addUser'])->name('insertUser');
    Route::get('edit/{id}', [\App\Http\Controllers\UserController::class, 'editPage'])->name('editUser');
    Route::post('edit/{id}', [\App\Http\Controllers\UserController::class, 'updateUser'])->name('updateUser');
    Route::get('delete/{id}', [\App\Http\Controllers\UserController::class, 'delete'])->name('deleteUser');

    //those url for blood donors

    Route::get('/donors', [\App\Http\Controllers\BloodDonorController::class, 'showDonors'])->name('donors');
});

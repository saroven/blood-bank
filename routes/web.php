<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\HomeController;
//Route::get('/', function () {
//        return view('index');
//    })->name('home');
Route::name('public.')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/profile', [HomeController::class, 'showProfilePage'])
        ->name('profile')->middleware(['auth']);

    Route::post('/profile', [HomeController::class, 'updateProfile'])
        ->name('profile.update')->middleware(['auth']); //update profile

    Route::get('/blood-donor', [HomeController::class,'findDonors'])->name('findDonors');
    Route::get('/blood-donor/{id}', [HomeController::class,'sendBloodRequestToDonorPage'])->name('sendBloodRequestToDonorPage')->middleware('auth');
    Route::post('/blood-donor/{id}', [HomeController::class,'sendBloodRequestToDonor'])->name('sendBloodRequestToDonor')->middleware('auth');

    Route::get('/volunteer', [HomeController::class, 'ShowVolunteer'])->name('volunteer');
    Route::post('/volunteer', [HomeController::class, 'filterVolunteer'])->name('filterVolunteer');

    Route::get('/received-blood-request', [HomeController::class, 'receivedBloodRequests'])->name('receivedBloodRequests')->middleware('auth');
    Route::get('/blood-request', [HomeController::class, 'showBloodRequest'])->name('bloodRequest');
    Route::get('/my-blood-request', [HomeController::class, 'myBloodRequests'])->name('myBloodRequests');
    Route::post('/blood-request', [HomeController::class, 'addBloodRequest'])->name('AddBloodRequest');
    Route::get('/donate-blood/{id}', [HomeController::class, 'donateBlood'])->name('donateBlood');
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
    Route::middleware(['admin'])->group(function (){
        Route::get('/setting', [\App\Http\Controllers\SettingController::class, 'index'])->name('setting');
        Route::post('/setting', [\App\Http\Controllers\SettingController::class, 'update'])->name('setting.update');

        Route::resource('category', categoryController::class);

        Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');

        Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        Route::get('blood-request', [\App\Http\Controllers\BloodRequestController::class, 'index'])->name('dashboard.bloodRequest');
        Route::get('blood-request/{status}', [\App\Http\Controllers\BloodRequestController::class, 'filter'])->name('dashboard.filterRequest');
        Route::get('blood-request/edit/{id}', [\App\Http\Controllers\BloodRequestController::class, 'edit'])->name('bloodRequest.edit');
        Route::post('blood-request/edit/{id}', [\App\Http\Controllers\BloodRequestController::class, 'update'])->name('bloodRequest.update');
        Route::put('blood-request/edit/{id}', [\App\Http\Controllers\BloodRequestController::class, 'clear'])->name('bloodRequest.clear');
        Route::get('blood-request/details/{id}', [\App\Http\Controllers\BloodRequestController::class, 'details'])->name('bloodRequest.details');
    });
});

Auth::routes();
//Route::get('/home', function (){
//    return redirect('/');
//})->name('home');

Route::prefix('user')->group(function (){
    Route::middleware(['admin'])->group(function (){
        Route::get('add', [\App\Http\Controllers\UserController::class, 'addPage'])->name('addUser');
        Route::post('add', [\App\Http\Controllers\UserController::class, 'addUser'])->name('insertUser');
        Route::get('edit/{id}', [\App\Http\Controllers\UserController::class, 'editPage'])->name('editUser');
        Route::post('edit/{id}', [\App\Http\Controllers\UserController::class, 'updateUser'])->name('updateUser');
        Route::get('delete/{id}', [\App\Http\Controllers\UserController::class, 'delete'])->name('deleteUser');
        Route::get('/donors', [\App\Http\Controllers\BloodDonorController::class, 'showDonors'])->name('donors');
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstructorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//  Login and Sign Up
Route::get('/', function () {
    return view('pages.before_authentication.sign_in_up.sign_in');
})->name('login');

Route::post('/', [LoginController::class, 'authenticate'])->name('authentication');


Route::get('/register', function () {
    return view('pages.before_authentication.sign_in_up.sign_up');
})->name('sign_up');

Route::post('/register', [RegisterController::class, 'store'])->name('registeration');


Route::get('home', function () {
    return view("pages.after_authentication.homepage.home");
})->middleware('auth')->name('home');


Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('log_out');

//-----------------------------------------//
// Search routes

Route::group(['prefix' => 'instructors', 'middleware' => ['auth']], function () {
    Route::get('/search', [InstructorController::class, 'search'])->name('instructors.search');
});

Route::group(['prefix' => 'students', 'middleware' => ['auth']], function () {
    Route::get('/search', [StudentController::class, 'search'])->name('students.search');
});

//-----------------------------------------//

// Forgotten Passwordif the user is authenticated, there is no need to send a forgotten password claim

Route::group(['middleware' => ['guest']], function () {

    Route::get('forgot-password',[ForgotPasswordController::class, 'loadEmailPage'])->name('password.request');

    Route::post('forgot-password', [ForgotPasswordController::class, 'sendLink'])->name('password.email');

    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'loadnewPasswordPage'])->name('password.reset');

    Route::post('/reset-password', [ForgotPasswordController::class, 'updatePassword'])->name('password.update');

});

//-----------------------------------------//

//Student and Instructor Table

Route::group(['prefix' => 'home', 'middleware' => ['auth']], function () {
    Route::resource('students', StudentController::class);
});

Route::group(['prefix' => 'home', 'middleware' => ['auth']], function () {
    Route::resource('instructors', InstructorController::class);
});

//-----------------------------------------//





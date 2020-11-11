<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\PhoneController;

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

// Student Phone number routes

// Load All Phone numbers in the students.edit view
Route::get('students/{student}/edit/phones', [PhoneController::class, 'index'])
    ->name('student.phone.index')
    ->middleware('auth');

Route::get('students/{student}/edit/phones/create', [PhoneController::class, 'create'])
    ->name('student.phone.create')
    ->middleware('auth');

Route::post('students/{student}/edit/phones/create', [PhoneController::class, 'store'])
    ->name('student.phone.store')
    ->middleware('auth');

// Load the edit view of the number to be edited
Route::get('students/{student}/edit/phones/{id}', [PhoneController::class, 'edit_specific'])
    ->name('student.phone.edit_specific')
    ->middleware('auth');


Route::put('students/{student}/edit/phones/{id}', [PhoneController::class, 'update'])
    ->name('student.phone.update')
    ->middleware('auth');


Route::delete('students/{student}/edit/phones/delete/{id}', [PhoneController::class, 'destroy'])
    ->name('student.phone.destroy')
    ->middleware('auth');


//-----------------------------------------//

// User Profile

Route::get('/home/profile', [\App\Http\Controllers\ProfileController::class, 'index'])
    ->name('profile.index')
    ->middleware('auth');


Route::post('/home/profile', [\App\Http\Controllers\ProfileController::class, 'store'])
    ->name('profile.store')
    ->middleware('auth');

Route::delete( 'home/profile', [\App\Http\Controllers\ProfileController::class, 'delete'])
    ->name('profile.delete')
    ->middleware('auth');

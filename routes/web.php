<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\DashController;
use App\Http\Controllers\JitsiController;
use Illuminate\Support\Facades\View;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/tables', [FormationController::class, 'enregistrerFormation'])->name('tables');

Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');

Route::get('/dashboard', [DashController::class, 'afficherdash'])
    ->middleware('auth')
    ->name('dashboard');


//meeting jitsi


// routes/web.php
// routes/web.php


// Afficher la liste des réunions
// Route::get('/meetings', [JitsiMeetingController::class, 'index'])->name('meeting.index');

// Afficher les détails d'une réunion spécifique
// Route::get('/meetings/{meeting}', [JitsiMeetingController::class, 'show'])->name('meeting.show');



// Enregistrer une nouvelle réunion
Route::post('/meetings', [JitsiController::class, 'store'])->name('meeting.store');


// Afficher le formulaire de création d'une nouvelle réunion
Route::get('/tables', [JitsiController::class, 'index'])->name('tables')->middleware('auth');
Route::get('meetings/datatables', [JitsiController::class, 'getMeetings'])->name('meeting.datatables');
// Route::get('meetings/{id}/join', [JitsiController::class, 'joinMeeting'])->name('join.meeting');
Route::get('/join-meeting/{id}', [JitsiController::class, 'joinMeeting'])->name('join.meeting');

Route::get('delete/{id}', [JitsiController::class, 'destroy'])->name('meeting.delete');
Route::get('/meetings/{meeting}/edit', [JitsiController::class, 'edit'])->name('meeting.edit');
Route::put('/meetings/{meeting}', [JitsiController::class, 'update'])->name('meeting.update');









// Route::get('/tables', 'JitsiController@tables')->name('tables');




// Afficher le formulaire de mise à jour d'une réunion
// Route::get('/meetings/{meeting}/edit', [JitsiMeetingController::class, 'edit'])->name('meeting.edit');

// Mettre à jour une réunion existante
// Route::put('/meetings/{meeting}', [JitsiMeetingController::class, 'update'])->name('meeting.update');

// Supprimer une réunion
// Route::delete('/meetings/{meeting}', [JitsiMeetingController::class, 'destroy'])->name('meeting.destroy');



// Route::get('/meetings', [MeetingController::class, 'index'])->name('meeting.index');
// Route::get('/meetings/{meeting}', [MeetingController::class, 'show'])->name('meeting.show');





// Route::get('/tables', function () {
//     return view('tables');
// })->name('tables')->middleware('auth');

Route::get('/wallet', function () {
    return view('wallet');
})->name('wallet')->middleware('auth');

Route::get('/RTL', function () {
    return view('RTL');
})->name('RTL')->middleware('auth');

Route::get('/profile', function () {
    return view('account-pages.profile');
})->name('profile')->middleware('auth');

Route::get('/signin', function () {
    return view('account-pages.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('account-pages.signup');
})->name('signup')->middleware('guest');

Route::get('/sign-up', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('sign-up');

Route::post('/sign-up', [RegisterController::class, 'store'])
    ->middleware('guest');

Route::get('/sign-in', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('sign-in');

Route::post('/sign-in', [LoginController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'store'])
    ->middleware('guest');

Route::get('/laravel-examples/user-profile', [ProfileController::class, 'index'])->name('users.profile')->middleware('auth');
Route::put('/laravel-examples/user-profile/update', [ProfileController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/laravel-examples/users-management', [UserController::class, 'index'])->name('users-management')->middleware('auth');
Route::get('/progress', 'ProgressController@index');

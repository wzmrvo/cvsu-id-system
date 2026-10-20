<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/sign-in', 'auth.demo-sign-in')->name('sign-in');
Route::redirect('/demo/sign-in', '/sign-in', 301);
Route::view('/student', 'student.dashboard')->name('student.dashboard');
Route::view('/student/application', 'student.application')->name('student.application.create');
Route::view('/track', 'tracking.show')->name('tracking.show');
Route::view('/registrar', 'registrar.dashboard')->name('registrar.dashboard');
Route::view('/administrator', 'admin.dashboard')->name('admin.dashboard');

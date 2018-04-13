<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('teacher/register', 'Auth\TeacherRegisterController@showRegisterationForm')->name('teacher.register');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('user.dashboard');
Route::prefix('teacher')->group(function(){
	Route::get('/login','Auth\TeacherLoginController@showLoginForm')->name('teacher.login');
	Route::post('/login','Auth\TeacherLoginController@login')->name('teacher.login.submit');
	Route::get('/', 'TeacherController@index')->name('teacher.dashboard');
});

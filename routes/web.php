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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('user.dashboard');
Route::post('/updatename', 'HomeController@update_name')->name('user.update.name');
Route::post('/updateemail', 'HomeController@update_email')->name('user.update.email');
Route::post('/updatemobile', 'HomeController@update_mobile')->name('user.update.mobile');
Route::post('/updateinstitute', 'HomeController@update_institute')->name('user.update.institute');
Route::post('/exam','HomeController@exam')->name('user.exam.value');
Route::get('/exam/{code}','HomeController@viewexam')->name('user.exam');
Route::post('/exam/{code}/submit','HomeController@response')->name('user.exam.submit');
Route::post('/result','HomeController@result_val')->name('user.result.value');
Route::get('/result/{code}','HomeController@result')->name('user.result');




Route::prefix('teacher')->group(function(){
	Route::get('/login','Auth\TeacherLoginController@showLoginForm')->name('teacher.login');
	Route::get('/register', 'Auth\TeacherRegisterController@showRegistrationForm')->name('teacher.register');
	Route::post('/register', 'Auth\TeacherRegisterController@store')->name('teacher.register.submit');
	Route::post('/login','Auth\TeacherLoginController@login')->name('teacher.login.submit');
	Route::post('/updatename', 'TeacherController@update_name')->name('teacher.update.name');
	Route::get('/exams', 'TeacherController@exams')->name('teacher.exams');
	Route::get('/exams/{code}/result', 'TeacherController@result')->name('teacher.exams.result');
	Route::get('/test/{test_id}','TestController@index')->name('teacher.test.view');
	Route::get('/test/{test_id}/publish','TeacherController@publish')->name('teacher.test.publish');
	Route::get('/test/{test_id}/new','TestController@question')->name('teacher.question.add');
	Route::post('/test/{test_id}/new/add','TestController@questionadd')->name('teacher.question.add.submit');
	Route::post('/updateemail', 'TeacherController@update_email')->name('teacher.update.email');
	Route::post('/addtest', 'TestController@store')->name('teacher.test.add');
	Route::post('/updatemobile', 'TeacherController@update_mobile')->name('teacher.update.mobile');
	Route::post('/updateinstitute', 'TeacherController@update_institute')->name('teacher.update.institute');
	Route::get('/', 'TeacherController@index')->name('teacher.dashboard');
});

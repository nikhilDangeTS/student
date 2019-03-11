<?php

use App\Events\SomeEvent;
use App\Http\Middleware\test;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/','StudentController@viewroot')->middleware('UserAuth');

//Route::get('/test','StudentController@viewtest');

Route::get('/registrations','StudentController@viewRegistration');
Route::post('/registrations','StudentController@registerUsers')->name('register_student');

Route::get('/login','StudentController@viewLogin');
Route::post('/login','StudentController@loginUsers')->name('login_student');

Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('/login');
});

Route::get('/view','StudentController@viewList')->middleware('UserAuth');

Route::get('/vieww','StudentController@view');

//For Ajax
Route::post('/ajax/updateDetails','StudentController@ajaxUpdate');

Route::get('/student/view/{id}','StudentController@show')->name('student_details');
Route::get('/student/edit/{id}','StudentController@updateView')->name('student_edit')->middleware('UserAuth');

Route::post('/student','StudentController@store')->name('student_store')->middleware('UserAuth');

Route::get('/student/{id}','StudentController@update')->name('student_update')->middleware('UserAuth');

Route::delete('/view/{id}', 'StudentController@destroy')->name('student_view')->middleware('UserAuth');

Route::get('event',function(){
	event(new SomeEvent('How Are You.?'));
});
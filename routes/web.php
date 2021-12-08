<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/',function(){
   return view('main');
})->name('crud.main');

Route::group(['namespace'=>'App\Http\Controllers', 'prefix'=>'staff'],function(){
    Route::get('/','StaffController@index')->name('staff.index');
    Route::get('/create','StaffController@create')->name('staff.create');
    Route::post('/store','StaffController@store')->name('staff.store');
    Route::get('/show/{id}','StaffController@show')->name('staff.show');
    Route::delete('/delete/{id}','StaffController@delete')->name('staff.delete');
    Route::get('/edit/{id}','StaffController@edit')->name('staff.edit');
    Route::post('/update/{id}','StaffController@update')->name('staff.update');

});
/**
 *
 */

Route::group(['namespace'=>'App\Http\Controllers', 'prefix'=>'student'], function (){

    Route::get('/','StudentController@index')->name('student.index');
    Route::get('/create','StudentController@create')->name('student.create');
    Route::post('/store','StudentController@store')->name('student.store');
    Route::get('/edit/{id}','StudentController@edit')->name('student.edit');
    Route::put('/update/{id}','StudentController@update')->name('student.update');
    Route::get('/show/{id}','StudentController@show')->name('student.show');
    Route::delete('/delete/{id}','StudentController@delete')->name('student.delete');



});

Route::group(['namespace'=>'App\Http\Controllers','prefix'=>'teacher'],function ()
{
    Route::get('/create','TeacherController@create')->name('teacher.create');
    Route::post('/store','TeacherController@store')->name('teacher.store');
    Route::get('/','TeacherController@index')->name('teacher.index');
    Route::delete('/delete/{id}','TeacherController@delete')->name('teacher.delete');
    Route::get('/show/{id}','TeacherController@show')->name('teacher.show');
    Route::get('/edit/{id}','TeacherController@edit')->name('teacher.edit');
    Route::patch('/update/{id}','TeacherController@update')->name('teacher.update');

});

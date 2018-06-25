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
    return view('layout.master');
});
Route::resource('/students','StudentController');
Route::get('/students-data', 'StudentController@data')->name('students.data');

Route::get('classname/{cname}','StudentController@getResult');
Route::get('gradename/{gname}','StudentController@getGrade');




<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/courses', function () {
    return view('courses.index');
});

Route::group(['prefix' => '/api'], function () {
    Route::get('/courses', 'Api\CourseController@index');
    Route::get('/courses/filters', 'Api\CourseController@filters');
});

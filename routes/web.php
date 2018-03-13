<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('start_language/{id}', 'HomeController@startLanguage')->name('start_language');
Route::get('show_lesson/{id}', 'HomeController@showLessonProgress')->name('show_lesson');
Route::get('practice_lesson/{id}', 'HomeController@practiceLesson')->name('practice_lesson');
Route::get('check_answer', 'HomeController@checkAnswer')->name('check_answer');


Route::prefix('admin')->middleware('admin')->group(function ()
{
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('add_language', 'AdminController@addNewLanguage')->name('add_language');
    Route::get('delete_language/{id}', 'AdminController@deleteLanguage')->name('delete_language');
    Route::get('show_lessons/{id}', 'AdminController@showLessons')->name('show_lessons');
    Route::get('add-new-lesson', 'AdminController@addNewLesson')->name('add-new-lesson');
    Route::get('show_lesson_details/{id}', 'AdminController@showLessonDetails')->name('show_lesson_details');
    Route::get('delete_lesson/{id}', 'AdminController@deleteLesson')->name('delete_lesson');
    Route::get('add-new-word', 'AdminController@addNewWord')->name('add-new-word');
    Route::get('delete_word/{id}', 'AdminController@deleteWord')->name('delete_word');
});




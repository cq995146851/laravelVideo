<?php

Route::group(['namespace' => 'Api'], function () {
   Route::get('tags', 'ContentController@tags')->name('api.tags');
   Route::get('lessons/{tag_id?}', 'ContentController@lessons')->name('api.lessons');
   Route::get('commend_lessons/{row?}', 'ContentController@commendLessons')->name('api.commendLessons');
   Route::get('hot_lessons/{row?}', 'ContentController@hotLessons')->name('api.hotLessons');
   Route::get('videos/{lesson_id}', 'ContentController@videos')->name('api.videos');
});
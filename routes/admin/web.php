<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //登录
   Route::get('login', 'LoginController@index')->name('admin.login');
   Route::post('login', 'LoginController@login')->name('admin.login');
   //登出
   Route::get('logout', 'LoginController@logout')->name('admin.logout');

   //内容页
   Route::group(['middleware' => 'check.admin.login'], function () {
       //首页
       Route::get('home/index', 'HomeController@index')->name('admin.home.index');
       //我的资料修改密码
       Route::get('my/resetPassword', 'MyController@index')->name('admin.my.resetPassword');
       Route::post('my/resetPassword', 'MyController@resetPassword')->name('admin.my.resetPassword');
       //标签管理'
       Route::resource('tag', 'TagController')->names([
           'index' => 'admin.tag.index',
           'create' => 'admin.tag.create',
           'store' => 'admin.tag.store',
           'edit' => 'admin.tag.edit',
           'update' => 'admin.tag.update',
           'destroy' => 'admin.tag.destroy'
       ]);
       //视频管理'
       Route::resource('lesson', 'LessonController')->names([
           'index' => 'admin.lesson.index',
           'create' => 'admin.lesson.create',
           'store' => 'admin.lesson.store',
           'edit' => 'admin.lesson.edit',
           'update' => 'admin.lesson.update',
           'destroy' => 'admin.lesson.destroy'
       ]);
       Route::post('lesson/upload', 'LessonController@upload')->name('admin.lesson.upload');

   });
});


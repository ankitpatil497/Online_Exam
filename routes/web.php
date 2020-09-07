<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin','AdminController@index')->name('admin');

Route::get('/admin/exam/category','AdminController@exam_category')->name('exam/category');

Route::post('admin/add_new_category','AdminController@store_category')->name('admin.add.Category');

Route::get('admin/delete_category/{id}','AdminController@delete_category')->name('admin.delete.category');

Route::get('admin/edit_category/{id}','AdminController@edit_category')->name('admin.edit.category');

Route::post('admin/update_category/{id}','AdminController@update_category')->name('admin.update.category');

Route::get('admin/status_category/{id}','AdminController@status_category')->name('admin.status.category');

Route::get('admin/manage_exam','AdminController@manage_exam_index')->name('admin.manage_exam');

Route::post('admin/store/exam','AdminController@store_exam')->name('admin.store.exam');

Route::get('admin/delete_exam/{id}','AdminController@delete_exam')->name('admin.delete.exam');

Route::get('admin/status_exam/{id}','AdminController@status_exam')->name('admin.status.exam');

Route::get('admin/edit/exam/{id}','AdminController@edit_exam')->name('admin.edit.exam');

Route::post('admin/update_exam/{id}','AdminController@update_exam')->name('admin.update.exam');

Route::get('admin/manage_student','AdminController@manage_student_index')->name('admin.manage.student');

Route::post('admin/store/student','AdminController@store_student')->name('admin.store.student');

Route::get('admin/delete_student/{id}','AdminController@delete_student')->name('admin.delete.student');

Route::get('admin/status_student/{id}','AdminController@status_student')->name('admin.status.student');

Route::get('admin/edit/student/{id}','AdminController@edit_student')->name('admin.edit.student');

Route::post('admin/update_student/{id}','AdminController@update_student')->name('admin.update.student');

Route::get('admin/manage_portal','AdminController@manage_portal_index')->name('admin.manage.portal');

Route::post('admin/store/portal','AdminController@store_portal')->name('admin.store.portal');

Route::get('admin/portal_student/{id}','AdminController@status_portal')->name('admin.status.student');

Route::get('admin/delete_portal/{id}','AdminController@delete_portal')->name('admin.delete.portal');

Route::get('admin/edit_portal/{id}','AdminController@edit_portal')->name('admin.edit.portal');

Route::post('admin/update_portal/{id}','AdminController@update_portal')->name('admin.update.portal');





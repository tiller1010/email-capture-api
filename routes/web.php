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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/api/email-submission/store', 'EmailSubmissionController@store');
Route::get('/email-submission-messages/{id}', 'EmailSubmissionController@show');

Route::get('/api/email-message/store', 'EmailMessageController@store');

Route::get('/emails', 'EmailSubmissionController@index');
Route::delete('/emails/{id}', 'EmailSubmissionController@destroy');
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

Route::get('/blogtest', function () {
    return view('blog');
});

Route::get('/mailchimp/webhook', 'Mailchimp\WebhookController@index');
Route::post('/mailchimp/webhook', 'Mailchimp\WebhookController@index');

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
$this->group(['middleware'=> ['auth'], 'namespace'=>'admin'] , function() {
    $this->get('admin', 'AdminController@index')->name('admin.home');

});

Route::get('/', 'Site\SiteController@index')->name('site.home');


Auth::routes();


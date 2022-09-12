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
$this->group(['middleware'=> ['auth'], 'namespace'=>'admin' , 'prefix'=>'admin'] , function() {

    $this->get('historic','BalanceController@historic')->name('admin.historic');
    $this->post('withdraw', 'BalanceController@withdrawStore')->name('balance.withdraw.store');
    $this->any('historic-search','BalanceController@searchHistoric')->name('balance.searchHistoric');


    $this->get('withdraw', 'BalanceController@withdraw')->name('balance.withdraw');

    $this->get('transfer', 'BalanceController@transfer')->name('balance.transfer');
    $this->post('confirm-transfer', 'BalanceController@confirmTransfer')->name('balance.confirm-transfer');
    $this->post('transfer', 'BalanceController@confirmTransferStore')->name('balance.confirm-transfer-store');

   

    $this->post('deposit', 'BalanceController@depositStore')->name('deposit.store');
    $this->get('deposit', 'BalanceController@deposit')->name('balance.deposit');

    $this->get('balance', 'BalanceController@index')->name('balance.index');

    $this->get('/', 'AdminController@index')->name('admin.home');

});

Route::get('/', 'Site\SiteController@index')->name('site.home');

Route::get('meu-perfil', 'Admin\UserController@profile')->name('profile')->middleware('auth');
Route::post('atualizar-perfil', 'Admin\UserController@profileUpdate')->name('profile.update')->middleware('auth');


Auth::routes();


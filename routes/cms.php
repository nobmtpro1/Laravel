<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'cms', 'namespace' => 'App\Http\Controllers\Cms'], function () {

    Route::match(['get', 'post'], '/login', 'AccountController@login')->name('cms.login')->middleware('guest');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/logout', 'AccountController@logout')->name('cms.logout');
        Route::match(['get', 'post'], '/change-password', 'AccountController@changePassword')->name('cms.change_password');

        Route::get('/', function () {
            return redirect(route('cms.match'));
        })->name('cms.dashboard');

        // match
        Route::get('/match', 'MatchController@index')->name('cms.match');
        Route::match(['get', 'post'], '/match/add', 'MatchController@add')->name('cms.match.add');
        Route::match(['get', 'post'], '/match/edit/{id}', 'MatchController@edit')->name('cms.match.edit');
        Route::post('/match/delete', 'MatchController@delete')->name('cms.match.delete');

        // bet
        Route::get('/bet', 'BetController@index')->name('cms.bet');
        Route::get('/bet/export', 'BetController@export')->name('cms.bet.export');
        Route::get('/bet/export-lucky', 'BetController@exportLucky')->name('cms.bet.export_lucky');
    });
});

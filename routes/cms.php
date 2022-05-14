<?php

use App\Http\Controllers\Cms\AccountController;
use App\Http\Controllers\Cms\BetController;
use App\Http\Controllers\Cms\DashboardController;
use App\Http\Controllers\Cms\MatchController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'cms'], function () {

    Route::match(['get', 'post'], '/login', [AccountController::class, 'login'])->name('cms.login')->middleware('guest');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/logout', [AccountController::class, 'logout'])->name('cms.logout');
        Route::match(['get', 'post'], '/change-password', [AccountController::class, 'changePassword'])->name('cms.change_password');

        Route::get('/', function () {
            return redirect(route('cms.match'));
        })->name('cms.dashboard');

        // match
        Route::get('/match', [MatchController::class, 'index'])->name('cms.match');
        Route::match(['get', 'post'], '/match/add', [MatchController::class, 'add'])->name('cms.match.add');
        Route::match(['get', 'post'], '/match/edit/{id}', [MatchController::class, 'edit'])->name('cms.match.edit');
        Route::post('/match/delete', [MatchController::class, 'delete'])->name('cms.match.delete');

        // bet
        Route::get('/bet', [BetController::class, 'index'])->name('cms.bet');
        Route::get('/bet/export', [BetController::class, 'export'])->name('cms.bet.export');
        Route::get('/bet/export-lucky', [BetController::class, 'exportLucky'])->name('cms.bet.export_lucky');
    });
});

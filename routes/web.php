<?php

use App\Http\Controllers\Admin\HomeController;
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

Route::get('/', 'HomeController@index')->name('guest.home');

Auth::routes();

// Route::get('/admin', 'HomeController@index')->name('admin');
Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')
    ->group(function() {
        Route::get('/', 'HomeController@index')->name('index');
    });
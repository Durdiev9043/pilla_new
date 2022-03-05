<?php

use App\Http\Controllers\KlasterController;

use App\Http\Controllers\FarmController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\VillageController;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\UsersController;
use \App\Http\Controllers\RegionController;

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
    return view('auth.login');
});

Route::post('login',[\App\Http\Controllers\Auth\LoginController::class,'login'])->name('login.func');
Route::post('logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
Route::get('home',function (){ return redirect()->route('logout'); });

Route::prefix('admin')->name('admin.')->middleware( 'auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('users','UsersController');
    Route::resource('klaster', 'KlasterController');
    Route::resource('region','RegionController');
    Route::resource('village','VillageController');
    Route::resource('staff','StaffController');
    Route::resource('farm','FarmController');
    Route::post('bus','HomeController@village')->name('bus');


});


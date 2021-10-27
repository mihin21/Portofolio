<?php

use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\homeSettingsController;
use App\Http\Controllers\aboutSettingsController;
use App\Http\Controllers\skillSettingsController;
use App\Http\Controllers\formationSettingsController;
use App\Http\Controllers\portfolioSettingsController;
use App\Http\Controllers\contactSettingsController;
use App\Http\Controllers\cvSettingsController;
use App\Http\Controllers\recepController;
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


Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/loginView',[AuthentificationController::class,'loginView'])->name('loginView');
Route::post('/login',[AuthentificationController::class,'login'])->name('login');
Route::get('/logout',[AuthentificationController::class,'logout'])->name('logout');
Route::resource('sendMail',recepController::class)->except(['index','create','show','destroy','edit']);

Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/index',[HomeController::class,'home'])->name('index');
    Route::resource('home_settings',homeSettingsController::class)->except(['create','show']);
    Route::resource('about_settings',aboutSettingsController::class)->except(['create','show']);
    Route::resource('skill_settings',skillSettingsController::class)->except(['create','show']);
    Route::resource('formation_settings', formationSettingsController::class)->except(['create','show']);
    Route::resource('portfolio_settings', portfolioSettingsController::class)->except(['create','show']);
    Route::resource('contact_settings', contactSettingsController::class)->except(['create','show']);
    Route::resource('cv_settings', cvSettingsController::class)->except(['create','show']);
});

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

//About the Congress
Route::prefix('about')->controller(\App\Http\Controllers\About\AboutController::class)->group(function() {
    Route::get('overview', 'overview')->name('about.overview');
    Route::get('welcome', 'welcome')->name('about.welcome');
    Route::get('society', 'society')->name('about.society');
    Route::get('committee', 'committee')->name('about.committee');
    Route::get('contact', 'contact')->name('about.contact');
});

// Program
Route::prefix('program')->controller(\App\Http\Controllers\Program\ProgramController::class)->group(function() {
    Route::get('', 'program')->name('program.program');
    Route::get('speakers', 'speakers')->name('program.speakers');
    Route::get('symposia', 'symposia')->name('program.symposia');
    Route::get('symposiaProgram', 'symposiaProgram')->name('program.symposiaProgram');
});

//Special Symposium
Route::prefix('symposium')->controller(\App\Http\Controllers\Symposium\SymposiumController::class)->group(function() {
    Route::middleware('noCash')->group(function(){
        Route::get('registration/{step}/{sid?}', 'registration')->where('step', '1|2|3')->name('apply.symposium');
        Route::post('emailCheck', 'emailCheck')->name('apply.registration.emailCheck');
        Route::post('upsert/{step}', 'upsert')->where('step', '1|2')->name('apply.symposium.upsert');
    });
});

//Registration
Route::prefix('registration')->controller(\App\Http\Controllers\Registration\RegistrationController::class)->group(function() {
    Route::get('/guide/{rgubun?}', 'guide')->name('registration.guide');  
    Route::middleware('noCash')->group(function(){
        Route::get('registration/{step}/{rgubun?}', 'registration')->where('step', '1|2|3|4')->name('apply.registration');
        Route::post('emailCheck', 'emailCheck')->name('apply.registration.emailCheck');
        Route::post('makePrice', 'makePrice')->name('apply.registration.makePrice');
        Route::post('upsert/{step}', 'upsert')->where('step', '1|2|3|4')->name('apply.registration.upsert');
        // Route::post('payRegist', 'payRegist')->name('apply.payRegist');
    });
    Route::get('search/{rgubun?}', 'search')->name('registration.search');
    Route::post('search', 'searchResult')->name('registration.searchResult');
});

//Abstract
Route::prefix('abstract')->controller(\App\Http\Controllers\AbstractManage\AbstractController::class)->group(function() {
    Route::get('/', 'guide')->name('abstract.guide');  
    Route::middleware('noCash')->group(function(){
        Route::get('registration/{step}/{sid?}', 'registration')->where('step', '1|2|3')->name('abstract.registration');
        Route::post('upsert/{step}', 'upsert')->where('step', '1|2|3')->name('abstract.registration.upsert');
    });
    Route::get('search', 'search')->name('abstract.registration.search');
    Route::post('search', 'searchResult')->name('abstract.registration.searchResult');
    Route::get('delete/{sid}', 'delete')->name('abstract.delete');
    Route::get('preview/{sid}', 'preview')->name('abstract.preview');
    Route::get('/awards', 'awards')->name('abstract.awards');  
});

//Notice
Route::prefix('board/{code}')->middleware('boardCheck')->controller(\App\Http\Controllers\Board\BoardController::class)->group(function() {
    Route::get('', 'list')->name('board.list');
    Route::get('calendar', 'calendar')->name('board.calendar');
    Route::get('form/{sid?}', 'form')->name('board.form');     
    Route::post('upsert/{sid?}', 'upsert')->name('board.upsert');
    Route::get('view/{sid}', 'view')->name('board.view');
    Route::get('delete/{sid}', 'delete')->name('board.delete');
    Route::post('dbChange', 'dbChange')->name('board.dbChange');
    Route::post('preview', 'popupPreview')->name('board.popupPreview');
});

//Sponsor
Route::prefix('sponsor')->controller(\App\Http\Controllers\Sponsor\SponsorController::class)->group(function() {
    Route::get('info', 'info')->name('sponsor.info');
    Route::get('ship', 'ship')->name('sponsor.ship');
});

//Location
Route::prefix('location')->controller(\App\Http\Controllers\Location\LocationController::class)->group(function() {
    Route::get('venue', 'venue')->name('location.venue');
    Route::get('map', 'map')->name('location.map');
    Route::get('accommodation', 'accommodation')->name('location.accommodation');
    Route::get('restaurant', 'restaurant')->name('location.restaurant');
});

//Tour
Route::prefix('tour')->controller(\App\Http\Controllers\Tour\TourController::class)->group(function() {
    Route::get('/', 'trip')->name('tour.trip');
    Route::get('dailyProgram', 'dailyProgram')->name('tour.dailyProgram');
});

require __DIR__.'/common.php';
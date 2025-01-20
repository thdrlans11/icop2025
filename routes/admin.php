<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function(){    

    //사전등록
    Route::prefix('registration')->controller(\App\Http\Controllers\Admin\Registration\RegistrationController::class)->group(function() {            
        Route::get('/', 'list')->name('admin.registration.list');
        Route::get('/modify/{sid}', 'modifyForm')->name('admin.registration.modifyForm');
        Route::post('/modify/{sid}', 'modify')->name('admin.registration.modify');
        Route::get('/sendMail/{sid}', 'sendMailForm')->name('admin.registration.sendMailForm');
        Route::post('/sendMail/{sid}', 'sendMail')->name('admin.registration.sendMail');
        Route::get('/excel', 'excel')->name('admin.registration.excel');
        Route::post('/dbChange', 'dbChange')->name('admin.registration.dbChange');
        Route::get('/memo/{sid}', 'memoForm')->name('admin.registration.memoForm');
        Route::post('/memo/{sid}', 'memo')->name('admin.registration.memo');
    });

    //사전등록
    Route::prefix('abstract')->controller(\App\Http\Controllers\Admin\AbstractManage\AbstractController::class)->group(function() {            
        Route::get('/', 'list')->name('admin.abstract.list');
        // Route::get('/modify/{sid}', 'modifyForm')->name('admin.registration.modifyForm');
        // Route::post('/modify/{sid}', 'modify')->name('admin.registration.modify');
        // Route::get('/sendMail/{sid}', 'sendMailForm')->name('admin.registration.sendMailForm');
        // Route::post('/sendMail/{sid}', 'sendMail')->name('admin.registration.sendMail');
        Route::get('/excel', 'excel')->name('admin.abstract.excel');
        Route::post('/dbChange', 'dbChange')->name('admin.abstract.dbChange');
        Route::get('/memo/{sid}', 'memoForm')->name('admin.abstract.memoForm');
        Route::post('/memo/{sid}', 'memo')->name('admin.abstract.memo');
    });

    //Special Symposium
    Route::prefix('symposium')->controller(\App\Http\Controllers\Admin\Symposium\SymposiumController::class)->group(function() {
        Route::get('/', 'list')->name('admin.symposium.list');
        Route::get('/modify/{sid}', 'modifyForm')->name('admin.symposium.modifyForm');
        Route::post('/modify/{sid}', 'modify')->name('admin.symposium.modify');
        Route::get('/sendMail/{sid}', 'sendMailForm')->name('admin.symposium.sendMailForm');
        Route::post('/sendMail/{sid}', 'sendMail')->name('admin.symposium.sendMail');
        Route::get('/excel', 'excel')->name('admin.symposium.excel');
        Route::get('/word', 'word')->name('admin.symposium.word');
        Route::post('/dbChange', 'dbChange')->name('admin.symposium.dbChange');
        Route::get('/memo/{sid}', 'memoForm')->name('admin.symposium.memoForm');
        Route::post('/memo/{sid}', 'memo')->name('admin.symposium.memo');
    });

});

require __DIR__.'/common.php';
?>
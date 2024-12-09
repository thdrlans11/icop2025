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
    });

    //Special Symposium
    Route::prefix('symposium')->controller(\App\Http\Controllers\Admin\Symposium\SymposiumController::class)->group(function() {
        Route::get('/', 'list')->name('admin.symposium.list');

        Route::get('/modify/{sid}', 'modifyForm')->name('admin.symposium.modifyForm');
        Route::post('/modify/{sid}', 'modify')->name('admin.symposium.modify');
        Route::get('/sendMail/{sid}', 'sendMailForm')->name('admin.symposium.sendMailForm');
        Route::post('/sendMail/{sid}', 'sendMail')->name('admin.symposium.sendMail');

        Route::get('/excel', 'excel')->name('admin.symposium.excel');
        Route::post('/dbChange', 'dbChange')->name('admin.symposium.dbChange');
    });

});

require __DIR__.'/common.php';
?>
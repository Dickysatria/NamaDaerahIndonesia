<?php

use App\Http\Controllers\BackupController;
use App\Http\Controllers\Home;

Route::redirect('/', 'auth/login');

Route::middleware(['auth', 'verified'])
    ->group(
        function () {
            Route::get('/home', Home::class)->name('home');
        }
    );

include __DIR__.'/auth.php';
include __DIR__.'/my.php';



Route::middleware(['auth'])
    ->group(
        function () {
            Route::prefix('daerah')->group(function () {
            Route::resource('provinsi', ProvinsiController::class)->except('index');
            Route::resource('kabupaten', KabupatenController::class)->except('index');
            Route::resource('kecamatan', KecamatanController::class)->except('index');
            Route::resource('desa', DesaController::class)->except('index');
        });

        Route::prefix('backup')->gorup(function(){
            Route::get('/', BackupController::class, 'index');
            Route::get('/create', BackupController::class, 'create');
            Route::get('/download/{file_name}', BackupController::class, 'download');
            Route::get('/delete/{file_name}', BackupController::class, 'delete');
        });
        }
    );

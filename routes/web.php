<?php

use App\Http\Controllers\BackupController;
use App\Http\Controllers\Home;


Route::get('/', Home::class)->name('index');
Route::get('/biografi');


Route::middleware(['auth'])
    ->group(
        function () {
            Route::prefix('daerah')->group(function () {
            Route::resource('provinsi', ProvinsiController::class)->except('index');
            Route::resource('kabupaten', KabupatenController::class)->except('index');
            Route::resource('kecamatan', KecamatanController::class)->except('index');
            Route::resource('desa', DesaController::class)->except('index');
        });

        Route::prefix('backup')->group(function(){
            Route::get('/', [\App\Http\Controllers\BackupController::class, 'index']);
            Route::get('create', [\App\Http\Controllers\BackupController::class, 'create']);
            Route::get('download/{file_name}', [\App\Http\Controllers\BackupController::class, 'download']);
            Route::get('delete/{file_name}', [\App\Http\Controllers\BackupController::class, 'delete']);
        });
        }
    );



    include __DIR__.'/auth.php';
    include __DIR__.'/my.php';


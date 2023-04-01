<?php

use App\Http\Controllers\ModelController;
use Illuminate\Support\Facades\Route;

Route::controller(ModelController::class)->prefix('admin/')->as('admin.')->group(function () {
    Route::get('model','index');
    Route::post('/add-model','addModel')->name('addModel');
    Route::post('/edit-model','editModelno')->name('editModelno');
    Route::put('/update-model','updateModelno')->name('updateModelno');



    Route::delete('delete-model','deleteModels')->name('deleteModels');

});

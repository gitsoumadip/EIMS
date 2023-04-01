<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::controller(ItemController::class)->prefix('admin/')->as('admin.')->group(function(){

    Route::get('item','index');
    Route::post('add-item','addItem')->name('addItem');
    Route::post('/edit-item','editItem')->name('editItem');
    Route::post('/update-item','updateItem')->name('updateItem');
    Route::delete('/delete-item','deleteItem')->name('deleteItem');
});

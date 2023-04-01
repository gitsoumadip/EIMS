<?php

use App\Http\Controllers\StoreController;
use App\Models\StoreMaster;
use Illuminate\Support\Facades\Route;

Route::controller(StoreController::class)->prefix('admin/')->as('admin.')->group(function(){
    Route::get('store','index');
    Route::post('add-store', 'addStore')->name('addStores');
    Route::post('edit-store','editStore')->name('editStore');
    Route::patch('update-store','updateStore')->name('updateStore');
    Route::delete('delete-store','deleteStore')->name('deleteStore');

});

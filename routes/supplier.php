
<?php

use App\Http\Controllers\SupplerController;
use Illuminate\Support\Facades\Route;


Route::controller(SupplerController::class)->prefix('admin/')->as('admin.')->group(function () {

    Route::get('supplier', 'index');
    Route::post('add-supplier', 'addSupplier')->name('addSupplier');
    Route::post('edit-supplier', 'editSupplier')->name('editSupplier');
    Route::post('update-supplier', 'updateSupplier')->name('updateSupplier');
    Route::delete('delete-supplier', 'deleteSupplier')->name('deleteSupplier');
});

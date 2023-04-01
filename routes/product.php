<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;



Route::controller(ProductController::class)->prefix('admin/')->as('admin.')->group(function () {
    Route::get('product',  'index');
    Route::post('add-product',  'addProduct')->name('addProduct');
    Route::post('edit-product',  'editProduct')->name('editProduct');
    Route::post('update-product', 'updateProduct')->name('updateProduct');
    Route::delete('delete-product', 'deleteProduct')->name('deleteProduct');
});

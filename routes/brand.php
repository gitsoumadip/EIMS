<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;

// Route::get('brand',  'index');
// Route::post('add-brand',  'addBrand')->name('addBrand');
// Route::put('edit-brand',  'editBrand')->name('editBrand');
// Route::delete('delete-brand',  'deleteBrand')->name('deleteBrand');

Route::controller(BrandController::class)->prefix('admin/')->as('admin.')->group(function () {
    Route::get('brand', 'index')->name('brand');
    Route::post('add-brand', 'addBrand')->name('addBrand');
    Route::put('edit-brand', 'editBrand')->name('editBrand');
    Route::delete('delete-brand', 'deleteBrand')->name('deleteBrand');
});

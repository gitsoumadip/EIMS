<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;




Route::controller(CategoryController::class)->prefix('admin/')->as('admin.')->group(function(){
    Route::get('category', 'index');
    Route::post('add-category', 'addCategory')->name('addCategory');
    Route::put('edit-category', 'editCategory')->name('editCategory');
    Route::delete('delete-category', 'deleteCategory')->name('deleteCategory');
});

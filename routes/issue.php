<?php

use App\Http\Controllers\Admin\IssueController;
use Illuminate\Support\Facades\Route;

Route::controller(IssueController::class)->prefix('admin/')->as('admin.')->group(function(){
    // Route::get('admin/issues','AddIssue')->name('AddIssue');
    Route::get('issue','index');
    Route::post('events-order', 'eventOredr')->name('eventOredrs');
    Route::post('category', 'category')->name('category');
    Route::post('brand', 'brandId')->name('brandId');
    Route::post('model', 'modelId')->name('modelId');
    Route::post('product-serial-number', 'productId')->name('productId');

});

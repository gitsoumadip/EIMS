<?php

use App\Http\Controllers\AppoinmentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('blank');
});


Route::controller(AppoinmentController::class)->prefix('admin/')->as('admin.')->group(function(){
    Route::get('appoinment', 'index');
    Route::post('/add-appoinment','addAppoinment')->name('addAppoinment');
    Route::post('edit-appoinment','editappoinment')->name('editappoinment');
    Route::post('update-appoinment','updateAppoinment')->name('updateAppoinment');
    Route::delete('delete-appoinment','deletAppoinment')->name('deletAppoinment');

});

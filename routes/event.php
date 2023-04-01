<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::controller(EventController::class)->prefix('admin/')->as('admin.')->group(function () {
    Route::get('event','index');
    Route::post('/add-event','addEvent')->name('addEvent');
    Route::post('/edit-event','editEvent')->name('editEvent');
    Route::get('/update-event','updateEvent')->name('updateEvent');
    Route::delete('/delete-event','deleteEvent')->name('deleteEvent');



});

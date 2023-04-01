<?php

use App\Http\Controllers\StockeController;
use Illuminate\Support\Facades\Route;

Route::controller(StockeController::class)->prefix('admin/')->as('admin.')->group(function () {
Route::get('stock','index');
});

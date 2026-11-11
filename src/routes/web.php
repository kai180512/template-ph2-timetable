<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimetableController;

Route::get('/', function () {
    return view('welcome');
});

ROUTE::get('/timetable',[
 TimetableController::class, 'index'
 ]);

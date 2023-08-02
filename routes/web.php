<?php

use App\Http\Controllers\TopController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [TopController::class, "index"])->name("top.index");

Route::get("/instrument/{id}", [DetailController::class, "index"])->name("instrument.detail");
<?php

use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\AdminComtroller;
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

// admin認証機能用のルーティング
Auth::routes();

// ログイン認証
Route::middleware("auth")->group(function () {
    // 管理画面トップページ
    Route::get("/admin", [AdminComtroller::class, "index"])->name("admin");

    // 楽器一覧ページ
    Route::get("/admin/instruments", [InstrumentController::class, "index"])->name("admin.instruments.index");
    // 楽器作成ページ
    Route::get("/admin/instruments/create", [InstrumentController::class, "create"])->name("admin.instruments.create");
    // 楽器作成機能
    Route::post("/admin/instruments", [InstrumentController::class, "store"])->name("admin.instruments.store");
    // 楽器更新ページ  
    Route::get("/admin/instruments/{id}/edit", [InstrumentController::class, "edit"])->name("admin.instruments.edit");
    // 楽器更新機能
    Route::patch("/admin/instruments/{id}", [InstrumentController::class, "update"])->name("admin.instruments.update");
    // 楽器削除機能
    Route::delete("/admin/instruments/{id}", [InstrumentController::class, "destroy"])->name("admin.instruments.destroy");

    // アクセサリー一覧ページ
    Route::get("/admin/accessories", [AccessoryController::class, "index"])->name("admin.accessories.index");
    // アクセサリー作成ページ
    Route::get("/admin/accessories/create", [AccessoryController::class, "create"])->name("admin.accessories.create");
    // アクセサリー作成機能
    Route::post("/admin/accessories", [AccessoryController::class, "store"])->name("admin.accessories.store");
    // アクセサリー更新ページ
    Route::get("/admin/accessories/{id}/edit", [AccessoryController::class, "edit"])->name("admin.accessories.edit");
    // アクセサリー更新機能
    Route::patch("/admin/accessories/{id}", [AccessoryController::class, "update"])->name("admin.accessories.update");
    // アクセサリー削除機能
    Route::delete("/admin/accessories/{id}", [AccessoryController::class, "destroy"])->name("admin.accessories.destroy");

    // カテゴリ一覧ページ
    Route::get("/admin/categories", [CategoryController::class, "index"])->name("admin.categories.index");
    // カテゴリ作成ページ
    Route::get("/admin/categories/create", [CategoryController::class, "create"])->name("admin.categories.create");
    // カテゴリ作成機能
    Route::post("/admin/categories", [CategoryController::class, "store"])->name("admin.categories.store");
    // カテゴリ更新ページ
    Route::get("/admin/categories/{id}/edit", [CategoryController::class, "edit"])->name("admin.categories.edit");
    // カテゴリ更新機能
    Route::patch("/admin/categories/{id}", [CategoryController::class, "update"])->name("admin.categories.update");
    // カテゴリ削除機能
    Route::delete("/admin/categories/{id}", [CategoryController::class, "destroy"])->name("admin.categories.destroy");
});



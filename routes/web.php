<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ManageWherehouseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
Route::resource('wherehouses', App\Http\Controllers\WherehouseController::class);

Route::resource('products', App\Http\Controllers\productController::class);

Route::get('/manage-wherehouse', [ManageWherehouseController::class, 'index'])->name('manageWherehouse.index');
Route::get('/manage-wherehouse/create-new-product', [ManageWherehouseController::class, 'createNewProduct'])->name('manageWherehouse.createNewProduct');
Route::post('/manage-wherehouse/store-new-product', [ManageWherehouseController::class, 'storeNewProduct'])->name('manageWherehouse.storeNewProduct');
Route::post('/manage-wherehouse/getProduct', [ManageWherehouseController::class, 'getProduct'])->name('manageWherehouse.getProduct');
Route::get('/manage-wherehouse/listLog', [ManageWherehouseController::class, 'listLog'])->name('manageWherehouse.listLogs');
});
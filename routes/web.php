<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BebidasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::post('/bebida/create',         [BebidasController::class, 'create'])->name('bebidas.store');
Route::post('/bebida/delete/{id}',    [BebidasController::class, 'delete'])->name('bebidas.destroy');
Route::get('/bebida/edit/{id}',       [BebidasController::class, 'view_edit'])->name('bebidas.edit');
Route::post('/bebida/update/{id}',         [BebidasController::class, 'update'])->name('bebidas.update');
Route::get('/bebida/view',            [BebidasController::class, 'view'])->name('bebidas.list');

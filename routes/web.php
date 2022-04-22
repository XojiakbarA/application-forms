<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {

    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::post('applications/create', [ApplicationController::class, 'create'])->middleware(['can_send'])->name('apps.create');

});

Route::middleware(['auth', 'is_admin'])->group(function () {

    Route::put('applications/{application}/update', [ApplicationController::class, 'update'])->name('apps.update');
    Route::get('manager', [ApplicationController::class, 'index'])->name('manager');

});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstagramUserController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('admin')->name('admin.')->prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('admin');
    })->name('dashboard');

    Route::prefix('/instagram')->name('instagram.')->group(function () {
        Route::get('/', [InstagramUserController::class, 'index'])->name('index');
        Route::get('/create', [InstagramUserController::class, 'create'])->name('create');
        Route::post('/', [InstagramUserController::class, 'store'])->name('store');
        Route::get('/{id}', [InstagramUserController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [InstagramUserController::class, 'edit'])->name('edit');
        Route::put('/{id}', [InstagramUserController::class, 'update'])->name('update');
        Route::delete('/{id}', [InstagramUserController::class, 'destroy'])->name('destroy');
    });
    
    

});


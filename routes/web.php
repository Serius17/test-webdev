<?php

use App\Http\Controllers\DepartementController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('departement')->group(function () {
    Route::get('/', [DepartementController::class, 'index'])->name('departement.index');
    Route::get('/create', [DepartementController::class, 'create'])->name('departement.create');
    Route::post('', [DepartementController::class, 'store'])->name('departement.store');
    Route::get('/{departement}/edit', [DepartementController::class, 'edit'])->name('departement.edit');
    Route::put('/{departement}', [DepartementController::class, 'update'])->name('departement.update');
    Route::delete('/{departement}/delete', [DepartementController::class, 'destroy'])->name('departement.destroy');
    Route::get('/{departement}/detail', [DepartementController::class, 'show'])->name('departement.show');
})->middleware('auth.check');

Route::prefix('project')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/{project}/delete', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::get('/{project}/detail', [ProjectController::class, 'show'])->name('project.show');
})->middleware('auth.check');

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/{user}/detail', [UserController::class, 'show'])->name('user.show');
})->middleware('auth.check');

Route::get('/create', [UserController::class, 'create'])->name('user.create');
Route::post('', [UserController::class, 'store'])->name('user.store');
Route::get('login', [UserController::class, 'viewLogin'])->name('viewLogin');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::view('/kalkulator', 'kalkulator');

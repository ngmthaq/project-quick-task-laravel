<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/langs/{lang}', [LanguageController::class, 'changeLanguage'])->name('langs.change');

// Resource route
Route::resource('tasks', TaskController::class)->middleware(['auth', 'auth.admin']);

// Basic route
Route::name('users.')->prefix('users')->middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('', [UserController::class, 'index'])->name('index');
    Route::post('', [UserController::class, 'store'])->name('store');
    Route::get('create', [UserController::class, 'create'])->name('create');
    Route::get('{user}', [UserController::class, 'show'])->name('show');
    Route::put('{user}', [UserController::class, 'update'])->name('update');
    Route::delete('{user}', [UserController::class, 'destroy'])->name('destroy');
    Route::get('{user}/edit', [UserController::class, 'edit'])->name('edit');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

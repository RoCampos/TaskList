<?php

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
});

//ainda vai ser criado`
Route::get('/dashboard', [\App\Http\Controllers\TaskController::class, 'index'])
    ->name('home');

Route::get('/task/create', [\App\Http\Controllers\TaskController::class, 'create'])
    ->name('task.create');

Route::post('/task/create', [\App\Http\Controllers\TaskController::class, 'store'])
    ->name('task.store');

Route::post('/task/update/{task}', [\App\Http\Controllers\TaskController::class, 'update'])
    ->name('task.update');

Route::post('/task/clone/{task}', [\App\Http\Controllers\TaskController::class, 'clone'])
    ->name('task.clone');

//rotas autenticação
require __DIR__.'/auth.php';



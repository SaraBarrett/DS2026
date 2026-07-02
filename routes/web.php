<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UtilController::class, 'home'])->name('homepage');

Route::get('/hello', [UtilController::class, 'hello'])->name('hello');

Route::get('/curso/{nome}',[UtilController::class, 'cursos'])->name('curso.view');


//users
Route::get('/add-user',[UserController::class, 'addUser'] )->name('users.add');

Route::get('/users',[UserController::class, 'allUsers'] )->name('users.all');

//abrir a ficha do user
Route::get('/show-user/{id}',[UserController::class, 'showUser'])->name('users.show');


//rota de apagar
Route::get('/delete-user/{id}',[UserController::class, 'deleteUser'])->name('users.delete');


//tasks
Route::get('/tasks',[TaskController::class, 'allTasks'] )->name('tasks.all');


//rota de tratamento de erros, caso entre numa rota não existente
Route::fallback([UtilController::class, 'fallback']);


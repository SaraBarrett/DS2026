<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;


Route::get('/welcome', function(){
    return view('welcome');
});

Route::get('/', [UtilController::class, 'home'])->name('homepage');

Route::get('/hello', [UtilController::class, 'hello'])->name('hello');

Route::get('/curso/{nome}',[UtilController::class, 'cursos'])->name('curso.view');


//users
Route::get('/add-user',[UserController::class, 'addUser'] )->name('users.add');

Route::get('/users',[UserController::class, 'allUsers'] )->name('users.all');

//abrir a ficha do user
Route::get('/show-user/{id}',[UserController::class, 'showUser'])->name('users.show');

//rota de armazenar user
Route::post('/store-user', [UserController::class, 'storeUser'])->name('users.store');


//rota de apagar
Route::get('/delete-user/{id}',[UserController::class, 'deleteUser'])->name('users.delete');


Route::put('/update-user', [UserController::class, 'updateUser'])->name('users.update');

//tasks
Route::get('/tasks',[TaskController::class, 'allTasks'] )->name('tasks.all');


//abrir a ficha do user
Route::get('/show-task/{id}',[TaskController::class, 'showTask'])->name('tasks.show');


//rota de apagar
Route::get('/delete-task/{id}',[TaskController::class, 'deleteTask'])->name('tasks.delete');


Route::get('/add-task',[TaskController::class, 'addTask'] )->name('tasks.add');


Route::post('/store-task',[TaskController::class, 'storeTask'] )->name('tasks.store');
Route::put('/update-task', [TaskController::class, 'updateTask'])->name('tasks.update');

//rota de tratamento de erros, caso entre numa rota não existente
Route::fallback([UtilController::class, 'fallback']);


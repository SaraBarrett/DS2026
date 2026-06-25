<?php

use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UtilController::class, 'home'])->name('homepage');

Route::get('/hello', function () {
    return view('hello');
})->name('hello');

Route::get('/curso/{nome}', function ($nome) {
    return view('cursos.showcurso');
})->name('curso.view');


//users
Route::get('/add-user', function () {
    return view('users.addUser');
})->name('users.add');


//rota de tratamento de erros, caso entre numa rota não existente
Route::fallback(function(){
    return view('fallback');
});


<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/hello', function () {
    return view('hello');
})->name('hello');

Route::get('/curso/{nome}', function ($nome) {
    return view('cursos.showcurso');
})->name('curso.view');




//rota de tratamento de erros, caso entre numa rota não existente
Route::fallback(function(){
    return '<p>Está perdido? Não se preocupe que estamos aqui!</p>';
});


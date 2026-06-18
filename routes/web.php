<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/hello', function () {
    return '<h5>Olá mundo!</h5>';
})->name('hello');

Route::get('/curso/{nome}', function ($nome) {
    return "<h5>Curso : $nome</h5>";
});




//rota de tratamento de erros, caso entre numa rota não existente
Route::fallback(function(){
    return '<p>Está perdido? Não se preocupe que estamos aqui!</p>';
});


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function home() {

    //aqui podemos declarar código php (código de servidor)
    //no futuro, o código do nome é carregado de um select à nossa base de users
    $myName = 'Sara';
    $alunos = ['Daniel', 'Sofia', 'Raquel', 'Filipe', 'Francisco', 'Guilherme'];


    return view('homepage', compact('myName', 'alunos'));
}

public function hello () {
    return view('hello');
}

public function cursos ($nome) {
    return view('cursos.showcurso');
}

public function fallback(){
    return view('fallback');
}
}

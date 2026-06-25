@extends('layouts.fo')
@section('content')
    @php
        //aqui podemos declarar código php (código de servidor)
        //no futuro, o código do nome é carregado de um select à nossa base de users
        $myName = 'Sara';
        $alunos = ['Daniel', 'Sofia', 'Raquel', 'Filipe', 'Francisco', 'Guilherme'];

    @endphp


    <img src="{{ asset('images/cultural.jpg') }}">

    <h3>As minhas funcionalidades</h3>

    @if ($myName)
        <h6>Olá {{ $myName }}</h6>
    @endif

    <ul>
        @foreach ($alunos as $element)
            <li>{{ $element }}</li>
        @endforeach
    </ul>


    <ul>
        <li><a href="{{ route('hello') }}">Página Hello</a></li>
        <li><a href="{{ route('homepage') }}">Página Homepage</a></li>
        <li><a href="{{ route('curso.view', 'DS') }}">Página Curso</a></li>
        <li><a href="{{ route('users.add') }}">Adcionar user</a></li>
    </ul>
@endsection

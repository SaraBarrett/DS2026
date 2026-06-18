@extends('layouts.fo')

@section('content')
    <img src="{{ asset('images/cultural.jpg') }}">

    <h3>As minhas funcionalidades</h3>
    <ul>
        <li><a href="{{ route('hello') }}">Página Hello</a></li>
        <li><a href="{{ route('homepage') }}">Página Homepage</a></li>
        <li><a href="{{ route('curso.view', 'DS') }}">Página Curso</a></li>
        <li><a href="{{ route('users.add') }}">Adcionar user</a></li>
    </ul>
@endsection



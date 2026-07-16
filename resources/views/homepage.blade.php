@extends('layouts.fo')
@section('content')
    <img src="{{ asset('images/cultural.jpg') }}">

    <h3>As minhas funcionalidades</h3>

    @auth
        <h6>Olá {{ Auth::user()->name }} e o teu email é {{ Auth::user()->email }} </h6>
    @endauth



    <p>Nome: {{ $istec_info['name'] }}</p>
    <p>Morada: {{ $istec_info['address'] }}</p>
    <p>Email: {{ $istec_info['email'] }}</p>

    <ul>
        @foreach ($alunos as $element)
            <li>{{ $element }}</li>
        @endforeach
    </ul>


    <ul>
        <li><a href="{{ route('hello') }}">Página Hello</a></li>
        <li><a href="{{ route('homepage') }}">Página Homepage</a></li>
        <li><a href="{{ route('curso.view', 'DS') }}">Página Curso</a></li>
        <li><a href="{{ route('users.add') }}">Adicionar user</a></li>
        @auth
            @if (Auth::user()->email == 'admin@gmail.com')
                <li><a href="{{ route('users.all') }}">Todos os users</a></li>
            @endif
        @endauth

    </ul>
@endsection

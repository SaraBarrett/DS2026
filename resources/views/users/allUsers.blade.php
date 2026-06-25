@extends('layouts.fo')
@section('content')
    <h5>Aqui vais ter users</h5>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user['id'] }} : {{ $user['name'] }} - {{ $user['phone'] }}</li>
        @endforeach
    </ul>

    <h5>Users vindos da base de dados</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Morada</th>
                <th scope="col">Nif</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersFromDb as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->nif}}</td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection

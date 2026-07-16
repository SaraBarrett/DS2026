@extends('layouts.fo')
@section('content')
    <h5>Aqui vais ter users</h5>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user['id'] }} : {{ $user['name'] }} - {{ $user['phone'] }}</li>
        @endforeach
    </ul>

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}
        </div>
    @endif

    <form action="" method="get">
        <input type="text" name="search">
        <button type="submit" class="btn btn-info">Procurar</button>

    </form>


    <h5>Users vindos da base de dados</h5>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Morada</th>
                <th scope="col">Nif</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersFromDb as $user)
                <tr>
                    <td><img width="40px" height="40px"
                            src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/nophoto.jpg') }}"
                            alt=""></td>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->nif }}</td>
                    <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection

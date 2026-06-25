@extends('layouts.fo')
@section('content')
    <h5>Aqui vais ter users</h5>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user['id'] }} : {{ $user['name'] }} - {{ $user['phone'] }}</li>
        @endforeach
    </ul>
@endsection

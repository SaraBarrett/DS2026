@extends('layouts.fo')

@section('content')
    <h4>Aqui tens a ficha de user</h4>

    <p>{{ $user->name }}</p>
    <p>{{ $user->email }}</p>
    <p>{{ $user->address }}</p>
    <p>{{ $user->nif }}</p>
@endsection

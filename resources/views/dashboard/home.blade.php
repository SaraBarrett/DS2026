@extends('layouts.fo')
@section('content')

    <h5>Olá {{ Auth::user()->name }}</h5>

    @if (Auth::user()->user_type == \App\Models\User::USER_ADMIN)
    <p>és admin</p>

    @endif

@endsection

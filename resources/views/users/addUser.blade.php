@extends('layouts.fo')
@section('content')
    <h5>Aqui vais poder adicionar users</h5>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required name="name" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        @error('name')
            <p>Nome inválido. Pf verifique</p>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Campo Email</label>
            <input required name="email" type="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
            <p>email inválido. Pf verifique</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input required name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        @error('password')
            <p>password inválida. Pf verifique</p>
        @enderror
        <button type="submit" class="btn btn-primary">Registar</button>
    </form>
@endsection

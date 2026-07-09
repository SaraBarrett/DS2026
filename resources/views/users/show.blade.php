@extends('layouts.fo')

@section('content')
    <h4>Aqui tens a ficha de user</h4>

    <form method="POST" action="{{ route('users.update') }}">
        @method('PUT')
        @csrf
        <input type="hidden" value="{{ $user->id }}" name="id">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input value="{{ $user->name }}" required name="name" type="text" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('name')
            <p>Nome inválido. Pf verifique</p>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Campo Email</label>
            <input value="{{ $user->email }}" disabled name="email" type="email" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
            <p>email inválido. Pf verifique</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Morada</label>
            <input value="{{ $user->address }}"  name="address" type="text" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nif</label>
            <input value="{{ $user->nif }}"  name="nif" type="text" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar
    </form>
@endsection

@extends('layouts.fo')
@section('content')
    <section class="container page-wrap">
        <div class="page-heading">
            <a class="back-link" href="{{ route('homepage') }}" aria-label="Voltar">&larr;</a>
            <h1>Adicionar Task</h1>
        </div>

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome</label>
                <input required name="name" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            @error('name')
                <p>Nome Inválido. Por favor verifique</p>
            @enderror
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descrição</label>
                <input required name="description" type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            @error('description')
                <p>Descrição Inválida. Por favor verifique</p>
            @enderror
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select required name="user_id" class="form-control">
                    <option value="">Selecione um user</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('user_id')
                <p>User Inválido. Por favor verifique</p>
            @enderror
            <button type="submit" class="btn btn-primary">Registar</button>
        </form>
    </section>
@endsection

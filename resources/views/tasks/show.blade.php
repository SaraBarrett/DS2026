@extends('layouts.fo')

@section('content')
    <h5>Dados da tarefa</h5>

    <form method="POST" action="{{ route('tasks.update') }}">
        @method('PUT')
        @csrf

        <input type="hidden" name="id" value="{{ $task->id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required value="{{ $task->name }}" name="name" type="text" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('name')
            <p>Nome Inválido. Por favor verifique</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descrição</label>
            <input required value="{{ $task->description }}" name="description" type="text" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('description')
            <p>Descrição Inválida. Por favor verifique</p>
        @enderror
        <label for="">Status</label>
        <input type="checkbox" {{ $task->status == 1 ? 'checked' : '' }} name="status" id="">
        <div class="mb-3">
            <label>Data de Fim</label>
            <input type="datetime-local" name="due_date" class="form-control" value="{{ $task->due_at }}" >
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select required name="user_id" class="form-control">
                <option value="">Selecione um user</option>
                @foreach ($users as $user)
                <option {{$user->id == $task->user_id? 'selected' : '' }}  value="{{ $user->id }}">
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
@endsection

@extends('layouts.fo')
@section('content')
    <h4>Aqui vamos carregar as tarefas da BD</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">User</th>
                <th>acções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->username }}</td>
                    <td><a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection

@extends('layouts.fo')

@section('content')
<h5>Dados da tarefa</h5>

<p>{{$task->name}}</p>
<p>{{$task->description}}</p>
<p>{{$task->status}}</p>
<p>{{$task->due_at}}</p>
<p>{{$task->username}}</p>
@endsection

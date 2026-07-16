<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function allTasks(){

        $tasks = DB::table('tasks')
        ->join('users', 'tasks.user_id', 'users.id')
        ->select('tasks.*', 'users.name as username')
        ->get();

        return view('tasks.all_tasks', compact('tasks'));
    }

    public function showTask($id){

    $users = db::table('users')->get();

    //ir à base de dados carregar toda a linha do user onde estou a clicar
        $task = db::table('tasks')
       ->join('users', 'tasks.user_id', 'users.id')
        ->select('tasks.*', 'users.name as username')
        ->where('tasks.id', $id)
        ->first();


        return view('tasks.show', compact('task', 'users'));
    }

    public function deleteTask($id){
        DB::table('tasks')
        ->where('id', $id)
        ->delete();


        return back();
    }

    public function addTask(){

        $users = db::table('users')->get();

        return view('tasks.create', compact('users'));
    }

     public function storeTask(Request $request){
//dd($request->all());
        //validar os dados
        $request->validate([
            'name' => 'required|max:50|string',
            'user_id' => 'required',
        ]);

        //inserir  os dados na bd
        db::table('tasks')->insert([
            'name' =>  $request->name,
            'description' =>$request->description,
            'user_id'=> $request->user_id
        ]);

        return redirect()->route('tasks.all')->with('message', 'Tarefa adicionado com sucesso!');
    }

    public function updateTask(Request $request){

        $request->validate([
        'name' => 'required',
        'user_id' =>'required'
        ]);

        DB::table('tasks')->where('id', $request->id)
        ->update([
            'name' =>$request->name,
            'description' =>$request->description,
            'user_id' =>$request->user_id,
            'status' =>$request->status == 'on' ?1: 0 ,
            'due_at' =>$request->due_at,

        ]);

        return redirect()->route('tasks.all')->with('message', 'task adicionada com sucesso!');

    }
}

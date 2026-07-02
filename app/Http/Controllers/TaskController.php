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

    //ir à base de dados carregar toda a linha do user onde estou a clicar
        $task = db::table('tasks')
       ->join('users', 'tasks.user_id', 'users.id')
        ->select('tasks.*', 'users.name as username')
        ->where('tasks.id', $id)
        ->first();


        return view('tasks.show', compact('task'));
    }

    public function deleteTask($id){
        DB::table('tasks')
        ->where('id', $id)
        ->delete();


        return back();
    }
}

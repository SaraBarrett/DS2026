<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
  public function addUser () {

    return view('users.addUser');
}

public function allUsers(){
    $users = $this->getContacts();

    $usersFromDb = $this->getUsersFromDb();


    return view('users.allUsers',compact('users', 'usersFromDb'));
}

//função que recebe os dados do form, valida-os e insere na base de dados
public function storeUser(Request $request){
    //dd($request->all());

    //validar os dados
    $request->validate([
        'name' => 'required|max:50|string',
        'email' => 'required|unique:users,email|email',
        'password' =>'required|min:8'
    ]);

//inserir  os dados na bd
    User::insert([
        'name' =>  $request->name,
        'email' =>$request->email,
        'password'=> Hash::make($request->password)
    ]);

    return redirect()->route('users.all')->with('message', 'User adicionado com sucesso!');


}


//função que apenas retorna dados para dentro da class UserController
protected function getContacts(){

    //vêm da bd, ex; select * from users;
    $contacts = [
        ['id' =>1, 'name' =>'José', 'phone'=>'915444444'],
        ['id' =>2, 'name' =>'Francisca', 'phone'=>'915444444'],
        ['id' =>3, 'name' =>'Mário', 'phone'=>'915444444'],        ['id' =>4, 'name' =>'Hélder', 'phone'=>'915444444'],
    ];
    return  $contacts;
}

protected function getUsersFromDb(){
    $usersFromDb = DB::table('users')
    //->where('email', 'sara@gmail.com')
    ->select('name', 'id', 'nif', 'address', 'email')
    ->get();

   // dd($usersFromDb);

    return $usersFromDb;

}

    public function showUser($id){

    //ir à base de dados carregar toda a linha do user onde estou a clicar
        $user = db::table('users')
        ->where('id', $id)
        ->first();


        return view('users.show', compact('user'));
    }

    public function deleteUser($id){
        DB::table('tasks')
        ->where('user_id', $id)
        ->delete();

        db::table('users')
        ->where('id', $id)
        ->delete();

        return back();
    }
}

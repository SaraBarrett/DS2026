<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    ->where('email', 'sara@gmail.com')
    ->select('name', 'id', 'nif', 'address', 'email')
    ->get();

    return $usersFromDb;

}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function addUser () {

    return view('users.addUser');
}

public function allUsers(){
    $users = $this->getContacts();
    //dd($users);
    
    return view('users.allUsers',compact('users'));
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
}

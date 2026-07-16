<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  public function addUser () {

    return view('users.addUser');
}

public function allUsers(){
    $users = $this->getContacts();

    $search = request()->query('search')?request()->query('search'):null;

    $usersFromDb = $this->getUsersFromDb($search);


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

protected function getUsersFromDb($search){
    $usersFromDb = DB::table('users');

        if($search){
            $usersFromDb=
            $usersFromDb->where('name', 'LIKE', "%{$search}%")
            ->orwhere('email', 'LIKE', "%{$search}%");
        }

      $usersFromDb= $usersFromDb->select('name', 'id', 'nif', 'address', 'email', 'photo')
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

    public function updateUser(Request $request){
          $request->validate([
            'name' => 'required|max:50|string'
        ]);

        //inicio a var de photo a null (caso não seja feito upload)
        $photo = null;

        //se tiver photo, guarda no storage
        if($request->hasFile('photo')){
            $photo = Storage::putFile('photos', $request->photo);
        }

        db::table('users')
        ->where('id', $request->id)
        ->update([
            'name' => $request->name,
            'nif' => $request->nif,
            'address' => $request->address,
            'photo' => $photo
        ]);
        return redirect()->route('users.all')->with('message', 'User actualizado com sucesso!');

    }
}

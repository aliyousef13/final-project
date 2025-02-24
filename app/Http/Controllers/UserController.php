<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $users = DB::table('users')->get();
    return view('users' , data: compact('users'));
    }
    public function create(){
        $user_name = $_POST['name'];
        DB::table('users')->insert(['name' => $user_name]);
        return redirect()->back();
    }

    public function destroy($id){
        DB::table('tasks')->where('id' , $id)->delete();
        return redirect()->back();
    }
    public function edit($id){
        $user = DB::table('users')->where('id' , $id)->first();
        $users = DB::table('users')->get();

    return view('users' , data: compact('user' ,'users'));
    }

    public function update(){
        $id = $_POST['id'];
        DB::table('users')->where('id' ,'=', $id)->update(['name' => $_POST['name']]);

        return redirect('users');

    }


}

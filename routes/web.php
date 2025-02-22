<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
/////////////////////////////////////

Route::get('/about' , function(){
    $name = 'Ali';
    $departs = [
        '1' => 'Tichnical' ,
        '2' => 'Finacial' ,
        '3' => 'Seles' ,
    ];
    //return view('about') -> with (key: 'name' , value: $name);
   // return view('about' , data: ['name' => $name]);   array
   return view('about' , data: compact('name' , 'departs'));

});

Route::post('/about' , function(){
    $name = $_POST['name'];
    $departs = [
        '1' => 'Tichnical' ,
        '2' => 'Finacial' ,
        '3' => 'Seles' ,

    ];
    return view('about' , data: compact('name','departs'));

});

Route::get('tasks' , function(){
    $tasks = DB::table('tasks')->get();
    return view('tasks' , data: compact('tasks'));
});
Route::post('create' , function(){
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name' => $task_name]);
    return redirect()->back();
});
Route::post('delete/{id}' , function($id){
    DB::table('tasks')->where('id' , $id)->delete();
    return redirect()->back();
});
Route::post('edit/{id}' , function($id){
    $task = DB::table('tasks')->where('id' , $id)->first();
    $tasks = DB::table('tasks')->get();
    return view('tasks' , data: compact('task' ,'tasks'));
});
Route::post('update' , function(){
    $id = $_POST['id'];
    DB::table('tasks')->where('id' ,'=', $id)->update(['name' => $_POST['name']]);
    return redirect('tasks');

});


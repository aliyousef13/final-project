<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;


// Abouts Routes

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

// Tasks Routes

//Route::get('tasks' , [TaskController::class, 'index']);


//Route::post('create' ,  [TaskController::class, 'create']);

//Route::post('delete/{id}' , [TaskController::class , 'destroy']);

//Route::post('edit/{id}' ,  [TaskController::class, 'edit']);

//Route::post('update' , [TaskController::class, 'update']);
//Route::get('app' , function(){
   // return view('layouts.app');
//});

// Users Routes
Route::get('users' , [UserController::class, 'index']);
Route::post('create' ,  [UserController::class, 'create']);
Route::post('delete/{id}' , [UserController::class , 'destroy']);
Route::post('edit/{id}' ,  [UserController::class, 'edit']);
Route::post('update' , [UserController::class, 'update']);
Route::get('apps' , function(){
    return view('layouts.apps');
});

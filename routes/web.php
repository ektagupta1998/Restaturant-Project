<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dashboard', function () {
    return view('welcome');
});
//  Route::get('/','RestoControllers@index');

Route::get("/","App\Http\Controllers\RestoControllers@index");
Route::get("/home","App\Http\\Controllers\RestoControllers@home");
Route::get("/list","App\Http\Controllers\RestoControllers@list");
// Route::get("/add","App\Http\Controllers\RestoControllers@add");
Route::view('/add','add');
Route::post("/add","App\Http\Controllers\RestoControllers@add");
Route::get("/delete/{id}","App\Http\Controllers\RestoControllers@delete");
Route::get("/edit/{id}","App\Http\Controllers\RestoControllers@edit");
Route::post("edit","App\Http\Controllers\RestoControllers@update");
Route::view('register','register');
Route::post("register","App\Http\Controllers\RestoControllers@register");
Route::view('login','login');
Route::post("login","App\Http\Controllers\RestoControllers@login");
 



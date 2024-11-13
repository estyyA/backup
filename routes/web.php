<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => ['guest']], function () {
    Route::get("/" , "PageController@login")->name('login');
    Route::post("/login", "AuthController@ceklogin");
});

Route::group(['middleware' => ['auth']], function () {
    Route::get("/logout", "AuthController@ceklogout");
    Route::get("/user", "PageController@edituser");
    Route::post("/updateuser", "PageController@updateuser");
    Route::get("/home" , "PageController@home");
    Route::get("/movies", "PageController@movies");
    Route::get("/movies/form-add", "PageController@addmovies");
    Route::post("/save", "PageController@savemovies");
    Route::get("/form-edit/{id}", "PageController@editmovies");
    Route::put("/update/{id}", "PageController@updatemovies");
    Route::get("/delete/{id}", "PageController@deletemovies");
});



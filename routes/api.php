<?php

use App\Http\Controllers\Auth\apicontroller;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// to lock routes
// private routes
Route::middleware('auth:sanctum')->group(function(){

// read
Route::get("products",[ProductController::class,"index"]);
// create
Route::post("products",[ProductController::class,"store"]);
// show get by id
Route::get("products/{id}",[ProductController::class,"show"]);
// update
Route::put("products/{id}",[ProductController::class,"update"]);
// delete
Route::delete("products/{id}",[ProductController::class,"destroy"]);
// search by name
Route::get("products/search/{name}",[ProductController::class,"search"]);
// logout
Route::get("logout",[apicontroller::class,"logout"]);


});


// public ROutes

// register
Route::post("register",[apicontroller::class,"register"]);
// login
Route::post("login",[apicontroller::class,"login"]);







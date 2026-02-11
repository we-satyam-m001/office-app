<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TodoController;


Route::get('/employees',[App\Http\Controllers\EmployeeController::class,'index']);
Route::post('/employees',[App\Http\Controllers\EmployeeController::class,'store']);
Route::put('/employees/{id}',[App\Http\Controllers\EmployeeController::class,'update']);
Route::delete('/employees/{id}',[App\Http\Controllers\EmployeeController::class,'destroy']);

Route::get('/todos',[App\Http\Controllers\TodoController::class,'index']);
Route::post('/todos',[App\Http\Controllers\TodoController::class,'store']);
Route::put('/todos/{id}',[App\Http\Controllers\TodoController::class,'update']);
Route::delete('/todos/{id}',[App\Http\Controllers\TodoController::class,'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


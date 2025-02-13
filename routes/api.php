<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/notes', [NotesController::class, 'index'])->middleware('auth:sanctum');
Route::get('/notes/{id}', [NotesController::class, 'show'])->middleware('auth:sanctum');

Route::post('/notes', [NotesController::class, 'store'])->middleware('auth:sanctum');
Route::put('/notes/{id}', [NotesController::class, 'update'])->middleware('auth:sanctum');
Route::patch('/notes/{id}', [NotesController::class, 'patch'])->middleware('auth:sanctum');

Route::delete('/notes/{id}', [NotesController::class, 'destroy'])->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::get('/you-must-login',function(){
    return response()->json([
        'message' => 'You must login',
    ], 401);
})->name('login');



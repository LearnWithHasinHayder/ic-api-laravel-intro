<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/notes', [NotesController::class, 'index']);
Route::get('/notes/{id}', [NotesController::class, 'show']);

Route::post('/notes', [NotesController::class, 'store']);
Route::put('/notes/{id}', [NotesController::class, 'update']);
Route::patch('/notes/{id}', [NotesController::class, 'patch']);

Route::delete('/notes/{id}', [NotesController::class, 'destroy']);

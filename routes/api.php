<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/external_books', [BookController::class, 'external_books']);
Route::post('/create', [BookController::class, 'create']);
Route::get('/Get_book/{record_data?}', [BookController::class, 'Get_book']);
Route::patch('/Update/{id}', [BookController::class, 'Update']);
Route::delete('/Delete/{id}', [BookController::class, 'Delete']);
Route::post('/Delete_books/{id}/delete', [BookController::class, 'Delete_books']);
Route::get('/Show/{id}', [BookController::class, 'Show']);

//Route::get('/external_books',"BookController@external_books")->name($request);  

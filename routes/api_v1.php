<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BookController;

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

Route::get('/', function () {
    return "Hello";
});
Route::get('/external-books', [BookController::class, 'getExternalBooks']);
Route::post('/create', [BookController::class, 'create']);
//Route::get('/Getbook/{record_data?}', [BookController::class, 'getBook']);
Route::get('/Getbook', [BookController::class, 'getBook']);
Route::patch('/Update/{id}', [BookController::class, 'Update']);
Route::delete('/Delete/{id}', [BookController::class, 'Delete']);
Route::post('/Deletebook/{id}/delete', [BookController::class, 'DeleteBook']);
Route::get('/show/{id}', [BookController::class, 'Show']);

//Route::get('/external_books',"BookController@external_books")->name($request);
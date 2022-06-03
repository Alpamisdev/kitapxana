<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GanerController;
use App\Http\Controllers\FacultetController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearcheController;
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

Route::apiResource('students', StudentController::class);
Route::apiResource('books', BookController::class);
Route::apiResource('authors', AuthorController::class);
Route::apiResource('ganers', GanerController::class);
Route::apiResource('facultets', FacultetController::class);
Route::apiResource('groups', GroupController::class);
Route::apiResource('orders', OrderController::class);

//Searching
Route::controller(SearcheController::class)->group(function () {
    Route::get('/searchbook/{book:name}', 'search_book');
    Route::get('/searchfaculty', 'search_faculty');
    Route::get('/searchgroup','search_group');
    Route::get('/searchstudent', 'search_student');
});

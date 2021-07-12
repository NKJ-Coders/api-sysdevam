<?php

use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('api')->prefix('auth')->namespace('Auth')->group(function() {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::apiResource('/users', 'UserController');

// tickets root
Route::apiResource('/tickets', 'TicketController');
Route::put('/tickets/{ticket}/delete', 'TicketController@deleteTicketByOnline')->name('tickets.delete');
Route::put('/tickets/{ticket}/restore', 'TicketController@restoreTicketByOnline')->name('tickets.restore');

// categories root
Route::apiResource('/categories', 'CategorieController');
Route::put('/categories/{category}/delete', 'CategorieController@deleteCatByOnline')->name('categories.delete');
Route::put('/categories/{category}/restore', 'CategorieController@restoreCatByOnline')->name('categories.restore');

// pieces jointes root
Route::get('/tickets/{ticket}/link-files', 'PieceJointeController@show')->name('tickets.link-files');
Route::get('/piece_jointes', 'PieceJointeController@store')->name('piece_jointes.store');

// Roles root
// Route::get('/roles', 'RoleController');

// client root
Route::apiResource('/clients', 'ClientController');

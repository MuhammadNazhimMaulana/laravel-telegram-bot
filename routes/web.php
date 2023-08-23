<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\HomeController;

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

// Route::get('/', function () {
//     return view('chat.index');
// });

// Upload File 
Route::prefix('/upload')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/list', [HomeController::class, 'list_image']);
    Route::post('/store', [HomeController::class, 'storeImage']);
});
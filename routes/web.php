<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LirController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// router lir/tes
Route::get('lir/tes', 'App\Http\Controllers\LirController@tes');
// router lir/tes
Route::get('lir/tes2', 'App\Http\Controllers\LirController@tes2');
// route lir
Route::resource('lir', LirController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;

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

Route::get('/', [MasterController::class, 'loginPage']);

Route::post('/login',[MasterController::class, 'login']);

Route::get('/home', [MasterController::class, 'homePage']);

Route::get('/inputMenu', [MasterController::class, 'inputMenuView']);
Route::get('/inputData', [MasterController::class, 'inputMenuSubmit']);

Route::get('/pengajuanAcc', [MasterController::class, 'pengajuanAcc']);
Route::get('/pengajuanAccDetail', [MasterController::class, 'pengajuanAccDetail']);
Route::get('/pengajuanAccExecute', [MasterController::class, 'pengajuanAccExecute']);
Route::get('/pengajuanInput', [MasterController::class, 'pengajuanInput']);
Route::get('/pengajuanInputMenu', [MasterController::class, 'pengajuanInputMenu']);
Route::get('/pengajuanInputExecute', [MasterController::class, 'pengajuanInputExecute']);



Route::get('/viewDB/{unit_id}', [MasterController::class, 'viewDB']);
Route::get('/viewDBDetail/{unit_id}', [MasterController::class, 'viewDBDetail']);
Route::get('/viewDBDelete/{unit_id}', [MasterController::class, 'viewDBDelete']);










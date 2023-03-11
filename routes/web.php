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
Route::post('/inputData', [MasterController::class, 'inputMenuSubmit']);

Route::get('/pengajuanAcc', [MasterController::class, 'pengajuanAcc']);
Route::get('/pengajuanAccDetail/{pengajuan_id}', [MasterController::class, 'pengajuanAccDetail']);
Route::get('/pengajuanAccDetailBack', [MasterController::class, 'pengajuanAccDetailBack']);
Route::get('/pengajuanAccExecute/{pengajuanId}', [MasterController::class, 'pengajuanAccExecute']);

Route::get('/pengajuanDelete/{pengajuan_id}', [MasterController::class, 'pengajuanDelete']);

Route::get('/pengajuanInput', [MasterController::class, 'pengajuanInput']);
Route::get('/pengajuanInputDetail/{pengajuan_id}', [MasterController::class, 'pengajuanInputDetail']);
Route::post('/pengajuanInputDetailBack', [MasterController::class, 'pengajuanInputDetailBack']);
Route::get('/pengajuanInputMenu', [MasterController::class, 'pengajuanInputMenu']);
Route::post('/pengajuanInputMenuExecute', [MasterController::class, 'pengajuanInputMenuExecute']);



Route::get('/viewDB/{units_id}', [MasterController::class, 'viewDB']);










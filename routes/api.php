<?php

use App\Http\Controllers\DusunController;
use App\Http\Controllers\PendudukController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('dusun', [DusunController::class, 'API'])->name('api.dusun');

Route::get('penduduk', [PendudukController::class, 'API'])->name('api.penduduk');

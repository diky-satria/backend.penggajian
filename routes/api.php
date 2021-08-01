<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authorize\MeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;

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
// Auth::loginUsingId(1);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/me', [MeController::class, '__invoke']);

    Route::get('/jabatan', [JabatanController::class, 'index']);
    Route::get('/jabatan/{jabatan:id}', [JabatanController::class, 'show']);
    Route::post('/jabatan', [JabatanController::class, 'store']);
    Route::patch('/jabatan/{jabatan:id}', [JabatanController::class, 'edit']);
    Route::delete('/jabatan/{jabatan:id}', [JabatanController::class, 'delete']);

    Route::get('/golongan', [GolonganController::class, 'index']);
    Route::get('/golongan/{golongan:id}', [GolonganController::class, 'show']);
    Route::post('/golongan', [GolonganController::class, 'store']);
    Route::patch('/golongan/{golongan:id}', [GolonganController::class, 'edit']);
    Route::delete('/golongan/{golongan:id}', [GolonganController::class, 'delete']);

    Route::get('/pegawai', [PegawaiController::class, 'index']);
    Route::get('/jab-gol-jk', [PegawaiController::class, 'det']);
    Route::get('/pegawai/{pegawai:id}', [PegawaiController::class, 'show']);
    Route::post('/pegawai', [PegawaiController::class, 'store']);
    Route::patch('/pegawai/{pegawai:id}', [PegawaiController::class, 'edit']);
    Route::delete('/pegawai/{pegawai:id}', [PegawaiController::class, 'delete']);

    Route::get('/kehadiran_detail', [GajiController::class, 'kehadiran_detail']);
    Route::get('/kehadiran', [GajiController::class, 'index']);
    Route::get('/kehadiran/{gaji:id}', [GajiController::class, 'show']);
    Route::post('/kehadiran', [GajiController::class, 'store']);
    Route::patch('/kehadiran/{gaji:id}', [GajiController::class, 'edit']);

    Route::get('/dashboard', [DashboardController::class, 'index']);
});
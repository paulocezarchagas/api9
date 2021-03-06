<?php
namespace App;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DepartamentoController;

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


/**
 * Rotas dos usuarios
 */
//cria usuario e senha 
Route::post('/register', [AuthController::class, 'register']);
//faz login e gera o token
Route::post('/login', [AuthController::class, 'login']);
//faz logout
Route::post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Rotas dos clientes
 */
Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/clientes/{id}', [ClienteController::class, 'show']);
Route::get('/clientes/search/{name}', [ClienteController::class, 'search']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::put('/clientes/{id}', [ClienteController::class, 'update']);
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);
Route::get('/clientes/enderecoFilter/{endereco}', [ClienteController::class, 'enderecoFilter']); //filtro endereco

/**
 * Rotas dos departamentos
 */
Route::get('/departamentos', [DepartamentoController::class, 'index']);
Route::get('/departamentos/{id}', [DepartamentoController::class, 'show']);
Route::get('/departamentos/search/{name}', [DepartamentoController::class, 'search']);
Route::post('/departamentos/{id}', [DepartamentoController::class, 'store']);
Route::put('/departamentos/{idCli}/{idDep}', [DepartamentoController::class, 'update']);
Route::delete('/departamentos/{id}', [DepartamentoController::class, 'destroy']);


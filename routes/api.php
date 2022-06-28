<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransportadoraController;
use App\Http\Controllers\CotacaofreteController;

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

Route::middleware('api')->group(function () {
  // Cadastrar cotação de frete
  Route::post('cotacao', [CotacaofreteController::class, 'store']);

  // Simular cálculo de imposto
  Route::put('cotacao', [CotacaofreteController::class, 'calculation']);

  // Listar imposto
  Route::get('cotacao', [CotacaofreteController::class, 'show']);
});
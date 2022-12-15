<?php
use App\Http\Controllers\Api\ContratoController;
use App\Http\Controllers\Api\ProductController;
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

Route::controller(ProductController::class)->group(function (){
     Route::get('/products', 'index');
     Route::post('/product', 'store');
     Route::get('/product/{i}', 'show');
     Route::put('/product/{i}', 'update');
     Route::put('/product/{i}', 'destroy'); 
 });

 Route::controller(ContratoController::class)->group(function (){
    Route::get('/contratos', 'index');
    Route::post('/contrato', 'store');
    Route::get('/contrato/{i}', 'show');
    Route::put('/contrato/{i}', 'update');
    Route::put('/contrato/{i}', 'destroy'); 
});

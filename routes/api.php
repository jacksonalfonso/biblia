<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\TestamentoController;
use App\Http\Controllers\TraducaoController;
use App\Http\Controllers\VersiculoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// route::get('/testamento', [TestamentoController::class, 'index']);
// route::get('/testamento/{id}', [TestamentoController::class, 'show']);
// route::put('/testamento/{id}', [TestamentoController::class, 'update']);
// route::delete('/testamento/{id}', [TestamentoController::class, 'destroy']);
// route::post('/testamento', [TestamentoController::class, 'store']);

// route::get('/livro', [LivroController::class, 'index']);
// route::get('/livro/{id}', [LivroController::class, 'show']);
// route::put('/livro/{id}', [LivroController::class, 'update']);
// route::delete('/livro/{id}', [LivroController::class, 'destroy']);
// route::post('/livro', [LivroController::class, 'store']);

// route::get('/versiculo', [VersiculoController::class, 'index']);
// route::get('/versiculo/{id}', [VersiculoController::class, 'show']);
// route::put('/versiculo/{id}', [VersiculoController::class, 'update']);
// route::delete('/versiculo/{id}', [VersiculoController::class, 'destroy']);
// route::post('/versiculo', [VersiculoController::class, 'store']);

// Route::apiResource('testamento', TestamentoController::class);
// Route::apiResource('livro', LivroController::class);
// Route::apiResource('versiculo', VersiculoController::class);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::apiResources([
        'testamento' => TestamentoController::class,
        'livro' => LivroController::class,
        'versiculo' => VersiculoController::class,
        'idioma' => IdiomaController::class,
        'traducao' => TraducaoController::class,
    ]);

    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

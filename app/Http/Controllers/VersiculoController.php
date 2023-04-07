<?php

namespace App\Http\Controllers;

use App\Models\Versiculo;
use Illuminate\Http\Request;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Versiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return Versiculo::create($request->all());
        if (Versiculo::create($request->all())) {
            return response()->json([
            'message' => ' Versiculo Cadastrado com Sucesso. '
            ], 201);
        }

        return response()->json([
        'message' => ' Erro ao Cadastrar Versiculo. '
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $versiculo)
    {
        // return Versiculo::findOrFail($versiculo);
        $versiculo = Versiculo::find($versiculo);

        if ($versiculo) {
            $versiculo->livro;
            return $versiculo;
        }
        return response()->json([
            'message' => ' Versiculo não existe.'
        ], 404);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $versiculo)
    {
        //
        // $versiculo = Versiculo::findOrFail($versiculo);
        // $versiculo->update($request->all());
        // return $versiculo;
        $versiculo = Versiculo::find($versiculo);
        if ($versiculo) {
            $versiculo->update($request->all());
            return $versiculo;
        }

        return response()->json([
        'message' => ' Erro ao atualizar Versiculo. '
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $versiculo)
    {
        //return Versiculo::destroy($versiculo);
        if (Versiculo::destroy($versiculo)) {
            return response()->json([
            'message' => ' Versiculo Excluído com Sucesso. '
            ], 201);
        }

        return response()->json([
        'message' => ' Erro ao tentar Excluir o Versiculo. '
        ], 404);
    }
}

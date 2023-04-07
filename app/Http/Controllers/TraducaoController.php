<?php

namespace App\Http\Controllers;

use App\Models\Traducao;
use Illuminate\Http\Request;

class TraducaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Traducao::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Traducao::create($request->all())) {
            return response()->json([
            'message' => ' Tradução Cadastrado com Sucesso. '
            ], 201);
        }

        return response()->json([
        'message' => ' Erro ao Cadastrar Tradução. '
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $traducao)
    {
        $traducao = Traducao::find($traducao);

        if ($traducao) {
            $traducao->idioma;
            return $traducao;
        }
        return response()->json([
            'message' => ' Tradução não existe.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $traducao)
    {
        $traducao = Traducao::find($traducao);
        if ($traducao) {
            $traducao->update($request->all());
            return $traducao;
        }

        return response()->json([
        'message' => ' Erro ao atualizar Tradução. '
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $traducao)
    {
        if (Traducao::destroy($traducao)) {
            return response()->json([
            'message' => ' Tradução Excluída com Sucesso. '
            ], 201);
        }

        return response()->json([
        'message' => ' Erro ao tentar Excluir o Tradução. '
        ], 404);
    }
}

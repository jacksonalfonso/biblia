<?php

namespace App\Http\Controllers;

use App\Models\Testamento;
use Illuminate\Http\Request;

class TestamentoController extends Controller
{
    public function index()
    {
        return Testamento::all();
    }

    public function store(Request $request)
    {
        if (Testamento::create($request->all())) {
            return response()->json([
                'message' => ' Testamento Cadastrado com Sucesso. '
            ], 201);
        }

        return response()->json([
            'message' => ' Erro ao Cadastrar Testamento. '
        ], 404);
        // return Testamento::create($request->all());
    }

    public function show(string $testamento)
    {
        $testamento = Testamento::find($testamento);
        if ($testamento) {
            $testamento->livros;
            return $testamento;
        }

        return response()->json([
            'message' => ' Testamento não existe. '
        ], 404);

        // return Testamento::findOrFail($testamento);
    }

    public function update(Request $request, string $testamento)
    {
        // $testamento = Testamento::findOrFail($testamento);
        // $testamento->update($request->all());
        // return $testamento;

        $testamento = Testamento::find($testamento);
        if ($testamento) {
            $testamento->update($request->all());
            return $testamento;
        }

        return response()->json([
            'message' => ' Erro ao atualizar Testamento. '
        ], 404);
    }

    public function destroy(string $testamento)
    {
        // return Testamento::destroy($testamento);
        if (Testamento::destroy($testamento)) {
            return response()->json([
                'message' => ' Testamento Excluído com Sucesso. '
            ], 201);
        }

        return response()->json([
            'message' => ' Erro ao tentar Excluir o Testamento. '
        ], 404);
    }
}

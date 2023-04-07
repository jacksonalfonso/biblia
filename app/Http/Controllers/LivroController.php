<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Livro::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Livro::create($request->all())) {
            return response()->json([
                'message' => ' Livro Cadastrado com Sucesso. '
            ], 201);
        }

        return response()->json([
            'message' => ' Erro ao Cadastrar Livro. '
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $livro)
    {
        $livro = Livro::find($livro);
        if ($livro) {
            $livro->testamento;
            $livro->versiculos;
            return $livro;
        }

        return response()->json([
            'message' => ' Livro não existe. '
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $livro)
    {
        $livro = Livro::find($livro);
        if ($livro) {
            $livro->update($request->all());
            return $livro;
        }

        return response()->json([
            'message' => ' Erro ao atualizar Livro. '
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $livro)
    {
        //
        if (Livro::destroy($livro)) {
            return response()->json([
                'message' => ' Livro Excluído com Sucesso. '
            ], 201);
        }

        return response()->json([
            'message' => ' Erro ao tentar Excluir o Livro. '
        ], 404);
    }
}

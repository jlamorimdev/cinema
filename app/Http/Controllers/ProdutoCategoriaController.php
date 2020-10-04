<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto_Categoria;

class ProdutoCategoriaController extends Controller
{

    public function index()
    {
        $categorias = Produto_Categoria::All();

        return view('produtos.categorias.index', [
          'categorias' => $categorias
        ]);

    }


    public function create()
    {
        return view('produtos.categorias.create');
    }


    public function store(Request $request)
    {
      $this->validate($request, [
        'nome' => 'required'
      ]);
        $categoria = New Produto_Categoria;
        $categoria->nome = $request->input('nome');

        if ($categoria->save()) {
          return redirect('produtos/categorias_produtos/')->with('sucess', 'Categoria adicionada com sucesso');
        }
    }


    public function show($id)
    {
        $categoria = Produto_Categoria::findOrFail($id);
        return view('produtos.categorias.show', [
          'categoria' => $categoria
        ]);
    }


    public function edit($id)
    {
        $categoria = Produto_Categoria::findOrFail($id);
        return view('produtos.categorias.edit', [
          'categoria' => $categoria,
          'id' => $id
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'nome' => 'required'
        ]);

        $categoria = Produto_Categoria::findOrFail($id);
        $categoria->nome = $request->get('nome');

        if ($categoria->update()) {
          return redirect('produtos/categorias_produtos/')->with('sucess', 'Categoria atualizada com sucesso !');
        }
    }

    public function destroy($id)
    {
        $categoria = Produto_Categoria::findOrFail($id);
        if($categoria->delete()){
          return Redirect()->back()->with('sucess', 'Categoria deletada com sucesso');
        }
    }
}

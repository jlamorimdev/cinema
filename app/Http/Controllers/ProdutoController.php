<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Produto_Categoria;
use Illuminate\Support\Facades\Input;

class ProdutoController extends Controller
{

    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.produtos.index', [
          'produtos' => $produtos
        ]);
    }

    public function create()
    {
        $categorias = Produto_Categoria::all();
        return view('produtos.produtos.create', [
          'categorias' => $categorias
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'nome' => 'required',
          'valor' => 'required|numeric',
          'categoria' => 'required'
        ]);

        $produto = new Produto;
        $produto->nome = $request->input('nome');
        $produto->valor = $request->input('valor');
        $produto->categoria = $request->input('categoria_id');

        if($request->hasFile('imagem')){
          $imagem = Input::file('imagem');
          $imagem->move(public_path() . '/img/produtos/', $imagem->getClientOriginalName());
          $produto->imagem = $imagem->getClientOriginalName();
        }

        if ($produto->save()) {
          return redirect('/produtos/produtos/')->with('sucess', 'Produto Cadastrado com sucesso');
        }

    }

    public function edit($id)
    {
      $categorias = Produto_Categoria::all();
      $produto = Produto::FindOrFail($id);
      return view('produtos.produtos.create', [
        'categorias' => $categorias,
        'produto' => $produto
      ]);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'nome' => 'required',
        'valor' => 'required|numeric',
        'categoria' => 'required'
      ]);

      $produto->nome = $request->get('nome');
      $produto->valor = $request->get('valor');
      $produto->categoria = $request->get('categoria_id');

      if($request->hasFile('imagem')){
        $imagem = Input::file('imagem');
        $imagem->move(public_path() . '/img/produtos/', $imagem->getClientOriginalName());
        $produto->imagem = $imagem->getClientOriginalName();
      }

      if ($produto->update()) {
        return redirect('/produtos/produtos/')->with('sucess', 'Produto Atualizado com sucesso');
      }
    }

    public function destroy($id)
    {
      $produto = Produto::FindOrFail($id);
      if ($produto->delete()) {
        return Redirect()->back()->with('sucess', 'Produto excluído com sucesso');
      }

    }
}

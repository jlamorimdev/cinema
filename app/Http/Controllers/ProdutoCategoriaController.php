<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto_Categoria;

class ProdutoCategoriaController extends Controller
{
  private $categoria;

  public function __construct(Produto_Categoria $categoria)
  {
    $this->categoria = $categoria;
  }

  public function index()
  {
    $categorias = $this->categoria->all();

    return view('produtos.categorias.index', compact('categorias'));
  }


  public function create()
  {
    return view('produtos.categorias.create');
  }


  public function store(Request $request)
  {
    $request->validate(['nome' => 'required']);

    $this->categoria->create($request->all());

    return redirect()->route('produtos.categorias.index')->with('sucess', 'Categoria adicionada com sucesso');
  }


  public function show(Produto_Categoria $categoria)
  {
    return view('produtos.categorias.show', compact('categoria'));
  }


  public function edit(Produto_Categoria $categoria)
  {
    return view('produtos.categorias.edit', compact('categoria'));
  }

  public function update(Request $request, Produto_Categoria $categoria)
  {
    $request->validate(['nome' => 'required']);

    $categoria->update($request->all());

    return redirect()->route('produtos.categorias.index')->with('sucess', 'Categoria atualizada com sucesso !');
  }

  public function destroy(Produto_Categoria $categoria)
  {
    $categoria->delete();

    return Redirect()->back()->with('sucess', 'Categoria deletada com sucesso');
  }
}

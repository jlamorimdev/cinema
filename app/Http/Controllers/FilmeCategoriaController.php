<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme_Categoria;

class FilmeCategoriaController extends Controller
{

  private $categoria;

  public function __construct(Filme_Categoria $categoria)
  {
    $this->categoria = $categoria;
  }

  public function index()
  {
    $categorias = $this->categoria->all();

    return view('filmes.categorias.index', compact('categorias'));
  }

  public function create()
  {
    return view('filmes.categorias.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'nome' => 'required|string'
    ]);

    $this->categoria->create($request->all());

    return redirect()->route('categorias.index')->with('sucess', 'Categoria adicionada com sucesso');
  }


  public function show(Filme_Categoria $categoria)
  {
    return view('filmes.categorias.show', compact('categoria'));
  }


  public function edit(Filme_Categoria $categoria)
  {
    return view('filmes.categorias.edit', compact('categoria'));
  }


  public function update(Request $request, Filme_Categoria $categoria)
  {
    $request->validate([
      'nome' => 'required|string'
    ]);

    $categoria->update($request->all());

    return redirect()->route('categorias.index')->with('sucess', 'Categoria atualizada com sucesso');
  }


  public function destroy(Filme_Categoria $categoria)
  {
    $categoria->delete();

    return Redirect()->back()->with('sucess', 'Produto deletado com Sucesso');
  }
}

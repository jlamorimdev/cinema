<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme_Categoria;

class FilmeCategoriaController extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {
    $categorias = Filme_Categoria::all();

    return view('filmes.categorias.index', [
      'categorias' => $categorias
    ]);
  }

  public function create()
  {
    return view('filmes.categorias.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, ['nome' => 'required']);

    $categoria = new Filme_Categoria;
    $categoria->nome = $request->input('nome');
    $categoria->save();

    return redirect('filmes/categorias/')->with('sucess', 'Categoria adicionada com sucesso');
  }


  public function show(Filme_Categoria $categoria)
  {
    if (empty($categoria)) {
      abort(404);
    }

    return view('filmes.categorias.show', [
      'categoria' => $categoria
    ]);
  }


  public function edit(Filme_Categoria $categoria)
  {
    if (empty($categoria)) {
      abort(404);
    }

    return view('filmes.categorias.edit', compact('categoria'));
  }


  public function update(Request $request, Filme_Categoria $categoria)
  {
    if (empty($categoria)) {
      abort(404);
    }

    $this->validate($request, ['nome' => 'required']);

    $categoria->nome = $request->get('nome');
    $categoria->update();

    if ($categoria->save()) {
      return redirect('filmes/categorias/')->with('sucess', 'Categoria atualizada com sucesso');
    }
  }


  public function destroy(Filme_Categoria $categoria)
  {
    if (empty($categoria)) {
      abort(404);
    }

    $categoria->delete();
    return Redirect()->back()->with('sucess', 'Produto deletado com Sucesso');
  }
}

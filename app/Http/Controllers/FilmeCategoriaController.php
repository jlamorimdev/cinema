<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme_Categoria;

class FilmeCategoriaController extends Controller
{
    public function __construct(){

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

        return redirect('filmes/categorias/create')->with('sucess', 'Categoria adicionada com sucesso');
    }


    public function show($id)
    {
        $categoria = Filme_Categoria::findOrFail($id);
        return view('filmes.categorias.show', [
          'categoria' => $categoria
        ]);
    }


    public function edit($id)
    {
      $categoria = Filme_Categoria::findOrFail($id);
      return view('filmes.categorias.edit', [
        'categoria' => $categoria
      ]);
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, ['nome' => 'required']);

      $categoria = Filme_Categoria::findOrFail($id);;
      $categoria->nome = $request->get('nome');
      $categoria->update();

      return redirect('filmes/categorias/edit')->with('sucess', 'Categoria atualizada com sucesso');
    }


    public function destroy($id)
    {
        //
    }
}

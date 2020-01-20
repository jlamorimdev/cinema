<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme;
use App\Filme_Categoria;
use Illuminate\Support\Facades\Input;

class FilmeController extends Controller
{

    public function index()
    {
      $categorias = Filme_Categoria::All();
        $filmes = Filme::All();
        return view('filmes.filmes.index', [
          'filmes' => $filmes,
          'categorias' => $categorias
        ]);
    }


    public function create()
    {
        $categorias = Filme_Categoria::All();
        return view('filmes.filmes.create', [
          'categorias' => $categorias
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'nome' => 'required',
          'duracao' => 'required',
          'categoria_id' => 'required',
          'banner' => 'required'
        ]);

        $filme = New Filme;
        $filme->nome = $request->input('nome');
        $filme->categoria_id = $request->input('categoria_id');
        $filme->duracao = $request->input('duracao');
        $filme->tresd = $request->input('tresd');

        if ($request->hasFile('banner')) {
          $banner = Input::file('banner');
          $banner->move(public_path() . '/img/filmes/', $banner->getClientOriginalName());
          $filme->banner = $banner->getClientOriginalName();
        }

        if ($filme->save()) {
          return redirect('/filmes/filmes/')->with('sucess', 'Filme cadastrado com sucesso');
        }
    }

    public function show($id)
    {
      $categorias = Filme_Categoria::All();
      $filme = Filme::FindOrFail($id);

      return view('filmes.filmes.show', [
        'categorias' => $categorias,
        'filme' => $filme
      ]);
    }


    public function edit($id)
    {
      $categorias = Filme_Categoria::All();
      $filme = Filme::FindOrFail($id);
      return view('filmes.filmes.edit', [
        'categorias' => $categorias,
        'filme' => $filme,
        'id' => $id
      ]);
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'nome' => 'required',
        'duracao' => 'required',
        'categoria_id' => 'required'
      ]);

      $filme = Filme::FindOrFail($id);
      $filme->nome = $request->input('nome');
      $filme->categoria_id = $request->input('categoria_id');
      $filme->duracao = $request->input('duracao');
      $filme->tresd = $request->input('tresd');

      if ($request->hasFile('banner')) {
        $banner = Input::file('banner');
        $banner->move(public_path() . '/img/filmes/', $banner->getClientOriginalName());
        $filme->banner = $banner->getClientOriginalName();
      }

      if ($filme->update()) {
        return redirect('/filmes/filmes/')->with('sucess', 'Filme Atualizado com sucesso');
      }
  }

    public function destroy($id)
    {
        $filme = Filme::FindOrFail($id);
        if($filme->delete()){
          return Redirect()->back()->with('sucess', 'Filme deletado com sucesso');
        }
    }
}

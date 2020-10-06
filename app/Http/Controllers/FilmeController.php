<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\{Filme, Filme_Categoria};

class FilmeController extends Controller
{

  private $filme;
  private $categoria;

  public function __construct(Filme $filme, Filme_Categoria $categoria)
  {
    $this->filme = $filme;
    $this->categoria = $categoria;
  }
  public function index()
  {
    $categorias = $this->categoria->all();
    $filmes = $this->filme->paginate(10);

    return view('filmes.filmes.index', compact('filmes', 'categorias'));
  }

  public function show(Filme $filme)
  {
    if (empty($filme)) {
      abort(404);
    }

    $categorias = $this->categoria->all();

    return view('filmes.filmes.show', compact('filme', 'categorias'));
  }

  public function create()
  {
    $categorias = $this->categoria->all();

    return view('filmes.filmes.create', compact('categorias'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'nome' => 'required',
      'duracao' => 'required',
      'categoria_id' => 'required',
      'banner' => 'required'
    ]);

    $filme = new Filme;
    $filme->nome = $request->input('nome');
    $filme->categoria_id = $request->input('categoria_id');
    $filme->duracao = $request->input('duracao');
    $filme->tresd = $request->input('tresd');

    if ($request->hasFile('banner')) {
      $banner = \Request::file('banner');
      $banner->move(public_path() . '/img/filmes/', $banner->getClientOriginalName());
      $filme->banner = $banner->getClientOriginalName();
    }

    $filme->save();

    return redirect('/filmes/filmes/')->with('sucess', 'Filme cadastrado com sucesso');
  }

  public function edit(Filme $filme)
  {
    $categorias = Filme_Categoria::All();

    return view('filmes.filmes.edit', [
      'categorias' => $categorias,
      'filme' => $filme
    ]);
  }

  public function update(Request $request, Filme $filme)
  {
    $this->validate($request, [
      'nome' => 'required',
      'duracao' => 'required',
      'categoria_id' => 'required'
    ]);

    $filme->nome = $request->input('nome');
    $filme->categoria_id = $request->input('categoria_id');
    $filme->duracao = $request->input('duracao');
    $filme->tresd = $request->input('tresd');

    if ($request->hasFile('banner')) {
      $banner = \Request::file('banner');
      $banner->move(public_path() . '/img/filmes/', $banner->getClientOriginalName());
      $filme->banner = $banner->getClientOriginalName();
    }

    if ($filme->update()) {
      return redirect('/filmes/filmes/')->with('sucess', 'Filme Atualizado com sucesso');
    }
  }

  public function destroy(Filme $filme)
  {
    $filme->delete();

    return Redirect()->back()->with('sucess', 'Filme deletado com sucesso');
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Produto_Categoria;
use Illuminate\Support\Facades\Input;

class ProdutoController extends Controller
{
  private $produto;
  private $categoria;

  public function __construct(Produto $produto, Produto_Categoria $categoria)
  {
    $this->produto = $produto;
    $this->categoria = $categoria;
  }
  public function index()
  {
    $produtos = $this->produto->paginate(10);
    $categorias = $this->categoria->all();

    return view('produtos.produtos.index', compact('produtos', 'categorias'));
  }

  public function create()
  {
    $categorias = $this->categoria->all();

    return view('produtos.produtos.create', compact('categorias'));
  }

  public function store(Request $request)
  {

    $request->validate([
      'nome' => 'required',
      'categoria_id' => 'required',
      'valor' => 'required'
    ]);

    $produto = new Produto;
    $preco = $request->input('valor');
    $produto->nome = $request->input('nome');
    $produto->valor = str_replace(",", ".", $preco);
    $produto->categoria_id = $request->input('categoria_id');

    if ($request->hasFile('imagem')) {
      $imagem = \Request::file('imagem');
      $imagem->move(public_path() . '/img/produtos/', $imagem->getClientOriginalName());
      $produto->imagem = $imagem->getClientOriginalName();
    }

    $produto->save();
    return redirect()->route('produtos.index')->with('sucess', 'Produto Cadastrado com sucesso');
  }

  public function edit(Produto $produto)
  {
    $categorias = $this->categoria->all();

    return view('produtos.produtos.edit', compact('produto', 'categorias'));
  }

  public function update(Request $request, Produto $produto)
  {
    $request->validate([
      'nome' => 'required',
      'valor' => 'required|numeric',
      'categoria_id' => 'required'
    ]);

    $produto->nome = $request->get('nome');
    $produto->valor = $request->get('valor');
    $produto->categoria_id = $request->get('categoria_id');

    if ($request->hasFile('imagem')) {
      $imagem = \Request::file('imagem');
      $imagem->move(public_path() . '/img/produtos/', $imagem->getClientOriginalName());
      $produto->imagem = $imagem->getClientOriginalName();
    }

    $produto->update();

    return redirect()->route('produtos.index')->with('sucess', 'Produto Atualizado com sucesso');
  }

  public function destroy(Produto $produto)
  {
    $produto->delete();

    return Redirect()->back()->with('sucess', 'Produto excluído com sucesso');
  }
}

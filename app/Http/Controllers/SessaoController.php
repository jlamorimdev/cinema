<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sessao;
use App\Models\Filme;
use App\Models\Sala;


class SessaoController extends Controller
{
    public function index(){
      $filmes = Filme::all();
      $salas = Sala::all();
      $sessoes = Sessao::all();

      return view('sessao.index', [
        'filmes' => $filmes,
        'salas' => $salas,
        'sessoes' => $sessoes
      ]);
    }

    public function create(){
      $filmes = Filme::all();
      $salas = Sala::all();

      return view('sessao.create', [
        'filmes' => $filmes,
        'salas' => $salas
      ]);
    }

    public function store(Request $request){
      $sessao = new Sessao;
      $sessao->filme_id = $request->input('filme_id');
      $sessao->sala_id = $request->input('sala_id');
      $sessao->horario = $request->input('horario');

      if ($sessao->save()) {
        return redirect('sessao/')->with('sucess', 'Sessão cadastrada com sucesso');
      }
    }

    public function edit($id){
      $sessao = Sessao::findOrFail($id);
      $filmes = Filme::all();
      $salas = Sala::all();

      return view('sessao.edit', [
        'sessao' => $sessao,
        'filmes' => $filmes,
        'salas' => $salas,
        'id' => $id
      ]);
    }

    public function update(Request $request, $id){

      $sessao = Sessao::findOrFail($id);
      $sessao->filme_id = $request->get('filme_id');
      $sessao->sala_id = $request->get('sala_id');
      $sessao->horario = $request->get('horario');

      if ($sessao->update()) {
        return redirect('sessao/')->with('sucess', 'Sessão Atualizada com sucesso');
      }
    }

    public function destroy($id){
      $sessao = Sessao::findOrFail($id);
      if ($sessao->delete()) {
        return redirect()->back()->with('sucess', 'Sessão Excluída com sucesso');
      }
    }
}

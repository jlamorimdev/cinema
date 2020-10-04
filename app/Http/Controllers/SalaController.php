<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;

class SalaController extends Controller
{
    public function index(){
      $salas = Sala::all();

      return view('salas.index', [
        'salas' => $salas
      ]);
    }

    public function create(){
      return view('salas.create');
    }

    public function store(Request $request){
      $sala = new Sala;
      $sala->nome = $request->input('nome');
      $sala->capacidade = $request->input('capacidade');
      if ($sala->save()) {
        return redirect('salas/')->with('sucess', 'Sala cadatrada com sucesso');
      }
    }

    public function edit($id){
      $sala = Sala::FindOrFail($id);
      return view('salas.edit', [
        'sala' => $sala,
        'id' => $id
      ]);
    }

    public function update(Request $request, $id){
      $sala = Sala::FindOrFail($id);
      $sala->nome = $request->get('nome');
      $sala->capacidade = $request->get('capacidade');

      if ($sala->update()) {
        return redirect('salas/')->with('sucess', 'Sala Atualizada com sucesso');
      }
    }

    public function destroy($id){
      $sala = Sala::FindOrFail($id);
      if ($sala->delete()) {
        return redirect('salas/')->with('sucess', 'Sala Deletada com sucesso');
      }
    }
}

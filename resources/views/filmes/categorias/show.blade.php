@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Categoria: {{ $categoria->nome }}</h3>

		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" name="nome" class="form-control" value="{{$categoria->nome}}" placeholder="Nome...">
		</div>
	</div>
</div>
@stop
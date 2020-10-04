@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Sala</h3>
		@if($message = Session::get('sucess'))
		<div class="alert alert-sucess">
			{{$message}}
		</div>
		@endif
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		<form method="POST" action="{{action('SalaController@update', $id)}}">
			@csrf
			<input type="hidden" name="_method" value="PATCH">
			<div class="form-group mb-3">
				<label for="nome">Nome da Sala</label>
				<input type="text" class="form-control" id="nome" name="nome" value="{{$sala->nome}}" placeholder="Digite o nome da Sala..." required>
			</div>

			<div class="form-group mb-3">
				<label for="capacidade">Capacidade da Sala</label>
				<input type="number" class="form-control" id="capacidade" name="capacidade" value="{{$sala->capacidade}}" placeholder="Digite a Capacidade da Sala..." required>
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Salvar</button>
				<a class="btn btn-danger" href="/salas/">Voltar</a>
			</div>
		</div>
	</div>
</form>
@stop

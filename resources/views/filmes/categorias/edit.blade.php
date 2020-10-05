@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Categoria: {{ $categoria->nome }}</h3>
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

		<form method="POST" action="{{action('FilmeCategoriaController@update', $id)}}">
			@csrf
			<input type="hidden" name="_method" value="PATCH">
			<div class="form-group mb-3">
				<label for="nome">Categoria</label>
				<input type="text" class="form-control" id="nome" name="nome" value="{{$categoria->nome}}" placeholder="Digite a Categoria..." required>
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Salvar</button>
				<a class="btn btn-danger" href="{{route('categorias.index')}}">Voltar</a>
			</div>
	</div>
</div>
</form>
@stop
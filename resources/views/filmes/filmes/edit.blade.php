@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Filme</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		<form method="POST" action="{{action('FilmeController@update', $id)}}">
			@csrf
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" name="nome" value="{{$filme->nome}}" class="form-control" placeholder="Nome...">
			</div>

			<div class="form-group">
				<label for="categoria">Categoria</label>
				<select class="form-control" name="categoria_id">
					@foreach($categorias as $categoria)
					@if($categoria->id == $filme->categoria_id)
					<option value="{{$categoria->id}}" selected>
						{{$categoria->nome}}
					</option>
					@endif
					<option value="{{$categoria->id}}">
						{{$categoria->nome}}
					</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="nome">Duração</label>
				<input type="time" name="nome" value="{{$filme->duracao}}" class="form-control">
			</div>

			<div class="form-group">
				<label for="nome">3D</label>
				<select class="form-control" name="tresd">
					@if($filme->tresd==0)
					<option value="0" selected>Não</option>
					<option value="1">Sim</option>
					@else
					<option value="1" selected>Sim</option>
					<option value="0">Não</option>
					@endif
				</select>
			</div>

			<div class="input-group mb-3">
				<label for="banner">Banner</label>
				<input type="file" class="form-control-file" id="banner" name="banner">
			</div>

		</div>
		<div class="form-group">
			  <img src="{{url('img/filmes/'. $filme->banner)}}" alt="Texto" class="img-fluid img-thumbnail" width="300px" height="350px">
		</div>
	</div>


</form>
@stop

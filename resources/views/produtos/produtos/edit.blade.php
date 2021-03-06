@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Sessão</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		<form method="POST" enctype="multipart/form-data" action="{{action('ProdutoController@update', $produto->id)}}">
			@csrf
			<input type="hidden" name="_method" value="PATCH">

			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" name="nome" value="{{$produto->nome}}" class="form-control" placeholder="Nome...">
			</div>

			<div class="form-group">
				<label for="categoria">Categoria</label>
				<select class="form-control" name="categoria_id">
					@foreach($categorias as $categoria)
					<option value="{{$categoria->id}}" {{ ($categoria->id == $produto->categoria->id) ? 'selected' : null }}>
						{{$categoria->nome}}
					</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="valor">Preço</label>
				<input type="numeric" name="valor" value="{{str_replace('.', ',', $produto->valor)}}" class="form-control">
			</div>

			<div class="input-group mb-3">
				<label for="imagem">Imagem do Produto</label>
				<input type="file" class="form-control-file" id="imagem" name="imagem">
			</div>
			<br>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Salvar</button>
				<a class="btn btn-danger" href="{{ url()->previous() }}">Voltar</a>
			</div>

		</div>
		<div class="content" >
			  <img src="{{url('img/produtos/'. $produto->imagem)}}"  style="margin-left: 100px;" alt="Imagem" class="img-fluid img-thumbnail" width="300px" height="350px">
		</div>
	</div>


</form>
@stop

@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Filmes <a href="/filmes/filmes/create"><button class="btn btn-info">Novo</button></a></h3>
		@if($message = Session::get('sucess'))
		<div class="alert alert-success">
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
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nome</th>
					<th>Categoria</th>
					<th>Duração</th>
					<th>3D</th>
					<th>Banner</th>
					<th>Opções</th>
				</thead>
               @foreach ($filmes as $filme)
				<tr>
					<td>{{ $filme->id}}</td>
					<td>{{ $filme->nome}}</td>
					@foreach($categorias as $categoria)
					@if($filme->categoria_id == $categoria->id)
					<td>{{ $categoria->nome}}</td>
					@endif
					@endforeach
					<td>{{ $filme->duracao}}</td>
					<td>{{ $filme->tresd}}</td>
					<td>{{ $filme->banner}}</td>
					<td>
						<form method="POST" action="{{action('FilmeController@destroy', $filme->id)}}">
			        @csrf
			        <input type="hidden" name="_method" value="DELETE">
			          <a href="{{URL::to('/filmes/filmes/'. $filme->id . '/edit')}}" class="btn btn-primary">Editar</a>
			        <button class="btn btn-danger">Excluir </button>
			      </form>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@stop

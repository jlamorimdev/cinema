@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Salas <a href="/salas/create"><button class="btn btn-info">Novo</button></a></h3>
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
					<th>Numº</th>
					<th>Nome</th>
					<th>Capacidade</th>
					<th>Opções</th>
				</thead>
               @foreach ($salas as $sala)
				<tr>
					<td>{{ $sala->id}}</td>
					<td>{{ $sala->nome}}</td>
					<td>{{ $sala->capacidade}} vagas</td>
					<td>
						<form method="POST" action="{{action('SalaController@destroy', $sala->id)}}">
			        @csrf
			        <input type="hidden" name="_method" value="DELETE">
			          <a href="{{URL::to('/salas/'. $sala->id . '/edit')}}" class="btn btn-primary">Editar</a>
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

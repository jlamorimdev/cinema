@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Produtos <a href="/produtos/produtos/create"><button class="btn btn-info">Novo</button></a></h3>
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
					<th>Preço</th>
					<th>Foto</th>
					<th>Opções</th>
				</thead>
               @foreach ($produtos as $produto)
				<tr>
					<td>{{ $produto->id}}</td>
					<td>{{ $produto->nome}}</td>
					@foreach($categorias as $categoria)
					@if($produto->categoria == $categoria->id)
					<td>{{ $categoria->nome}}</td>
					@endif
					@endforeach
					<td>R${{str_replace('.', ',', $produto->valor)}}</td>
					<td>
						<img src="{{asset('img/produtos/' . $produto->imagem) }}" alt="{{$produto->imagem}}"
						width="80px" height="80px" class="img-thumbmail">
					</td>
					<td>
						<form method="POST" action="{{action('ProdutoController@destroy', $produto->id)}}">
			        @csrf
			        <input type="hidden" name="_method" value="DELETE">
			          <a href="{{URL::to('/produtos/produtos/'. $produto->id . '/edit')}}" class="btn btn-primary">Editar</a>
			        <button class="btn btn-danger">Excluir </button>
			      </form>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
{{$produtos->links()}}
@stop

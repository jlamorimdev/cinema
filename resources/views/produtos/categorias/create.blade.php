@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nova Categoria</h3>
		<form method="POST" action="{{route('produtos.categorias.store')}}">
			@csrf
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" name="nome" class="form-control" placeholder="Digite o nome da Categoria...">
				@if ($errors->has('nome'))
				<div class="help-block">
					<strong>{{ $errors->first('nome') }}</strong>
				</div>
				@endif
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Salvar</button>
			</div>
		</form>
	</div>
</div>
@endsection
@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nova Categoria para Filme</h3>
				<form method="POST" action="{{route('categorias.store')}}" >
					@csrf
					<div class="form-group">
						<label for="nome">Nome</label>
						<input type="text" name="nome" class="form-control" placeholder="Nome...">
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Salvar</button>
					</div>
				</form>
			</div>
	</div>
@endsection

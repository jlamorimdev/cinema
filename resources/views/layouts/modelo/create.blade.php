@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Novo Modelo</h3>
				<form method="POST" action="{{route('modelo.store')}}" >
					@csrf
					<div class="form-group">
						<label for="nome">Nome Modelo</label>
						<input type="text" name="nome" class="form-control" placeholder="Modelo Nome...">
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Salvar</button>
					</div>
				</form>
			</div>
	</div>
@endsection

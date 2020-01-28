@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nova Sala</h3>
				<form method="POST" action="{{route('salas.store')}}" >
					@csrf
					<div class="form-group">
						<label for="nome">Nome da Sala</label>
						<input type="text" name="nome" class="form-control" placeholder="Sala...">
					</div>
					<div class="form-group">
						<label for="capacidade">Capacidade da Sala</label>
						<input type="number" name="capacidade" class="form-control" placeholder="Capacidade da Sala...">
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Salvar</button>
					</div>
				</form>
			</div>
	</div>
@endsection

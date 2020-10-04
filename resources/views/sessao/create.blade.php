@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nova Sessão</h3>
		<form method="POST" action="{{route('sessao.store')}}" >
			@csrf
			<div class="form-group">
				<label for="filme">Filme</label>
				<select class="form-control" name="filme_id">
					@foreach($filmes as $filme)
					<option value="{{$filme->id}}">
						{{$filme->nome}}
					</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="sala">Sala</label>
				<select class="form-control" name="sala_id">
					@foreach($salas as $sala)
					<option value="{{$sala->id}}">
						{{$sala->nome}}
					</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="horario">Horário</label>
				<input type="time" name="horario" class="form-control">
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Salvar</button>
				<a class="btn btn-danger" href="/sessao/">Voltar</a>
			</div>
		</form>
	</div>
</div>
@endsection

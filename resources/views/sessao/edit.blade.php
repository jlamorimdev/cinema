@extends('layouts.admin')
@section('conteudo')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Sessão : </h3>
		@if($message = Session::get('sucess'))
		<div class="alert alert-sucess">
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

		<form method="POST" action="{{action('SessaoController@update', $id)}}">
			@csrf
			<input type="hidden" name="_method" value="PATCH">

			<div class="form-group">
				<label for="filme">Filme</label>
				<select class="form-control" name="filme_id">
					@foreach($filmes as $filme)
					@if($filme->id == $sessao->filme_id)
					<option value="{{$filme->id}}" selected>
						{{$filme->nome}}
					</option>
					@endif
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
					@if($sala->id == $sessao->sala_id)
					<option value="{{$sala->id}}" selected>
						{{$sala->nome}}
					</option>
					@endif
					<option value="{{$sala->id}}">
						{{$sala->nome}}
					</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="horario">Horário</label>
				<input type="time" name="horario" value="{{$sessao->horario}}" class="form-control">
			</div>



			<div class="form-group">
				<button class="btn btn-primary" type="submit">Salvar</button>
				<a class="btn btn-danger" href="/sessao/">Voltar</a>
			</div>
		</div>
	</div>
</form>
@stop

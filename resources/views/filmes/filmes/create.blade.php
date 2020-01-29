@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Novo Filme</h3>
				<form method="POST" enctype="multipart/form-data" action="{{route('filmes.store')}}" >
					@csrf
					<div class="form-group">
						<label for="nome">Nome</label>
						<input type="text" name="nome" class="form-control" placeholder="Nome...">
					</div>

					<div class="form-group">
						<label for="categoria">Categoria</label>
						<select class="form-control" name="categoria_id">
							@foreach($categorias as $categoria)
							<option value="{{$categoria->id}}">
								{{$categoria->nome}}
							</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="duracao">Duração</label>
						<input type="time" name="duracao" class="form-control">
					</div>

					<div class="form-group">
						<label for="nome">3D</label>
						<select class="form-control" name="tresd">
							<option value="0">Não</option>
							<option value="1">Sim</option>
						</select>
					</div>

					<div class="input-group mb-3">
						<label for="banner">Banner</label>
						<input type="file" class="form-control-file" id="banner" name="banner">
					</div>
					<br>

					<div class="form-group">
						<button class="btn btn-primary" type="submit">Salvar</button>
					</div>
				</form>
			</div>
	</div>
@endsection

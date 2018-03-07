@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="clo-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Docente</h3>
		@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
			
		</div>
		@endif
	</div>
</div>

		{!!Form::open(['url'=>'docentes','method'=>'POST', 'autocomplete'=>'off','files'=>'true'])!!}
		{{Form::token()}}
		<div class="row">
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label for="nombre"> Nombre</label>
					<input type="text" name="nombre" required value="{{old('name')}}" class="form-control" placeholder="Nombre ...">
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label for="apellidos"> Apellidos</label>
					<input type="text" name="apellidos" required value="{{old('name')}}" class="form-control" placeholder="Pellidos ...">
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label for="dni"> DNI</label>
					<input type="text" name="dni" required value="{{old('name')}}" class="form-control" placeholder="Dni ...">
				</div>
			</div>




			
			<div class="col-lg-6 col-sm-6 col-md-6 col-lxs-12">
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
		</div>
		
		{!!Form::close()!!}


		
@endsection
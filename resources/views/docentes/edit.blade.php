@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="clo-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Docentes {{$docente->nombre}}</h3>
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
		
		{!!Form::model($docente,['method'=>'PATCH','route'=>['docentes.update',$docente ->docenteid]])!!}
		
		{{Form::token()}}
			<div class="row">
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label for="nombre"> Nombre</label>
					<input type="text" name="nombre" required value="{{$docente->nombre}}" class="form-control" placeholder="Nombre ...">
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label for="apellidos"> Apellidos</label>
					<input type="text" name="apellidos" required value="{{$docente->apellidos}}" class="form-control" placeholder="Apellidos ...">
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label for="dni"> DNI</label>
					<input type="text" name="dni" required value="{{$docente->dni}}" class="form-control" placeholder="DNI ...">
				</div>
			</div>
			
			
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
		</div>
		
		{!!Form::close()!!}
		
	


@endsection
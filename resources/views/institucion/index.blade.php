@extends('layouts.admin')
@section('contenido')

<div class="row">
	<div class="clo-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Instituciones<a href="institucion/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('institucion.search')
	</div>
</div>
<div class="row">
	<div class="clo-lg-8 col-md-8 col-sm-8 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<head>
					<th>Nombre</th>
					<th>Departamento</th>
					<th>provincia</th>
					<th>Distrito</th>
					<th>Opciones</th>
				</head>
				@foreach($instituciones as $is)
				<tr>
		
					
					<td>{{$is->nombreInstitucion}}</td>
					<td>{{$is->nombreDepartamento}}</td>
					<td>{{$is->nombreProvincia}}</td>
					<td>{{$is->nombreDistrito}}</td>
					
					<td>
						<a href="{{URL::action('institucionController@edit',$is->institucionid)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$is->institucionid}}"  data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>

				</tr>
				@include('institucion.modal')
				@endforeach
				
			</table>
			
		</div>
		{{$instituciones->render()}}
	</div>
</div>
@endsection

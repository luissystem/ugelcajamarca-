@extends('layouts.admin')
@section('contenido')

<div class="row">
	<div class="clo-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Docente<a href="docentes/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('docentes.search')
	</div>
	
</div>
<div class="row">
	<div class="clo-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<head>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Dni</th>
					
					<th>Opciones</th>
				</head>
				@foreach($docentes as $d)
				<tr>
		
					
					<td>{{$d->nombre}}</td>
					<td>{{$d->apellidos}}</td>
					<td>{{$d->dni}}</td>
				
					
					<td>
						<a href="{{URL::action('DocenteController@edit',$d->docenteid)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$d->docenteid}}"  data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>

				</tr>
				@include('docentes.modal')
				@endforeach
				
			</table>
			
		</div>
		{{$docentes->render()}}
	</div>
</div>
@endsection
@extends('layouts.admin')
@section('contenido')

<div class="row">
	<div class="clo-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Planillas<a href="planillas/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('planillas.search')
	</div>
	
</div>
<div class="row">
	<div class="clo-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<head>
					<th>Institucion</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>año</th>
					<th>mes</th>	
					<th>imagen</th>				
					<th>Opciones</th>
				</head>
				@foreach($Planilla as $p)
				<tr>
		
					<td>{{$p->nombreInstitucion}}</td>
					<td>{{$p->nombre}}</td>
					<td>{{$p->apellidos}}</td>
					<td>{{$p->anio}}</td>
					<td>{{$p->mes}}</td>
					<td>
						<img src="{{asset('imagenes/planillas/'.$p->imagen)}}" alt="$p->nombre" height="100px" width="100px" class="img-thumbnail">

					</td>
					
					<td>
						<a href="{{URL::action('PlanillaController@edit',$p->planillaid)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$p->planillaid}}"  data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>

				</tr>
				@include('planillas.modal')
				@endforeach
				
			</table>
			
		</div>
		{{$Planilla->render()}}
	</div>
</div>
@endsection
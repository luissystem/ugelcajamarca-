
@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="clo-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar  Panilla</h3>
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

		{!!Form::model($planilla,['method'=>'PATCH','route'=>['planillas.update',$planilla ->planillaid],'file'=>'true'])!!}
		<div class="row">

			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label>Docente</label>
					<select name="iddocente"  class="form-control">
						
						@foreach($Docente as $d)
						
						@if($d->docenteid==$planilla->iddocente)
							<option value="{{$d->docenteid}}" selected>{{$d->nombre}}</option>
						@else
							<option value="{{$d->docenteid}}">{{$d->nombre}}</option>
						@endif
						@endforeach

					</select>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label>Departamento</label>
					<select name="Dep"  id="Dep" class="form-control">
						@foreach($Departamentos as $de)
							<option value="{{$de->departamentoid}}">{{$de->nombreDepartamento}}</option>

							@if($de->departamentoid==$planilla->iddepartamento)
							<option value="{{$de->departamentoid}}" selected>{{$d->nombreDepartamento}}</option>
						@else
							<option value="{{$de->departamentoid}}">{{$de->nombreDepartamento}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label>Provincias</label>
					<select name="provinces" id="provinces" class="form-control">
						
							 <option value="0" disable="true" selected="true">Select Provincia</option>
						
					</select>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group" >
					<label>distritos</label>
					<select name="iddistrito" id="districts" class="form-control">
						
							 <option value="0" disable="true" selected="true">Select Distrito</option>
						
					</select>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group" >
					<label>Institucion</label>
					<select name="idinstitucion" id="institucion" class="form-control">
						
							 <option value="0" disable="true" selected="true">Select Institucion</option>
						
					</select>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label for="anio"> Año</label>
					<input type="text" name="anio" required value="{{$planilla->anio}}" class="form-control"">
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label>Mes</label>
					<select name="mes" class="form-control">

						@if($planilla->mes=='Enero')
							<option value="Enero" selected>Enero</option>
							<option value="Febrero">Febrero</option>
							<option value="Marzo">Marzo</option>
							<option value="Abril">Abril</option>
							<option value="Mayo">Mayo</option>
							<option value="Junio">Junio</option>
							<option value="Julio">Julio</option>
							<option value="Agosto">Agosto</option>
							<option value="Septiembre">Septiembre</option>
							<option value="Octubre">Octubre</option>
							<option value="Noviembre">Noviembre</option>
							<option value="Diciembre">Diciembre</option>
							
						@elseif($planilla->mes=='Fenbrero')
							<option value="Enero">Enero</option>
							<option value="Febrero" selected>Febrero</option>
							<option value="Marzo">Marzo</option>
							<option value="Abril">Abril</option>
							<option value="Mayo">Mayo</option>
							<option value="Junio">Junio</option>
							<option value="Julio">Julio</option>
							<option value="Agosto">Agosto</option>
							<option value="Septiembre">Septiembre</option>
							<option value="Octubre">Octubre</option>
							<option value="Noviembre">Noviembre</option>
							<option value="Diciembre">Diciembre</option>
						@elseif($planilla->mes=='Marzo')
							<option value="Enero">Enero</option>
							<option value="Febrero" >Febrero</option>
							<option value="Marzo" selected>Marzo</option>
							<option value="Abril">Abril</option>
							<option value="Mayo">Mayo</option>
							<option value="Junio">Junio</option>
							<option value="Julio">Julio</option>
							<option value="Agosto">Agosto</option>
							<option value="Septiembre">Septiembre</option>
							<option value="Octubre">Octubre</option>
							<option value="Noviembre">Noviembre</option>
							<option value="Diciembre">Diciembre</option>
						@elseif($planilla->mes=='Abril')
							<option value="Enero">Enero</option>
							<option value="Febrero" >Febrero</option>
							<option value="Marzo">Marzo</option>
							<option value="Abril" selected>Abril</option>
							<option value="Mayo">Mayo</option>
							<option value="Junio">Junio</option>
							<option value="Julio">Julio</option>
							<option value="Agosto">Agosto</option>
							<option value="Septiembre">Septiembre</option>
							<option value="Octubre">Octubre</option>
							<option value="Noviembre">Noviembre</option>
							<option value="Diciembre">Diciembre</option>

						@elseif($planilla->mes=='Mayo')
							<option value="Enero">Enero</option>
							<option value="Febrero" >Febrero</option>
							<option value="Marzo">Marzo</option>
							<option value="Abril">Abril</option>
							<option value="Mayo" selected>Mayo</option>
							<option value="Junio">Junio</option>
							<option value="Julio">Julio</option>
							<option value="Agosto">Agosto</option>
							<option value="Septiembre">Septiembre</option>
							<option value="Octubre">Octubre</option>
							<option value="Noviembre">Noviembre</option>
							<option value="Diciembre">Diciembre</option>
						@elseif($planilla->mes=='Junio')
							<option value="Enero">Enero</option>
							<option value="Febrero" >Febrero</option>
							<option value="Marzo">Marzo</option>
							<option value="Abril">Abril</option>
							<option value="Mayo">Mayo</option>
							<option value="Junio" selected>Junio</option>
							<option value="Julio">Julio</option>
							<option value="Agosto">Agosto</option>
							<option value="Septiembre">Septiembre</option>
							<option value="Octubre">Octubre</option>
							<option value="Noviembre">Noviembre</option>
							<option value="Diciembre">Diciembre</option>
						@elseif($planilla->mes=='Junio')
							<option value="Enero">Enero</option>
							<option value="Febrero" >Febrero</option>
							<option value="Marzo">Marzo</option>
							<option value="Abril">Abril</option>
							<option value="Mayo">Mayo</option>
							<option value="Junio" selected>Junio</option>
							<option value="Julio">Julio</option>
							<option value="Agosto">Agosto</option>
							<option value="Septiembre">Septiembre</option>
							<option value="Octubre">Octubre</option>
							<option value="Noviembre">Noviembre</option>
							<option value="Diciembre">Diciembre</option>
						@elseif($planilla->mes=='Julio')
							<option value="Enero">Enero</option>
							<option value="Febrero" >Febrero</option>
							<option value="Marzo">Marzo</option>
							<option value="Abril">Abril</option>
							<option value="Mayo">Mayo</option>
							<option value="Junio">Junio</option>
							<option value="Julio" selected>Julio</option>
							<option value="Agosto">Agosto</option>
							<option value="Septiembre">Septiembre</option>
							<option value="Octubre">Octubre</option>
							<option value="Noviembre">Noviembre</option>
							<option value="Diciembre">Diciembre</option>
						@elseif($planilla->mes=='Agosto')
							<option value="Enero">Enero</option>
							<option value="Febrero" >Febrero</option>
							<option value="Marzo">Marzo</option>
							<option value="Abril">Abril</option>
							<option value="Mayo">Mayo</option>
							<option value="Junio">Junio</option>
							<option value="Julio">Julio</option>
							<option value="Agosto" selected>Agosto</option>
							<option value="Septiembre">Septiembre</option>
							<option value="Octubre">Octubre</option>
							<option value="Noviembre">Noviembre</option>
							<option value="Diciembre">Diciembre</option>
						@elseif($planilla->mes=='Septiembre')
							<option value="Enero">Enero</option>
							<option value="Febrero" >Febrero</option>
							<option value="Marzo">Marzo</option>
							<option value="Abril">Abril</option>
							<option value="Mayo">Mayo</option>
							<option value="Junio">Junio</option>
							<option value="Julio">Julio</option>
							<option value="Agosto">Agosto</option>
							<option value="Septiembre" selected>Septiembre</option>
							<option value="Octubre">Octubre</option>
							<option value="Noviembre">Noviembre</option>
							<option value="Diciembre">Diciembre</option>
						@elseif($planilla->mes=='Octubre')
							<option value="Enero">Enero</option>
							<option value="Febrero" >Febrero</option>
							<option value="Marzo">Marzo</option>
							<option value="Abril">Abril</option>
							<option value="Mayo">Mayo</option>
							<option value="Junio">Junio</option>
							<option value="Julio">Julio</option>
							<option value="Agosto">Agosto</option>
							<option value="Septiembre">Septiembre</option>
							<option value="Octubre" selected>Octubre</option>
							<option value="Noviembre">Noviembre</option>
							<option value="Diciembre">Diciembre</option>
						@elseif($planilla->mes=='Noviembre')
							<option value="Enero">Enero</option>
							<option value="Febrero" >Febrero</option>
							<option value="Marzo">Marzo</option>
							<option value="Abril">Abril</option>
							<option value="Mayo">Mayo</option>
							<option value="Junio">Junio</option>
							<option value="Julio">Julio</option>
							<option value="Agosto">Agosto</option>
							<option value="Septiembre">Septiembre</option>
							<option value="Octubre">Octubre</option>
							<option value="Noviembre" selected>Noviembre</option>
							<option value="Diciembre">Diciembre</option>

						@else
							<option value="Enero">Enero</option>
							<option value="Febrero" >Febrero</option>
							<option value="Marzo">Marzo</option>
							<option value="Abril">Abril</option>
							<option value="Mayo">Mayo</option>
							<option value="Junio">Junio</option>
							<option value="Julio">Julio</option>
							<option value="Agosto">Agosto</option>
							<option value="Septiembre">Septiembre</option>
							<option value="Octubre">Octubre</option>
							<option value="Noviembre">Noviembre</option>
							<option value="Diciembre" selected>Diciembre</option>
						@endif

							
							
						
					</select>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label for="imagen"> Imagen</label>
					@if(($planilla->imagen)!="")
					<img src="{{asset('imagenes/planillas/'.$planilla->imagen)}}"  height="300px" width="300px">
					@endif
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

<script src="{{asset('js2/app.js')}}"></script>
<script type="text/javascript">

$('#Dep').on('change', function(e){
        console.log(e);
        var iddepartamento = e.target.value;
        $.get('/json-lisprovincias?iddepartamento=' + iddepartamento,function(data) {
            console.log(data);
         
           $('#provinces').empty();
          $('#provinces').append('<option value="0" disable="true" selected="true"> Select Provincia</option>');

          $('#districts').empty();
          $('#districts').append('<option value="0" disable="true" selected="true"> Select Distrito</option>');

          

          $.each(data, function(index, regenciesObj){
            $('#provinces').append(

            	

            '<option value="'+ regenciesObj.provinciaid +'">'+ regenciesObj.nombreProvincia +'</option>'



            	);
          })

        });
      });
 $('#provinces').on('change', function(e){
        console.log(e);
        var idprovincia = e.target.value;
        $.get('/json-lisdistritos?idprovincia=' + idprovincia,function(data) {
          console.log(data);
          $('#districts').empty();
          $('#districts').append('<option value="0" disable="true" selected="true"> Select Distrito</option>');

          $.each(data, function(index, districtsObj){
            $('#districts').append('<option value="'+ districtsObj.distritoid +'">'+ districtsObj.nombreDistrito +'</option>');
          })
        });
      });
$('#districts').on('change', function(e){
        console.log(e);
        var iddistrito = e.target.value;
        $.get('/json-lisInstitucion?iddistrito=' + iddistrito,function(data) {
          console.log(data);
          $('#institucion').empty();
          $('#institucion').append('<option value="0" disable="true" selected="true"> Select Distrito</option>');

          $.each(data, function(index, institucionObj){
            $('#institucion').append('<option value="'+ institucionObj.institucionid +'">'+ institucionObj.nombreInstitucion +'</option>');
          })
        });
      });
</script>
		
@endsection
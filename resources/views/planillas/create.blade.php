@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="clo-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Panilla</h3>
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

		{!!Form::open(['url'=>'planillas','method'=>'POST', 'autocomplete'=>'off','files'=>'true'])!!}
		{{Form::token()}}
		<div class="row">

			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label>Docente</label>
					<select name="iddocente"  class="form-control">
						 <option value="0" disable="true" selected="true">Select Docente</option>
						@foreach($Docente as $d)
							<option value="{{$d->docenteid}}">{{$d->apellidos}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label>Departamento</label>
					<select name="Dep"  id="Dep" class="form-control">
						 <option value="0" disable="true" selected="true">Select Departamento</option>
						@foreach($Departamentos as $de)
							<option value="{{$de->departamentoid}}">{{$de->nombreDepartamento}}</option>
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
					<input type="text" name="anio" required value="{{old('name')}}" class="form-control" placeholder="Año ...">
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label>Mes</label>
					<select name="mes" class="form-control">
							<option value="0" disable="true" selected="true">Select Mes</option>
							<option value="Enero">Enero</option>
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
						
					</select>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label for="imagen"> Imagen</label>
					<input type="file" name="imagen" class="form-control">
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
            $('#provinces').append('<option value="'+ regenciesObj.provinciaid +'">'+ regenciesObj.nombreProvincia +'</option>');
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
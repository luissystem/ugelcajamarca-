@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="clo-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nueva Institucion</h3>
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

		{!!Form::open(['url'=>'institucion','method'=>'POST', 'autocomplete'=>'off'])!!}
		{{Form::token()}}
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-md-12 col-lxs-12">
				<div class="form-group">
					<label for="nombre"> Nombre</label>
					<input type="text" name="nombreInstitucion" required value="{{old('name')}}" class="form-control" placeholder="Nombre ...">
				</div>
			</div>
			{{Form::open(array('url'=>'','files'=>true))}}

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
			{{Form::close()}}
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

</script>


		
@endsection
{!!Form::open(array('url'=>'institucion','method'=>'GET','autocomplete'=>'off', 'role'=>'search'))!!}
<div class="form-inline">


		{{Form::open(array('url'=>'','files'=>true))}}

			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label>Departamento</label>
					<select name="Dep"  id="Dep" class="form-control" onchange="buscarinstitucion();">
						 <option value="0" disable="true" selected="true">Select </option>
						@foreach($Departamento as $de)
							<option value="{{$de->departamentoid}}">{{$de->nombreDepartamento}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group">
					<label>Provincias</label>
					<select name="provinces" id="provinces" class="form-control">
						
							 <option value="0" disable="true" selected="true">Select </option>
						
					</select>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
				<div class="form-group" >
					<label>distritos</label>
					<select name="iddistrito" id="districts" class="form-control">
						
							 <option value="0" disable="true" selected="true">Select </option>
						
					</select>
				</div>
			</div>
			{{Form::close()}}

		<div class="col-lg-4 col-sm-4 col-md-4 col-lxs-12">
		<div class="input-group">
		
		<input type="text" class="form-control" name="searchText" placeholder="Buscar ..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
			
		</span>
		
		</div>
		</div>
	
	
	
</div>
{{Form::close()}}

<script src="{{asset('js2/app.js')}}"></script>
<script type="text/javascript">
$('#Dep').on('change', function(e){
        console.log(e);
        var iddepartamento = e.target.value;
        $.get('/json-lisprovincias?iddepartamento=' + iddepartamento,function(data) {
           // console.log(data);
         
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
         // console.log(data);
          $('#districts').empty();
          $('#districts').append('<option value="0" disable="true" selected="true"> Select Distrito</option>');

          $.each(data, function(index, districtsObj){
            $('#districts').append('<option value="'+ districtsObj.distritoid +'">'+ districtsObj.nombreDistrito +'</option>');
          })
        });
      });

 function buscarinstitucion(){

  var districts=$("#districts").val();
  var dato=$("#searchText").val();

  console.log(districts);
      if(dato == "")
    {
    
      var url="buscar_institucion/"+districts+"";
    }
    else
    {
      var url="buscar_institucion/"+districts+"/"+dato+"";
    }
  
  $("#contenido_principal").html($("#cargador_empresa").html());
 $.get(url,function(resul){
    $("#contenido_principal").html(resul);  
  })

}

</script>
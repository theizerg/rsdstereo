<div class="car-body">
	<div class="row card-body">
 <input name="users_id" type="hidden" value=" {{ auth()->user()->id}}" id="users_id">
		<div class="col-sm-4">
			<strong>Nombres</strong><br>
			 	 <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>

                  {!! Form::select('empleado_id', $nombres, null,array('class' => 'form-control input-sm','placeholder'=>'Seleccione','id'=>'empleado_id')) !!}
                </div>
                 <input name="users_id" type="hidden" value=" {{ auth()->user()->id}}" id="users_id">
                <span class="missing_alert text-danger" id="tx_nombres_alert"></span>
			</div>
			<div class="col-sm-4">
			<strong>Cédula</strong><br>
			 	 <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-card"></i></span>
                  </div>
                   {!! Form::select('nu_cedula', $cedula, null,array('class' => 'form-control input-sm','placeholder'=>'Seleccione','id'=>'nu_cedula')) !!}
                </div>
                <span class="missing_alert text-danger" id="tx_apellidos_alert"></span>
			</div>
			<div class="col-sm-4">
			<strong>Día de la semana</strong><br>
			 	 <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                  </div>

                   {!! Form::select('nb_dia', $dias, null,array('class' => 'form-control input-sm','placeholder'=>'Seleccione','id'=>'nb_dia')) !!}
                </div>
                <span class="missing_alert text-danger" id="nb_dia_alert"></span>
			</div>
			<div class="col-sm-6">
			<strong>Hora de llegada</strong><br>
			 	 <div class="input-group mb-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><input type="checkbox" id="entrada"></span>
                  </div>
                  <input type="text" class="form-control" value="{{ $horaActual }}" id="h_llegada" name="h_llegada"> 
                </div>
                <span class="missing_alert text-danger" id="h_llegada_alert" name=""></span>
			</div>
			<div class="col-sm-6">
			<strong>Hora de salida</strong><br>
			 	 <div class="input-group mb-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><input type="checkbox" id="h_salida"></span>
                  </div>
                  <input type="text" class="form-control" value="{{ $horaActual }}" id="h_salida" name="h_salida"> 
                </div>
                <span class="missing_alert text-danger" id="tx_correo_alert"></span>
			</div>
			
			<div class="col-sm-12">
			  <div class="card-footer">
			  	 <button type="submit" class="btn btn-primary ajax" id="submit">
                <i id="ajax-icon" class="fa fa-save"></i> Guardar
              </button>
			  </div>				
			</div>
		</div>
	</div>



@push('scripts')
<script type="text/javascript">
  
  $('#entrada').on('change', function(){
    if($(this).is(':checked') ){
      $ (" #h_salida").prop( "disabled" , true);
    }else

    $ ("#h_salida").prop( "disabled" , false);
    
   
  })



</script>

@endpush










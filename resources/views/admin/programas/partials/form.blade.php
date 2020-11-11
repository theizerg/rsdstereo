<div class="car-body">

	<div class="row card-body">
 <input name="users_id" type="hidden" value=" {{ auth()->user()->id}}" id="users_id">
		<div class="col-sm-4">
			<strong>Nombre del programa:</strong><br>
			 	 <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>

                  {{ Form:: text('nb_nombre',null,['class'=>'form-control','placeholder' => 'Ingrese el nombre del programa','id'=>'nb_nombre']) }}
                </div>
                 <input name="users_id" type="hidden" value=" {{ auth()->user()->id}}" id="users_id">
                <span class="missing_alert text-danger" id="nb_nombre_alert"></span>
			</div>
			<div class="col-sm-4">
			<strong>Moderador (s)</strong><br>
			 	 <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  {{ Form:: text('nb_moderador',null,['class'=>'form-control','placeholder' => 'Moderador (s)','id'=>'nb_moderador']) }}
                </div>
                <span class="missing_alert text-danger" id="nb_moderador_alert"></span>
			</div>
			<div class="col-sm-4">
			<strong>Tipo de programa</strong><br>
			 	 <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  {!! Form::select('tipo_programa_id', $tipoProgramas, null,array('class' => 'form-control ','placeholder'=>'Seleccione el tipo de programa','id'=>'tipo_programa_id')) !!}
                </div>
                <span class="missing_alert text-danger" id="nu_cedula_alert"></span>
			</div>
			<div class="col-sm-4">
			<strong>Desde</strong><br>
			 	 <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                  </div>
                  {{ Form:: text('nb_desde',null,['class'=>'form-control','placeholder' => 'Hora que comienza el programa','id'=>'nb_desde']) }}
                </div>
                <span class="missing_alert text-danger" id="nb_desde_alert"></span>
			</div>
			<div class="col-sm-4">
			<strong>Hasta</strong><br>
			 	 <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                  </div>
                  {{ Form:: text('nb_hasta',null,['class'=>'form-control','placeholder' => 'Hora que termina el programa','id'=>'nb_hasta']) }}
                </div>
                <span class="missing_alert text-danger" id="nb_hasta_alert"></span>
			</div>
      <div class="col-sm-4">
      <strong>Estado del programa</strong><br>
         <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                  </div>
                   <input type="radio" name="status" value="1" checked> Activo&nbsp;&nbsp;
                    <input type="radio" name="status" value="0"> Deshabilitado
                </div>
                <span class="missing_alert text-danger" id="nb_hasta_alert"></span>
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














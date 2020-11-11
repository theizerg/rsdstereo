<div class="car-body">
			<center><h4>Datos personales</h4></center>
	<div class="row card-body">
 <input name="users_id" type="hidden" value=" {{ auth()->user()->id}}" id="users_id">
		<div class="col-sm-3">
			<strong>Nombres</strong><br>
			 	 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>

                  {{ Form:: text('tx_nombres',null,['class'=>'form-control','placeholder' => 'Nombres','id'=>'tx_nombres']) }}
                </div>
                 <input name="users_id" type="hidden" value=" {{ auth()->user()->id}}" id="users_id">
                <span class="missing_alert text-danger" id="tx_nombres_alert"></span>
			</div>
			<div class="col-sm-3">
			<strong>Apellidos</strong><br>
			 	 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  {{ Form:: text('tx_apellidos',null,['class'=>'form-control','placeholder' => 'Apellidos','id'=>'tx_apellidos']) }}
                </div>
                <span class="missing_alert text-danger" id="tx_apellidos_alert"></span>
			</div>
			<div class="col-sm-3">
			<strong>Cédula</strong><br>
			 	 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  {{ Form:: text('nu_cedula',null,['class'=>'form-control','placeholder' => 'Cédula','id'=>'nu_cedula']) }}
                </div>
                <span class="missing_alert text-danger" id="nu_cedula_alert"></span>
			</div>
			<div class="col-sm-3">
			<strong>Edad</strong><br>
			 	 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  {{ Form:: text('nu_edad',null,['class'=>'form-control','placeholder' => 'Edad','id'=>'nu_edad']) }}
                </div>
                <span class="missing_alert text-danger" id="nu_edad_alert"></span>
			</div>
			<div class="col-sm-3">
			<strong>Correo electrónico</strong><br>
			 	 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  {{ Form:: text('tx_correo',null,['class'=>'form-control','placeholder' => 'Correo electrónico','id'=>'tx_correo']) }}
                </div>
                <span class="missing_alert text-danger" id="tx_correo_alert"></span>
			</div>
			<div class="col-sm-3">
			<strong>Teléfono</strong><br>
			 	 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  {{ Form:: text('nu_telefono',null,['class'=>'form-control','placeholder' => 'Número telefónico','id'=>'nu_telefono']) }}
                </div>
                <span class="missing_alert text-danger" id="nu_telefono_alert"></span>
			</div>
			<div class="col-sm-3">
			<strong>Fecha de ingreso</strong><br>
			 	 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                  </div>
                  {{ Form:: date('fe_ingreso',null,['class'=>'form-control','placeholder' => 'Fecha de ingreso','id'=>'fe_ingreso']) }}
                </div>
                <span class="missing_alert text-danger" id="fe_ingreso_alert"></span>
			</div>
			<div class="col-sm-3">
			<strong>Ocupación</strong><br>
			 	 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  {{ Form:: text('nb_ocupacion',null,['class'=>'form-control','placeholder' => 'Ocupación','id'=>'nb_ocupacion']) }}
                </div>
                <span class="missing_alert text-danger" id="nb_ocupacion_alert"></span>
			</div>
			<div class="col-sm-3">
			<strong>Ciudad de nacimiento</strong><br>
			 	 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                   {!! Form::select('estado_id', $estado, null,array('class' => 'form-control ','placeholder'=>'Selecione un estado del país','id'=>'estado_id')) !!}
                </div>
                <span class="missing_alert text-danger" id="estado_id_alert"></span>
			</div>
			<div class="col-sm-3">
			<strong>País de nacimiento</strong><br>
			 	 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                    {!! Form::select('lugar_nacimiento_id', $pais, null,array('class' => 'form-control input-sm','placeholder'=>'Lugar de nacimiento','id'=>'lugar_nacimiento_id')) !!}
                </div>
                <span class="missing_alert text-danger" id="lugar_nacimiento_id_alert"></span>
			</div>
			<div class="col-sm-3">
			<strong>Nacionalidad</strong><br>
			 	 <div class="input-group mb-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                     {!! Form::select('nacionalidad_id', $nacionalidad, null,array('class' => 'form-control input-sm','placeholder'=>'Nacionalidad','id'=>'nacionalidad_id')) !!}
                </div>
                <span class="missing_alert text-danger" id="nacionalidad_id_alert"></span>
			</div>
			<div class="col-sm-3">
			<strong>Fecha de nacimiento</strong><br>
			 	 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                     {{ Form:: date('fe_nacimiento',null,['class'=>'form-control','placeholder' => 'Fecha de ingreso','id'=>'fe_nacimiento']) }}
                </div>
                <span class="missing_alert text-danger" id="fe_nacimiento_alert"></span>
			</div>
			<div class="col-sm-3">
			<strong>Género</strong><br>
			 	 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                      {!! Form::select('genero_id', $genero, null,array('class' => 'form-control input-sm','placeholder'=>'Género','id'=>'genero_id')) !!}
                </div>
                <span class="missing_alert text-danger" id="fe_nacimiento_alert"></span>
			</div>
			<div class="col-sm-3">
			<strong>Grado de instrucción</strong><br>
			 	 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                   {!! Form::select('grado_instruccion_id', $gradoIns, null,array('class' => 'form-control input-sm','placeholder'=>'Grado de instruccion','id'=>'grado_instruccion_id')) !!}
                </div>
                <span class="missing_alert text-danger" id="grado_instruccion_id_alert"></span>
			</div>
			<div class="col-sm-3">
			<strong>Estado civil</strong><br>
			 	 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                   {!! Form::select('estado_civil_id', $estadoC, null,array('class' => 'form-control input-sm','placeholder'=>'Estado civil','id'=>'estado_civil_id')) !!}
                </div>
                <span class="missing_alert text-danger" id="grado_instruccion_id_alert"></span>
			</div>
      <div class="col-sm-3">
      <strong>Dirección</strong><br>
         <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  {{ Form:: text('tx_direccion',null,['class'=>'form-control','placeholder' => 'Ocupación','id'=>'tx_direccion']) }}
                </div>
                <span class="missing_alert text-danger" id="tx_direccion_alert"></span>
      </div>

			<div class="col-sm-4">
				<strong>¿Sufre alguna enfermedad?</strong><br>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                 
                   <select class="form-control input-sm" style="width: 100%;" id ="nb_sufre_enfermedad" name="nb_sufre_enfermedad">
                  <option selected="selected">Seleccione</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
                </div>
                <span class="missing_alert text-danger" id="grado_instruccion_id_alert"></span>
			</div>
			<div class="col-sm-4">
			<strong>Descripción de la enfermedad</strong><br>
			 	 <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                   {{ Form:: text('nb_descripcion_enfermedad',null,['class'=>'form-control','placeholder' => 'Nombre de la enfermedad','id'=>'nb_descripcion_enfermedad']) }}
                </div>
                <span class="missing_alert text-danger" id="nb_descripcion_enfermedadn_alert"></span>
			</div>
			<div class="col-sm-4">
			<strong>Tipo de sangre</strong><br>
			 	 <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                    {!! Form::select('tipo_sangre_id', $tipoSangre, null,array('class' => 'form-control input-sm','placeholder'=>'Tipo de sangre','id'=>'tipo_sangre_id')) !!}
                </div>
                <span class="missing_alert text-danger" id="tipo_sangre_id_alert"></span>
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














@extends('back.layout')

@section('css')
<link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">

@endsection

@section('main')

<div class="row">
	@if ($errors->count())
        @component('back.components.alert')
            @slot('type')
                danger
            @endslot
                @lang('There is some validation issue...')<br>-
                {!! implode('<br/>- ', $errors->all(':message')) !!}
        @endcomponent
    @endif
    @if (session('ok'))
        @component('back.components.alert')
            @slot('type')
                success
            @endslot
            {!! session('ok') !!}
        @endcomponent
    @endif
</div>
<!-- /.row -->

@if(!empty($grupo_formacion))
<div class="row">
	<div class="col-sm-6">
		<div class="info-box">
		  <!-- Apply any bg-* class to to the icon to color it -->
		  <span class="info-box-icon bg-aqua"><i class="fa fa-user-circle"></i></span>
		  <div class="info-box-content">
		    <span class="info-box-text">Moderador/es:</span>
			@foreach($grupo_formacion->moderadores as $moderador)
		    	<p><b>- {{$moderador->usuario->name}}</b></p>
		    @endforeach
		  </div>
		  <!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col-sm-6 -->

	<div class="col-sm-6">
		<!-- Apply any bg-* class to to the info-box to color it -->
		<div class="info-box bg-{{$info_box_color}}">
		  <span class="info-box-icon"><i class="fa fa-users"></i></span>
		  <div class="info-box-content">
		    <span class="info-box-text">Total de Asistentes</span>
		    <span class="info-box-number">{{$grupo_formacion->asistentes->count()}} / {{$grupo_formacion->nr_cupo_maximo}}</span>
		    <!-- The progress section is optional -->
		    <div class="progress">
		      <div class="progress-bar" style="width: {{ $porcentaje_cupo }}%"></div>
		    </div>
		    <span class="progress-description">
		      {{ ($porcentaje_cupo<100)?(100-$porcentaje_cupo):0 }}% de cupo disponible
		    </span>
		  </div>
		  <!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col-sm-6 -->
</div>
<!-- /.row -->
@endif

<div id="box_form" class="box {{$box_color ?? 'primary'}}">
	<div class="box-header with-border">
		<h3 class="box-title">{{(!empty($bo_moderador) && $bo_moderador)?'Nuevo Moderador':'Nuevo Integrante'}}</h3>
		<div class="box-tools pull-right">
			<!-- Buttons, labels, and many other things can be placed here! -->
			<!-- Here is a label for example -->
		</div>
		<!-- /.box-tools -->
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<!-- form start -->
        <form id="form" role="form" method="POST" action="{{ (empty($id_grupo_formacion) && $bo_moderador) ? route('discipulado.moderador.store') : route('discipulado.asistentes.store') }}">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="box-body">
                <input type="hidden" id="id_usuario" name="id_usuario" value="">
                @if(!empty($id_grupo_formacion))
            	   <input type="hidden" id="id_grupo_formacion" name="id_grupo_formacion" value="{{ $id_grupo_formacion }}">
                @endif
                @if(!empty($grupo_formacion))
            		<input type="hidden" id="nr_cupo_maximo" name="nr_cupo_maximo" value="{{ $grupo_formacion->nr_cupo_maximo }}">

					<input type="hidden" id="gl_tipo_grupo_formacion" name="gl_tipo_grupo_formacion" value="{{ $grupo_formacion->tipo_grupo_formacion->gl_nombre }}">
            	   	<input type="hidden" id="nr_edad_minima" name="nr_edad_minima" value="{{ $grupo_formacion->tipo_grupo_formacion->json_datos['nr_edad_minima'] }}">
            	   	<input type="hidden" id="nr_edad_maxima" name="nr_edad_maxima" value="{{ $grupo_formacion->tipo_grupo_formacion->json_datos['nr_edad_maxima'] }}">
                @endif


                <div class="col-sm-12">
                	<div class="row">
                		<div class="col-sm-3">
	                       <div class="form-check">
	    					    <input type="checkbox" value="1" class="form-check-input" id="bo_sin_mail" name="bo_sin_mail" {{ (old('bo_sin_mail')) ? 'checked' : '' }}>
	    					    <label class="form-check-label" for="bo_sin_mail">@lang('Sin Mail')</label>
	    					</div>
	                    </div>
	                </div>
                	<div class="row">
                		<div class="col-sm-6" id="contenedor_email">
                			<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
		                        <label for="email">@lang('Email') *</label>
		                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" onblur="validaEmail(this, 'Correo Inválido!')" required>
		                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
		                    </div>
                		</div>

	                    <div class="col-sm-3">
	                        <div class="form-group {{ $errors->has('rut') ? 'has-error' : '' }}">
		                        <label for="name">@lang('rut')</label>
								<input type="text" class="form-control" id="rut" name="rut" value="{{ old('rut') }}" maxlength="12"
								   onkeyup="formateaRut(this), this.value = this.value.toUpperCase()" onkeypress ="return soloNumerosYK(event)"
								   onblur="ValidaRut(this)"  placeholder="Rut"/>

		                        {!! $errors->first('rut', '<small class="help-block">:message</small>') !!}
		                    </div>
	                    </div>

	                    <div class="col-sm-3">
	                       <div class="form-check {{ $errors->has('bo_moderador') ? 'has-error' : '' }}" style="margin-top: 30px;">
	    					    <input type="checkbox" value="1" class="form-check-input" id="bo_moderador" name="bo_moderador" {{ (old('bo_moderador')) ? 'checked' : ((isset($bo_moderador) && $bo_moderador) ? 'checked' : '') }}>
	    					    <label class="form-check-label" for="exampleCheck1">@lang('Es Moderador')</label>
	    					    {!! $errors->first('bo_moderador', '<small class="help-block">:message</small>') !!}
	    					</div>
	                    </div>
	                </div>
	            </div>

	            <div id="datos_usuario"><!-- style="display: none">-->

					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group {{ $errors->has('nombres') ? 'has-error' : '' }}">
		                            <label for="name">@lang('nombres') *</label>
		                            <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres') }}" required>
		                            {!! $errors->first('nombres', '<small class="help-block">:message</small>') !!}
		                        </div>
							</div>

							<div class="col-sm-3">
								 <div class="form-group {{ $errors->has('apellido_paterno') ? 'has-error' : '' }}">
		                            <label for="name">@lang('Apellido Paterno') *</label>
		                            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required>
		                            {!! $errors->first('apellido_paterno', '<small class="help-block">:message</small>') !!}
		                        </div>
							</div>

							<div class="col-sm-3">
								<div class="form-group {{ $errors->has('apellido_materno') ? 'has-error' : '' }}">
		                            <label for="name">@lang('Apellido Materno')</label>
		                            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno') }}" >
		                            {!! $errors->first('apellido_materno', '<small class="help-block">:message</small>') !!}
		                        </div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
		                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : '' }}">
		                            <label for="name">@lang('Dirección')</label>
		                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}">
		                            {!! $errors->first('direccion', '<small class="help-block">:message</small>') !!}
		                        </div>
							</div>

							<div class="col-sm-3">                            	
								<div for="fc_nacimiento" class="form-group {{ $errors->has('fc_nacimiento') ? 'has-error' : '' }}">			                
		                            <label for="fc_nacimiento" >@lang('Fecha de nacimiento')</label>
					                <div class="input-group date">
					                	<input type="text" class="form-control datepicker pull-right" onchange="calcularEdad(this.value, '#edad')" autocomplete="off"
					                	id="fc_nacimiento" name="fc_nacimiento" value="{{ old('fc_nacimiento') }}" placeholder="dd/mm/aaaa">
					                	<span class="input-group-addon"><i class="fa fa-calendar" onClick="$('#fc_nacimiento').focus();"></i></span>
					                </div>
					                <!-- /.input group -->
		                            {!! $errors->first('fc_nacimiento', '<small for="fc_nacimiento" class="help-block">:message</small>') !!}
		                        </div>
							</div>

							<div class="col-sm-3">
								<div for="edad" class="form-group">
		                            <label for="edad" class="control-label">Edad</label>
				                    <input type="text" name="edad" id="edad" maxlength="3" onKeyPress="return soloNumeros(event)" placeholder="Edad" value="{{ old('edad') }}" class="form-control" />
				                </div>
							</div>
						</div>


						<div class="row">
							<div class="col-sm-6">
								<div class="form-group {{ $errors->has('region') ? 'has-error' : '' }}">
		    	                    <label for="region">@lang('Región')</label>
		    	                    <select id="region" name="region" class="form-control select2">
		    	                        @foreach($regiones as $region)
		    	                            <option value="{{ $region->id_region }}" {{ old('region') ? ($region->id_region == old('region') ? 'selected' : '') : $region->id_region == $regionDefault ? 'selected' : '' }}>{{ $region->gl_nombre_corto }}</option>
		    	                        @endforeach
		    	                    </select>
		                            {!! $errors->first('region', '<small class="help-block">:message</small>') !!}
		    	                </div>
							</div>

							<div class="col-sm-6">
								<div class="form-group {{ $errors->has('comuna') ? 'has-error' : '' }}">
		    	                    <label for="comuna">@lang('Comuna')</label>
		    	                    <select id="comuna" name="comuna" class="form-control select2">
		    	                        @foreach($comunas as $comuna)
		    	                            <option value="{{ $comuna->id_comuna }}" {{ old('comuna') ? ($comuna->id_comuna == old('comuna') ? 'selected' : '') : $comuna->id_comuna == $comunaDefault ? 'selected' : '' }}>{{ $comuna->gl_nombre_comuna }}</option>
		    	                        @endforeach
		    	                    </select>
		                            {!! $errors->first('comuna', '<small class="help-block">:message</small>') !!}
		    	                </div>
							</div>
						</div>

						{{--
							<!-- Implementar javascript de Regiones-->
							<div class="form-group">
		                        <label class="control-label col-sm-4">Región (*)</label>
		                        <div class="col-sm-6">
		                            <select for="region" class="form-control" id="region" name="region" onchange="Region.cargarComunasPorRegion(this.value, 'comuna')">
		                                <option value="0">Seleccione una Región</option>
		                                {foreach $arrRegiones as $item}
		                                    <option value="{$item->id_region}" id="{$item->gl_latitud}" name="{$item->gl_longitud}"
		                                            {if $item->id_region == $id_region_sesion}selected{/if}>{$item->gl_nombre_region}</option>
		                                {/foreach}
		                            </select>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="control-label  col-sm-4">Comuna (*)</label>
		                        <div class="col-sm-6">
		                            <select for="comuna" class="form-control" id="comuna" name="comuna">
		                                <option value="0">Seleccione una Comuna</option>
		                                {if !$es_admin}
		                                    {foreach $arrComunas as $item}
		                                        <option value="{$item->id_comuna}" id="{$item->gl_latitud_comuna}" name="{$item->gl_longitud_comuna}">{$item->gl_nombre_comuna}</option>
		                                    {/foreach}
		                                {/if}
		                            </select>
		                        </div>
		                    </div>
						--}}

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group {{ $errors->has('pais_origen') ? 'has-error' : '' }}">
		                            <label for="name">@lang('Pais de origen')</label>
		                             <select id="pais_origen" name="pais_origen" class="form-control">
		    	                        @foreach($paises as $pais_origen)
		    	                            <option value="{{ $pais_origen->id_pais }}" {{ old('pais_origen') ? ($pais_origen->id_pais == old('pais_origen') ? 'selected' : '') : $pais_origen->id_pais == $paisDefault ? 'selected' : '' }}>{{ $pais_origen->gl_nombre }}</option>
		    	                        @endforeach
		    	                    </select>
		                            {!! $errors->first('pais_origen', '<small class="help-block">:message</small>') !!}
		                        </div>
							</div>

							<div class="col-sm-6">
								<div class="form-group {{ $errors->has('nacionalidad') ? 'has-error' : '' }}">
		                            <label for="name">@lang('Nacionalidad')</label>
		                             <select id="nacionalidad" name="nacionalidad" class="form-control">
		    	                        @foreach($paises as $nacionalidad)
		    	                            <option value="{{ $nacionalidad->id_pais }}" {{ old('nacionalidad') ? ($nacionalidad->id_pais == old('nacionalidad') ? 'selected' : '') : $nacionalidad->id_pais == $paisDefault ? 'selected' : '' }}>{{ $nacionalidad->gl_nombre_nacionalidad }}</option>
		    	                        @endforeach
		    	                    </select>
		                            {!! $errors->first('nacionalidad', '<small class="help-block">:message</small>') !!}
		                        </div>
							</div>
						</div>
					</div>


					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
		                            <label for="name">@lang('Telefono')</label>
		                            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
		                            {!! $errors->first('telefono', '<small class="help-block">:message</small>') !!}
		                        </div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
		                            <label for="role">@lang('ministerio') *</label>
		                            <select class="form-control" name="ministerio" id="ministerio">
		                                <option value="discipulado">discipulado</option>
		                            </select>  
		                        </div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group {{ $errors->has('gl_sexo') ? 'has-error' : '' }}">
		                            <label for="name">@lang('Sexo') *</label>
		                            <select id="gl_sexo" name="gl_sexo" class="form-control" required>
		                            	<option value="" {{ old('gl_sexo') ? '' : 'selected' }}>Seleccione</option>
		    	                        <option value="Masculino" {{ old('gl_sexo') ? ('Masculino' == old('gl_sexo') ? 'selected' : '') : '' }}>Masculino</option>
		    	                        <option value="Femenino" {{ old('gl_sexo') ? ('Femenino' == old('gl_sexo') ? 'selected' : '') : '' }}>Femenino</option>
		    	                    </select>
		                            {!! $errors->first('gl_sexo', '<small class="help-block">:message</small>') !!}
		                        </div>
							</div>

							<!--div class="col-sm-6">
								<div class="form-group {{ $errors->has('fc_llegada_iglesia') ? 'has-error' : '' }}">
		                            <label for="name">@lang('Fecha de llegada a la iglesia')</label>
		                            <div class="input-group date">
					                  <input type="text" class="form-control datepicker pull-right" id="fc_llegada_iglesia" name="fc_llegada_iglesia" 
					                  value="{{ old('fc_llegada_iglesia') }}" placeholder="dd/mm/aaaa">
					                  <span class="input-group-addon"><i class="fa fa-calendar" onClick="$('#fc_llegada_iglesia').focus();"></i></span>
					                </div>
					                <!-- /.input group - ->
		                            {!! $errors->first('fc_llegada_iglesia', '<small class="help-block">:message</small>') !!}
		                        </div>
							</div-->

							<div class="col-sm-6">
								<div class="form-group {{ $errors->has('fc_llegada_iglesia') ? 'has-error' : '' }}">
		                            <label for="name">@lang('Fecha de llegada a la iglesia')</label>
				                  	<select class="form-control" name="fc_llegada_iglesia" id="fc_llegada_iglesia">
				                  		<option value="">Seleccione</option>
	                                	<option value="1" {{ 1 == old('fc_llegada_iglesia') ? 'selected' : '' }}>menos de 1 año</option>
	                                	<option value="2" {{ 2 == old('fc_llegada_iglesia') ? 'selected' : '' }}>1 año</option>
	                                	<option value="3" {{ 3 == old('fc_llegada_iglesia') ? 'selected' : '' }}>2 a 3 años</option>
	                                	<option value="4" {{ 4 == old('fc_llegada_iglesia') ? 'selected' : '' }}>más de 4 años</option>
	                            	</select>
					                <!-- /.input group -->
		                            {!! $errors->first('fc_llegada_iglesia', '<small class="help-block">:message</small>') !!}
		                        </div>
							</div>
						</div>
					</div>


					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="col-sm-12" style="padding-left: 0px;">
			                       <div class="form-check {{ $errors->has('bo_discipulado_previo') ? 'has-error' : '' }}">
			    					    <input type="checkbox" value="1" class="form-check-input" id="bo_discipulado_previo" name="bo_discipulado_previo" {{ (old('bo_discipulado_previo')) ? 'checked' : ((isset($bo_discipulado_previo) && $bo_discipulado_previo) ? 'checked' : '') }}>
			    					    <label class="form-check-label" for="bo_discipulado_previo">@lang('¿Se discipuló antes?')</label>
			    					    {!! $errors->first('bo_discipulado_previo', '<small class="help-block">:message</small>') !!}
			    					</div>
			                    </div>
								<div class="col-sm-12"  id="contenedor_discipulador_anterior" style="display: none;">
									<div class="form-group {{ $errors->has('gl_discipulador_anterior') ? 'has-error' : '' }}">
			                            <label for="name">@lang('Nombre discipulador anterior')</label>
			                            <input type="text" class="form-control" id="gl_discipulador_anterior" name="gl_discipulador_anterior" value="{{ old('gl_discipulador_anterior') }}">
			                            {!! $errors->first('gl_discipulador_anterior', '<small class="help-block">:message</small>') !!}
			                        </div>
			                    </div>
							</div>

							<div class="col-sm-6">
								<div class="col-sm-12" style="padding-left: 0px;">
			                       <div class="form-check {{ $errors->has('bo_iglesia_anterior') ? 'has-error' : '' }}">
			    					    <input type="checkbox" value="1" class="form-check-input" id="bo_iglesia_anterior" name="bo_iglesia_anterior" {{ (old('bo_iglesia_anterior')) ? 'checked' : ((isset($bo_iglesia_anterior) && $bo_iglesia_anterior) ? 'checked' : '') }}>
			    					    <label class="form-check-label" for="bo_iglesia_anterior">@lang('¿Asistió a otra iglesia antes?')</label>
			    					    {!! $errors->first('bo_iglesia_anterior', '<small class="help-block">:message</small>') !!}
			    					</div>
			                    </div>
								<div class="col-sm-12" id="contenedor_nombre_otra_iglesia" style="display: none;">
									<div class="form-group {{ $errors->has('gl_otra_iglesia') ? 'has-error' : '' }}">
			                            <label for="name">@lang('Nombre otra iglesia')</label>
			                            <input type="text" class="form-control" id="gl_otra_iglesia" name="gl_otra_iglesia" value="{{ old('gl_otra_iglesia') }}">
			                            {!! $errors->first('gl_otra_iglesia', '<small class="help-block">:message</small>') !!}
			                        </div>
			                    </div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group {{ $errors->has('gl_observaciones') ? 'has-error' : '' }}">
		                            <label for="name">@lang('Observaciones')</label>
		                             <textarea rows="5" class="form-control col-sm-8" id="gl_observaciones" name="gl_observaciones" placeholder="Observaciones" >{{ old('gl_observaciones') }}</textarea> 
		                            {!! $errors->first('gl_observaciones', '<small class="help-block">:message</small>') !!}
		                        </div>
							</div>
						</div>
					</div>	


                </div>
                <!-- /.datos_usuario -->

            </div>
            <!-- /.box-body -->
        </form>
        <!-- /.form end -->
	</div>
	<!-- /.box-body -->
	<div class="box-footer">
		<button type="button" class="btn btn-primary" onclick="submit(this)">@lang('Submit')</button>
	</div>
	<!-- box-footer -->

	<!-- Loading... -->
	<div for="box_form" class="overlay"><i class="fa fa-refresh fa-spin"></i><div>
	<!-- /.Loading... -->
</div>
<!-- /.box -->



@endsection

@section('js')


@endsection
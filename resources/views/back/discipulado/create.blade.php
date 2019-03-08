@extends('back.layout')

@section('css')
<link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">

@endsection

@section('main')

<div class="row">
    <div class="col-md-12">
        <!-- right column -->

        @if ($errors->count())
            @component('back.components.alert')
                @slot('type')
                    danger
                @endslot
                    @lang('There is some validation issue...')
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

        <!-- Horizontal Form -->
        <div class="box box-info">

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('discipulado.store') }}">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="box-body">					

					<div class="form-group">
                        <label for="role">@lang('ministerio') *</label>
                        <select class="form-control" name="ministerio" id="ministerio">
                            <option value="discipulado">discipulado</option>
                        </select>  
                    </div>

                    <div class="form-group {{ $errors->has('nr_dia_semana') ? 'has-error' : '' }}">
	                    <label for="nr_dia_semana">@lang('Día de la semana')</label>
	                    <select id="nr_dia_semana" name="nr_dia_semana" class="form-control">
	                        <option value=""  {{ old('nr_dia_semana') ? '' : 'selected' }} >Seleccione</option>
	                        <option value="1" {{ old('nr_dia_semana') == 1 ? 'selected' : '' }}>@lang('Lunes')</option>
	                        <option value="2" {{ old('nr_dia_semana') == 2 ? 'selected' : '' }}>@lang('Martes')</option>
	                        <option value="3" {{ old('nr_dia_semana') == 3 ? 'selected' : '' }}>@lang('Miercoles')</option>
	                        <option value="4" {{ old('nr_dia_semana') == 4 ? 'selected' : '' }}>@lang('Jueves')</option>
	                        <option value="5" {{ old('nr_dia_semana') == 5 ? 'selected' : '' }}>@lang('Viernes')</option>
	                        <option value="6" {{ old('nr_dia_semana') == 6 ? 'selected' : '' }}>@lang('Sábado')</option>
	                        <option value="7" {{ old('nr_dia_semana') == 7 ? 'selected' : '' }}>@lang('Domingo')</option>
	                    </select>
                        {!! $errors->first('nr_dia_semana', '<small class="help-block">:message</small>') !!}
	                </div>	                
					
					<div class="form-group {{ $errors->has('id_grupo_formacion_tipo') ? 'has-error' : '' }}">
	                    <label for="id_grupo_formacion_tipo">@lang('Tipo de discipulado') *</label>
	                    <select id="id_grupo_formacion_tipo" name="id_grupo_formacion_tipo" class="form-control" required>
	                        <option value=""  {{ old('id_grupo_formacion_tipo') ? '' : 'selected' }} >Seleccione</option>
	                        @foreach($tipos_grupo_formacion as $tipo_grupo_formacion)
	                            <option value="{{ $tipo_grupo_formacion->id_grupo_formacion_tipo }}" 
	                            {{ old('id_grupo_formacion_tipo') ? ($tipo_grupo_formacion->id_grupo_formacion_tipo == old('id_grupo_formacion_tipo') ? 'selected' : '') : '' }}>
	                             {{ $tipo_grupo_formacion->gl_nombre }}</option>
	                        @endforeach
	                    </select>
                        {!! $errors->first('id_grupo_formacion_tipo', '<small class="help-block">:message</small>') !!}
	                </div>

	                <div class="form-group {{ $errors->has('id_grupo_formacion_tipos_sexo') ? 'has-error' : '' }}">
	                    <label for="id_grupo_formacion_tipos_sexo">@lang('Tipo de sexo disicpulado') *</label>
	                    <select id="id_grupo_formacion_tipos_sexo" name="id_grupo_formacion_tipos_sexo" class="form-control" required>
	                        <option value=""  {{ old('id_grupo_formacion_tipos_sexo') ? '' : 'selected' }} >Seleccione</option>
	                        @foreach($tipos_sexo as $tipo_sexo)
	                            <option value="{{ $tipo_sexo->id_grupo_formacion_tipos_sexo }}" 
	                            {{ old('id_grupo_formacion_tipos_sexo') ? ($tipo_sexo->id_grupo_formacion_tipos_sexo == old('id_grupo_formacion_tipos_sexo') ? 'selected' : '') : '' }}>
	                            {{ $tipo_sexo->gl_nombre }}</option>
	                        @endforeach
	                    </select>
                        {!! $errors->first('id_grupo_formacion_tipos_sexo', '<small class="help-block">:message</small>') !!}
	                </div>

					<div class="form-group {{ $errors->has('fc_estimada_inicio') ? 'has-error' : '' }}">
                        <label for="name">@lang('Fecha estimada de inicio') *</label>
                        <input type="date" class="form-control" id="fc_estimada_inicio" name="fc_estimada_inicio" value="{{ old('fc_estimada_inicio') ?? date("Y-m-d",strtotime("+1 month"))}}" required>
                        {!! $errors->first('fc_estimada_inicio', '<small class="help-block">:message</small>') !!}
                    </div>

					<div class="form-group {{ $errors->has('fc_estimada_fin') ? 'has-error' : '' }}">
                        <label for="name">@lang('Fecha Estimada de Fin') *</label>
                        <input type="date" class="form-control" id="fc_estimada_fin" name="fc_estimada_fin" value="{{ old('fc_estimada_fin') ?? date("Y-m-d",strtotime("+25 month"))}}" required>
                        {!! $errors->first('fc_estimada_fin', '<small class="help-block">:message</small>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('nr_cupo_maximo') ? 'has-error' : '' }}">
                        <label for="name">@lang('Cupo máximo') *</label>
                        <input type="number" class="form-control" id="nr_cupo_maximo" name="nr_cupo_maximo" value="{{ old('nr_cupo_maximo') ?? 10 }}" required>
                        {!! $errors->first('nr_cupo_maximo', '<small class="help-block">:message</small>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('nr_cupo_minimo') ? 'has-error' : '' }}">
                        <label for="name">@lang('Cupo Minimo')</label>
                        <input type="number" class="form-control" id="nr_cupo_minimo" name="nr_cupo_minimo" value="{{ old('nr_cupo_minimo') ?? 1 }}">
                        {!! $errors->first('nr_cupo_minimo', '<small class="help-block">:message</small>') !!}
                    </div>


                    <div class="form-group {{ $errors->has('hr_inicio') ? 'has-error' : '' }}">
                        <label for="name">@lang('Hora de inicio')</label>
                        <input type="time" class="form-control" id="hr_inicio" name="hr_inicio" value="{{ old('hr_inicio') ?? '18:00'}}">
                        {!! $errors->first('hr_inicio', '<small class="help-block">:message</small>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('hr_fin') ? 'has-error' : '' }}">
                        <label for="name">@lang('Hora de fin')</label>
                        <input type="time" class="form-control" id="hr_fin" name="hr_fin" value="{{ old('hr_fin') ?? '20:00' }}">
                        {!! $errors->first('hr_fin', '<small class="help-block">:message</small>') !!}
                    </div>


                    <div class="form-group {{ $errors->has('discipulador') ? 'has-error' : '' }}">
	                    <label for="discipulador">@lang('Moderador') *</label>
	                    <select id="discipulador" name="discipulador" class="form-control" required>
	                    	<option value=""  {{ old('discipulador') ? '' : 'selected' }} >Seleccione</option>
	                        @foreach($discipuladores as $discipulador)
	                            <option value="{{ $discipulador->id_usuario }}" {{ old('discipulador') ? ($discipulador->id_usuario == old('discipulador') ? 'selected' : '') : '' }}>{{ $discipulador->name }}</option>
	                        @endforeach
	                    </select>
                        {!! $errors->first('region', '<small class="help-block">:message</small>') !!}
	                </div>

	                <div class="form-group {{ $errors->has('fc_inicio') ? 'has-error' : '' }}">
                        <label for="name">@lang('Fecha de inicio')</label>
                        <input type="date" class="form-control" id="fc_inicio" name="fc_inicio" value="{{ old('fc_inicio') }}">
                        {!! $errors->first('fc_inicio', '<small class="help-block">:message</small>') !!}
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                </div>
            </form>
        </div>
        <!-- /.box -->



    </div>
    <!-- /.col -->
</div>
<!-- /.row -->



@endsection

@section('js')


@endsection
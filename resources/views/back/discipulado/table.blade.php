@foreach($grupos_formacion as $grupo_formacion)
    <tr>
        <td>{{ $grupo_formacion->id_grupo_formacion }}</td>
        <td>
        	@foreach($grupo_formacion->moderadores as $moderador)
        		{{ $moderador->usuario->name }}<br/>
        	@endforeach
		</td>
        <td><b>@lang( jddayofweek(($grupo_formacion->nr_dia_semana - 1),1) )</b></td>
        <td>@if($grupo_formacion->hr_inicio && $grupo_formacion->hr_fin)
        		<b>{{ date( 'H:i', strtotime($grupo_formacion->hr_inicio)) }} - {{ date( 'H:i', strtotime($grupo_formacion->hr_fin)) }}</b>
        	@elseif($grupo_formacion->hr_inicio)
        		<b>{{ date( 'H:i', strtotime($grupo_formacion->hr_inicio)) }}</b>
        	@else
        		<b>Sin información</b>
        	@endif
        </td>
        <td>{{ $grupo_formacion->tipo_grupo_formacion->gl_nombre }}</td>
        <td>
        	@if($grupo_formacion->tipo_sexo->gl_nombre == 'Masculino')
            <span class="label label-primary label-sm">Masculino</span>
            @elseif($grupo_formacion->tipo_sexo->gl_nombre == 'Femenino')
            <span class="label label-pink label-sm">Femenino</span>
            @else
            <span class="label label-purple label-sm">Mixto</span>
            @endif
        </td>
        <td>@if($grupo_formacion->asistentes->count() < ($grupo_formacion->nr_cupo_maximo - 3))
            <span class="label label-success">Disponible</span>
            @elseif($grupo_formacion->asistentes->count() >= ($grupo_formacion->nr_cupo_maximo - 3) &&
                    $grupo_formacion->asistentes->count() < ($grupo_formacion->nr_cupo_maximo))
            <span class="label label-warning">Disponible</span>
            @else
            <span class="label label-danger">Completo</span>
            @endif
        </td>
        <td>{{ $grupo_formacion->asistentes->count()  ?? '0' }}</td>
        <td>{{ $grupo_formacion->nr_cupo_maximo }} </td>
        <td style="text-align: center;">{{ ($grupo_formacion->fc_estimada_inicio)?$grupo_formacion->fc_estimada_inicio->formatLocalized('%d/%m/%Y') : '' }}</td>
        <td style="text-align: center;">{{ ($grupo_formacion->fc_inicio)?$grupo_formacion->fc_inicio->formatLocalized('%d/%m/%Y') : '' }}</td>
        <!--td>{{ $grupo_formacion->created_at->formatLocalized('%c')  ?? '' }}</td-->
        <td>
            <a class="btn btn-warning btn-xs btn-block" href="{{ route('discipulado.edit', [$grupo_formacion->id_grupo_formacion]) }}" role="button" title="@lang('Edit')">
                <span class="fa fa-edit"></span>
            </a>
        </td>
        <td>
            <a class="btn btn-danger btn-xs btn-block" href="{{ route('discipulado.destroy', [$grupo_formacion->id_grupo_formacion]) }}" role="button" title="@lang('Destroy')">
                <span class="fa fa-remove"></span>
            </a>
        </td>
        <td>
            <a class="btn btn-primary btn-xs btn-block" href="{{ route('discipulado.asistentes.index', [$grupo_formacion->id_grupo_formacion]) }}" role="button" title="@lang('Integrantes')">
                <span class="fa fa-users"></span>
            </a>
        </td>
        <td>
            <a class="btn btn-success btn-xs btn-block" href="{{ route('discipulado.asistentes.create', [$grupo_formacion->id_grupo_formacion]) }}" role="button" title="@lang('Agregar Integrante')">
                <span class="fa fa-user-plus"></span>
            </a>
        </td>
    </tr>
@endforeach

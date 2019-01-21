@foreach($grupos_formacion as $grupo_formacion)
    <tr>
        <td>{{ $grupo_formacion->id_grupo_formacion }}</td>
        <td>{{ '$grupo_formacion->moredadores' }}</td>
        <td>{{ '$grupo_formacion->cantidad_integrantes' }}</td>
        <td>{{ $grupo_formacion->nr_cupo_maximo }}</td>
        <td>{{ $grupo_formacion->nr_cupo_minimo }}</td>
        <td>{{ $grupo_formacion->fc_inicio }}</td>
        <td>{{ $grupo_formacion->fc_estimada_fin }}</td>
        <td>{{ $grupo_formacion->created_at->formatLocalized('%c') }}</td>
        <td>
            <a class="btn btn-warning btn-xs btn-block" href="{{ route('discipulado.update', [$grupo_formacion->id_grupo_formacion]) }}" role="button" title="@lang('Edit')">
                <span class="fa fa-edit"></span>
            </a>
        </td>
        <td>
            <a class="btn btn-danger btn-xs btn-block" href="{{ route('discipulado.destroy', [$grupo_formacion->id_grupo_formacion]) }}" role="button" title="@lang('Destroy')">
                <span class="fa fa-remove"></span>
            </a>
        </td>
    </tr>
@endforeach


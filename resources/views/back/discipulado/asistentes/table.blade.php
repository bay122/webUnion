@foreach($integrantes as $asistente)
    <tr>
        <td>{{ $asistente->id_grupo_formacion_usuario }}</td>
        <td>{{ $asistente->usuario->name }}</td>
        <td>{{ ($asistente->fc_ingreso)?$asistente->fc_ingreso->formatLocalized('%d/%m/%Y') : '' }}</td>
        <td><span class="label label-{{ ($asistente->bo_moderador) ? 'success' : 'primary' }}">
            {{ ($asistente->bo_moderador) ? 'Moderador' : 'Asistente' }}</span>
        </td>
        <td>{{ ($grupo_formacion->created_at)?$grupo_formacion->created_at->formatLocalized('%d/%m/%Y') : '' }}</td>
        <td>
            @if($asistente->bo_moderador)
                <a class="btn btn-warning btn-xs btn-block" href="{{ route('discipulado.moderador.edit', [$asistente->id_grupo_formacion_usuario]) }}" role="button" title="@lang('Edit')">
                    <span class="fa fa-edit"></span>
                </a>
            @endif
        </td>
        <td>
            <a class="btn btn-danger btn-xs btn-block" href="{{ route('discipulado.asistentes.destroy', [$asistente->id_grupo_formacion_usuario]) }}" data-name="{{ $asistente->usuario->name }}" role="button" title="@lang('Destroy')">
                <span class="fa fa-remove"></span>
            </a>
        </td>
    </tr>
@endforeach


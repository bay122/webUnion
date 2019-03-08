@foreach($discipuladores as $discipulador)
    <tr>
        <td>{{ $discipulador->id_usuario }}</td>
        <td>{{ $discipulador->name }}</td>
        <td>{{ $discipulador->discipulados->count() }}</td>
        <td>
            <a class="btn btn-warning btn-xs btn-block" href="{{ route('discipulado.moderador.edit', [$discipulador->id_usuario]) }}" role="button" title="@lang('Edit')">
                <span class="fa fa-edit"></span>
            </a>
        </td>
        <td>
            <a class="btn btn-danger btn-xs btn-block" href="{{ route('discipulado.moderador.destroy', [$discipulador->id_usuario]) }}" role="button" title="@lang('Destroy')">
                <span class="fa fa-remove"></span>
            </a>
        </td>
    </tr>
@endforeach


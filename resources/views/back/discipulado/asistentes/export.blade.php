<table>
    <thead>
        <tr>
            <th>#id</th>
            <th>@lang('Nombre')</th>
            <th>@lang('Apellido Paterno') </th>
            <th>@lang('Apellido Materno')</th>
            <th>@lang('Email') </th>
            <th>@lang('Dirección')</th>
            <th>@lang('Telefono')</th>
            <th>@lang('Sexo')</th>
            <th>@lang('rut')</th>
            <th>@lang('Fecha Nacimiento')</th>
            <th>@lang('Edad')</th>
            <th>@lang('Fecha de llegada a la iglesia')</th>
            <th>@lang('Moderador')</th>
            <th>@lang('Observaciones')</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($integrantes as $asistente)
            @php
                $json_otros_datos = json_decode($asistente->usuario->datos->json_otros_datos, true);
                $json_telefono = array();
                $json_direccion = array();
                $TIPO_CONTACTO_TELEFONO_FIJO = 1;
                $TIPO_CONTACTO_TELEFONO_MOVIL = 2;
                $TIPO_CONTACTO_DIRECCION = 3;
            @endphp
            @foreach($asistente->usuario->datos_contacto as $dato_contacto)
                @if($dato_contacto->id_usuario_tipo_contacto == $TIPO_CONTACTO_TELEFONO_FIJO)
                    @php
                    $json_telefono = json_decode($dato_contacto->gl_json_dato_contacto, true);
                    @endphp
                @elseif($dato_contacto->id_usuario_tipo_contacto == $TIPO_CONTACTO_TELEFONO_MOVIL)
                    @php
                    $json_telefono = json_decode($dato_contacto->gl_json_dato_contacto, true);
                    @endphp
                @elseif($dato_contacto->id_usuario_tipo_contacto == $TIPO_CONTACTO_DIRECCION)
                    @php
                    $json_direccion = json_decode($dato_contacto->gl_json_dato_contacto, true);
                    @endphp
                @endif
            @endforeach 
            <tr>
                <td>{{ $asistente->usuario->id_usuario }}</td>
                <td>{{ $asistente->usuario->datos->gl_nombres }}</td>
                <td>{{ $asistente->usuario->datos->gl_apellido_paterno }}</td>
                <td>{{ $asistente->usuario->datos->gl_apellido_materno }}</td>
                <td>{{ $asistente->usuario->email }}</td>
                <td>
                    @if(!empty($json_telefono))
                        @foreach($json_telefono as $telefono)
                            @if($telefono["bo_activo"])
                                {{$telefono["gl_telefono"]}}
                            @endif
                        @endforeach
                    @endif
                </td>
                <td> 
                    @if(!empty($json_direccion))
                        @foreach($json_direccion as $direccion)
                            @if($direccion["bo_activo"])
                                {{$direccion["gl_direccion"]}}
                            @endif
                        @endforeach
                    @endif
                </td>
                <td>{{ $asistente->usuario->datos->gl_sexo }}</td>
                <td>{{ $asistente->usuario->datos->gl_rut }}</td>
                <td>{{ ($asistente->usuario->datos->fc_nacimiento)?$asistente->usuario->datos->fc_nacimiento->formatLocalized('%d/%m/%Y') : '' }}</td>
                <td>{{ isset($json_otros_datos["nr_edad"])?$json_otros_datos["nr_edad"]:'' }}</td>
                <td>{{ ($asistente->usuario->datos->fc_llegada_iglesia)?$asistente->usuario->datos->fc_llegada_iglesia->formatLocalized('%d/%m/%Y') : '' }}</td>
                <td>{{ ($asistente->bo_moderador) ? 'Moderador' : 'Asistente' }}</td>
                <td>{{ isset($json_otros_datos["gl_observaciones"])?$json_otros_datos["gl_observaciones"]:'' }}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>
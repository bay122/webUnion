@foreach($integrantes as $asistente)
    <tr>
        <td>{{ $asistente->usuario->id_usuario }}
        </td>
        <td>
            <button class="btn btn-primary btn-xs" data-usuario="{{ $asistente->usuario->id_usuario }}" 
                onclick="verDatosUsuario(this)" role="button" title="@lang('Detail')">
                <span class="fa fa-search"></span>
            </button>
            {{ $asistente->usuario->name }}
        </td>
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




<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Datos Usuario</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6" id="contenedor_email">
                                <div class="form-group">
                                    <label for="email">@lang('Email') </label>
                                    <input type="email" class="form-control" id="email" name="email" value="" disabled>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">@lang('rut')</label>
                                    <input type="text" class="form-control" id="rut" name="rut" value="" maxlength="12" placeholder="Rut" disabled/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">@lang('nombres') </label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="" disabled>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                 <div class="form-group">
                                    <label for="name">@lang('Apellido Paterno') </label>
                                    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="" disabled>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="name">@lang('Apellido Materno')</label>
                                    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">@lang('Dirección')</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="" disabled>
                                </div>
                            </div>

                            <div class="col-sm-3">                              
                                <div for="fc_nacimiento" class="form-group" >
                                    <label for="fc_nacimiento" >@lang('Fecha de nacimiento')</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="fc_nacimiento" name="fc_nacimiento" value="" placeholder="dd/mm/aaaa" disabled>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div for="edad" class="form-group">
                                    <label for="edad" class="control-label">Edad</label>
                                    <input type="text" name="edad" id="edad" placeholder="Edad" value="" class="form-control" disabled />
                                </div>
                            </div>
                        </div>


                        <!--div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="region">@lang('Región')</label>
                                    <input id="region" name="region" class="form-control" value="" disabled/>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="comuna">@lang('Comuna')</label>
                                    <input id="comuna" name="comuna" class="form-control" disabled />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">@lang('Pais de origen')</label>
                                    <input id="pais_origen" name="pais_origen" class="form-control" disabled />
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">@lang('Nacionalidad')</label>
                                    <input id="nacionalidad" name="nacionalidad" class="form-control" disabled />
                                </div>
                            </div>
                        </div-->
                    </div>


                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">@lang('Telefono')</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="" disabled>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="role">@lang('sexo') </label>
                                    <input class="form-control" name="gl_sexo" id="gl_sexo" disabled /> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">@lang('Fecha de llegada a la iglesia')</label>
                                    <input class="form-control" name="fc_llegada_iglesia" id="fc_llegada_iglesia" disabled/>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <!--div class="row">
                            <div class="col-sm-6">
                                <div class="col-sm-12" style="padding-left: 0px;">
                                   <div class="form-check">
                                        <input type="checkbox" value="1" class="form-check-input" id="bo_discipulado_previo" name="bo_discipulado_previo" disabled />
                                        <label class="form-check-label" for="bo_discipulado_previo">@lang('¿Se discipuló antes?')</label>
                                    </div>
                                </div>
                                <div class="col-sm-12"  id="contenedor_discipulador_anterior" >
                                    <div class="form-group">
                                        <label for="name">@lang('Nombre discipulador anterior')</label>
                                        <input type="text" class="form-control" id="gl_discipulador_anterior" name="gl_discipulador_anterior" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="col-sm-12" style="padding-left: 0px;">
                                   <div class="form-check">
                                        <input type="checkbox" value="1" class="form-check-input" id="bo_iglesia_anterior" name="bo_iglesia_anterior" disabled />
                                        <label class="form-check-label" for="bo_iglesia_anterior">@lang('¿Asistió a otra iglesia antes?')</label>
                                    </div>
                                </div>
                                <div class="col-sm-12" id="contenedor_nombre_otra_iglesia" >
                                    <div class="form-group">
                                        <label for="name">@lang('Nombre otra iglesia')</label>
                                        <input type="text" class="form-control" id="gl_otra_iglesia" name="gl_otra_iglesia" value="">
                                    </div>
                                </div>
                            </div>
                        </div-->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">@lang('Observaciones')</label>
                                    <textarea rows="5" class="form-control col-sm-8" id="gl_observaciones" name="gl_observaciones" placeholder="Observaciones" disabled></textarea> 
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>